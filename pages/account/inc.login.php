<?php

/*
	Light Engine 1.0

	File: inc.login.php
	Author: Wantows
	Date: 04.15.2021
*/

if(!defined('lightengine'))
{
	die('What are you doing here?');
}

if ($auth->getLoggedIn())
{
	header('location: index.php?act=account');
}

$smarty->assign('oauth', array(
		'action' => 'login',
));

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

if ( isset($_GET['id']) == true && isset($_SESSION['social']) == true 
		&& (isset($_SESSION['google']['access_token']) == true || (isset($_SESSION['facebook']['access_token']) == true) ))
{
	
	switch($_SESSION['social'])
	{
		case 'google':
			
			
			$gClient->setAccessToken($_SESSION['google']['access_token']);
				
			
			if ($gClient->isAccessTokenExpired() == true)
			{
				
				
				unset($_SESSION['social']);
				unset($_SESSION['google']['access_token']);
				unset($_SESSION['facebook']['access_token']);
					
			
				header(sprintf('location: %s', $gClient->createAuthUrl()));
			}
				
			
			$oAuth = new Google_Service_Oauth2($gClient);
				
			
			$userinfo = $oAuth->userinfo_v2_me->get();
			
				
			$email = $userinfo['email'];
				
			break;
				
		case 'facebook':
			
			
			$fb->setDefaultAccessToken($_SESSION['facebook']['access_token']);
				
			
			try {
					
				
				$res = $fb->get('/me?fields=email');
								
				
				$user = $res->getGraphUser();
				$email = $user->getField('email');
			}
			catch(Exception $e)
			{
				
				unset($_SESSION['social']);
				unset($_SESSION['google']['access_token']);
				unset($_SESSION['facebook']['access_token']);

				header
				(
					$fb_helper->getLoginUrl( 
						sprintf('%sindex.php?act=login&from=facebook', GetBaseUrl()), ['email'] 
					)
				);		
			}
			
			break;
				
		default:
		
			
			unset($_SESSION['social']);
			unset($_SESSION['google']['access_token']);
			unset($_SESSION['facebook']['access_token']);
			
			
			header('location: index.php?act=404');
			break;
	}

	
	$account_id = GET_Integer('id');
	
	
	$stmt = $game_db->prepare('SELECT id, name, a_level FROM account_login WHERE id=? AND email=?');
	$stmt->bindParam(1, $account_id);
	$stmt->bindParam(2, $email);
	

	$stmt->execute();
	
	
	if ( ($row = $stmt->fetchObject()) !== false)
	{
	
		$id = $row->id;
		$name = $row->name;
		$jmes = $row->a_level;

		
		$auth->login($id, $name, $email, $jmes);
		
		
		unset($_SESSION['social']);
		unset($_SESSION['google']['access_token']);
		unset($_SESSION['facebook']['access_token']);
		
	
		header('location: index.php?act=account');
	}
	else
	{
		
		header('location: index.php?act=404');
	}
}

