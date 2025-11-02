<?php

if(!defined('lightengine'))
{
	die('What are you doing here?');
}

$breadcrumbs = array(
	array('url' => 'index.php', 'caption' => 'Main page'),
	array('url' => '', 'caption' => 'Error'),
);

$smarty->assign('pagename', 'Error');
$smarty->assign('breadcrumbs', $breadcrumbs);
$smarty->assign('active', 'index');
$smarty->display('pages/404.tpl');

?>