  
			<?php
			$fdate = date('Y-m-');
			$qFetHoliday = "SELECT `holiday_name`, `greeting_message`, `date`, `city`, `created_on` FROM `holidays` WHERE `date` LIKE '$fdate'";
				echo '<script>alert("'.$qFetHoliday.'")</script>';

			echo date('m-Y');
/* 				$qFetHoliday = "SELECT `holiday_name`, `greeting_message`, `date`, `city`, `created_on` FROM `holidays`";
				$rFetHoliday = mysqli_query($conn ,$qFetHoliday);
				$str = '';
				while($roFetHoliday = mysqli_fetch_assoc($rFetHoliday)){
					$str = $str . '{ title : "'.$roFetHoliday['holiday_name'].'" , start : "'.$roFetHoliday['date'].'" , color : "red" , textColor : "yellow" , backgroundColor : "red"},';
				}
				echo '<script>alert("'.$str.'")</script>';
				echo $str; */
			?>
			