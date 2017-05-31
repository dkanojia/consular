<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <center><h3>
        VIEW FEEDBACK
      </h3></center>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Feedback</a></li>
        <li class="active"> View Feedback</li>
      </ol>
    </section>

    <section class="content">
     <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
			<center style = "color: #d3d3d3;">
              <h3 class="box-title">VIEW FEEDBACK  </h3>
			  </center>
				<div class= "row">
				<div class= "col-md-4 col-lg-4 col-xm-12 col-sm-12">
                  <input type="text" id= "table_search_name"  name="table_search_name" class="form-control" placeholder="search by username">
				</div>
                  <div class= "col-md-4 col-lg-4 col-xm-12 col-sm-12">
                  <input type="text" id= "table_search_mobile"  name="table_search_mobile" class="form-control" placeholder="search by mobile">
				</div>
				<div class= "col-md-4 col-lg-4 col-xm-12 col-sm-12">
                  <input type="text" name="table_search_email" id= "table_search_email" class="form-control" placeholder="search by email">
				</div>
				</div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <thead><tr>
                  <th><input type = "checkbox" onClick="toggle(this)" name  = "" class = ""></th>
                  <th>ID</th>
                  <th>USER</th>
                  <th>EMAIL</th>
                  <th>MOBILE</th>
                  <th>STAR</th>
                  <th>COMMENT</th>
                  <th>DATE</th>
                  <th>ACTION</th>
                </tr>
				</thead>
				<tbody id= "table-data">

				<?php
				
				$qFetF = "SELECT * FROM `feedback` WHERE 1";
				$rFetF = mysqli_query($conn ,$qFetF);
				$str = '';
				$ii = 1;
				//`intId`, `username`, `deviceId`, `mobile`, `email`, `star`, `comment`, `created_on`
				while($roFetF  = mysqli_fetch_assoc($rFetF)){
					$str = $str . '<tr><td><input name="foo" value="bar1" type = "checkbox" name="" class = ""></td><td>'.$ii.'</td><td>'.$roFetF['username'].'</td><td>'.$roFetF['email'].'</td><td>'.$roFetF['mobile'].'</td><td>'.$roFetF['star'].'</td><td>'.$roFetF['comment'].'</td><td>'.$roFetF['created_on'].'</td><td><button class = "btn btn-danger btn-xs"><a id = '.$roFetF['intId'].' onclick = "changeStatus(this.id)">DELETE</a></button></td></tr>';
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
                  <th>STAR</th>
                  <th>COMMENT</th>
                  <th>DATE</th>
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
 
 