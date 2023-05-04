<?php
session_start();
if (isset($_SESSION['name'])) {
require_once '../core/conn.php';

$sql = mysqli_query($con, "SELECT * FROM user WHERE id = {$_SESSION['id']}");
            if 
            (mysqli_num_rows($sql) > 0){
              $row = mysqli_fetch_assoc($sql);
            }
            $msg="";
            $das="8";
?>
<?php include '../includes/header.php'; ?>
		<!-- End Sidebar -->
		<link rel="stylesheet" type="text/css" href="https://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/css/jquery.dataTables.css">
<div class="main-panel ">
				
<link rel="stylesheet" type="text/css" href="https://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/css/jquery.dataTables.css">

<div  style="padding-top:90px">

<center>
    <h1> <b>Pricing</b> </h1>
</center>
  
<div class="container">


   <div class="row justify-content-center align-items-center mb-1">



						<div class="col-md-10 pl-md-0">
							<div class="card card-pricing  bubble-shadow">
									
								<div class="card-body table-responsive">
									 <table class="table table-all ">
										<thead>
											<tr>
												<th scope="col">services</th>
												<th scope="col">Smart Earner</th>
												<th scope="col">Affilliate</th>
												<th scope="col">Topuser</th>
												<th scope="col">API user</th>
											</tr>
										</thead>

										<tbody>
									        <?php
              $query = "SELECT * FROM airtimeprice";
              $result = mysqli_query($con, $query);
              if (mysqli_num_rows($result) == 0) {
              }
              ?>
              <?php
              while ($use = mysqli_fetch_array($result)) {
                $id = $use['id'];
                $smart_mtn=$use['smartpricemtn'];
             	$smart_glo=$use['smartpriceglo'];
	            $smart_mobile=$use['smartpriceet'];
             	$smart_airtel=$use['smartpriceair'];
              
                  $affliate_mtn=$use['afpricemtn'];
                  $affilate_glo = $use['afpriceglo'];
                  $affliate_mobile = $use['afpriceet'];
                  $affilate_airtel = $use['afpriceair'];
                  
                  $top_mtn=$use['toppricemtn'];
                  $top_glo=$use['toppriceglo'];
                  $top_mobile=$use['toppriceet'];
                  $top_airtel=$use['toppriceair'];


              ?>
											<tr>
												<td>MTN AIRTIME </td>
												<td>% <?= $smart_mtn; ?></td>
												<td>% <?= $affliate_mtn; ?></td>
												<td>% <?= $top_mtn; ?></td>
												<td>% <?= $top_mtn; ?> </td>
											</tr>

											
											<tr>
												<td>GLO AIRTIME </td>
												<td>% <?= $smart_glo; ?></td>
												<td>% <?= $affilate_glo; ?></td>
												<td>% <?= $top_glo; ?></td>
												<td>% <?= $top_glo; ?></td>
											</tr>

											
											<tr>
												<td>9MOBILE AIRTIME </td>
												<td>% <?= $smart_mobile; ?></td>
												<td>% <?= $affliate_mobile; ?></td>
												<td>% <?= $top_mobile; ?></td>
												<td>% <?= $top_mobile; ?></td>
											</tr>

											
											<tr>
												<td>AIRTEL AIRTIME </td>
												<td>% <?=$smart_airtel?></td>
												<td>% <?= $affilate_airtel?></td>
												<td>% <?= $top_airtel ?></td>
												<td>% <?= $top_airtel ?></td>
											</tr>

											

											
											<tr>
												<td>WAEC Result Checker </td>
												<td>₦ 1800.0</td>
												<td>₦ 1750.0</td>
												<td>₦ 1750.0</td>
												<td>₦ 1750.0 </td>
											</tr>

											
											<tr>
												<td>NECO Result Checker </td>
												<td>₦ 1800.0</td>
												<td>₦ 1750.0</td>
												<td>₦ 1750.0</td>
												<td>₦ 1750.0 </td>
											</tr>

											
											
                      
											
											<tr>
												<td>MTN Recharge Card pin</td>
												<td>(₦100.0) @ ₦98.0</td>
												<td>(₦100.0) @ ₦100.0</td>
												<td>(₦100.0) @ ₦</td>
												<td>(₦100.0) @ ₦100.0 </td>
											</tr>

											
											<tr>
												<td>MTN Recharge Card pin</td>
												<td>(₦200.0) @ ₦198.0</td>
												<td>(₦200.0) @ ₦100.0</td>
												<td>(₦200.0) @ ₦</td>
												<td>(₦200.0) @ ₦100.0 </td>
											</tr>

											
											<tr>
												<td>MTN Recharge Card pin</td>
												<td>(₦500.0) @ ₦498.0</td>
												<td>(₦500.0) @ ₦100.0</td>
												<td>(₦500.0) @ ₦</td>
												<td>(₦500.0) @ ₦100.0 </td>
											</tr>

											
											<tr>
												<td>GLO Recharge Card pin</td>
												<td>(₦100.0) @ ₦98.0</td>
												<td>(₦100.0) @ ₦100.0</td>
												<td>(₦100.0) @ ₦</td>
												<td>(₦100.0) @ ₦100.0 </td>
											</tr>

											
											<tr>
												<td>GLO Recharge Card pin</td>
												<td>(₦200.0) @ ₦198.0</td>
												<td>(₦200.0) @ ₦100.0</td>
												<td>(₦200.0) @ ₦</td>
												<td>(₦200.0) @ ₦100.0 </td>
											</tr>

											
											<tr>
												<td>GLO Recharge Card pin</td>
												<td>(₦500.0) @ ₦498.0</td>
												<td>(₦500.0) @ ₦100.0</td>
												<td>(₦500.0) @ ₦</td>
												<td>(₦500.0) @ ₦100.0 </td>
											</tr>

											
											<tr>
												<td>9MOBILE Recharge Card pin</td>
												<td>(₦100.0) @ ₦98.0</td>
												<td>(₦100.0) @ ₦100.0</td>
												<td>(₦100.0) @ ₦</td>
												<td>(₦100.0) @ ₦100.0 </td>
											</tr>

											
											<tr>
												<td>9MOBILE Recharge Card pin</td>
												<td>(₦200.0) @ ₦198.0</td>
												<td>(₦200.0) @ ₦100.0</td>
												<td>(₦200.0) @ ₦</td>
												<td>(₦200.0) @ ₦100.0 </td>
											</tr>

											
											<tr>
												<td>9MOBILE Recharge Card pin</td>
												<td>(₦500.0) @ ₦498.0</td>
												<td>(₦500.0) @ ₦100.0</td>
												<td>(₦500.0) @ ₦</td>
												<td>(₦500.0) @ ₦100.0 </td>
											</tr>

											
											<tr>
												<td>AIRTEL Recharge Card pin</td>
												<td>(₦100.0) @ ₦98.0</td>
												<td>(₦100.0) @ ₦100.0</td>
												<td>(₦100.0) @ ₦</td>
												<td>(₦100.0) @ ₦100.0 </td>
											</tr>

											
											<tr>
												<td>AIRTEL Recharge Card pin</td>
												<td>(₦200.0) @ ₦198.0</td>
												<td>(₦200.0) @ ₦100.0</td>
												<td>(₦200.0) @ ₦</td>
												<td>(₦200.0) @ ₦100.0 </td>
											</tr>

											
											<tr>
												<td>AIRTEL Recharge Card pin</td>
												<td>(₦500.0) @ ₦498.0</td>
												<td>(₦500.0) @ ₦100.0</td>
												<td>(₦500.0) @ ₦</td>
												<td>(₦500.0) @ ₦100.0 </td>
											</tr>

								
							 				
											
										</tbody>
									</table>
												
                                    <?php
              }
              ?>
								</div>
							</div>
							</div>
							</div>




   <div class="row justify-content-center align-items-center mb-1">



						<div class="col-md-10 pl-md-0">
							<div class="card card-pricing bg-warning-gradient bubble-shadow">
								<div class="card-header">
									
									<div class="card-price">
										<span class="price">MTN</span>
										<span class="text"> DATA</span>
									</div>
								</div>
								
								<div class="card-body table-responsive">
									 <table class="table table-all ">
                                     <tr>
                                      <th> Plan Size </th>
                                     
                                     <th> Smart user </th>
                                     
                                     <th> Resseller </th>
                                     
                                     <th> Top user  </th>
									   <th>API user</th>
                                     </tr>
                                     
                                 <?php 
                $query= "SELECT * FROM plans WHERE network='MTN' ORDER BY price ASC"; 
                $result=mysqli_query($con,$query);
                while($mtn=mysqli_fetch_assoc($result)){
                
                ?>
                                <tr>
                                <td style=" font-size:18px; font-weight: bolder;"> <?= strtoupper($mtn['name']);  ?> </td>
                                <td style=" font-size:18px;  font-weight: bolder;"><i> &#8358;<?= number_format($mtn['price']);  ?></i></td>
                                <td style=" font-size:18px;  font-weight: bolder;"><i> &#8358;<?= number_format($mtn['reseller']);  ?></i></td>
                               <td style=" font-size:18px;  font-weight: bolder;"><i> &#8358;<?= number_format($mtn['top']);  ?></i></td>
							      <td style=" font-size:18px;  font-weight: bolder;"><i> &#8358;<?= number_format($mtn['api']);  ?></i></td>
                                </tr>
                                 <?php } ?>
                            </table>
								</div>
								
							</div>
						</div>
						
						
						
						
						
						<div class="col-md-10 pl-md-0">
							<div class="card card-pricing bg-success-gradient bubble-shadow">
								<div class="card-header">
									
									<div class="card-price">
										<span class="price">GLO</span>
										<span class="text"> DATA</span>
									</div>
								</div>
								<div class="card-body table-responsive">
									 <table class="table table-all ">
                                     <tr>
                                     <th> Plan Size </th>
                                     
                                     <th> Smart user </th>
                                     
                                     <th> Resseller </th>
                                     
                                     <th> Top user  </th>
									   <th>API user</th>
                                     </tr>
                                 <?php
                $query= "SELECT * FROM plans  WHERE network='GLO' ORDER BY price ASC"; 
                $result=mysqli_query($con,$query);
                while($glo=mysqli_fetch_assoc($result)){
                    
                
                
                ?>
                                <tr>
                                <td style=" font-size:18px; font-weight: bolder;"><?= strtoupper($glo['name']);  ?> </td>
                                <td style=" font-size:18px;  font-weight: bolder;"><i> &#8358;<?= number_format($glo['price'],2);  ?></i></td>
                                <td style=" font-size:18px;  font-weight: bolder;"><i> &#8358;<?= number_format($glo['reseller'],2);  ?></i></td>
                               <td style=" font-size:18px;  font-weight: bolder;"><i> &#8358;<?= number_format($glo['top'],2);  ?></i></td>
                                <td style=" font-size:18px;  font-weight: bolder;"><i> &#8358;<?= number_format($glo['api'],2);  ?></i></td>
                                </tr>
                                <?php } ?>
                                
                            </table>
								</div>
								
							</div>
						</div>	<div class="col-md-10 pl-md-0">
							<div class="card card-pricing bg-danger-gradient bubble-shadow">
								<div class="card-header">
									
									<div class="card-price">
										<span class="price">AIRTEL</span>
										<span class="text"> DATA</span>
									</div>
								</div>
								<div class="card-body table-responsive">
									 <table class="table table-all ">
                                     <tr>
                                     <th> Plan Size </th>
                                     
                                     <th> Smart user </th>
                                     
                                     <th> Resseller </th>
                                     
                                     <th> Top user  </th>
									   <th>API user</th>
                                     </tr>
                                <?php 
                            $types="10";
                $query= "SELECT * FROM plans  WHERE network='GLO' ORDER BY price ASC"; 
                $result=mysqli_query($con,$query);
                while($airtel=mysqli_fetch_assoc($result)){
                    
                
                
                ?>  
                                <tr>
                                <td style=" font-size:18px; font-weight: bolder;"><?= strtoupper($airtel['name']);  ?></td>
                                <td style=" font-size:18px;  font-weight: bolder;"><i> &#8358;<?= number_format($airtel['price'],2);  ?></i></td>
                                <td style=" font-size:18px;  font-weight: bolder;"><i> &#8358;<?= number_format($airtel['reseller'],2);  ?></i></td>
                               <td style=" font-size:18px;  font-weight: bolder;"><i> &#8358;<?= number_format($airtel['top'],2);  ?></i></td>
                                <td style=" font-size:18px;  font-weight: bolder;"><i> &#8358;<?= number_format($airtel['api'],2);  ?></i></td>
                    
                                </tr>
                                <?php }?>
                                
                            </table>
								</div>
								
							</div>
						</div>

                        	<div class="col-md-10 pl-md-0">
							<div class="card card-pricing bg-black-gradient bubble-shadow">
								<div class="card-header">
									
									<div class="card-price">
										<span class="price text-white">9MOBILE</span>
										<span class="text"> DATA</span>
									</div>
								</div>
								<div class="card-body table-responsive">
									 <table class="table table-all text-white ">
                                     <tr >
                                     <th> Plan Size </th>
                                     
                                     <th> Smart user </th>
                                     
                                     <th> Resseller </th>
                                     
                                     <th> Top user  </th>
									   <th>API user</th>
                                     </tr>
                                <?php 
                $query= "SELECT * FROM plans  WHERE network='9MOBILE' ORDER BY price ASC"; 
                $result=mysqli_query($con,$query);
                while($mobile=mysqli_fetch_assoc($result)){
                    
                
                
                ?>  
                                <tr >
                                <td style=" font-size:18px; font-weight: bolder;"><?=strtoupper($mobile['name']);  ?></td>
                                <td style=" font-size:18px;  font-weight: bolder;"><i> &#8358;<?= number_format($mobile['price'],2);  ?></i></td>
                                <td style=" font-size:18px;  font-weight: bolder;"><i> &#8358;<?= number_format($mobile['reseller'],2);  ?></i></td>
                               <td style=" font-size:18px;  font-weight: bolder;"><i> &#8358;<?= number_format($mobile['top'],2);  ?></i></td>
                               <td style=" font-size:18px;  font-weight: bolder;"><i> &#8358;<?= number_format($mobile['api'],2);  ?></i></td>
                              
                                </tr>
                                <?php } ?>
                                
                                
                            </table>
								</div>
								
							</div>
						</div>
					</div>





  
 <script type="text/javascript" charset="utf8" src="../../ajax.aspnetcdn.com/ajax/jQuery/jquery-1.8.2.min.js"></script>
  <script type="text/javascript" charset="utf8" src="../../ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/jquery.dataTables.min.js"></script>
  <script>
  $(function(){
    $("#example").dataTable();
  })
  </script>
</div>
</div>




</div>
			


		</div>
	</div>
		




 

<script >
		$(document).ready(function() {
			$('table.display').DataTable({
				"aaSorting" : [[]]
			});

			$('#multi-filter-select').DataTable( {
				"pageLength": 5,
				initComplete: function () {
					this.api().columns().every( function () {
						var column = this;
						var select = $('<select class="form-control"><option value=""></option></select>')
						.appendTo( $(column.footer()).empty() )
						.on( 'change', function () {
							var val = $.fn.dataTable.util.escapeRegex(
								$(this).val()
								);

							column
							.search( val ? '^'+val+'$' : '', true, false )
							.draw();
						} );

						column.data().unique().sort().each( function ( d, j ) {
							select.append( '<option value="'+d+'">'+d+'</option>' )
						} );
					} );
				}
			});

			// Add Row
			$('#add-row').DataTable({
				"pageLength": 5,
			});

			var action = '<td> <div class="form-button-action"> <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task"> <i class="fa fa-edit"></i> </button> <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove"> <i class="fa fa-times"></i> </button> </div> </td>';

			$('#addRowButton').click(function() {
				$('#add-row').dataTable().fnAddData([
					$("#addName").val(),
					$("#addPosition").val(),
					$("#addOffice").val(),
					action
					]);
				$('#addRowModal').modal('hide');

			});
		});
	</script>

	<script>
		$('#datepicker').datetimepicker({
			format: 'YYYY-MM-DD',
		});

		$('#id_DOB').datetimepicker({
			format: 'YYYY-MM-DD',
		});

			$('#datepicker2').datetimepicker({
			format: 'YYYY-MM-DD',
		});

		$('#basic').select2({
			theme: "bootstrap"
		});
	</script>

	











	<!-- GetButton.io widget -->
	<?php require_once '../includes/footer.php'; ?>
	</body>
	</html>





 
	<?php
} else {
    echo "<script>document.location.href='logout.php'; </script>";
  exit;
}

?>
</html>