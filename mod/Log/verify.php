
<?php

include('config.php');
error_reporting(0);
//==================================
$pUsuario = $conexao->real_escape_string($_GET['us']);
$pSenha = $conexao->real_escape_string($_GET['pa']);
$pToken1 = $conexao->real_escape_string($_GET['uid']);
$pToken2 = $conexao->real_escape_string($_GET['uid2']);
$pToken = $conexao->real_escape_string($_GET['tok']);
//==================================
$id = $_GET['id'];
$SQLGetUser = $odb -> prepare("SELECT * FROM tokens WHERE id = :id LIMIT 0");
$SQLGetUser -> execute(array(':id' => $_GET['id']));
$getInfo = $SQLGetUser -> fetch(PDO::FETCH_ASSOC);

$action = $_GET['action'];

function tokenverify(){
	$SelectTok = $odb -> prepare("SELECT * FROM tokens WHERE Username= '$pUsuario' AND Password = '$pSenha'");
	$SelectTok -> execute();
	$rowsTok = $SQLGetUsers -> fetch(PDO::FETCH_ASSOC);
	$tokenOld = $rowsTok['token'];
	$token = "";
	if($tokenOld != $pToken){
		$UpdateSQL = $odb -> prepare("UPDATE `tokens` SET `token` = '".$pToken."' WHERE `Username` = '".$pUsuario."'");
		$UpdateSQL -> execute();
		$token = $pToken;
	} else{
		$token = $tokenOld;
	}
	
	return $token;
}

function meuip() 
{
	$ipaddress = '';
	if (isset($_SERVER['HTTP_CLIENT_IP']))
		$ipaddress = $_SERVER['HTTP_CLIENT_IP'];
	else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
		$ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
	else if(isset($_SERVER['HTTP_X_FORWARDED']))
		$ipaddress = $_SERVER['HTTP_X_FORWARDED'];
	else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
		$ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
	else if(isset($_SERVER['HTTP_FORWARDED']))
		$ipaddress = $_SERVER['HTTP_FORWARDED'];
	else if(isset($_SERVER['REMOTE_ADDR']))
		$ipaddress = $_SERVER['REMOTE_ADDR'];
	else
		$ipaddress = 'UNKNOWN';
	return $ipaddress;
}

function generateRandomString($length = 32) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

function generateRandomString2($length = 32) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