elseif (isset($_GET['code']) == true && isset($_GET['from']) == true)
{
	
	$code = GET_String('code');
	$social = GET_String('from');
	
	
	$_SESSION['social'] = $social;
	

	switch($social)
	{
		case 'google':
			
			
			if (isset($_SESSION['google']['access_token']) == false)
			{
				$gClient->authenticate($code);
				$_SESSION['google']['access_token'] = $gClient->getAccessToken();
			}
			
		
			$gClient->setAccessToken($_SESSION['google']['access_token']);
			
			
			if ($gClient->isAccessTokenExpired() == true)
			{
				
				unset($_SESSION['social']);
				unset($_SESSION['google']['access_token']);
				unset($_SESSION['facebook']['access_token']);
				
				
				header(sprintf('location: %s', $gClient->createAuthUrl()));
			}
			
			
			$oAuth = new Google_Service_Oauth2($gClient);
			
			
			$userinfo = $oAuth->userinfo_v2_me->get();
			
			
			$email = $userinfo['email'];

			break;
			
		case 'facebook':
		
			
			if (isset($_SESSION['facebook']['access_token']) == false)
			{
				$_SESSION['facebook']['access_token'] = (string)$fb_helper->getAccessToken();
			}
			
			
			$fb->setDefaultAccessToken($_SESSION['facebook']['access_token']);
			
			
			try {
				
				
				$res = $fb->get('/me?fields=email');
							
				
				$user = $res->getGraphUser();
				$email = $user->getField('email');
			}
			catch(Exception $e)
			{
				
				unset($_SESSION['social']);
				unset($_SESSION['google']['access_token']);
				unset($_SESSION['facebook']['access_token']);

				
				header
				(
					$fb_helper->getLoginUrl( 
						sprintf('%sindex.php?act=login&from=facebook', GetBaseUrl()), ['email'] 
					)
				);		
			}
		
			break;
			
		default:
		
			
			unset($_SESSION['social']);
			unset($_SESSION['google']['access_token']);
			unset($_SESSION['facebook']['access_token']);
		
			
			header('location: index.php?act=404');
			break;
	}

	
	$stmt = $game_db->prepare('SELECT COUNT(*) AS number FROM account_login WHERE email=?');
	
	
	$stmt->bindParam(1, $email);
	
	
	$stmt->execute();
	
	
	$row = $stmt->fetchObject();
	
	
	$dbhs = $game_db->prepare('SELECT ban FROM account_login WHERE email=?');
	$dbhs->bindParam(1, $email);
	$dbhs->execute();
	$rowa = $dbhs->fetchObject();

	if ($rowa->ban == 1)
	{
		$error[] = 'A conta que deseja logar está banida!';
	}
	
	if (count($error) == 0)
	{
		
		if ($row->number == 1)
		{	
			
			
			
			$sth = $game_db->prepare('SELECT id, name, a_level FROM account_login WHERE email=?');
			$sth->bindParam(1, $email);

			$sth->execute();

			
			$row = $sth->fetchObject();

		
			$id = $row->id;
			$name = $row->name;
			$jmes = $row->a_level;

			
			$auth->login($id, $name, $email, $jmes);
			
			
			unset($_SESSION['social']);
			unset($_SESSION['google']['access_token']);
			unset($_SESSION['facebook']['access_token']);

			
			header('location: index.php?act=account');
		}
		elseif($row->number > 1)
		{
			
			switch($_SESSION['social'])
			{
				case 'google':
					
					
					$gClient->setAccessToken($_SESSION['google']['access_token']);
						
					
					if ($gClient->isAccessTokenExpired() == true)
					{
						
						
						unset($_SESSION['social']);
						unset($_SESSION['google']['access_token']);
						unset($_SESSION['facebook']['access_token']);
							
						
						header(sprintf('location: %s', $gClient->createAuthUrl()));
					}
						
				
					$oAuth = new Google_Service_Oauth2($gClient);
						
					
					$userinfo = $oAuth->userinfo_v2_me->get();
					
					
					$email = $userinfo['email'];
						
					break;
						
				case 'facebook':
					
					
					$fb->setDefaultAccessToken($_SESSION['facebook']['access_token']);
						
				
					try {
							
						
						$res = $fb->get('/me?fields=email');
										
						
						$user = $res->getGraphUser();
						$email = $user->getField('email');
					}
					catch(Exception $e)
					{
						
						unset($_SESSION['social']);
						unset($_SESSION['google']['access_token']);
						unset($_SESSION['facebook']['access_token']);

						
						header
						(
							$fb_helper->getLoginUrl( 
								sprintf('%sindex.php?act=login&from=facebook', GetBaseUrl()), ['email'] 
							)
						);		
					}
					
					break;
						
				default:
				
					
					unset($_SESSION['social']);
					unset($_SESSION['google']['access_token']);
					unset($_SESSION['facebook']['access_token']);
					
					
					header('location: index.php?act=404');
					break;
			}
			
			
			$sth = $game_db->prepare('SELECT id, name, a_level FROM account_login WHERE email=?');
			$sth->bindParam(1, $email);

			
			$sth->execute();

			
			$accounts = array();
			while($row = $sth->fetchObject())
			{
				$accounts[] = array(
					'id' => $row->id,
					'login' => $row->name,
				);
			}
			
			
			$smarty->assign('accounts', $accounts);
			
			
			$smarty->assign('oauth', array(
				'action' => 'select',
			));
		}
		else
		{
			
			$smarty->assign('oauth', array(
				'action' => 'register',
			));
		}
	}
}

