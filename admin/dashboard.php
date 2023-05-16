<?php 
session_start();
if(isset( $_SESSION['admin'])) {
require_once '../core/conn.php';
$das="1";
$sql = mysqli_query($con, "SELECT * FROM admin WHERE id = {$_SESSION['admin']}");
            if 
            (mysqli_num_rows($sql) > 0){
              $row = mysqli_fetch_assoc($sql);
            }
            ?>
<?php  include 'include/header.php'; ?>
			<!-- End Navbar -->
		<!-- Sidebar -->
		<?php  include 'include/nav.php'; ?>
				<!-- End Sidebar -->
			
		<div class="main-panel">
			<div class="content">
				<div class="page-inner">
				<div class="panel-header bg-primary-gradient">
					<div class="page-inner py-5">
						<div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
							<div>
								<h2 class="text-white pb-2 fw-bold">Dashboard</h2>
								<h5 class="text-white op-7 mb-2">welcome back admin </h5>
							</div>
							<div class="ml-md-auto py-2 py-md-0">
								<button type="button" class="btn btn-white btn-border btn-round mr-2">Credit User</button>
								<button type="button" class="btn btn-secondary btn-round" id="btnStart" data-toggle="modal" data-target="#formModal">Add Customer</button>
							</div>
						</div>
						</div>
						</div>
						<!----- surplus data balance ------>
						<?php require('adex_plug.php'); ?>
						<div class="container">
							<div class="row mb-3 mt-3">
								<div class="col-sm-6 col-md-4">
									<div class="card card-stats card-round">
										<div class="card-body ">
											<div class="row align-items-center">
												<div class="col-icon">
													<div class="icon-big text-center icon-primary bubble-shadow-small">
														<i class="fas fa-wallet"></i>
													</div>
												</div>
												<div class="col col-stats ml-3 ml-sm-0">
													<div class="numbers">
														<p class="card-category">Adex Plug Balance</p>
														<h4 class="card-title">&#8358; <?php echo number_format($adexplug_blc,2); ?>
														</h4>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
						<!------ surplus data blance ----->
				<!----- user account balance ---->
				 <div class="container">
							<div class="row mb-3 mt-3">
								<div class="col-sm-6 col-md-4">
									<div class="card card-stats card-round">
										<div class="card-body ">
											<div class="row align-items-center">
												<div class="col-icon">
													<div class="icon-big text-center icon-primary bubble-shadow-small">
														<i class="fas fa-wallet"></i>
													</div>
												</div>
												<div class="col col-stats ml-3 ml-sm-0">
													<div class="numbers">
														<p class="card-category"> Total Users Wallet Balance</p>
														<h4 class="card-title">&#8358; <?php $sql = "SELECT SUM(bal) AS total FROM user";
																						$result2 = $con->query($sql);
																						$user = $result2->fetch_assoc();
																						echo number_format($user['total']); ?>
														</h4>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
                              <!----- end user account balance ----->
                              <!------ total referral bonus ---->
                              <div class="col-sm-6 col-md-4">
									<div class="card card-stats card-round">
										<div class="card-body">
											<div class="row align-items-center">
												<div class="col-icon">
													<div class="icon-big text-center icon-info bubble-shadow-small">
														<i class="flaticon-coins"></i>
													</div>
												</div>
												<div class="col col-stats ml-3 ml-sm-0">
													<div class="numbers">
														<p class="card-category">Total Referral Bonus</p>
														<h4 class="card-title">&#8358; <?php $sql = "SELECT SUM(refbal) AS total FROM user";
																						$result3 = $con->query($sql);
																						$use = $result3->fetch_assoc();
																						echo  number_format($use['total']); ?></h4>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
                              
                              <!---- end total referal bonus ---->
                        <!----- tottal user ----->
				      <div class="col-sm-6 col-md-4">
									<div class="card card-stats card-round">
										<div class="card-body">
											<div class="row align-items-center">
												<div class="col-icon">
													<div class="icon-big text-center icon-secondary bubble-shadow-small">
														<i class="icon-people"></i>
													</div>
												</div>
												<div class="col col-stats ml-3 ml-sm-0">
													<div class="numbers">
														<p class="card-category">Total Users </p>
														<h4 class="card-title"><?php $sql = "SELECT COUNT(*) AS total from user";
																				$resul = $con->query($sql);
																				$dat =  $resul->fetch_assoc();
																				echo number_format($dat['total']); ?></h4>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<!----- end total user ----->
								<!----- total banned user ------>
								<div class="col-sm-6 col-md-4">
									<div class="card card-stats card-round">
										<div class="card-body">
											<div class="row align-items-center">
												<div class="col-icon">
													<div class="icon-big text-center icon-secondary bubble-shadow-small">
														<i class="icon-people"></i>
													</div>
												</div>
												<div class="col col-stats ml-3 ml-sm-0">
													<div class="numbers">
														<p class="card-category">Total Banned Users </p>
														<h4 class="card-title"><?php $sql = "SELECT COUNT(*) AS total from user WHERE status=2";
																				$resu = $con->query($sql);
																				$da =  $resu->fetch_assoc();
																				echo number_format($da['total']); ?></h4>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<!------- end total banned users ------>
								<!----- total unverified users ------>
								<div class="col-sm-6 col-md-4">
									<div class="card card-stats card-round">
										<div class="card-body">
											<div class="row align-items-center">
												<div class="col-icon">
													<div class="icon-big text-center icon-secondary bubble-shadow-small">
														<i class="icon-people"></i>
													</div>
												</div>
												<div class="col col-stats ml-3 ml-sm-0">
													<div class="numbers">
														<p class="card-category">Unverified Users </p>
														<h4 class="card-title"><?php $sql = "SELECT COUNT(*) AS total from user WHERE status=0";
																				$resulta = $con->query($sql);
																				$dataa =  $resulta->fetch_assoc();
																				echo number_format($dataa['total']); ?></h4>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<!---- end total unverified users------>
								<!----- total all smart users ------>
								<div class="col-sm-6 col-md-4">
									<div class="card card-stats card-round">
										<div class="card-body">
											<div class="row align-items-center">
												<div class="col-icon">
													<div class="icon-big text-center icon-secondary bubble-shadow-small">
														<i class="icon-people"></i>
													</div>
												</div>
												<div class="col col-stats ml-3 ml-sm-0">
													<div class="numbers">
														<p class="card-category">All Smart Earner Users </p>
														<h4 class="card-title"><?php $sql = "SELECT COUNT(*) AS total from user WHERE type='SMART'";
																				$resultb = $con->query($sql);
																				$datab =  $resultb->fetch_assoc();
																				echo number_format($datab['total']); ?></h4>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<!------ end total all smart users ---->
								<!---- resellers users ------>
								<div class="col-sm-6 col-md-4">
									<div class="card card-stats card-round">
										<div class="card-body">
											<div class="row align-items-center">
												<div class="col-icon">
													<div class="icon-big text-center icon-secondary bubble-shadow-small">
														<i class="icon-people"></i>
													</div>
												</div>
												<div class="col col-stats ml-3 ml-sm-0">
													<div class="numbers">
														<p class="card-category">All Affilliate Earner Users </p>
														<h4 class="card-title"><?php $sql = "SELECT COUNT(*) AS total from user WHERE type='AFFILIATE'";
																				$resultc = $con->query($sql);
																				$datac =  $resultc->fetch_assoc();
																				echo number_format($datac['total']); ?></h4>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<!------ end reseller users ------>
								<!----- all topup user ----->
								<div class="col-sm-6 col-md-4">
									<div class="card card-stats card-round">
										<div class="card-body">
											<div class="row align-items-center">
												<div class="col-icon">
													<div class="icon-big text-center icon-secondary bubble-shadow-small">
														<i class="icon-people"></i>
													</div>
												</div>
												<div class="col col-stats ml-3 ml-sm-0">
													<div class="numbers">
														<p class="card-category">All Topuser Earner Users </p>
														<h4 class="card-title"><?php $sql = "SELECT COUNT(*) AS total from user WHERE type='TOPUP'";
																				$resultd = $con->query($sql);
																				$datad =  $resultd->fetch_assoc();
																				echo number_format($datad['total']); ?></h4>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<!--- end top up user ----->
								<!-- all api users ----->
								<div class="col-sm-6 col-md-4">
									<div class="card card-stats card-round">
										<div class="card-body">
											<div class="row align-items-center">
												<div class="col-icon">
													<div class="icon-big text-center icon-secondary bubble-shadow-small">
														<i class="icon-people"></i>
													</div>
												</div>
												<div class="col col-stats ml-3 ml-sm-0">
													<div class="numbers">
														<p class="card-category">All Api Users </p>
														<h4 class="card-title"><?php $sql = "SELECT COUNT(*) AS total from user WHERE type='API'";
																				$resultd = $con->query($sql);
																				$datad =  $resultd->fetch_assoc();
													echo number_format($datad['total']); ?></h4>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<!---- end api users ------>
								
								
					<!---- transaction of today ----->
				
		  <div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<div class="d-flex align-items-center">
									<h4 class="card-title">Latest 20 Transaction</h4>
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
		        $query = "SELECT * FROM transactions ORDER BY id DESC LIMIT 20";
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
                          echo "<span class='btn btn-danger' id=str" . $use['id'] . ">Failed</span>";
                        };
                        if ($use['status'] == 1) {
                          echo "<span class='btn btn-success' id=str" . $use['id'] . ">Successful</span>";
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
					<!----- end transaction of the day ----->
								</div>
								</div>
							
						
		
				
				
				
						
	<!--------- add user here  -------->
	<div class="modal fade" id="formModal" tabindex="-1" role="dialog" aria-labelledby="formModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="formModalLabel">Register Customer</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="add-customer" method="post"  name="add-customer">
                <div class="modal-body">
                    <div class="form-group row">
                        <label for="firstName" class="col-sm-6 col-form-label">
                            Full Name
                        </label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="name" name="name" placeholder="Full name" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="lastName" class="col-sm-6 col-form-label">
                            Username
                        </label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="username"  name="username" placeholder="username" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="email" class="col-sm-6 col-form-label">
                            E-mail address
                        </label>
                        <div class="col-sm-6">
                            <input type="email" class="form-control" id="email" name="email" placeholder="datasurplus@gmail.com" required>
                        </div>
                    </div>
                     <div class="form-group row">
                        <label for="email" class="col-sm-6 col-form-label">
                            Phone Number
                        </label>
                        <div class="col-sm-6">
                            <input type="number" class="form-control" id="phone" name="phone" min="11" max="11" placeholder="07013397088" required>
                        </div>
                    </div>
                     <div class="form-group row">
                     <label for="password" class="col-sm-6 col-form-label">
                            Password
                        </label>
                        <div class="col-sm-6">
                            <input type="password" class="form-control" id="password" name="password" placeholder="Adex@123" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="awesomeness" class="col-sm-6 col-form-label">
                            verify user
                        </label>
                        <div class="col-sm-6">
                            <select class="form-control" id="status">
                                <option value="1" selected>Yes</option>
                                <option value="0">No</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="awesomeCheck" required>
                        <label class="form-check-label" for="awesomeCheck">
                            I confirm that i want to register a user.
                        </label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" id="realuser" name="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>					
	</div>			
	<!------ end adding user ------->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
				
	<script>
	    $("#realuser").click(function() {
	        var name=$("#name").val();
	        var username=$("#username").val();
	        var phone=$("#phone").val();
	        var email=$("#email").val();
	        var password=$("#password").val();
	       var status = $('#status').find(":selected").val();
	       swal({
  title: "Dear <?php echo $row['username'];?>",
  text: "Are  you  sure you want to Add" + ' ' + name,
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
         url: '../assets/addcustomer.php',
            data: {
                          id: <?php echo $row['id']; ?>,
                          name:name,
                          username:username,
                          email:email,
                          phone:phone,
                          password:password,
                          status:status
                        },
            dataType: 'json',
                      success: function (response) {
                          if (response.status == 500){
                               $.LoadingOverlay("hide");
                            swal({
                              title: "Successful!",
                              text: "You successfully added " + ' ' + name,
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
	    });
	</script>				

	<!--   Core JS Files   -->
	<?php echo include 'include/footer.php'; ?>
	
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
<?php
} else {
    echo "<script>document.location.href='../logout'; </script>";
  exit;
}

?>
</html>