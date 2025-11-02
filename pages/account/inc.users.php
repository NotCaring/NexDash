<?php

/*

	File: inc.users.php
	Author: Wantows
	Date: 17.05.2021
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

$usuarios = array();
$pagination = array();
$error = array();
$success = array();

$number = 0;
$numberAdm = 0;
$sRows = 10;
$uid = '';
$Search = '';
$From = '';

if(isset($_GET['rows'])){
	$sRows = GET_Integer('rows');
}

$resetAll = false;
$selectBool = false;
$banBoolT = false;
$banBoolF = false;
$delBool = false;

// APAGAR USUÁRIO
if(isset($_GET['delete'])){
	$resetUser = GET_String('delete');
	$count = 0;
	if($auth->getIsAdmin()){
		$rst = $game_db->prepare("SELECT COUNT(*) as number FROM tokens WHERE Username=?");
		$rst->bindParam(1, $resetUser);
		$rst->execute();
		$count = $rst->fetchObject()->number;
	}else{
		$rst = $game_db->prepare("SELECT COUNT(*) as number FROM tokens WHERE Username=? AND Vendedor = ?");
		$rst->bindParam(1, $resetUser);
		$rst->bindParam(2, $auth->getLogin());
		$rst->execute();
		$count = $rst->fetchObject()->number;
	}
	
	if($count > 0){
		
		if($auth->getIsAdmin()){
			
			$rst1 = $game_db->prepare("DELETE FROM tokens WHERE Username=?");
			$rst1->bindParam(1, $resetUser);
			if($rst1->execute()){
				$dateLog = date("Y-m-d H:i:s");
				$auth->Admin_AddLog("Deletou usuário", $auth->getLogin(), $resetUser, $dateLog, "Nenhuma");
				$delBool = true;
			}
			
		}else{
			
			$rst2 = $game_db->prepare("DELETE FROM tokens WHERE Username=? AND Vendedor=?");
			$rst2->bindParam(1, $resetUser);
			$rst2->bindParam(2, $auth->getLogin());
			if($rst2->execute()){
				$dateLog = date("Y-m-d H:i:s");
				$auth->AddLog("Deletou usuário", $auth->getLogin(), $resetUser, $dateLog, "Nenhuma");
				$delBool = true;
			}
			
		}
	}else{
		$error[] = 'Usuário inválido ou não pertence a sua conta.';
	}
	
	if($delBool){
		$success[] = 'Usuário deletado com sucesso.';
	}
}

// DESBANIR USUÁRIO
if(isset($_GET['unban'])){
	$resetUser = GET_String('unban');
	$count = 0;
	if($auth->getIsAdmin()){
		$rst = $game_db->prepare("SELECT COUNT(*) as number FROM tokens WHERE Username=?");
		$rst->bindParam(1, $resetUser);
		$rst->execute();
		$count = $rst->fetchObject()->number;
	}else{
		$rst = $game_db->prepare("SELECT COUNT(*) as number FROM tokens WHERE Username=? AND Vendedor = ?");
		$rst->bindParam(1, $resetUser);
		$rst->bindParam(2, $auth->getLogin());
		$rst->execute();
		$count = $rst->fetchObject()->number;
	}
	
	if($count > 0){
		$rsts = $game_db->prepare("SELECT ban FROM tokens WHERE Username=?");
		$rsts->bindParam(1, $resetUser);
		$rsts->execute();
		
		$ban = $rsts->fetchObject()->ban;
		
		if($auth->getIsAdmin()){
			
			if($ban == 1){
				$rst1 = $game_db->prepare("UPDATE tokens SET ban = '0' WHERE Username=?");
				$rst1->bindParam(1, $resetUser);
				if($rst1->execute()){
					$dateLog = date("Y-m-d H:i:s");
					$auth->Admin_AddLog("[USERS]Desbaniu usuário", $auth->getLogin(), $resetUser, $dateLog, "Nenhuma");
					$banBoolT = true;
				}
			}else{
				$banBoolF = true;
			}
			
		}else{
			
			if($ban == 1){
				$rst2 = $game_db->prepare("UPDATE tokens SET ban = '0' WHERE Username=? AND Vendedor=?");
				$rst2->bindParam(1, $resetUser);
				$rst2->bindParam(2, $auth->getLogin());
				if($rst2->execute()){
					$dateLog = date("Y-m-d H:i:s");
					$auth->AddLog("[USERS]Desbaniu usuário", $auth->getLogin(), $resetUser, $dateLog, "Nenhuma");
					$banBoolT = true;
				}
			}else{
				$banBoolF = true;
			}
			
		}
	}else{
		$error[] = 'Usuário inválido ou não pertence a sua conta.';
	}
	
	if($banBoolT){
		$success[] = 'Usuário desbanido com sucesso.';
	}
	if($banBoolF){
		$error[] = 'Este usuário não está banido.';
	}
}

// BANIR USUÁRIO
if(isset($_GET['ban'])){
	$resetUser = GET_String('ban');
	$count = 0;
	if($auth->getIsAdmin()){
		$rst = $game_db->prepare("SELECT COUNT(*) as number FROM tokens WHERE Username=?");
		$rst->bindParam(1, $resetUser);
		$rst->execute();
		$count = $rst->fetchObject()->number;
	}else{
		$rst = $game_db->prepare("SELECT COUNT(*) as number FROM tokens WHERE Username=? AND Vendedor = ?");
		$rst->bindParam(1, $resetUser);
		$rst->bindParam(2, $auth->getLogin());
		$rst->execute();
		$count = $rst->fetchObject()->number;
	}
	
	if($count > 0){
		$rsts = $game_db->prepare("SELECT ban FROM tokens WHERE Username=?");
		$rsts->bindParam(1, $resetUser);
		$rsts->execute();
		
		$ban = $rsts->fetchObject()->ban;
		
		if($auth->getIsAdmin()){
			
			if($ban == 0){
				$rst1 = $game_db->prepare("UPDATE tokens SET ban = '1' WHERE Username=?");
				$rst1->bindParam(1, $resetUser);
				if($rst1->execute()){
					$dateLog = date("Y-m-d H:i:s");
					$auth->Admin_AddLog("[USERS]Baniu usuário", $auth->getLogin(), $resetUser, $dateLog, "Nenhuma");
					$banBoolT = true;
				}
			}else{
				$banBoolF = true;
			}
			
		}else{
			
			if($ban == 0){
				$rst2 = $game_db->prepare("UPDATE tokens SET ban = '1' WHERE Username=? AND Vendedor=?");
				$rst2->bindParam(1, $resetUser);
				$rst2->bindParam(2, $auth->getLogin());
				if($rst2->execute()){
					$dateLog = date("Y-m-d H:i:s");
					$auth->AddLog("[USERS]Baniu usuário", $auth->getLogin(), $resetUser, $dateLog, "Nenhuma");
					$banBoolT = true;
				}
			}else{
				$banBoolF = true;
			}
			
		}
	}else{
		$error[] = 'Usuário inválido ou não pertence a sua conta.';
	}
	
	if($banBoolT){
		$success[] = 'Usuário banido com sucesso.';
	}
	if($banBoolF){
		$error[] = 'Este usuário já está banido.';
	}
}

// RESETAR TODOS OS USUÁRIOS
if(isset($_GET['reset'])){
	$resetall = GET_String('reset');
	
	if($resetall === 'all'){
		if($auth->getIsAdmin()){
			$rst1 = $game_db->prepare("UPDATE tokens SET UID = NULL WHERE UID2 = 'one device'");
			
			$rst2 = $game_db->prepare("UPDATE tokens SET UID = NULL, UID2 = NULL WHERE UID2 != 'one device' OR UID2 IS NULL");
			
			if($rst1->execute() && $rst2->execute()){
				$dateLog = date("Y-m-d H:i:s");
				$auth->Admin_AddLog("Resetou todos", $auth->getLogin(), "Nenhum", $dateLog, "Resetou todos os usuários");
				$resetAll = true;
			}
		}else{
			$rst1 = $game_db->prepare("UPDATE tokens SET UID = NULL WHERE UID2 = 'one device' AND Vendedor = ?");
			$rst1->bindParam(1, $auth->getLogin());
			
			$rst2 = $game_db->prepare("UPDATE tokens SET UID = NULL, UID2 = NULL WHERE UID2 <> 'one device' OR UID2 IS NULL AND Vendedor = ?");
			$rst2->bindParam(1, $auth->getLogin());
			
			if($rst1->execute() && $rst2->execute()){
				$dateLog = date("Y-m-d H:i:s");
				$auth->AddLog("Resetou todos", $auth->getLogin(), "Nenhum", $dateLog, "Resetou todos os usuários");
				$resetAll = true;
			}
		}
	}else{
		$error[] = 'Comando inválido, você não pode resetar todos os usuários.';
	}
	
	if($resetAll){
		$success[] = 'Todos os usuários foram resetados.';
	}
}

// RESETAR USUÁRIO
if(isset($_GET['resetuid'])){
	$resetUser = GET_String('resetuid');
	$count = 0;
	$Devices = 0;
	if($auth->getIsAdmin()){
		$rst = $game_db->prepare("SELECT COUNT(*) as number FROM tokens WHERE Username=?");
		$rst->bindParam(1, $resetUser);
		$rst->execute();
		$count = $rst->fetchObject()->number;
	}else{
		$rst = $game_db->prepare("SELECT COUNT(*) as number FROM tokens WHERE Username=? AND Vendedor = ?");
		$rst->bindParam(1, $resetUser);
		$rst->bindParam(2, $auth->getLogin());
		$rst->execute();
		$count = $rst->fetchObject()->number;
	}
	
	if($count > 0){
		$rsts = $game_db->prepare("SELECT UID2 FROM tokens WHERE Username=?");
		$rsts->bindParam(1, $resetUser);
		$rsts->execute();
		
		if($rsts->fetchObject()->UID2 === 'one device'){
			$Devices = 1;
		}else{
			$Devices = 2;
		}
		
		if($auth->getIsAdmin()){
			
			switch($Devices){
				case 1:
					$rst1 = $game_db->prepare("UPDATE tokens SET UID = NULL WHERE Username=?");
					$rst1->bindParam(1, $resetUser);
					break;
				case 2:
					$rst1 = $game_db->prepare("UPDATE tokens SET UID = NULL, UID2 = NULL WHERE Username=?");
					$rst1->bindParam(1, $resetUser);
					break;
					
				default:
					break;
			}
			
			if($rst1->execute()){
				$dateLog = date("Y-m-d H:i:s");
				$auth->Admin_AddLog("Resetou usuário", $auth->getLogin(), $resetUser, $dateLog, "Nenhuma");
				$resetAll = true;
			}
			
		}else{
			switch($Devices){
				case 1:
					$rst2 = $game_db->prepare("UPDATE tokens SET UID = NULL WHERE Username=? AND Vendedor=?");
					$rst2->bindParam(1, $resetUser);
					$rst2->bindParam(2, $auth->getLogin());
					break;
				case 2:
					$rst2 = $game_db->prepare("UPDATE tokens SET UID = NULL, UID2 = NULL WHERE Username=? AND Vendedor=?");
					$rst2->bindParam(1, $resetUser);
					$rst2->bindParam(2, $auth->getLogin());
					break;
					
				default:
					break;
			}
			
			if($rst2->execute()){
				$dateLog = date("Y-m-d H:i:s");
				$auth->AddLog("Resetou usuário", $auth->getLogin(), $resetUser, $dateLog, "Nenhuma");
				$resetAll = true;
			}
		}
	}else{
		$error[] = 'Usuário inválido ou não pertence a sua conta.';
	}
	
	if($resetAll){
		$success[] = 'Usuário resetado com sucesso.';
	}
}

// PAUSAR TODAS AS KEYS
if(isset($_GET["pauseall"])){
	$pauseall = GET_String("pauseall");
	
	if($pauseall === "all"){
		if($auth->getIsAdmin()){
			$rst1 = $game_db->prepare("UPDATE tokens SET pause = 1, pausedate = NOW() WHERE pause = 0");
			
			if($rst1->execute()){
				$dateLog = date("Y-m-d H:i:s");
				$auth->Admin_AddLog("Pauser todos", $auth->getLogin(), "Nenhum", $dateLog, "Pausou todos os usuários");
				$resetAll = true;
			}
		}else{
			$rst1 = $game_db->prepare("UPDATE tokens SET pause = 1, pausedate = NOW() WHERE pause = 0 AND Vendedor = ?");
			$rst1->bindParam(1, $auth->getLogin());
			
			if($rst1->execute()){
				$dateLog = date("Y-m-d H:i:s");
				$auth->AddLog("Pausou todos", $auth->getLogin(), "Nenhum", $dateLog, "Pausou todos os usuários");
				$resetAll = true;
			}
		}
	}else{
		$error[] = 'Comando inválido, você não pode pausar todos os usuários.';
	}
	
	if($resetAll){
		$success[] = 'Todos os usuários foram pausados.';
	}
}

// DESPAUSAR TODAS AS KEYS
if(isset($_GET["unpauseall"])){
	$unpauseall = GET_String("unpauseall");
	
	if($unpauseall === "all"){
		if($auth->getIsAdmin()){
			$rst1 = $game_db->prepare("UPDATE tokens SET EndDate = DATE_ADD(EndDate, INTERVAL TIMESTAMPDIFF(SECOND, pausedate, NOW()) SECOND), pause = 0, pausedate = NULL WHERE pause = 1");
			
			if($rst1->execute()){
				$dateLog = date("Y-m-d H:i:s");
				$auth->Admin_AddLog("Despausou todos", $auth->getLogin(), "Nenhum", $dateLog, "Despausou todos os usuários");
				$resetAll = true;
			}
		}else{
			$rst1 = $game_db->prepare("UPDATE tokens SET EndDate = DATE_ADD(EndDate, INTERVAL TIMESTAMPDIFF(SECOND, pausedate, NOW()) SECOND), pause = 0, pausedate = NULL WHERE pause = 1 AND Vendedor = ?");
			$rst1->bindParam(1, $auth->getLogin());
			
			if($rst1->execute()){
				$dateLog = date("Y-m-d H:i:s");
				$auth->AddLog("Despausou todos", $auth->getLogin(), "Nenhum", $dateLog, "Despausou todos os usuários");
				$resetAll = true;
			}
		}
	}else{
		$error[] = 'Comando inválido, você não pode despausar todos os usuários.';
	}
	
	if($resetAll){
		$success[] = 'Todos os usuários foram despausados.';
	}
}

// DELETAR SELECIONADOS
if (isset($_POST["del_select"])) {
	$selectBool = false;
	if (isset($_POST["select"])) {
		if($auth->getIsAdmin()){
			foreach ($_POST["select"] as $selectID) {
				$stdel = $game_db->prepare("DELETE FROM tokens WHERE Username=?");
				$stdel->bindParam(1, $selectID);
				if ($stdel->execute()) {
					$dateLog = date("Y-m-d H:i:s");
					$auth->Admin_AddLog("Deletou selecionados", $auth->getLogin(), $selectID, $dateLog, "Nenhuma");
					$selectBool = true;
				}
			}
		}else{
			foreach ($_POST["select"] as $selectID) {
				$userlogado = $auth->getLogin();
				$stdel = $game_db->prepare("DELETE FROM tokens WHERE Username=? AND Vendedor=?");
				$stdel->bindParam(1, $selectID);
				$stdel->bindParam(2, $userlogado);
				if ($stdel->execute()) {
					$dateLog = date("Y-m-d H:i:s");
					$auth->AddLog("Deletou selecionados", $auth->getLogin(), $selectID, $dateLog, "Nenhuma");
					$selectBool = true;
				}
			}
		}
		
		if($selectBool){
			$success[] = 'Usuários selecionados deletados.';
		}
	}
}

// RESETAR SELECIONADOS
if (isset($_POST['reset_select'])) {
	$Devices = 0;
	if (isset($_POST['select'])) {
		if($auth->getIsAdmin()){
			foreach ($_POST['select'] as $selectID) {
				
				$dsel = $game_db->prepare("SELECT * FROM tokens WHERE Username=?");
				$dsel->bindParam(1, $selectID);
				$dsel->execute();
				$rows = $dsel->fetchObject();
				if($rows->UID2 == 'one device'){
					$Devices = 1;
				}else{
					$Devices = 2;
				}
				
				switch($Devices){
					case 1:
						$stdel = $game_db->prepare("UPDATE tokens SET UID = NULL WHERE Username=?");
						$stdel->bindParam(1, $selectID);
						break;
					case 2:
						$stdel = $game_db->prepare("UPDATE tokens SET UID = NULL, UID2 = NULL WHERE Username=?");
						$stdel->bindParam(1, $selectID);
						break;
						
					default:
						break;
				}
				
				if ($stdel->execute()) {
					$dateLog = date("Y-m-d H:i:s");
					$auth->Admin_AddLog("Resetou selecionados", $auth->getLogin(), $selectID, $dateLog, "Nenhuma");
					$selectBool = true;
				}
			}
		}else{
			foreach ($_POST['select'] as $selectID) {
				$userlogado = $auth->getLogin();
				$dsel = $game_db->prepare("SELECT * FROM tokens WHERE Username= ? AND Vendedor = ?");
				$dsel->bindParam(1, $selectID);
				$dsel->bindParam(2, $userlogado);
				$dsel->execute();
				$rows = $dsel->fetchObject();
				if($rows->UID2 == 'one device'){
					$Devices = 1;
				}else{
					$Devices = 2;
				}
				
				switch($Devices){
					case 1:
						$stdel = $game_db->prepare("UPDATE tokens SET UID = NULL WHERE Username=? AND Vendedor=?");
						$stdel->bindParam(1, $selectID);
						$stdel->bindParam(2, $userlogado);
						break;
					case 2:
						$stdel = $game_db->prepare("UPDATE tokens SET UID = NULL, UID2 = NULL WHERE Username=? AND Vendedor=?");
						$stdel->bindParam(1, $selectID);
						$stdel->bindParam(2, $userlogado);
						break;
						
					default:
						break;
				}
				
				if ($stdel->execute()) {
					$dateLog = date("Y-m-d H:i:s");
					$auth->AddLog("Resetou selecionados", $auth->getLogin(), $selectID, $dateLog, "Nenhuma");
					$selectBool = true;
				}
			}
		}
		
		if($selectBool){
			$success[] = 'Usuários selecionados foram resetados.';
		}
	}
}

// ADMIN FUNÇÕES
if($auth->getIsAdmin() || $auth->getIsMod()){
	// DELETAR SELECIONADOS
	if (isset($_POST['del_select'])) {
		if (isset($_POST['select'])) {
			foreach ($_POST['select'] as $selectID) {
				$stdel = $game_db->prepare("DELETE FROM tokens WHERE Username=?");
				$stdel->bindParam(1, $selectID);
				if ($stdel->execute()) {
					$dateLog = date("Y-m-d H:i:s");
					$auth->Admin_AddLog("Deletou selecionados", $auth->getLogin(), $selectID, $dateLog, "Nenhuma");
					$selectBool = true;
				}
			}
			
			if($selectBool){
				$success[] = 'Usuários selecionados deletados.';
			}
	
		}
	}	
	
	// BANIR SELECIONADOS
	if (isset($_POST['ban_select'])) {
		if (isset($_POST['select'])) {
			foreach ($_POST['select'] as $selectID) {
				$stdel = $game_db->prepare("UPDATE tokens SET ban = '1' WHERE Username=?");
				$stdel->bindParam(1, $selectID);
				if ($stdel->execute()) {
					$selectBool = true;
				}
			}
			
			if($selectBool){
				$success[] = 'Usuários selecionados foram banidos.';
			}
		}
	}	
	
	// DESBANIR SELECIONADOS
	if (isset($_POST['unban_select'])) {
		if (isset($_POST['select'])) {
			foreach ($_POST['select'] as $selectID) {
				$stdel = $game_db->prepare("UPDATE tokens SET ban = '0' WHERE Username=?");
				$stdel->bindParam(1, $selectID);
				if ($stdel->execute()) {
					$selectBool = true;
				}
			}
			
			if($selectBool){
				$success[] = 'Usuários selecionados foram desbanidos.';
			}
		}
	}	
}
	
if (isset($_GET['search']) == true && isset($_GET['from']) == true) {
	$Texto = GET_String('search');
	$Coluna = GET_String('from');
	$Login = $auth->getLogin();
	
	if (empty($Texto))
	{
		$error[] = 'Preencha todos os campos!';
	}else{
		if (!preg_match('|^[A-Z0-9]+$|i', $Texto))
		{
			$error[] = 'Pesquisa inválida! Use apenas números e letras!';
		}
	}
	
	if (empty($Coluna))
	{
		$error[] = 'Preencha todos os campos!';
	}else{
		if (!preg_match('|^[A-Z0-9]+$|i', $Coluna))
		{
			$error[] = 'Pesquisa inválida! Use apenas números e letras!';
		}
	}
	
	if(count($error) == 0){
		$Search = $Texto;
		$From = $Coluna;
		
		if(!$auth->getIsAdmin()){
			$stmt = $game_db->prepare("SELECT COUNT(*) AS number FROM tokens WHERE $Coluna LIKE '%$Texto%' AND Vendedor = '$Login'");
			$stmt->execute();
			$number = $stmt->fetchObject()->number;
			
			if($number < 1){
				$error[] = 'Nenhum usuário encontrado!';
			}
			
			$pagination = CreatePagination(GET_Integer('page'), $number, $sRows);
		}
		
		if($auth->getIsAdmin()){
			$stmtAdm = $game_db->prepare("SELECT COUNT(*) AS number FROM tokens WHERE $Coluna LIKE '%$Texto%'");
			$stmtAdm->execute();
			$numberAdm = $stmtAdm->fetchObject()->number;
			
			$pagination = CreatePagination(GET_Integer('page'), $numberAdm, $sRows);
			if($numberAdm < 1){
				$error[] = 'Nenhum usuário encontrado!';
			}
		}
		
		$dbh = $game_db->prepare("SELECT * FROM tokens WHERE $Coluna LIKE '%$Texto%' AND Vendedor = '$Login' ORDER BY id ASC LIMIT " . $pagination['page_start'] . "," . $pagination['page_size']);

		if($auth->getIsAdmin()){
			$dbh = $game_db->prepare("SELECT * FROM tokens WHERE $Coluna LIKE '%$Texto%' ORDER BY id ASC LIMIT " . $pagination['page_start'] . "," . $pagination['page_size']);
		}
		
		$dbh->execute();
		
		while ($row = $dbh->fetchObject())
		{
			
			if($row->UID2 == 'one device') {
				if($row->UID == NULL){
					$uid = '0/1'; 
				}else{
					$uid = '1/1';
				}
			}else {
				if($row->UID == NULL AND $row->UID2 == NULL){
					$uid = '0/2';
				} elseif($row->UID2 == NULL AND $row->UID != NULL){
					$uid = '1/2';
				} elseif($row->UID == NULL AND $row->UID2 != NULL){
					$uid = '1/2';
				} else{
					$uid = '2/2';
				}
			}
			
			$Hoje = strtotime(date("Y-m-d H:i:s"));
			$Venc = strtotime($row->EndDate);
			$Dias = 0;
			if($Venc > $Hoje){
				$CalcDias = ($Venc - $Hoje) /86400;
				$Dias = round($CalcDias, 0);
			}
			
			$usuarios[] = array(
				'id' => $row->id,
				'user' => $row->Username,
				'device' => $uid,
				'datainicial' => $row->StartDate,
				'dias' => $Dias,
				'status' => $row->ban,
				'mode' => $row->mode,
				'vendedor' => $row->Vendedor,
				'pause' => $row->pause,
			);
		}
	}
} else {
	
	if(!$auth->getIsAdmin()){
		$stmt = $game_db->prepare('SELECT COUNT(*) AS number FROM tokens WHERE Vendedor = ?');
		$stmt->bindParam(1, $auth->getLogin());
		$stmt->execute();
		$number = $stmt->fetchObject()->number;
		
		$pagination = CreatePagination(GET_Integer('page'), $number, $sRows);
		
		if($number < 1){
			$error[] = 'Nenhum usuário encontrado!';
		}
	}
	
	if($auth->getIsAdmin()){
		$stmtAdm = $game_db->prepare('SELECT COUNT(*) AS number FROM tokens');
		$stmtAdm->execute();
		$numberAdm = $stmtAdm->fetchObject()->number;
		
		$pagination = CreatePagination(GET_Integer('page'), $numberAdm, $sRows);
		if($numberAdm < 1){
			$error[] = 'Nenhum usuário encontrado!';
		}
	}
	

	$dbh = $game_db->prepare('SELECT * FROM tokens WHERE Vendedor = ? ORDER BY id ASC LIMIT ' . $pagination['page_start'] . ',' . $pagination['page_size']);
	$dbh->bindParam(1, $auth->getLogin());

	if($auth->getIsAdmin()){
		$dbh = $game_db->prepare('SELECT * FROM tokens ORDER BY id ASC LIMIT ' . $pagination['page_start'] . ',' . $pagination['page_size']);
		//$dbh->bindParam(1, $auth->getLogin());
	}
	
	$dbh->execute();
	
	while ($row = $dbh->fetchObject())
	{
		
		if($row->UID2 == 'one device') {
			if($row->UID == NULL){
				$uid = '0/1'; 
			}else{
				$uid = '1/1';
			}
		}else {
			if($row->UID == NULL AND $row->UID2 == NULL){
				$uid = '0/2';
			} elseif($row->UID2 == NULL AND $row->UID != NULL){
				$uid = '1/2';
			} elseif($row->UID == NULL AND $row->UID2 != NULL){
				$uid = '1/2';
			} else{
				$uid = '2/2';
			}
		}
		$UserData = $row->EndDate;
		$PauseData = $row->pausedate;
		
		$Hoje = strtotime(date("Y-m-d H:i:s"));
		$Venc = strtotime($row->EndDate);
		$Dias = 0;
		$Horas = 0;
		$Minutos = 0;
		$Segundos = 0;
		if($Venc > $Hoje){
			$dteHoje = date("Y-m-d H:i:s");
			$dteStartS = new DateTime($UserData);
			$dteEndS   = new DateTime($dteHoje);
			$CalcD = $dteStartS->diff($dteEndS);
			
			$Dias = $CalcD->format("%a");
			$Horas = $CalcD->format("%H");
			$Minutos = $CalcD->format("%I");
			$Segundos = $CalcD->format("%S");
		}else{
			$Dias = 0;
			$Horas = 0;
			$Minutos = 0;
			$Segundos = 0;
		}
		
		$DiasPsd = 0;
		$HorasPsd = 0;
		$MinutosPsd = 0;
		$SegundosPsd = 0;
		
		if($row->pause){
			$dteHojePsd = $PauseData;
			$dteStartSPsd = new DateTime($UserData);
			$dteEndSPsd   = new DateTime($dteHojePsd);
			$CalcDPsd = $dteStartSPsd->diff($dteEndSPsd);
			
			$DiasPsd = $CalcDPsd->format("%a");
			$HorasPsd = $CalcDPsd->format("%H");
			$MinutosPsd = $CalcDPsd->format("%I");
			$SegundosPsd = $CalcDPsd->format("%S");
		}
		
		$usuarios[] = array(
			'id' => $row->id,
			'user' => $row->Username,
			'device' => $uid,
			'datainicial' => $row->StartDate,
			'dias' => $Dias,
			'horas' => $Horas,
			'minutos' => $Minutos,
			'segundos' => $Segundos,
			'diasP' => $DiasPsd,
			'horasP' => $HorasPsd,
			'minutosP' => $MinutosPsd,
			'segundosP' => $SegundosPsd,
			'status' => $row->ban,
			'mode' => $row->mode,
			'vendedor' => $row->Vendedor,
			'pause' => $row->pause,
		);
	}
}

$breadcrumbs = array(
	array('url' => 'index.php?act=account', 'caption' => 'Dashboard'),
	array('url' => '', 'caption' => 'Gerenciar usuários'),
);

$smarty->assign('pagename', 'Gerenciar usuários');
$smarty->assign('breadcrumbs', $breadcrumbs);
$smarty->assign('active', 'users');
$smarty->assign('pagination', $pagination);
$smarty->assign('usuarios', $usuarios);
$smarty->assign('rows', $sRows);
$smarty->assign('search', $Search);
$smarty->assign('from', $From);
$smarty->assign('error', $error);
$smarty->assign('success', $success);
$smarty->display('pages/account/users.tpl');

?>