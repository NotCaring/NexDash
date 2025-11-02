<?php

if(!defined('lightengine'))
{
	die('What are you doing here?');
}

if (!$auth->getLoggedIn())
{
	header('location: index.php?act=login');
	return;
}

$id = $auth->getId();
$Date = date("Y-m-d H:i:s");


$dbh = $game_db->prepare('SELECT a_level, email FROM account_login WHERE id=?');

$dbh->bindParam(1, $id);


$dbh->execute();


$row = $dbh->fetchObject();


$jmes = $row->a_level;
$email = trim($row->email);

$devi = 'one device';

$tks = $game_db->prepare('SELECT COUNT(*) AS valid FROM tokens WHERE EndDate > ? AND UID2 = ? AND Vendedor = ?');
$tks->bindParam(1, $Date);
$tks->bindParam(2, $devi);
$tks->bindParam(3, $auth->getLogin());

$tkse = $game_db->prepare('SELECT COUNT(*) AS expirad FROM tokens WHERE EndDate < ? AND UID2 = ? AND Vendedor=?');
$tkse->bindParam(1, $Date);
$tkse->bindParam(2, $devi);
$tkse->bindParam(3, $auth->getLogin());


///////////////////////////////////////////////////


$tks_2 = $game_db->prepare('SELECT COUNT(*) AS valid FROM tokens WHERE EndDate > ? AND (UID2 IS NULL OR UID2 != ?) AND Vendedor=?');
$tks_2->bindParam(1, $Date);
$tks_2->bindParam(2, $devi);
$tks_2->bindParam(3, $auth->getLogin());

$tkse_2 = $game_db->prepare('SELECT COUNT(*) AS expirad FROM tokens WHERE EndDate < ? AND (UID2 IS NULL OR UID2 != ?) AND Vendedor=?');
$tkse_2->bindParam(1, $Date);
$tkse_2->bindParam(2, $devi);
$tkse_2->bindParam(3, $auth->getLogin());

if($auth->getIsAdmin()){
	$tks = $game_db->prepare('SELECT COUNT(*) AS valid FROM tokens WHERE EndDate > ? AND UID2 = ?');
	$tks->bindParam(1, $Date);
	$tks->bindParam(2, $devi);

	$tkse = $game_db->prepare('SELECT COUNT(*) AS expirad FROM tokens WHERE EndDate < ? AND UID2 = ?');
	$tkse->bindParam(1, $Date);
	$tkse->bindParam(2, $devi);
	
	
	///////////////////////////////////////////////////
	
	
	$tks_2 = $game_db->prepare('SELECT COUNT(*) AS valid FROM tokens WHERE EndDate > ? AND (UID2 IS NULL OR UID2 != ?)');
	$tks_2->bindParam(1, $Date);
	$tks_2->bindParam(2, $devi);

	$tkse_2 = $game_db->prepare('SELECT COUNT(*) AS expirad FROM tokens WHERE EndDate < ? AND (UID2 IS NULL OR UID2 != ?)');
	$tkse_2->bindParam(1, $Date);
	$tkse_2->bindParam(2, $devi);
}

$tks->execute();
$tkrow = $tks->fetchObject();
$tkse->execute();
$tkerow = $tkse->fetchObject();

$validos_1dev = $tkrow->valid;
$expirados_1dev = $tkerow->expirad;
if($validos_1dev < 1){
	$validos_1dev = 0;
}
if($expirados_1dev < 1){
	$expirados_1dev = 0;
}

$total_1dev = ($validos_1dev + $expirados_1dev) * $config['price']['mod']['1UID'];
$total_2dev = ($validos_2dev + $expirados_2dev) * $config['price']['mod']['2UID'];

///////////////////////////////////////////////////

$tks_2->execute();
$tkrow_2 = $tks_2->fetchObject();
$tkse_2->execute();
$tkerow_2 = $tkse_2->fetchObject();

$validos_2dev = $tkrow_2->valid;
$expirados_2dev = $tkerow_2->expirad;
if($validos_2dev < 1){
	$validos_2dev = 0;
}
if($expirados_2dev < 1){
	$expirados_2dev = 0;
}

$total_1dev = ($validos_1dev + $expirados_1dev) * $config['price']['x86']['1UID'];
$total_2dev = ($validos_2dev + $expirados_2dev) * $config['price']['x86']['2UID'];

$total = (($total_1dev + $total_2dev) * 25);

if($auth->getIsAdmin()){
	$total = (($total_1dev + $total_2dev) * 25);
}

$total_valid = ($validos_1dev + $validos_2dev);
$total_exp = ($expirados_1dev + $expirados_2dev);

$modinfo = array();

$gn = 'FreeFire';
$prod = $game_db->prepare('SELECT * FROM products');

$prod->execute();

while($prow = $prod->fetchObject())
{
	$modinfo[] = array(
			'lastupdate'     => trim($prow->last_update),
			'version'   => trim($prow->version),
			'status'   => trim($prow->status),
			'type' => trim($prow->mode),
			'download'    => trim($prow->download),
	);
}

$account = array(
	'login' => $auth->getLogin(),
	'jmes' => $jmes,
	'email' => (empty($email) ? 'Not specified' : $email),
	'validos' => $total_valid,
	'expirados' => $total_exp,
	'total' => number_format($total,0,'', ','),
	'total2' => number_format($total2,0,'', ','),
);

$Rank = 0;
$rankVar = array();
$arrayRank = array();

$rsql = $game_db->prepare('SELECT * FROM account_login');
$rsql->execute();

while($rrow = $rsql->fetchObject())
{
	$vendas = $auth->rankVendas($rrow->name);
	$user = $rrow->name;
	$arrayRank[] = array(
		'usuario' => $user,
		'vendas' => $vendas
	);
}

$RankColumn = array();
foreach ($arrayRank as $key => $row) {
	$RankColumn[$key]  = $row['vendas'];
}

array_multisort($RankColumn, SORT_DESC, $arrayRank);

foreach ($arrayRank as $Ranking) {
	$Rank ++;
	$rankVar[] = array(
		'rank' => $Rank,
		'user' => $Ranking['usuario'],
		'vendas' => $Ranking['vendas'],
	);
	if($Rank > 4){ break;} 
}
								
$lastsells = array();		
$lsts = $game_db->prepare('SELECT * FROM tokens ORDER BY id DESC LIMIT 5');
$lsts->execute();

while($lrow = $lsts->fetchObject())
{
	$lastsells[] = array(
		'user' => $lrow->Username,
		'vendedor' => $lrow->Vendedor,
		'data' => $lrow->StartDate,
		'modo' => $lrow->mode,
	);
}


$breadcrumbs = array(
	array('url' => '', 'caption' => 'Dashboard'),
);


$smarty->assign('pagename', 'Dashboard');
$smarty->assign('breadcrumbs', $breadcrumbs);
$smarty->assign('active', 'account');
$smarty->assign('account', $account);
$smarty->assign('modinfo', $modinfo);
$smarty->assign('rank', $rankVar);
$smarty->assign('lastsell', $lastsells);
$smarty->display('pages/account/account.tpl');

?>