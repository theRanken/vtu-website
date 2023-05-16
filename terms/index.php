<?php
require_once '../core/conn.php';
session_start();
$id = $_SESSION['id'];
$sql = $con->query("SELECT * FROM user WHERE id='$id' ");
if($sql->num_rows > 0) {
	$row = $sql->fetch_assoc();
}
?>
<!DOCTYPE html>
<html lang="en">


<head>
	<meta name="theme-color" content="#5230b0">
	<meta charset="utf-8" />
	<title>
		<?php echo $web['name']; ?> | Buy Data, Airtime to cash, Bills Payment
	</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="referrer" content="no-referrer-when-downgrade">

	<!--favicon icon-->
	<link rel="icon" href="/static/stylem/assets/wp-content/uploads/2020/10/favicon.png" sizes="32x32" />
	<link rel="icon" href="/static/stylem/assets/wp-content/uploads/2020/10/favicon.png" sizes="192x192" />
	<link rel="apple-touch-icon" href="/static/stylem/assets/wp-content/uploads/2020/10/favicon.png" />




	<meta
		content="<?php echo $web['name']; ?>- Buy Airtime and Data for all Network. Make payment for DSTV, GOTV, PHCN other services"
		name="descriptison">

	<meta itemprop="name"
		content="<?php echo $web['name']; ?>- Buy Airtime and Data for all Network. Make payment for DSTV, GOTV, PHCN other services">
	<meta itemprop="description"
		content="Buy Cheap Internet Data Plan and Airtime Recharge for Airtel, 9mobile, GLO, MTN, Pay DSTV, GOTV, PHCN.">
	<meta itemprop="image" content="/static/styling/images/bg.jpg">
	<link rel="stylesheet" href="/static/ogbam/w3.css">

	<!-- Twitter Card data -->
	<meta name="twitter:card" content="/static/styling/images/bg.jpg">
	<meta name="twitter:title"
		content="<?php echo $web['name']; ?>- Buy Airtime and Data for all Network. Make payment for DSTV, GOTV, PHCN other services">
	<meta name="twitter:description"
		content="Buy Cheap Internet Data Plan and Airtime Recharge for Airtel, 9mobile, GLO, MTN, Pay DSTV, GOTV, PHCN.">
	<meta name="twitter:image:src" content="/static/styling/images/bg.jpg">

	<!-- Open Graph data -->
	<meta property="og:locale" content="en_US">
	<meta property="og:title"
		content="datavilla- Buy Airtime and Data for all Network. Make payment for DSTV, GOTV, PHCN other services">
	<meta property="og:image" content="/static/styling/images/bg.jpg">
	<meta property="og:description"
		content="Buy Cheap Internet Data Plan and Airtime Recharge for Airtel, 9mobile, GLO, MTN, Pay DSTV, GOTV, PHCN." />
	<meta property="og:site_name" content="<?php echo $web['name']; ?>" />
	<meta property="og:url" content="<?php echo $web['web']; ?>">
	<meta property="og:type" content="website">

	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<link rel="icon" href="/static/dashboard/assets/img/icon.ico" type="image/x-icon" />

	<!-- Fonts and icons -->
	<script src="/static/dashboard/assets/js/plugin/webfont/webfont.min.js"></script>
	<link rel="stylesheet" href="/static/dashboard/assets/css/fonts.min.css" media="all">
	<!-- toast -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css"
		media="all">

	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


	<script>
		WebFont.load({
			google: { "families": ["Lato:300,400,700,900"] },
			custom: { "families": ["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"], urls: ['/static/dashboard/assets/css/fonts.min.css'] },
			active: function () {
				sessionStorage.fonts = true;
			}
		});
	</script>

	<style>
		.swal-overlay {
			background-color: rgba(43, 165, 137, 0.45);
		}


		.swal-button {
			padding: 7px 19px;
			border-radius: 2px;
			background-color: #1572E8 !important;
			font-size: 12px;
			color: white;
			border: 1px solid #3e549a;
			text-shadow: 0px -1px 0px rgba(0, 0, 0, 0.3);
		}
	</style>


	<!-- Popup notifications -->
	<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>

	<!-- CSS Files -->
	<link rel="stylesheet" href="/static/dashboard/assets/css/w3.css">
	<link rel="stylesheet" href="/static/dashboard/assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="/static/dashboard/assets/css/atlantis.css">




</head>

