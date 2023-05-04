<?php 
session_start();
if(isset( $_SESSION['admin'])) {
require_once '../core/conn.php';
$das="4";

$sql = mysqli_query($con, "SELECT * FROM admin WHERE id = {$_SESSION['admin']}");
            if 
            (mysqli_num_rows($sql) > 0){
              $row = mysqli_fetch_assoc($sql);
            }
            ?>
<?php include 'include/header.php';
include 'include/nav.php';
?>

		<div class="main-panel">
			<div class="content">
				<div class="page-inner">
					
					<div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<h4 class="card-title">All Coupon Codes</h4>
								</div>
								<div class="card-body">
									<div class="table-responsive">
										<table id="basic-datatables" class="display table table-striped table-hover" >
											<thead>
												<tr>
												 <th>NO</th>
												<th>Username</th>
												<th>Amount</th>
												<th>Coupon Code</th>
												<th >Date</th>
												<th >Status</th>
													<th style="width: 10%">Action</th>
												</tr>
											</thead>
										
											<tbody>
									<?php
		        $query = "SELECT * FROM coupon";
                $result = mysqli_query($con, $query);
                $nu = 1;
                $msg="";
                if (mysqli_num_rows($result) == 0) {
                  $msg = "<b>No cupon coded added yet</b>";
                }
                ?>
                 <?php
                while ($use = mysqli_fetch_array($result)) {
                  $id = $use['id'];
                  $username = $use['username'];
                  $amount = $use['amount'];
                  $date = $use['date'];
                  $status = $use['status'];
                 $code = $use['code'];


                ?>
				
												<tr>
												 <td><?php echo htmlentities($nu);
                        echo '.'; ?></td>
												<td><? echo $username; ?></td>
												<td><? echo $amount; ?></td>
												<td><? echo $code; ?></td>
												<td><? echo $date ?></td>
												 <td><?php if ($use['status'] == 0) {
                          echo "<span class='btn btn-warning' id=str" . $use['id'] . ">Pending</span>";
                        };
                        if ($use['status'] == 1) {
                          echo "<span class='btn btn-success' id=str" . $use['id'] . ">Paid</span>";
                        };
                        if ($use['status'] == 2) {
                          echo "<span class='btn btn-danger' id=str" . $use['id'] . ">Cancled</span>";
                        }; ?></td>
                        <td>
														<div class="form-button-action">
															<button type="button" data-toggle="tooltip" title="" onclick="active_ban_user(this.value)"  value="<?php echo $code; ?>" class="btn btn-link btn-primary btn-lg" data-original-title="Delete">
																<i class="fas fa-trash-alt"></i>
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

						
		<!-- End Custom template -->
	</div>
	<!--   Core JS Files   -->
	
	<!------- delete coupon code ------->
	
	
	<script type="text/javascript">
 
  function active_ban_user(val) {
      
 swal({
  title: "Dear <?php echo $row['username'];?>",
  text: "Are  you  sure you want to delete this coupon code " + ' ' + val,
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
         url: '../assets/deletecouponcode.php',
            data: {
                          code: val
                        },
            dataType: 'json',
                      success: function (response) {
                          if (response.status == 500){
                               $.LoadingOverlay("hide");
                            swal({
                              title: "Successful!",
                              text: "You have successfully deleted this coupon code  " + ' ' + val,
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
	
	
	
	<!---- end delet  coupon code -------->
	
	
	
	
	
	<?php require_once  'include/footer.php'; ?>
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
	<?php
} else {
    echo "<script>document.location.href='logout.php'; </script>";
  exit;
}

?>
</body>
</html>