
<?php 
include 'init.php';

$check_status = mysqli_query($conn,"SELECT * FROM products WHERE mode = 'mod'");
$row = mysqli_fetch_assoc($check_status);

$status = $row['status'];
$IDx = $row['apk_size'];

$Size = GET_Integer('size');

if(Validate_Integer($Size)){
	if($status == "ATT" || $status == "OFF"){
		echo "Invalid";
	}else{
		if($Size == $IDx){
			echo "success";
		}else{
			echo "Invalid";
		}
	}
} else{
	echo "Invalid";
}
?>