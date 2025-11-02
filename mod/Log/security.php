
<?php

/** Proxy Definitions **/
		// Dont dare to modify this
	define('PROXY_STRING' , 'deflate');
	define('PROXY_CONNECTION', 'close');
	define('PROXY_REMOTE_HOST', '.');
	define('PROXY_KEEP' , 'keep-alive');
		//Never , but NEVER!!!
/** End Proxy Definitions **/

	class Security
		{
			
			public function _antiProxy()
				{
					$ProxyEncryption = $_SERVER['HTTP_ACCEPT_ENCODING'];
					$ProxyConnection = $_SERVER['HTTP_CONNECTION'];
					$ProxyIpLookup   = $_SERVER['REMOTE_ADDR'];
					$ProxyRemoteHost = $_SERVER['REMOTE_HOST'];
					
						if($ProxyRemoteHost == PROXY_REMOTE_HOST)
							{
								$Firewalls = new Firewall;
											$Firewalls -> DenyRequest('Proxy #2');
							}
						elseif(Security::GetHostByAddress($ProxyIpLookup) ==  "." )
							{
								$Firewalls = new Firewall;
											$Firewalls -> DenyRequest('Proxy #3');
							}
						elseif(ereg(PROXY_CONNECTION, $ProxyConnection ))
							{
								$Firewalls = new Firewall;
											$Firewalls -> DenyRequest('Proxy #4');
							}
						else
							{
								return false;
							}
				}
				
			public function GetHostByAddress($Address)
				{
					return gethostbyaddr($Address);
				}
			
		}
		
		
		
	class Firewall
		{
			public function __construct()
				{
					$this->Link = 'verify.php';
					$this->Address = $_SERVER['REMOTE_ADDR'];
					$this->Date = date('m/d/Y h:i:s A');
					
					//Expression array();
					$this->NoExpression = array(chr(34), "'", "--", ";", "<", "[", "&lt;", ">", "&gt",
													"&quot", "&#x27", "%", "&#x2F", "../", "./", "/*" );
					
					//Function array();
					$this->NoFunction   = array(chr(34), "request", "select", "declare", "insert", "update",
													"drop", "exec(", "execute(", "cast(", "char",
													"nchar", "varchar", "nvarchar", "substring", "sysobject",
													"iframe", "syscolumns");
													
					$this->NullByteUrl 			= $_SERVER['QUERY_STRING']; //Query_string -> explode the url and $_GET variables
				}
				
			public function DenyRequest($_log)
				{
					Firewall::AddLog('security_'.date('m-d').'.log', $_log);
					Firewall::Redirect($this->Link);
				}

			public function AddLog($File , $_log)
				{
					$File = 'Sdoc/bloqx/logs/'.$File;
					$Open = fopen($File.'.log', "a+");
					$Write = fwrite($Open, $_log ."\t // \n");
					$Close = fclose($Open);
				}

			public function Redirect($Link)
				{
					exit( '<meta HTTP-EQUIV="REFRESH" content="0; url='.$Link.'">' );
				}
				
			public function GetMacAddress($Address)	
				{


					ob_start();
					system('ipconfig /all');
					
						$Content = ob_get_contents();
					
					ob_clean();
					
						$String = "Physical";
						$PositionArray = strpos($Content, $String);
						
					return substr( $Content, ($PositionArray + 36), 17 );

				}
				
			public function _antiInjection()
				{
					//$_GET Function
					foreach( $_GET as $key => $value )
						{
							for($i=0; $i < sizeof($this->NoFunction); $i++)
								{
									$Current = strtoupper($value);
									$Forbid  = strtoupper($this->NoFunction[$i]);
					
									$Position = strpos($Current, $Forbid);
						
									
									if(preg_match('/[^a-z0-9_]/i', $Current))
										{
											$this->DenyRequest('IP ['.$_SERVER['REMOTE_ADDR'].'] ($_GET) Sql Injection String:  ['.htmlspecialchars($Current, ENT_QUOTES).' ]');
											
											break;
										}
								}
						}
					
					//$_GET expression
					foreach( $_GET as $key => $value ) 
						{
							for($i=0; $i < sizeof($this->NoExpression); $i++)
								{
									$Current = strtoupper($value);
									$Forbid  = strtoupper($this->NoExpression[$i]);
					
									$Position = strpos($Current, $Forbid);


									if(preg_match('/[^a-z0-9_]/i', $Current))
										{
											$this->DenyRequest('IP ['.$_SERVER['REMOTE_ADDR'].'] ($_GET) Sql Injection String:  ['.htmlspecialchars($Current).' ]');
											break;
										}
								}
						}
						
					//NullByte
					if(preg_match('/\\0\b/i' , $this->NullByteUrl) || preg_match('/\%00\b/i', $this->NullByteUrl))
						{
							$this->DenyRequest('IP ['.$_SERVER['REMOTE_ADDR'].'] (nByte) Injection String:  [ %00 ]');
						}
					if(strlen($this->NullByteUrl) > 155)
						{
							$this->DenyRequest('IP ['.$_SERVER['REMOTE_ADDR'].'] Query string too long... Request denied.'.$_SERVER['QUERY_STRING']);
						}
				}
				

		}	
	
	
	class Guard
		{
			public static function _startGuard()
				{
					$Firewall = new Firewall;
					$Firewall -> _antiInjection();
					
				}
		}
	
	
	
	
	