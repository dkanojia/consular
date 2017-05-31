
<?php
include_once('config.php');
$id = $_POST['id'];
// $id = '16';

$qMetaF  = "SELECT * FROM `appointments` WHERE `intId` = '$id'";
$rMetaF = mysqli_query($conn ,$qMetaF);
$roMetaF = mysqli_fetch_assoc($rMetaF);

$title = "Cancel Appointment";
$name = $roMetaF['username'];
$passport_no = $roMetaF['passport_no'];
$device_id = $roMetaF['device_id'];
// echo $device_id;
// exit;

$message = $name." your appointment for passport no : ".$passport_no. "has been canceled.";

// mail('php@ccasociety.com' , $name, 'sjwb');
$ch = curl_init();

curl_setopt($ch, CURLOPT_URL,"http://www.uaeconsularsection.org/section/uae/consular/fcm/sendNotificationForCancelAppointment.php");
curl_setopt($ch, CURLOPT_POST, 1);


// in real life you should use something like:
 curl_setopt($ch, CURLOPT_POSTFIELDS, 
          http_build_query(array('title' => $title,'message' => 'Greetings:'.$message, 'device_id:'.$device_id)));

// receive server response ...
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$server_output = curl_exec ($ch);

curl_close ($ch);

?>
