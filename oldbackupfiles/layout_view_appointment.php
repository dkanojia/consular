<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <center><h3>
        VIEW APPOINTEMNT
      </h3></center>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Appointment</a></li>
        <li class="active">View Appointment</li>
      </ol>
    </section>

    <section class="content">
     <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <center><h3 style = "color: #d3d3d3;  " class="box-title">BOOKED APPOINTMENTS  </h3></center>

                
            </div>
			
			<div class="row" style = "margin-bottom: 10px; margin-left: 10px;">
				<div  class = "col-md-3 col-lg-3 col-xm-12 col-sm-12">
			
				<button onclick = "delete_mul()"  name  "delete_mul" class= "btn btn-danger">DELETE SELECTED</button>
				</div>
				<div class = "col-md-3 col-lg-3 col-xm-12 col-sm-12">
					<select  onchange = "ajax_fet_cities_limit(this.value)" class= "form-control" name  = "cities">
					<option value = "">Select City</option>
					<?php
						$qCity = "SELECT `intId`, `city_name` FROM `cities` ORDER BY `intId` ASC";
						$rCity = mysqli_query($conn ,$qCity);
						$str = '';
						$i =0;
						
						while($roCity= mysqli_fetch_assoc($rCity)){
							if($roCity['city_name'] == $_GET['city']) {$fl = 'selected';}else{$fl = '';}
							$str = $str. '<option '.$fl.'  value = "'.$roCity['city_name'].'" id = "'.$roCity['intId'].'" '.$fl.' >'.$roCity['city_name'].'</option>';
							$i++;
						}
						
						echo $str;
					?>
					</select>
				</div>
				<div class = "col-md-3 col-lg-3 col-xm-12 col-sm-12">
					<form action = "submit_set_limit_appointment" method = "POST">
					<?php
					
					
					
					?>
					
					<div class= "form-group">
						<input id = "city_booking_limit" class = "form-control" type = "text" value= "<?php ?>" name = "set_limit" placeholder = "Set Appointments Limit" >
						</div>
						</div>
					<div class= "col-md-3 col-lg-3 col-sm-12 col-xm-12">
						<input class= "btn btn-success" type = "submit" name  = "submit" value = "set" >
						</div>
					</form>
				</div>
			<div class="row">
				<div class = "col-md-3 col-lg-3 col-xm-12 col-sm-12">
                  <input type="text" id = "name" name="table_search" class="form-control" placeholder="Search name / Mobile">
				  </div>
				  <div class = "col-md-3 col-lg-3 col-xm-12 col-sm-12">
				 <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input  placeholder= "Search By Booked Date"   type="text" class="form-control" onclick = "helloDamit(this.value);"   id="datepicker">
                </div>
				  </div>
				  <div class = "col-md-3 col-lg-3 col-xm-12 col-sm-12">
				  <input type="text" id = "passport"  name="table_search" class="form-control" placeholder="Search passport">
				</div>
				<div class = "col-md-3 col-lg-3 col-xm-12 col-sm-12">
					<select class= "form-control" name  = "" onchange = "toggleTable(this.value);" > 
						<option value = "" > Select Active
						</option>
						<option value = "1" > Active status
						</option>
						<option value = "0" >Cancelled status
						</option>
					</select>
				</div>
                   
                </div>
            <!-- /.box-header -->
		
            <div class="box-body table-responsive no-padding">
              <table style = "margin-top: 20px;" class="table table-hover">
                <thead style= "margin-top: 10px;background-color: rgba(0, 0,0,.4); color: #fff;">
				<tr>
                  <th><input type = "checkbox" onClick="toggle(this)" name  = "" class = ""></th>
                  <th>#</th>
                  <th>USER</th>
                  <th>MOBILE</th>
                  <!-- <th>EMAIL</th> -->
                  <th>PASSPORT</th>
                  <th>STATUS</th>
                  <th>APPOINTMENT DATE</th>
                  <th>CITY</th>
                  <th>REQUEST DATE</th>
                  <th>ACTION </th>
                </tr>
				   </thead>
				   <tbody id = "table-data">
				   <form method ="POST" name  = "" action>
			<?php
			$date_to = date('Y-m-d');
				$qFetApp = "SELECT * FROM `appointments` WHERE `booked_date` = '$date_to' ORDER BY `intId` ASC";
				//`intId`, `username`, `mobile`, `imei`, `email`, `passport_no`, `booked_date`, `city`, `booked_city`, `created_on`
				
				$qFetHoliday = "SELECT * FROM `holidays` WHERE `date` WHERE `status` = 1";
				$rFetApp  = mysqli_query($conn ,$qFetApp);
				$str = '';
				$ii = 1;
				while($roFetApp  = mysqli_fetch_assoc($rFetApp)){
					$status = $roFetApp['status'];
					if($status == 1){$status = '<span style= "background-color: green; border-raduis: 10%; color: #fff; text-transform: uppercase;">Active</span>';}else{$status = '<span style= "background-color: red;">Cancelled</span>';}
					$str = $str . '<tr> <td><input name="foo[]" id= "'.$roFetApp['intId'].'" value="'.$roFetApp['intId'].'" type = "checkbox" name  = "" class = "checkbox"></td><td>'.$ii.'</td><td>'.$roFetApp['username'].'</td><td>'.$roFetApp['mobile'].'</td><td>'.$roFetApp['passport_no'].'</td><td>'.$status.'</td><td>'.$roFetApp['booked_date'].'</td><td>'.$roFetApp['city'].'</td><td>'.$roFetApp['created_on'].'</td><td><button class = "btn btn-danger btn-xs"><a id = '.$roFetApp['intId'].' onclick = "changeStatus(this.id)">CANCEL</a></button></td></tr>';
					$ii++;
				}
				//echo '<script>alert("'.$str.'")</script>';
				echo $str;
			?>
				
				
				
              </form>
              </tbody>
			  
			  <tfoot style= "margin-top: 10px;background-color: rgba(0, 0,0,.4); color: #fff;">
				<tr>
                  <th><input type = "checkbox" onClick="toggle(this)" name  = "" class = ""></th>
                  <th>#</th>
                  <th>USER</th>
                  <th>MOBILE</th>
                  <th>EMAIL</th>
                  <th>PASSPORT</th>
                  <th>STATUS</th>
                  <th>APPOINTMENT DATE</th>
                  <th>CITY</th>
                  <th>REQUEST DATE</th>
                  <th>ACTION</th>
                </tr>
				   </tfoot>
			  </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>
    </section>
  </div>
  
  <style>
	a {
		color: #fff;
	}
  </style>
  <script>
  
  function delete_mul() {
	 $('input:checkbox.checkbox').each(function () {
       var sThisVal = (this.checked ? $(this).val() : "");
		$.ajax({url: "ajax_delete_selected_appointment", data: 'id='+sThisVal, type: 'POST', success: function(result){
						

				}});

	   }); 
    location.reload();

  }
  
  
  
  
  
  function toggle(source) {
  checkboxes = document.getElementsByName('foo[]');
  for(var i=0, n=checkboxes.length;i<n;i++) {
    checkboxes[i].checked = source.checked;
  }
}


function load_city_booking(aa){
	//alert(aa)
$.ajax({url: "ajax_view_appointment_load_city_booking", data: 'id='+aa, type: 'POST', success: function(result){
				$("#table-data").html(result);
			}});

}
function ajax_fet_cities_limit(aa){
//alert(aa)
	$.ajax({url: "ajax_view_appointment_fet_cities_limit", data: 'id='+aa, type: 'POST', success: function(result){
				//alert(result)
				$("#table-data").html(result);
				

			}});
}


function changeStatus(aa){
	$.ajax({url: "ajax_view_appointment_change_status", data: 'id='+aa, type: 'POST', success: function(result){
				//$("#load_city").html(result);
				//alert(result);

			}});	
}


function toggleTable(aa){
	//alert(aa)
	
	$.ajax({url: "ajax_view_appointment_toggle_table", data: 'id='+aa, type: 'POST', success: function(result){
				//alert(result);

				$("#table-data").html(result);

			}});
}
  </script>