
<?php

mail('php@ccasociety.com' , 'cron job', 'sadjwt');
$ch = curl_init();

curl_setopt($ch, CURLOPT_URL,"http://www.uaeconsularsection.org/section/uae/consular/fcm/sendSinglePush.php");
curl_setopt($ch, CURLOPT_POST, 1);


// in real life you should use something like:
 curl_setopt($ch, CURLOPT_POSTFIELDS, 
          http_build_query(array('title' => 'UAE CONSULAR SECTION','message' => 'Reminder: Your appointment is scheduled on ')));

// receive server response ...
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$server_output = curl_exec ($ch);

curl_close ($ch);

?>
