<style> 
#calendar {
 width: 80%;
 display: block;
 margin-left: auto;
 margin-right: auto;
 }

 .centered {
 text-align: center;
}

.fc-sat { color:red; background-color: rgba(255 , 0, 0, .2); }
.fc-sun { color:red;  background-color: rgba(255 , 0, 0, .2);}
</style> 


 <link rel="stylesheet" href="plugins/fullcalendar/fullcalendar.min.css">
  <link rel="stylesheet" href="plugins/fullcalendar/fullcalendar.print.css" media="print">
  
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script src="plugins/fullcalendar/fullcalendar.min.js"></script>


<script>
$(document).ready(function() {


    // page is now ready, initialize the calendar...

	
   $('#calendar').fullCalendar({
	header: {
 left: 'prevYear,nextYear',
 center: 'title',
 right: 'today,month,agendaDay,agendaWeek prev,next'
},
      buttonText: {
        today: 'today',
        month: 'month',
        week: 'week',
        day: 'day'
      },
	  
	  dayClick: function (date) {
                        var moment = date.toDate();
                        MyDateString = moment.getFullYear() + '-'
                                + ('0' + (moment.getMonth() +1) ).slice(-2)
                                + "-" +('0' + moment.getDate()).slice(-2);
                        $('[data-date='+MyDateString+']').css({"color": "red", "backgroundColor": "yellow", "borderBottom": "5px solid #ccc"});
						document.getElementById('date_holiday').value = MyDateString;
						var aa = document.getElementById('city_list').value;
						document.getElementById('s_city').value = aa;
						$("#getCodeModal").modal("show");
                    },
					
	
	eventSources: [

    // your event source
    {
        events: [ // put the array in the `events` property
            
			  
			<?php
				
								
				$fdate = date('Y-m-').'%%';
			$qFetHoliday = "SELECT * FROM `holidays` WHERE `date`";
				$rFetHoliday = mysqli_query($conn ,$qFetHoliday);

				
				$global_holiday;
				$str = '';
				$limit_count = '';
				// $limit_count = '(Avail Limit : 0)';
				while($roFetHoliday = mysqli_fetch_assoc($rFetHoliday)){
					
						$fdate_for_limit = $roFetHoliday['date'];
						$qFetHoliday_for_limit = "SELECT * FROM `appointment_meta_data` WHERE `date` = '$fdate_for_limit'";
						$rFetHoliday_for_limit = mysqli_query($conn ,$qFetHoliday_for_limit);
						while($roFetHoliday_for_limit = mysqli_fetch_assoc($rFetHoliday_for_limit)){
							if($roFetHoliday_for_limit['limit_booking'])
								$limit_count = '(Total Limit: '.$roFetHoliday_for_limit['limit_booking'].')';
						}
						$global_holiday = $roFetHoliday['holiday_name'].$limit_count;

					$str = $str . '{ title : "'.$global_holiday.'" , start : "'.$roFetHoliday['date'].'" , color : "red" , textColor : "yellow" , backgroundColor : "red"},';
				}
				//echo '<script>alert("'.$str.'")</script>';
				echo $str;
			?>
			
			
        ],
        backgroundColor: 'black',     // an option!
        textColor: 'yellow' // an option!
    }

    // any other event sources...

]
	
});


});

</script>