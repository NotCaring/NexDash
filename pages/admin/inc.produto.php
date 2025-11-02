<?php
/*
	Light Engine 1.0

	File: inc.produto.php
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


$error = array();
$success = array();

$getID = GET_Integer('id');

$date = date("d/m/Y H:i");

$cheats = array();

$sql = $game_db->prepare('SELECT * FROM products WHERE id=?');
$sql->bindParam(1, $getID);
$sql->execute();

while ($row = $sql->fetchObject()){
	$cheats[] = array(
		'id' => $row->id,
		'img' => $row->img,
		'gamename' => $row->gamename,
		'version' => $row->version,
		'mode' => $row->mode,
		'update' => $row->last_update,
		'status' => $row->status,
		'download' => $row->download,
		'size' => $row->apk_size,
	);
}

if(isset($_POST['form']))
{
	if(isset($_SERVER['HTTP_CF_CONNECTING_IP'])){
		$ip = $_SERVER['HTTP_CF_CONNECTING_IP'];
	}else{
		$ip=$_SERVER['REMOTE_ADDR'];
	}
	
	$img 				= POST_String('img');
	$gamename 			= POST_String('gamename');
	$version 			= POST_String('version');
	$modo 				= POST_String('mode');
	$download 			= POST_String('download');
	$last_update 		= POST_String('last_update');
	$status 			= POST_String('status');
	$size 				= POST_Integer('size');
	
	if (empty($img) || empty($gamename) || empty($version) || empty($modo) || empty($last_update) || empty($status) || empty($download))
	{
		$error[] = 'Preencha todos os campos!';
	}
	else
	{
		if (!preg_match('|^[0-9]+$|i', $size) || !preg_match('|^[A-Z0-9]+$|i', $gamename) || !preg_match('|^[A-Z0-9]+$|i', $modo) || !preg_match('|^[A-Z0-9]+$|i', $status))
		{
			$error[] = 'Você digitou um campo inválido! Use apenas números e letras!';
		}
	}
	
	if($modo != 'regedit' && $modo != 'x86' && $modo != 'script' && $modo != 'injetor'){
		$error[] = 'Você digitou um modo inválido!';
	}
	
	if (count($error) == 0)
	{
		
		$dbh = $game_db->prepare('UPDATE products SET img=?, gamename=?, version=?, mode=?, download=?, last_update=?, status=?, apk_size=? WHERE id=?');
		$dbh->bindParam(1, $img);
		$dbh->bindParam(2, $gamename);
		$dbh->bindParam(3, $version);
		$dbh->bindParam(4, $modo);
		$dbh->bindParam(5, $download);
		$dbh->bindParam(6, $last_update);
		$dbh->bindParam(7, $status);
		$dbh->bindParam(8, $size);
		$dbh->bindParam(9, $getID);
		
		if($dbh->execute()){
			$success[] = 'Produto atualizado com sucesso';
			//Firewall::AddLog('Painel-EditarProduto', 'Account:['.$auth->getLogin().'] - ('.$auth->getGmLevel().')  IP ('.$ip.') Editou o produto '.$getID.' | Data:'. date('d/m/Y h:i:s'));
			header( "Refresh:2; url=index.php?act=admin", true, 303);
		}
	}
}

$breadcrumbs = array(
	array('url' => 'index.php?act=account', 'caption' => 'Dashboard'),
	array('url' => 'index.php?act=admin', 'caption' => 'Administração'),
	array('url' => '', 'caption' => 'Editar produto'),
);


$smarty->assign('pagename', 'Editar produto');
$smarty->assign('breadcrumbs', $breadcrumbs);
$smarty->assign('active', 'admin');
$smarty->assign('cheats', $cheats);
$smarty->assign('error', $error);
$smarty->assign('success', $success);
$smarty->assign('getID', $getID);
$smarty->assign('date', date("Y-m-d H:i:s"));
$smarty->display('pages/admin/produto.tpl');
?>