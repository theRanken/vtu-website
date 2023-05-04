<?php
session_start();
if (isset($_SESSION['admin'])) {
require_once '../core/conn.php';
$das="0";
$sql = mysqli_query($con, "SELECT * FROM admin WHERE id = {$_SESSION['admin']}");
            if 
            (mysqli_num_rows($sql) > 0){
              $row = mysqli_fetch_assoc($sql);
            }
?>
<?php require_once 'include/header.php';
require_once 'include/nav.php';
?>

<div class="main-panel">
			<div class="content">
				<div class="page-inner">
					<div class="page-header">
						<h4 class="page-title">Cancelled Airtime 2 Cash</h4>
					</div>
							

<div class="col-md-12">
							<div class="card">
								
								<div class="card-body">
									<!-- Modal -->
									

									<div class="table-responsive">
										<table id="add-row" class="display table table-striped table-hover" >
											<thead>
												<tr>
												 <th>S/N</th>
                                                  <th>Username</th>
                                                <th>Network</th>
                                                <th>Phone Number</th>
                                                <th>Amount Sent</th>
                                                <th>Amount To be Paid</th>
                                                 <th>Fund Type</th>
                                                <th>Date</th>
                                                  <th>Status</th>
													<th style="width: 10%">Action</th>
												</tr>
											</thead>
											<tbody>
				    <?php
                $query = "SELECT * FROM airtime WHERE status='2'" or die(mysqli_error());
                $result = mysqli_query($con, $query);
                $nu = 1;
                ?>
                 <?php
                while ($use = mysqli_fetch_array($result)) {
                  $id = $use['id'];
                  $username = $use['username'];
                  $network = $use['network'];
                  $amount = $use['amount'];
                  $phone = $use['mobile'];
                  $amount_pay= $use['pay'];
                   $type = $use['type'];
                   $date = $use['date'];
                   $status = $use['status'];


                ?>
												<tr>
												    <td><?php echo htmlentities($nu); ?></td>
													<td><? echo $username; ?></td>
													<td><? echo $network; ?></td>
													<td><? echo $phone; ?></td>
													<td><? echo number_format($amount); ?></td>
													<td><? echo number_format($amount_pay); ?></td>
													<td><? echo $type; ?></td>
													<td><? echo $date; ?></td>
													<td><?php if ($use['status'] == '0') {
                          echo "<span class='btn btn-warning' id=str" . $use['id'] . ">Pending</span>";
                        };
                        if ($use['status'] == '1') {
                          echo "<span class='btn btn-success' id=str" . $use['id'] . ">Paid</span>";
                        };
                        if ($use['status'] == '2') {
                          echo "<span class='btn btn-danger' id=str" . $use['id'] . ">Canceled</span>";
                        }; ?></td>
													<td>
														<div class="form-button-action">
															<button type="button" data-toggle="tooltip" title="" onclick="active_ban_user(this.value)"  value="<?php echo $id; ?>" class="btn btn-link btn-primary btn-lg" data-original-title="Delete">
																<i class="fa fa-ban" aria-hidden="true"></i>
															</button>
															<button type="button" data-toggle="tooltip" title=""onclick="active_unapprove_user(this.value)"  value="<?php echo $id; ?>" class="btn btn-link btn-danger" data-original-title="Appprove">
															<i class="fa fa-check" aria-hidden="true"></i>
															</button>
														</div>
													</td>
												</tr>
													<?php
                                            $nu = $nu + 1;
                                                  }
										  
                                              ?>
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
					
	<!------ end adding user ------->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
		<!------ add user ------->		
	
	<!------ ban user ---->
	<script type="text/javascript">
 
  function active_ban_user(val) {
      
 swal({
  title: "Dear <?php echo $row['username'];?>",
  text: "Do You want to delete this transaction",
  icon: "warning",
  buttons: true,
  dangerMode: true,
}) 
.then((willDelete) => {
  if (willDelete) {

 $.ajax({
           type:'POST',
         beforeSend: function(){
            $.LoadingOverlay("show");
                 },
         url: '../assets/deletecash.php',
            data: {
                          username: val
                        },
            dataType: 'json',
                      success: function (response) {
                          if (response.status == 500){
                               $.LoadingOverlay("hide");
                            swal({
                              title: "Successful!",
                              text: "You successfully Delete",
                              icon: "success",
                              button: "Okay",
                            })
                            $('.swal-button--confirm').click(function(){
                                  $.ajax({
                                        beforeSend: function(){
                                            $.LoadingOverlay("show");
                                        },
            success:  location.reload()
                                  });
                            });
                          }else{
                     $.LoadingOverlay("hide");
            swal(response.title, response.message, response.status)
                
                      }
                      },
                      complete: function(response){
                        $.LoadingOverlay("hide")
                      }
                      
                  });
}
  else{
    swal("you pressed cancel ");
  }
 });
}

</script>
<!------ unapprove user ----->
		<script type="text/javascript">
 
  function active_unapprove_user(val) {
      
 swal({
  title: "Dear <?php echo $row['username'];?>",
  text: "Aproving this transaction means you have sucessfully credited the user",
  icon: "warning",
  buttons: true,
  dangerMode: true,
}) 
.then((willDelete) => {
  if (willDelete) {

 $.ajax({
           type:'POST',
         beforeSend: function(){
            $.LoadingOverlay("show");
                 },
         url: '../assets/approvecash.php',
            data: {
                          username: val
                        },
            dataType: 'json',
                      success: function (response) {
                          if (response.status == 500){
                               $.LoadingOverlay("hide");
                            swal({
                              title: "Successful!",
                              text: "Approved Successfully",
                              icon: "success",
                              button: "Okay",
                            })
                            $('.swal-button--confirm').click(function(){
                                  $.ajax({
                                        beforeSend: function(){
                                            $.LoadingOverlay("show");
                                        },
            success:  location.reload()
                                  });
                            });
                          }else{
                     $.LoadingOverlay("hide");
            swal(response.title, response.message, response.status)
                
                      }
                      },
                      complete: function(response){
                        $.LoadingOverlay("hide")
                      }
                      
                  });
}
  else{
    swal("you pressed cancel ");
  }
 });
}

</script>	
<?php require_once 'include/footer.php'; ?>
	
	<script >
		$(document).ready(function() {
			$('#basic-datatables').DataTable({
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
</body>
</html>




</body>
 
	<?php
} else {
    echo "<script>document.location.href='logout.php'; </script>";
  exit;
}

?>
</html>

	