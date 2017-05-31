<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <center><h3>
        <span class="logo-lg"><b> BROADCAST</b></span>
      </h3></center>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Broadcast</a></li>
        <li class="active"> Create Broadcast</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- SELECT2 EXAMPLE -->
      <div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title">Create Appointment</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="row">
			<div class = "col-md-offset-2 col-md-8 col-lg-offset-2 col-lg-8 col-xm-8 col-sm-8 ">
           <div class="box-body">

            <form name="setlimit" action="cron_push_all_notification" enctype="multipart/form-data" method="post">
		          <label>Title:</label>
              <div class="input-group">
                <span class="input-group-addon">@</span>
                <input type="text" name="subject" class="form-control" placeholder="Subject">
              </div>
              <label>Date</label>
              <div class="input-group">
                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <!-- <input  placeholder= "Search By Booked Date"   type="date" class="form-control" onclick = "helloDamit(this.value);"   id="datepicker"> -->
                  <input  placeholder= "Set Date"   type="date" class="form-control" id="datepicker">
                </div>
              </div>
              <!-- <div class="input-group bootstrap-timepicker timepicker"><input id="timepicker" class="form-control" data-provide="timepicker" data-template="modal" data-minute-step="1" data-modal-backdrop="true" type="text"/></div> -->
              <label>Time</label>
              <div class="input-group">
                <div class="input-group time">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <!-- <input  placeholder= "Search By Booked Date"   type="date" class="form-control" onclick = "helloDamit(this.value);"   id="datepicker"> -->
                  <input  placeholder= "Set Time"   type="time" class="form-control" id="timepicker">
                </div>
              </div>
      			  <div class="input-group">
                      <!-- <span class="glyphicon glyphicon-ok input-group-addon"></span> -->
                     <!--  <select required name  = "city_select" class= "form-control">
      					<option value = "">SELECT CITY
      					</option>
      					
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
                      </select> -->
                    </div>
      			 
      			   <label>Message:</label>
                    <div class="from-group">
                     
                     <textarea style = "width: 100%;"  col = "200" rows = "10" name  = "message" placeholder = "Message">
                     </textarea>
                    </div>
                    
                   <button type = "submit" name  = "" class = "btn btn-success btn-lg pull-right">SUBMIT</button>
      			 
                    <!-- /input-group -->
                  </div>
            </form>


              
         
          </div>
          <!-- /.row -->
        </div>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
               
              
        </div>
      </div>
      <!-- /.box -->

	
    </section>
    <!-- /.content -->
  </div>