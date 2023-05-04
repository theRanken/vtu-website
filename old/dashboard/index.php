<?php 
session_start();
require_once "../core/conn.php";
if(isset( $_SESSION['name'])) {
$sql = mysqli_query($con, "SELECT * FROM user WHERE id = {$_SESSION['id']}");
            if 
            (mysqli_num_rows($sql) > 0){
              $row = mysqli_fetch_assoc($sql);
            }

$status= $row['kyc'];
$msg="";

 	$wallet = mysqli_query($con, "SELECT * FROM wallet WHERE customer_id = {$_SESSION['id']}");
            if 
            (mysqli_num_rows($wallet) > 0){
              $wallet_bal = mysqli_fetch_assoc($wallet);
            }
            
            else{
               $wallet_bal = "0"; 
            }
            
           if($_GET['wallet']){
               $wallet_msg = $_GET['wallet'];
           }else{
            $wallet_msg = '';
           }
           ?>

<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<head>
	<meta name="theme-color" content="#5230b0">
	<meta charset="utf-8" />
    <title>Dashboard- <?php echo $web['name']; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="referrer" content="no-referrer-when-downgrade">
	
    
	
	

    <link rel="manifest" href="../static/styling/img/site.html">
	<link rel="manifest" href="../static/img/manifest.json">
	<meta name="msapplication-TileColor" content="#ffffff">
	<meta name="msapplication-TileImage" content="../static/img/ms-icon-144x144.html">
	<meta name="theme-color" content="#ffffff">

    <meta content="data- Buy Airtime and Data for all Network. Make payment for DSTV, GOTV, PHCN other services" name="descriptison">

    <meta itemprop="name" content="data- Buy Airtime and Data for all Network. Make payment for DSTV, GOTV, PHCN other services">
    <meta itemprop="description" content="Buy Cheap Internet Data Plan and Airtime Recharge for Airtel, 9mobile, GLO, MTN, Pay DSTV, GOTV, PHCN.">
    <meta itemprop="image" content="../static/styling/images/bg.html">
    <link rel="stylesheet" href="../static/ogbam/w3.css">

    <!-- Twitter Card data -->
    <meta name="twitter:card" content="../static/styling/images/bg.html">
    <meta name="twitter:title" content="<?php echo $web['name']; ?>- Buy Airtime and Data for all Network. Make payment for DSTV, GOTV, PHCN other services">
    <meta name="twitter:description" content="<?php echo $web['name']; ?> Buy Cheap Internet Data Plan and Airtime Recharge for Airtel, 9mobile, GLO, MTN, Pay DSTV, GOTV, PHCN.">
    <meta name="twitter:image:src" content="../static/styling/images/bg.html">

    <!-- Open Graph data -->
    <meta property="og:locale" content="en_US">
    <meta property="og:title" content="<?php echo $web['name']; ?> - Buy Airtime and Data for all Network. Make payment for DSTV, GOTV, PHCN other services">
    <meta property="og:image" content="../static/styling/images/bg.html">
    <meta property="og:description" content="<?php echo $web['name']; ?> Buy Cheap Internet Data Plan and Airtime Recharge for Airtel, 9mobile, GLO, MTN, Pay DSTV, GOTV, PHCN."/>
    <meta property="og:site_name" content="<?php echo $web['name']; ?>"/>
    <meta property="og:url" content="../index.html">
    <meta property="og:type" content="website">

	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<link rel="icon" href="../static/dashboard/assets/img/icon.html" type="image/x-icon"/>
     
	<!-- Fonts and icons -->
	<script src="../static/dashboard/assets/js/plugin/webfont/webfont.min.js"></script>
	<link rel="stylesheet" href="../static/dashboard/assets/css/fonts.min.css" media="all">
	<!-- toast -->
    <script src="../../cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
	<link rel="stylesheet" href="../../cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" media="all">
	
	<script src="../../unpkg.com/sweetalert%402.1.2/dist/sweetalert.min.js"></script>
	
	
	<script>
		WebFont.load({
			google: {"families":["Lato:300,400,700,900"]},
			custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"], urls: ['/static/dashboard/assets/css/fonts.min.css']},
			active: function() {
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
  color:white;
  border: 1px solid #3e549a;
  text-shadow: 0px -1px 0px rgba(0, 0, 0, 0.3);
}
</style>


	<!-- Popup notifications -->
	<script src="../../ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
	
	<!-- CSS Files -->
	<link rel="stylesheet" href="../static/dashboard/assets/css/w3.css">
	<link rel="stylesheet" href="../static/dashboard/assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="../static/dashboard/assets/css/atlantis.css">
	
	
	
	
</head>

<body data-background-color="bg3" onload="greet(); alertinfo()">
	<div class="wrapper">
		<div class="main-header">
			<!-- Logo Header -->
			<div class="logo-header bg-secondary-gradient ">
				<a href="#" class="logo" style="color: white;font-size: 19px;font-weight: bold;margin-right: -70px;"><?php echo $row['username']?></a>
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
			<nav class="navbar navbar-header navbar-expand-lg bg-secondary-gradient"  >
				
				<div class="container-fluid">
					
					
						

					<ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
						<li class="nav-item toggle-nav-search hidden-caret">
							<a class="nav-link" data-toggle="collapse" href="#search-nav" role="button" aria-expanded="false" aria-controls="search-nav">
								<i class="fa fa-search"></i>
							</a>
						</li>
						
						
						<li class="nav-item dropdown hidden-caret">
							<a class="nav-link"  href="../logout/">
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
								<img src="../static/dashboard/assets/img/avatar.png" alt="..." class="avatar-img rounded-circle">
							</div>
							<div class="info">
								<a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
									<span>
										<?php echo $row['name']; ?>
										<span class="user-level">balance: &#8358; <?php echo $wallet_bal['balance'];?>.00</span>
									</span>
								</a>
								<div class="clearfix"></div>
							</div>
						</div>
						<ul class="nav nav-primary">
							
								<li class="nav-item active">
							
									<a href="index.php">
										<i class="fas fa-home"></i> <p>Dashboard</p>
									</a>
								</li>
							
								<li class="nav-item">
							
									<a href="buydata.php">
										<i class="fas fa-signal"></i> <p>Buy Data</p>
									</a>
								</li>
							
								<li class="nav-item">
							
									<a href="buyairtime.php">
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
											<a href="bill.php"> <span class="sub-item">Bill Payment</span> </a>
										</li>
										<li>
											<a href="cable.php"> <span class="sub-item">Cable Subscription</span> </a>
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
											<a href="pay.php"> <span class="sub-item">Fund with Paystack (ATM)</span> </a>
										</li>
										
										
										
										<li>
											<a href="spay.php"> <span class="sub-item">Fund with payment gateway (ATM)</span> </a>
										</li>
										
										
										<li>

											<a href="autobank.php"> <span class="sub-item">Automated Bank Transfer (N50 charge)</span> </a>
										</li>
										
										<li>
											<a href="coupon.php"> <span class="sub-item">Fund with coupon</span> </a>
										</li>
										
									</ul>
								</div>
							</li>
					
							
								<li class="nav-item">
							
								<a href="price.php">
									<i class="fas fa-money-bill"></i>
									<p>Pricing</p>
								</a>
							</li>
							
							

							
								<li class="nav-item">
							
								<a href="account.php">
									<i class="fas fa-user"></i>
									<p>Account</p>
								</a>
							</li>

							
								<li class="nav-item">
							
								<a href="change.php">
									<i class="fas fa-cog"></i>
									<p>Change Password</p>
								</a>
							</li>

							
								<li class="nav-item">
							
								<a href="setting.php">
									<i class="fas fa-cog"></i>
									<p>Setting</p>
								</a>
							</li>
							<!-- 
								<li class="nav-item">
							
								<a href="/documentation/">
									<i class="fas fa-code"></i>
									<p>Developer's API</p>
								</a>
							</li> -->
							<li class="nav-item">
								<a href="../logout">
									<i class="fas fa-sign-out-alt"></i>
									<p>Logout</p>
								</a>
							</li>

							<li class="nav-item">
								<a href="../index.php">
									<i class="fas fa-logs"></i>
									<p>Developed</p>
								</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
		<!-- End Sidebar -->
		<div class="main-panel ">

				
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://cdn.jsdelivr.net/npm/gasparesganga-jquery-loading-overlay@2.1.7/dist/loadingoverlay.min.js"></script>

<style>
      #process, #process2,#output{
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



<script>

    function alertinfo() {


       var datav = localStorage.getItem("4");
       count = 1

        if(typeof(Storage) !== "undefined") {

    if (datav) {
        datav = Number(datav) + 1;
      localStorage.setItem("4", datav);
    }

    else {
        localStorage.setItem("4", count);
    }

var datav = localStorage.getItem("4");
 console.log(datav);
 console.log(datav);
   if (datav <= 5){
	   swal("Notifications", "We offer instant recharge of Airtime, Databundle, CableTV (DStv, GOtv &amp; Startimes), Electricity Bill Payment and Airtime to Cash.")
    //alert("We offer instant recharge of Airtime, Databundle, CableTV (DStv, GOtv &amp; Startimes), Electricity Bill Payment and Airtime to Cash.");
   }

  } else {
    document.getElementById("result").innerHTML = "Sorry, your browser does not support web storage...";
  }
    }




</script>
<script>

 function greet() {

  var greeting;
  var time = new Date().getHours();
  if (time < 10) {
    greeting = "Good morning,";
  } else if (time < 20) {
    greeting = "Good day,";
  } else {
    greeting = "Good evening,";
  }
  document.getElementById("greet").innerHTML = greeting;
}


    </script>
<div class="container">



	<div class="panel-header bg-secondary-gradient  py-3 bubble-shadow" style="">
		<div class="page-inner py-5">
			<div class="d-flex align-items-left align-items-md-center flex-column flex-md-row py-4">
				<div>
<p style="color: yellow;font-size: 19px;font-weight: bold;margin-right: -70px;"><?php echo $wallet_msg; ?></p>
<h2 class="text-white pb-2 fw-bold">Welcome to <?php echo $web['name'];?></h2>
					<h5 class="text-white mb-2" style="font-size: 14px;">Refer people to <?php echo $web['name'];?> and earn ₦500 immediately the person Make his/her first transaction 
</h5>
					<p class="mb-0 text-white" style="font-size: 13px;"> <b>Referal Link:</b>
						<span class="data-toggle=" id="mytext"><?php echo $web['web']?>?ref=<?php echo $row['username'];?></span>
						<span class="badge badge-dark" onclick="CopyToClipboard('mytext');"  style="cursor: pointer;">copy</span>

					</p>
				</div>
				</p>
				</div>
				<div class="ml-md-auto py-2 py-md-0">
					<button type="button" class="btn btn-warning btn-round mr-2" data-toggle="modal" data-target="#fundWalletModal">
						Fund Wallet
					</button>
					

						<a href= "/404/page-not-found-error/page/" class="btn btn-info btn-round text-white" style="visibility:hidden">.</a>

				</div>
			</div>
		</div>
	</div>
	<div class="page-inner mt--5">

		
		<div class="row mt--2">
			<div class="col-md-12">

				<div class="card full-height">
					<div class="card-body">
						<div class="card-title"><span id="greet"></span> <b><?php echo $row['name'];?></b></div> <hr>
						 <p class="text-center " style='font-size:20px;'><b> Package :    Smart Earner <b></p>
					 <center>
                                  
								<span style='font-size:20px;font-weight: bolder;'>Account status:</span> <?php if ($status == 0) { ?> 
						 Your Account is no yet verified , You won't be able to some of our features  <a href="kyc.php">Click here</a> to verify it <?php } else { ?>
							   Your Account has been verified <?php } ?>

							   
						 
							 
							 </center> 
							 <br><br>
						  <a class="btn btn-primary" data-toggle="collapse" href="#multiCollapseExample1" role="button" aria-expanded="false" aria-controls="multiCollapseExample1" style="margin-bottom:5px;">FAQ regards Affilliate package. </a>
  <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#multiCollapseExample2" aria-expanded="false" aria-controls="multiCollapseExample2"  style="margin-bottom:5px;">FAQ regards Topuser package. </button>
   <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#multiCollapseExample3" aria-expanded="false" aria-controls="multiCollapseExample3"  style="margin-bottom:5px;">FAQ regards API users. </button>


<div class="container">

    <div class="collapse multi-collapse" id="multiCollapseExample1">
      <div class="card card-body">
     <p>When you upgrade you can buy MTN 1GB at 305 2GB at 610 E.t.c</p>
<br>
<p>MTN VTU 4% discount off.</p>
<p>MTN share and sell 7% discount off.</p>
<p>Glo VTU at 5% discount off.</p>
<p>Airtel 3% discount off.</p>
<p>9mobile 3% discount.</p>
<p>Note, other network data plans has also been adjusted</p>
<p>Lower if you upgrade you see it.&nbsp;</p>
<p>Kindly take action to upgrade or ignore.</p>
<p>Our support Team may not explain more on this when you chat us, as necessary information has been shared via FAQ</p>
<p><br></p>
<p>Note: This is one time payment no any subsequent payment involved</p></div>
    </div>



    <div class="collapse multi-collapse" id="multiCollapseExample3">
      <div class="card card-body">


<p>The <?php echo $web['name'];?> API is a RESTful API that allows you to integrate bills payment services available on the <?php echo $web['name']; ?> platform on your application.</p>
<p>Services available on the <?php echo $web['web'];?> API include:</p>
<p>&nbsp;</p>
<p><strong>Airtime VTU</strong></p>
<p>MTN VTU Airtime</p>
<p>Airtel VTU Airtime</p>
<p>Glo VTU Airtime</p>
<p>9mobile VTU Airtime</p>
<p>&nbsp;</p>
<p><strong>Data</strong></p>
<p>MTN Data Bundle</p>
<p>Airtel Data Bundle</p>
<p>Glo Data Bundle</p>
<p>9mobile Data Bundle</p>
<p>&nbsp;</p>
<p><strong>Electricity Payment</strong></p>
<p>Abuja Electricity Distribution Company (AEDC) – Prepaid &amp; Postpaid</p>
<p>Port Harcourt Electricity Distribution Company (PHED) – Prepaid &amp; Postpaid</p>
<p>Ikeja Electricity Distribution Company (IKEDC) – Prepaid &amp; Postpaid</p>
<p>Eko Electricity Distribution Company (EKEDC) – Prepaid &amp; Postpaid</p>
<p>Jos Electricity Distribution PLC (JEDplc) – Prepaid &amp; Postpaid</p>
<p>Kano Electricity Distribution Company (KEDCO) – Prepaid &amp; Postpaid</p>
<p>&nbsp;</p>
<p><strong>TV Subscription</strong></p>
<p>DSTV subscription payment</p>
<p>GOTV Subscription Payment</p>
<p>Startimes Subscription Payment</p>
<p>&nbsp;</p>
<p><strong>Education Payment</strong></p>
<p>WAEC Registration PINs</p>
<p>NECO Result checker PINs</p>
<p>&nbsp;</p>

<p><strong>Recharge Card printing</strong></p>
<p>MTN </p>
<p>Airtel </p>
<p>Glo </p>
<p>9mobile </p>
<p>&nbsp;</p>

<p>  contact admin to upgrade to api user </p>

	    </div>
    </div>



    <div class="collapse multi-collapse" id="multiCollapseExample2">
      <div class="card card-body">
      <p>When you upgrade you can buy MTN 1GB at 295 2GB at 590 E.t.c</p>
<p>MTN VTU 4% discount off.</p>
<p>MTN share and sell 7% discount off.</p>
<p>Glo VTU at 5% discount off.</p>
<p>Airtel 3% discount off.</p>
<p>9mobile 3% discount.</p>
<p>Note, other network data plans has also been adjusted</p>
<p>Lower if you upgrade you see it. Click here&nbsp;</p>
<p>Kindly take action to upgrade or ignore.</p>
<p>Our support Team may not explain more on this when you chat us, as necessary information has been shared via FAQ</p>
<p><br></p>
<p>Note: This is one time payment no any subsequent payment involved</p> </div>
    </div>
  </div>
</div>

    


    
<marquee style="background-color: white; color:#d1026d; padding: 10px; font-size: 25px;;">  We offer instant recharge of Airtime, Databundle, CableTV (DStv, GOtv &amp; Startimes), Electricity Bill Payment and Airtime to Cash. </marquee>



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

						<div class="col-6 col-lg-3">
							<div class="card p-3">
								<div class="d-flex align-items-center">
									<span class="stamp stamp-md bg-warning mr-3">
										<i class="fas fa-history"></i>
									</span>
									<div>
										<h5 class="mb-1"><b><a href="wallet.php"> Wallet summary</a></b></h5>

									</div>
								</div>
							</div>
						</div>

					
						   
						<div class="col-6 col-lg-3">
							<div class="card p-3">
								<div class="d-flex align-items-center">
									<span class="stamp stamp-md bg-success mr-3">
										<i class="fa fa-shopping-cart"></i>
									</span>
									<div>
										<h5 class="mb-1"><b><a href="javascript:void()" id = "Affilliate" class="  " style= "margin-bottom:5px;">  <span id="process"><i class="fa fa-circle-o-notch fa-spin " style="font-size: 30px;animation-duration: 1s;"></i> Upgrading Please wait </span>  <span id ="displaytext">Upgrade to Affilliate &#8358;1,000 </span></a> <br>
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
											<h5 class="mb-1"><b><a href="javascript:void()" id = "Topuser" class="  " style= "margin-bottom:5px;">  <span id="process"><i class="fa fa-circle-o-notch fa-spin " style="font-size: 30px;animation-duration: 1s;"></i> Upgrading Please wait </span>  <span id ="displaytext">Upgrade to Topuser &#8358;2,000 </span></a> <br>
           </b></h5>
									</div>
								</div>
							</div>
						</div>

						 


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
									<h4 class="card-title">&#8358; <?php echo $wallet_bal['balance'];?></h4>
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
									<h4 class="card-title">&#8358; <?php echo $row['refbal'];?></h4>
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
									<h4 class="card-title"><?php $sql = "SELECT COUNT(*) AS total from referral WHERE userid={$_SESSION['id']}";
                                               $result = $con->query($sql);
                                                   $data =  $result->fetch_assoc();
                                                     echo $data['total'];?></h4>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			
		</div>


		<div class="row">
			<div class="col-md-4">
				<div class="card card-dark bg-info-gradient">
					<div class="card-body bubble-shadow">
						<h3>Notifications</h3>
                       <?php echo $web['notif']; ?>
					 
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="card card-dark bg-info-gradient">
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
				<div class="card card-dark bg-info-gradient">
					<div class="card-body bubble-shadow">
						<h3>Support Team:</h3>
						<h5 class="op-9">Have anything to say to us? Please contact our Support Team on Whatsapp </h5>

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
				    	
		<div class="col-sm-6 col-md-6 col-6">
			<a href="pay.php">	<div class="card card-stats card-round">
					<div class="card-body ">
						<div class="row align-items-center">
							<div class="col-icon">
								<div class="icon-big text-center icon-primary bubble-shadow-small">
									<i class="fas fa-wallet"></i>
								</div>
							</div>
							<div class="col col-stats ml-3 ml-sm-0">
								<div class="numbers">
									<p class="card-category">ATM Funding (Paystack)</p>

								</div>
							</div>
						</div>
					</div>
				</div>
				</a>
			</div>
			
				
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
			
				
			<div class="col-sm-6 col-md-6 col-6">
			<a href="autobank.php">	<div class="card card-stats card-round">
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
  title: "Dear <?php echo $row['name'];?> this package is comming soon!",
  text: "  kindly note that you will be charge N1,000 to upgrade to Affilliate Package Yes to continue  Cancel to go back",
  icon: "warning",
  buttons: true,
  dangerMode: true,
})
.then((willDelete) => {
  if (willDelete) {
    $.ajax({
       type:'GET',
       beforeSend: function(){

         $.LoadingOverlay("show");

            },
       url: '/ajax/Affilliate/',
       data: {
         'btn': "send",

       },
       dataType: 'json',
       success: function (data) {
          // $("#name").css("display", "block");
           //$("#name").text(data.name);
           alert(data.message);

       },
       complete: function(){
       $.LoadingOverlay("hide");
         location.reload();

  }
     });
  } else {
    swal("You pressed Cancel!");
  }



   });

   });



   $("#Topuser").click(function() {

	   swal({
  title: "Dear <?php echo $row['name'];?> This package is coming soon!",
  text: " kindly note that you will be charge N2,000 to upgrade to Topuser Package Yes to continue  Cancel to go back",
  icon: "warning",
  buttons: true,
  dangerMode: true,
})
.then((willDelete) => {
  if (willDelete) {
    $.ajax({
       type:'GET',
       beforeSend: function(){
         $.LoadingOverlay("show");
            },
       url: '/ajax/Topuser/',
       data: {
         'btn': "send",

       },
       dataType: 'json',
       success: function (data) {
          // $("#name").css("display", "block");
           //$("#name").text(data.name);
           alert(data.message);

       },
       complete: function(){
         $.LoadingOverlay("hide");
         location.reload();

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
console.log( from_date );


	  
   });

</script>




<script>
  
    $(function(){

        $('#salesCheckForm').on('submit', function(e){
            e.preventDefault();

            $.ajax({
                method: 'POST',
                url: '/ajax/sales/account/',
                data: new FormData(this),
                processData: false,
                contentType: false,
                beforeSend: function(){
                    $.LoadingOverlay("show");
                },
                complete: function(){
                    $.LoadingOverlay("hide");
                },
                success: function(data){
                    $.LoadingOverlay("hide");
                    $('#successModal').modal()

                    console.log(data);
                    // data
                    $('#mtn_dataSold_total').text("₦" + data['mtn_dataSold_total'] + "GB )")
                    $('#airtel_dataSold_total').text("₦" + data['airtel_dataSold_total']+ "GB )")
                    $('#glo_dataSold_total').text("₦" + data['glo_dataSold_total']+ "GB )")
                    $('#eti_dataSold_total').text("₦" + data['eti_dataSold_total']+ "GB )")
                    // airitme
                    $('#mtn_airtimeSold_total').text("₦" + data['mtn_airtimeSold_total'])
                    $('#airtel_airtimeSold_total').text("₦" + data['airtel_airtimeSold_total'])
                    $('#glo_airtimeSold_total').text("₦" + data['glo_airtimeSold_total'])
                    $('#eti_airtimeSold_total').text("₦" + data['eti_airtimeSold_total'])
                    // others
                    $('#total_bank_payments').text("₦" + data['total_bank_payments'])
                    $('#total_atm_payments').text("₦" + data['total_atm_payments'])
                    $('#total_coupon_payments').text("₦" + data['total_coupon_payments'])

					$('#rcard').text("₦" + data['recharge_card'])
					$('#result').text("₦" + data['result_checker'])
					$('#bill').text("₦" + data['bill_payment'])
					$('#cable').text("₦" + data['Cable_payment'])
					$('#smile').text("₦" + data['smile_dataSold_total'])
					$('#credit').text("₦" + data['credit'])
					$('#debit').text("₦" + data['debit'])

					console.log(data["cable_list"])
				

multipleLineChart = document.getElementById('multipleLineChart').getContext('2d');
var myMultipleLineChart = new Chart(multipleLineChart, {
			type: 'line',
			data: {
				labels: ["MTN","GLO","AIRTEL","9MOBILE","SMILE"],
				datasets: [{
					label: "Pending Orders",
					borderColor: "#1d7af3",
					pointBorderColor: "#FFF",
					pointBackgroundColor: "#1d7af3",
					pointBorderWidth: 2,
					pointHoverRadius: 4,
					pointHoverBorderWidth: 1,
					pointRadius: 4,
					backgroundColor: 'transparent',
					fill: true,
					borderWidth: 2,
					data: data["data_list2"]
				},{
					label: "Successful Orders",
					borderColor: "#59d05d",
					pointBorderColor: "#FFF",
					pointBackgroundColor: "#59d05d",
					pointBorderWidth: 2,
					pointHoverRadius: 4,
					pointHoverBorderWidth: 1,
					pointRadius: 4,
					backgroundColor: 'transparent',
					fill: true,
					borderWidth: 2,
					data: data["data_list"]
				}, {
					label: "Failed order",
					borderColor: "#f3545d",
					pointBorderColor: "#FFF",
					pointBackgroundColor: "#f3545d",
					pointBorderWidth: 2,
					pointHoverRadius: 4,
					pointHoverBorderWidth: 1,
					pointRadius: 4,
					backgroundColor: 'transparent',
					fill: true,
					borderWidth: 2,
					data: data["data_list3"]
				}]
			},
			options : {
				responsive: true, 
				maintainAspectRatio: false,
				legend: {
					position: 'top',
				},
				tooltips: {
					bodySpacing: 4,
					mode:"nearest",
					intersect: 0,
					position:"nearest",
					xPadding:10,
					yPadding:10,
					caretPadding:10
				},
				layout:{
					padding:{left:15,right:15,top:15,bottom:15}
				},
				scales: {
                xAxes: [{
                    display: true,
                    scaleLabel: {
                        display: true,
                        labelString: 'Networks'
                    }
                }],
                yAxes: [{
                    display: true,
                    scaleLabel: {
                        display: true,
                        labelString: 'Amount (Naira)'
                    }
                }]
            }
			}
		});

					
multipleLineChart = document.getElementById('multipleLineChart2').getContext('2d');
var myMultipleLineChart = new Chart(multipleLineChart, {
			type: 'line',
			data: {
				labels: ["MTN","GLO","AIRTEL","9MOBILE"],
				datasets: [{
					label: "Pending Orders",
					borderColor: "#1d7af3",
					pointBorderColor: "#FFF",
					pointBackgroundColor: "#1d7af3",
					pointBorderWidth: 2,
					pointHoverRadius: 4,
					pointHoverBorderWidth: 1,
					pointRadius: 4,
					backgroundColor: 'transparent',
					fill: true,
					borderWidth: 2,
					data: data["airtime_list2"]
				},{
					label: "Successful Orders",
					borderColor: "#59d05d",
					pointBorderColor: "#FFF",
					pointBackgroundColor: "#59d05d",
					pointBorderWidth: 2,
					pointHoverRadius: 4,
					pointHoverBorderWidth: 1,
					pointRadius: 4,
					backgroundColor: 'transparent',
					fill: true,
					borderWidth: 2,
					data: data["airtime_list"]
				}, {
					label: "Failed order",
					borderColor: "#f3545d",
					pointBorderColor: "#FFF",
					pointBackgroundColor: "#f3545d",
					pointBorderWidth: 2,
					pointHoverRadius: 4,
					pointHoverBorderWidth: 1,
					pointRadius: 4,
					backgroundColor: 'transparent',
					fill: true,
					borderWidth: 2,
					data: data["airtime_list3"]
				}]
			},
			options : {
				responsive: true, 
				maintainAspectRatio: false,
				legend: {
					position: 'top',
				},
				tooltips: {
					bodySpacing: 4,
					mode:"nearest",
					intersect: 0,
					position:"nearest",
					xPadding:10,
					yPadding:10,
					caretPadding:10
				},
				layout:{
					padding:{left:15,right:15,top:15,bottom:15}
				},
				scales: {
                xAxes: [{
                    display: true,
                    scaleLabel: {
                        display: true,
                        labelString: 'Networks'
                    }
                }],
                yAxes: [{
                    display: true,
                    scaleLabel: {
                        display: true,
                        labelString: 'Amount (Naira)'
                    }
                }]
            }
			}
		});




multipleLineChart = document.getElementById('multipleLineChart3').getContext('2d');
var myMultipleLineChart = new Chart(multipleLineChart, {
			type: 'line',
			data: {
				labels:["GOTV","DSTV","STARTIMES"],
				datasets: [{
					label: "Pending Orders",
					borderColor: "#1d7af3",
					pointBorderColor: "#FFF",
					pointBackgroundColor: "#1d7af3",
					pointBorderWidth: 2,
					pointHoverRadius: 4,
					pointHoverBorderWidth: 1,
					pointRadius: 4,
					backgroundColor: 'transparent',
					fill: true,
					borderWidth: 2,
					data:data["cable_list2"]
				},{
					label: "Successful Orders",
					borderColor: "#59d05d",
					pointBorderColor: "#FFF",
					pointBackgroundColor: "#59d05d",
					pointBorderWidth: 2,
					pointHoverRadius: 4,
					pointHoverBorderWidth: 1,
					pointRadius: 4,
					backgroundColor: 'transparent',
					fill: true,
					borderWidth: 2,
					data: data["cable_list"]
				}, {
					label: "Failed order",
					borderColor: "#f3545d",
					pointBorderColor: "#FFF",
					pointBackgroundColor: "#f3545d",
					pointBorderWidth: 2,
					pointHoverRadius: 4,
					pointHoverBorderWidth: 1,
					pointRadius: 4,
					backgroundColor: 'transparent',
					fill: true,
					borderWidth: 2,
					data: data["cable_list3"]
				}]
			},
			options : {
				responsive: true, 
				maintainAspectRatio: false,
				legend: {
					position: 'top',
				},
				tooltips: {
					bodySpacing: 4,
					mode:"nearest",
					intersect: 0,
					position:"nearest",
					xPadding:10,
					yPadding:10,
					caretPadding:10
				},
				layout:{
					padding:{left:15,right:15,top:15,bottom:15}
				},
				scales: {
                xAxes: [{
                    display: true,
                    scaleLabel: {
                        display: true,
                        labelString: 'Decoder'
                    }
                }],
                yAxes: [{
                    display: true,
                    scaleLabel: {
                        display: true,
                        labelString: 'Amount (Naira)'
                    }
                }]
            }
			}
		});



multipleBarChart = document.getElementById('multipleBarChart').getContext('2d');

var myMultipleBarChart = new Chart(multipleBarChart, {
			type: 'bar',
			data: {
					labels: ["IKEDC", "EKEDC", "AEDC", "IBEDC", "KEDC", "EEDC", "PHEDC", "KAEDC", "JEDC", "BEDC", "YEDC"],

				datasets : [{
					label: "Successful orders",
					backgroundColor: '#59d05d',
					borderColor: '#59d05d',
					data: data["bill_list"],
				},{
					label: "Failed orders",
					backgroundColor: '#fdaf4b',
					borderColor: '#fdaf4b',
					data: data["bill_list3"],
				}, {
					label: "Pending orders",
					backgroundColor: '#177dff',
					borderColor: '#177dff',
					data: data["bill_list2"],
				}],
			},
			options: {
				responsive: true, 
				maintainAspectRatio: false,
				legend: {
					position : 'bottom'
				},
				title: {
					display: true,
					text: 'Traffic Stats'
				},
				tooltips: {
					mode: 'index',
					intersect: false
				},
				responsive: true,
				scales: {
					xAxes: [{
						stacked: true,
					}],
					yAxes: [{
						stacked: true
					}]
				}
			}
		});

$("#output").css("display","block");

                },
                error: function(){
                    $.LoadingOverlay("hide");

                    Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Something went wrong!',
                    })
                },
            })
        });
    });
</script>





    
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
	<script src="https://cdn.jsdelivr.net/npm/gasparesganga-jquery-loading-overlay@2.1.7/dist/loadingoverlay.min.js"></script>
 

 

<script >
		$(document).ready(function() {
			$('table.display').DataTable({
				"aaSorting" : [[]]
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
<?php require_once '../core/footer.php'; ?>
	</body>
	</html>





 
	<?php
} else {
    echo "<script>document.location.href='../logout'; </script>";
  exit;
}

?>
</html>
	