<?php
session_start();
if (isset($_SESSION['name'])) {
require_once "../core/conn.php";
$sql = mysqli_query($con, "SELECT * FROM user WHERE id = {$_SESSION['id']}");
if (mysqli_num_rows($sql) > 0) {
	$row = mysqli_fetch_assoc($sql);
}
$link = $web['whatlink'];
$sql = mysqli_query($con, "SELECT * FROM  mail");
if (mysqli_num_rows($sql) > 0) {
	$mail = mysqli_fetch_assoc($sql);
}
$das="7";
$musername = $mail['username'];
$mpassword = $mail['password'];
$host = $mail['host'];
$sender = $mail['sender'];
$email = $row['email'];
$name = $row['name'];
$username = $row['username'];
$date = date("d/m/Y h:i");


	$code = "";
	$msg = "";

	if (isset($_POST['sub'])) {
		$code = mysqli_real_escape_string($con, $_POST['code']);
		$query1 = "SELECT * FROM coupon WHERE (code='$code') AND status=0 AND username='$username'";
		$result1 = mysqli_query($con, $query1);
		$query2 = "SELECT * FROM coupon WHERE (code='$code') AND status=1 AND username='$username'";
		$result2 = mysqli_query($con, $query2);
		if (mysqli_num_rows($result1) ==1) {
			$sql = mysqli_query($con, "SELECT * FROM coupon WHERE code ='$code' AND username='$username'");
			if (mysqli_num_rows($sql) > 0) {
				$check = mysqli_fetch_assoc($sql);
			}
			$id= $row['id'];
			$bal = $row['bal'];

			$amount = $check['amount'];
			$total = $amount + $bal;
			mysqli_query($con, "UPDATE coupon SET status = 1 WHERE code= '$code'");
			$credit= mysqli_query($con, "UPDATE user SET  bal='$total' WHERE id= {$_SESSION['id']}");
			if($credit){
			$msg = "<h4 class='alert alert-sucess'>You have been credited <span class='text-danger'>₦$amount</span> sucessfully</h4>";
			require_once "../core/deposit.php";
			@require "../Mail/phpmailer/PHPMailerAutoload.php";
			$mail = new PHPMailer();
			$mail->CharSet = "UTF-8";
			$mail->IsSMTP();
			$mail->SMTPAuth = true;
			$mail->SMTPSecure = "ssl";
			$mail->Host = "$host";
			$mail->Port = 465;
			$mail->Username = "$musername";
			$mail->Password = "$mpassword";
			$mail->IsHTML(true);
			$mail->setFrom("$sender");
			$mail->addAddress("$email");
			$mail->isHTML(true);
			$mail->Subject = "Deposit Successful";
			$mail->Body = $temp;
			if (!$mail->send()) {
				//I left this blank because i don't want anything to pop out on the ui again
				//echo "<script> alert('error sending email mysqli_error($mail)');</script>";
			} else {
				//I left this blank because i don't want anything to pop out on the ui again
				// echo "<script> alert('email was sent');</script>";
			};
		}
		else{
				$msg = "<h4 class='alert alert-danger'>There was an error please try again</h4>";

		}
		} else if (mysqli_num_rows($result2) == 1) {
			

			$msg = "<h4 class='alert alert-danger'> Sorry,  This Coupon Code (<span class='text-danger'>$code</span>)  has been used.
    <span class='btn-primary'><br /><a href=" . $link . "> Click here for help</a></h4></span>";
		} else {
			$msg = "<h5 class='alert alert-warning'><br>
     Oops!! You have entered wrong coupon code!
    Please provide the  correct coupon code  and try again.<br></h5>";
		}
	}
?>
<?php include '../includes/header.php'; ?>
		<div class="main-panel ">
				

<link rel="stylesheet" href="/static/ogbam/form.css">

<div style="padding:90px 15px 20px 15px" >
					<div class="outputc"> <?= $msg; ?></div>

					<h2 class="w3-center">Fund account with Coupon Code</h2>

					<div class="box w3-card-4">

						<form method='post' id="myform">


							<div class="row">

								<div class="col-sm-8">









									<div id="div_id_Code" class="form-group">

										<label for="id_Code" class=" requiredField">
											Code<span class="asteriskField">*</span>
										</label>








										<div class="">
											<input type="text" name="code" maxlength="20" class="textinput textInput form-control" required id="id_Code">












										</div>


									</div>











									<button type="submit" value="Continue to Funding" name="sub" class=" btn" id="btnsubmit" style='margin-bottom:15px;'>Fund</button>

								</div>
								<div class="col-sm-4 ">


									<div class="alert alert-info">
										<strong><i class="fab fa-whatsapp w3-large"></i> Buy Coupon code:</strong>
										<p class="">Contact us on whatsapp to buy your coupon code <a href="<?php echo $web['whatlink']; ?>" class="btn " style="background-color: rgb(4, 219, 4) !important; color: white;"><strong> <i class="fab fa-whatsapp w3-large"> </i> whatsapp us</strong></a></p>
									</div>
								</div>



							</div>





					</div>
				</div>

			</div>
		</div>

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>





		</div>
		</div>








		<script>
			$(document).ready(function() {
				$('table.display').DataTable({
					"aaSorting": [
						[]
					]
				});

				$('#multi-filter-select').DataTable({
					"pageLength": 5,
					initComplete: function() {
						this.api().columns().every(function() {
							var column = this;
							var select = $('<select class="form-control"><option value=""></option></select>')
								.appendTo($(column.footer()).empty())
								.on('change', function() {
									var val = $.fn.dataTable.util.escapeRegex(
										$(this).val()
									);

									column
										.search(val ? '^' + val + '$' : '', true, false)
										.draw();
								});

							column.data().unique().sort().each(function(d, j) {
								select.append('<option value="' + d + '">' + d + '</option>')
							});
						});
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