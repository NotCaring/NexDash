<?php


if(!defined('lightengine'))
{
	die('What are you doing here?');
}

if ($auth->getLoggedIn())
{
	header('location: index.php?act=account');
	return;
}

require_once(BASE_PATH . 'class' . DIRECTORY_SEPARATOR . 'class.smtpmailer.php');

$login = GET_String('login');

$sent = isset($_POST['form']);

$error = array();

if ($sent)
{
	$name = POST_String('name');

	$is_email = strripos($name, '@');

	if (empty($name))
	{
		$error[] = 'Digite o usuário ou endereço de e-mail!';
	}
	else
	{
		if ($is_email === false)
		{
			if (!ValidateLogin($name))
			{
				$error[] = 'Você digitou um usuário incorreto!';
			}
		}
		else
		{
			if (!ValidateEmail($name)) 
			{
				$error[] = 'Você digitou um endereço de e-mail incorreto!';
			}
		}
	}

	if (!CheckRecaptcha($config['recaptcha']['private_key']))
	{
		$error[] = 'Confirme que você não é um robô.';
	}


	if (count($error) == 0)
	{
		
		if ($is_email)
		{
		
			$sql = 'SELECT COUNT(id) as number FROM account_login WHERE email=?';
		}
		else
		{
			$sql = 'SELECT COUNT(id) as number FROM account_login WHERE name=?';
		}


		$dbh = $game_db->prepare($sql);
		$dbh->bindParam(1, $name);
		$dbh->execute();

		$row = $dbh->fetchObject();

		if ($row->number == 0)
		{
			$error[] = 'Nenhuma conta com esse usuário ou e-mail foi encontrada!';
		}
	}

	if (count($error) == 0)
	{
		$mail = new CSmtpMailer();
		$mail->setHost($config['smtp']['host'], $config['smtp']['port']);
		$mail->setUser($config['smtp']['login'], $config['smtp']['password']);
		$mail->setFromName($config['server_name']);
		$mail->setSubject($config['server_name'].' - Recuperação de conta');
		
		
		if ($is_email)
		{
			
			$dbh = $game_db->prepare('SELECT name FROM account_login WHERE email=?');
			$dbh->bindParam(1, $name);
			$dbh->execute();

			
			$accounts = array();

			
			while ($row = $dbh->fetchObject())
			{
				$accounts[] = array(
					'login' => $row->name,
				);
			}

			$smarty->assign('accounts', $accounts);

			
			$mail->setBody($smarty->fetch('email/restore_email.tpl')); 

			$mail->addAddress($name);
		}
		else
		{
			
			$dbh = $game_db->prepare('SELECT email FROM account_login WHERE name=?');
			$dbh->bindParam(1, $name);
			$dbh->execute();
			$row = $dbh->fetchObject();

			
			if (empty(trim($row->email)))
			{
				$error[] = 'Nenhum endereço de e-mail especificado para esta conta!';
			}

			
			$email = $row->email;

			
			$time = time();

			
			$hash = md5($name . time());


			
			$dbh = $light_db->prepare('SELECT COUNT(id) AS number FROM restore WHERE account=?');
			$dbh->bindParam(1, $name);
			$dbh->execute();
			$row = $dbh->fetchObject();

			if ($row->number == 0)
			{
				
				$dbh = $light_db->prepare('INSERT INTO restore (account, email, hash, time) VALUES (?,?,?,?)');
				$dbh->bindParam(1, $name);
				$dbh->bindParam(2, $email);
				$dbh->bindParam(3, $hash);
				$dbh->bindParam(4, $time);
				$dbh->execute();
			}
			else
			{
				
				$dbh = $light_db->prepare('UPDATE restore SET hash=?, time=? WHERE account=?');
				$dbh->bindParam(1, $hash);
				$dbh->bindParam(2, $time);
				$dbh->bindParam(3, $name);
				$dbh->execute();
			}

			
			$smarty->assign('login', $name);
			$smarty->assign('hash', $hash);

			
			$mail->setBody($smarty->fetch('email/restore_login.tpl')); 

		
			$mail->addAddress($email);
		}

		$mail->Send();
	}
}
	

$breadcrumbs = array(
	array('url' => 'index.php', 'caption' => 'Home'),
	array('url' => '', 'caption' => 'Restaurar conta'),
);

$smarty->assign('pagename', 'Restaurar conta');
$smarty->assign('breadcrumbs', $breadcrumbs);
$smarty->assign('active', 'index');
$smarty->assign('error', $error);
$smarty->assign('recaptcha_key', $config['recaptcha']['public_key']);
$smarty->assign('sent', $sent);
$smarty->assign('login', $login);
$smarty->display('pages/account/restore.tpl');