if(!$action)
{
	//echo '<pre>{"token:","'.$isTokens.'"}</pre>';
	//echo '<pre>{"return:","Fuck Lorazalora ^_^ #FUCKYOU!","ip:","'.meuip().'"}</pre>';
	Firewall::AddLog('Verify', 'IP ('.meuip().') Tentou acessar a pagina verify.php com action nulo Data:'. date('d/m/Y h:i:s'));
	die();
}
else
{	
	
	if($action == "connect")//AUTENTICAÇÃO COM DADOS SIMPLES.
	{		
		$query = $conexao->query("SELECT * FROM tokens WHERE Username = '$pUsuario' AND Password = '$pSenha' AND `mode` = 'injetor'");
		$verificar_login = $query->num_rows;
		if($verificar_login > 0)
		{
			$SQLGetUsers = $odb -> prepare("SELECT * FROM tokens WHERE Username= '$pUsuario' AND Password = '$pSenha' AND `mode` = 'injetor'");
			$SQLGetUsers -> execute();	
			while ($rows = $SQLGetUsers -> fetch(PDO::FETCH_ASSOC))
			{
			    $tokenOld = $rows['token'];
			    $TokenStatus = "";
				if($tokenOld == NULL){
					$UpdateSQL = $odb -> prepare("UPDATE `tokens` SET `token` = '".$pToken."' WHERE `Username` = '".$pUsuario."' AND `mode` = 'injetor'");
					$UpdateSQL -> execute();
					$TokenStatus = generateRandomString();
				}else{
					if($tokenOld == $pToken){
						$TokenStatus = $pToken;
					} else{
						$UpdateSQL = $odb -> prepare("UPDATE `tokens` SET `token` = '".$pToken."' WHERE `Username` = '".$pUsuario."' AND `mode` = 'injetor'");
						$UpdateSQL -> execute();
						$TokenStatus = generateRandomString();
						
					}
				}
				//fazendo autenticação	
				$query = $conexao->query("SELECT * FROM tokens WHERE Username = '$pUsuario' and UID = '$pToken1' AND `mode` = 'injetor'");
				$cToken1 = $query->num_rows;
				if($cToken1 > 0)
				{
					echo $TokenStatus;
					$UpdateSQL2 = $odb -> prepare("UPDATE `tokens` SET `token2` = '".$TokenStatus."' WHERE `Username` = '".$pUsuario."' AND `mode` = 'injetor'");
					$UpdateSQL2 -> execute();
					//echo ''.md5(logado_com_sucesso_in_lib).'';
				}
				else
				{
					$query = $conexao->query("SELECT * FROM tokens WHERE Username = '$pUsuario' and UID2 = '$pToken2' AND `mode` = 'injetor'");
					$cToken2 = $query->num_rows;
					if($cToken2 > 0)
					{
						echo $TokenStatus;
						$UpdateSQL2 = $odb -> prepare("UPDATE `tokens` SET `token2` = '".$TokenStatus."' WHERE `Username` = '".$pUsuario."' AND `mode` = 'injetor'");
						$UpdateSQL2 -> execute();
						//echo ''.md5(logado_com_sucesso_in_lib).'';
					}
					else
					{
						//echo '{"return:tokens","Fuck Lorazalora ^_^ #FUCKYOU!","ip:","'.meuip().'"}</pre>';	
						Firewall::AddLog('Verify', 'Account:[ User -> '.$pUsuario.' / Pass -> '.$pSenha.'] Token:[ Token1 -> '.$pToken1.' Token2 -> '.$pToken2.'] IP ('.meuip().') token inválido Data:'. date('d/m/Y h:i:s'));
						die();
					}
				}	
			}
		}
		else
		{
			Firewall::AddLog('Verify', 'Account:[ User -> '.$pUsuario.' / Pass -> '.$pSenha.'] Token:[ Token1 -> '.$pToken1.' Token2 -> '.$pToken2.'] IP ('.meuip().') Conta inválida Data:'. date('d/m/Y h:i:s'));
			die();
			//echo '<pre>{"return:request","Fuck Lorazalora ^_^ #FUCKYOU!","ip:","'.meuip().'"}</pre>';	
		}
	}
	
	if($action == "twover")//AUTENTICAÇÃO COM DADOS SIMPLES.
	{		
		$query = $conexao->query("SELECT * FROM tokens WHERE Username = '$pUsuario' AND Password = '$pSenha' AND `mode` = 'injetor'");
		$verificar_login = $query->num_rows;
		if($verificar_login > 0)
		{
			$SQLGetUsers = $odb -> prepare("SELECT * FROM tokens WHERE Username= '$pUsuario' AND Password = '$pSenha' AND `mode` = 'injetor'");
			$SQLGetUsers -> execute();	
			while ($rows = $SQLGetUsers -> fetch(PDO::FETCH_ASSOC))
			{
			    
				$tokenOld = $rows['token2'];
			    $TokenStt = "";
				if($tokenOld == NULL){
					$TokenStt = generateRandomString2();
					$UpdateSQL2 = $odb -> prepare("UPDATE `tokens` SET `token2` = '".$TokenStt."' WHERE `Username` = '".$pUsuario."' AND `mode` = 'mod'");
					$UpdateSQL2 -> execute();
				}else{
					if($tokenOld == $pToken){
						$TokenStt = generateRandomString2();
						$UpdateSQL2 = $odb -> prepare("UPDATE `tokens` SET `token2` = '".$TokenStt."' WHERE `Username` = '".$pUsuario."' AND `mode` = 'injetor'");
						$UpdateSQL2 -> execute();
					} else{
						$TokenStt = $pToken;
					}
				}
				//fazendo autenticação	
				$query = $conexao->query("SELECT * FROM tokens WHERE Username = '$pUsuario' and UID = '$pToken1' AND `mode` = 'injetor'");
				$cToken1 = $query->num_rows;
				if($cToken1 > 0)
				{
					
					echo $TokenStt;
					
					//echo ''.md5(logado_com_sucesso_in_lib).'';
				}
				else
				{
					$query = $conexao->query("SELECT * FROM tokens WHERE Username = '$pUsuario' and UID2 = '$pToken2' AND `mode` = 'injetor'");
					$cToken2 = $query->num_rows;
					if($cToken2 > 0)
					{
						
						echo $TokenStt;
						
						//echo ''.md5(logado_com_sucesso_in_lib).'';
					}
					else
					{
						//echo '{"return:tokens","Fuck Lorazalora ^_^ #FUCKYOU!","ip:","'.meuip().'"}</pre>';	
						Firewall::AddLog('Verify2', 'Account:[ User -> '.$pUsuario.' / Pass -> '.$pSenha.'] Token:[ Token1 -> '.$pToken1.' Token2 -> '.$pToken2.'] IP ('.meuip().') token inválido Data:'. date('d/m/Y h:i:s'));
						die();
					}
				}	
				
			}
		}
		else
		{
			Firewall::AddLog('Verify', 'Account:[ User -> '.$pUsuario.' / Pass -> '.$pSenha.'] Token:[ Token1 -> '.$pToken1.' Token2 -> '.$pToken2.'] IP ('.meuip().') Conta inválida Data:'. date('d/m/Y h:i:s'));
			die();
			//echo '<pre>{"return:request","Fuck Lorazalora ^_^ #FUCKYOU!","ip:","'.meuip().'"}</pre>';	
		}
	}
	
	else if($action == "status")//VERIFICAR STATUS DO MOD
	{		
		$SQLStatus = $odb -> prepare("SELECT * FROM `products` WHERE mode = 'mod'");
		$SQLStatus -> execute();	
		while ($getStatus = $SQLStatus -> fetch(PDO::FETCH_ASSOC))
		{
			$pStatus = $getStatus['status'];
			if($pStatus == "ON"){
			    $isStatus = "ONLINE";
			}else{
				$isStatus = "OFFLINE";
			}
			echo "$isStatus";
		}
	}
	
	else if($action == "in_game_msg")//VERIFICAR STATUS DO MOD
	{		
		$SQLMsg = $odb -> prepare("SELECT * FROM `ingame_msg`");
		$SQLMsg -> execute();	
		while ($getMsg = $SQLMsg -> fetch(PDO::FETCH_ASSOC))
		{
			$pStatus = $getMsg['status'];
			if($pStatus == "TRUE"){
			    $isStatus = $getMsg['msg'];
			}else{
				$isStatus = "FALSE";
			}
			echo "$isStatus";
		}
	}
	
	//BYPASS CLOUDFLARE / VPN > PEGAR IP.
	else if($action == "ip_address")
	{
		echo meuip();
	}
	
}

?>