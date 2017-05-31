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
                <thead><tr>
                  <th><input type = "checkbox" onClick="toggle(this)" name  = "" class = ""></th>
                  <th>ID</th>
                  <th>USER</th>
                  <th>MOBILE</th>
                  <th>DATE</th>
                  <th>PASSPORT</th>
                  <th>ACTION</th>
                </tr>
				</thead>
				<tbody>
                <tr>
                  <td><input name="foo" value="bar1" type = "checkbox" name  = "" class = ""></td>
                  <td>183</td>
                  <td>John Doe</td>
                  <td>John Doe</td>
                  <td>11-7-2014</td>
                  <td>11-7-2014</td>
                  <td><button class = "btn btn-danger btn-xs">CANCEL</button></td>
                 
                
                </tr>
                <tr>
                  <td><input name="foo" value="bar1" type = "checkbox" name  = "" class = ""></td>
                  <td>219</td>
                  <td>Alexander Pierce</td>
                  <td>Alexander Pierce</td>
                  <td>11-7-2014</td>
                  <td>11-7-2014</td>
                 <td><button class = "btn btn-danger btn-xs">CANCEL</button></td>
                 
                </tr>
                <tr>
                  <td><input name="foo" value="bar1" type = "checkbox" name  = "" class = ""></td>
                  <td>657</td>
                  <td>Bob Doe</td>
                  <td>Bob Doe</td>
                  <td>11-7-2014</td>
                  <td>11-7-2014</td>
                    <td><button class = "btn btn-danger btn-xs">CANCEL</button></td>
                </tr>
                <tr>
                  <td><input name="foo" value="bar1" type = "checkbox" name  = "" class = ""></td>
                  <td>175</td>
                  <td>Mike Doe</td>
                  <td>Mike Doe</td>
                  <td>11-7-2014</td>
                  <td>11-7-2014</td>
                   <td><button class = "btn btn-danger btn-xs">CANCEL</button></td>
                </tr>
              </tbody>
			    <thead><tr>
                  <th><input type = "checkbox" onClick="toggle(this)" name  = "" class = ""></th>
                  <th>ID</th>
                  <th>USER</th>
                  <th>MOBILE</th>
                  <th>DATE</th>
                  <th>PASSPORT</th>
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
  
  <script>
  
  function toggle(source) {
  checkboxes = document.getElementsByName('foo');
  for(var i=0, n=checkboxes.length;i<n;i++) {
    checkboxes[i].checked = source.checked;
  }
}
  </script>