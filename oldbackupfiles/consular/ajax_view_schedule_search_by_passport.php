<?php
include_once('config.php');
	$passport = $_POST['passport'];
	
	//`intId`, `status`, `username`, `mobile`, `imei`, `email`, `passport_no`, `booked_date`, `city`, `booked_city`, `created_on` 
	
	
				
				//SELECT `intId`, `holiday_name`, `greeting_message`, `date`, `city`, `created_on` FROM `holidays` WHERE 1
				$qFetApp = "SELECT * FROM `appointments` WHERE `passport_no` LIKE  '$passport*'";
				$rFetApp = mysqli_query($conn ,$qFetApp);
				$str = '';
				$ii = 1;
				while($roFetApp = mysqli_fetch_assoc($rFetApp)){
						$str = $str . '<tr><td>'.$ii.'</td><td>'.$roFetApp['holiday_name'].'</td><td>'.$roFetApp['greeting_message'].'</td><td>'.$roFetApp['date'].'</td><td>'.$roFetApp['city'].'</td><td>'.$roFetApp['created_on'].'</td><td>'.$roFetApp['city'].'</td><td><button class= "btn btn-danger btn-xs" id = "'.$roFetApp['intId'].'" onclick = delete_holiday(this.id)>DELETE</button></td></tr>';
						$ii++;
				}
				echo $str;
				?>
				

	

