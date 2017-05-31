<?php
include_once('../config.php');

//must in yyyy-mm-dd format

// $query = "SELECT * FROM `holidays` WHERE `date` LIKE '2017-05%' ";
$query = "SELECT * FROM `holidays`";
//echo $query;
$result = mysqli_query($conn ,$query);
$i = 0;
$fest_date_arr = array();

while($row = mysqli_fetch_assoc($result)){
    $fet_day = explode('-' , $row['date']);
    $fest_date_arr[$i] =  $fet_day[2].'-'.$fet_day[1].'-'.$fet_day[0];
    $i++;
}

$avail_date = array();

// $clean1 = array_diff($all_day, $fest_date_arr); 
// $clean2 = array_diff($fest_date_arr, $all_day); 
// $avail_date = array_merge($clean1, $clean2);
$avail_date = $fest_date_arr;


//$avail_date = array_diff($fest_date_arr , $all_day);

$str = '';
foreach ($avail_date as $data){
    // $str = $str. '{'.$data.'-'.$curr_mm.'-'.$curr_yy .'},';
    $str = $str. '{'.$data.'},';
}

$str = rtrim($str , ',');
//echo $str;
$today_dis = date('Y-m-d');
$today_dis = '{'.$today_dis.'},';
$today_dis1 = '{'.$today_dis.'}';

$str = str_replace($today_dis , '', $str );
$str = str_replace($today_dis1 ,'', $str );
echo '{"reponse":"true" , "messsage":['.$str.']}';
?>