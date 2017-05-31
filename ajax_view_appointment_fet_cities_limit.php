<?php
include_once('config.php');
	$id = $_POST['id'];
	// $ct = $_GET['city'];
	$date_to = date('Y-m-d');
				// $qFetApp = "SELECT * FROM `appointments` WHERE `booked_date` = '$date_to' AND `city` = '$id' ORDER BY `intId` DESC";
				$qFetApp = "SELECT * FROM `appointments` WHERE `city` = '$id' ORDER BY `booked_date` DESC";

				//`intId`, `username`, `mobile`, `imei`, `email`, `passport_no`, `booked_date`, `city`, `booked_city`, `created_on`
				
				$rFetApp  = mysqli_query($conn ,$qFetApp);

				$city = $id;

				// $type = 'default_'.$city;
				// $qMetaF  = "SELECT * FROM `appointment_meta_data` WHERE `limit_type` = '$type'";
				// $rMetaF = mysqli_query($conn ,$qMetaF);
				// $roMetaF = mysqli_fetch_assoc($rMetaF);

				// if($roMetaF['limit_booking'])
				// 	$limit_booking = $roMetaF['limit_booking'];
				// else
				// 	$limit_booking = 0;

				// // $global_date = $date_to;
				// $qTotalAppointment = "SELECT * FROM `appointments` WHERE `city` = '$city'";
    //             $rTotalAppointment = mysqli_query($conn ,$qTotalAppointment);

    //             $i =0;
    //             while($roTotalAppointment= mysqli_fetch_assoc($rTotalAppointment)){
    //                 $i++;
    //             }

	   //          $global_booked_limit_count = $i;
	   //          $global_available_limit = $limit_booking - $i;

				$str = '';

				// $str = $str . '<tr style="background-color: red;">
				// 			<th></th>
				// 			<th></th>
				// 			<th>For '.$city.'</th>
				// 			<th style="text-align: right;">Total Booking :</th>
				// 			<th style="text-align: left;">'.$limit_booking.'</th>
				// 			<th style="text-align: right;">Booked Appointment: </th>
				// 			<th style="text-align: left;">'.$global_booked_limit_count.'</th>
				// 			<th style="text-align: right;">Available Booking : </th>
				// 			<th style="text-align: left;">'.$global_available_limit.'</th>
				// 			<th></th>
				// 			<th></th>
				// 		</tr>
				// 		<tr>
				// 			<th colspan = "10">
				// 			</th>
				// 		</tr>';

				$ii = 1;
				while($roFetApp  = mysqli_fetch_assoc($rFetApp)){
					
					$status = $roFetApp['status'];
					if($status == 1){
						$status = '<button class = "btn btn-primary btn-xs">Active</button>';
					}else{
						$status = '<button class = "btn btn-danger btn-xs">Cancelled</button>';
					}
					$str = $str . '<tr> <td><input name="foo[]" id= "'.$roFetApp['intId'].'" value="'.$roFetApp['intId'].'" type = "checkbox" name  = "" class = "checkbox"></td><td>'.$ii.'</td><td>'.$roFetApp['username'].'</td><td>'.$roFetApp['mobile'].'</td><td>'.$roFetApp['passport_no'].'</td><td>'.$status.'</td><td>'.$roFetApp['booked_date'].'</td><td>'.$roFetApp['city'].'</td><td>'.$roFetApp['created_on'].'</td><td><button class = "btn btn-danger btn-xs"><a id = '.$roFetApp['intId'].' onclick = "changeStatus(this.id)">CANCEL</a></button></td><td><a class="modalLink" href="#myModal" data-toggle="modal" data-target="#myModal" data-id= "'.$roFetApp['intId'].'" onclick = "no('.$roFetApp['intId'].')"><button class="btn btn-primary btn-sm">VIEW</button>
			            </a></td></tr>';
					$ii++;
				}
				//echo '<script>alert("'.$str.'")</script>';
				echo $str ;
			?>
	
				
				

	

