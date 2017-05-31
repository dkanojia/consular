<?php

include_once('config.php');

$set_limit = $_POST['set_limit'];

$query = "UPDATE `appointment_meta_data` SET `limit_booking` = '$set_limit'";

if(mysqli_query($conn , $query)){
	echo '<script>alert("Done successfully.");  window.setTimeout(function(){window.location.href = "http://'.getenv('HTTP_HOST').'/uae1/view_appointment"},1000);</script>';
}else{
		echo '<script>alert("not successfully.");  window.setTimeout(function(){window.location.href = "http://'.getenv('HTTP_HOST').'/uae1/view_appointment"},1000);</script>';
}


?>