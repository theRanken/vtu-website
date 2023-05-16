<?php
session_start();
require_once "../core/conn.php";
$sql = mysqli_query($con, "SELECT * FROM  general order by id desc LIMIT 1");
if (mysqli_num_rows($sql) > 0) {
	$web = mysqli_fetch_assoc($sql);
}
if (isset($_SESSION['name'])) {
	$sql = mysqli_query($con, "SELECT * FROM user WHERE id = {$_SESSION['id']}");
	if (mysqli_num_rows($sql) > 0) {
		$row = mysqli_fetch_assoc($sql);
	}
	$type = $row['type'];
	$status = $row['kyc'];
	$msg = "";
	$das = "1";
	$chek = mysqli_query($con, "SELECT * FROM notif_lock");
	$adex = mysqli_fetch_array($chek);
	$update_adex = mysqli_query($con, "SELECT * FROM upgrade_user");
	$upgrade_user = mysqli_fetch_array($update_adex);
	$popup = $adex['popup'];
	include '../assets/account.php';
	include '../includes/header.php';
	$autofund = $row['autofund'];
	$bankname = $row['bankname'];
	$accountnumber = $row['accountnumber'];
	$rolexbank = $row['rolexbank'];
	$rolexnumber = $row['rolexnumber'];
?>
	<?php
	if ($monnify == '1') {
		if ($autofund != 'ACTIVE' || $bankname == " ") {
			require("../assets/monnify.php");
		}
	}
	?>
	<!-- End Sidebar -->
	<div class="main-panel ">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<script src="https://cdn.jsdelivr.net/npm/gasparesganga-jquery-loading-overlay@2.1.7/dist/loadingoverlay.min.js"></script>
		<style>
			#process,
			#process2,
			#output {
				display: none;
			}
			.swal-overlay {
				background-color: rgba(43, 165, 137, 0.45);
			}
			.swal-button {
				padding: 7px 19px;
				border-radius: 2px;
				background-color: #4962B3;
				font-size: 12px;
				border: 1px solid #3e549a;
				text-shadow: 0px -1px 0px rgba(0, 0, 0, 0.3);
			}
		</style>
		<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/gasparesganga-jquery-loading-overlay@2.1.7/dist/loadingoverlay.min.js"></script>
		<?php if ($popup == "on") { ?>
			<script>
				$(document).ready(function() {
					swal("Notifications", "<?php echo $adex['message']; ?>")
				});
			</script>
		<?php } ?>
		<div class="container">
			<div class="panel-header py-3 bubble-shadow" style="background-color: <?php echo $web['color']; ?>">
				<div class="page-inner py-5" style="background-color: <?php echo $web['color']; ?>">
					<div class="d-flex align-items-left align-items-md-center flex-column flex-md-row py-4" style="background-color: <?php echo $web['color']; ?>
">
						<div>
							<h2 class="text-white pb-2 fw-bold">Welcome to
								<?php echo $web['name']; ?>
							</h2>
							<!-----	<h5 class="text-white mb-2" style="font-size: 14px;">Refer people to <?php echo $web['name']; ?> and earn ₦<?php echo $web['referprice']; ?> immediately. 
