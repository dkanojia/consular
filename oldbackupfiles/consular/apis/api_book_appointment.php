<?php
include_once('../config.php');
//`username`, `mobile`, `imei`, `email`, `passport_no`, `booked_date`, `city`, `booked_city`

$username  = $_POST['username'];
$mobile  = $_POST['mobile'];
$imei  = $_POST['imei'];
$passport_no  = $_POST['passport_no'];
$booked_date  = $_POST['booked_date'];
$city  = $_POST['city'];

$gamca_medicalt  = $_FILES["gamca_medical"]["tmp_name"];
$entry_permitt  = $_FILES["entry_permit"]["tmp_name"];
$entry_permits  = $_FILES["entry_permit"]["size"];
$gamca_medicals  = $_FILES["gamca_medical"]["size"];
$gamca_medical  = $_FILES["gamca_medical"]["name"];
$entry_permit  = $_FILES["entry_permit"]["name"];


$query = "INSERT INTO `appointments`(  `username`, `mobile`,`imei`,  `passport_no`,`gamca_medical`, `entry_permit`, `booked_date`, `city`) VALUES ('$username', '$mobile','$imei', '$passport_no','$gamca_medical', '$entry_permit', '$booked_date', '$city')";

function img_upload($img_temp_name , $img_name ,$img_size ,$username, $passport_no ){

$target_dir = '../uploaded_data/'.$passport_no.'/'.$username.'/';



if (!file_exists($target_dir)) {
    mkdir($target_dir, 0777, true);
}


$target_file = $target_dir . basename($img_name);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image

if ($img_size > 1500000) {
    $res['message'] = "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
       $res['message'] = 
 "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
     $res['message'] =  "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($img_temp_name, $target_file)) {
		
    } else {
    }
}




}


if(mysqli_query($conn ,$query)){
	$res['response'] = "true";
	img_upload($gamca_medicalt , $gamca_medical ,$gamca_medicals ,$username , $passport_no);
	img_upload($entry_permitt , $entry_permit ,$entry_permits ,$username , $passport_no);
	$res['message'] = 'data submitted sucessfully';

}else{
	$res['response'] = "false";
	$res['message'] = 'data not submitted ';

	
}

$response = json_encode($res);
echo $response;
?>