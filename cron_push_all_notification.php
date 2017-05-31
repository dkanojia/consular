
<?php

$subject = $_POST['subject'];
$message = $_POST['message'];

// $date = $_POST['date'];
// $time = $_POST['time'];

// mail('php@ccasociety.com' , 'cron job', 'sadjwt');
$ch = curl_init();

curl_setopt($ch, CURLOPT_URL,"http://www.uaeconsularsection.org/section/uae/consular/fcm/sendNotificationPushForBroadcast.php");
curl_setopt($ch, CURLOPT_POST, 1);


// in real life you should use something like:
 curl_setopt($ch, CURLOPT_POSTFIELDS, 
          http_build_query(array('title' => $subject,'message' => 'Greetings:'.$message)));

// receive server response ...
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$server_output = curl_exec ($ch);

curl_close ($ch);

?>
