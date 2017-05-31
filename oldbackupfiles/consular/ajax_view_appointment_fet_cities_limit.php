<?php
include_once('config.php');
	$id = $_POST['id'];
	
	$date_to = date('Y-m-d');
				$qFetApp = "SELECT * FROM `appointments` WHERE `booked_date` = '$date_to' AND `city` = '$id' ORDER BY `intId` DESC";
				//`intId`, `username`, `mobile`, `imei`, `email`, `passport_no`, `booked_date`, `city`, `booked_city`, `created_on`
				
				$rFetApp  = mysqli_query($conn ,$qFetApp);
				$str = '';
				$ii = 1;
				while($roFetApp  = mysqli_fetch_assoc($rFetApp)){
					$status = $roFetApp['status'];
					if($status == 1){$status = '<span style= "background-color: green; border-raduis: 10%; color: #fff;">active</span>';}else{$status = '<span style= "background-color: red;">cancelled</span>';}
					$str = $str . '<tr> <td><input name="foo[]" id= "'.$roFetApp['intId'].'" value="'.$roFetApp['intId'].'" type = "checkbox" name  = "" class = "checkbox"></td><td>'.$ii.'</td><td>'.$roFetApp['username'].'</td><td>'.$roFetApp['mobile'].'</td><td>'.$roFetApp['email'].'</td><td>'.$roFetApp['passport_no'].'</td><td>'.$status.'</td><td>'.$roFetApp['booked_date'].'</td><td>'.$roFetApp['city'].'</td><td>'.$roFetApp['created_on'].'</td><td><button class = "btn btn-danger btn-xs"><a id = '.$roFetApp['intId'].' onclick = "changeStatus(this.id)">CANCEL</a></button></td></tr>';
					$ii++;
				}
				//echo '<script>alert("'.$str.'")</script>';
				echo $str ;
			?>
	
				
				

	

