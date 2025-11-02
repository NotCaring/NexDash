<?php
/*
	Light Engine 1.0

	File: index.php
	Author: Wantows
	Date: 04/05/2020
*/
date_default_timezone_set("America/Bahia");
define( 'lightengine', true );
define( 'DEBUG', true );
define( 'BASE_PATH', __DIR__ . DIRECTORY_SEPARATOR ); 

error_reporting(DEBUG);	
error_reporting(E_ALL & ~E_NOTICE);


require_once(BASE_PATH . 'config' . DIRECTORY_SEPARATOR . 'inc.config.php');
require_once(BASE_PATH . 'include' . DIRECTORY_SEPARATOR . 'inc.functions.php');
require_once(BASE_PATH . 'include' . DIRECTORY_SEPARATOR . 'inc.functions.input.php');
require_once(BASE_PATH . 'lib' . DIRECTORY_SEPARATOR . 'smarty' . DIRECTORY_SEPARATOR . 'Smarty.class.php');
require_once(BASE_PATH . 'class' . DIRECTORY_SEPARATOR . 'class.auth.php');
require_once(BASE_PATH . 'class' . DIRECTORY_SEPARATOR . 'class.BLAKE2s.php');
session_start();

try
{

	$smarty = new Smarty();
	$smarty->template_dir = BASE_PATH . 'templates';
	$smarty->compile_dir  = BASE_PATH . 'templates_c';
	$smarty->cache_dir    = BASE_PATH . 'cache';
	$smarty->config_dir   = BASE_PATH . 'config';

	
	$auth = new CAuth();
	

	$smarty->assign('base_url', GetBaseUrl());
	$smarty->assign('script_url', GetScriptUrl());
	$smarty->assign('base_path', BASE_PATH);
	$smarty->assign('title', $config['server_name']);
	$smarty->assign('auth', array(
								'logged_in' => $auth->getLoggedIn(),
								'login'     => $auth->getLogin(),
								'id'        => $auth->getId(),
								'jmes'      => $auth->getGmLevel(),
								'email'     => $auth->getEmail(),
								'admin'     => $auth->getIsAdmin(),
								'mod'     	=> $auth->getIsMod(),
								'seller'    => $auth->getIsSeller(),
								'credits'   => $auth->GetCredits(),
								//'refpts'    => $auth->GetRefPts(),
							)
	);


	$game_db = new PDO( 'mysql:host='    . $config['db']['game']['host']  . 
								';dbname=' . $config['db']['game']['name']  , 
											   $config['db']['game']['user']  , 
											   $config['db']['game']['pass']  , 
											   array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)
	);
		
	
	$light_db = new PDO('sqlite:data/lightengine.db');
	
	if ($auth->getLoggedIn() == false)
	{
		
		require_once(BASE_PATH . 'lib' . DIRECTORY_SEPARATOR . 'google' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php');
		
		
		require_once(BASE_PATH . 'lib' . DIRECTORY_SEPARATOR . 'facebook' . DIRECTORY_SEPARATOR . 'autoload.php');
		
		
		$http = new GuzzleHttp\Client([
			'verify' => BASE_PATH . 'data' . DIRECTORY_SEPARATOR . 'cacert.pem'
		]);

		
		$gClient = new Google_Client();
		$gClient->setHttpClient($http);
		$gClient->setClientId($config['oauth']['google']['client_id']);
		$gClient->setClientSecret($config['oauth']['google']['client_secret']);
		$gClient->setApplicationName($config['oauth']['google']['app_name']);
		$gClient->setRedirectUri(sprintf('%sindex.php?act=login&from=google', GetBaseUrl()));
		$gClient->addScope('email');
		$gClient->setAccessType('offline');
		$gClient->setIncludeGrantedScopes(true); 
		
		
		$fb = new Facebook\Facebook([
			'app_id' => $config['oauth']['facebook']['client_id'],
			'app_secret' => $config['oauth']['facebook']['client_secret'],
			'default_graph_version' => 'v3.2',
		]);
		
		$fb_helper = $fb->getRedirectLoginHelper();
	
		
		$smarty->assign('auth_url', array(
			'google' => $gClient->createAuthUrl(),
			'facebook' => $fb_helper->getLoginUrl( sprintf('%sindex.php?act=login&from=facebook', GetBaseUrl()), ['email'] )
		));
	}

	
	$action = strtolower(trim(preg_replace('/[^0-9a-z]/i', '', GET_String('act', 'index'))));
	
	
	switch($action)
	{
		case 'index':
		case 'register':
			require_once(BASE_PATH . 'pages' . DIRECTORY_SEPARATOR . 'inc.' . $action . '.php');
			break;
		case 'login':
		case 'logout':
		case 'restore':
		case 'account':
		case 'changemail':
		case 'changepass':
		case 'setpassword':
		case 'activation':
		case 'referral':
		case 'adduser':
		case 'users':
		case 'editar':
			require_once(BASE_PATH . 'pages' . DIRECTORY_SEPARATOR . 'account' . DIRECTORY_SEPARATOR . 'inc.' . $action . '.php');
			break;

		case 'admin':
		case 'logs':
		case 'logsadmin':
		case 'produto':
		case 'activate':
		case 'panel':
			require_once(BASE_PATH . 'pages' . DIRECTORY_SEPARATOR . 'admin' . DIRECTORY_SEPARATOR . 'inc.' . $action . '.php');
			break;
		default:
			require_once(BASE_PATH . 'pages' . DIRECTORY_SEPARATOR . 'inc.404.php');
	}
}
catch (PDOException $e)
{
	
	$smarty->assign('pagename', 'Critical error');
	$smarty->assign('error', array(
		'debug' => DEBUG,
		'message' => sprintf('PDO error when working with database: <b>%s</b>', $e->getMessage()),
	));
	
	$smarty->display('pages/exception.tpl');
}
catch(Exception $e)
{
	$smarty->assign('pagename', 'Critical error');
	$smarty->assign('error', array(
		'debug' => DEBUG,
		'message' =>  sprintf('General error: <b>%s</b>', $e->getMessage()),
	));
	
	$smarty->display('pages/exception.tpl');
}

?>
