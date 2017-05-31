<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <center><h3>
        VIEW SCHEDULE
      </h3></center>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Schedule</a></li>
        <li class="active">View Schedule</li>
      </ol>
    </section>

    <section class="content">
     <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
			<center style = "color: #d3d3d3;">
              <h3 class="box-title">SCHEDULED HOLIDAYS   </h3>
			  </center>
				<div class= "row">
				<div class= "col-md-4 col-lg-4 col-xm-12 col-sm-12">
                  <input type="text" id= "s_mobile" name="table_search" class="form-control" placeholder="Search by HolidayName">
				</div>
                  <div class= "col-md-4 col-lg-4 col-xm-12 col-sm-12">
                   <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input  placeholder= "Search By Date"   type="text" class="form-control" onclick = "clickGetDate(this.value)" id="datepicker">
                </div>
				</div>
				<div class= "col-md-4 col-lg-4 col-xm-12 col-sm-12">
                  <form method = "POST">
				  <select onchange = "loadTableCity(this.value)"  class= "form-control" name = "s_city" id = "s_city">
					<?php
						$qCity = "SELECT `intId`, `city_name` FROM `cities` ORDER BY `intId` ASC";
						$rCity = mysqli_query($conn ,$qCity);
						$str = '';
						while($roCity= mysqli_fetch_assoc($rCity)){
							
							$str = $str. '<option selected value = "'.$roCity['city_name'].'">'.$roCity['city_name'].'</option>';
						}
						
						echo $str;
					?>
                  </select>
				  </form>
				</div>
				</div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <thead>
				<tr>
                  <th><input type = "checkbox" onClick="toggle(this)" name  = "" class = ""></th>
                  <th>ID</th>
                  <th>HOLIDAY</th>
                  <th>GREETING MESSAGE</th>
                  <th>DATE</th>
                  <th>CITY</th>
                  <th>CREATED DATE</th>
                  <th>ACTION </th>
                </tr>
				</thead>
				<tbody id = "table-data">
				
				<script>
				
					
				
				</script>
				<?php
			
				//$city_select =  $_POST['s_city'];
				//SELECT `intId`, `holiday_name`, `greeting_message`, `date`, `city`, `created_on` FROM `holidays` WHERE 1
				$qFetHoli = "SELECT * FROM `holidays`"; //WHERE `city` = '$city_select'";
				$rFetHoli = mysqli_query($conn ,$qFetHoli);
				$str = '';
				$ii = 1;
				while($roFetHoli = mysqli_fetch_assoc($rFetHoli)){
						$str = $str . '<tr><td><input name="foo" value="bar1" type = "checkbox" name  = "" class = ""></td><td>'.$ii.'</td><td>'.$roFetHoli['holiday_name'].'</td><td>'.$roFetHoli['greeting_message'].'</td><td>'.$roFetHoli['date'].'</td><td>'.$roFetHoli['city'].'</td><td>'.$roFetHoli['created_on'].'</td><td><button class= "btn btn-danger btn-xs" id = "'.$roFetHoli['intId'].'" onclick = delete_holiday(this.id)>DELETE</button></td></tr>';
						$ii++;
				}
				echo $str;
				?>
				
               
                
              </tbody>
			    <tfoot>
                  <tr>
                  <th><input type = "checkbox" onClick="toggle(this)" name  = "" class = ""></th>
                  <th>ID</th>
                  <th>HOLIDAY</th>
                  <th>GREETING MESSAGE</th>
                  <th>DATE</th>
                  <th>CITY</th>
                  <th>CREATED DATE</th>
                  <th>ACTION </th>
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
  
  <script>
  
  function loadTableCity(aa) {
	  $.ajax({url: "ajax_view_schedule_load_table_city", data: 'city='+aa, type: 'POST', success: function(result){
				$("#table-data").html(result);
				

			}});
  }
  function toggle(source) {
  checkboxes = document.getElementsByName('foo');
  for(var i=0, n=checkboxes.length;i<n;i++) {
    checkboxes[i].checked = source.checked;
  }
}



function delete_holiday(aa){
	
	$.ajax({url: "ajax_view_schedule_delete_holiday", data: 'id='+aa, type: 'POST', success: function(result){
				//$("#table-data").html(result);
				if(result){
					alert("Data Deleted successful!");
				}

			}});
}


function clickGetDate(aa){
	//var aa  = document.getElementById('datepicker').value;
	$.ajax({url: "ajax_view_appointment_toggle_table", data: 'id='+aa, type: 'POST', success: function(result){
				alert(result);

				$("#table-data").html(result);

			}});
}



$("#s_name").keyup(function(){
    $("input").css("background-color", "pink");
	
	$.ajax({url: "ajax_view_appointment_toggle_table", data: 'id='+aa, type: 'POST', success: function(result){
				alert(result);

				$("#table-data").html(result);

			}});
});

  </script>