<?php 
    $dbhost = 'localhost';
    $dbuser = 'u342152564_Infinity2';
    $dbpass = '$aFPc?t3Qn';
    $db = 'u342152564_uInfinity2';
    
    $conn = mysqli_connect($dbhost, $dbuser, $dbpass , $db) or die($conn); 

    if (mysqli_connect_error()){
    	echo "error :". mysqli_connect_error();
    }
?>

