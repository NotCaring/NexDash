<?php

include 'auth.php';
$Username= $_GET['Username'];
$Password= $_GET['Password'];

$dt_hoje = date('Y-m-d H:i:s');

$login = mysqli_query($conn,"select * from tokens where Username='$Username'");
$cek = mysqli_num_rows($login);
if($cek > 0){
$data = mysqli_fetch_assoc($login);
	if($data["Password"] == $Password){
	
$dt_banco = $data["EndDate"];
$dt_hoje   = strtotime($dt_hoje);
$dt_banco  = strtotime($dt_banco);
$diferenca = $dt_banco - $dt_hoje;
$dias = (int)floor( $diferenca / (60 * 60 * 24));

print_r($dias + 1);
}
}
?>