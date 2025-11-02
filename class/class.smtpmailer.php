<?php

require_once(BASE_PATH . 'lib' . DIRECTORY_SEPARATOR . 'phpmailer' . DIRECTORY_SEPARATOR . 'class.phpmailer.php');


class CSmtpMailer extends PHPMailer
{
	
	public function __construct()
	{
		$this->isHTML(true); 
		$this->isSMTP();
		$this->SMTPSecure = 'ssl';
		$this->SMTPAuth = true;
		$this->SMTPDebug = 0;
		$this->CharSet = 'UTF-8';
	}

	
	public function setHost($host, $port)
	{
		$this->Host = $host;
		$this->Port = $port;
	}

	
	public function setUser($login, $password)
	{
		$this->Username = $login;
		$this->Password = $password;
		$this->From = $this->Username;
	}

	
	public function setFromName($from)
	{
		$this->FromName = $from;
	}

	
	public function setSubject($subject)
	{
		$this->Subject = $subject;
	}

	
	public function setBody($body)
	{
		$this->Body = $body;
	}
}

?>