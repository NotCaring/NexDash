<?php

	/*
		Light Engine 1.0

		File: class.Panel.php
		Author: Wantows 
		Date: 27.02.2021
	*/

	if(!defined('lightengine'))
	{
		die('What are you doing here?');
	}
	
	define('MAX_RESULT', 50);
	
	require_once(BASE_PATH . 'config' . DIRECTORY_SEPARATOR . 'inc.config.php');
	
	define('DB_HOST'        , $config['db']['game']['host']);
	define('DB_NAME'        , $config['db']['game']['name']);
	define('DB_USER'        , $config['db']['game']['user']);
	define('DB_PASS'        , $config['db']['game']['pass']);

	define('ACC_HOST'        , $config['db']['account']['host']);
	define('ACC_NAME'        , $config['db']['account']['name']);
	define('ACC_USER'        , $config['db']['account']['user']);
	define('ACC_PASS'        , $config['db']['account']['pass']);
	
	
	function GetPanelMenu()
		{
			//$Menu = '<center><a class="btn btn-danger" href="index.php?act=panel&sact=guild">Manage Guilds</a><hr></center><br \>';
			$Menu.= Accounts();
			
			return $Menu;
		}
		
	
	function Admins()
	{
		$game_db = new PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME, DB_USER, DB_PASS, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
		
		$dbh = $game_db->prepare("SELECT * FROM account_login WHERE a_level > '0'");
		$dbh->execute();
		
		$Table.= '<div class="card-body p-0"><table class="table table-hover table-fixed">';
		$Table.= '<thead class="thead-dark">';
		$Table.= '<tr>';
		$Table.= '<th>Usuário</th>';
		$Table.= '<th>ADM Level</th>';
		$Table.= '<th>Ban</th>';
		$Table.= '</tr>';
		$Table.= '</thead><tbody>';
		
		while($row = $dbh->fetchObject())
			{
				$Table.= '<tr><td><a href="index.php?act=panel&sact=viewacc&id='.$row->name.'"><span style="text-transform: capitalize;">'.$row->name.'</span></a></td><td>'.$row->a_level.'</td><td>'.$row->ban.'</td></tr>';
			}

		$Table.= '</tbody></table></div>';
		return $Table;
	}
	function highCrystal()
	{
		$game_db = new PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME, DB_USER, DB_PASS, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
		
		$dbh = $game_db->prepare("SELECT * FROM account_login WHERE credits > '0' ORDER by credits DESC LIMIT 20");
		$dbh->execute();
		
		$Table.= '<div class="card-body p-0"><table class="table table-hover table-fixed">';
		$Table.= '<thead class="thead-dark">';
		$Table.= '<tr>';
		$Table.= '<th>Usuário</th>';
		$Table.= '<th>Créditos</th>';
		$Table.= '</tr>';
		$Table.= '</thead><tbody>';
		while($row = $dbh->fetchObject())
			{
				$Table.= '<tr><td><a href="index.php?act=panel&sact=viewacc&id='.$row->name.'"><span style="text-transform: capitalize;">'.$row->name.'</span></a></td><td>'.$row->credits.'</td></tr>';
			}
			

		$Table.= '</tbody></table></div>';			
		return $Table;
	}
	function GetBannedAccounts()
	{
		$game_db = new PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME, DB_USER, DB_PASS, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
		
		$dbh = $game_db->prepare("SELECT * FROM account_login WHERE ban = 1");
		$dbh->execute();
		
		$Table.= '<div class="card-body p-0"><table class="table table-hover table-fixed">';
		$Table.= '<thead class="thead-dark">';
		$Table.= '<tr>';
		$Table.= '<th>Usuários banidos</th>';
		$Table.= '</tr>';
		$Table.= '</thead><tbody>';
			
		while($oRow = $dbh->fetchObject())	
			{
				$Table.= '<tr><td><a href="index.php?act=panel&sact=viewacc&id='.$oRow->name.'">'.$oRow->name.'</a></td></tr>';
			}
				
		$Table.= '</tbody></table></div>';	
			
		return $Table;
	}
	function Todasascontas()
	{
		$game_db = new PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME, DB_USER, DB_PASS, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
		
		$dbh = $game_db->prepare("SELECT * FROM account_login WHERE ban = 0");
		$dbh->execute();
		
		$Table.= '<div class="card-body p-0"><table id="example" class="table table-hover table-fixed">';
		$Table.= '<thead class="thead-dark">';
		$Table.= '<tr>';
		$Table.= '<th>Todos os usuários | NÃO BANIDOS</th>';
		$Table.= '</tr>';
		$Table.= '</thead><tbody>';
			
		while($oRow = $dbh->fetchObject())	
			{
				$Table.= '<tr><td><a href="index.php?act=panel&sact=viewacc&id='.$oRow->name.'">'.$oRow->name.'</a></td></tr>';
			}
				
		$Table.= '</tbody></table></div>';	
			
		return $Table;
	}
	
	function Accounts()
	{
		if(!isset($_POST['search_act'])){
			$Template = '<div class="card-body"><form method="POST" action="">';
			$Template.= '<div class="position-relative row form-group"><label for="exampleEmail" class="col-sm-2 col-form-label">Palavra</label><div class="col-sm-10"><input class="form-control" type="text" name="key" /></div></div>';
			$Template.= '<div class="position-relative row form-group"><label for="exampleEmail" class="col-sm-2 col-form-label">Tipo</label><div class="col-sm-10"><select class="form-control" name="type"><option value="name">Usuário</option><option value="id">ID</option></select></div></div>';
			$Template.= '<div class="d-block text-right card-footer"><button type="submit" name="search_act" class="btn btn-primary btn-lg">Procurar</button></div>';
			$Template.= '</form></div>';
			
			
			$Template.= '<br />'.Admins();
			$Template.= '<br /><br />'.highCrystal();			
			$Template.= '<br /><br />'.GetBannedAccounts();			
			$Template.= '<br /><br />'.Todasascontas();			
			
			$Template.= '<br /><br />';
			return $Template;
		}elseif(isset($_POST['search_act'])){
			$Keyword = addslashes($_POST['key']);
			$Type = addslashes($_POST['type']);
		
			$Template = '<div class="card-body"><p>Keyword: [<b>'.$Keyword.'</b>] Type: [<b>'.$Type.'</b>] Limit: <b>'.MAX_RESULT.'</b></p></div><br />';
			$i = 1;
			
			
			$Template.= '<div class="card-body p-0"><table class="table table-hover table-fixed">';
			$Template.= '<thead class="thead-dark"><tr><th>Num</th><th>Usuário</th><th>ID</th><th>Email</th></tr></thead><tbody>';
			
			$game_db = new PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME, DB_USER, DB_PASS, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
	
			$dbh = $game_db->prepare("SELECT * FROM account_login WHERE $Type LIKE '%$Keyword%' ORDER by id DESC LIMIT 50 ");
			$dbh->execute();
			
				while($oRow = $dbh->fetchObject())
					{
						$Name = $oRow->name;
						$ID = $oRow->id;
						$email = $oRow->email;
					
						$Template.= '<tr><td>'.$i.'</td><td><a href="index.php?act=panel&sact=viewacc&id='.$Name.'"><span style="text-transform:capitalize">'.$Name.'</span></a></td><td>'.$ID.'</td><td>'.$email.'</td></tr>';
						$i++;
					}
			$Template.= '</tbody></table></div><br /><br />';
					
			return $Template;
		}
	}
	
	
	
	function ViewSells($Account){
		$game_db = new PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME, DB_USER, DB_PASS, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
		$gamedb = $game_db->prepare("SELECT * FROM tokens WHERE Vendedor = '$Account' ORDER BY id DESC");
		$gamedb->execute();
		
		$Table = '<table width="100%" id="example" class="table table-hover">';
		$Table.= '<thead class="thead-dark"><tr>';
		$Table.= '<th>Usuário</th><th>Data</th><th>Status</th><th>Modo</th><th>UIDs</th>';
		$Table.= '</tr></thead><tbody>';
		while($row_game = $gamedb->fetchObject()){
			$UserName = $row_game->Username;
			$FinalDate = $row_game->EndDate;
			$CreateDate = $row_game->StartDate;
			$Status = $row_game->ban;
			$Mode = $row_game->mode;
			$uid = '';
			if($row_game->UID2 == 'one device') {
				if($row_game->UID == NULL){
					$uid = '0/1'; 
				}else{
					$uid = '1/1';
				}
			}else {
				if($row_game->UID == NULL AND $row_game->UID2 == NULL){
					$uid = '0/2';
				} elseif($row_game->UID2 == NULL AND $row_game->UID != NULL){
					$uid = '1/2';
				} elseif($row_game->UID == NULL AND $row_game->UID2 != NULL){
					$uid = '1/2';
				} else{
					$uid = '2/2';
				}
			}
			
			$Hoje = strtotime(date("Y-m-d H:i:s"));
			$Venc = strtotime($row_game->EndDate);
			$Dias = 0;
			$Horas = 0;
			$Minutos = 0;
			$Segundos = 0;
			if($Venc > $Hoje){
				$dteHoje = date("Y-m-d H:i:s");
				$dteStartS = new DateTime($FinalDate);
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
			
			$Table.= '<tr>';
			$Table.= '<td>'.$UserName.'</td>';
			$Table.= '<td>'.$CreateDate.'</td>';
			if ($Status != 1){
				if ($Segundos >= 1){ 
					$Table.= '<td><div class="badge badge-pill badge-success">Ativo</div></td>';
				}else{
					$Table.= '<td><div class="badge badge-pill badge-info">Expirado</div></td>';
				}
			}else{
				$Table.= '<td><div class="badge badge-pill badge-danger">Banido</div></td>';
			}
			
			if ($Mode == 'script'){
				$Table.='<td><div class="badge badge-pill badge-secondary">SCRIPT</div></td>';
			}else if ($Mode == 'regedit'){
				$Table.='<td><div class="badge badge-pill badge-info">REGEDIT</div></td>';
			}else{
				$Table.='<td><div class="badge badge-pill badge-dark">MACRO</div></td>';
			}
			$Table.= '<td>'.$uid.'</td>';
			$Table.= '</tr>';
		}
		$Table.= '</tbody></table>';
		return $Table;
	}
	
	function ViewAccount($Account)
	{
		$game_db = new PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME, DB_USER, DB_PASS, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
		$gamedb = $game_db->prepare("SELECT * FROM account_login WHERE name = '$Account'");
		$gamedb->execute();
		
		$row_game = $gamedb->fetchObject();
		
		$gID = $row_game->id;
		
		$vendas = $game_db->prepare("SELECT count(*) as vendas FROM tokens WHERE Vendedor = '$row_game->name'");
		$vendas->execute();

		$vendasTotal = $vendas->fetchObject()->vendas;
		
		$AccName 		= $row_game->name;
		$Email 			= $row_game->email;
		$Ban 			= $row_game->ban;
		$Password		= $row_game->originalPassword;
		$GM				= $row_game->a_level;
		$Credit			= $row_game->credits;
		
		if($GM == 30) {
			$gmresult = "Vendedor";
		} else if($GM == 99){
			$gmresult = "Administrador";
		}
			
		
		if($Ban == 0){
			$Banned = '<font color="green"> Desbanido [<a href="index.php?act=panel&sact=banacc&id='.$Account.'"><b>BANIR</b></a>]</font>';
		}else{
			$Banned = '<font color="red">Banido [<a href="index.php?act=panel&sact=unbanacc&id='.$Account.'"><b>DESBANIR</b></a>]</font>';
		}
		
		
		$Table = '<div class="card-body"><h4>Informações da CONTA <b style="text-transform:capitalize">['.$AccName.']</b> ID: ['.$gID.']</h4></div>';
		
		$Table.= '<div class="card-body p-0"><table class="table table-hover table-fixed" style="text-align:center;">';
		$Table.= '<tr><th>Usuário:</th><td>'.$AccName.'</td></tr>';
		$Table.= '<tr><th>Senha:</th><td>'.$Password.'</td></tr>';
		$Table.= '<tr><th>Creditos:</th><td>'.$Credit.'  <small>&nbsp&nbsp;<a href="index.php?act=panel&sact=givepts&id='.$Account.'"><b>[Adicionar]</b></a> - <a href="index.php?act=panel&sact=takepts&id='.$Account.'"><b>[Remover]</b></a></small></td></tr>';
		
		$Table.= '<tr><th>Apagar:</th><td>'.'  <small>&nbsp&nbsp;<a href="index.php?act=panel&sact=delacc&id='.$Account.'"><b>[Remover Vendedor]</b></a></small></td></tr>';
		
		$Table.= '<tr><th>Banido:</th><td>'.$Banned.' </td></tr>';
		$Table.= '<tr><th>ADM Level:</th><td>'.$gmresult.' </th></tr>';
		$Table.= '<tr><th>Total de Vendas:</th><td>'.$vendasTotal.' </th></tr>';
		
		$Table.= '</table></div><br /><br />';
		$Table.= ViewSells($row_game->name);
		return $Table;
	}

    function DeleteAccount($Account)
	{
		$Table = '<div class="card-body"><form method="POST" action="index.php?act=panel">';
		$Table.= '<h1 class="singleH1"><small>Remover painel | CONTA : <font color"Firebrick"><b style="text-transform:capitalize">'.$Account.'</b></font></small></h1>';
		$Table.= '<hr class="sideContentRedLine">';
		$Table.= '<table id="items" class="table table-bordered table-striped" style="text-align:center;">';
		$Table.= '<tr><td>Usuário</td><td><input type="text" class="form-control" style="text-align:center;" name="acc_id" value="'.$Account.'" readonly /></td></tr>';
		$Table.= '<tr><th colspan="2"><center><input type="submit" style="cursor:pointer" class="btn btn-success" name="delete_account" value=" Remover! "  /></center></th></tr>';
		$Table.= '</table>';
		$Table.= '</form></div>';
	
		return $Table;
	}

	function GivePts($Account)
	{

		
		$Table = '<div class="card-body"><form method="POST" action="index.php?act=panel">';
		
		$Table.= '<h1 class="singleH1"><small>Adicionar Créditos | CONTA : <font color"Firebrick"><b style="text-transform:capitalize">'.$Account.'</b></font></small></h1>';
		$Table.= '<hr class="sideContentRedLine">';
		$Table.= '<table id="items" class="table table-bordered table-striped" style="text-align:center;">';
		$Table.= '<tr><td>Conta</td><td><input type="text" class="form-control" style="text-align:center;" name="acc_id" value="'.$Account.'" readonly /></td></tr>';
		$Table.= '<tr><td>Quantidade</td><td><input type="text" class="form-control" style="text-align:center;" name="amount" maxlength="10" /></td></tr><br />';
		$Table.= '<p><tr><th colspan="2"><input type="submit" style="cursor:pointer" class="btn btn-success" name="give_points" value=" Adicionar Créditos! " /></th></tr></p>';
		$Table.= '</table>';
		$Table.= '</form></div>';
	
		return $Table;
	}
	
		
	function TakePts($Account)
	{
		
		$Table = '<div class="card-body"><form method="POST" action="index.php?act=panel">';
	
		$Table.= '<h1 class="singleH1"><small>Remover Créditos | CONTA : <font color"Firebrick"><b style="text-transform:capitalize">'.$Account.'</b></font></small></h1>';
		$Table.= '<hr class="sideContentRedLine">';
		$Table.= '<table id="items" class="table table-bordered table-striped" style="text-align:center;">';
		$Table.= '<tr><td>Conta</td><td><input type="text" class="form-control" style="text-align:center;" name="acc_id" value="'.$Account.'" readonly /></td></tr>';
		$Table.= '<tr><td>Quantidade</td><td><input type="text" class="form-control" style="text-align:center;" name="amount" maxlength="10" /></td></tr>';
		$Table.= '<tr><th colspan="2"><center><input type="submit" style="cursor:pointer" class="btn btn-success" name="take_points" value=" Remover Créditos! " /></center></th></tr>';
		$Table.= '</table>';
		$Table.= '</form></div>';
	
		return $Table;
	}
	


	function BanAccount($Account)
	{
		$Table = '<div class="card-body"><form method="POST" action="index.php?act=panel">';
		$Table.= '<h1 class="singleH1"><small>Banir | CONTA : <font color"Firebrick"><b style="text-transform:capitalize">'.$Account.'</b></font></small></h1>';
		$Table.= '<hr class="sideContentRedLine">';
		$Table.= '<table id="items" class="table table-bordered table-striped" style="text-align:center;">';
		$Table.= '<tr><td>Usuário</td><td><input type="text" class="form-control" style="text-align:center;" name="acc_id" value="'.$Account.'" readonly /></td></tr>';
		$Table.= '<tr><td>Motivo</td><td><input type="text" class="form-control" name="reason" /></td></tr>';
		$Table.= '<tr><th colspan="2"><center><input type="submit" style="cursor:pointer" class="btn btn-success" name="ban_account" value=" Banir! "  /></center></th></tr>';
		$Table.= '</table>';
		$Table.= '</form></div>';
	
		return $Table;
	}
		
	function UnbanAccount($Account)
	{
		$Table = '<div class="card-body"><form method="POST" action="index.php?act=panel">';
		$Table.= '<h1 class="singleH1"><small>Desbanir | CONTA : <font color"Firebrick"><b style="text-transform:capitalize">'.$Account.'</b></font></small></h1>';
		$Table.= '<hr class="sideContentRedLine">';
		$Table.= '<table id="items" class="table table-bordered table-striped" style="text-align:center;">';
		$Table.= '<tr><td>Usuário</td><td><input type="text" class="form-control" style="text-align:center;" name="acc_id" value="'.$Account.'" readonly /></td></tr>';
		$Table.= '<tr><th colspan="2"><center><input type="submit" style="cursor:pointer" class="btn btn-success" name="unban_account" value=" Desbanir! "   /></center></th></tr>';
		$Table.= '</table>';
		$Table.= '</form></div>';
	
		return $Table;
	}
	
?>