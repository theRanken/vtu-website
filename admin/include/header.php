<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>AIMACONNECT - Admin Dashboard</title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<link rel="icon" href="/upload/<?php echo $web['image']; ?>" type="image/x-icon"/>
	<!-- Fonts and icons -->
	<script src="assets/js/plugin/webfont/webfont.min.js"></script>
	<script>
		WebFont.load({
			google: {"families":["Lato:300,400,700,900"]},
			custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"], urls: ['assets/css/fonts.min.css']},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
	</script>

	<!-- CSS Files -->
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/atlantis.min.css">

	<!-- CSS Just for demo purpose, don't include it in your project -->
	
</head>
<body>
	<div class="wrapper">
		<div class="main-header">
			<!-- Logo Header -->
			<div class="logo-header" data-background-color="blue">
				
				<a href="index.php"  class="logo" style="color: white;font-size: 19px;font-weight: bold;margin-right: -70px;">
		         
                            <?php echo $row['username']; ?>
                            
				</a>
				<button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
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
			<nav class="navbar navbar-header navbar-expand-lg" data-background-color="blue2">
				
				<div class="container-fluid">
					<div class="collapse" id="search-nav">
						<form class="navbar-left navbar-form nav-search mr-md-3">
							<div class="input-group">
								<div class="input-group-prepend">
									<button type="submit" class="btn btn-search pr-1">
										<i class="fa fa-search search-icon"></i>
									</button>
								</div>
								<input type="text" placeholder="Search ..." class="form-control">
							</div>
						</form>
					</div>
					<ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
						<li class="nav-item toggle-nav-search hidden-caret">
							<a class="nav-link" data-toggle="collapse" href="#search-nav" role="button" aria-expanded="false" aria-controls="search-nav">
								<i class="fa fa-search"></i>
							</a>
						</li>
						<!----  Notification ------->
						<?php
							     $sql = "SELECT COUNT(*) AS total from airtime WHERE status='0'";
										$resultd = $con->query($sql);
											$datad =  $resultd->fetch_assoc();
								    $nof=$datad['total']; 
								    
								    
								     $bank = "SELECT COUNT(*) AS total from bankpayment WHERE status='0'";
										$bank_payment = $con->query($bank);
											$pay =  $bank_payment->fetch_assoc();
								    $payment=$pay['total']; 
								    
								    $total= $nof + $payment;
							    ?>
						<li class="nav-item dropdown hidden-caret">
							<a class="nav-link dropdown-toggle" href="#" id="notifDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i class="fa fa-bell"></i>
								<span class="notification"><? echo $total; ?></span>
							</a>
							<ul class="dropdown-menu notif-box animated fadeIn" aria-labelledby="notifDropdown">
							
								<li>
									<div class="dropdown-title">You have <? echo $total; ?> new notification</div>
								</li>
								<li>
								    <?php

										$query = "SELECT * FROM airtime  WHERE status='0' ORDER BY id DESC LIMIT 5 ";
										$result = mysqli_query($con, $query);
										$nu = 1;
										$msg = "";
										if (mysqli_num_rows($result) == 0) {
											$msg = "No Message yet";
										}
										?>
								         	<div class="notif-scroll scrollbar-outer">
								         	    	<div class="notif-content">
									    			<span class="block"> 
									    			<? echo $msg; ?> </span>
									    			</div>
									    <?php
										while ($use = mysqli_fetch_array($result)) {
											$id = $use['id'];
											$adex_username = $use['username'];
											$adex_date = $use['date'];
											$adex_amount = $use['amount'];
											$network =$use['network'];

                                            $bank = "SELECT * FROM  bankpayment WHERE status='0' ORDER BY id DESC LIMIT 5 ";
										$bank_payment = mysqli_query($con, $bank);
										while ($elijah = mysqli_fetch_array($bank_payment)){
											$id = $elijah['id'];
											$username = $elijah['username'];
											$amount = $elijah['amount'];
											$date = $elijah['date'];
										?>
										<div class="notif-center">
											<a href="message.php">
												<div class="notif-img"> 
													<img src="/upload/adex_me.png" alt="Img Profile">
												</div>
												
												<div class="notif-content">
													<span class="block">
													 <?= $adex_username; ?> sent <?= $network, ' '. number_format($adex_amount, 2);?> airtime to you
													</span>
													<span class="time">on <?= $adex_date; ?></span> 
												</div>
											</a>
										</div>
										
											<div class="notif-center">
											<a href="pen_bank.php">
												<div class="notif-img"> 
													<img src="/upload/adex_me.png" alt="Img Profile">
												</div>
												
												<div class="notif-content">
													<span class="block">
													 <?= $username; ?> sent <?= number_format($amount, 2);?> Bank Transfer to you
													</span>
													<span class="time">on <?= $date; ?></span> 
												</div>
											</a>
									
										</div>
										<?php
										}
										}
										?>
									</div>
								</li>
							</ul>
						</li>
						<!------ Close notification ------>
						
						<li class="nav-item dropdown hidden-caret">
							<a class="nav-link" data-toggle="dropdown" href="#" aria-expanded="false">
								<i class="fas fa-layer-group"></i>
							</a>
							<div class="dropdown-menu quick-actions quick-actions-info animated fadeIn">
								<div class="quick-actions-header">
									<span class="title mb-1">Quick Actions</span>
									<span class="subtitle op-8">Shortcuts</span>
								</div>
								<div class="quick-actions-scroll scrollbar-outer">
									<div class="quick-actions-items">
										<div class="row m-0">
											<a class="col-6 col-md-4 p-0" href="fail.php">
												<div class="quick-actions-item">
													<i class="flaticon-file-1"></i>
													<span class="text">Fail Transaction</span>
												</div>
											</a>
											<a class="col-6 col-md-4 p-0" href="success.php">
												<div class="quick-actions-item">
													<i class="flaticon-database"></i>
												<span class="text">Successful Transaction</span>
												</div>
											</a>
											<a class="col-6 col-md-4 p-0" href="pen_tes.php">
												<div class="quick-actions-item">
													<i class="flaticon-pen"></i>
													<span class="text">Pending Rate</span>
												</div>
											</a>
											<a class="col-6 col-md-4 p-0" href="all_tes.php">
												<div class="quick-actions-item">
													<i class="flaticon-interface-1"></i>
													<span class="text">Successful Rate</span>
												</div>
											</a>
											<a class="col-6 col-md-4 p-0" href="loan_pending.php">
												<div class="quick-actions-item">
													<i class="flaticon-list"></i>
													<span class="text">Loan Activities</span>
												</div>
											</a>
											<a class="col-6 col-md-4 p-0" href="upgrade.php">
												<div class="quick-actions-item">
													<i class="flaticon-file"></i>
													<span class="text">Upgrade User Account</span>
												</div>
											</a>
										</div>
									</div>
								</div>
							</div>
						</li>
						<li class="nav-item dropdown hidden-caret">
							<a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false">
								<div class="avatar-sm">
									<img src="/upload/adex_me.png" alt="..." class="avatar-img rounded-circle">
								</div>
							</a>
							<ul class="dropdown-menu dropdown-user animated fadeIn">
								<div class="dropdown-user-scroll scrollbar-outer">
									<li>
										<div class="user-box">
											<div class="avatar-lg"><img src="/upload/adex_me.png" alt="image profile" class="avatar-img rounded"></div>
											<div class="u-text">
												<h4><?php echo $row['username']; ?></h4>
											</div>
										</div>
									</li>
									<li>
										<div class="dropdown-divider"></div>
										<div class="dropdown-divider"></div>
										<a class="dropdown-item" href="/logout">Logout</a>
									</li>
								</div>
							</ul>
						</li>
					</ul>
				</div>
			</nav>
			<!-- End Navbar -->
			</div>