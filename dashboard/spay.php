<?php
session_start();
if (isset($_SESSION['name'])) {
	error_reporting(0);
	require_once "../core/conn.php";
	$msg = "";
	$sql = mysqli_query($con, "SELECT * FROM user WHERE id = {$_SESSION['id']}");
	if (mysqli_num_rows($sql) > 0) {
		$row = mysqli_fetch_assoc($sql);
	}
	$sitename = $_SERVER['HTTP_HOST'];
	$request_dir = $_SERVER['SERVER_NAME'] . dirname($_SERVER['REQUEST_URI']);
	$sql = mysqli_query($con, "SELECT * FROM pay ");
	if (mysqli_num_rows($sql) > 0) {
		$pay = mysqli_fetch_assoc($sql);
	}
	$das = "7";
	?>
	<?php
	if (isset($_POST["sub"])) {
		$amount = htmlspecialchars($_POST["tprice"]);
		$name = $row['name'];
		$phone = $row['phone'];
		$email = $row['email'];
		$lname = $row['username'];
		$address = $web['address'];
		$site = $web['name'];
		$secret = $pay['fpublickey'];
		$web = $web['web'];
		$mas = $pay['min'];
		$money = $_POST["amount"];
		$max = $pay['max'];
		$status = "0";
		$transid = rand(100000000, 999999999);
		$type = "FLUTTERWAVE";
		$date = date("l j<\s\up>S</\s\up>, F Y @ g:iA");
		if ($money < $mas) { // Use form validation for this
			$msg = "<div class='alert alert-danger'>The minimum Deposit is $mas </div>";
		} else if ($money > $max) { // Use form validation for this
			$msg = "<div class='alert alert-danger'>The maximum Deposit is $max </div>";
		} else {
			$update = mysqli_query($con, "INSERT deposit (name, amount, charge, type, status, trans, date)VALUES ('$name', '$money', '$amount', '$type', '$status', '$transid', '$date')") or die(mysqli_error($con));
			include 'flutterwave.php';
		}
	}
	?>
	<?php include '../includes/header.php'; ?>
	<div class="main-panel ">
		<style>
			.col-25 {
				-ms-flex: 25%;
				/* IE10 */
				flex: 25%;
			}

			.col-50 {
				-ms-flex: 50%;
				/* IE10 */
				flex: 50%;
			}

			.col-75 {
				-ms-flex: 75%;
				/* IE10 */
				flex: 75%;
			}

			.col-25,
			.col-50,
			.col-75 {
				padding: 0 16px;
			}

			.box {
				background-color: #f2f2f2;
				padding: 5px 20px 15px 20px;
				border: 1px solid lightgrey;
				border-radius: 3px;
			}

			input[type=number] {
				width: 100%;
				margin-bottom: 20px;
				padding: 12px;
				border: 1px solid #ccc;
				border-radius: 3px;
			}

			label {
				margin-bottom: 10px;
				display: block;
			}

			.icon-container {
				margin-bottom: 20px;
				padding: 7px 0;
				font-size: 24px;
			}

			.btn {
				background-color: rgb(10, 22, 197);
				color: white;
				padding: 12px;
				margin: 10px 0;
				border: none;
				width: 100%;
				border-radius: 3px;
				cursor: pointer;
				font-size: 17px;
			}

			.btn:hover {
				background-color: #45a049;
			}

			a {
				color: #2196F3;
			}

			hr {
				border: 1px solid lightgrey;
			}

			span.price {
				float: right;
				color: grey;
			}

			/* Responsive layout - when the screen is less than 800px wide, make the two columns stack on top of each other instead of next to each other (also change the direction - make the "cart" column go on top) */
			@media (max-width: 800px) {
				.row {
					flex-direction: column-reverse;
				}

				.col-25 {
					margin-bottom: 20px;
				}
			}
		</style>
		</head>

		<body>
			<div style="padding:90px 15px 20px 15px">
				<h2 class="w3-center">Fund account with Flutterwave </h2>
				<div class="box">
					<div class="row">
						<div class="col-sm-8">
							<div class="outputc">
								<?= $msg; ?>
							</div>
							<form method="POST" id="myform">
								<input type="hidden" name="csrfmiddlewaretoken"
									value="vlHeVAsGpWxhVbvdnM4Yjnnt2X9JwgNPjGQ1jp98i4dHttBGHlhm6DnM4h4lHFqZ">
								<div id="div_id_amount" class="form-group">
									<label for="id_amount" class=" requiredField">
										Amount<span class="asteriskField">*</span>
									</label>
									<div class="">
										<input type="number" name="amount" step="any" class="numberinput form-control"
											required id="id_amount">
									</div>
								</div>
								<div class="container">
									<p>Total</a> <span class="price" id='printchatbox'></span></p>
									<hr>
									<p>Transaction charge <span class="price" style="color:black" id='charge'><b></b></span>
									</p>
								</div>
								<input type="hidden" name="tprice" id="tprice">
								<input type="submit" name="sub" value="Continue to Funding" class="w3-orange btn">
							</form>
							<center>
								<img src="https://www.naijatechguide.com/wp-content/uploads/2018/05/paystack-ii.png"
									height="100">
							</center>
						</div>
						<div class="col-sm-4">
							<h3>Payment</h3>
							<label for="fname">Accepted Cards</label>
							<div class="icon-container">
								<i class="fab fa-cc-visa" style="color:navy;"></i>
								<i class="fab fa-cc-amex" style="color:blue;"></i>
								<i class="fab fa-cc-mastercard" style="color:red;"></i>
								<i class="fab fa-cc-discover" style="color:orange;"></i>
							</div>
						</div>
					</div>
				</div>
			</div>
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
			<script>
				$(document).ready(function () {
					$("#id_amount").keyup(function () {
						var charge = (Number($("#id_amount").val()) * 0.015);
						$("#printchatbox").text('₦' + (Number($("#id_amount").val()) + charge));
						$("#tprice").val((Number($("#id_amount").val()) + charge));
						$("#charge").text('₦' + charge)
					});
				});
			</script>
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
			<script>
				$(function () {
					$('#btnsubmit').on('click', function () {
						$(this).text('Please wait ...')
							.attr('disabled', 'disabled');
						$('#myform').submit();
					});
				});
			</script>
	</div>
	</div>
	</div>
	<script>
		$(document).ready(function () {
			$('table.display').DataTable({
				"aaSorting": [
					[]
				]
			});
			$('#multi-filter-select').DataTable({
				"pageLength": 5,
				initComplete: function () {
					this.api().columns().every(function () {
						var column = this;
						var select = $('<select class="form-control"><option value=""></option></select>')
							.appendTo($(column.footer()).empty())
							.on('change', function () {
								var val = $.fn.dataTable.util.escapeRegex(
									$(this).val()
								);
								column
									.search(val ? '^' + val + '$' : '', true, false)
									.draw();
							});
						column.data().unique().sort().each(function (d, j) {
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
			$('#addRowButton').click(function () {
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