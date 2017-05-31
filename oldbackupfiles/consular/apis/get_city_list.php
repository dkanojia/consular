<?php
include_once('../config.php');

$query = "SELECT * FROM `cities` WHERE 1";
//`intId`, `city_name`
$result = mysqli_query($conn ,$query);
$str = '';
while($row = mysqli_fetch_assoc($result)){
	$str = $str . '{"city":"'.$row['city_name'].'"},';
}

$str  =  rtrim($str , ',');


if($str != ''){
	echo '{ "response":"true" , "data": ['.$str.']}';
}else{
	echo '{ "response":"false" , "message":"no data"}';

}



?>