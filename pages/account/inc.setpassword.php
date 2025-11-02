<?php

if(!defined('lightengine'))
{
	die('What are you doing here?');
}

if ($auth->getLoggedIn())
{
	header('location: index.php?act=account');
	return;
}

$hash = GET_String('hash');

if (empty($hash) || !preg_match('/^[a-fA-F0-9]{32}$/i', $hash))
{
	header('location: index.php?act=404');
	return;
}

$dbh = $light_db->prepare('SELECT COUNT(id) AS number FROM restore WHERE hash=?');
$dbh->bindParam(1, $hash);
$dbh->execute();
$row = $dbh->fetchObject();
if ($row->number != 1)
{
	header('location: index.php?act=404');
	return;
}

$sent = isset($_POST['form']);

$error = array();

if ($sent)
{

	
	$password = POST_String('password');

	
	$key = "";
	$salt = "";
	$Personalization = "";
	$blake2s = new BLAKE2s($key, $salt, $Personalization);	
	
	
	$repassword = POST_String('repassword');


	if (empty($password))
	{
		$error[] = 'Você não digitou uma nova senha!';
	}
	else
	{
		$length = strlen($password);
		if ($length < 4 || $length > 15)
		{
			$error[] = 'A nova senha deve ter entre 4 e 15 caracteres!';
		}
		else
		{
			if (!preg_match('|^[A-Z0-9]+$|i', $password))
			{
				$error = 'Você digitou uma nova senha incorreta! Use apenas números e letras!';
			}
		}
	}

	if (empty($repassword))
	{
		$error[] = 'Você não digitou a confirmação da senha!';
	}
	else
	{
		if (strcmp($repassword, $password) !== 0)
		{
			$error[] = 'As senhas que você digitou não coincidem!';
		}
	}

	
	if (!CheckRecaptcha($config['recaptcha']['private_key']))
	{
		$error[] = 'Confirme que você não é um robô.';
	}

	if (count($error) == 0)
	{
		
		$dbh = $light_db->prepare('SELECT account FROM restore WHERE hash=?');
		$dbh->bindParam(1, $hash);
		$dbh->execute();
		$row = $dbh->fetchObject();

		
		$login = $row->account;

		
		$hashed_password = $blake2s->hash($password);

		
		$dbh = $game_db->prepare('UPDATE account_login SET originalPassword=?, password=UPPER(?) WHERE name=?');
		$dbh->bindParam(1, $password);
		$dbh->bindParam(2, $hashed_password);
		$dbh->bindParam(3, $login);
		$dbh->execute();

	
		$dbh = $light_db->prepare('DELETE FROM restore WHERE hash=?');
		$dbh->bindParam(1, $hash);
		$dbh->execute();
	}


	$smarty->assign('error', $error);
}


$breadcrumbs = array(
	array('url' => 'index.php', 'caption' => 'Home'),
	array('url' => 'index.php?act=restore', 'caption' => 'Restaurar conta'),
	array('url' => '', 'caption' => 'Recuperar senha'),
);

$smarty->assign('pagename', 'Recuperar senha');
$smarty->assign('breadcrumbs', $breadcrumbs);
$smarty->assign('active', 'index');
$smarty->assign('recaptcha_key', $config['recaptcha']['public_key']);
$smarty->assign('hash', $hash);
$smarty->assign('sent', $sent);
$smarty->assign('error', $error);
$smarty->display('pages/account/setpassword.tpl');
?>