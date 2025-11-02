
<?php
header('Content-type: text/plain');

include 'init.php';

$check_status = mysqli_query($conn,"SELECT * FROM products WHERE mode = 'regedit'");
$row = mysqli_fetch_assoc($check_status);

$version = $row['version'];
$status = $row['status'];
$download = $row['download'];
$sIDx = $row['apk_size'];


$uname = (isset($_GET['user'])) ? $_GET['user'] : '' ;

$pass = (isset($_GET['pass'])) ? $_GET['pass'] : '' ;

$uid = (isset($_GET['uid'])) ? $_GET['uid'] : '' ;

$acessAdm = $uname == "lincepc2" || $uname == "lincepc" || $uname == "Donyofc" || $uname == "brmods" || $uname == "goiana" || $uname == "PALHACO" || $uname == "Suporte1" || $uname == "Zezim";


if($acessAdm) {
 
} else {
    if($status == "ATT")
    {
        PlainDie("Servidor em manutenção!");
    }
    elseif($status == "OFF")
    {
        PlainDie("Servidor Offline!");
        
    }
}
//Username Validator
if($uname == null || preg_match("([a-zA-Z0-9]+)", $uname) === 0){
    PlainDie("Usuário inválido.");
}

//Password Validator
if($pass == null || !preg_match("([a-zA-Z0-9]+)", $pass) === 0){
    PlainDie("Senha inválida.");
}

$query = $conn->query("SELECT * FROM `tokens` WHERE `Username` = '".$uname."' AND `Password` = '".$pass."' AND `mode` = 'regedit'");
if($query->num_rows < 1){
	PlainDie("ﾠ");
}


$res = $query->fetch_assoc();
$vendedor = $res["Vendedor"];

if($res["UID2"] == "one device"){
		if($res["UID"] == NULL){
			$query = $conn->query("UPDATE `tokens` SET `UID` = '".$uid."' WHERE `Username` = '".$uname."' AND `Password` = '".$pass."' AND `mode` = 'regedit'");
		}elseif($res["UID"] != $uid) {

			PlainDie("Dispositivo não permitido.");
		}
} elseif($res["UID2"] == NULL){
	$query = $conn->query("UPDATE `tokens` SET `UID2` = '".$uid."' WHERE `Username` = '".$uname."' AND `Password` = '".$pass."' AND `mode` = 'regedit'");
} elseif($res["UID2"] != $uid) {
		
	if($res["UID"] == NULL){
			$query = $conn->query("UPDATE `tokens` SET `UID` = '".$uid."' WHERE `Username` = '".$uname."' AND `Password` = '".$pass."' AND `mode` = 'regedit'");
	}elseif($res["UID"] != $uid) 
	{
		PlainDie("Dispositivo não permitido.");
	}
}

$EndDate = strtotime($res["EndDate"]);
$DataHoje = strtotime(date("Y-m-d H:i:s"));
$DataFinal = 0;	
if($EndDate < $DataHoje){
	$query = $conn->query("UPDATE `tokens` SET `Expiry` = '".$DataFinal."' WHERE `Username` = '".$uname."' AND `Password` = '".$pass."' AND `mode` = 'regedit'");
		PlainDie("Sua licença expirou, renove para continuar usando.");
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

if($res['pause'] == 1)
{
   PlainDie("Usuário pausado.");
}

if($res['ban'] == 1)
{
  PlainDie("Usuário banido.");
}


PlainDie($res["UID"]);


