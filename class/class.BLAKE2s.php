<?php 

class BLAKE2
{        
	const sigma = [
		[  0, 1, 2, 3, 4, 5, 6, 7, 8, 9,10,11,12,13,14,15 ],
		[ 14,10, 4, 8, 9,15,13, 6, 1,12, 0, 2,11, 7, 5, 3 ],
		[ 11, 8,12, 0, 5, 2,15,13,10,14, 3, 6, 7, 1, 9, 4 ],
		[  7, 9, 3, 1,13,12,11,14, 2, 6, 5,10, 4, 0,15, 8 ],
		[  9, 0, 5, 7, 2, 4,10,15,14, 1,11,12, 6, 8, 3,13 ],
		[  2,12, 6,10, 0,11, 8, 3, 4,13, 7, 5,15,14, 1, 9 ],
		[ 12, 5, 1,15,14,13, 4,10, 0, 7, 6, 3, 9, 2, 8,11 ],
		[ 13,11, 7,14,12, 1, 3, 9, 5, 0,15, 4, 8, 6, 2,10 ],
		[  6,15,14, 9,11, 3, 0, 8,12, 2,13, 7, 1, 4,10, 5 ],
		[ 10, 2, 8, 4, 7, 6, 1, 5,15,11, 9,14, 3,12,13 ,0 ],
		[  0, 1, 2, 3, 4, 5, 6, 7, 8, 9,10,11,12,13,14,15 ],
		[ 14,10, 4, 8, 9,15,13, 6, 1,12, 0, 2,11, 7, 5, 3 ]
	];                   
	
	function __construct($mode,$PARAMS,$key="",$Tree_hashing_mode = False, $kerukuro = False)
		{
		switch ($mode)
			{
			/*
		           IV[i] = floor(2**w * frac(sqrt(prime(i+1)))), where prime(i)
		           is the i:th prime number ( 2, 3, 5, 7, 11, 13, 17, 19 )
		           and sqrt(x) is the square root of x.	
			   
			   BLAKE2b IV is the same as SHA-512 IV, and BLAKE2s IV is the
			      same as SHA-256 IV
			*/
			case "x32":
				$this->WORDBITS      	= 32;
				$this->MASKBITS      	= 0xFFFFFFFF;								
				$this->IV = [
				0x6a09e667, 0xbb67ae85,
				0x3c6ef372, 0xa54ff53a,
				0x510e527f, 0x9b05688c,
				0x1f83d9ab, 0x5be0cd19
				];
				$this->ROUNDS        	= 10;
								
				$this->ROT1 		= 16;
				$this->ROT2 		= 12;
				$this->ROT3 		= 8;
				$this->ROT4 		= 7;
				$this->pack 		= "V*";
				break;
			case "x64":
				$this->WORDBITS      	= 64;
				$this->MASKBITS      	= gmp_init("0xFFFFFFFFFFFFFFFF");					
				$this->IV = [
				    gmp_init("0x6a09e667f3bcc908"), gmp_init("0xbb67ae8584caa73b"),
				    gmp_init("0x3c6ef372fe94f82b"), gmp_init("0xa54ff53a5f1d36f1"),
				    gmp_init("0x510e527fade682d1"), gmp_init("0x9b05688c2b3e6c1f"),
				    gmp_init("0x1f83d9abfb41bd6b"), gmp_init("0x5be0cd19137e2179")
				];
				$this->ROUNDS        	= 12;  
								
				$this->ROT1 		= 32;
				$this->ROT2 		= 24;
				$this->ROT3 		= 16;
				$this->ROT4 		= 63;
				$this->pack 		= "P*";						
			} 
		
		/*
		It seems kerukuro implementation is bad
		
		https://github.com/kerukuro/digestpp
		
		You can test it activating this flag with his test vectors
		*/
		
		$this->Kerukuro		  = $kerukuro;
		
		/**********************************************/
			
		$this->BLOCKBYTES         = $this->WORDBITS * 2;		       
		$this->Digest_byte_length = ord($PARAMS["Digest_byte_length"]);
		$this->Tree_hashing_mode  = $Tree_hashing_mode;
		
		$PW = array_values(unpack($this->pack,implode($PARAMS)));
		
		foreach ($this->IV as &$g) $g &= $this->MASKBITS;
		
		for ($i=0;$i<8;$i++)
			$this->h[]     = $this->IV[$i] ^ $PW[$i];
		
		$this->nbytes          = 0;
		// Message byte offset at the end of the current block
		$this->t               = [0,0];
		// Flag indicating the last block
		$this->f               = [0,0];		
		$this->Finalized       = False;
		$this->Buffer	       = "";
		
		if ($key)
		    {	
		    $key .= str_repeat("\x0",$this->BLOCKBYTES-strlen($key));	    
		    self::update($key);
		    } 
		
		if ($this->Kerukuro)
		$this->Finalized       = True; 
		}
	
