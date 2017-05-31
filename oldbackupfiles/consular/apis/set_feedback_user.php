<?php
include_once('../config.php');

$user = $_POST['user'];
$mobile = $_POST['mobile'];

$star = $_POST['star'];
$comment = $_POST['comment'];


$query = "INSERT INTO `feedback`(`username`, `mobile`, `star`, `comment`) VALUES ( '$user', '$mobile',  '$star' , '$comment')";
//`intId`, `city_name`



if(mysqli_query($conn ,$query)){
	echo '{ "response":"true" , "message": "Thank you for valuable feedback"}';
}else{
	echo '{ "response":"false" , "message":"no data"}';

}



?>