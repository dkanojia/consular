<?php
	include_once('config.php');
	// $csv_date = $_GET['date'];
	// $re_date = array();
	// $re_date = explode('/' ,$csv_date);
	// // echo "<pre>";
	// // print_r($re_date);
	// // echo "</pre>";
	// // exit;
	
	// $mm = $re_date[0];
	// $dd = $re_date[1];
	// $yy = $re_date[2];
	
	// $n_date = $yy . '-'.$mm. '-'.$dd;

	// if(!$n_date)
		$qFetApp = "SELECT * FROM `appointments`";
	// else
		// $qFetApp = "SELECT * FROM `appointments` WHERE `booked_date` = '$n_date'";

	$rFetApp = mysqli_query($conn ,$qFetApp);
    $i =0;

    $appointment_arr = [];	
	// foreach ($emp_mdl as $mdl) {
	// }
    while($roFetApp= mysqli_fetch_assoc($rFetApp)){
		$appointment_arr [] = ['username'=>$roFetApp['username'],'status'=>$roFetApp['status'],'mobile'=>$roFetApp['mobile'],'imei'=>$roFetApp['imei'],'passport_no'=>$roFetApp['passport_no'],'gamca_medical'=>$roFetApp['gamca_medical'],'entry_permit'=>$roFetApp['entry_permit'],'booked_date'=>$roFetApp['booked_date'],'city'=>$roFetApp['city']];
        $i++;
    }
	
	// $qMetaF  = "SELECT * FROM `appointment_meta_data` WHERE `date` = '$n_date' AND `limit_type` = '$type'";
	// $rMetaF = mysqli_query($conn ,$qMetaF);
	// $roMetaF = mysqli_fetch_assoc($rMetaF);

	// $emp_mdl = $this->add('xepan\hr\Model_Employee_Active');
	// if($department_id && (!$post_id) )
	// 	$emp_mdl->addCondition('department_id',$department_id);
	
	// if($post_id)
	// 	$emp_mdl->addCondition('post_id',$post_id);
	// $emp_arr = [];	
	// foreach ($emp_mdl as $mdl) {
		// $emp_arr [] = ['id'=>$mdl['id'],'name'=>$mdl['name'],'department'=>$mdl['department'],'post'=>$mdl['post'],'present_type'=>$mdl['salary_payment_type']];
	// }
	$header = ['username','status','mobile','imei','passport_no','gamca_medical','entry_permit','booked_date','city'];
    $fp = fopen("php://output", "w");
    fputcsv ($fp, $header, "\t");
    foreach($appointment_arr as $row){
        fputcsv($fp, $row, "\t");
    }
    fclose($fp);
	header("Content-type: text/csv");
    header("Content-disposition: attachment; filename=\"sample_appointment_import.csv\"");
    exit;

?>