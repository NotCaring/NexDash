<?php
header('Content-type: text/plain');

$user = (isset($_GET['user'])) ? $_GET['user'] : '' ;

$pass = (isset($_GET['pass'])) ? $_GET['pass'] : '' ;

$uid = (isset($_GET['uid'])) ? $_GET['uid'] : '' ;

$key = (isset($_GET['key'])) ? $_GET['key'] : '' ;

$Sign = (isset($_GET['Sign'])) ? $_GET['Sign'] : '' ;

define('BADTEAM', 'API');

// incluir configuração
require_once $_SERVER['DOCUMENT_ROOT'].'/mod/conexao.php';

$conexao = Conexao::getInstance();

// Válida os dados do usuário com o banco de dados
$sql = 'SELECT * FROM tokens WHERE Username = ? LIMIT 1';
$stm = $conexao->prepare($sql);
$stm->bindValue(1, $user);
$stm->execute();
$retorno = $stm->fetch(PDO::FETCH_OBJ);

if (!empty($retorno) && $pass == $retorno->Password && $key == "70727016") {

	$dt_atual = date("Y-m-d H:i:s"); // data atual
	$timestamp_dt_atual = strtotime($dt_atual); // converte para timestamp Unix
	 
	$dt_expira = date("Y-m-d H:i:s", strtotime($retorno->EndDate)); // data de expiração do mod
	$timestamp_dt_expira = strtotime($dt_expira); // converte para timestamp Unix
    $data_inicio = new DateTime($dt_atual);
    $data_fim = new DateTime($dt_expira);
    
    // Resgata diferença entre as datas
    $dateInterval = $data_inicio->diff($data_fim);
    
	if($timestamp_dt_atual < $timestamp_dt_expira){
	    $diasdevip = $dateInterval->days;
	    
	}else{
	     $diasdevip = "0"; 
	}
	
	if($retorno->ban == "1" || $retorno->pausa == "1"){
	    echo "USER BANIDO BATMANAAAAA"; // USER BANIDO
	    exit;
	}

    if($timestamp_dt_atual < $timestamp_dt_expira){
        
        if ((!empty($uid) && $retorno->UID == $uid) || (!empty($uid) && $retorno->UID2 == $uid)) {
        
            echo $uid;
            exit;
    
        }else{
            
            echo "UID NÃO É DO USER BATMANAAAAA"; // UID NÃO É DO USER
	        exit;
	    
        }
        
    }else{
    	echo " USER SEM DIAS BATMANAAAAA"; // USER SEM DIAS
	    exit;
    }
}else{
    echo "USER COM LOGIN E SENHA INCORRETO BATMANAAAAA"; // USER COM LOGIN E SENHA INCORRETO
    exit;
}