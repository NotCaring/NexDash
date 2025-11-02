
<?php
	require_once('security.php');
	Guard::_startGuard();
	error_reporting(0);
	define( 'BASE_PATH', dirname(dirname(dirname(__FILE__))) . DIRECTORY_SEPARATOR ); 

	require_once(BASE_PATH . 'config' . DIRECTORY_SEPARATOR . 'inc.config.php');
	
	define("DB_HOST", $config['db']['game']['host']);
	define("DB_NAME", $config['db']['game']['name']);
	define("DB_USERNAME", $config['db']['game']['user']);
	define("DB_PASSWORD", $config['db']['game']['pass']);
    
	$conexao = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);

    if($conexao->connect_error != null){
		die($conexao->connect_error);
	}


	$odb = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USERNAME, DB_PASSWORD);
	putenv("Brazil/East");

	$encKey = "b12rj0wdj0a9cjfqpwm0cmop6PwSd8yN"; //Put your unique encryption key here

	//Encryption
	function encryptData($value, $key){ 
	   $text = $value; 
	   $iv_size = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB); 
	   $iv = mcrypt_create_iv($iv_size, MCRYPT_RAND); 
	   $crypttext = mcrypt_encrypt(MCRYPT_RIJNDAEL_256, $key, $text, MCRYPT_MODE_ECB, $iv); 
	   return base64_encode($crypttext); 
	} 

	function decryptData($value, $key){ 
	   $crypttext = base64_decode($value); 
	   $iv_size = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB); 
	   $iv = mcrypt_create_iv($iv_size, MCRYPT_RAND); 
	   $decrypttext = mcrypt_decrypt(MCRYPT_RIJNDAEL_256, $key, $crypttext, MCRYPT_MODE_ECB, $iv); 
	   return trim($decrypttext); 
	}
?>
