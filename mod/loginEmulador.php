<?php

if(strpos($_SERVER['REQUEST_URI'],"loginEmulador.php") || !isset($_POST['tokserver'])){
    require_once 'Utils.php';
    PlainDie();
}
include 'init.php';

//initialization
$crypter = Crypter::init();
$privatekey = readFileData("Keys/PrivateKey.prk");

function tokenResponse($data){
    global $crypter, $privatekey;
    $data = toJson($data);
    $datahash = sha256($data);
    $acktoken = array(
        "app_Dados" => profileEncrypt($data, $datahash),
        "app_Sign" => toBase64($crypter->signByPrivate($privatekey, $data)),
        "app_Hash" => $datahash
    );
    return toBase64(toJson($acktoken));
}

//token data
$token = fromBase64($_POST['tokserver']);
$tokarr = fromJson($token, true);

//Data section decrypter
$encdata = $tokarr['app_Dados'];
$appToken = $tokarr['app_Token'];
$decdata = trim($crypter->decryptByPrivate($privatekey, fromBase64($encdata)));
$data = fromJson($decdata);

//Hash Validator
$tokhash = $tokarr['app_Hash'];
$newhash = sha256($encdata);

if (strcmp($tokhash, $newhash) == 0) {
    PlainDie();
}

$check_status = mysqli_query($conn,"SELECT * FROM products WHERE mode = 'x86'");
$row = mysqli_fetch_assoc($check_status);

$version = $row['version'];
$status = $row['status'];
$download = $row['download'];
$sIDx = $row['apk_size'];

//Username Validator
$uname = $data["app_User"];
if($uname == null || preg_match("([a-zA-Z0-9]+)", $uname) === 0){
    $ackdata = array(
        "app_Status" => "Failed",
        "app_Message" => "Usuário inválido.",
        "app_ExpireDays" => "0",
        "app_Version" => $version
    );
    PlainDie(tokenResponse($ackdata));
}

$acessAdm = $uname == "lincepc2" || $uname == "lincepc" || $uname == "Donyofc" || $uname == "brmods" || $uname == "goiana";

if($acessAdm) {

} else {
     if($status == "ATT")
    {
        $statusMsg = "Servidor em manutenção!";
    }
    elseif($status == "OFF")
    {
        $statusMsg = "Servidor Offline!";
    }
    if($status == "OFF" || $status == "ATT")
    {
        $ackdata = array(
            "app_Status" => "Failed",
            "app_Message" => $statusMsg,
            "app_ExpireDays" => "0",
            "app_Version" => $version
        );
        PlainDie(tokenResponse($ackdata));
    }  
}

//Password Validator
$pass = $data["app_Pass"];
if($pass == null || !preg_match("([a-zA-Z0-9]+)", $pass) === 0){
    $ackdata = array(
        "app_Status" => "Failed",
        "app_Message" => "Senha inválida.",
        "app_ExpireDays" => "0",
        "app_Version" => $version
    );
    PlainDie(tokenResponse($ackdata));
}

$query = $conn->query("SELECT * FROM `tokens` WHERE `Username` = '".$uname."' AND `Password` = '".$pass."' AND `mode` = 'x86'");
if($query->num_rows < 1){
    $ackdata = array(
        "app_Status" => "Failed",
        "app_Message" => "Usuário ou senha incorretos.",
        "app_ExpireDays" => "0",
        "app_Version" => $version
    );
    PlainDie(tokenResponse($ackdata));
}

$res = $query->fetch_assoc();
$vendedorxd = $res["Vendedor"];


$EndDate = strtotime($res["EndDate"]);
$DataHoje = strtotime(date("Y-m-d H:i:s"));
$DataFinal = 0;	
if($EndDate < $DataHoje){
	$query = $conn->query("UPDATE `tokens` SET `Expiry` = '".$DataFinal."' WHERE `Username` = '".$uname."' AND `Password` = '".$pass."' AND `mode` = 'x86'");
	$ackdata = array(
		"app_Status" => "Failed",
		"app_Message" => "Sua licença expirou, renove para continuar usando.",
		"app_ExpireDays" => "0",
		"app_Version" => $version
	);
	PlainDie(tokenResponse($ackdata));
}

