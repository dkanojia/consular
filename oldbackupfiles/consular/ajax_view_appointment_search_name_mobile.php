<?php
include_once('config.php');
	$name_mobile = $_POST['name_mobile'];
	$name_mobile = $name_mobile.'%';
	//`intId`, `status`, `username`, `mobile`, `imei`, `email`, `passport_no`, `booked_date`, `city`, `booked_city`, `created_on` 
	
	
				
				//SELECT `intId`, `holiday_name`, `greeting_message`, `date`, `city`, `created_on` FROM `holidays` WHERE 1
				$qFetApp = "SELECT * FROM `appointments` WHERE `username` LIKE '$name_mobile' OR `mobile` LIKE '$name_mobile'";
				$rFetApp = mysqli_query($conn ,$qFetApp);
				$str = '';
				$ii = 1;
				while($roFetApp = mysqli_fetch_assoc($rFetApp)){
						$str = $str . '<tr><td><input type = "checkbox" name = "" class = ""></td><td>'.$ii.'</td><td>'.$roFetApp['username'].'</td><td>'.$roFetApp['mobile'].'</td><td>'.$roFetApp['email'].'</td><td>'.$roFetApp['passport_no'].'</td><td>'.$roFetApp['booked_date'].'</td><td>'.$roFetApp['city'].'</td><td>'.$roFetApp['created_on'].'</td><td><button class= "btn btn-danger btn-xs" id = "'.$roFetApp['intId'].'" onclick = delete_holiday(this.id)>DELETE</button></td></tr>';
						$ii++;
				}
				echo $str;
				
				?>
				

	

