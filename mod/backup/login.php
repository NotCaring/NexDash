<?php
//ferror_reporting(0);
include('init.php');

$crypter    = Crypter::init();
$privatekey = readFileData("Keys/PrivateKey.prk");

function tokenResponse($data)
{
   global $crypter, $privatekey;
    $data = toJson($data);
    $datahash = sha256($data);
    
    $acktoken = array(
        "Data" => profileEncrypt($data, $datahash),
        "Sign" => toBase64($crypter->signByPrivate($privatekey, $data)),
        "Hash" => $datahash
    );
    
    return toBase64(toJson($acktoken));
    
}

$token  = fromBase64($_POST['token']);
$tokarr = fromJson($token, true);

$encdata = $tokarr['Data'];
$decdata = trim($crypter->decryptByPrivate($privatekey, fromBase64($encdata)));

$data = fromJson($decdata);

$tokhash = $tokarr['Hash'];
$newhash = sha256($encdata);

$dbMysql = new config\dbMysql;

//$data = json_decode(file_get_contents('php://input'),true);

$uname = $data["uname"];
if($uname == null || preg_match("([A-Z0-9]+)", $uname) === 0)
{
    $ackdata = array(
        "Status"           => "Failed",
        "MessageString"    => "Usuario Invalido",
        "SubscriptionLeft" => "0"
    );
    PlainDie(tokenResponse($ackdata));
}
$pass = $data["pass"];
if($pass == null || !preg_match("([a-zA-Z0-9]+)", $pass) === 0)
{
    $ackdata = array(
        "Status" => "Failed",
        "MessageString" => "Senha Invalida",
        "SubscriptionLeft" => "0"
    );
    PlainDie(tokenResponse($ackdata));
}


$userInfo = $dbMysql->select("cs_vendas", ["WHERE" => ["username" => $uname], "TYPE" => "SINGLE"]);
if(!$userInfo || $userInfo->password != $pass){
    $ackdata = array(
        "Status" => "Failed",
        "MessageString" => "Usuario ou senha incorretos!",
        "SubscriptionLeft" => "0"
    );
    PlainDie(tokenResponse($ackdata));
}
$serverInfo = $dbMysql -> select("cs_produtos", ["WHERE" => [$userInfo->Produto], "TYPE" => "SINGLE"]);

if(!$serverInfo){
    $ackdata = array(
        "Status" => "Failed",
        "MessageString" => "Produto invalido",
        "SubscriptionLeft" => "0"
    );
    PlainDie(tokenResponse($ackdata));
}

/*if (strcmp($tokhash, $newhash) == 0) 
{
    PlainDie();
}
*/

if($serverInfo->status == "M")
{
   
    $ackdata = array(
        "Status"           => "Failed",
        "MessageString"    => "Servidor em Manutençao",
        "SubscriptionLeft" => "0"
    );
    
    PlainDie(tokenResponse($ackdata));
}


if($serverInfo->status == "D")
{
   
    $ackdata = array(
        "Status"           => "Failed",
        "MessageString"    => "Servidor em offline",
        "SubscriptionLeft" => "0"
    );
    
    PlainDie(tokenResponse($ackdata));
}



if($userInfo->StartDate == NULL)
{
    $query = $conn->query("UPDATE `tokens` SET `StartDate` = CURRENT_TIMESTAMP WHERE `Username` = '".$uname."' AND `Password` = '".$pass."'");
    $dbMysql -> update("cs_vendas", ["StartDate" => CURRENT_TIMESTAMP], ["username" => $userInfo->username]);

}

if ($userInfo->Devices == "1") 
{

    if($userInfo->UID == NULL) 
    {
        $dbMysql -> update("cs_vendas", ["UID" => $data["cs"]], ["username" => $userInfo->username]);
    } 
    else if($userInfo->UID != $data["cs"]) 
    {
        $ackdata = array(
            "Status"           => "Failed",
            "MessageString"    => "Dispositivo Não Permitido.",
            "SubscriptionLeft" => "0"
        );
        
        PlainDie(tokenResponse($ackdata));
    }

} 
else if ($userInfo->Devices == "2") 
{
    
    if ($userInfo["UID"] == NULL) 
    {
      
        $dbMysql->update("cs_vendas", ["UID" => $data["cs"]], ["username" => $userInfo->username]);
    } 
    
    if ($userInfo["UID"] != $data["cs"]) 
    {

        if ($userInfo["UID2"] == NULL) 
        {
            $dbMysql -> update("cs_vendas", ["UID2" => $data["cs"]], ["username" => $userInfo->username]);
        } 
        else if ($userInfo["UID2"] != $data["cs"]) 
        {
            $ackdata = array(
                "Status" => "Failed",
                "MessageString" => "Dispositivo não permitido.",
                "SubscriptionLeft" => "0"
            );
            PlainDie(tokenResponse($ackdata));
        }
    }

}

if($userInfo->EndDate < $userInfo->StartDate)
{
    $ackdata = array(
        "Status" => "Failed",
        "MessageString" => "Seu login expirou!",
        "SubscriptionLeft" => "0"
    );
    PlainDie(tokenResponse($ackdata));
}

$loaderdata   = readFileData("libs/ModMenu.app");
$libonlidata  = readFileData("libs/lib.evo");
$lib2onlidata = readFileData("libs/ModMenu2.app");
$iconmdata    = readFileData("libs/ico.ic");

$ackdata = array(
    "Status"            =>  "Ligado",
    "MessageString"     =>  "Servidor Em Manutenção",
    "SubscriptionLeft"  =>  $userInfo->EndDate,
    "Vendedor"          =>  $userInfo->supervisor,
    "RegisterDate"      =>  $userInfo->StartDate,
    "IdApp"             =>  "1",
    "user"              =>   $userInfo->username,
    "acabaEm"           =>  "10 minutos",
    "FuckImg"           =>  toBase64($iconmdata),
    "Loader"            =>  toBase64($loaderdata),
    "libext"            =>  toBase64($libonlidata),
    "Loader2"           =>  toBase64($lib2onlidata),
    "urlUpadate"        =>  "logo logo link"
);

echo tokenResponse($ackdata);