    	function Right_Roll($a, $n)
		{
		$bits = $this->WORDBITS;

	        $lp   = ($a >> $n)           & $this->MASKBITS;
	        $rp   = ($a << ($bits - $n)) & $this->MASKBITS;
		   
	        return ($lp & ((1 << ($bits - $n)) - 1))| $rp ;	   	
		}
			
	function G(&$v, $a, $b, $c, $d,$m1,$m2)
		{
		$f = $v[$a];
		$g = $v[$b];
		$h = $v[$c];
		$i = $v[$d];
		
		$f += $g + $m1; 
		$i  = $this->Right_Roll($i^$f,$this->ROT1);   
		$h += $i; 
		$g  = $this->Right_Roll($g^$h,$this->ROT2);
		
		$f += $g + $m2; 
		$i  = $this->Right_Roll($i^$f,$this->ROT3);
		$h += $i; 
		$g  = $this->Right_Roll($g^$h,$this->ROT4);
		
		$v[$a] = $f;
		$v[$b] = $g;
		$v[$c] = $h;
		$v[$d] = $i;
		}
		        
	function _compress($block)
		{    
		// Chacha            		
		$m = array_values(unpack($this->pack,$block));
		
		for ($k=0;$k<8;$k++)
			$v[$k]   = $this->h[$k];
		
		for ($k=0;$k<4;$k++)
			$v[$k+8] = $this->IV[$k];
		
		$v[12] = $this->t[0] ^ $this->IV[4];
		$v[13] = $this->t[1] ^ $this->IV[5];
		$v[14] = $this->f[0] ^ $this->IV[6];
		$v[15] = $this->f[1] ^ $this->IV[7];

		for ($r=0;$r<$this->ROUNDS;$r++)
			{
			$sr = self::sigma[$r];
			
			self::G($v,  0,  4,  8, 12, $m[$sr[0]], $m[$sr[1]]);
			self::G($v,  1,  5,  9, 13, $m[$sr[2]], $m[$sr[3]]);
			self::G($v,  2,  6, 10, 14, $m[$sr[4]], $m[$sr[5]]);
			self::G($v,  3,  7, 11, 15, $m[$sr[6]], $m[$sr[7]]);
			self::G($v,  0,  5, 10, 15, $m[$sr[8]], $m[$sr[9]]);
			self::G($v,  1,  6, 11, 12, $m[$sr[10]],$m[$sr[11]]);
			self::G($v,  2,  7,  8, 13, $m[$sr[12]],$m[$sr[13]]);
			self::G($v,  3,  4,  9, 14, $m[$sr[14]],$m[$sr[15]]);
			}
		
		for ($i=0;$i<8;$i++)
			$this->h[$i] = $this->h[$i] ^ $v[$i] ^ $v[$i+8];
		}		

	function updateKerukuro($stream)
		{    
		/*
		 bad way as implemented in https://github.com/kerukuro/digestpp 
		 
		 For testing https://github.com/kerukuro/digestpp/tree/master/test/testvectors
		*/   
	        
		$blocks = str_split($stream,$this->BLOCKBYTES);
		
		for ($k=0;$k<sizeof($blocks)-1;$k++)
			{
	                self::_increment_counter($this->BLOCKBYTES);
	                self::_compress($blocks[$k]);			
			}
			
		if ($this->Finalized)
			{
			self::_increment_counter(strlen($blocks[$k]));
			self::_set_lastblock();
			$blocks[$k] .= str_repeat("\x0",$this->BLOCKBYTES - strlen($blocks[$k]));
			self::_compress($blocks[$k]);			
			}
		}
				
