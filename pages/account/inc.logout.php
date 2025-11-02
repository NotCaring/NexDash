<?php

if(!defined('lightengine'))
{
	die('What are you doing here?');
}
	
$auth->logout();

header('location: index.php');

?>