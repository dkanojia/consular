<?php
	if(isset($_POST["btnsave"])){
		$drpcity = $_POST['drpcity'];
		$set_limit = $_POST['set_limit'];

		$qCity = "SELECT * FROM `cities` WHERE `intId` = '$drpcity'";
		$rCity = mysqli_query($conn ,$qCity);

		$i =0;
		$city_name = '';
		while($roCity= mysqli_fetch_assoc($rCity)){
			$city_name = $roCity['city_name'];
			$i++;
		}

		$type = 'default_'.$city_name;

		$qCity_alreadY_limit = "SELECT * FROM `appointment_meta_data` WHERE `limit_type` = '$type'";
		$rCity_alreadY_limit = mysqli_query($conn ,$qCity_alreadY_limit);
		$global_id ='';
		$i_alreadY_limit =0;
		while($roCity_alreadY_limit = mysqli_fetch_assoc($rCity_alreadY_limit)){
			$global_id = $roCity_alreadY_limit['id'];
			$i_alreadY_limit++;
		}

		if($global_id)
			$query = "UPDATE `appointment_meta_data` SET `limit_booking` = '$set_limit' WHERE `id` = '$global_id'";
		else
			$query = "INSERT INTO `appointment_meta_data`( `limit_booking`, `city_id`, `limit_type`) VALUES ('$set_limit' ,'$drpcity', '$type')";

		// if($i_alreadY_limit == 1){
			// echo $global_id;
			// exit;
		// }


		// "INSERT INTO `sectiono_db`.`appointment_meta_data` (`id`, `total_booking`, `limit_booking`, `date`, `city_id`) VALUES (NULL, \'\', \'200\', \'2017-05-03\', \'1\');";

		if(mysqli_query($conn , $query)){
			echo '<script>alert("Done successfully."); </script>';
		}else{
			echo '<script>alert("not successfully.");</script>';
		}
	}
?>
<script type="text/javascript" language="javascript">
function checkform()
{
	var message="";
	var status=0;
	if(document.getElementById("drpcity").value==0)
	{	
		status=1;
		message=message+"Please Select City\n";
	}
	
	if(status==1)
	{
		alert(message);
		return false;
	}
}
</script>
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <center><h3>
        SET APPOINTEMNT
      </h3></center>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Appointment</a></li>
        <li class="active">View Appointment</li>
      </ol>
    </section>

    <section class="content">

	    	<!-- <div class = "col-md-3 col-lg-3 col-xm-12 col-sm-12">
					<form action = "submit_set_limit_appointment" method = "POST">
					<?php
					
					
					
					?>
					
					<div class= "form-group">
						<input id = "city_booking_limit" class = "form-control" type = "text" value= "<?php ?>" name = "set_limit" placeholder = "Set Appointments Limit" >
						</div>
						</div>
					<div class= "col-md-3 col-lg-3 col-sm-12 col-xm-12">
						<input class= "btn btn-success" type = "submit" name  = "submit" value = "Set" >
						</div>
					</form>
			</div> -->
	    <?php
	  //   	if(isset($_POST["btnsave"]))
			// {
			// 	$saveproduct = new mysql();
			// 	$query = "insert into tblproduct set  catid='".$_POST["drpcategory"]."',productname='".$_POST["txtproname"]."',prourl_name='".$_POST["txturl_name"]."',sno='".$_POST["txtsno"]."',productcode='".$_POST["txtprocode"]."',productdesc='".$_POST["txtprodesc"]."',product_care='".$_POST["txtprocare"]."',product_discount='".$_POST["txtdiscount"]."',product_brand='".$_POST['txtbrand']."',product_colorid='".$product_color."',styleid='".$_POST['txtstyle']."',product_tag='".$product_tag."',related_categories='".$related_category."',blockstatus='".$_POST["rdstatus"]."',image1='".$img1."',image2='".$img2."',image3='".$img3."',image4='".$img4."',colorimage='".$colorimg."',offerurl='".$_POST["offerurl"]."',offerlink='".$_POST["offerlink"]."',shortdesc='".$_POST["txtshortdesc"]."',color_depend=".$procolor_depend.",size_depend=".$prosize_depend.",searchkeyword='".$_POST["txtkeyword"]."',colorname='".$_POST["txtcolorname"]."'";
			// 	$saveproduct->stmt = $query;
			// 	$saveproduct->execute();
			// 	$msg = "Product Added Successfully";
			// 	header("location:productprice.php?proid=".$maxid);
			// }
		?>

		<div class="row">
	        <div class="col-md-12 col-lg-12 col-xm-12 col-sm-12">
	          	<div class="box">
	          		<div class="box-header">
		              <center><h3 style = "color: #d3d3d3;  " class="box-title">Please Fill Details To Set Limit City Wise  </h3></center>
            		</div>
		          	<div class="row">
						<div class = "col-md-3 col-lg-3 col-xm-12 col-sm-12"></div>
						<div class = "col-md-6 col-lg-6 col-xm-12 col-sm-12">
							<form name="setlimit" action="" enctype="multipart/form-data" method="post">
							    <table width="98%" border="0" cellpadding="0" cellspacing="0">
								    <tr>
								    	<td>
								    		<div>
								    			<br>
								    		</div>
								    	</td>
								    </tr>
								    <tr>
						              	<td class= "form-group"> City Name </td>
						          		<td class= "form-group">
						          			<select class= "form-group" name="drpcity" id="drpcity" class="txtBox"  style="width:100%" >
							              		<option value="0">--Select City--</option>
							              		<?php

							              			$qCity = "SELECT `intId`, `city_name` FROM `cities` ORDER BY `intId` ASC";
													$rCity = mysqli_query($conn ,$qCity);
													$str = '';
													$i =0;
													
													while($roCity= mysqli_fetch_assoc($rCity)){
														$fl = '';
														$str = $str. '<option value = "'.$roCity['intId'].'" id = "'.$roCity['intId'].'" >'.$roCity['city_name'].'</option>';
														$i++;
													}
													
													echo $str;								
												?>
						                	</select>
						              	</td>
						            </tr>
						            <tr>
								    	<td>
								    		<div>
								    			<br>
								    		</div>
								    	</td>
								    </tr>
						            <tr >
						              <td class= "form-group"> Limit Count </td>
						              <td class= "form-group">
						                <input id = "city_booking_limit" class = "form-control" type = "text" value= "<?php ?>" name = "set_limit" placeholder = "Set Appointments Limit" />
						              </td>
						            </tr>
						            <tr>
								    	<td>
								    		<div>
								    			<br>
								    		</div>
								    	</td>
								    </tr>
						      		<tr>
						      			<td></td>
								        <td class= "form-group">
									        <input class= "btn btn-success" type='submit' name='btnsave' value='Set Limit'  onclick='return checkform();'/>
								        </td>
						      		</tr>
						      		<tr>
								    	<td>
								    		<div>
								    			<br>
								    		</div>
								    	</td>
								    </tr>
						      		<tr >
								        <td colspan="2">
								        	<?php
												if(isset($_POST["btnsave"]))
												{
											?>
										        <script language="javascript" type="text/javascript">
													alert('<?=$msg; ?>');
												</script>
									        <?php
												}
											?>
								        </td>
							      	</tr>
					    		</table>
			  				</form>
						</div>
						<div class = "col-md-3 col-lg-3 col-xm-12 col-sm-12"></div>
					</div>
	          	</div>
	        </div>
	    </div>
    </section>
 </div>