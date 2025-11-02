<?php

/*
	Light Engine 1.0

	File: index.php
	Author: Wantows
	Date: 04/05/2020
*/

if(!defined('lightengine'))
{
	die('What are you doing here?');
}

header('Location: index.php?act=login');


$smarty->assign('pagename', 'Home');
$smarty->assign('breadcrumbs', $breadcrumbs);
$smarty->assign('active', 'index');
$smarty->assign('recaptcha_key', $config['recaptcha']['public_key']);
$smarty->assign('news', $news);
$smarty->assign('pagination', $pagination);
$smarty->display('pages/index.tpl');

?>