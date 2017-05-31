<!-- <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">


        </div>
    </div>
</div>
 -->

			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><span >&times;</span><span class="sr-only">Close</span></button>
				<h4 class="modal-title" id="myModalLabel">Full Description</h4>
			</div>
			<div class="modal-body">

				<table style = "margin-top: 20px;" class="table table-hover">
					<thead style= "margin-top: 10px;background-color: rgba(0, 0,0,.4); color: #fff;">
						<tr>
				          <th>Name</th>
				          <th>Status</th>
				          <th>Gamca Medical Image</th>
				          <th>Entry Permit Image</th>
				        </tr>
					</thead>
					<tbody id = "table-data">
						
						<?php
				        	include_once('config.php');
								// $famID=$_GET['famID'];
							$famID = $_POST['famID'];
							

							$qFetApp = "SELECT * FROM `appointments` WHERE `intID` = '$famID'";
							 // WHERE `intId` = '$famID'";

							$rFetApp  = mysqli_query($conn ,$qFetApp);
							$str = '';
							$ii = 1;
							while($roFetApp  = mysqli_fetch_assoc($rFetApp)){
								
								$status = $roFetApp['status'];
								if($status == 1){
									$status = '<button class = "btn btn-primary btn-xs">Active</button>';
								}else{
									$status = '<button class = "btn btn-danger btn-xs">Cancelled</button>';
								}


									// /section/uae/consular/uploaded_data/hahaha/demo/1495702572320.jpg
								$str = $str . '<tr>
									<td>'.$roFetApp['username'].'</td>
									<td>'.$status.'</td>
									<td><img src="'.'/consular/uploaded_data/'.$roFetApp['passport_no']."/".$roFetApp['username']."/".$roFetApp['gamca_medical'].'" alt="Gamca Medical Image" width="100%" height="100%"></td>
									<td><img src="'.'/consular/uploaded_data/'.$roFetApp['passport_no']."/".$roFetApp['username']."/".$roFetApp['entry_permit'].'" alt="Entry Permit Image" width="100%" height="100%"></td>
									</tr>';
								$ii++;
							}
							//echo '<script>alert("'.$str.'")</script>';
							echo $str ;
						?>
					</tbody>
				</table>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			<!-- <button type="button" class="btn btn-primary">Save changes</button> -->
			</div>

