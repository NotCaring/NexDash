<?php
/*

	File: inc.panel.php
	Author: Wantows 
	Date: 27.05.2021
*/

if (!defined('lightengine'))
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

$message = array();
$success = array();

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

require_once (BASE_PATH . 'class' . DIRECTORY_SEPARATOR . 'class.Panel.php');

$Main = 'sact';

if (isset($_SERVER['HTTP_CF_CONNECTING_IP']))
{
	$ip = $_SERVER['HTTP_CF_CONNECTING_IP'];
}
else
{
	$ip = $_SERVER['REMOTE_ADDR'];
}
if ((!isset($_GET[$Main])) && (!isset($_POST[$Main]))) $sact = 'dashboard';
else $sact = ((isset($_POST[$Main])) ? $_POST[$Main] : $_GET[$Main]);
$sact = strtolower(trim(preg_replace('/[^0-9a-z]/i', '', $sact)));

switch ($sact)
{
	case 'dashboard':
		if(isset($_POST['give_points']))
		{
			$Account = POST_String('acc_id');
			$Amount	 = POST_String('amount');
			
			$dbh = $game_db->prepare("UPDATE account_login SET credits = credits + ? WHERE name = ?");
			$dbh->bindParam(1, $Amount);
			$dbh->bindParam(2, $Account);
			
			if($dbh->execute()){
				$dateLog = date("Y-m-d H:i:s");
				$auth->Admin_AddLog("Creditos adicionados", $auth->getLogin(), $Account, $dateLog, "Quantidade: ".$Amount);
				$success[] = 'Usuário <b>' .$Account. '</b> créditos adicionados com sucesso! <meta HTTP-EQUIV="REFRESH" content="2; url=index.php?act=panel&sact=viewacc&id='.$Account.'">';
				
				
			$url = "https://discord.com/api/webhooks/1124580911430770728/CcY6hNJhWTYiV4PqoAPOCKWLCm_TcedeIFkKJOUKE5Pg3WlU7Qi5sGK-kjwbTuQtj61J";
                $hookObject = json_encode([
                            "username" => "Logs Painel",
                            "avatar_url" => "https://autoshoot.shop/assets/images/avatars/BM.png",
                            "tts" => false,
                            "embeds" => [
                                [
                                    "title" => "LINCE MDK",
                                    "type" => "rich",
                                    "description" => "",
                                    "color" => hexdec( "00ffff" ),
                                    "thumbnail"=> [
                                     "url"=>  "https://autoshoot.shop/assets/images/avatars/BM.png"
                                 ],
                                    "footer" => [
                                        "text" => "LINCE MDK",
                                    ],
                        
                                    "fields" => [
                                        [
                                            "name" => ":guard:Vendedor",
                                            "value" => "ﾠﾠ{$auth->getLogin()}",
                                            "inline" => true
                                        ],
	                           			[
                                            "name" => ":detective:Usuário",
                                            "value" => "ﾠﾠ{$Account}",
                                            "inline" => true
                                        ],
	                           		    [
                                            "name" => ":scales:Quantidade",
                                            "value" => "ﾠﾠ{$Amount}",
                                            "inline" => true
                                        ],
	                           			[
                                           "name" => ":satellite:Ip Local",
                                           "value" => "ㅤ".meuip(),
                                           "inline" => false
                                        ],
	                           			[
                                           "name" => ":pencil:Ação",
                                           "value" => "ﾠﾠAdicionou creditos para usuário no painel!",
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
				$message[] = 'Não foi possível adicionar os créditos para o usuário ' . $Account;
			}
		}
		elseif(isset($_POST['take_points']))
		{
			$Account = POST_String('acc_id');
			$Amount	 = POST_String('amount');
			
			$dbh = $game_db->prepare("UPDATE account_login SET credits = credits - ? WHERE name = ?");
			$dbh->bindParam(1, $Amount);
			$dbh->bindParam(2, $Account);
			
			if($dbh->execute()){
				$dateLog = date("Y-m-d H:i:s");
				$auth->Admin_AddLog("Creditos removidos", $auth->getLogin(), $Account, $dateLog, "Quantidade: ".$Amount);
				$success[] = 'Usuário <b>' .$Account. '</b> créditos removidos com sucesso! <meta HTTP-EQUIV="REFRESH" content="2; url=index.php?act=panel&sact=viewacc&id='.$Account.'">';
				
	$datatopost = array ("content" => 
"```Vendedor: ".$auth->getLogin()." removel creditos para: ".$Account."
Quantidade: ".$Amount."
Data: ".$dateLog."
Ip: ".$ip."```"
	);
	$ch = curl_init ($urltopost);
	curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
	curl_setopt($ch, CURLOPT_HEADER, true);
	curl_setopt ($ch, CURLOPT_POST, true);
	curl_setopt ($ch, CURLOPT_POSTFIELDS, json_encode($datatopost));
	curl_setopt ($ch, CURLOPT_POSTFIELDS, json_encode($datatopost));
	curl_setopt ($ch, CURLOPT_RETURNTRANSFER, true);
	$returndata = curl_exec ($ch);
				
			}else{
				$message[] = 'Não foi possível remover os créditos do usuário ' . $Account;
			}
		}
		
		
		if (isset($_POST['delete_account']))
		{
			$Account = POST_String('acc_id');

			$dbh = $game_db->prepare("DELETE FROM account_login WHERE `account_login`.`name`=?");
			$dbh->bindParam(1, $Account);
			
		
			if($dbh->execute()){
				$dateLog = date("Y-m-d H:i:s");
				$success[] = 'Usuário <b>' . $Account . '</b> foi removido com sucesso! <meta HTTP-EQUIV="REFRESH" content="2; url=index.php?act=panel&sact=viewacc&id='.$Account.'">';	
			
				$url = "https://discord.com/api/webhooks/1004524878067675157/1t90xihNq-_trWF1CpnhVk5DGO3NnnUkGVwOW5zZULmTYKhE7gJSrQh29B2SNCSwfpmL";
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
                    "inline" => false
                ],
				[
                    "name" => ":ninja:Vendedor",
                    "value" => "ﾠﾠ{$Account}",
                    "inline" => true
                ],
				[
                   "name" => ":satellite: Ip Local",
                   "value" => "ﾠﾠ{$ip}",
                   "inline" => false
                ],
				[
                   "name" => ":pencil:Ação",
                   "value" => "ﾠﾠRemovel o vendedor com sucesso.",
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
				$message[] = 'Não foi possível remover o usuário ' . $Account;
			}
		}
		elseif (isset($_POST['ban_account']))
		{
			$Account = POST_String('acc_id');
			$Motivo = POST_String('reason');
			
			$dbh = $game_db->prepare("UPDATE account_login SET ban='1',motivo_ban=? WHERE name = ?");
			$dbh->bindParam(1, $Motivo);
			$dbh->bindParam(2, $Account);
			
			if($dbh->execute()){
				
				$dateLog = date("Y-m-d H:i:s");
				$auth->Admin_AddLog("Usuário banido", $auth->getLogin(), $Account, $dateLog, "Motivo: ".$Motivo);
				$success[] = 'Usuário <b>' . $Account . '</b> foi banido com sucesso! <meta HTTP-EQUIV="REFRESH" content="2; url=index.php?act=panel&sact=viewacc&id='.$Account.'">';	
				
	$datatopost = array ("content" => 
"```Vendedor: ".$auth->getLogin()." baniu o usuário: ".$Account."
Motivo: ".$Motivo."
Data: ".$dateLog."
Ip: ".$ip."```"
	);
	$ch = curl_init ($urltopost);
	curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
	curl_setopt($ch, CURLOPT_HEADER, true);
	curl_setopt ($ch, CURLOPT_POST, true);
	curl_setopt ($ch, CURLOPT_POSTFIELDS, json_encode($datatopost));
	curl_setopt ($ch, CURLOPT_POSTFIELDS, json_encode($datatopost));
	curl_setopt ($ch, CURLOPT_RETURNTRANSFER, true);
	$returndata = curl_exec ($ch);
				
			}else{
				$message[] = 'Não foi possível banir o usuário ' . $Account;
			}
		}
		elseif (isset($_POST['unban_account']))
		{
			$Account = POST_String('acc_id');
			
			$dbh = $game_db->prepare("UPDATE account_login SET ban='0' WHERE name = ?");
			$dbh->bindParam(1, $Account);
			
			if ($dbh->execute()){
				$dateLog = date("Y-m-d H:i:s");
				$auth->Admin_AddLog("Usuário desbanido", $auth->getLogin(), $Account, $dateLog, "Nenhum");
				$success[] = 'Usuário <b>' . $Account . '</b> foi desbanido com sucesso! <meta HTTP-EQUIV="REFRESH" content="2; url=index.php?act=panel&sact=viewacc&id='.$Account.'">';
				
	$datatopost = array ("content" => 
"```Vendedor: ".$auth->getLogin()." desbaniu o usuário: ".$Account."
Motivo: Nenhum
Data: ".$dateLog."
Ip: ".$ip."```"
	);
	$ch = curl_init ($urltopost);
	curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
	curl_setopt($ch, CURLOPT_HEADER, true);
	curl_setopt ($ch, CURLOPT_POST, true);
	curl_setopt ($ch, CURLOPT_POSTFIELDS, json_encode($datatopost));
	curl_setopt ($ch, CURLOPT_POSTFIELDS, json_encode($datatopost));
	curl_setopt ($ch, CURLOPT_RETURNTRANSFER, true);
	$returndata = curl_exec ($ch);
				
			}else{
				$message[] = 'Não foi possível desbanir o usuário ' . $Account;
			}
		}
		else
		{

			$smarty->assign('NewPanel', GetPanelMenu());
		}

	break;

	case 'viewacc':

		if ((!isset($_GET['id'])) && (!isset($_POST['id'])))
		{
			$message[] = 'Account not found.';
		}
		else
		{
			$id = ((isset($_POST['id'])) ? $_POST['id'] : $_GET['id']);
			$id = strtolower(trim(preg_replace('/[^0-9a-z]/i', '', $id)));

			$smarty->assign('NewPanel', ViewAccount($id));
		}

	break;

	
	case 'givepts':

		if ((!isset($_GET['id'])) && (!isset($_POST['id'])))
		{
			$message[] = 'Account not found.';
		}
		else
		{
			$id = ((isset($_POST['id'])) ? $_POST['id'] : $_GET['id']);
			$id = strtolower(trim(preg_replace('/[^0-9a-z]/i', '', $id)));

			$smarty->assign('NewPanel', GivePts($id));
		}

	break;

	case 'takepts':

		if ((!isset($_GET['id'])) && (!isset($_POST['id'])))
		{
			$message[] = 'Account not found.';
		}
		else
		{
			$id = ((isset($_POST['id'])) ? $_POST['id'] : $_GET['id']);
			$id = strtolower(trim(preg_replace('/[^0-9a-z]/i', '', $id)));

			$smarty->assign('NewPanel', TakePts($id));
		}

	break;

	case 'banacc':

		if ((!isset($_GET['id'])) && (!isset($_POST['id'])))
		{
			$message[] = 'Account not found.';
		}
		else
		{
			$id = ((isset($_POST['id'])) ? $_POST['id'] : $_GET['id']);
			$id = strtolower(trim(preg_replace('/[^0-9a-z]/i', '', $id)));

			$smarty->assign('NewPanel', BanAccount($id));
		}
	break;

	case 'unbanacc':

		if ((!isset($_GET['id'])) && (!isset($_POST['id'])))
		{
			$message[] = 'Account not found.';
		}
		else
		{
			$id = ((isset($_POST['id'])) ? $_POST['id'] : $_GET['id']);
			$id = strtolower(trim(preg_replace('/[^0-9a-z]/i', '', $id)));

			$smarty->assign('NewPanel', UnbanAccount($id));
		}
	break;
	
	case 'delacc':

		if ((!isset($_GET['id'])) && (!isset($_POST['id'])))
		{
			$message[] = 'Account not found.';
		}
		else
		{
			$id = ((isset($_POST['id'])) ? $_POST['id'] : $_GET['id']);
			$id = strtolower(trim(preg_replace('/[^0-9a-z]/i', '', $id)));

			$smarty->assign('NewPanel', DeleteAccount($id));
		}
	break;

	default:
		$message[] = 'Not Found!';
	}

$breadcrumbs = array(
	array(
		'url' => 'index.php',
		'caption' => 'Dashboard'
	) ,
	array(
		'url' => 'index.php?act=admin',
		'caption' => 'Administração'
	) ,
	array(
		'url' => '',
		'caption' => 'Painel de Administração'
	) ,
);

$smarty->assign('pagename', 'Painel de Administração');
$smarty->assign('breadcrumbs', $breadcrumbs);
$smarty->assign('active', 'panel');
$smarty->assign('message', $message);
$smarty->assign('success', $success);
$smarty->display('pages/admin/panels.tpl');
?>
