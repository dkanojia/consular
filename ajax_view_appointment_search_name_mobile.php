<?php
include_once('config.php');
	$name_mobile = $_POST['name_mobile'];
	// $url = $_POST['url_name_val'];
	$name_mobile = $name_mobile.'%';
	//`intId`, `status`, `username`, `mobile`, `imei`, `email`, `passport_no`, `booked_date`, `city`, `booked_city`, `created_on` 
	
	
				//SELECT `intId`, `holiday_name`, `greeting_message`, `date`, `city`, `created_on` FROM `holidays` WHERE 1
				$qFetApp = "SELECT * FROM `appointments` WHERE `username` LIKE '$name_mobile' OR `mobile` LIKE '$name_mobile'";
				// $qFetApp = "SELECT * FROM `appointments`";
				$rFetApp = mysqli_query($conn ,$qFetApp);
				$str = '';
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

						// $str = $str . '<tr><td><input type = "checkbox" name = "" class = ""></td><td>'.$ii.'</td><td>'.$roFetApp['username'].'</td><td>'.$roFetApp['mobile'].'</td><td>'.$url.'</td><td>'.$name_mobile.'</td><td>'.$roFetApp['booked_date'].'</td><td>'.$roFetApp['city'].'</td><td>'.$roFetApp['created_on'].'</td><td><button class= "btn btn-danger btn-xs" id = "'.$roFetApp['intId'].'" onclick = delete_holiday(this.id)>DELETE</button></td></tr>';
						$ii++;
				}
				echo $str;
				
				?>
				

	

