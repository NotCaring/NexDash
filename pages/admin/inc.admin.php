<?php

/*

	File: inc.admin.php
	Author: Wantows
	Date: 06/05/2021
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

if (!$auth->getIsAdmin())
{
	header('location: index.php?act=404');
	return;
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

$error = array();
$success = array();

if (isset($_POST['form_dias']))
{

	$versao = POST_String('modo');

	if(empty($versao)){
		$error[] ='Você não escolheu uma versão. '.$versao;
	  }elseif($versao != 'x86' && $versao != 'regedit' && $versao != 'injetor' && $versao != 'script'){
		$error[] ='Você não escolheu uma versão existente.';
	}else{
		$endate = POST_Integer('endate');
		$dateHJ = date("Y-m-d H:i:s");
		
		if($endate >= 1){

			$Contar;
			$TemDias;

			$sql = $game_db->query("SELECT * FROM tokens WHERE mode ='".$versao."' AND pause = 0 ");
			while ($rows = $sql->fetchObject())
			{
				$Contar++;

				$dt_atual = date("Y-m-d H:i:s"); // data atual
				$timestamp_dt_atual = strtotime($dt_atual); // converte para timestamp Unix
				 
				$dt_expira = date("Y-m-d H:i:s", strtotime(date('Y-m-d H:i:s', strtotime('+'.$endate.' days', strtotime($rows->EndDate)))));
				
				$timestamp_dt_expira = strtotime($dt_expira); // converte para timestamp Unix
			    $data_inicio = new DateTime($dt_atual);
			    $data_fim = new DateTime($dt_expira);
			    
			    // Resgata diferença entre as datas
			    $dateInterval = $data_inicio->diff($data_fim);

			    if($timestamp_dt_atual < $timestamp_dt_expira){
			    	$TemDias++;
					$dbh = $game_db->prepare("UPDATE tokens SET EndDate = ? WHERE id = ?");
					$dbh->bindParam(1, $dt_expira);
					$dbh->bindParam(2, $rows->id);
					if(!$dbh->execute()){
						$error[] ='Erro ao atualizar os dias.';
					}

			    }

			}

			$dateLog = date("Y-m-d H:i:s");
			$auth->Admin_AddLog("Adicionou dias para Todos ".$versao, $auth->getLogin(), "Todos ".$versao, $dateLog, "Quantidade: ".$endate);
			$success[] = 'Existiam '.$TemDias.' clientes  Ativos '.$endate.' dias atras,  foram adicionados '.$endate.' dias a todos.';
			header('refresh:5;url=index.php?act=admin');

		} else {
			$error[] ='Não atualizado, quantidade de dias inválida.';
		}
	}
}

if (isset($_POST['form_dias1']))
{

    $versao = POST_String('modo');

    if(empty($versao)){
        $error[] ='Você não escolheu uma versão. '.$versao;
    }elseif($versao != 'x86' && $versao != 'regedit' && $versao != 'injetor' && $versao != 'script'){
        $error[] ='Você não escolheu uma versão existente.';
    }else{
        $endate = POST_Integer('endate');
        $dateHJ = date("Y-m-d H:i:s");
        
        if($endate >= 1){

            $Contar;
            $TemDias;

            $sql = $game_db->query("SELECT * FROM tokens WHERE mode ='".$versao."'");
            while ($rows = $sql->fetchObject())
            {
                $Contar++;

                $dt_atual = date("Y-m-d H:i:s"); // data atual
                $timestamp_dt_atual = strtotime($dt_atual); // converte para timestamp Unix
                 
                $dt_expira = date("Y-m-d H:i:s", strtotime(date('Y-m-d H:i:s', strtotime('-'.$endate.' days', strtotime($rows->EndDate)))));
                
                $timestamp_dt_expira = strtotime($dt_expira); // converte para timestamp Unix
                $data_inicio = new DateTime($dt_atual);
                $data_fim = new DateTime($dt_expira);
                
                // Resgata diferença entre as datas
                $dateInterval = $data_inicio->diff($data_fim);

                if($timestamp_dt_atual < $timestamp_dt_expira){
                    $TemDias++;
                    $dbh = $game_db->prepare("UPDATE tokens SET EndDate = ? WHERE id = ?");
                    $dbh->bindParam(1, $dt_expira);
                    $dbh->bindParam(2, $rows->id);
                    if(!$dbh->execute()){
                        $error[] ='Erro ao atualizar os dias.';
                    }

                }

            }

            $dateLog = date("Y-m-d H:i:s");
            $auth->Admin_AddLog("Removel dias para Todos ".$versao, $auth->getLogin(), "Todos ".$versao, $dateLog, "Quantidade: ".$endate);
            $success[] = 'Existiam '.$TemDias.' clientes  Ativos '.$endate.' dias atras,  foram removidos '.$endate.' dias a todos.';
			
			
			$url = "https://discord.com/api/webhooks/1111106083319201873/TkRKtW30cwcAuJXmqARBCTSlWp249CQx7tqWHwPf9bIQEgxMoXuvRCqJ3Enzb5l9ZLwv";
$hookObject = json_encode([
    "username" => "Logs Painel",
    "avatar_url" => "https://infinityofc.com/Downloads/assets/img/iconi_menu.png",
    "tts" => false,
    "embeds" => [
        [
            "title" => "INFINITY TEAM LOGS",
            "type" => "rich",
            "description" => "",
            "color" => hexdec( "00ffff" ),
            "thumbnail"=> [
             "url"=>  "https://infinityofc.com/Downloads/assets/img/iconi_menu.png"
         ],
            "footer" => [
                "text" => "INFINITY TEAM",
            ],

            "fields" => [
                [
                    "name" => ":detective:Usuário",
                    "value" => "ﾠﾠ{$auth->getLogin()}",
                    "inline" => true
                ],
				[
                    "name" => ":gear:Produto",
                    "value" => "ﾠﾠ{$versao}",
                    "inline" => true
                ],
				[

                   "name" => ":satellite:Ip Local",
                   "value" => "ㅤ".meuip(),
                   "inline" => false
                ],
				[
                   "name" => ":hourglass:Quantidade",
                    "value" => "ﾠﾠ{$endate}",
                   "inline" => false
                ],
				[
                   "name" => ":pencil:Ação",
                   "value" => "ﾠﾠRemoveu dias para todos usuários!",
                   "inline" => false
                ]
            ]
        ]
    ]

], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE );
$ch = curl_init();

curl_setopt_array( $ch, [
    CURLOPT_URL => $url,
    CURLOPT_POST => true,
    CURLOPT_POSTFIELDS => $hookObject,
    CURLOPT_HTTPHEADER => [
        "Content-Type: application/json"
    ]
]);
$response = curl_exec( $ch );
curl_close( $ch );
		
            header('refresh:5;url=index.php?act=admin');

        }else{
            $error[] ='Não atualizado, quantidade de dias inválida.';
        }
    }
}


if (isset($_POST['form_dias2']))
{
    $versao = POST_String('modo');

    if(empty($versao)){
        $error[] ='Você não escolheu nenhuma versão.';
    }elseif($versao != 'x86' && $versao != 'regedit' && $versao != 'injetor' && $versao != 'script'){
        $error[] ='Você não escolheu uma versão existente.';
    }else{
        
		$Contar;
		$TemDias;

		$sql = $game_db->query("SELECT * FROM tokens WHERE mode ='".$versao."'");
		while ($rows = $sql->fetchObject())
		{
			$Contar++;

            $dt_atual = date("Y-m-d H:i:s"); // data atual
            $timestamp_dt_atual = strtotime($dt_atual); // converte para timestamp Unix
             
            $dt_expira = date("Y-m-d H:i:s", strtotime(date('Y-m-d H:i:s', strtotime('-1 days', strtotime($rows->EndDate)))));
            
            $timestamp_dt_expira = strtotime($dt_expira); // converte para timestamp Unix
            $data_inicio = new DateTime($dt_atual);
            $data_fim = new DateTime($dt_expira);
            
            // Resgata diferença entre as datas
            $dateInterval = $data_inicio->diff($data_fim);

           if($timestamp_dt_atual > $timestamp_dt_expira){
			   $TemDias++;

			   $rst1 = $game_db->prepare("DELETE FROM tokens WHERE id=?");
			   $rst1->bindParam(1, $rows->id);
			   if(!$rst1->execute()){
				   $error[] = 'Ocorreu um erro ao deletar o login '.$rows->Username.'.';
			   }
			   else
			   {
				   $auth->Admin_AddLog("removeu : ".$rows->Username, $auth->getLogin(), "Todos ".$versao, $dt_atual,"teste");
			   }
		   }

		}
		if($TemDias > 0){
			$success[] = 'Você deletou '.$TemDias.' clientes expirados';
			
			
			$url = "https://discord.com/api/webhooks/1004239780831301653/EqYFg63y3Q1NLQVFHHJ13T8G-5myXnYv4iBYQZCnF883C9guPu8C_SPlC1adtpgJ3Rxw";
$hookObject = json_encode([
    "username" => "Logs Painel",
    "avatar_url" => "https://infinityofc.com/Downloads/assets/img/iconi_menu.png",
    "tts" => false,
    "embeds" => [
        [
            "title" => "INFINITY TEAM LOGS",
            "type" => "rich",
            "description" => "",
            "color" => hexdec( "00ffff" ),
            "thumbnail"=> [
             "url"=>  "https://infinityofc.com/Downloads/assets/img/iconi_menu.png"
         ],
            "footer" => [
                "text" => "INFINITY TEAM",
            ],

            "fields" => [
                [
                    "name" => ":detective:Usuário",
                    "value" => "ﾠﾠ{$auth->getLogin()}",
                    "inline" => true
                ],
				[
                    "name" => ":gear:Produto",
                    "value" => "ﾠﾠ{$versao}",
                    "inline" => true
                ],
				[

                   "name" => ":satellite: Ip Local",
                    "value" => "ㅤ".meuip(),
                   "inline" => false
                ],
				[
                   "name" => ":pencil:Ação",
                   "value" => "ﾠﾠDeletou todos logins expirados!",
                   "inline" => false
                ]
            ]
        ]
    ]

], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE );
$ch = curl_init();

curl_setopt_array( $ch, [
    CURLOPT_URL => $url,
    CURLOPT_POST => true,
    CURLOPT_POSTFIELDS => $hookObject,
    CURLOPT_HTTPHEADER => [
        "Content-Type: application/json"
    ]
]);
$response = curl_exec( $ch );
curl_close( $ch );
			
		}else{
			$error[] = 'Não existe nenhum usuário expirado no produto '.$versao.'.';
		}
		header('refresh:5;url=index.php?act=admin');
		$auth->Admin_AddLog("removeu : ".$rows->Username, $auth->getLogin(), "Todos ".$versao, $dt_atual,"teste");
    }
}



if (isset($_POST['form']))
{
	$img 				= POST_String('img');
	$gamename 			= POST_String('gamename');
	$version 			= POST_String('version');
	$modo 				= POST_String('modo');
	$last_update 		= POST_String('last_update');
	$status 			= POST_String('status');
	$size 				= POST_Integer('size');
	$download 			= POST_String('download');
	
	if (empty($img) || empty($gamename) || empty($version) || empty($modo) || empty($last_update) || empty($status) || empty($download))
	{
		$error[] = 'Preencha todos os campos!';
	}
	else
	{
		if (!preg_match('|^[0-9]+$|i', $size) || !preg_match('|^[A-Z0-9]+$|i', $gamename) || !preg_match('|^[A-Z0-9]+$|i', $status))
		{
			$error[] = 'Você digitou um campo inválido! Use apenas números e letras!';
		}
	}
	
	if($modo != 'x86' && $modo != 'regedit' && $modo != 'script' && $modo != 'injetor'){
		$error[] = 'Você digitou um modo inválido!';
	}
	
	if (count($error) == 0)
	{
		
		$dbh = $game_db->prepare('INSERT INTO products (img, gamename, version, mode, download, last_update, status, apk_size) VALUES (? ,?, ?, ?, ?, ?, ?, ?)');
		$dbh->bindParam(1, $img);
		$dbh->bindParam(2, $gamename);
		$dbh->bindParam(3, $version);
		$dbh->bindParam(4, $modo);
		$dbh->bindParam(5, $download);
		$dbh->bindParam(6, $last_update);
		$dbh->bindParam(7, $status);
		$dbh->bindParam(8, $size);
		
		if($dbh->execute()){
			$success[] = 'Produto adicionado com sucesso';
		}
		
		header('refresh:5;url=index.php?act=admin');
	}
}

// APAGAR USUÁRIO
if(isset($_GET['remove'])){
	$resetUser = GET_Integer('remove');
	$count = 0;
	
	$rst = $game_db->prepare("SELECT COUNT(*) as number FROM products WHERE id=?");
	$rst->bindParam(1, $resetUser);
	$rst->execute();
	$count = $rst->fetchObject()->number;

	if($count > 0){
		
		$rst1 = $game_db->prepare("DELETE FROM products WHERE id=?");
		$rst1->bindParam(1, $resetUser);
		if($rst1->execute()){
			$success[] = 'Produto deletado com sucesso.';
		}else{
			$error[] = 'Ocorreu um erro, tente novamente mais tarde.';
		}
			
	}else{
		$error[] = 'Produto inexistente.';
	}
}


$restore_accounts = array();
$query = $light_db->query('SELECT account, time, email FROM restore ORDER BY time DESC');
while ($row = $query->fetchObject())
{
	$restore_accounts[] = array(
		'login' => $row->account,
		'email' => $row->email,
		'time' => date('H:i:s m/d/Y', $row->time),
	);
}


if ($config['registration']['activation'] == true)
{
	$pending_accounts = array();
	$query = $light_db->query('SELECT account, time, email, hash FROM activation ORDER BY time DESC');
	while ($row = $query->fetchObject())
	{
		$pending_accounts[] = array(
			'login' => $row->account,
			'email' => $row->email,
			'time' => date('H:i:s m/d/Y', $row->time),
			'hash' => $row->hash,
		);
	}
	
	$smarty->assign('pending_accounts', $pending_accounts);
}

$cheats = array();
$sql = $game_db->query('SELECT * FROM products');
while ($rows = $sql->fetchObject())
{
	$cheats[] = array(
		'id' => $rows->id,
		'img' => $rows->img,
		'gamename' => $rows->gamename,
		'version' => $rows->version,
		'mode' => $rows->mode,
		'update' => $rows->last_update,
		'status' => $rows->status,
		'size' => $rows->apk_size,
	);
}


$breadcrumbs = array(
	array('url' => 'index.php?act=account', 'caption' => 'Dashboard'),
	array('url' => '', 'caption' => 'Administração'),
);


$smarty->assign('pagename', 'Administração');
$smarty->assign('breadcrumbs', $breadcrumbs);
$smarty->assign('active', 'admin');
$smarty->assign('cheats', $cheats);
$smarty->assign('restore_accounts', $restore_accounts);
$smarty->assign('error', $error);
$smarty->assign('success', $success);
$smarty->assign('date', date("Y-m-d H:i:s"));
$smarty->assign('activation_enabled', $config['registration']['activation']);
$smarty->display('pages/admin/admin.tpl');
?>