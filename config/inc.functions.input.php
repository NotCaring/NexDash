<?php
/*
	
	File: inc.functions.input.php
	Author: Wantows
	Date: 05/05/2021
	
*/

function Validate_Integer($Value)
{
	
	$length = strlen($Value);
	if ($length < 4 || $length > 15)
	{
		return false;
	}

	
	if (!preg_match('|^[0-9]+$|i', $Value))
	{
		return false;
	}

	return true;
}

function Validate_String($Value)
{
	
	$length = strlen($Value);
	if ($length < 4 || $length > 15)
	{
		return false;
	}

	
	if (!preg_match('|^[A-Z0-9]+$|i', $Value))
	{
		return false;
	}

	return true;
}


function GET_Integer($name, $default = 0, $whitelist = array())
{
	if (isset($_GET[$name]))
	{
		$n = intval($_GET[$name]);

		if (empty($whitelist))
		{
			return $n;
		}

		if (in_array($n, $whitelist))
		{
			return $n;
		}
	}

	return $default;
}


function GET_String($name, $default = '', $whitelist = array())
{
	if (isset($_GET[$name]))
	{
		$str = trim($_GET[$name]);

		if (empty($whitelist))
		{
			return $str;
		}

		if (in_array($str, $whitelist))
		{
			return $str;
		}
	}

	return $default;
}


function GET_Boolean($name, $default = false)
{
	if (isset($_GET[$name]))
	{
		return boolval($_GET[$name]);
	}

	return $default;
}


function POST_Integer($name, $default = 0, $whitelist = array())
{
	if (isset($_POST[$name]))
	{
		$n = intval($_POST[$name]);

		if (empty($whitelist))
		{
			return $n;
		}

		if (in_array($n, $whitelist))
		{
			return $n;
		}
	}

	return $default;
}


function POST_String($name, $default = '', $whitelist = array())
{
	if (isset($_POST[$name]))
	{
		$str = trim($_POST[$name]);

		if (empty($whitelist))
		{
			return $str;
		}

		if (in_array($str, $whitelist))
		{
			return $str;
		}
	}

	return $default;
}


function POST_Boolean($name, $default = false)
{
	if (isset($_POST[$name]))
	{
		return boolval($_POST[$name]);
	}

	return $default;
}

?>