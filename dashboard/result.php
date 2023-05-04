<?php
session_start();
if (isset($_SESSION['name'])) {
require_once '../core/conn.php';

	$aemail = $web['email'];
	$sql = mysqli_query($con, "SELECT * FROM user WHERE id = {$_SESSION['id']}");
	if (mysqli_num_rows($sql) > 0) {
		$row = mysqli_fetch_assoc($sql);
	}
	$msg = "";
	$das="";
	$sql = mysqli_query($con, "SELECT * FROM  mail");
	if (mysqli_num_rows($sql) > 0) {
		$mail = mysqli_fetch_assoc($sql);
	}
	$bal = $row['bal'];
	$email = $row['email'];
	$name = $row['name'];
	$username = $row['username'];
	$musername = $mail['username'];
	$mpassword = $mail['password'];
	$host = $mail['host'];
	$sender = $mail['sender'];
	date_default_timezone_set('Africa/Lagos');
	$date = date("l j<\s\up>S</\s\up>, F Y @ g:ia");
	$chek = mysqli_query($con, "SELECT * FROM pay");

	$pdata = mysqli_fetch_array($chek);
	$msg = "";
	$min = $pdata['min'];

	if (isset($_POST['generate'])) {

		$exam = mysqli_real_escape_string($con, $_POST['exam']);
		$quantity = mysqli_real_escape_string($con, $_POST['quantity']);
		$amount = mysqli_real_escape_string($con, $_POST['amount']);
		$total = $bal - $amount;

		if ($quantity > 5) {
			$msg = '<div class="alert alert-warning"><button type="button" class="close" data-dismiss="alert">×</button><strong>You can puchase more than 5 quantity</strong>';
		} elseif (empty($quantity)) {
			$msg = '<div class="alert alert-warning"><button type="button" class="close" data-dismiss="alert">×</button><strong>Please enter the amount of qunatity you need</strong>';
		} elseif (empty($amount)) {
			$msg = '<div class="alert alert-warning"><button type="button" class="close" data-dismiss="alert">×</button><strong>Amount Cannot be empty </strong>';
		} elseif ($amount > $bal) {
			$msg = '<div class="alert alert-warning"><button type="button" class="close" data-dismiss="alert">×</button><strong>insuffient account, please deposit</strong>';
		} elseif ($min > $total) {
			$msg = '<div class="alert alert-warning"><button type="button" class="close" data-dismiss="alert">×</button><strong>The minimum amount that must be in your account is <span>₦' . $min . '</span></strong>';
		} else {
			if ($quantity === '1') {
				$pr = $nu;

				$query_com = mysqli_query($con, "SELECT * FROM pin WHERE exam='$exam' AND status='0' LIMIT 1");
				$rate = mysqli_fetch_assoc($query_com);
				$cardpin = ucfirst($rate['cardpin']);
			} elseif ($quantity === '2') {
				$query_com = mysqli_query($con, "SELECT * FROM pin LIMIT ");
				$rate = mysqli_num_rows($query_com);
			} elseif ($quantity === '3') {

				$query = "SELECT * FROM pin  WHERE exam='$exam' AND status='0' LIMIT 3";
				$result = mysqli_query($con, $query);
				while ($rate = mysqli_fetch_assoc($result)) {
					$cardpin = ucfirst($rate['cardpin']);
				}
?>
	<?php
			} elseif ($quantity === '4') {

				$query_com = mysqli_query($con, "SELECT * FROM pin WHERE exam='$exam' AND status='0' LIMIT 4");
				$rate = mysqli_fetch_assoc($query_com);
				$cardpin = ucfirst($rate['cardpin']);
			} elseif ($quantity === '5') {

				$query_com = mysqli_query($con, "SELECT * FROM pin WHERE exam='$exam' AND status='0' LIMIT 5");
				$rate = mysqli_fetch_array($query_com);
				$cardpin = ucfirst($rate['cardpin']);
			} else {
				if ($quantity === '6') {

					$query_com = mysqli_query($con, "SELECT * FROM pin WHERE exam='$exam' AND status='0' order by id desc LIMIT 1");
					$rate = mysqli_fetch_array($query_com);
					$cardpin = ucfirst($rate['cardpin']);
				}
			}

			$msg = '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">×</button><strong>Transaction Successful check your gmail for the serial nmber</strong>';

			$updat = mysqli_query($con, "UPDATE user SET bal='$total' WHERE email='$email' ") or die(mysqli_error());

			$update = mysqli_query($con, "UPDATE pin SET status='1' WHERE cardpin='$cardpin'  ") or die(mysqli_error());

			$type = "Scratch Card";
			@require "../Mail/phpmailer/PHPMailerAutoload.php";
			require_once "../core/pin.php";
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
			$mail->Subject = "Scratch Card";
			$mail->Body = $temp;
			if (!$mail->send()) {

				if (!$mail->send()) {
					$msg = '<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert">×</button><strong>Transaction Failedr</strong>';
				} else {


					$msg = '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">×</button><strong>Transaction Successful check your gmail for the serial nmber</strong>';

					$updat = mysqli_query($con, "UPDATE user SET bal='$total' WHERE email='$email' ") or die(mysqli_error($con));

					$update = mysqli_query($con, "UPDATE pin SET status='1' WHERE cardpin='$cardpin'  ") or die(mysqli_error($con));
				};
			}
		}
	}
	?>
	
<?php include '../includes/header.php'; ?>


			<div style="padding:90px 15px 20px 15px">

				<div class="main-panel ">


					<link rel="stylesheet" href="../static/ogbam/form.css">
					<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

					<script src="https://cdn.jsdelivr.net/npm/gasparesganga-jquery-loading-overlay@2.1.7/dist/loadingoverlay.min.js"></script>

					<style>
						.control {
							display: block;
							width: 100%;
							height: calc(2.25rem + 2px);
							padding: .375rem .75rem;
							font-size: 1rem;
							font-weight: 400;
							line-height: 1.5;
							color: #495057;
							background-color: #fff;
							background-clip: padding-box;
							border: 1px solid #ced4da;
							border-radius: .25rem;
							transition: border-color .15s ease-in-out, box-shadow .15s ease-in-out;
						}
					</style>
					<div style="padding:90px 15px 20px 15px">


						<h2 class="w3-center"> Generate Result Checker Pin</h2>
						<div outpc=""><? echo $msg; ?></div>

						<div class="box w3-card-4">

							<form method='post' id="form_id">


								<div class="row">

									<div class="col-sm-8">

										<input type="hidden" name="csrfmiddlewaretoken" value="pj79HBbx3yl9Nbff3YU8tUCmBpfiJOsaD58wez6HJ3rR2CBeQDxDXjX7ObV0vog0">








										<div id="div_id_exam_name" class="form-group">

											<label for="id_exam_name" class=" requiredField">
												Exam name<span class="asteriskField">*</span>
											</label>








											<div class="">
												<select name="exam" class="select form-control" required id="id_exam_name">
													<option value="" selected>---------</option>

													<option value="WAEC">WAEC</option>

													<option value="NECO">NECO</option>

												</select>












											</div>


										</div>











										<div id="div_id_quantity" class="form-group">

											<label for="id_quantity" class=" requiredField">
												Quantity<span class="asteriskField">*</span>
											</label>








											<div class="">
												<input type="number" name="quantity" value="1" min="1" max="1" class="numberinput form-control" required id="id_quantity">












											</div>


										</div>

										<label><b>Amount</b></label>
										<input type="text" name="amount" class="numberinput form-control" required id="amount" readonly="readonly">




										<button type="submit" class=" btn" style='  color: white;' name="generate"> Generate</button>

									</div>
									<div class="col-sm-4  ">





									</div>

								</div>
						</div>






					</div>
				</div>

			</div>
		</div>




		<!-- jQuery library -->


		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

		<script>
			$(document).ready(function() {
				$("#id_exam_name").change(function() {
					var selectednetwork = $("#id_exam_name option:selected").val();
					var quantity = $("#id_quantity").val();
					if (selectednetwork == "WAEC") {
						$("#amount").val(quantity * Number('1000.0'));


					} else if (selectednetwork == "NECO") {
						$("#amount").val(quantity * Number('900.0'));
					}
				});

				$("#id_quantity").keyup(function() {
					//var selectednetwork = $(this).children("option:selected").val();
					var selectednetwork = $("#id_exam_name option:selected").val();
					var quantity = $("#id_quantity").val();
					console.log(quantity)
					console.log(selectednetwork)

					if (quantity > 5) {
						$("#amount").val("Maximum per is 5");

					} else if (selectednetwork == "WAEC") {
						$("#amount").val(quantity * Number('1000.0'));




					} else if (selectednetwork == "NECO") {
						$("#amount").val(quantity * Number('900.0'));
					}


				});





			});
		</script>











		<!-- jquery validator -->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/gasparesganga-jquery-loading-overlay@2.1.7/dist/loadingoverlay.min.js">
		</script>


		<?php if ($min > $bal) { ?>
			?>
			<script>
				$(document).ready(function() {
					swal({

						text: "<?php echo $row['name']; ?> Wallet below minimum vending amount ₦<?php echo $row['bal']; ?>",
						icon: "info",
						button: "ok",
						timer: 60000,
					}).then(() => {
						window.location = "index.php"
					});
				});
			</script>
		<?php } else { ?>
		<?php }
		exit;
		?>







		<?php require_once '../includes/footer.php'; ?>

	</body>

<?php
} else {
	echo "<script>document.location.href='logout.php'; </script>";
	exit;
}

?>

	</html>