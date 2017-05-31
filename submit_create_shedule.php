<?php

include_once('config.php');

$holiday = $_POST['holiday'];
$greeting = $_POST['greeting'];
$date = $_POST['date'];
$s_city = $_POST['s_city'];

$holiday = str_replace("'" , '' , $holiday);
$greeting = str_replace("'" , '' , $greeting);


$tdate = date('d-m-Y');
$date1=date_create($date);
$date2=date_create($tdate);
$diff=date_diff($date1,$date2);
//echo '<script>alert("'.$t2.'")</script>';
$diff->format("%days");
// echo '<script>alert("'.$diff.'")</script>';
$diff = ltrim($diff , '+');
$diff = ltrim($diff , '-');



///// get limit of appointmennts
//`total_booking`, `limit_booking`
$quer1 = "SELECT * FROM `appointment_meta_data`";
$resu = mysqli_query($conn ,$quer1);
$ro = mysqli_fetch_assoc($resu);
$limit_appointment = $ro['limit_booking'];


//`intId`, `status`, `username`, `mobile`, `imei`, `email`, `passport_no`, `gamca_medical`, `entry_permit`, `booked_date`, `city`, `booked_city`, `created_on`
$date_today = date('Y-m-d');
$quer2  = "SELECT * FROM `appointments` WHERE `booked_date` = '$date_today'";
$resu2 = mysqli_query($conn ,$quer2);
$ro2 = mysqli_fetch_assoc($resu2);


$full =0;
if($diff < 15 || $full != 1){
		
		if($holiday){
			$type = $holiday;
		}else{
			$type = 'day';
		}

			$query1 = "INSERT INTO `holidays`( `holiday_name`, `greeting_message`, `date`) VALUES ('$holiday' ,'$greeting', '$date')";
		$result1 = mysqli_query($conn ,$query1);

		$query2 = "INSERT INTO `appointment_meta_data`( `limit_booking`, `date`, `limit_type`) VALUES ('$s_city', '$date', '$type')";
		$result2 = mysqli_query($conn ,$query2);
		if($result1 && $result2){
			echo '<script>alert("Schedule created successfully");  window.setTimeout(function(){window.location.href = "http://'.getenv('HTTP_HOST').'/uae1/create_schedule"},3000);</script>';
		}else{
			echo '<script>alert("This date is already registered as Holiday , try different date ");      window.setTimeout(function(){window.location.href = "http://'.getenv('HTTP_HOST').'/uae1/create_schedule"},3000);
		</script>';
		}
	
}else{
			echo '<script>alert("you can Mark Holiday of range 15 days.");  window.setTimeout(function(){window.location.href = "http://'.getenv('HTTP_HOST').'/uae1/create_schedule"},3000);</script>';

	
}



?>