<body data-background-color="bg3" onload="greet(); alertinfo()">
	<div class="wrapper">
		<div class="main-header">
			<!-- Logo Header -->
			<div class="logo-header bg-secondary-gradient ">
				<a href="#" class="logo"
					style="color: white;font-size: 19px;font-weight: bold;margin-right: -70px;">Welcome</a>
				<button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse"
					data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon">
						<i class="icon-menu"></i>
					</span>
				</button>
				<button class="topbar-toggler more"><i class="icon-options-vertical"></i></button>
				<div class="nav-toggle">
					<button class="btn btn-toggle toggle-sidebar">
						<i class="icon-menu"></i>
					</button>
				</div>
			</div>
			<!-- End Logo Header -->

			<!-- Navbar Header -->
			<nav class="navbar navbar-header navbar-expand-lg bg-secondary-gradient">

				<div class="container-fluid">




					<ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
						<li class="nav-item toggle-nav-search hidden-caret">
							<a class="nav-link" data-toggle="collapse" href="#search-nav" role="button"
								aria-expanded="false" aria-controls="search-nav">
								<i class="fa fa-search"></i>
							</a>
						</li>


						<li class="nav-item dropdown hidden-caret">
							<a class="nav-link" href="../logout/">
								<i class="fas fa-power-off"></i> Logout
							</a>
						</li>
					</ul>
				</div>
			</nav>
			<!-- End Navbar -->
		</div>

		<!-- Sidebar -->
		<div class="sidebar sidebar-style-2" data-background-color="dark">
			<div class="sidebar-wrapper scrollbar scrollbar-inner">
				<div class="sidebar-content">
					<div class="user">
						<div class="avatar avatar-online avatar-sm float-left mr-2">
							<img src="../static/dashboard/assets/img/avatar.png" alt="..."
								class="avatar-img rounded-circle">
						</div>
						<div class="info">
							<a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
								<span>
									<?php echo $row['name']; ?>
									<span class="user-level">balance: &#8358;
										<?php echo $row['bal']; ?>
									</span>
								</span>
							</a>
							<div class="clearfix"></div>
						</div>
					</div>
					<ul class="nav nav-primary">

						<li class="nav-item">

							<a href="../dashboard/index.php">
								<i class="fas fa-home"></i>
								<p>Dashboard</p>
							</a>
						</li>

						<li class="nav-item">

							<a href="../dashboard/buydata.php">
								<i class="fas fa-signal"></i>
								<p>Buy Data</p>
							</a>
						</li>

						<li class="nav-item">

							<a href="../dashboard/topup.php">
								<i class="fas fa-phone-square"></i>
								<p>Buy Airtime</p>
							</a>
						</li>

						<li class="nav-item">

							<a data-toggle="collapse" href="#utilities">
								<i class="fas fa-lightbulb"></i>
								<p>Utilities Payment</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="utilities">
								<ul class="nav nav-collapse">
									<li>
										<a href="../dashboard/bill.php"> <span class="sub-item">Bill Payment</span> </a>
									</li>
									<li>
										<a href="../dashboard/cable.php"> <span class="sub-item">Cable
												Subscription</span> </a>
									</li>
								</ul>
							</div>
						</li>


						<li class="nav-item">

							<a data-toggle="collapse" href="#fund">
								<i class="fas fa-credit-card"></i>
								<p>Fund Wallet</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="fund">
								<ul class="nav nav-collapse">

									<li>
										<a href="../dashboard/pay.php"> <span class="sub-item">Fund with Paystack
												(ATM)</span> </a>
									</li>



									<li>
										<a href="../dashboard/spay.php"> <span class="sub-item">Fund with payment
												gateway (ATM)</span> </a>
									</li>


									<li>

										<a href="../dashboard/autobank.php"> <span class="sub-item">Automated Bank
												Transfer (N50 charge)</span> </a>
									</li>

									<li>
										<a href="../dashboard/coupon.php"> <span class="sub-item">Fund with
												coupon</span> </a>
									</li>

								</ul>
							</div>
						</li>


						<li class="nav-item">

							<a href="../dashboard/price.php">
								<i class="fas fa-money-bill"></i>
								<p>Pricing</p>
							</a>
						</li>




						<li class="nav-item">

							<a href="../dashboard/account.php">
								<i class="fas fa-user"></i>
								<p>Account</p>
							</a>
						</li>


						<li class="nav-item">

							<a href="../dashboard/change.php">
								<i class="fas fa-cog"></i>
								<p>Change Password</p>
							</a>
						</li>


						<li class="nav-item">

							<a href="../dashboard/setting.php">
								<i class="fas fa-cog"></i>
								<p>Setting</p>
							</a>
						</li>
						< <li class="nav-item">

							<a href="../dashboard/developer.php">
								<i class="fas fa-code"></i>
								<p>Developer's API</p>
							</a>
							</li>
							<li class="nav-item">
								<a href="../logout">
									<i class="fas fa-sign-out-alt"></i>
									<p>Logout</p>
								</a>
							</li>

							<li class="nav-item">
								<a href="../index.php">
									<i class="fas fa-logs"></i>
									<p>Developed By Adex</p>
								</a>
							</li>
					</ul>
				</div>
			</div>
		</div>
		<div class="main-panel ">


			<div class="container" style="margin:80px 20px 20px 30px; ">

				<?php
				$result = $con->query("SELECT * FROM terms order by id desc LIMIT 1") or die($con->error);
				//pre_r($result); 
				?>
				<div style="margin:20px;  word-wrap: break-word !important;">
					<?php
					while ($row = $result->fetch_assoc()) {
						echo $row['adex'];
					} ?>
				</div>
				<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
				<script
					src="https://cdn.jsdelivr.net/npm/gasparesganga-jquery-loading-overlay@2.1.7/dist/loadingoverlay.min.js"></script>




			</div>
		</div>
	</div>
	</div>



	<!--   Core JS Files   -->
	<script src="/static/dashboard/assets/js/core/jquery.3.2.1.min.js"></script>
	<script src="/static/dashboard/assets/js/core/popper.min.js"></script>
	<script src="/static/dashboard/assets/js/core/bootstrap.min.js"></script>

	<!-- jQuery UI -->
	<script src="/static/dashboard/assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
	<script src="/static/dashboard/assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>

	<!-- jQuery Scrollbar -->
	<script src="/static/dashboard/assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>

	<!-- Moment JS -->
	<script src="/static/dashboard/assets/js/plugin/moment/moment.min.js"></script>

	<!-- Chart JS -->
	<script src="/static/dashboard/assets/js/plugin/chart.js/chart.min.js"></script>

	<!-- jQuery Sparkline -->
	<script src="/static/dashboard/assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js"></script>

	<!-- Chart Circle -->
	<script src="/static/dashboard/assets/js/plugin/chart-circle/circles.min.js"></script>

	<!-- Datatables -->
	<script src="/static/dashboard/assets/js/plugin/datatables/datatables.min.js"></script>

	<!-- Bootstrap Notify -->
	<script src="/static/dashboard/assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js"></script>

	<!-- Bootstrap Toggle -->
	<script src="/static/dashboard/assets/js/plugin/bootstrap-toggle/bootstrap-toggle.min.js"></script>

	<!-- jQuery Vector Maps -->
	<script src="/static/dashboard/assets/js/plugin/jqvmap/jquery.vmap.min.js"></script>
	<script src="/static/dashboard/assets/js/plugin/jqvmap/maps/jquery.vmap.world.js"></script>

	<!-- Google Maps Plugin -->
	<script src="/static/dashboard/assets/js/plugin/gmaps/gmaps.js"></script>

	<!-- Dropzone -->
	<script src="/static/dashboard/assets/js/plugin/dropzone/dropzone.min.js"></script>

	<!-- Fullcalendar -->
	<script src="/static/dashboard/assets/js/plugin/fullcalendar/fullcalendar.min.js"></script>

	<!-- DateTimePicker -->
	<script src="/static/dashboard/assets/js/plugin/datepicker/bootstrap-datetimepicker.min.js"></script>

	<!-- Bootstrap Tagsinput -->
	<script src="/static/dashboard/assets/js/plugin/bootstrap-tagsinput/bootstrap-tagsinput.min.js"></script>

	<!-- Bootstrap Wizard -->
	<script src="/static/dashboard/assets/js/plugin/bootstrap-wizard/bootstrapwizard.js"></script>

	<!-- jQuery Validation -->
	<script src="/static/dashboard/assets/js/plugin/jquery.validate/jquery.validate.min.js"></script>

	<!-- Summernote -->
	<script src="/static/dashboard/assets/js/plugin/summernote/summernote-bs4.min.js"></script>

	<!-- Select2 -->
	<script src="/static/dashboard/assets/js/plugin/select2/select2.full.min.js"></script>

	<!-- Sweet Alert -->
	<script src="/static/dashboard/assets/js/plugin/sweetalert/sweetalert.min.js"></script>

	<!-- Owl Carousel -->
	<script src="/static/dashboard/assets/js/plugin/owl-carousel/owl.carousel.min.js"></script>

	<!-- Magnific Popup -->
	<script src="/static/dashboard/assets/js/plugin/jquery.magnific-popup/jquery.magnific-popup.min.js"></script>

	<!-- Atlantis JS -->
	<script src="/static/dashboard/assets/js/atlantis.min.js"></script>

	<!-- jquery validator -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
	<script
		src="https://cdn.jsdelivr.net/npm/gasparesganga-jquery-loading-overlay@2.1.7/dist/loadingoverlay.min.js"></script>
	</script>
	<?php require_once '../core/footer.php'; ?>
</body>

</html>