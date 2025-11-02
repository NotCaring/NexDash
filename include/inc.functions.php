<?php

if(!defined('lightengine'))
{
	die('What are you doing here?');
}



function HashPassword($password)
{
	
	$key = "";
	$salt = "";
	$Personalization = "";
	$blake2s = new BLAKE2s($key, $salt, $Personalization);
	
	$hashed_password = $blake2s->hash($password);
	
	return $hashed_password;
}


function ValidateLogin($login)
{
	
	$length = strlen($login);
	if ($length < 4 || $length > 15)
	{
		return false;
	}

	
	if (!preg_match('|^[A-Z0-9]+$|i', $login))
	{
		return false;
	}

	return true;
}

function ValidateEmail($email)
{
	return preg_match("/^([a-zA-Z0-9])+([\.a-zA-Z0-9_-])*@([a-zA-Z0-9_-])+(\.[a-zA-Z0-9_-]+)*\.([a-zA-Z]{2,6})$/", $email);
}

function ValidateHash($hash)
{
	return (!empty($hash) && preg_match('/^[a-fA-F0-9]{32}$/i', $hash));
}

function CheckRecaptcha($secret_key) 
{
    try {

        $url = 'https://www.google.com/recaptcha/api/siteverify';
        $data = ['secret'   => $secret_key,
                 'response' => $_POST['g-recaptcha-response'],
                 'remoteip' => $_SERVER['REMOTE_ADDR']];

        $options = [
            'http' => [
                'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
                'method'  => 'POST',
                'content' => http_build_query($data) 
            ]
        ];

        $context  = stream_context_create($options);
        $result = file_get_contents($url, false, $context);
        return json_decode($result)->success;
    }
    catch (Exception $e) {
        return false;
    }
}


function GetFileSize($size)
{
	$sizes = array('Bytes', 'KBytes', 'MBytes', 'GBytes', 'TBytes');

	$n = 0; 
 
	while ( $n < count($sizes) && 
				(floor($size / (($n + 1) * 1024)) > 0) )
	{
		$n++;
		$size = round($size / 1024, 2);
	}

	return $size . ' ' . $sizes[$n];
}

function TimePassed($time)
{
	
	return sprintf('%02d d. %02d h. %02d m. %02d s.',  
					$time / 86400, 
					($time % 86400) / 3600, 
					($time % 3600) / 60, 
					($time % 3600) % 60); 
}

function TimeAgo($time)
{
	$time_dif = time() - $time;

	if ($time_dif > 0 && $time_dif < 60)
	{
		return $time_dif . ' s. ago';
	}

	if ($time_dif >= 60 && $time_dif < 3600)
	{
		return floor($time_dif / 60) . ' m. ago';
	}

	if ($time_dif >= 3600 && $time_dif < 86400)
	{
		return floor($time_dif / 3600) . ' h. ago';
	}

	if ($time_dif >= 86400 && $time_dif < 259200)
	{
		return floor($time_dif / 86400) . ' d. ago';
	}

	return date('H:i m/d/Y', $time);
}

function CreatePagination($page, $items_number, $page_size)
{
	$n = 5;

	$page_number = ceil($items_number / $page_size);

	$page_current = min( max($page, 1), $page_number );

	$page_start = 0;
	if($page_current > 0){
		$page_start = ($page_current - 1) * $page_size;
	}

	if ($page_current < floor($n / 2))
	{
		$start = 1;
		$end = $n;
	}
	else
	{
		if ($page_current > $page_number - floor($n / 2))
		{
			$start = $page_number - $n + 1;
			$end = $page_number;
		}
		else
		{
			$start = max(1, $page_current - floor($n / 2) + 1);
			$end = $page_current + floor($n / 2);	
		}
	}

	$start = max(1, $start);
	$end = min($page_number, $end);

	return array(
		'first'    => 1,
		'page_size'    => $page_size,
		'page_number'  => $page_number,
		'page_current' => $page_current,
		'page_start'   => $page_start,
		'start' => $start,
		'end' => $end,
		'total' => $items_number,
	);
}

function GetBaseUrl()
{

	if(array_key_exists('HTTPS', $_SERVER) && ($_SERVER['HTTPS'] == 'on'))
	{
		$url = 'https://';
	}
	else
	{
		$url = 'http://';
	}

	$url .= $_SERVER['SERVER_NAME'].$_SERVER['SCRIPT_NAME'];
	$parts = parse_url($url);

	if (substr($parts['path'],-1,1)=='/')
		$parts['dirpath'] = $parts['path'];
	else
		$parts['dirpath'] = substr($parts['path'], 0, strrpos($parts['path'],'/') + 1);
 
	if ((int)$_SERVER['SERVER_PORT'] != 80)
	{
		$url = $parts['scheme'].'://'.$parts['host'].':'.$_SERVER['SERVER_PORT'].$parts['dirpath'];
	}
	else
	{
		$url = $parts['scheme'].'://'.$parts['host'].$parts['dirpath'];	
	}

	return $url;
}

function GetScriptUrl()
{

	if(array_key_exists('HTTPS', $_SERVER) && ($_SERVER['HTTPS'] == 'on'))
	{
		$url = 'https://';
	}
	else
	{
		$url = 'http://';
	}

	$url .= $_SERVER['SERVER_NAME'].$_SERVER['SCRIPT_NAME'];
	$parts = parse_url($url);

	if (substr($parts['path'],-1,1)=='/')
		$parts['dirpath'] = $parts['path'];
	else
		$parts['dirpath'] = substr($parts['path'], 0, strrpos($parts['path'],'/') + 1);
 
	if ((int)$_SERVER['SERVER_PORT'] != 80)
	{
		$url = $parts['scheme'].'://'.$parts['host'].':'.$_SERVER['SERVER_PORT'].$parts['dirpath'];
	}
	else
	{
		$url = $parts['scheme'].'://'.$parts['host'].$parts['dirpath'];	
	}
	
	$script = basename(ltrim($_SERVER['SCRIPT_NAME'],'/'));
	
	return $url.$script;
}
?>