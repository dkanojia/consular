<?php

include_once('config.php');

$name = $_POST['name'];
$mobile = $_POST['mobile'];
$password = $_POST['password'];
$email = $_POST['email'];
$city = $_POST['city'];

$query = "INSERT INTO `users`( `username`, `password`, `email`, `mobile`, `city`) VALUES ( '$name', '$password', '$email', '$mobile', '$city')
";
if(mysqli_query($conn , $query)){
		echo '<script>alert("created  successfully.");  window.setTimeout(function(){window.location.href = "http://'.getenv('HTTP_HOST').'/uae1/create_user"},1000);</script>';
}else{
		echo '<script>alert("not successfully created.");  window.setTimeout(function(){window.location.href = "http://'.getenv('HTTP_HOST').'/uae1/create_user"},1000);</script>';
}

?>