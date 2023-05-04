<?php
session_start();
if (isset($_SESSION['admin'])) {
require_once '../core/conn.php';
$das="10";
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
						<h4 class="page-title">Paid Loan Activities</h4>
					</div>
							<div class="card">
								<div class="card-header">
									<div class="card-title">Hello, <?php echo $row['username']; ?> welecome back</div>
								</div>

<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<div class="d-flex align-items-center">
										
									</div>
								</div>
								<div class="card-body">
									<!-- Modal -->
									

									<div class="table-responsive">
										<table id="add-row" class="display table table-striped table-hover" >
											<thead>
												<tr>
												 <th>S/N</th>
                                                <th>username</th>
                                                <th>Email</th>
                                                <th>Amount</th>
                                                <th>Date</th>
                                                  <th>Status</th>
													
												</tr>
											</thead>
											<tbody>
				    <?php
                $query = "SELECT * FROM loan WHERE status='2'" or die(mysqli_error());
                $result = mysqli_query($con, $query);
                $nu = 1;
                ?>
                 <?php
                while ($use = mysqli_fetch_array($result)) {
                  $id = $use['id'];
                  $username = $use['username'];
                  $email = $use['email'];
                   $date = $use['date'];
                   $status = $use['status'];
                   $amount=$use['amount'];


                ?>
												<tr>
												    <td><?php echo htmlentities($nu); ?></td>
													<td><? echo $username; ?></td>
													<td><? echo $email; ?></td>
													<td><? echo number_format($amount); ?></td>
													<td><? echo $date; ?></td>
													<td><?php if ($use['status'] == '0') {
                          echo "<span class='btn btn-danger' id=str" . $use['id'] . ">Pending</span>";
                        };
                        if ($use['status'] == '1') {
                          echo "<span class='btn btn-warning' id=str" . $use['id'] . ">Approved</span>";
                        };
                        if ($use['status'] == '2') {
                          echo "<span class='btn btn-success' id=str" . $use['id'] . ">Paid</span>";
                        }; ?></td>
													
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
			<!--------- add user here  -------->
			
	<!------ end adding user ------->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
	

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

	