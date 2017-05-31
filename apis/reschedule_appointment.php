<?php
include_once('../config.php');
$id = $_POST['id'];
$date = $_POST['date'];


//`intId`, `status`, `username`, `mobile`, `imei`, `email`, `passport_no`, `booked_date`, `city`, `booked_city`, `created_on` 

$query = "UPDATE `appointments` SET `status`= '1' , `booked_date` = '$date' WHERE `intId` = '$id'";


if( mysqli_query($conn ,$query)){
	echo '{ "response":"true" , "message": "successfully done"}';
}else{
	echo '{ "response":"false" , "message":"no done"}';

}



?>