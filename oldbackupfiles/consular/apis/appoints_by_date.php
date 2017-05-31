<?php
include_once('../config.php');
$date = $_POST['date'];


//`intId`, `status`, `username`, `mobile`, `imei`, `email`, `passport_no`, `booked_date`, `city`, `booked_city`, `created_on` 

$query = "SELECT * FROM `appointments` WHERE `booked_date` = '$date'";
$result = mysqli_query($conn ,$query);

$str = '';
while($row = mysqli_fetch_assoc($result)){
	$str = $str . '{ "status" : "'.$row['status'].'" ,"username" : "'.$row['username'].'" ,"mobile" : "'.$row['mobile'].'" ,"passport_no" : "'.$row['passport_no'].'" ,"booked_date" : "'.$row['booked_date'].'" ,"city" : "'.$row['city'].'"},';
}

$str = rtrim($str , ',');
if($str != ''){
	echo '{ "response":"true" , "data":['.$str.']}';
}else{
	echo '{ "response":"false" , "data":"no data"}';

}



?>