<?php
/*
	Light Engine 1.0

	File: inc.logs.php
	Author: Wantows
	Date: 04/05/2020
*/

if(!defined('lightengine'))
{
	die('What are you doing here?');
}

if (!$auth->getLoggedIn())
{
	header('location: index.php?act=login');
}

if (!$auth->getIsAdmin())
{
	header('location: index.php?action=dashboard');
}

$logs = array();

$sql = $game_db->prepare('SELECT * FROM logs ORDER BY id DESC');
$sql->execute();

while ($row = $sql->fetchObject()){
	$logs[] = array(
		'id' => $row->id,
		'action' => $row->action,
		'username' => $row->username,
		'cliente' => $row->cliente,
		'data' => $row->data,
		'info_adicional' => $row->info_adicional
	);
}

$breadcrumbs = array(
	array('url' => 'index.php?act=account', 'caption' => 'Dashboard'),
	array('url' => 'index.php?act=admin', 'caption' => 'Administração'),
	array('url' => '', 'caption' => 'Logs dos usuários'),
);

$smarty->assign('pagename', 'Logs dos usuários');
$smarty->assign('breadcrumbs', $breadcrumbs);
$smarty->assign('active', 'admin');
$smarty->assign('logs', $logs);
$smarty->display('pages/admin/logs.tpl');
?>