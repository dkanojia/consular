<?php
include_once('../config.php');

//must in yyyy-mm-dd format

// $date = $_POST['date'];
$date =  date("Y/m/d");
$date_par = array();
$date_par = explode('/' , $date);

$curr_yy =  $date_par[0];
$curr_mm =  $date_par[1];
//echo $curr_yy. '=='.$curr_mm;
$search_date = $curr_yy.'/'.$curr_mm.'%';

function getSundays($y,$m){ 
    $date = "$y-$m-01";
    $first_day = date('N',strtotime($date));
    $first_day = 7 - $first_day + 1;
    $last_day =  date('t',strtotime($date));
    $days = array();
    for($i=$first_day; $i<=$last_day; $i=$i+7 ){
        $days[] = $i.'-'.$m.'-'.$y;
    }
    return  $days;
}

function getSaturday($y,$m){ 
    $date = "$y-$m-01";
    $first_day = date('N',strtotime($date));
    $first_day = 7 - $first_day ;
    $last_day =  date('t',strtotime($date));
    $days = array();
    for($i=$first_day; $i<=$last_day; $i=$i+7 ){
        $days[] = $i.'-'.$m.'-'.$y;
    }
    return  $days;
}

$total_saturdays = array();
$total_sundays = array();

$all_sat = array();
$all_sun = array();

$all_sat_sun = array();

for ($i=1; $i < 13; $i++) { 
	for ($j=$i; $j <=$i; $j++){
		$total_saturdays = getSaturday($curr_yy,$i);
		$all_sat = array_merge($all_sat,$total_saturdays);
	}
}

for ($i=1; $i < 13; $i++) { 
	for ($j=$i; $j <=$i; $j++){
		$total_sundays = getSundays($curr_yy,$i);
		$all_sun = array_merge($all_sun,$total_sundays);
	}
}
// echo "<pre>";
// print_r($all_sat);
// echo "</pre>";
// exit;
// $query = "SELECT * FROM `holidays` WHERE `date` LIKE '2017-05%' ";
$query = "SELECT * FROM `holidays`";
//echo $query;
$result = mysqli_query($conn ,$query);
$i = 0;
$fest_date_arr = array();

$type ="";
while($row = mysqli_fetch_assoc($result)){
    $fet_day = explode('-' , $row['date']);
    $fest_date_arr[$i] =    $fet_day[2].'-'.$fet_day[1].'-'.$fet_day[0];
    $i++;
}

$avail_date = array();
$all_sat_sun = array_merge($all_sat,$all_sun);
$avail_date = array_merge($all_sat_sun,$fest_date_arr);


$str = '';
foreach ($avail_date as $data){

    $array=explode("-",$data);
    $rev=array_reverse($array);
    $date=implode("-",$rev);
    $type ="";
    $weekDay = date('w', strtotime($date));
    if($weekDay == 6){
        $type = "Sat";
    }elseif($weekDay == 0){
        $type = "Sun";
    }else{
        $query = "SELECT * FROM `holidays` where `date` = '".$date."'";
        //echo $query;
        $result = mysqli_query($conn ,$query);
        $i = 0;
        $fest_date_arr = array();

        while($row = mysqli_fetch_assoc($result)){
            $type = $row['holiday_name'];
            $i++;
        }
    }
	// $str = $str. '{'.$data.'-'.$curr_mm.'-'.$curr_yy .'},';
    // $str = $str. '{'.$data.'},';
    $str = $str . '{ "date":"'.$data.'" , "type":"'.$type.'"},';
}

$str = rtrim($str , ',');
//echo $str;
$today_dis = date('Y-m-d');
$today_dis = '{'.$today_dis.'},';
$today_dis1 = '{'.$today_dis.'}';

$str = str_replace($today_dis , '', $str );
$str = str_replace($today_dis1 ,'', $str );
// "data":['.$str.']}
// echo '{ "response":"true" , "data":['.$str.']}';
echo '{"reponse":"true" , "messsage":['."$str".']}';
?>