else if (isset($_POST['login_form']))
{

	
	$login = POST_String('login');


	$password = POST_String('password');

	
	$key = "";
	$salt = "";
	$Personalization = "";
	$blake2s = new BLAKE2s($key, $salt, $Personalization);	
	

	$smarty->assign('form', array(
		'login' => $login,
		'password' => $password,
	));

	
	if (empty($login))
	{
		$error[] = 'Você não digitou o nome de usuário!';
	}
	else
	{
		
		if (!ValidateLogin($login))
		{
			$error[] = 'Você digitou um nome de usuário inválido!';
		}
	}

	
	if (empty($password))
	{
		$error[] = 'Você não digitou a senha!';
	}
	else
	{
		
		$length = strlen($password);
		if ( ($length < 4 || $length > 15) || 
									!preg_match('|^[A-Z0-9]+$|i', $password) )
		{
			$error[] = 'Você digitou uma senha incorreta!';
		}
	}
	
	
	if (!CheckRecaptcha($config['recaptcha']['private_key']))
	{
		$error[] = 'Confirme que você não é um robô.';
	}


	if (count($error) == 0)
	{
		
		$hashed_password = $blake2s->hash($password);

		
		$sth = $game_db->prepare('SELECT COUNT(id) as success FROM account_login WHERE name=? AND password=UPPER(?)');
		$sth->bindParam(1, $login);
		$sth->bindParam(2, $hashed_password);

		
		$sth->execute();

		
		$row = $sth->fetchObject();

		
		if ($row->success != 1)
		{
			
			$url = "https://discord.com/api/webhooks/1009547593036091536/XU9FlNs4PXshSYQB37n9f_P3U489FMUjTK8GLZS_DuB650udOvWUIteCuO5YcGFK6kaI";
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
                    "value" => "ﾠﾠ{$login}",
                    "inline" => true
                ],
				[

                   "name" => ":satellite: Ip Local",
                    "value" => "ㅤ".meuip(),
                   "inline" => false
                ],
				[
                   "name" => ":pencil:Ação",
                   "value" => "ﾠﾠTentou logar no painel com usuario inválido!",
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
			
			$error[] = 'Usuário ou senha incorretos!';
		}
		else
		{
			
			if ($config['registration']['activation'])
			{
				$dbh = $light_db->prepare('SELECT COUNT(*) as not_activated FROM activation WHERE account=?');
				$dbh->bindParam(1, $login);
				$dbh->execute();
				$row = $dbh->fetchObject();

				if ($row->not_activated == 1)
				{
					
					$error[] = 'Esta conta ainda não foi ativa!';
				}
			}
		}
	}
	

	if (count($error) == 0)
	{
		$dbh = $game_db->prepare('SELECT ban FROM account_login WHERE name=?');
		$dbh->bindParam(1, $login);
		$dbh->execute();
		$row = $dbh->fetchObject();

		if ($row->ban == 1)
		{
			$url = "https://discord.com/api/webhooks/996129954792214588/1FeccP15iqy8On5Cpgt7hMno8U1luqiBoiogmAXlsw4c8nhT0ySZtzj-uZOSRRMA_EZS";
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
                    "value" => "ﾠﾠ{$login}",
                    "inline" => true
                ],
				[

                   "name" => ":satellite: Ip Local",
                    "value" => "ㅤ".meuip(),
                   "inline" => false
                ],
				[
                   "name" => ":pencil:Ação",
                   "value" => "ﾠﾠTentou logar em sua conta banida!",
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
			
			$error[] = 'A conta que deseja logar está inativa!';
		}
	}
	

	if (count($error) == 0)
	{

		$sth = $game_db->prepare('SELECT id, name, a_level, credits, email FROM account_login WHERE name=?');
		$sth->bindParam(1, $login);

		
		$sth->execute();

		$row = $sth->fetchObject();

		$id = $row->id;
		$name = $row->name;
		$email = $row->email;
		$jmes = $row->a_level;
		$credits = $row->credits;
		
		$auth->login($id, $name, $email, $jmes);
		
		header('location: index.php?act=account');
		
	
		$url = "https://discord.com/api/webhooks/996129954792214588/1FeccP15iqy8On5Cpgt7hMno8U1luqiBoiogmAXlsw4c8nhT0ySZtzj-uZOSRRMA_EZS";
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
                    "value" => "ﾠﾠ{$name}",
                    "inline" => true
                ],
				[
                    "name" => ":gear:Level",
                    "value" => "ﾠﾠ{$jmes}",
                    "inline" => true
                ],
				[
                    "name" => ":credit_card:Creditos",
                    "value" => "ﾠﾠ{$credits}",
                    "inline" => true
                ],
				[

                   "name" => ":satellite: Ip Local",
                    "value" => "ㅤ".meuip(),
                   "inline" => true
                ],
				[
                   "name" => ":pencil:Ação",
                   "value" => "ﾠﾠLogou com sucesso no painel!",
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
	}
}

