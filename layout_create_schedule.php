<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <center><h3>
        <span class="logo-lg"><b> SCHEDULE</b></span>
      </h3></center>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Schedule</a></li>
        <li class="active">Create Schedule</li>
      </ol>
    </section>
	<?php
		//`total_booking`, `limit_booking`
		$qMetaF  = "SELECT * FROM `appointment_meta_data`";
		$rMetaF = mysqli_query($conn ,$qMetaF);
		$roMetaF = mysqli_fetch_assoc($rMetaF);
		
		
		
	?>
	
    <!-- Main content -->
    <section class="content">

      <!-- SELECT2 EXAMPLE -->
      <div class="box box-default">
        <div class="box-header with-border">
          <h4 class="box-title ">SELECT CITY </h4>
				<div style="color: red;" class = "col-md-3 col-lg-3 col-sm-12 col-xm-12">BOOKING LIMIT : -<?php echo $roMetaF['limit_booking'];?></div>
				<div class = "col-md-3 col-lg-3 col-sm-12 col-xm-12">TOTAL BOOKING : -<?php echo $roMetaF['limit_booking'];?></div>
				<div class = "col-md-3 col-lg-3 col-sm-12 col-xm-12">AVAIL BOOKING : - <?php echo $roMetaF['limit_booking'];?></div>
        <div class="box-tools">
			
				<select style = "width: 100%;"  class = "form-control" name  = "city_list" id= "city_list">
				<?php
						$qCity = "SELECT `intId`, `city_name` FROM `cities` ORDER BY `intId` ASC";
						$rCity = mysqli_query($conn ,$qCity);
						$str = '';
						$i =0;
						while($roCity= mysqli_fetch_assoc($rCity)){
							if($roCity['city_name'] == $_SESSION['city']) {$fl = 'selected';}else{$fl = '';}
							$str = $str. '<option '.$fl.' onclick = "load_city_booking(this.id)" value = "'.$roCity['intId'].'" id = "'.$roCity['intId'].'" '.$fl.' value = "'.$roCity['city_name'].'">'.$roCity['city_name'].'</option>';
							$i++;
						}
						
						echo $str;
					?>
			</select>
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
		
		<div id='calendar'></div>

       </div>
        <!-- /.box-body -->
        <div class="box-footer">
         
        </div>
      </div>
      <!-- /.box -->

	   <!-- Modal -->
  <div class="modal fade" id="getCodeModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-md">
     <div class="modal-content">
     <div class="modal-header">
         <h4 class="modal-title">Enter Detail </h4>
		 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
     </div>
     <div class="modal-body">
         <form action="submit_create_shedule" method = "POST" name  = "submit_create_shedule" id = "submit_create_shedule" >
    <div class="form-group">
      <label for="email">Holiday Name*:</label>
      <input type="text" maxlenth = "100" class="form-control" id="holiday_name" placeholder=" Holiday name" name="holiday">
    </div>
   <div class="form-group">
      <label for="email">Greeting Message :</label>
      <textarea  maxlenth = "200" class="form-control" id="greeting_msg" placeholder=" Greeting Message" name="greeting"></textarea>
    </div>
	
	<div class="form-group">
      <label for="email">Date :</label>
      <input type="text" maxlenth = "100" class="form-control" id="date_holiday" placeholder=" Date " name="date">
    </div>
	<div class="form-group">
      <label for="email">Limit :</label>
      <input type="text" maxlenth = "100" class="form-control" id="s_city" placeholder=" Date " name="s_city">
      <!-- <label for="email">Limit :</label> -->
      <!-- <input type="text" maxlenth = "100" class="form-control" id="s_limit" placeholder=" Limit " name="s_limit"> -->

	  
    </div>
   
    <button type="submit" name  = "submit" class="btn btn-success">Save</button>
  </form>
     </div>
     <div class="modal-footer">
        
         
     </div>
   </div>
  </div>
</div>   <!-- /.model -->

	 
    </section>
    <!-- /.content -->
  </div>