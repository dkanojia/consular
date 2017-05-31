<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <center><h3>
        VIEW SCHEDULE
      </h3></center>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Forms</a></li>
        <li class="active">Advanced Elements</li>
      </ol>
    </section>

    <section class="content">
     <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
			<center style = "color: #d3d3d3;">
              <h3 class="box-title">BOOKED APPOINTMENTS  </h3>
			  </center>
				<div class= "row">
				<div class= "col-md-4 col-lg-4 col-xm-12 col-sm-12">
                  <input type="text" name="table_search" class="form-control" placeholder="Search by Mobile">
				</div>
                  <div class= "col-md-4 col-lg-4 col-xm-12 col-sm-12">
                  <input type="text" name="table_search" class="form-control" placeholder="Search by Passport">
				</div>
				<div class= "col-md-4 col-lg-4 col-xm-12 col-sm-12">
                  <input type="text" name="table_search" class="form-control" placeholder="Search by Name">
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
                  <th>USER</th>
                  <th>EMAIL</th>
                  <th>MOBILE</th>
                  <th>CITY</th>
                  <th>CREATED_ON</th>
                  <th>ACTION</th>
                </tr>
				</thead>
				<tbody>
             
						<?php
				$qFetUser = "SELECT * FROM `users` WHERE 1";
				//`intId`, `username`, `password`, `email`, `mobile`, `city`, `created_on`
				
				$rFetUser  = mysqli_query($conn ,$qFetUser);
				$str = '';
				$ii = 1;
				while($roFetUser  = mysqli_fetch_assoc($rFetUser)){
					$str = $str . '<tr> <td><input name="foo" value="bar1" type = "checkbox" name  = "" class = ""></td><td>'.$ii.'</td><td>'.$roFetUser['username'].'</td><td>'.$roFetUser['email'].'</td><td>'.$roFetUser['mobile'].'</td><td>'.$roFetUser['city'].'</td><td>'.$roFetUser['created_on'].'</td><td><button class = "btn btn-success btn-xs"><a id = '.$roFetUser['intId'].' onclick = "changeStatus(this.id)">VIEW</a></button><button class = "btn btn-danger btn-xs"><a id = '.$roFetUser['intId'].' onclick = "changeStatus(this.id)">DELETE</a></button></td></tr>';
					$ii++;
				}
				//echo '<script>alert("'.$str.'")</script>';
				echo $str;
			?>
				
				
      			 </tbody>
			    <thead><tr>
                   <th><input type = "checkbox" onClick="toggle(this)" name  = "" class = ""></th>
                  <th>ID</th>
                  <th>USER</th>
                  <th>EMAIL</th>
                  <th>MOBILE</th>
                  <th>CITY</th>
                  <th>CREATED_ON</th>
                  <th>ACTION</th>
                </tr>
				</thead>
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
	a{
		color: #fff;
	}
  </style>
  <script>
  
  function toggle(source) {
  checkboxes = document.getElementsByName('foo');
  for(var i=0, n=checkboxes.length;i<n;i++) {
    checkboxes[i].checked = source.checked;
  }
}
  </script>