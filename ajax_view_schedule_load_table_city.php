<?php
include_once('config.php');
		$city = $_POST['city'];
		
		$qFetHoli = "SELECT * FROM `holidays` WHERE `city` = '$city'";
				$rFetHoli = mysqli_query($conn ,$qFetHoli);
				$str = '';
				$ii = 1;
				while($roFetHoli = mysqli_fetch_assoc($rFetHoli)){
						$str = $str . '<tr><td><input name="foo" value="bar1" type = "checkbox" name  = "" class = ""></td><td>'.$ii.'</td><td>'.$roFetHoli['holiday_name'].'</td><td>'.$roFetHoli['greeting_message'].'</td><td>'.$roFetHoli['date'].'</td><td>'.$roFetHoli['city'].'</td><td>'.$roFetHoli['created_on'].'</td><td><button class= "btn btn-danger btn-xs" id = "'.$roFetHoli['intId'].'" onclick = delete_holiday(this.id)>DELETE</button></td></tr>';
						$ii++;
				}
				echo $str;
				?>