<?php

if(!defined('lightengine'))
{
	die('What are you doing here?');
}

require_once(BASE_PATH . 'class' . DIRECTORY_SEPARATOR . 'class.smtpmailer.php');

if ($auth->getLoggedIn())
{
	header('location: index.php?act=account');
	return;
}

$hash = GET_String('hash');

if (!ValidateHash($hash))
{
	header('location: index.php?act=404');
	return;
}

$dbh = $light_db->prepare('SELECT COUNT(id) AS number FROM activation WHERE hash=?');
$dbh->bindParam(1, $hash);
$dbh->execute();
$row = $dbh->fetchObject();
if ($row->number != 1)
{
	header('location: index.php?act=404');
	return;
}


$dbh = $light_db->prepare('SELECT account, email FROM activation WHERE hash=?');
$dbh->bindParam(1, $hash);
$dbh->execute();
$row = $dbh->fetchObject();
$login = $row->account;
$email = $row->email;

$dbh = $game_db->prepare('UPDATE account_login SET ban=0 WHERE name=?');
$dbh->bindParam(1, $login);
$dbh->execute();

$dbh = $light_db->prepare('DELETE FROM activation WHERE hash=?');
$dbh->bindParam(1, $hash);
$dbh->execute();

$smarty->assign('login', $login);

$mail = new CSmtpMailer();
$mail->setHost($config['smtp']['host'], $config['smtp']['port']);
$mail->setUser($config['smtp']['login'], $config['smtp']['password']);
$mail->setFromName($config['server_name']);
$mail->setSubject($config['server_name'].' - Sua conta foi ativada');
$mail->setBody($smarty->fetch('email/activation.tpl'));
$mail->addAddress($email);
$mail->Send();


$breadcrumbs = array(
	array('url' => 'index.php', 'caption' => 'Home'),
	array('url' => 'index.php?act=register', 'caption' => 'Registro'),
	array('url' => '', 'caption' => 'Ativação da conta'),
);

$smarty->assign('pagename', 'Ativação da conta');
$smarty->assign('breadcrumbs', $breadcrumbs);
$smarty->assign('active', 'register');
$smarty->display('pages/account/activation_ok.tpl');

?>