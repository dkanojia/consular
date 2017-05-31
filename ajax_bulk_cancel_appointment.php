<?php
include_once('config.php');
	$id = $_POST['id'];
	$query = "UPDATE `sectiono_db`.`appointments` SET `status` = 0 WHERE `intId` = '$id'";
	if(mysqli_query($conn , $query)){
		echo '1';
	}else{
		echo '0';
	}
				
?>