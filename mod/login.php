<?php

if(strpos($_SERVER['REQUEST_URI'],"loginReg.php")){
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

$check_status = mysqli_query($conn,"SELECT * FROM products WHERE mode = 'regedit'");
$row = mysqli_fetch_assoc($check_status);

$version = $row['version'];
$status = $row['status'];
$download = $row['download'];
$sIDx = $row['apk_size'];
$ip = filter_input(INPUT_SERVER,REMOTE_ADDR,FILTER_VALIDATE_IP);

//Username Validator
$uname = mysqli_real_escape_string($conn, $data["app_User"]);
if($uname == null || preg_match("([a-zA-Z0-9]+)", $uname) === 0){
    $ackdata = array(
        "app_Status" => "Failed",
        "app_Message" => "Usuário inválido.",
        "app_ExpireDays" => "0",
        "app_Version" => $version
    );
    PlainDie(tokenResponse($ackdata));
}

$acessAdm = $uname == "lincepc2" || $uname == "lincepc" || $uname == "Donyofc" || $uname == "brmods" || $uname == "goiana" || $uname == "PALHACO" || $uname == "Suporte1" || $uname == "Zezim";


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
$pass = mysqli_real_escape_string($conn, $data["app_Pass"]);
if($pass == null || !preg_match("([a-zA-Z0-9]+)", $pass) === 0){
    $ackdata = array(
        "app_Status" => "Failed",
        "app_Message" => "Senha inválida.",
        "app_ExpireDays" => "0",
        "app_Version" => $version
    );
    PlainDie(tokenResponse($ackdata));
}

$query = $conn->query("SELECT * FROM `tokens` WHERE `Username` = '".$uname."' AND `Password` = '".$pass."' AND `mode` = 'regedit'");
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

if($res["UID2"] == "one device"){
		if($res["UID"] == NULL){
			$query = $conn->query("UPDATE `tokens` SET `UID` = '".$data["app_Uid"]."' WHERE `Username` = '".$uname."' AND `Password` = '".$pass."' AND `mode` = 'regedit'");
		}elseif($res["UID"] != $data["app_Uid"]) {
			$ackdata = array(
            "app_Status" => "Failed",
            "app_Message" => "Dispositivo não permitido.",
            "app_ExpireDays" => "0"
			);
			
			PlainDie(tokenResponse($ackdata));
		}
} elseif($res["UID2"] == NULL){
	$query = $conn->query("UPDATE `tokens` SET `UID2` = '".$data["app_Uid"]."' WHERE `Username` = '".$uname."' AND `Password` = '".$pass."' AND `mode` = 'regedit'");
} elseif($res["UID2"] != $data["app_Uid"]) {
		
	if($res["UID"] == NULL){
			$query = $conn->query("UPDATE `tokens` SET `UID` = '".$data["app_Uid"]."' WHERE `Username` = '".$uname."' AND `Password` = '".$pass."' AND `mode` = 'regedit'");
	}elseif($res["UID"] != $data["app_Uid"]) {
		$ackdata = array(
		"app_Status" => "Failed",
		"app_Message" => "Dispositivo não permitido.",
		"app_ExpireDays" => "0"
		);
		
		PlainDie(tokenResponse($ackdata));
	}
}

$EndDate = strtotime($res["EndDate"]);
$DataHoje = strtotime(date("Y-m-d H:i:s"));
$DataFinal = 0;	
if($EndDate < $DataHoje){
	$query = $conn->query("UPDATE `tokens` SET `Expiry` = '".$DataFinal."' WHERE `Username` = '".$uname."' AND `Password` = '".$pass."' AND `mode` = 'regedit'");
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
		$query = $conn->query("UPDATE `tokens` SET `Expiry` = '".$DataFinal."' WHERE `Username` = '".$uname."' AND `Password` = '".$pass."' AND `mode` = 'regedit'");
	}
	else{
		$DataFinal = 0;
		$query = $conn->query("UPDATE `tokens` SET `Expiry` = '".$DataFinal."' WHERE `Username` = '".$uname."' AND `Password` = '".$pass."' AND `mode` = 'regedit'");
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

if($data["app_Load"] == 1) 
{

    $ackdata = array(
        "app_Status" => "Failed",
        "app_Message" => "Ocorreu um erro inesperado, não foi possível carrega os arquivos do servidor",
        "app_ExpireDays" => $DataFinal,
        "app_Logged_User" => $res["Username"],
        "app_Logged_Pass" => $res["Password"],
		"app_CurrToken" => $data["app_Uid"],
		"app_Version" => $version,
		"app_DownLink" => $download,
		"app_Logged_Tok" => $appToken,
		"app_Vendedor" => $vendedorxd,
		"app_MsgAlert" => "XD...",
		"app_MsgTitle" => "⚠INFINITY AVISO"
    );
}


if($data["app_Load"] == 2) 
{

    $ackdata = array(
        "app_Status" => "Succeeded",
        "app_Message" => "Ocorreu um erro inesperado, não foi possível carrega os arquivos do servidor",
        "app_ExpireDays" => $DataFinal,
        "app_Logged_User" => $res["Username"],
        "app_Logged_Pass" => $res["Password"],
		"app_CurrToken" => $data["app_Uid"],
		"app_Version" => $version,
		"app_DownLink" => $download,
		"app_Logged_Tok" => $appToken,
		"app_Vendedor" => $vendedorxd,
		"app_MsgAlert" => "XD...",
		"app_MsgTitle" => "⚠INFINITY AVISO"
    );
}

echo tokenResponse($ackdata);