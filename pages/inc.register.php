<?php


if(!defined('lightengine'))
{
	die('What are you doing here?');
}


if ($auth->getLoggedIn())
{
	header('location: index.php?act=account');
}


require_once(BASE_PATH . 'class' . DIRECTORY_SEPARATOR . 'class.smtpmailer.php');


$sent = isset($_POST['form']);

if ($sent)
{
	
	$login = POST_String('login');

	
	$password = POST_String('password');

	
	$repassword = POST_String('repassword');

	
	$key = "";
	$salt = "";
	$Personalization = "";
	$blake2s = new BLAKE2s($key, $salt, $Personalization);	
	
	
	$email = POST_String('email');
	
	
	$error = array();

	
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

	if (empty($email))
	{
		$error[] = 'Você não digitou o endereço de email!';
	}
	else
	{
		if (!ValidateEmail($email))
		{
			$error[] = 'Você digitou um endereço de e-mail incorreto!';
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
		$dbh = $game_db->prepare('SELECT COUNT(id) AS email_number FROM account_login WHERE email=?');
		$dbh->bindParam(1, $email);
		$dbh->execute();
		$row = $dbh->fetchObject();

		if ($row->email_number >= $config['registration']['max_email'])
		{
			$error[] = 'Você não pode mais criar contas com o endereço de e-mail especificado!';
		}
	}

	if (count($error) == 0)
	{		
		$hashed_password = $blake2s->hash($password);
		
		$ip = $_SERVER['REMOTE_ADDR'];
		
		$dbh = $game_db->prepare('INSERT INTO account_login (name, originalPassword, password, email) VALUES (?,?,UPPER(?),?)');
		$dbh->bindParam(1, $login);
		$dbh->bindParam(2, $password);
		$dbh->bindParam(3, $hashed_password);
		$dbh->bindParam(4, $email);
		$dbh->execute();
		
		if ($config['registration']['activation'])
		{
		
			$dbh = $game_db->prepare('UPDATE account_login SET ban=1 WHERE name=?');
			$dbh->bindParam(1, $login);
			$dbh->execute();

			$hash = md5($login);

			$time = time();

			$dbh1 = $light_db->prepare('INSERT INTO activation (account, email, hash, time, ip) VALUES (?,?,?,?,?)');
			$dbh1->bindParam(1, $login);
			$dbh1->bindParam(2, $email);
			$dbh1->bindParam(3, $hash);
			$dbh1->bindParam(4, $time);
			$dbh1->bindParam(5, $ip);
			$dbh1->execute();
			
			$smarty->assign('login', $login);
			$smarty->assign('hash', $hash);

			$mail = new CSmtpMailer();
			$mail->setHost($config['smtp']['host'], $config['smtp']['port']);
			$mail->setUser($config['smtp']['login'], $config['smtp']['password']);
			$mail->setFromName($config['server_name']);
			$mail->setSubject($config['server_name'].' - Registro de conta');
			$mail->setBody($smarty->fetch('email/register.tpl'));
			$mail->addAddress($email);
			$mail->Send();
		}
	}

	$smarty->assign('login', $login);
	$smarty->assign('error', $error);

}

$breadcrumbs = array(
	array('url' => 'index.php', 'caption' => 'Dashboard'),
	array('url' => '', 'caption' => 'Registro'),
);

$smarty->assign('pagename', 'Registro');
$smarty->assign('breadcrumbs', $breadcrumbs);
$smarty->assign('active', 'register');
$smarty->assign('sent', $sent);
$smarty->assign('recaptcha_key', $config['recaptcha']['public_key']);
$smarty->assign('max_email', $config['registration']['max_email']);
$smarty->assign('activation', $config['registration']['activation']);
$smarty->display('pages/register.tpl');

?>