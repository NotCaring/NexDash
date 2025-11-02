<?php

/*
	
	File: inc.editar.php
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

$UserEdit = GET_String('name');

function DevolverDias($data_pausada)
{
    
    $data_expira = date("Y-m-d H:i:s"); 
    
    $timestamp_dt_atual = strtotime($data_pausada);
     
    $dt_expira = date("Y-m-d H:i:s", strtotime($data_expira));
    $timestamp_dt_expira = strtotime($dt_expira);
    
    $data_inicio = new DateTime($data_pausada);
    $data_fim = new DateTime($dt_expira);
    
    // Resgata diferença entre as datas
    $dateInterval = $data_inicio->diff($data_fim);

    if($timestamp_dt_atual < $timestamp_dt_expira){
        return $dateInterval->days +0;
    }else{
        return "0"; 
        
    } 
}

function ChangeName($Account)
{
	$Template = '';
    	
    $Template.= '<center><form action="index.php?act=editar">';
    $Template.= '<input type="hidden" name="act" value="editar" />';
    $Template.= '<input type="hidden" name="name" value="'.$Account.'" />';
    $Template.= '<label><b>Nome atual:</b></label><input type="text" style="width:200px" class="form-control" value="'.$Account.'" readonly/>';
    $Template.= '<label><b>Novo nome:</b></label><input type="text" style="width:200px" class="form-control" name="change" />';
    $Template.= '<br><input type="submit" style="cursor:pointer" class="btn btn-success" value="Mudar nome"   />';
    $Template.= '</form></center><br />';
    	
    return $Template;
}
	
function meuip() 
{
	$ipaddress = '';
	if (isset($_SERVER['HTTP_CLIENT_IP']))
		$ipaddress = $_SERVER['HTTP_CLIENT_IP'];
	else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
		$ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
	else if(isset($_SERVER['HTTP_X_FORWARDED']))
		$ipaddress = $_SERVER['HTTP_X_FORWARDED'];
	else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
		$ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
	else if(isset($_SERVER['HTTP_FORWARDED']))
		$ipaddress = $_SERVER['HTTP_FORWARDED'];
	else if(isset($_SERVER['REMOTE_ADDR']))
		$ipaddress = $_SERVER['REMOTE_ADDR'];
	else
		$ipaddress = 'UNKNOWN';
	return $ipaddress;
}

function ChangePass($Account)
{
	$Template = '';
    	
    $Template.= '<center><form action="index.php?act=editar">';
    $Template.= '<input type="hidden" name="act" value="editar" />';
    $Template.= '<input type="hidden" name="name" value="'.$Account.'" />';
    $Template.= '<label><b>Nova senha:</b></label><input type="text" style="width:200px" class="form-control" name="changepass" />';
    $Template.= '<br><input type="submit" style="cursor:pointer" class="btn btn-success" value="Mudar senha"   />';
    $Template.= '</form></center><br />';
    	
    return $Template;
}

function ChangeMode($Account, $Mode)
{
	$Template = '';
    $Template.= '<center><form action="index.php?act=editar">';
    $Template.= '<input type="hidden" name="act" value="editar" />';
    $Template.= '<input type="hidden" name="name" value="'.$Account.'" />';
    $Template.= '<label><b>Selecionar novo modo:</b></label>';
    $Template.= '<select style="width:200px" name="changemodo" class="form-control">';
    if($Mode == 'regedit')
    {
    	$Template.= '<option value="x86">INJETOR EMULADOR</option>';
    	$Template.= '<option value="script">Script</option>';
        $Template.= '<option value="injetor">INJETOR MOBILE</option>';
    }
    elseif($Mode == 'x86')
    {
    	$Template.= '<option value="regedit">Regedit</option>';
    	$Template.= '<option value="script">Script</option>';
        $Template.= '<option value="injetor">INJETOR MOBILE</option>';
    }  
    elseif($Mode == 'injetor')
    {
    	$Template.= '<option value="regedit">Regedit</option>';
    	$Template.= '<option value="script">Script</option>';
        $Template.= '<option value="x86">INJETOR EMULADOR</option>';
    }
    else
    {
    	$Template.= '<option value="script">Script</option>';
    	$Template.= '<option value="x86">INJETOR EMULADOR</option>';
        $Template.= '<option value="injetor">INJETOR MOBILE</option>';
    	$Template.= '<option value="regedit">Regedit</option>';
    }
    $Template.= '</select>';
    $Template.= '<br><input type="submit" style="cursor:pointer" class="btn btn-success" value="Mudar modo"   />';
    $Template.= '</form></center><br />';
    	
    return $Template;
}

$usuarios = array();
$error = array();
$success = array();
$selectBool = false;
$selectBool2 = false;
$selectBoolF = false;

$count = 0;

if($auth->getIsAdmin()){
	$rst = $game_db->prepare("SELECT COUNT(id) as number FROM tokens WHERE Username=?");
	$rst->bindParam(1, $UserEdit);
	$rst->execute();
	$count = $rst->fetchObject()->number;
}else{
	$rst = $game_db->prepare("SELECT COUNT(id) as number FROM tokens WHERE Username=? AND Vendedor = ?");
	$rst->bindParam(1, $UserEdit);
	$rst->bindParam(2, $auth->getLogin());
	$rst->execute();
	$count = $rst->fetchObject()->number;
}

if ($count < 1)
{
	header('location: index.php?act=users');
	return;
}else{
	
	$dbh = $game_db->prepare('SELECT * FROM tokens WHERE Username = ? AND Vendedor=?');
	$dbh->bindParam(1, $UserEdit);
	$dbh->bindParam(2, $auth->getLogin());

	if($auth->getIsAdmin()){
		$dbh = $game_db->prepare('SELECT * FROM tokens WHERE Username=?');
		$dbh->bindParam(1, $UserEdit);
	}

	$dbh->execute();
	
	$Mod = '';
	$UserData;
	$PauseData;
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
		$VendedorData = $row->Vendedor;
		
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
			$dteEndSPsd   = new DateTime($PauseData);
			$CalcDPsd = $dteStartSPsd->diff($dteEndSPsd);
			
			$DiasPsd = $CalcDPsd->format("%a");
			$HorasPsd = $CalcDPsd->format("%H");
			$MinutosPsd = $CalcDPsd->format("%I");
			$SegundosPsd = $CalcDPsd->format("%S");
		}
		
		$Mod = $row->mode;
		$usuarios[] = array(
			'id' => $row->id,
			'user' => $row->Username,
			'password' => $row->Password,
			'mode' => $row->mode,
			'data' => $row->StartDate,
			'dteV' => $UserData,
			'dias' => $Dias,
			'horas' => $Horas,
			'minutos' => $Minutos,
			'segundos' => $Segundos,
			'diasP' => $DiasPsd,
			'horasP' => $HorasPsd,
			'minutosP' => $MinutosPsd,
			'segundosP' => $SegundosPsd,
			'status' => $row->ban,
			'pause' => $row->pause,
		);
	}
	
// PAUSAR CONTA

        if (isset($_GET['pause'])) {
            $pauseX = GET_String('pause');
            $dateHoje = date("Y-m-d H:i:s");
            
            $Hojes = strtotime(date("Y-m-d H:i:s"));
            $Vencs = strtotime($UserData);
            
            $DiasP = 0;
            if($pauseX == 1){
                if($Vencs > $Hojes){
                    $stdel = $game_db->prepare("UPDATE tokens SET pause = '1', pausedate=? WHERE Username=?");
                    $stdel->bindParam(1, $dateHoje);
                    $stdel->bindParam(2, $UserEdit);
                    if ($stdel->execute()) {
                        $auth->AddLog("Pausou usuário", $auth->getLogin(), $UserEdit, $dateHoje, "Nenhuma");
                        $success[] = 'Usuário pausado com sucesso.';
                        header( "Refresh:2; url=index.php?act=editar&name=".$UserEdit, true, 303);
                    }
                }else{
                    $error[] = 'Conta expirada, não foi possível executar esta ação.';
                }
            } elseif ($pauseX == 2) {
    
                // Verifica se o usuário existe e se precisa reset
                $sql = "SELECT * FROM tokens WHERE Username = ? AND pause != '0'";
                $stm = $game_db->prepare($sql);
                $stm->bindValue(1, $UserEdit);
                $stm->execute();
                $retorno = $stm->fetch(PDO::FETCH_OBJ);
                
                if(!$retorno){
                     $error[] = 'O usuario não existe e/ou você não tem permissão para despausar!';
                }else{
    
                    $dt_expira = date("Y-m-d H:i:s", strtotime(date('Y-m-d H:i:s', strtotime('+'.DevolverDias($retorno->pausedate).' days', strtotime($retorno->EndDate)))));
    
                    $sql = "UPDATE tokens SET EndDate = ?,pause = '0', pausedate = NULL WHERE Username = ?";
                    $stm = $game_db->prepare($sql);
                    $stm->bindParam(1, $dt_expira);
                    $stm->bindParam(2, $UserEdit);
                    
                    if($stm->execute()){
                        $auth->AddLog("Despausou usuário", $auth->getLogin(), $UserEdit, $dateHoje, "Nenhuma");
                        $success[] = 'Usuário despausado com sucesso.';
                        header("Refresh:2; url=index.php?act=editar&name=" . $UserEdit, true, 303);
                    }else{
                        $error[] = 'Erro desconhecido, tente novamente mais tarde!';
                    }
                }
            } else {
                $error[] = 'Opção inválida, não foi possível executar esta ação.';
            }
        }
    
	
	// SUPER ADMIN BANIR USUÁRIO
	if (isset($_GET['banir'])) {
		$banX = GET_String('banir');
		if($banX == 1){
			$stdel = $game_db->prepare("UPDATE tokens SET ban = '1' WHERE Username=?");
			$stdel->bindParam(1, $UserEdit);
			if ($stdel->execute()) {
				$dateLog = date("Y-m-d H:i:s");
				$auth->Admin_AddLog("Baniu usuário", $auth->getLogin(), $UserEdit, $dateLog, "Nenhuma");
				$selectBool = true;
			}
		}elseif($banX == 2){
			$stdel = $game_db->prepare("UPDATE tokens SET ban = '0' WHERE Username=?");
			$stdel->bindParam(1, $UserEdit);
			if ($stdel->execute()) {
				$dateLog = date("Y-m-d H:i:s");
				$auth->Admin_AddLog("Desbaniu usuário", $auth->getLogin(), $UserEdit, $dateLog, "Nenhuma");
				$selectBool2 = true;
			}
		}else{
			$selectBoolF = true;
		}
		
		if($selectBool){
			$success[] = 'Usuário banido com sucesso.';
		}
		if($selectBool2){
			$success[] = 'Usuário desbanido com sucesso.';
		}
		if($selectBoolF){
			$error[] = 'Opção inválida, não foi possível executar esta ação.';
		}
	}
	
	if (isset($_GET['change'])){
		$NewName = GET_String('change');
		
		$dbh = $game_db->prepare("SELECT COUNT(*) as number FROM tokens WHERE Username=?");
		$dbh->bindParam(1, $NewName);
		
		$dbh->execute();
		$frow = $dbh->fetchObject();
		
		if($frow->number < 1){
			$dbh1 = $game_db->prepare("UPDATE tokens SET Username=? WHERE Username=?");
			$dbh1->bindParam(1, $NewName);
			$dbh1->bindParam(2, $UserEdit);
			
			if ($dbh1->execute()){
				$dateLog = date("Y-m-d H:i:s");
				$auth->AddLog("Alterou o nome de usuário", $auth->getLogin(), $NewName, $dateLog, "Antigo nome de usuário: ".$UserEdit);
				$success[] = 'Nome de usuário mudado com sucesso.';
				header( "Refresh:2; url=index.php?act=editar&name=".$NewName, true, 303);
				//header('location: index.php?act=editar&name='.$NewName);
			}else{
				$error[] = 'Não foi possível mudar este nome de usuário.';
			}
		}else{
			$error[] = 'Este nome de usuário já existe, tente outro.';
		}
	}
	
	if (isset($_GET['changepass'])){
		$password = GET_String('changepass');
		
		if (empty($password))
		{
			$error[] = 'Você não digitou a nova senha!';
		}
		else
		{
			$length = strlen($password);
			if ($length < 4 || $length > 10)
			{
				$error[] = 'O comprimento da senha deve ser de 4 a 10 caracteres!';
			}
			else
			{
				if (!preg_match('|^[A-Z0-9]+$|i', $password))
				{
					$error[] = 'Você digitou uma senha incorreta! Use apenas números e letras!';
				}
			}
		}
		
		if (count($error) == 0){
			$dbh1 = $game_db->prepare("UPDATE tokens SET Password=? WHERE Username=?");
			$dbh1->bindParam(1, $password);
			$dbh1->bindParam(2, $UserEdit);
			
			if ($dbh1->execute()){
				$dateLog = date("Y-m-d H:i:s");
				$auth->AddLog("Alterou a senha do usuário", $auth->getLogin(), $UserEdit, $dateLog, "Nenhuma");
				$success[] = 'Senha alterada com sucesso.';
				header( "Refresh:2; url=index.php?act=editar&name=".$UserEdit, true, 303);
			}else{
				$error[] = 'Não foi possível mudar a senha deste usuário.';
			}
		}
	}
	
	if (isset($_GET['changemodo'])){
		$NovoModo = GET_String('changemodo');
		
		if($NovoModo != 'regedit' && $NovoModo != 'x86' && $NovoModo != 'script' && $NovoModo != 'injetor'){
			$error[] = 'Não foi possível o modo deste usuário.';
		}else{
			$dbh1 = $game_db->prepare("UPDATE tokens SET mode=? WHERE Username=?");
			$dbh1->bindParam(1, $NovoModo);
			$dbh1->bindParam(2, $UserEdit);
			
			if ($dbh1->execute()){
				$dateLog = date("Y-m-d H:i:s");
				$auth->AddLog("Alterou o modo do usuário", $auth->getLogin(), $UserEdit, $dateLog, "Novo modo: ".$NovoModo);
				if($NovoModo == "injetor") {
					$novoModo2 = "Injetor Mobile";
				} else if($NovoModo == "x86") {
					$novoModo2 = "Injetor Emulador";
				} else if($NovoModo == "script") {
					$novoModo2 = "Versão Script";
				} else if($NovoModo == "regedit") {
					$novoModo2 = "Versão Regedit";
				}
				$success[] = 'Modo alterado com sucesso.';
				header( "Refresh:2; url=index.php?act=editar&name=".$UserEdit, true, 303);
			}else{
				$error[] = 'Não foi possível mudar o modo deste usuário.';
			}
		}
	}
	
	if(isset($_POST['adddias'])){
		$endate = POST_Integer('endate');
		
		$expira = Date('Y/m/d', strtotime($UserData.' +'.$endate.' days'));
		$Hojes = strtotime(date("Y-m-d H:i:s"));
		$Vencs = strtotime($UserData);
		
		if($Vencs < $Hojes){
			$expira = Date('Y/m/d', strtotime('+'.$endate.' days'));
		}
		
		if($endate >= 1){
			$dbh = $game_db->prepare("UPDATE tokens SET EndDate=? WHERE Username=?");
			$dbh->bindParam(1, $expira);
			$dbh->bindParam(2, $UserEdit);
			
			if($dbh->execute()){
				$dateLog = date("Y-m-d H:i:s");
				$auth->Admin_AddLog("Adicionou dias", $auth->getLogin(), $UserEdit, $dateLog, "Quantidade de dias: ".$endate);
				$success[] = 'Foram adicionados com sucesso '.$endate.' dias ao usuário';
				$quantidadededays;
					
				if($endate == 1) {
					$quantidadededays = 'Foram adicionados com sucesso '.$endate.' dia ao usuário';
				} else {
					$quantidadededays = 'Foram adicionados com sucesso '.$endate.' dias ao usuário';
				}
				header( "Refresh:2; url=index.php?act=editar&name=".$UserEdit, true, 303);
			}else{
				$error[] = 'Não foi possível adicionar dias.';	
			}
		}else{
			$error[] = 'Não foi possível adicionar dias, quantidade de dias inválida.';	
		}
		
	}

	if(isset($_POST['deldias'])){
		$endate = POST_Integer('endate');
		
		$expira = Date('Y/m/d', strtotime($UserData.' -'.$endate.' days'));
		
		$Hojes = strtotime(date("Y-m-d H:i:s"));
		
		$Exps = strtotime($expira);
		
		if($Exps < $Hojes){
			$expira = Date('Y/m/d');
		}
		
		if($endate >= 1){
			$dbh = $game_db->prepare("UPDATE tokens SET EndDate=? WHERE Username=?");
			$dbh->bindParam(1, $expira);
			$dbh->bindParam(2, $UserEdit);
			
			if($dbh->execute()){
				$dateLog = date("Y-m-d H:i:s");
				$auth->Admin_AddLog("Removeu dias", $auth->getLogin(), $UserEdit, $dateLog, "Quantidade de dias: ".$endate);
				$success[] = 'Foram removidos com sucesso '.$endate.' dias do usuário';
				header( "Refresh:2; url=index.php?act=editar&name=".$UserEdit, true, 303);
			}else{
				$error[] = 'Não foi possível remover dias.';	
			}
		}else{
			$error[] = 'Não foi possível remover dias, quantidade de dias inválida.';
		}
		
	}
	
	$Main = 'sact';

    if ((!isset($_GET[$Main])) && (!isset($_POST[$Main]))) $sact = 'dashboard';
    else $sact = ((isset($_POST[$Main])) ? $_POST[$Main] : $_GET[$Main]);
    $sact = strtolower(trim(preg_replace('/[^0-9a-z]/i', '', $sact)));

    switch ($sact)
    {
		
		case 'dashboard':
			
			break;
			
		case 'changeuser':
		 
			   $smarty->assign('NewPanel', ChangeName($UserEdit));
		  
			break;
			
		case 'changepass':
               $smarty->assign('NewPanel', ChangePass($UserEdit));
		  
			break;
			
		case 'changemode':
		    $smarty->assign('NewPanel', ChangeMode($UserEdit, $Mod));
			break;	
			default:
				break;
	}
}

$breadcrumbs = array(
	array('url' => 'index.php?act=account', 'caption' => 'Dashboard'),
	array('url' => 'index.php?act=users', 'caption' => 'Gerenciar usuários'),
	array('url' => '', 'caption' => 'Editar usuários'),
);

$smarty->assign('pagename', 'Editar usuários');
$smarty->assign('breadcrumbs', $breadcrumbs);
$smarty->assign('active', 'users');
$smarty->assign('usuarios', $usuarios);
$smarty->assign('error', $error);
$smarty->assign('success', $success);
$smarty->display('pages/account/editar.tpl');

?>