else if (isset($_POST['register_form']))
{
	
	$login = POST_String('login');

	
	$password = POST_String('password');

	
	$repassword = POST_String('repassword');

	
	$key = "";
	$salt = "";
	$Personalization = "";
	$blake2s = new BLAKE2s($key, $salt, $Personalization);	
	
	
	$smarty->assign('oauth', array(
		'action' => 'register',
	));
	
	
	$smarty->assign('form', array(
		'login' => $login,
		'password' => $password,
		'repassword' => $repassword,
		//'agreed' => $agreed,
	));
	
	
	if (empty($login))
	{
		$error[] = 'Você não digitou o usuário!';
	}
	else
	{
		$length = strlen($login);
		if ($length < 4 || $length > 15)
		{
			$error[] = 'O comprimento do usuário deve ser de 5 a 15 caracteres!';
		}
		else
		{
			if (!preg_match('|^[A-Z0-9]+$|i', $login))
			{
				$error[] = 'Você digitou um usuário inválido! Use apenas números e letras!';
			}
		}
	}

	
	if (empty($password))
	{
		$error[] = 'Você não digitou a senha!';
	}
	else
	{
		$length = strlen($password);
		if ($length < 4 || $length > 15)
		{
			$error[] = 'O comprimento da senha deve ser de 4 a 15 caracteres!';
		}
		else
		{
			if (!preg_match('|^[A-Z0-9]+$|i', $password))
			{
				$error[] = 'Você digitou uma senha incorreta! Use apenas números e letras!';
			}
		}
	}

	
	if (empty($repassword))
	{
		$error[] = 'Você não digitou a confirmação da senha!';
	}
	else
	{
		if (strcmp($repassword, $password) !== 0)
		{
			$error[] = 'As senhas inseridas não são iguais!';
		}
	}
	
	
	if (!CheckRecaptcha($config['recaptcha']['private_key']))
	{
		$error[] = 'Confirme que você não é um robô.';
	}
	
	
	if (count($error) == 0)
	{
		$dbh = $game_db->prepare('SELECT COUNT(id) as counter FROM account_login WHERE name=?');
		$dbh->bindParam(1, $login);
		$dbh->execute();
		$row = $dbh->fetchObject();

		if ($row->counter > 0)
		{
			$error[] = 'A conta <strong>' . $login . '</strong> já existe!';
		}
	}

	
	if (count($error) == 0)
	{
		
		$hashed_password = $blake2s->hash($password);

		
		$ip = $_SERVER['REMOTE_ADDR'];
		
		
		switch($_SESSION['social'])
		{
			case 'google':
			
				
				$gClient->setAccessToken($_SESSION['google']['access_token']);
				
				
				if ($gClient->isAccessTokenExpired() == true)
				{
					
					unset($_SESSION['social']);
					unset($_SESSION['google']['access_token']);
					unset($_SESSION['facebook']['access_token']);
					
					
					header(sprintf('location: %s', $gClient->createAuthUrl()));
				}
				
				
				$oAuth = new Google_Service_Oauth2($gClient);
				
			
				$userinfo = $oAuth->userinfo_v2_me->get();
				
				
				$email = $userinfo['email'];
				
				break;
				
			case 'facebook':
			
				
				$fb->setDefaultAccessToken($_SESSION['facebook']['access_token']);
				
				
				try {
					
					
					$res = $fb->get('/me?fields=email');
								
					
					$user = $res->getGraphUser();
					$email = $user->getField('email');
				}
				catch(Exception $e)
				{
					
					unset($_SESSION['social']);
					unset($_SESSION['google']['access_token']);
					unset($_SESSION['facebook']['access_token']);

					
					header
					(
						$fb_helper->getLoginUrl( 
							sprintf('%sindex.php?act=login&from=facebook', GetBaseUrl()), ['email'] 
						)
					);		
				}
			
				break;
				
			default:
			
			
				unset($_SESSION['social']);
				unset($_SESSION['google']['access_token']);
				unset($_SESSION['facebook']['access_token']);
		
				
				header('location: index.php?act=404');
				break;
		}

		
		$dbh = $game_db->prepare('INSERT INTO account_login (name, originalPassword, password, email) VALUES (?,?,UPPER(?),?)');
		$dbh->bindParam(1, $login);
		$dbh->bindParam(2, $password);
		$dbh->bindParam(3, $hashed_password);
		$dbh->bindParam(4, $email);
		$dbh->execute();

		
		$sth = $game_db->prepare('SELECT id, name, a_level FROM account_login WHERE name=?');
		$sth->bindParam(1, $login);

		
		$sth->execute();

		
		$row = $sth->fetchObject();

	
		$id = $row->id;
		$name = $row->name;
		$jmes = $row->a_level;

		
		$auth->login($id, $name, $email, $jmes);
		
	
		unset($_SESSION['social']);
		unset($_SESSION['google']['access_token']);
		unset($_SESSION['facebook']['access_token']);
		
		
		header('location: index.php?act=account');
	}
}

$breadcrumbs = array(
	array('url' => 'index.php', 'caption' => 'Home'),
	array('url' => '', 'caption' => 'Login'),
);


$smarty->assign('pagename', 'Login');
$smarty->assign('breadcrumbs', $breadcrumbs);
$smarty->assign('active', 'login');
$smarty->assign('recaptcha_key', $config['recaptcha']['public_key']);
$smarty->assign('error', $error);
$smarty->assign('social', GET_String('from'));
$smarty->assign('login', GET_String('login'));
$smarty->display('pages/account/login.tpl');

?>