	function update($stream)
		{   
		/*
		this is the correct way as implemented in https://github.com/BLAKE2/BLAKE2
		*/  
		if ($this->Kerukuro) return self::updateKerukuro($stream);  
		 
	        $datalen = strlen($stream);
	        $dataptr = 0;
	        while (True)
		    {
	            if (strlen($this->Buffer) > $this->BLOCKBYTES)
		    	{
	                self::_increment_counter($this->BLOCKBYTES);
	                self::_compress(substr($this->Buffer,0,$this->BLOCKBYTES));
	                $this->Buffer = substr($this->Buffer,$this->BLOCKBYTES);
			}
	            if ($dataptr < $datalen)
		    	{
	                $this->Buffer .= substr($stream,$dataptr,$this->BLOCKBYTES);
	                $dataptr      += $this->BLOCKBYTES;
			}
	            else
	                break;
		    }
		}

	function finals()
		{
	        if (!$this->Finalized and strlen($this->Buffer) and !$this->Kerukuro)
		    {
	            self::_increment_counter(strlen($this->Buffer));
	            self::_set_lastblock();
	            $this->Buffer .= str_repeat("\x0",$this->BLOCKBYTES - strlen($this->Buffer));
	            self::_compress($this->Buffer);
	            $this->Buffer = '' ; 
		    }
	
	        $this->Finalized = True;
		$v="";
		foreach ($this->h as $n)
			{
			$f  = pack($this->pack,$n);
			if ($this->WORDBITS==64) 
				{
				/* Strange value which need be fixed */							
				$g  = pack($this->pack,$n >> 56 | $n << 8);			
				$v .= substr($f,0,-1).$g[0];
				}
			else    $v .= $f;
			}		
		return bin2hex(substr($v,0,$this->Digest_byte_length));
		}    
	
	function _set_lastblock()
		{
		if ($this->Tree_hashing_mode)
		    $this->f[1] =  $this->MASKBITS;
		$this->f[0] =  $this->MASKBITS;		
		}
	
	function _increment_counter($nbytes)
		{
		$this->nbytes  += $nbytes;
		$this->t[0] 	= $this->nbytes &  $this->MASKBITS;
		$this->t[1] 	= $this->nbytes >> $this->WORDBITS;
		}
}

class BLAKE2s
{   
	// Max input data 2**64 - 1         
	function __construct(   $Key='',$Salt='',$Personalization='',$Digest_byte_length=32,  
	                 	$Fanout=1,    			$Maximal_depth=1, 
	                 	$Leaf_maximal_byte_length=0, 	$Node_offset=0, $Node_depth=0, 
	                 	$Inner_hash_byte_length=0,   	$Tree_hashing_mode=False, $kerukuro = False)
	{
		if (strlen($Key)>32) 		die ("Max key size 32 bytes");
		if (strlen($Salt)>8) 		die ("Max salt size 8 bytes");
		if (strlen($Personalization)>8) die ("Max Personalization size 8 bytes");
		
		$Salt   		.= str_repeat("\0",8-strlen($Salt));
		$Personalization 	.= str_repeat("\0",8-strlen($Personalization));
		$Node_offset 	 	 = pack("P*",$Node_offset);
		$this->Tree_hashing_mode = $Tree_hashing_mode;	 
		  
		$this->PARAMS = [	
		    	        "Digest_byte_length" 		=> chr($Digest_byte_length),
		                "key_length"			=> chr(strlen($Key)),
		                "Fanout"			=> chr($Fanout),
		                "Maximal_depth"			=> chr($Maximal_depth),
		                "Leaf_maximal_byte_length"	=> pack("V*",$Leaf_maximal_byte_length),
		                "node_offset_lo"		=> substr($Node_offset,0,4),
		                "node_offset_hi"		=> substr($Node_offset,4,2),
		                "Node_depth"			=> chr($Node_depth),
		                "Inner_hash_byte_length"	=> chr($Inner_hash_byte_length),
		                "Salt"				=> $Salt,
		                "Personalization"		=> $Personalization
		               ];	
			
		$this->key = $Key;
		$this->kerukuro = $kerukuro;  
	}
	
	function hash($data)
	{    
		$blake = new BLAKE2("x32",$this->PARAMS,$this->key, $this->Tree_hashing_mode, $this->kerukuro); 
		$blake->update($data); 	  
		return $blake->finals(); 
	}
}
?>