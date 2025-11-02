<?php

include('config.php');

function Xor_Dark32_Enc($str)
{
    $str = "SINGKEY:".$str;
    $index = 0;
    $key = unpack("C*",strval(strlen($str)));
    $bytes = unpack("C*",$str);
    for($x = 1;$x<sizeof($bytes) +1;$x++)
    {
        $index = $index == sizeof($key) ? 1 : $index + 1;
        $bytes[$x] = $bytes[$x] ^ $key[$index];
    }
    return implode(array_map("chr", $bytes));
}
function Xor_Dark32_EncSto($str)
{
    $str = "SINGKEY:".$str;
    $index = 0;
    $key = unpack("C*","abc");
    $bytes = unpack("C*",$str);
    for($x = 1;$x<sizeof($bytes) +1;$x++)
    {
        $index = $index == sizeof($key) ? 1 : $index + 1;
        $bytes[$x] = $bytes[$x] ^ $key[$index];
    }
    return implode(array_map("chr", $bytes));
}
function Xor_Dark32_Dec($str)
{
    $index = 0;
    $key = unpack("C*","abc");
    $bytes = unpack("C*",$str);
    for($x = 1;$x<sizeof($bytes) +1;$x++)
    {
        $index = $index == sizeof($key) ? 1 : $index + 1;
        $bytes[$x] = $bytes[$x] ^ $key[$index];
    }
    $result = implode(array_map("chr", $bytes));
    return substr( $result, 0, 8) === "SINGKEY:" ? str_replace("SINGKEY:","",$result) : "";
}
function Xor_Dark32_Dec_with_key($str,$cha)
{
    $index = 0;
    $key = unpack("C*",$cha);
    $bytes = unpack("C*",$str);
    for($x = 1;$x<sizeof($bytes) +1;$x++)
    {
        $index = $index == sizeof($key) ? 1 : $index + 1;
        $bytes[$x] = $bytes[$x] ^ $key[$index];
    }
    $result = implode(array_map("chr",$bytes));
    return  substr( $result, 0, 8) === "SINGKEY:" ? str_replace("SINGKEY:","",$result) : "";
}

//==================================
$pUsuario = $conexao->real_escape_string($_GET['us']);
$pSenha = $conexao->real_escape_string($_GET['pa']);
$pDevice1 = $conexao->real_escape_string($_GET['uid']);
$pDevice2 = $conexao->real_escape_string($_GET['uid2']);
$token = Xor_Dark32_Dec(base64_decode($_GET['tok']));

//==================================
$action = $_GET['action'];
$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
$isTokns = substr(str_shuffle($chars),0,26);

$userlixo = "donii";
//==================================

//==================================
function meuip()
{
    if (!empty($_SERVER['HTTP_CF_CONNECTING_IP']))
    {
        $ip = $_SERVER['HTTP_CF_CONNECTING_IP'];
    }
    else if (!empty($_SERVER['HTTP_CLIENT_IP']))        //check ip from share internet
    {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    }
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))   //to check ip is pass from proxy
    {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }
    else
    {
        $ip = filter_var($_SERVER['REMOTE_ADDR'], FILTER_VALIDATE_IP, FILTER_FLAG_IPV4);
    }
    return $ip;
}

if(!$action)
{
	echo '<pre>{"return:"'.$isTokns.'"ip:","'.meuip().'"}</pre>';
}
else
{	
	if($action == "auth")//AUTENTICAÇÃO COM DADOS SIMPLES.
	{		
		// checkando existencia do login
        $verificar_login = $odb -> prepare("SELECT * FROM `tokens` WHERE `Username`= ?");
        $verificar_login->execute( array ( $pUsuario ) );
       
       
		if($verificar_login->rowCount() == "1")
		{
			$info = $verificar_login->fetch(PDO::FETCH_ASSOC);
			$pSenhaHash = $info2['pa'];
			$TokenStatus = $info['token'];
		   
			if(password_verify($pSenha, $pSenhaHash ))
			{
				if(strcmp($TokenStatus,$token) == 0)
				{
					$query = $odb->prepare("UPDATE `tokens` SET `token` = :token WHERE `Username` = $pUsuario");
					$query->execute(array(".$pToken."=>$isTokns, "$pUsuario"=>$pUsuario));
					exit(base64_encode(Xor_Dark32_Enc($TokenStatus)));
                
				}
			}
		}
		exit( '<pre>{"return:request","ip:","'.meuip().'"}</pre>');
	}
	else if($action == "status")//VERIFICAR STATUS DO MOD
    {       
		$isStatus = "OFFLINE";
		echo "$isStatus";
    }
	else if($action == "status2")//VERIFICAR STATUS DO MOD
    {       
		$isStatus = "OFFLINE";
		echo "$isStatus";
    }
	else if($action == "msg_ingame")//VERIFICAR STATUS DO MOD
	{		
		$SQLStatus = $odb -> prepare("SELECT * FROM `products` WHERE mode = 'injetor'");
        $SQLStatus -> execute();    
		while ($getInfo = $SQLStatus -> fetch(PDO::FETCH_ASSOC))
		{
			$pStatus = $getInfo['status'];
			if($pStatus == "ON"){
			    $isStatus = "MESSAGE";
			}else{
				$isStatus = "FALSE";
			}
			echo "$isStatus";
		}
	}
	else if($action == "ip_address")//BYPASS CLOUDFLARE / VPN > PEGAR IP.
	{
		echo '<pre>{"return:true","ip:","'.meuip().'"}</pre>';
	}
}

?>