<?php
session_start();


if($_SESSION['user']!= ''){
			//echo '<script>alert(" set session value!!!")</script>';
}else{
   //echo '<script>alert("not set session value!!!")</script>';
	//header('Location: logout');
}



?>