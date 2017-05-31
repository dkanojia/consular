<?php
include_once('config.php');
	if(isset($_POST['book_date'])){
		$book_date = $_POST['book_date'];
		$post_city = $_POST['city'];
		$re_date = array();
		$re_date = explode('/' ,$book_date);
		// echo "<pre>";
		// print_r($re_date);
		// echo "</pre>";
		// exit;
		
		$mm = $re_date[0];
		$dd = $re_date[1];
		$yy = $re_date[2];
		
		$n_date = $yy . '-'.$mm. '-'.$dd;
		// $book_date = $book_date.'%';
		//`intId`, `status`, `username`, `mobile`, `imei`, `email`, `passport_no`, `booked_date`, `city`, `booked_city`, `created_on` 
					
					//SELECT `intId`, `holiday_name`, `greeting_message`, `date`, `city`, `created_on` FROM `holidays` WHERE 1
		$qFetApp = "SELECT * FROM `appointments` WHERE `booked_date` = '$n_date'";
		$rFetApp = mysqli_query($conn ,$qFetApp);
		
		$str = '';

		// $city = $id;

		$type = 'default_'.$post_city;
		$qMetaF  = "SELECT * FROM `appointment_meta_data` WHERE `date` = '$n_date' AND `limit_type` = '$type'";
		$rMetaF = mysqli_query($conn ,$qMetaF);
		$roMetaF = mysqli_fetch_assoc($rMetaF);

		$limit_booking = 0;
		if($roMetaF['limit_booking'] == 0){
			// $date_to = date('Y-m-d');
			$qMetaF_D  = "SELECT * FROM `appointment_meta_data` WHERE `limit_type` = '$type'";
			$rMetaF_D = mysqli_query($conn ,$qMetaF_D);
			$roMetaF_D = mysqli_fetch_assoc($rMetaF_D);
			$limit_booking = $roMetaF_D['limit_booking'];
		}
		else{
			$limit_booking = $roMetaF['limit_booking'];
		}

		// $global_date = $date_to;
		$qTotalAppointment = "SELECT * FROM `appointments` WHERE `booked_date` = '$n_date'";
        $rTotalAppointment = mysqli_query($conn ,$qTotalAppointment);

        $i =0;
        while($roTotalAppointment= mysqli_fetch_assoc($rTotalAppointment)){
            $i++;
        }

        $global_booked_limit_count = $i;
        $global_available_limit = $limit_booking - $i;

		$str = '';

		$str = $str . '<tr style="background-color: red;">
					<th></th>
					<th></th>
					<th>For '.$n_date.'</th>
					<th style="text-align: right;">Total Booking :</th>
					<th style="text-align: left;">'.$limit_booking.'</th>
					<th style="text-align: right;">Booked Appointment: </th>
					<th style="text-align: left;">'.$global_booked_limit_count.'</th>
					<th style="text-align: right;">Available Booking : </th>
					<th style="text-align: left;">'.$global_available_limit.'</th>
					<th></th>
					<th></th>
				</tr>
				<tr>
					<th colspan = "10">
					</th>
				</tr>';





		$ii = 1;
		while($roFetApp = mysqli_fetch_assoc($rFetApp)){

				$status = $roFetApp['status'];
					if($status == 1){
						$status = '<button class = "btn btn-primary btn-xs">Active</button>';
					}else{
						$status = '<button class = "btn btn-danger btn-xs">Cancelled</button>';
					}
					$str = $str . '<tr> <td><input name="foo[]" id= "'.$roFetApp['intId'].'" value="'.$roFetApp['intId'].'" type = "checkbox" name  = "" class = "checkbox"></td><td>'.$ii.'</td><td>'.$roFetApp['username'].'</td><td>'.$roFetApp['mobile'].'</td><td>'.$roFetApp['passport_no'].'</td><td>'.$status.'</td><td>'.$roFetApp['booked_date'].'</td><td>'.$roFetApp['city'].'</td><td>'.$roFetApp['created_on'].'</td><td><button class = "btn btn-danger btn-xs"><a id = '.$roFetApp['intId'].' onclick = "changeStatus(this.id)">CANCEL</a></button></td><td><a class="modalLink" href="#myModal" data-toggle="modal" data-target="#myModal" data-id= "'.$roFetApp['intId'].'" onclick = "no('.$roFetApp['intId'].')"><button class="btn btn-primary btn-sm">VIEW</button>
			            </a></td></tr>';


				// $str = $str . '<tr><td><input type = "checkbox" name = "" class = ""></td><td>'.$ii.'</td><td>'.$roFetApp['username'].'</td><td>'.$roFetApp['mobile'].'</td><td>'.$roFetApp['email'].'</td><td>'.$roFetApp['passport_no'].'</td><td>'.$roFetApp['booked_date'].'</td><td>'.$roFetApp['city'].'</td><td>'.$roFetApp['created_on'].'</td><td><button class= "btn btn-danger btn-xs" id = "'.$roFetApp['intId'].'" onclick = delete_holiday(this.id)>DELETE</button></td></tr>';
				$ii++;
		}
		echo $str;
	}
?>
				

	

