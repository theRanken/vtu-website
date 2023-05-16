<?php
session_start();
if (isset($_SESSION['admin'])) {
require_once '../core/conn.php';
$das="2";
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
						<h4 class="page-title">Unapproved Users</h4>
					</div>
							<div class="card">
								<div class="card-header">
									<div class="card-title">Hello, <?php echo $row['username']; ?> welcome back</div>
								</div>

<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<div class="d-flex align-items-center">
										<h4 class="card-title">Users</h4>
										<span class="btn btn-primary btn-round ml-auto" id="btnStart" data-toggle="modal" data-target="#formModal">
											<i class="fa fa-plus"></i>
											Add User
										</span>
									</div>
								</div>
								<div class="card-body">
									<!-- Modal -->
									

									<div class="table-responsive">
										<table id="add-row" class="display table table-striped table-hover" >
											<thead>
												<tr>
												 <th>S/N</th>
                                                  <th>Name</th>
                                                <th>username</th>
                                                <th>Email</th>
                                                <th>phone No</th>
                                                <th>Current Balance</th>
                                                 <th>Transaction Pin</th>
                                                <th>Account Type</th>
                                                <th>Registration Date</th>
                                                  <th>Status</th>
													<th style="width: 10%">Action</th>
												</tr>
											</thead>
											<tbody>
				    <?php
                $query = "SELECT * FROM user WHERE status='0'" or die(mysqli_error());
                $result = mysqli_query($con, $query);
                $nu = 1;
                ?>
                 <?php
                while ($use = mysqli_fetch_array($result)) {
                  $id = $use['id'];
                  $username = $use['username'];
                  $name = $use['name'];
                  $email = $use['email'];
                  $phone = $use['phone'];
                  $bal= $use['bal'];
                   $pin = $use['pin'];
                   $type = $use['type'];
                   $date = $use['date'];
                   $status = $use['status'];


                ?>
												<tr>
												    <td><?php echo htmlentities($nu); ?></td>
													<td><? echo $name; ?></td>
													<td><? echo $username; ?></td>
													<td><? echo $email; ?></td>
													<td><? echo $phone; ?></td>
													<td><? echo number_format($bal); ?></td>
													<td><? echo $pin; ?></td>
													<td><? echo $type; ?> User</td>
													<td><? echo $date; ?></td>
													<td><?php if ($use['status'] == '0') {
                          echo "<span class='btn btn-warning' id=str" . $use['id'] . ">Unverified</span>";
                        };
                        if ($use['status'] == '1') {
                          echo "<span class='btn btn-success' id=str" . $use['id'] . ">Verified</span>";
                        };
                        if ($use['status'] == '2') {
                          echo "<span class='btn btn-danger' id=str" . $use['id'] . ">Banned</span>";
                        }; ?></td>
													<td>
														<div class="form-button-action">
															<button type="button" data-toggle="tooltip" title="" onclick="active_ban_user(this.value)"  value="<?php echo $username; ?>" class="btn btn-link btn-primary btn-lg" data-original-title="Banned User">
																<i class="fa fa-ban" aria-hidden="true"></i>
															</button>
															<button type="button" data-toggle="tooltip" title=""onclick="active_unapprove_user(this.value)"  value="<?php echo $username; ?>" class="btn btn-link btn-danger" data-original-title="Appprove User">
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
                            <input type="text" class="form-control" id="name" name="name" placeholder="ADEJESUYEMI ELIJAH" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="lastName" class="col-sm-6 col-form-label">
                            Username
                        </label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="username"  name="username" placeholder="ADEX DEVELOPER" required>
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
		<!------ add user ------->		
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
	<!------ ban user ---->
	<script type="text/javascript">
 
  function active_ban_user(val) {
      
 swal({
  title: "Dear <?php echo $row['username'];?>",
  text: "Are  you  sure you want to ban" + ' ' + val,
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
         url: '../assets/banuser.php',
            data: {
                          username: val
                        },
            dataType: 'json',
                      success: function (response) {
                          if (response.status == 500){
                               $.LoadingOverlay("hide");
                            swal({
                              title: "Successful!",
                              text: "You successfully Banned " + ' ' + val,
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
  text: "Are  you  sure you want to approve " + ' ' + val,
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
         url: '../assets/approveuser.php',
            data: {
                          username: val
                        },
            dataType: 'json',
                      success: function (response) {
                          if (response.status == 500){
                               $.LoadingOverlay("hide");
                            swal({
                              title: "Successful!",
                              text: "You successfully approve" + ' ' + val,
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

	