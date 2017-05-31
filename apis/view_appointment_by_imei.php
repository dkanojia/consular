<?php
include_once('../config.php');
$imei = $_POST['imei'];
// $imei = $_POST['355490067599294'];


//`intId`, `status`, `username`, `mobile`, `imei`, `email`, `passport_no`, `booked_date`, `city`, `booked_city`, `created_on` 

$query = "SELECT * FROM `appointments` WHERE `imei` = '$imei' AND `status` = '1'";
$result = mysqli_query($conn ,$query);

$str = '';
while($row = mysqli_fetch_assoc($result)){
	
	$date1=date("Y-m-d");
	$date2=$row['booked_date'];
	$now = time(); // or your date as well
		$your_date = strtotime($date2);
		$datediff = $now - $your_date;
		
		$dayDiff = floor($datediff / (60 * 60 * 24));
		if($dayDiff < 0){
			$type = 'upcoming';
		}else{
			$type = 'past';

		}
		
			$str = $str . '{ "id":"'.$row['intId'].'" , "type":"'.$type.'" ,"status" : "'.$row['status'].'" ,"username" : "'.$row['username'].'" ,"mobile" : "'.$row['mobile'].'" ,"passport_no" : "'.$row['passport_no'].'" ,"booked_date" : "'.$row['booked_date'].'" ,"city" : "'.$row['city'].'" , "gamca_medical":"http://www.uaeconsularsection.org/section/uae/consular/uploaded_data/'.$row['passport_no'].'/'.$row['username'].'/'.$row['gamca_medical'].'" ,"entry_permit":"http://www.uaeconsularsection.org/section/uae/consular/uploaded_data/'.$row['passport_no'].'/'.$row['username'].'/'.$row['entry_permit'].'"},';
		
	
	}
	
	
	
	
$str = rtrim($str , ',');
if($str != ''){
	echo '{ "response":"true" , "data":['.$str.']}';
}else{
	echo '{ "response":"true" , "data":[]}';

}



?>