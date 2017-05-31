<?php
include_once('config.php');
	$username = $_POST['name'];
	
				
				$qFetFe = "SELECT * FROM `feedback` WHERE `username` LIKE '$username%'";
				$rFetFe = mysqli_query($conn ,$qFetFe);
				
				$str = '';
				$ii = 1;
				
				//`intId`, `username`, `deviceId`, `mobile`, `email`, `star`, `comment`, `created_on`
				while($roFetFe = mysqli_fetch_assoc($rFetFe)){
						$str = $str . '<tr><td><input type = "checkbox" name = "" class = ""></td><td>'.$ii.'</td><td>'.$roFetFe['username'].'</td><td>'.$roFetFe['email'].'</td><td>'.$roFetFe['mobile'].'</td><td>'.$roFetFe['star'].'</td><td>'.$roFetFe['comment'].'</td><td>'.$roFetFe['created_on'].'</td><td><button class= "btn btn-danger btn-xs" id = "'.$roFetFe['intId'].'" onclick = delete_holiday(this.id)>DELETE</button></td></tr>';
						$ii++;
				}
				echo $str;
				?>
				

	

