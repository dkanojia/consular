<?php
session_start();
include_once('config.php');

if(isset($_POST['submit'])){
$email = $_POST['email'];
$password = $_POST['password'];

//`intId`, `username`, `password`, `email`, `mobile`, `city`, `created_on`
$quer = "SELECT * FROM `users` WHERE `email` = '$email'";
$resu = mysqli_query($conn ,$quer);
$ro = mysqli_fetch_assoc($resu);
$fpassword = $ro['password'];
$city = $ro['city'];
if($password != $fpassword){
	echo '<script>alert("Invalid login, try again!!")</script>';
}else{

	$_SESSION['user'] = $email;
	// $_SESSION['city'] = $city;
	if($_SESSION['user'] != '')
  // header('Location: http://uaeconsularsection.org/section/uae/consular/view_appointment?city='.$city);
	header('Location: view_appointment?city='.$city);
		//echo '<script>alert("'.$city.'")</script>';
		//echo $_SESSION['city'];
		//echo $_SESSION['user'];
	
	//echo $_SESSION['user'];
	
}
}


?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title> WELCOME TO UAE CONSULAR SECTION |  INDIA</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/iCheck/square/blue.css">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="index"><b>WELCOME TO UAE CONSULAR SECTION </b>INDIA</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    

    <form action = ""  method="post">
      <div class="form-group has-feedback">
        <input required type="email" name  = "email" class="form-control" placeholder="Email">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input required type="password" name  = "password" class="form-control" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
	  
	 <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
            <label>
              <input type="checkbox"> Remember Me
            </label>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" name = "submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

  
    <!-- /.social-auth-links -->


  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 2.2.3 -->
<script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
</script>
</body>
</html>
