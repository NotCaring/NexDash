<?php 
    $dbhost = 'localhost';
    $dbuser = 'qpnbvfcj_thiago';
    $dbpass = 'tW=g.eYMIOiQ';
    $db = 'qpnbvfcj_thiago';
    
    $conn = mysqli_connect($dbhost, $dbuser, $dbpass , $db) or die($conn); 

    if (mysqli_connect_error()){
    	echo "error :". mysqli_connect_error();
    }
?>

