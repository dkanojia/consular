<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <center><h3>
        <span class="logo-lg"><b> USERS</b></span>
      </h3></center>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Users</a></li>
        <li class="active">Create Users </li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- SELECT2 EXAMPLE -->
      <div class="box box-default">
        <div class="box-header with-border">
         <center style = "color: #d3d3d3;"> <h3 class="box-title">CREATE USERS</h3></center>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="row">
		  
		  <form action = "submit_create_user" method = "POST" name  = "submit_create_user">
			<div class = "col-md-offset-2 col-md-8 col-lg-offset-2 col-lg-8 col-xm-8 col-sm-8 ">
           <div class="box-body">
		   <form action = "submit_user_create" method = "POST" name = "submit_user_create">
		       <label>Username:</label>
              <div class="input-group">
                <span class="input-group-addon">@</span>
                <input required name = "username" type="text" class="form-control" placeholder="Username">
              </div>
			
			  
			   <br><label>Password:</label>
              <div class="input-group">
                <span class="input-group-addon">          <i class="fa fa-mobile"></i>
				</span>
                <input required name = "password" type="text" class="form-control" placeholder="Password">
              </div>

			  <br><label>Mobile:</label>
              <div class="input-group">
                <span class="input-group-addon">          <i class="fa fa-mobile"></i>
				</span>
                <input required name = "mobile" type="text" class="form-control" placeholder="Mobile">
              </div>
              

             

               <br> <label>Email:</label>

              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                <input required type="email" name = "email" class="form-control" placeholder="Email">
              </div>
			  
			  <br> <label>City:</label>

              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                <select name  = "city" class = "form-control" >
				<option value = "">Select City</option>
					<?php
						$qCity = "SELECT `intId`, `city_name` FROM `cities` ORDER BY `intId` ASC";
						$rCity = mysqli_query($conn ,$qCity);
						$str = '';
						$i =0;
						while($roCity= mysqli_fetch_assoc($rCity)){
							if($i==0){$fl = 'selected';}else{$fl = '';}
							$str = $str. '<option '.$fl.' value = "'.$roCity['city_name'].'">'.$roCity['city_name'].'</option>';
							$i++;
						}
						
						echo $str;
					?>
                <select>
              </div>

             
			  
			  
			<br> 
		
              <div class="form-group">
              
                <input type="submit" name = "submit" class="btn btn-success btn-lg pull-right" >
              </div>
			 </form>
              <!-- /input-group -->
            </div>
          </div>
          </div>
          <!-- /.row -->
        </div>
        </div>
        
      </div>
      <!-- /.box -->

	  
	   
	
    </section>
    <!-- /.content -->
  </div>