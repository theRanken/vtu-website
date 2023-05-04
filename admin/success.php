<?php 
session_start();
if(isset( $_SESSION['admin'])) {
require_once '../core/conn.php';
$das="3";

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
									<h4 class="card-title">Successful Transactions</h4>
								</div>
								<div class="card-body">
									<div class="table-responsive">
										<table id="basic-datatables" class="display table table-striped table-hover" >
											<thead>
												<tr>
													<th>NO</th>
												<th>Username</th>
												<th>Transid</th>
												<th >Network</th>
												<th >Service</th>
												<th>Mobile</th>
												<th >Plan</th>
												<th>Type</th>
												<th>Date</th>
												<th>Status</th>
												</tr>
											</thead>
										
											<tbody>
									<?php
		        $query = "SELECT * FROM transactions WHERE status='1'";
                $result = mysqli_query($con, $query);
                $nu = 1;
                $msg="";
                if (mysqli_num_rows($result) == 0) {
                  $msg = "<b>No Pending Transaction Made yet</b>";
                }
                ?>
                 <?php
                while ($use = mysqli_fetch_array($result)) {
                  $id = $use['id'];
                  $username = $use['username'];
                  $transid = $use['transid'];
                  $amount = $use['amount'];
                  $network = $use['network'];
                  $service = $use['service'];
                  $mobile = $use['mobile'];
                  $plan = $use['plans'];
                  $type = $use['type'];
                  $status = $use['status'];
                   $date = $use['date'];


                ?>
				
												<tr>
												 <td><?php echo htmlentities($nu);
                        echo '.'; ?></td>
												<td><? echo $username; ?></td>
												<td><? echo $transid; ?></td>
												<td><? echo $network ?></td>
												<td><? echo $service ?></td>
												<td><?echo $mobile; ?></td>
												<td><? echo $plan ?></td>
												<td><? echo $type; ?></td>
												<td><? echo $date; ?> </td>
												 <td><?php if ($use['status'] == 0) {
                          echo "<span class='btn btn-warning' id=str" . $use['id'] . ">Pending</span>";
                        };
                        if ($use['status'] == 1) {
                          echo "<span class='btn btn-success' id=str" . $use['id'] . ">Paid</span>";
                        };
                        if ($use['status'] == 2) {
                          echo "<span class='btn btn-danger' id=str" . $use['id'] . ">Cancled</span>";
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

						
		<!-- End Custom template -->
	</div>
	<!--   Core JS Files   -->
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