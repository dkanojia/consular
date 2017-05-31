<?php
include_once('config.php');
		$id = $_POST['id'];
		//`intId`, `status`, `username`, `mobile`, `imei`, `email`, `passport_no`, `gamca_medical`, `entry_permit`, `booked_date`, `city`, `booked_city`, `created_on`
		
		//`intId`, `city_name`, `appointment_limit`
		
		$qCity = "SELECT * FROM `cities` WHERE `intId` = '$id'";
		
		$resu1 = mysqli_query($conn ,$qCity);
		$ro1 = mysqli_fetch_assoc($resu1);
		$city_name = $ro1['city_name'];
		
		
		$qUpSta = "SELECT * FROM `appointments` WHERE `city` = '$city_name'";
				
		$result = mysqli_query($conn ,$qUpSta);
		while($roFetApp  = mysqli_fetch_assoc($result)){
					$status = $roFetApp['status'];
					if($status == 1){$status = '<span style= "background-color: green; border-raduis: 10%; color: #fff;">active</span>';}else{$status = '<span style= "background-color: red;">cancelled</span>';}
					$str = $str . '<tr> <td><input name="foo[]" id= "'.$roFetApp['intId'].'" value="'.$roFetApp['intId'].'" type = "checkbox" name  = "" class = "checkbox"></td><td>'.$ii.'</td><td>'.$roFetApp['username'].'</td><td>'.$roFetApp['mobile'].'</td><td>'.$roFetApp['email'].'</td><td>'.$roFetApp['passport_no'].'</td><td>'.$status.'</td><td>'.$roFetApp['booked_date'].'</td><td>'.$roFetApp['city'].'</td><td>'.$roFetApp['created_on'].'</td><td><button class = "btn btn-danger btn-xs"><a id = '.$roFetApp['intId'].' onclick = "changeStatus(this.id)">CANCEL</a></button></td></tr>';
					$ii++;
				}
				//echo '<script>alert("'.$str.'")</script>';
				echo $str;
			

?>