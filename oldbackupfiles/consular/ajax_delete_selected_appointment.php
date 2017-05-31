<?php
include_once('config.php');
	$id = $_POST['id'];
	
	$query = "DELETE FROM `appointments` WHERE `intId` = '$id'";
	if(mysqli_query($conn , $query)){
		echo '1';
	}else{
		echo '0';
	}
				
?>
				

	

