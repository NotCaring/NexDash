<?php
/*
	Light Engine 1.0

	File: class.auth.php
	Author: Wantows
	Date: 03.05.2021
*/

if(!defined('lightengine'))
{
	die('What are you doing here?');
}

require_once(BASE_PATH . 'config' . DIRECTORY_SEPARATOR . 'inc.config.php');
	
define('DBN_HOST'        , $config['db']['game']['host']);
define('DBN_NAME'        , $config['db']['game']['name']);
define('DBN_USER'        , $config['db']['game']['user']);
define('DBN_PASS'        , $config['db']['game']['pass']);


class CAuth
{

	
	public function __construct()
	{
		if (!$this->getLoggedIn())
		{
			$_SESSION['id']     = 0;
			$_SESSION['login']  = 'Guest';
			$_SESSION['email']  = '';
			$_SESSION['jmes']     = 0;
			$_SESSION['credits'] = 0;
		}
	}

	
	public function login($id, $login, $email, $jmes)
	{
		$_SESSION['auth']   = true;
		$_SESSION['id']     = $id;
		$_SESSION['login']  = $login;
		$_SESSION['email']  = $email;
		$_SESSION['jmes']	= $jmes;
	}


	public function logout()
	{
		unset($_SESSION['auth']);
		unset($_SESSION['id']);
		unset($_SESSION['login']);
		unset($_SESSION['email']);
		unset($_SESSION['jmes']);
		unset($_SESSION['credits']);
	}
	
	public function AddLog($action, $user, $client, $date, $adicional)
	{
		$game_db = new PDO('mysql: host='.DBN_HOST.';dbname='.DBN_NAME, DBN_USER, DBN_PASS, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
		if($this->getLoggedIn()){
			$dbh = $game_db->prepare('INSERT INTO logs(action,username,cliente,data,info_adicional) VALUES(?,?,?,?,?)');
			$dbh->bindParam(1, $action);
			$dbh->bindParam(2, $user);
			$dbh->bindParam(3, $client);
			$dbh->bindParam(4, $date);
			$dbh->bindParam(5, $adicional);
			
			$dbh->execute();
		}
	}
	
	public function Admin_AddLog($action, $user, $client, $date, $adicional)
	{
		$game_db = new PDO('mysql: host='.DBN_HOST.';dbname='.DBN_NAME, DBN_USER, DBN_PASS, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
		if($this->getLoggedIn()){
			$dbh = $game_db->prepare('INSERT INTO logs_admin(action,username,cliente,data,info_adicional) VALUES(?,?,?,?,?)');
			$dbh->bindParam(1, $action);
			$dbh->bindParam(2, $user);
			$dbh->bindParam(3, $client);
			$dbh->bindParam(4, $date);
			$dbh->bindParam(5, $adicional);
			
			$dbh->execute();
		}
	}
	
	public function GetCredits()
	{
		$game_db = new PDO('mysql: host='.DBN_HOST.';dbname='.DBN_NAME, DBN_USER, DBN_PASS, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
		if($this->getLoggedIn()){	
			$Account = $_SESSION['id'];
			$dbh = $game_db->prepare("SELECT credits FROM account_login WHERE id = ?");
			$dbh->bindParam(1, $Account);

			$dbh->execute();		
			
			$row = $dbh->fetchObject();
			if($row->credits){
				return $row->credits;
			}				
			else
			{
				return '0';
			}
		}
		else
		{
			return '0';
		}
	}	

	public function rankVendas($usuario)
	{
		$game_db = new PDO('mysql: host='.DBN_HOST.';dbname='.DBN_NAME, DBN_USER, DBN_PASS, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
		$fvend = $game_db->prepare('SELECT COUNT(*) AS counts FROM tokens WHERE Vendedor = ?');
		$fvend->bindParam(1, $usuario);
		$fvend->execute();
		
		$frow = $fvend->fetchObject();
		
		return $frow->counts;
	}
	
	public function getLoggedIn()
	{
		return (isset($_SESSION['auth']) && $_SESSION['auth'] == true);
	}

	public function getIsAdmin()
	{
		return (isset($_SESSION['jmes']) && $_SESSION['jmes'] == 99);
	}
	
	public function getIsMember()
	{
		return (isset($_SESSION['jmes']) && $_SESSION['jmes'] == 3);
	}
	
	public function getIsMod()
	{
		return (isset($_SESSION['jmes']) && $_SESSION['jmes'] == 50);
	}
	
	public function getIsSeller()
	{
		return (isset($_SESSION['jmes']) && $_SESSION['jmes'] == 30);
	}
	
	
	public function getLogin()
	{
		return $_SESSION['login'];
	}

	
	public function getId()
	{
		return $_SESSION['id'];
	}
	
	
	public function getEmail()
	{
		return $_SESSION['email'];
	}

	
	public function getGmLevel()
	{
		return $_SESSION['jmes'];
	}


	
	public function setLogin($login)
	{
		$_SESSION['login'] = $login;
	}

	
	public function setId($id)
	{
		$_SESSION['id']  = $id;
	}
	
	
	public function setEmail($email)
	{
		$_SESSION['email']  = $email;
	}

	
	public function setGmLevel($jmes)
	{
		$_SESSION['jmes']  = $jmes;
	}

};

?>