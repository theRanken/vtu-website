<?php
session_start();
if (isset($_SESSION['admin'])) {
require_once '../core/conn.php';
$das="9";
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
						<h4 class="page-title">Pending Testimony</h4>
					</div>
							<div class="card">
								<div class="card-header">
									<div class="card-title">Hello, <?php echo $row['username']; ?></div>
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
                                                <th>username</th>
                                                <th>Message</th>
                                                  <th>Date</th>
                                                  <th>Status</th>
													<th style="width: 10%">Action</th>
												</tr>
											</thead>
											<tbody>
				    <?php
                $query = "SELECT * FROM rate WHERE status='0'" or die(mysqli_error($con));
                $result = mysqli_query($con, $query);
                $nu = 1;
                ?>
                 <?php
                while ($use = mysqli_fetch_array($result)) {
                  $id = $use['id'];
                  $username = $use['username'];
                   $date = $use['date'];
                   $message=$use['message'];
                   $status = $use['status'];


                ?>
												<tr>
												    <td><?php echo htmlentities($nu); ?></td>
													<td><? echo $username; ?></td>
						                            <td><? echo $message; ?></td>
													<td><? echo $date; ?></td>
													<td><?php if ($use['status'] == '0') {
                          echo "<span class='btn btn-warning' id=str" . $use['id'] . ">Pending</span>";
                        };
                        if ($use['status'] == '1') {
                          echo "<span class='btn btn-success' id=str" . $use['id'] . ">Verified</span>";
                        };
                        if ($use['status'] == '2') {
                          echo "<span class='btn btn-danger' id=str" . $use['id'] . ">Banned</span>";
                        }; ?></td>
													<td>
														<div class="form-button-action">
															<button type="button" data-toggle="tooltip" title="" onclick="active_ban_user(this.value)"  value="<?php echo $id; ?>" class="btn btn-link btn-primary btn-lg" data-original-title="delete">
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
		
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
	<!------ ban user ---->
	<script type="text/javascript">
 
  function active_ban_user(val) {
      
 swal({
  title: "Dear <?php echo $row['username'];?>",
  text: "Are  you  sure you want to delete this testimony",
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
         url: '../assets/deletetes.php',
            data: {
                          id: val
                        },
            dataType: 'json',
                      success: function (response) {
                          if (response.status == 500){
                               $.LoadingOverlay("hide");
                            swal({
                              title: "Successful!",
                              text: "You successfully deleted this testimony",
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
  text: "Are  you  sure you want to approve this testimony",
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
         url: '../assets/approvetes.php',
            data: {
                          id: val
                        },
            dataType: 'json',
                      success: function (response) {
                          if (response.status == 500){
                               $.LoadingOverlay("hide");
                            swal({
                              title: "Successful!",
                              text: "You successfully approve this testiomony it will live to our page",
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

















<?php if($min > $bal) { ?>
?>
<script>
$( document ).ready(function() {
swal({
 
  text: "<?php echo $row['name'];?> Wallet below minimum vending amount ₦<?php echo $row['bal'];?>",
  icon: "info",
  button: "ok",
  timer: 60000,
}).then(() => {
  window.location="index.php"
});
});
</script>
<?php } else { ?>
<?php } 
exit; 
?>









</body>
 
	<?php
} else {
    echo "<script>document.location.href='logout.php'; </script>";
  exit;
}

?>
</html>

	