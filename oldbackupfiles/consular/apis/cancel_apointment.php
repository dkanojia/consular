<?php
include_once('../config.php');
$id = $_POST['id'];


//`intId`, `status`, `username`, `mobile`, `imei`, `email`, `passport_no`, `booked_date`, `city`, `booked_city`, `created_on` 

$query = "UPDATE `appointments` SET `status`= '0' WHERE `intId` = '$id'";


if( mysqli_query($conn ,$query)){
	echo '{ "response":"true" , "message": "Your appointment has been cancelled successfully"}';
}else{
	echo '{ "response":"false" , "message":"Can not able to cancel your appointment, Kindly try again! "}';

}



?>