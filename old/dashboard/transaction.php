<?php 
require_once '../core/conn.php';
session_start();
$sql = mysqli_query($con, "SELECT * FROM user WHERE id = {$_SESSION['id']}");
            if 
            (mysqli_num_rows($sql) > 0){
              $row = mysqli_fetch_assoc($sql);
            }
if(isset( $_SESSION['name'])) {
    ?>
<!DOCTYPE html>
<html lang="en">


<head>
	<meta name="theme-color" content="#5230b0">
	<meta charset="utf-8" />
    <title><?php echo $web['name'];?> | Buy Data, Airtime to cash, Bills Payment</title>
    <!--favicon icon-->
	<link rel="icon" href="/static/stylem/assets/wp-content/uploads/2020/10/favicon.png" sizes="32x32" />
	<link rel="icon" href="/static/stylem/assets/wp-content/uploads/2020/10/favicon.png" sizes="192x192" />
	<link rel="apple-touch-icon" href="/static/stylem/assets/wp-content/uploads/2020/10/favicon.png" />
	

    <link rel="manifest" href="/static/styling/img/site.webmanifest">
    <!-- <link rel="icon" href="/static/styling/images/tab.png" type="image/png" sizes="16x16"> -->
	<link rel="manifest" href="/static/img/manifest.json">
	<meta name="msapplication-TileColor" content="#ffffff">
	<meta name="msapplication-TileImage" content="/static/img/ms-icon-144x144.png">
	<meta name="theme-color" content="#ffffff">

    <meta content="<?php echo $web['name'];?>- Buy Airtime and Data for all Network. Make payment for DSTV, GOTV, PHCN other services" name="descriptison">

    <meta itemprop="name" content="<?php echo $web['name'];?> - Buy Airtime and Data for all Network. Make payment for DSTV, GOTV, PHCN other services">
    <meta itemprop="description" content="Buy Cheap Internet Data Plan and Airtime Recharge for Airtel, 9mobile, GLO, MTN, Pay DSTV, GOTV, PHCN.">
    <meta itemprop="image" content="/static/styling/images/bg.jpg">
    <link rel="stylesheet" href="/static/ogbam/w3.css">

    <!-- Twitter Card data -->
    <meta name="twitter:card" content="/static/styling/images/bg.jpg">
    <meta name="twitter:title" content="<?php echo $web['name'];?> - Buy Airtime and Data for all Network. Make payment for DSTV, GOTV, PHCN other services">
    <meta name="twitter:description" content="Buy Cheap Internet Data Plan and Airtime Recharge for Airtel, 9mobile, GLO, MTN, Pay DSTV, GOTV, PHCN.">
    <meta name="twitter:image:src" content="/static/styling/images/bg.jpg">

    <!-- Open Graph data -->
    <meta property="og:locale" content="en_US">
    <meta property="og:title" content="datavilla- Buy Airtime and Data for all Network. Make payment for DSTV, GOTV, PHCN other services">
    <meta property="og:image" content="/static/styling/images/bg.jpg">
    <meta property="og:description" content="Buy Cheap Internet Data Plan and Airtime Recharge for Airtel, 9mobile, GLO, MTN, Pay DSTV, GOTV, PHCN."/>
    <meta property="og:site_name" content="Hazaabuconcept.com"/>
    <meta property="og:url" content="https://www.Hazaabuconcept.com">
    <meta property="og:type" content="website">

	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<link rel="icon" href="/static/dashboard/assets/img/icon.ico" type="image/x-icon"/>
     
	<!-- Fonts and icons -->
	<script src="/static/dashboard/assets/js/plugin/webfont/webfont.min.js"></script>
	<link rel="stylesheet" href="/static/dashboard/assets/css/fonts.min.css" media="all">
	<!-- toast -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" media="all">
	
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	
	
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
				<a href="#" class="logo" style="color: white;font-size: 19px;font-weight: bold;margin-right: -70px;">Welcome</a>
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
										<span class="user-level">balance: &#8358; <?php echo $row['bal'];?> </span>
									</span>
								</a>
								<div class="clearfix"></div>
							</div>
						</div>
						<ul class="nav nav-primary">
							
								<li class="nav-item">
							
									<a href="index.php">
										<i class="fas fa-home"></i> <p>Dashboard</p>
									</a>
								</li>
							
								<li class="nav-item">
							
									<a href="buydata.php">
										<i class="fas fa-signal"></i> <p>Buy Data</p>
									</a>
								</li>
							
								<li class="nav-item ">
							
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
									<p>Developed By Adex</p>
								</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
<!-- End Sidebar -->

		<div class="main-panel ">
				

<div  style="padding:90px 10px 0 10px" >
<style>

.btn-danger {
    background-color: rgb(230, 68, 47) !important; color: white;
}

.btn-success {
    background-color: rgb(4, 219, 4) !important; color: white;
}

.btn-info{
    background-color: rgb(4, 122, 219) !important; color: white;
}
</style>
    <h2 class=''> <b>Your Account History And Activities.</b> </h2>

    <div class="">
        <div class="">
            <h4>FILTER</h4>
        </div>
        <div>
            <p>

                <a data-toggle="collapse"  href='#airtime'><span class="badge badge-info badge-pill w3-hover-blue w3-margin-bottom ">Airtime Payment</span> </a>
               <a data-toggle="collapse"  href='#data'><span class="badge badge-info badge-pill w3-hover-blue w3-margin-bottom ">Data Plan</span> </a>
                <a href='#transfer'> <span class="badge badge-info badge-pill w3-hover-blue w3-margin-bottom">Transfer</span> </a>
                <a href='#coupon'> <span class="badge badge-info badge-pill w3-hover-blue w3-margin-bottom">Coupon Payment</span> </a>
                 <a data-toggle="collapse"  href='#topup'><span class="badge badge-info badge-pill w3-hover-blue w3-margin-bottom ">Airtime Topup</span>  </a>
                 <a href='#share'> <span class="badge badge-info badge-pill w3-hover-blue w3-margin-bottom">Share and Share</span> </a>
                <a href='#withdraw'> <span class="badge badge-info badge-pill w3-hover-blue w3-margin-bottom">Withdraw</span> </a>
                <a href='#Cablesub'> <span class="badge badge-info badge-pill w3-hover-blue w3-margin-bottom">Cable subscription</span> </a>
                <a href='#bank'> <span class="badge badge-info badge-pill w3-hover-blue w3-margin-bottom">Bank payment</span> </a>
                <a href='#paystact'> <span class="badge badge-info badge-pill w3-hover-blue w3-margin-bottom">Paystack payment</span> </a>
                <a href='#bill'> <span class="badge badge-info badge-pill w3-hover-blue w3-margin-bottom">Bill payment</span> </a>
                <a href='#epin'> <span class="badge badge-info badge-pill w3-hover-blue w3-margin-bottom">Recharge Pin</span> </a>
                <a href='#epin'> <span class="badge badge-info badge-pill w3-hover-blue w3-margin-bottom">result checker</span> </a>
                
                

            </p>
        </div>
    </div>
    <hr>
	<div class="collapse" id="airtime">
     <div style="margin-bottom: 10px;"></div>

          <table width="100%" class="table bg-light table-responsive  table-bordered table-hover" id="dataTables-example" style="font-size:5px;">
          	<center><b>Airtime payment Transaction</b></center>
            <thead>
              <tr>
                <th>No.</th>
                <th>Username</th>
                <th>Amount</th>
                <th>Amount To be paid</th>
                <th>Mobile</th>
                <th>Type</th>
                <th>Date</th>
                <th>Status</th>
              </tr>
            </thead>
            <tbody>
 <?php
 $msg="";
    $username=$row['username'];
              
              $query = "SELECT * FROM airtime WHERE username='$username'";
              $result = mysqli_query($con, $query);
              $nu = 1;
              if (mysqli_num_rows($result) == 0) {
                $msg = "You Are Yet To make any Airtime Payment";
              }
              ?>
              <div class="alas">
                <?= $msg ?>
              </div>
              <?php
              while ($use = mysqli_fetch_array($result)) {
                $id = $use['id'];
                $username = $use['username'];
                $amount = $use['amount'];
                 $pay = $use['pay'];
                 $mobile = $use['mobile'];
                 $type = $use['type'];
                 $date = $use['date'];
                 $status = $use['status'];
               


              ?>
                <tr>
                  <td><?php echo htmlentities($nu);echo '.'; ?></td>
                  <td><?= $username; ?></td>
                  <td>₦<?= $amount; ?></td>
                  <td>₦<?= $pay; ?></td>
                  <td><?=$mobile; ?></td>
                  <td><?= $type; ?></td>
                  <td><?= $date; ?></td>
                   <td><?php if($use['status']==0){
                    echo "<span class='btn btn-warning' id=str".$use['id'].">Pending</span>";
                  }; if($use['status']==1){
                    echo "<span class='btn btn-success' id=str".$use['id'].">Paid</span>";
                  };if($use['status']==2){ echo "<span class='btn btn-danger' id=str".$use['id'].">Canceled</span>";
                  };?></td>
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

<div class="collapse" id="data">
	<div style="margin-bottom: 10px;"></div>

          <table width="100%" class="table bg-light table-responsive  table-bordered table-hover" id="dataTables-example" style="font-size:5px;">
          	<center><b>DataPlan Transaction</b></center>
            <thead>
              <tr>
                <th>No.</th>
                <th>Username</th>
                <th>Transid</th>
                <th>Mobile</th>
                <th>Plan</th>
                <th>Type</th>
                <th>Amount</th>
                <th>Date</th>
                <th>Status</th>
              </tr>
            </thead>
            <tbody>
 <?php
 $msgs="";
    $username=$row['username'];
    $type="Data Subcription";
              
              $query = "SELECT * FROM transactions WHERE username='$username' AND service='$type'";
              $result = mysqli_query($con, $query);
              $nu = 1;
              if (mysqli_num_rows($result) == 0) {
                $msgs = "You Are Yet To make any Data Subcription";
              }
              ?>
              <div class="alas">
                <?= $msgs ?>
              </div>
              <?php
              while ($dat = mysqli_fetch_array($result)) {
                $id = $dat['id'];
                $username = $dat['username'];
                $transid = $dat['transid'];
                 $mobile = $dat['mobile'];
                 $type = $dat['type'];
                  $plan = $dat['plans'];
                 $amount = $dat['amount'];
                 $date = $dat['date'];
                 $status = $dat['status'];
               


              ?>
                <tr>
                  <td><?php echo htmlentities($nu);echo '.'; ?></td>
                  <td><?= $username; ?></td>
                  <td><?= $transid; ?></td>
                  <td><?= $mobile; ?></td>
                   <td><?= $plan; ?></td>
                  <td><?=$type; ?></td>
                  <td>₦<?= $amount; ?></td>
                  <td><?= $date; ?></td>
                   <td><?php if($dat['status']==0){
                    echo "<span class='btn btn-warning' id=str".$dat['id'].">Pending</span>";
                  }; if($dat['status']==1){
                    echo "<span class='btn btn-success' id=str".$dat['id'].">Paid</span>";
                  };if($dat['status']==2){ echo "<span class='btn btn-danger' id=str".$dat['id'].">Canceled</span>";
                  };?></td>
                  </td>
                 
                </tr>
              <?php
                $nu = $nu + 1;
              }
           
              ?>
            </tbody>
          </table>
      </div>

<div class="collapse" id="topup">
     <div style="margin-bottom: 10px;"></div>

          <table width="100%" class="table bg-light table-responsive  table-bordered table-hover" id="dataTables-example" style="font-size:5px;">
          	<center><b>Airtime Topup Transaction</b></center>
            <thead>
              <tr>
                <thead>
              <tr>
                <th>No.</th>
                <th>Username</th>
                <th>Transid</th>
                <th>Mobile</th>
                <th>Type</th>\
                 <th>Plan</th>
                <th>Amount</th>
                <th>Date</th>
                <th>Status</th>
              </tr>
            </thead>
            <tbody>
 <?php
 $msgs="";
    $username=$row['username'];
    $type="Airtime TopUp";
              
              $query = "SELECT * FROM transactions WHERE username='$username' AND service='$type'";
              $result = mysqli_query($con, $query);
              $nu = 1;
              if (mysqli_num_rows($result) == 0) {
                $msga = "You Are Yet To make AirtimeTop Up";
              }
              ?>
              <div class="alas">
                
              </div>
              <?php
              while ($dats = mysqli_fetch_array($result)) {
                $id = $dats['id'];
                $username = $dats['username'];
                $transid = $dats['transid'];
                 $mobile = $dats['mobile'];
                 $type = $dats['type'];
                  $plan = $dats['plans'];
                 $amount = $dats['amount'];
                 $date = $dats['date'];
                 $status = $dats['status'];
               


              ?>
                <tr>
                  <td><?php echo htmlentities($nu);echo '.'; ?></td>
                  <td><?= $username; ?></td>
                  <td><?= $transid; ?></td>
                  <td><?= $mobile; ?></td>
                  <td><?=$type; ?></td>
                   <td><?=$plan; ?></td>
                  <td>₦<?= $amount; ?></td>
                  <td><?= $date; ?></td>
                   <td><?php if($dats['status']==0){
                    echo "<span class='btn btn-warning' id=str".$dats['id'].">Pending</span>";
                  }; if($dats['status']==1){
                    echo "<span class='btn btn-success' id=str".$dats['id'].">Paid</span>";
                  };if($dats['status']==2){ echo "<span class='btn btn-danger' id=str".$dats['id'].">Canceled</span>";
                  };?></td>
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





<!-- history end here -->


  <!-- history start here -->
  

    <div class="">
  <!-- history start here -->
  
<!-- history end here -->



<!-- history end here -->



        <!-- history start here -->
        
 <!-- history end here -->

        <!-- history start here -->
        
 <!-- history end here -->



   <!-- history start here -->
   
<!-- history end here -->



        <!-- history start here -->
        
 <!-- history end here -->



        <!-- history start here -->
        
 <!-- history end here -->



        <!-- history start here -->
        
 <!-- history end here -->



        <!-- history start here -->
        
 <!-- history end here -->



        <!-- history start here -->
        
 <!-- history end here -->



        <!-- history start here -->
        
 <!-- history end here -->




        <!-- history start here -->
        
 <!-- history end here -->



        <!-- history start here -->
        
 <!-- history end here -->


</div>
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

	











		<?php require_once '../core/footer.php'; ?>

</body>
 
	<?php
} else {
    echo "<script>document.location.href='../logout'; </script>";
  exit;
}

?>
</html>
	