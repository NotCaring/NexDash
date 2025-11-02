<?php

if(!defined('lightengine'))
{
	die('What are you doing here?');
}

if (!$auth->getLoggedIn())
{
	header('location: index.php?act=login');
	return;
}

$sent = isset($_POST['form']);

if ($sent)
{
	
	$old_password = POST_String('oldpass');

	
	$new_password = POST_String('newpass');

	
	$re_password = POST_String('repass');

	
	$error = array();


	if (empty($old_password))
	{
		$error[] = 'Você não digitou a senha atual!';
	}
	else
	{
		
		$length = strlen($old_password);
		if ( ($length < 4 || $length > 15) || !preg_match('|^[A-Z0-9]+$|i', $old_password) )
		{
			$error[] = 'Você digitou uma senha atual incorreta!';
		}
	}

	
	if (empty($new_password))
	{
		$error[] = 'Você não digitou uma nova senha!';
	}
	else
	{
		
		$length = strlen($new_password);
		if ($length < 4 || $length > 15)
		{
			$error[] = 'A nova senha deve ter entre 4 e 15 caracteres!';
		}
		else
		{
			
			if(!preg_match('|^[A-Z0-9]+$|i', $new_password))
			{
				$error[] = 'Você digitou uma nova senha incorreta! Use apenas números e letras!';
			}
		}
	}

	
	if (empty($re_password))
	{
		$error[] = 'Você não digitou a confirmação da senha!';
	}
	else
	{
		
		if (strcmp($re_password, $new_password) !== 0)
		{
			$error[] = 'As senhas que você digitou não coincidem!';
		}
	}

	
	if (!CheckRecaptcha($config['recaptcha']['private_key']))
	{
		$error[] = 'Confirme que você não é um robô.';
	}

	if (strcmp($old_password, $new_password) == 0)
	{
		$error[] = 'Você já está usando esta senha!';
	}
	
	
	if (count($error) == 0)
	{
		
		$id = $auth->getId();

		
		$oldpass_hashed = HashPassword($old_password);

		
		$dbh = $game_db->prepare('SELECT COUNT(id) AS success FROM account_login WHERE id=? AND password=?');
		$dbh->bindParam(1, $id);
		$dbh->bindParam(2, $oldpass_hashed);

		
		$dbh->execute();

		
		$row = $dbh->fetchObject();

		
		if ($row->success == 1)
		{
			
			$newpass_hashed = HashPassword($new_password);

			
			$dbh = $game_db->prepare('UPDATE account_login SET originalPassword=?, password=? WHERE id=?');
			$dbh->bindParam(1, $new_password);
			$dbh->bindParam(2, $newpass_hashed);
			$dbh->bindParam(3, $id);

			
			$dbh->execute();
		}
		else
		{
			$error[] = 'Você digitou a senha atual errada!';
		}
	}

	$smarty->assign('error', $error);

}

$breadcrumbs = array(
	
	array('url' => 'index.php?act=account', 'caption' => 'Dashboard'),
	array('url' => '', 'caption' => 'Mudar senha'),
);


$smarty->assign('pagename', 'Mudar senha');
$smarty->assign('breadcrumbs', $breadcrumbs);
$smarty->assign('active', 'changepass');
$smarty->assign('recaptcha_key', $config['recaptcha']['public_key']);
$smarty->assign('sent', $sent);
$smarty->display('pages/account/changepass.tpl');
?>