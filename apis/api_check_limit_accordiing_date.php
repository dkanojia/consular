<?php
include_once('../config.php');
//`username`, `mobile`, `imei`, `email`, `passport_no`, `booked_date`, `city`, `booked_city`

// if(isset($_POST['date'])){
    $date  = $_POST['date'];
    // $date  = '2017-05-22';
    // $date  = '2017-05-09';
// }

// if(isset($_POST['city'])){
    $city  = $_POST['city'];
    // $city  = 'Delhi';
// }

$global_date = $date;
$global_total_limit = '';
$global_total_limit_count = '';
$final_message = '';

$Datetime_acdate  = strtotime($date);

//will return string 'Sat' or 'Sun' or 'Mon' etc 
$DayofWeek = date('D', $Datetime_acdate );
if ($DayofWeek == 'Sat'){
    $final_message = 'Holiday : '.$DayofWeek;
}elseif($DayofWeek == 'Sun'){
    $final_message = 'Holiday : '.$DayofWeek;
}else{

    $qHolidayExist = "SELECT * FROM `holidays` WHERE `date` = '$date'";
    $rHolidayExist = mysqli_query($conn ,$qHolidayExist);

    if($rHolidayExist){
        $i =0;
        $holiday_name = '';
        while($roHoliday= mysqli_fetch_assoc($rHolidayExist)){
            $holiday_day_name = $roHoliday['holiday_name'];
            $global_date = $roHoliday['date'];
            if($holiday_day_name){
                $holiday_name = $holiday_day_name;
                $final_message = 'Holiday : '.$holiday_name;
            }else{
                $holiday_name = 'NoHolidayExist';
                $type = 'default_'.$city;
                $qTotalLimit = "SELECT * FROM `appointment_meta_data` WHERE `limit_type` = $type AND `date` = '$global_date' LIMIT 1";
                $rTotalLimit = mysqli_query($conn , $qTotalLimit);

                if($rTotalLimit){
                    $i =0;
                    while($roTotalLimit= mysqli_fetch_assoc($rTotalLimit)){
                        $global_total_limit_count = $roTotalLimit['limit_booking'];
                        $i++;
                    }
                }

                $qTotalAppointment = "SELECT * FROM `appointments` WHERE `booked_date` = '$global_date' AND `city` = '$city'";
                $rTotalAppointment = mysqli_query($conn ,$qTotalAppointment);

                $i =0;
                while($roTotalAppointment= mysqli_fetch_assoc($rTotalAppointment)){
                    $i++;
                }

                if($i < $global_total_limit_count){
                    // $global_limit_message = '';
                    // $final_message = $global_limit_message;
                }else{
                    $global_limit_message = 'Unavailable : Booking Full';
                    $final_message = $global_limit_message;
                }

            }
            $i++;
        }
    }

    $type = 'default_'.$city;
    // $qTotalLimit = "SELECT * FROM `appointment_meta_data` WHERE `date` = '$date' AND `limit_type` = $type";
    $qTotalLimit = "SELECT * FROM `appointment_meta_data` WHERE `limit_type` = '$type'";
    $rTotalLimit = mysqli_query($conn , $qTotalLimit);

    if($rTotalLimit){
        $i =0;
        while($roTotalLimit= mysqli_fetch_assoc($rTotalLimit)){
            // $limit_date = $roTotalLimit['date'];
            $global_total_limit_count = $roTotalLimit['limit_booking'];
            $i++;
        }
    }

    $qTotalAppointment = "SELECT * FROM `appointments` WHERE `booked_date` = '$global_date' AND `city` = '$city'";
    $rTotalAppointment = mysqli_query($conn ,$qTotalAppointment);

    $i =0;
    while($roTotalAppointment= mysqli_fetch_assoc($rTotalAppointment)){
        $i++;
    }

    if($i < $global_total_limit_count){
        // $global_limit_message = '';
        // $final_message = $global_limit_message;
    }else{
        $global_limit_message = 'Unavailable : Booking Full';
        $final_message = $global_limit_message;
    }
}

// $qTotalAppointment = "SELECT COUNT(*) FROM `appointments` WHERE `booked_date` = '$global_date' LIMIT 1";

$str = '';

if($final_message != '')
    $str = $str . '"message":"'.$final_message.'"';
else 
    $str = '';

$str  =  rtrim($str , ',');

if($str != ''){
    echo '{ "response":"true" , '.$str.'}';
}else{
    echo '{ "response":"false" , "message":"no data"}';

}
?>