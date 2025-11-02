<?php

/*
	Light Engine 1.0

	File: inc.referral.php
	Author: Wantows 
	Date: 04.26.2021
*/

if(!defined('lightengine'))
{
	die('What are you doing here?');
}


if (!$auth->getLoggedIn())
{
	header('location: index.php?act=404');
	return;
}

$ip = $_SERVER['REMOTE_ADDR'];

$ato_id = $auth->getActId();

$dbh = $account_db->prepare('SELECT COUNT(id) AS value FROM account_login WHERE refered_by='.$ato_id.' AND register_ip!=\''.$ip.'\'');
$dbh->execute();

$invited = $dbh->fetchObject();
$count = $invited->value;

//$smarty->assign('count', $count[0]);

$smarty->assign('ref', array(
	'count' => $count,
	'login' => $auth->getLogin()
));
$breadcrumbs = array(
	array('url' => 'index.php', 'caption' => 'Main page'),
	array('url' => 'index.php?act=account', 'caption' => 'My account'),
	array('url' => '', 'caption' => 'Referral'),
);


$smarty->assign('pagename', 'Referral');
$smarty->assign('breadcrumbs', $breadcrumbs);
$smarty->assign('active', 'referral');
$smarty->assign('userid', $ato_id);
$smarty->display('pages/account/referral.tpl');

?>