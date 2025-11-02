<?php 

include 'auth.php';

$Username= $_GET["Username"];
$Password= $_GET["Password"];
$UID= $_GET['UID'];
$Hoje = date("Y-m-d H:i:s");

$login = mysqli_query($conn,"SELECT * FROM tokens WHERE Username=brmods");
$cek = mysqli_num_rows($login);

if($cek > 0){
    print("Foi 1 encontrado cliente");
}else{
    print("0 clientes encontrado");
}

?>