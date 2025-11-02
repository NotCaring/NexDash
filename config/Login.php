<?php 

include 'DB.php';

$Username= $_GET["Username"];
$Password= $_GET["Password"];
$UID= $_GET['UID'];
$Hoje = date("Y-m-d H:i:s");

$login = mysqli_query($conn,"SELECT * FROM tokens WHERE Username='brmods'");
$cek = mysqli_num_rows($login);

if($cek > 0){
$data = mysqli_fetch_assoc($login);

	if($data["Password"] == $Password){
    if($data["EndDate"]>=$Hoje){
    
	   if($data["UID"] == NULL){
	   $query = $conn->query("UPDATE tokens SET UID= '$UID' WHERE Username='$Username'");
		// LOGADO COM SUCESSO
		echo "1";
	   }else{
	   if($data["UID"] == $UID){
		// LOGADO COM SUCESSO
		echo "1";
	   }else{
		// DISPOSITIVO NÃO PERMITIDO
		echo "2";
	}
	}
	}else{
		// LOGIN EXPIROU
	echo "3";
	}
	}else{
		// SENHA INVALIDA
		echo "4";
	}
	}else{
		// USUARIO NÃO REGISTRADO
		echo "5";
	}
?>