</h5> ---->
							<!----<p class="mb-0 text-white" style="font-size: 13px;"> <b>Referal Link:</b>
						<span class="data-toggle=" id="mytext">https://<?php echo $_SERVER['HTTP_HOST'] ?>?ref=<?php echo $row['username']; ?></span>
						<span class="badge badge-dark" onclick="CopyToClipboard('mytext');"  style="cursor: pointer;">copy</span>
					</p>--->
						</div>
						</p>
						<div class="ml-md-auto py-2 py-md-0">
							<button type="button" class="btn btn-warning btn-round mr-2" data-toggle="modal" data-target="#fundWalletModal">
								Fund Wallet
							</button>
							<a href="/404/page-not-found-error/page/" class="btn btn-info btn-round text-white" style="visibility:hidden">.</a>
						</div>
					</div>
				</div>
			</div>
			<div class="page-inner mt--5">
				<div class="row mt--2">
					<div class="col-md-12">
						<div class="card full-height">
							<div class="card-body">
								<div class="card-title"><span id="greet"></span> <b>
										<?php echo $row['name']; ?>
									</b></div>
								<hr>
								<p class="text-center " style='font-size:20px;'><b> Package :
										<?php echo $accounttype; ?><b></p>
								<center></center>
								<marquee style="background-color: white; color:#d1026d; padding: 10px; font-size: 25px;;">
									We offer instant recharge of Airtime, Databundle, CableTV (DStv, GOtv &amp; Startimes),
									Electricity Bill Payment and Airtime to Cash. </marquee>
								<?php
								if ($monnify == "1") {
									if ($bankname == "" || $accountnumber == "") {
										echo '<div class="alert alert-default">
			<div> Dear ' . $row['name'] . ',<br/> We are working hard to make wallet funding easy for you. Our Tech Expert are working on how to give you dedicated Account Number to pay into for easy wallet funding with no cost charges.
			</div>
		</div>';
									} else {
										echo '
					<div class="mt-4">
						<ul class="nav nav-tabs" id="myTab" role="tablist">
							<li class="nav-item">
								<a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab"
									aria-controls="home" aria-selected="true">WEMA BANK</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab"
									aria-controls="profile" aria-selected="false">ROLEZ BANK</a>
							</li>
						</ul>
						<div class="tab-content" id="myTabContent">
							<div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
								<div class="card card-dark bg-secondary-gradient">
									<div class="card-body skew-shadow">
										<img src="https://upload.wikimedia.org/wikipedia/en/e/ef/Wema_Bank_Plc.jpg"
											height="60" alt="Visa Logo">
										<h2 class="py-4 mb-0">
											Account Number:' . $accountnumber . '
										</h2>
										<div class="row">
											<div class="col-8 pr-0">
												<h3 class="fw-bold mb-1">Account Name: ' . $web['name'] . ' - ' . $accountname . '
												</h3>
												<h3 class="fw-bold mb-1">Bank Name: ' . $bankname . '</h3>
												<br>
												<div class="text-small text-uppercase fw-bold op-8">Automated Bank
													Transfer</div>
												<p class="text-small ">Make transfer to this account to fund your wallet
												</p>
											</div>
											<div class="col-4 pl-0 text-right">
												<h3 class="fw-bold mb-1">50 Naria</h3>
												<div class="text-small text-uppercase fw-bold op-8">Charge</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
								<div class="card card-dark bg-primary-gradient">
									<div class="card-body skew-shadow">
										<img src="https://1000logos.net/wp-content/uploads/2017/05/Rolex-logo.png"
											height="60" alt="Rolex Logo">
										<h2 class="py-4 mb-0">
											Account Number:' . $rolexnumber . '
										</h2>
										<div class="row">
											<div class="col-8 pr-0">
												<h3 class="fw-bold mb-1">Account Name: ' . $web['name'] . ' - ' . $accountname . '
												</h3>
												<h3 class="fw-bold mb-1">Bank Name: ' . $rolexbank . '</h3>
												<br>
												<div class="text-small text-uppercase fw-bold op-8">Automated Bank
													Transfer</div>
												<p class="text-small ">Make transfer to this account to fund your wallet
												</p>
											</div>
											<div class="col-4 pl-0 text-right">
												<h3 class="fw-bold mb-1">50 Naria</h3>
												<div class="text-small text-uppercase fw-bold op-8">Charge</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>';
									}
								}
								?>
								<div class="row">
									<div class="col-6 col-lg-3">
										<div class="card p-3">
											<div class="d-flex align-items-center">
												<span class="stamp stamp-md bg-secondary mr-3">
													<i class="fas fa-history"></i>
												</span>
												<div>
													<h5 class="mb-1"><b><a href="transaction.php">Transactions</a></b></h5>
												</div>
											</div>
										</div>
									</div>
									<?php if ($type == 'SMART') {
									?>
										<div class="col-6 col-lg-3">
											<div class="card p-3">
												<div class="d-flex align-items-center">
													<span class="stamp stamp-md bg-success mr-3">
														<i class="fa fa-shopping-cart"></i>
													</span>
													<div>
														<h5 class="mb-1"><b><a href="javascript:void()" id="Affilliate" class="  " style="margin-bottom:5px;" data="<?php echo $row['id']; ?>"> <span id="process"><i class="fa fa-circle-o-notch fa-spin " style="font-size: 30px;animation-duration: 1s;"></i>
																		Upgrading Please wait </span> <span id="displaytext">Upgrade to Affilliate &#8358;
																		<? echo number_format($upgrade_user['reseller']); ?>
																	</span></a> <br>
															</b></h5>
													</div>
												</div>
											</div>
										</div>
										<div class="col-6 col-lg-3">
											<div class="card p-3">
												<div class="d-flex align-items-center">
													<span class="stamp stamp-md bg-danger mr-3">
														<i class="fa fa-users"></i>
													</span>
													<div>
														<h5 class="mb-1"><b><a href="javascript:void()" id="Topuser" class="  " style="margin-bottom:5px;"> <span id="process"><i class="fa fa-circle-o-notch fa-spin " style="font-size: 30px;animation-duration: 1s;"></i>
																		Upgrading Please wait </span> <span id="displaytext">Upgrade to Topuser &#8358;
																		<? echo number_format($upgrade_user['topup']); ?>
																	</span></a> <br>
															</b></h5>
													</div>
												</div>
											</div>
										</div>
									<?php
									} elseif ($type == 'AFFILIATE') {
									?>
										<div class="col-6 col-lg-3">
											<div class="card p-3">
												<div class="d-flex align-items-center">
													<span class="stamp stamp-md bg-danger mr-3">
														<i class="fa fa-users"></i>
													</span>
													<div>
														<h5 class="mb-1"><b><a href="javascript:void()" id="Topuser" class="  " style="margin-bottom:5px;"> <span id="process"><i class="fa fa-circle-o-notch fa-spin " style="font-size: 30px;animation-duration: 1s;"></i>
																		Upgrading Please wait </span> <span id="displaytext">Upgrade to Topuser &#8358;
																		<? echo number_format($upgrade_user['topup']); ?>
																	</span></a> <br>
															</b></h5>
													</div>
												</div>
											</div>
										</div>
									<?php
									}
									?>
								</div>
							</div>
						</div>
					</div>
				</div>
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
												<p class="card-category">Wallet Balance</p>
												<h4 class="card-title">&#8358;
													<?php echo number_format($row['bal'], 2); ?>
												</h4>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
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
												<p class="card-category">Referral Bonus</p>
												<h4 class="card-title">&#8358;
													<?php echo number_format($row['refbal']); ?>
												</h4>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
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
												<p class="card-category"> My Total Referral </p>
												<h4 class="card-title">
													<?php
													$username = $row['username'];
													$sql = "SELECT COUNT(*) AS total from user WHERE ref='$username'";
													$result = $con->query($sql);
													$data = $result->fetch_assoc();
													echo $data['total']; ?>
												</h4>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-4">
							<div class="card card-dark" style="background-color: <?php echo $web['color']; ?>">
								<div class="card-body bubble-shadow">
									<h3>Notifications</h3>
									<?php echo $web['notif']; ?>
								</div>
							</div>
						</div>
						<div class="col-md-4">
							<div class="card card-dark" style="background-color: <?php echo $web['color']; ?>">
								<div class="card-body bubble-shadow">
									<h3>Rate US:</h3>
									<h5 class="op-9">Please Rate our Service</h5>
									<a href="rate.php" class="btn btn-primary text-white">
										<i class="fas fa-star"></i> Rate US Now
									</a>
								</div>
							</div>
						</div>
						<div class="col-md-4">
							<div class="card card-dark" style="background-color: <?php echo $web['color']; ?>">
								<div class="card-body bubble-shadow">
									<h3>Support Team:</h3>
									<h5 class="op-9">Have anything to say to us? Please contact our Support Team on Whatsapp
									</h5>
									<a href="<?php echo $web['whatlink']; ?>" class="btn btn-success"> <i class="fab fa-whatsapp"></i> whatsapp us</a>
									<br>
									<br>
									<a href="<?php echo $web['whatgroup']; ?>" class="btn btn-success"> <i class="fab fa-whatsapp"></i> Join Our Whatsapp group</a>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-6 col-sm-4 col-lg-3">
							<a href="topup.php">
								<div class="card">
									<div class="card-body p-3 text-center">
										<span style="font-size: 30px;">
											<img src="../upload/airtime_top.svg" height="100px">
										</span>
										<div class="h4 m-2 text-dark">Airtime TopUp</div>
									</div>
								</div>
							</a>
						</div>
						<div class="col-6 col-sm-4 col-lg-3">
							<a href="buydata.php">
								<div class="card">
									<div class="card-body p-3 text-center">
										<span style="font-size: 30px;">
											<img src="../upload/data_buy.jpg" height="90px">
										</span>
										<div class="h4 m-2 text-dark">Buy Data</div>
									</div>
								</div>
							</a>
						</div>
						<div class="col-6 col-sm-4 col-lg-3">
							<a href="cash.php">
								<div class="card">
									<div class="card-body p-3 text-center">
										<span style="font-size: 30px;">
											<img src="../upload/airtime2cash.jpg" height="100px">
										</span>
										<div class="h4 m-2 text-dark">Airtime to cash</div>
									</div>
								</div>
							</a>
						</div>
						<div class="col-6 col-sm-4 col-lg-3">
							<a href="bill.php">
								<div class="card">
									<div class="card-body p-3 text-center">
										<span style="font-size: 30px;">
											<img src="../upload/utility.jpg" height="100px">
										</span>
										<div class="h4 m-2 text-dark">Electricity Bills</div>
									</div>
								</div>
							</a>
						</div>
						<div class="col-6 col-sm-4 col-lg-3">
							<a href="cable.php">
								<div class="card">
									<div class="card-body p-3 text-center">
										<span style="font-size: 30px;">
											<img src="../upload/cable_tv.jpg" height="90px">
										</span>
										<div class="h4 m-2 text-dark">Cable Subscription</div>
									</div>
								</div>
							</a>
						</div>
						<div class="col-6 col-sm-4 col-lg-3">
							<a href="bonous.php">
								<div class="card">
									<div class="card-body p-3 text-center">
										<span style="font-size: 10px;">
											<img src="../upload/bonuswallet.jpg" height="100px">
										</span>
										<div class="h4 m-2 text-dark">Bonus to wallet</div>
									</div>
								</div>
							</a>
						</div>
						<div class="col-6 col-sm-4 col-lg-3">
							<a href="bulk.php">
								<div class="card">
									<div class="card-body p-3 text-center">
										<span style="font-size: 30px;">
											<img src="../upload/bulk_sms.png" height="100px">
										</span>
										<div class="h4 m-2 text-dark">Bulk SMS</div>
									</div>
								</div>
							</a>
						</div>
						<div class="col-6 col-sm-4 col-lg-3">
							<a href="scratch_cards.php">
								<div class="card">
									<div class="card-body p-3 text-center">
										<span style="font-size: 30px;">
											<img src="../upload/resultchecker.png" height="100px">
										</span>
										<div class="h4 m-2 text-dark">Result Checker</div>
									</div>
								</div>
							</a>
						</div>
						<div class="col-6 col-sm-4 col-lg-3">
							<a href="print.php">
								<div class="card">
									<div class="card-body p-3 text-center">
										<span style="font-size: 30px;">
											<img src="../upload/printer.svg" height="100px">
										</span>
										<div class="h4 m-2 text-dark">Recharge Card Printing</div>
									</div>
								</div>
							</a>
						</div>
						<div class="col-6 col-sm-4 col-lg-3">
							<a href="transfer.php">
								<div class="card">
									<div class="card-body p-3 text-center">
										<span style="font-size: 30px;">
											<img src="../upload/transaction.png" height="100px">
										</span>
										<div class="h4 m-2 text-dark">Tranfer Cash</div>
									</div>
								</div>
							</a>
						</div>
						<!------<div class="col-6 col-sm-4 col-lg-3">
				<a href="loan.php">
					<div class="card">
						<div class="card-body p-3 text-center">
							<span style="font-size: 30px;">
								<img src="../upload/loan.png" height="100px">
							</span>
							<div class="h4 m-2 text-dark">Loan</div>
						</div>
					</div>
				</a>
			</div>
				<div class="col-6 col-sm-4 col-lg-3">
				<a href="booster.php">
					<div class="card">
						<div class="card-body p-3 text-center">
							<span style="font-size: 30px;">
								<img src="../upload/booster.png" height="100px">
							</span>
							<div class="h4 m-2 text-dark">Account Booster</div>
						</div>
					</div>
				</a>
			</div>----->
						<div class="col-6 col-sm-4 col-lg-3">
							<a href="refer.php">
								<div class="card">
									<div class="card-body p-3 text-center">
										<span style="font-size: 30px;">
											<img src="../upload/refer.png" height="80px">
										</span>
										<div class="h4 m-2 text-dark">My Referrals</div>
									</div>
								</div>
							</a>
						</div>
					</div>
				</div>
				<div class="row">
				</div>
			</div>
		</div>
		<!-- Modal STARTS HERER-->
		<div class="modal fade" id="fundWalletModal" tabindex="-1" role="dialog" aria-labelledby="fundWalletModalTitle" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h3 class="modal-title fw-bold" id="fundWalletModalTitle">Fund Wallet</h3>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<div class="row mb-3 mt-3">
							<?php if ($monnify == "1") { ?>
								<div class="col-sm-6 col-md-6 col-6">
									<a href="pay.php">
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
															<p class="card-category">ATM Funding (Monnify)</p>
														</div>
													</div>
												</div>
											</div>
										</div>
									</a>
								</div>
							<?php }; ?>
							<?php if ($flutter == "1") { ?>
								<div class="col-sm-6 col-md-6 col-6">
									<a href="spay.php">
										<div class="card card-stats card-round">
											<div class="card-body">
												<div class="row align-items-center">
													<div class="col-icon">
														<div class="icon-big text-center icon-info bubble-shadow-small">
															<i class="fas fa-credit-card"></i>
														</div>
													</div>
													<div class="col col-stats ml-3 ml-sm-0">
														<div class="numbers">
															<p class="card-category">ATM Funding (Flutterwave)</p>
														</div>
													</div>
												</div>
											</div>
										</div>
									</a>
								</div>
							<?php }; ?>
							<?php if ($bank == "1") { ?>
								<div class="col-sm-6 col-md-6 col-6">
									<a href="autobank.php">
										<div class="card card-stats card-round">
											<div class="card-body">
												<div class="row align-items-center">
													<div class="col-icon">
														<div class="icon-big text-center icon-secondary bubble-shadow-small">
															<i class="fas fa-bank"></i>
														</div>
													</div>
													<div class="col col-stats ml-3 ml-sm-0">
														<div class="numbers">
															<p class="card-category"> Automated Bank Funding (N50 charge) </p>
														</div>
													</div>
												</div>
											</div>
										</div>
									</a>
								</div>
							<?php }; ?>
							<div class="col-sm-6 col-md-6 col-6">
								<a href="coupon.php">
									<div class="card card-stats card-round">
										<div class="card-body">
											<div class="row align-items-center">
												<div class="col-icon">
													<div class="icon-big text-center icon-success bubble-shadow-small">
														<i class="fas fa-qrcode"></i>
													</div>
												</div>
												<div class="col col-stats ml-3 ml-sm-0">
													<div class="numbers">
														<p class="card-category">Coupon Fund</p>
													</div>
												</div>
											</div>
										</div>
									</div>
								</a>
							</div>
							<div class="col-sm-6 col-md-6 col-6">
								<a href="cash.php">
									<div class="card card-stats card-round">
										<div class="card-body">
											<div class="row align-items-center">
												<div class="col-icon">
													<div class="icon-big text-center icon-success bubble-shadow-small">
														<i class="fas fa-qrcode"></i>
													</div>
												</div>
												<div class="col col-stats ml-3 ml-sm-0">
													<div class="numbers">
														<p class="card-category">Airtime to cash/ Funding</p>
													</div>
												</div>
											</div>
										</div>
									</div>
								</a>
							</div>
							<?php if ($paystack == "1") { ?>
								<div class="col-sm-6 col-md-6 col-6">
									<a href="coupon.php">
										<div class="card card-stats card-round">
											<div class="card-body">
												<div class="row align-items-center">
													<div class="col-icon">
														<div class="icon-big text-center icon-success bubble-shadow-small">
															<i class="fas fa-qrcode"></i>
														</div>
													</div>
													<div class="col col-stats ml-3 ml-sm-0">
														<div class="numbers">
															<p class="card-category">Coupon Fund</p>
														</div>
													</div>
												</div>
											</div>
										</div>
									</a>
								</div>
							<?php }; ?>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-danger" data-dismiss="modal">cancel</button>
					</div>
				</div>
			</div>
		</div>
		<script>
			function CopyToClipboard(containerid) {
				if (document.selection) {
					var range = document.body.createTextRange();
					range.moveToElementText(document.getElementById(containerid));
					range.select().createTextRange();
					document.execCommand("copy");
				} else if (window.getSelection) {
					var range = document.createRange();
					range.selectNode(document.getElementById(containerid));
					window.getSelection().removeAllRanges(); // clear current selection
					window.getSelection().addRange(range); // to select text
					document.execCommand("copy");
					window.getSelection().removeAllRanges();
					alert("text copied")
				}
			}
		</script>
		<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
		<script>
			$("#Affilliate").click(function() {
				swal({
						title: "Dear <?php echo $row['name']; ?>,",
						text: "  kindly note that you will be charge <? echo number_format($upgrade_user['reseller']); ?> to upgrade to Affilliate Package Yes to continue  Cancel to go back",
						icon: "warning",
						buttons: true,
						dangerMode: true,
					})
					.then((willDelete) => {
						if (willDelete) {
							$.ajax({
								type: 'POST',
								beforeSend: function() {
									$.LoadingOverlay("show");
								},
								url: '../assets/affililate.php',
								data: 'data=' + <?php echo $row['id']; ?>,
								dataType: 'json',
								success: function(response) {
									swal({
											title: response.title,
											text: response.message,
											type: response.status
										})
										.then(function() {
											location.reload();
										});
								},
								complete: function() {
									$.LoadingOverlay("hide");
								}
							});
						} else {
							swal("You pressed Cancel!");
						}
					});
			});
			$("#Topuser").click(function() {
				var data = $('#Topuser').attr('data');
				swal({
						title: "Dear <?php echo $row['name']; ?>",
						text: " kindly note that you will be charge N<? echo number_format($upgrade_user['topup']); ?> to upgrade to Topuser Package Yes to continue  Cancel to go back",
						icon: "warning",
						buttons: true,
						dangerMode: true,
					})
					.then((willDelete) => {
						if (willDelete) {
							$.ajax({
								type: 'POST',
								beforeSend: function() {
									$.LoadingOverlay("show");
								},
								url: '../assets/topup.php',
								data: 'data=' + <?php echo $row['id']; ?>,
								dataType: 'json',
								success: function(response) {
									// $("#name").css("display", "block");
									//$("#name").text(data.name);
									swal({
											title: response.title,
											text: response.message,
											type: response.status
										})
										.then(function() {
											location.reload();
										});
								},
								complete: function() {
									$.LoadingOverlay("hide");
								}
							});
						} else {
							swal("You pressed Cancel!");
						}
					});
			});
		</script>
		<script>
			$("#calculate").click(function() {
				var from_date = $("#datepicker").val();
				var to_date = $("#datepicker").val();
				var services = $("#basic").val;
				console.log("hello buddy");
				console.log(from_date);
			});
		</script>
	</div>
	</div>
	</div>
	<!--   Core JS Files   -->
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
	<?php require_once '../includes/footer.php'; ?>
	<!-- GetButton.io widget -->
	</body>
	</html>
<?php
} else {
	echo "<script>document.location.href='../logout'; </script>";
	exit;
}
?>
</html>