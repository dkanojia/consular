<?php
include_once('config.php');
		$id = $_POST['id'];
		
		$qUpSta = "UPDATE `appointments` SET `status`= '0' WHERE `intId` = '$id'";
				
		$rFetApp  = mysqli_query($conn ,$qUpSta);
		if($rFetApp){echo '1';}else{echo '0';}

?>