if($EndDate > $DataHoje){
	$DataDias = ($EndDate - $DataHoje) /86400;
	$DataFinal = round($DataDias, 0);
	if($DataFinal > 0){
		$query = $conn->query("UPDATE `tokens` SET `Expiry` = '".$DataFinal."' WHERE `Username` = '".$uname."' AND `Password` = '".$pass."' AND `mode` = 'x86'");
	}
	else{
		$DataFinal = 0;
		$query = $conn->query("UPDATE `tokens` SET `Expiry` = '".$DataFinal."' WHERE `Username` = '".$uname."' AND `Password` = '".$pass."' AND `mode` = 'x86'");
	}
}

if($res['pause'] == 1){
    $ackdata = array(
        "app_Status" => "Failed",
        "app_Message" => "Usuário pausado.",
        "app_ExpireDays" => "0",
        "app_Version" => $version
    );
    PlainDie(tokenResponse($ackdata));
}

if($res['ban'] == 1){
    $ackdata = array(
        "app_Status" => "Failed",
        "app_Message" => "Usuário banido.",
        "app_ExpireDays" => "0",
        "app_Version" => $version
    );
    PlainDie(tokenResponse($ackdata));
}

$checkproduct = $res['mode'] == "x86";

if(!$checkproduct){
    $ackdata = array(
        "app_Status" => "Failed",
        "app_Message" => "Produto Incorreto!",
        "app_ExpireDays" => "0",
        "app_Version" => $version
    );
    PlainDie(tokenResponse($ackdata));
}

$UserData = $res["EndDate"];

if($data["app_Load"] == 1) 
{
    $loaderdata = readFileData("Loaders/Injetorx86/PUBG.kmods");
    $ackdata = array(
        "app_Status" => "Succeeded",
        "app_Message" => "",
        "app_Loader" => toBase64($loaderdata),
        "app_ExpireDays" => $DataFinal,
        "app_Logged_User" => $res["Username"],
        "app_Logged_Pass" => $res["Password"],
		"app_CurrToken" => $data["app_Uid"],
		"app_Version" => $version,
		"app_DownLink" => $download,
		"app_Logged_Tok" => $appToken,
		"app_Vendedor" => $vendedorxd,
		"app_MsgAlert" => "Mod esta offline por conta do horario. \nA garena pode fazer algumas updates online e causar blacklist, Vão dormir XD",
		"app_MsgTitle" => "⚠INFINITY AVISO"
    );
}

if($data["app_Load"] == 2) 
{
    $loaderdata = readFileData("Loaders/LoaderEmulador-2/PUBG.kmods");
    $ackdata = array(
        "app_Status" => "Succeeded",
        "app_Message" => "",
        "app_Loader" => toBase64($loaderdata),
        "app_ExpireDays" => $DataFinal,
        "app_Logged_User" => $res["Username"],
        "app_Logged_Pass" => $res["Password"],
		"app_CurrToken" => $data["app_Uid"],
		"app_Version" => $version,
		"app_DownLink" => $download,
		"app_Logged_Tok" => $appToken,
		"app_Vendedor" => $vendedorxd,
		"app_MsgAlert" => "Mod esta offline por conta do horario. \nA garena pode fazer algumas updates online e causar blacklist, Vão dormir XD",
		"app_MsgTitle" => "⚠INFINITY AVISO"
    );
}

if($data["app_Load"] == 3) 
{
    $loaderdata = readFileData("Loaders/LoaderEmulador-3/PUBG.kmods");
    $ackdata = array(
        "app_Status" => "Succeeded",
        "app_Message" => "",
        "app_Loader" => toBase64($loaderdata),
        "app_ExpireDays" => $DataFinal,
        "app_Logged_User" => $res["Username"],
        "app_Logged_Pass" => $res["Password"],
		"app_CurrToken" => $data["app_Uid"],
		"app_Version" => $version,
		"app_DownLink" => $download,
		"app_Logged_Tok" => $appToken,
		"app_Vendedor" => $vendedorxd,
		"app_MsgAlert" => "Mod esta offline por conta do horario. \nA garena pode fazer algumas updates online e causar blacklist, Vão dormir XD",
		"app_MsgTitle" => "⚠INFINITY AVISO"
    );
}

echo tokenResponse($ackdata);
