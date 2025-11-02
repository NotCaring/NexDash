<?php

/*
	
	File: inc.adduser.php
	Author: Wantows
	Date: 06.05.2020
*/

if(!defined('lightengine'))
{
	die('What are you doing here?');
}

if (!$auth->getLoggedIn())
{
	header('location: index.php?act=login');
	return;
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

$error = array();
$success = array();

if (isset($_POST['newuser_form']))
{
	$date 		= date("Y-m-d H:i:s");
	$dias_validade = POST_Integer('dias_validade');
	if (empty($dias_validade) || $dias_validade <= 0)
	{
		$dias_validade = 10; // Valor padrão se não for fornecido ou for inválido
	}
	$expira 	= Date('Y-m-d H:i:s', strtotime('+' . $dias_validade . ' days'));
	$login 		= POST_String('usuario');
	$password 	= POST_String('senha');
	$device 	= POST_Integer('device');
	$mode 		= POST_String('modo');
	
	if (empty($login))
	{
		$error[] = 'Você não digitou o usuário!';
	}
	else
	{
		$length = strlen($login);
		if ($length < 4 || $length > 10)
		{
			$error[] = 'O comprimento do usuário deve ser de 5 a 10 caracteres!';
		}
		else
		{
			if (!preg_match('|^[A-Z0-9]+$|i', $login))
			{
				$error[] = 'Você digitou um usuário inválido! Use apenas números e letras!';
			}
		}
	}

	if (empty($password))
	{
		$error[] = 'Você não digitou a senha!';
	}
	else
	{
		$length = strlen($password);
		if ($length < 4 || $length > 10)
		{
			$error[] = 'O comprimento da senha deve ser de 4 a 10 caracteres!';
		}
		else
		{
			if (!preg_match('|^[A-Z0-9]+$|i', $password))
			{
				$error[] = 'Você digitou uma senha incorreta! Use apenas números e letras!';
			}
		}
	}
	
	if (empty($mode))
	{
		$error[] = 'Você não selecionou o modo da conta!';
	}
	else
	{
		
		if ($mode != 'regedit' && $mode != 'script' && $mode != 'x86' && $mode != 'injetor')
		{
			$error[] = $mode.' Você selecionou um modo incorreto!';
		}
		else
		{
			if (!preg_match('|^[A-Z-0-9]+$|i', $mode))
			{
				$error[] = 'Você digitou um modo inválido! Use apenas letras!';
			}
		}
	}
	
	if (empty($device))
	{
		$error[] = 'Você não selecionou a quantidade de aparelhos!';
	}
	else
	{
		
		if ($device != 1 && $device != 2)
		{
			$error[] = $device.' Quantidade de aparelhos incorreta!';
		}
		else
		{
			if (!preg_match('|^[0-9]+$|i', $device))
			{
				$error[] = 'Você digitou a quantidade inválida! Use apenas números!';
			}
		}
	}
	
	if (!CheckRecaptcha($config['recaptcha']['private_key']))
	{
		$error[] = 'Confirme que você não é um robô.';
	}
	
	if (count($error) == 0)
	{
		$dbh = $game_db->prepare('SELECT COUNT(id) as counter FROM tokens WHERE Username=UPPER(?)');
		$dbh->bindParam(1, strtoupper($login));
		$dbh->execute();
		$row = $dbh->fetchObject();
		
		if ($row->counter > 0)
		{
			$error[] = 'A conta <strong>' . $login . '</strong> já existe!';
		}
		
		$dbhcd = $game_db->prepare("SELECT credits FROM account_login WHERE name = ?");
		$dbhcd->bindParam(1, $auth->getLogin());
		$dbhcd->execute();		
		
		$row = $dbhcd->fetchObject();
		if($row->credits < 1){
			$error[] = 'Créditos insuficientes';
		}
		
		if ($mode == 'regedit')
		{
			if($device === 1){
				if($row->credits < $config['price']['regedit']['1UID']){
					$error[] = 'Créditos insuficientes, são necessários <b>' .$config['price']['regedit']['1UID']. '</b> créditos para criar uma conta no modo REGEDIT com um aparelho!';
				}
			}else{
				if($row->credits < $config['price']['regedit']['2UID']){
					$error[] = 'Créditos insuficientes, são necessários <b>' .$config['price']['regedit']['2UID']. '</b> créditos para criar uma conta no modo REGEDIT com dois aparelhos!';
				}
			}
		}
		
		if ($mode == 'injetor')
		{
			if($device === 1){
				if($row->credits < $config['price']['injetor']['1UID']){
					$error[] = 'Créditos insuficientes, são necessários <b>' .$config['price']['injetor']['1UID']. '</b> créditos para criar uma conta no modo INJETOR MOBILE com um aparelho!';
				}
			}else{
				if($row->credits < $config['price']['injetor']['2UID']){
					$error[] = 'Créditos insuficientes, são necessários <b>' .$config['price']['injetor']['2UID']. '</b> créditos para criar uma conta no modo INJETOR MOBILE com dois aparelhos!';
				}
			}
			
		}
		
		if ($mode == 'x86')
		{
			if($device === 1){
				if($row->credits < $config['price']['x86']['1UID']){
					$error[] = 'Créditos insuficientes, são necessários <b>' .$config['price']['x86']['1UID']. '</b> créditos para criar uma conta no modo INJETOR EMULADOR com um aparelho!';
				}
			}else{
				if($row->credits < $config['price']['x86']['2UID']){
					$error[] = 'Créditos insuficientes, são necessários <b>' .$config['price']['x86']['2UID']. '</b> créditos para criar uma conta no modo INJETOR EMULADOR com dois aparelhos!';
				}
			}
			
		}
		
		if ($mode == 'script')
		{
			if($device === 1){
				if($row->credits < $config['price']['script']['1UID']){
					$error[] = 'Créditos insuficientes, são necessários <b>' .$config['price']['script']['1UID']. '</b> créditos para criar uma conta no modo SCRIPT com um aparelho!';
				}
			}else{
				if($row->credits < $config['price']['script']['2UID']){
					$error[] = 'Créditos insuficientes, são necessários <b>' .$config['price']['script']['2UID']. '</b> créditos para criar uma conta no modo SCRIPT com dois aparelhos!';
				}
			}
		}
	}
	
	if (count($error) == 0)
	{
		$creditos = 0;
		$modo = '';
		$aparelho = '';
		
		$onedev = 'one device';
		
		
		
		if ($mode == 'injetor'){
			if($device === 1 ){
				$creditos = $config['price']['injetor']['1UID'];
			}else{
				$creditos = $config['price']['injetor']['2UID'];
			}
			$modo = 'INJETOR MOBILE';
		}
		
		if ($mode == 'regedit')
		{
			if($device === 1 ){
				$creditos = $config['price']['regedit']['1UID'];
			}else{
				$creditos = $config['price']['regedit']['2UID'];
			}
			$modo = 'REGEDIT';
		}
		
		if ($mode == 'injetor')
		{
			if($device === 1 ){
				$creditos = $config['price']['injetor']['1UID'];
			}else{
				$creditos = $config['price']['injetor']['2UID'];
			}
			$modo = 'INJETOR MOBILE';
		}
		
		if ($mode == 'x86')
		{
			if($device === 1 ){
				$creditos = $config['price']['x86']['1UID'];
			}else{
				$creditos = $config['price']['x86']['2UID'];
			}
			$modo = 'INJETOR EMULADOR';
		}
		
		if ($mode == 'script')
		{
			if($device === 1 ){
				$creditos = $config['price']['script']['1UID'];
			}else{
				$creditos = $config['price']['script']['2UID'];
			}
			$modo = 'SCRIPT';
		}
		
		$dbhc = $game_db->prepare("SELECT credits FROM account_login WHERE name = ?");
		$dbhc->bindParam(1, $auth->getLogin());
		$dbhc->execute();		
		
		$row = $dbhc->fetchObject();
		if($row->credits >= $creditos){
			$sth = $game_db->prepare('UPDATE account_login SET credits = credits - ? WHERE name=?');
			$sth->bindParam(1, $creditos);
			$sth->bindParam(2, $auth->getLogin());

			if($sth->execute()){
				if($device === 1){
					$aparelho = 'um aparelho';
					$dbh = $game_db->prepare('INSERT INTO tokens (Username, Password, StartDate, EndDate, UID2, Expiry, Vendedor, mode) VALUES (?,?,?,?, ?, 10, ?, ?)');
					$dbh->bindParam(1, $login);
					$dbh->bindParam(2, $password);
					$dbh->bindParam(3, $date);
					$dbh->bindParam(4, $expira);
					$dbh->bindParam(5, $onedev);
					$dbh->bindParam(6, $auth->getLogin());
					$dbh->bindParam(7, $mode);
					$dbh->execute();
				}else{
					$aparelho = 'dois aparelhos';
					$dbh = $game_db->prepare('INSERT INTO tokens (Username, Password, StartDate, EndDate, UID2, Expiry, Vendedor, mode) VALUES (?,?,?,?, NULL, 10, ?, ?)');
					$dbh->bindParam(1, $login);
					$dbh->bindParam(2, $password);
					$dbh->bindParam(3, $date);
					$dbh->bindParam(4, $expira);
					$dbh->bindParam(5, $auth->getLogin());
					$dbh->bindParam(6, $mode);
					$dbh->execute();
					
				}
				$auth->AddLog("Adicionou usuário", $auth->getLogin(), $login, $date, $aparelho);
		
				$success[] = 'Usuário <strong>' . $login . '</strong> Adicionado no modo <strong>'.$modo.'</strong> Válido por 10 DIAS com conta válida para '.$aparelho.'.';
				
				header('refresh:3;url=index.php?act=users');
			}
		}
	}
}

$breadcrumbs = array(
	array('url' => 'index.php?act=account', 'caption' => 'Dashboard'),
	array('url' => '', 'caption' => 'Adicionar usuário'),
);


$smarty->assign('pagename', 'Adicionar usuário');
$smarty->assign('breadcrumbs', $breadcrumbs);
$smarty->assign('recaptcha_key', $config['recaptcha']['public_key']);
$smarty->assign('active', 'adduser2');
$smarty->assign('error', $error);
$smarty->assign('success', $success);
$smarty->assign('inj_1dev', $config['price']['regedit']['1UID']);
$smarty->assign('inj_2dev', $config['price']['regedit']['2UID']);
$smarty->assign('injetor_1dev', $config['price']['injetor']['1UID']);
$smarty->assign('injetor_2dev', $config['price']['injetor']['2UID']);
$smarty->assign('x86_1dev', $config['price']['x86']['1UID']);
$smarty->assign('x86_2dev', $config['price']['x86']['2UID']);
$smarty->assign('script_1dev', $config['price']['script']['1UID']);
$smarty->assign('script_2dev', $config['price']['script']['2UID']);
$smarty->display('pages/account/adduser.tpl');

?>

