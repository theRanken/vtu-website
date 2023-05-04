<?php 
require_once '../core/conn.php';
require_once '../core/api.php';
session_start();

//Fetch balance from db
	$wallet = mysqli_query($con, "SELECT * FROM wallet WHERE customer_id = {$_SESSION['id']}");
            if 
            (mysqli_num_rows($wallet) > 0){
              $wallet_bal = mysqli_fetch_assoc($wallet);
            }
            
            else{
               $wallet_bal = "0"; 
            }
          
          if($_GET['error']){
               $error_msg = $_GET['error'];
           }else{
            $error_msg = '';
           }

if(isset( $_SESSION['name'])) {
	$aemail=$web['email'];
$sql = mysqli_query($con, "SELECT * FROM user WHERE id = {$_SESSION['id']}");
            if 
            (mysqli_num_rows($sql) > 0){
              $row = mysqli_fetch_assoc($sql);
            }
            $msg="";
            $sql = mysqli_query($con, "SELECT * FROM  mail");
            if 
            (mysqli_num_rows($sql) > 0){
              $mail = mysqli_fetch_assoc($sql);
            }
$bal= $row['bal'];
$email=$row['email'];
$username= $row['username'];
$musername=$mail['username'];
$mpassword=$mail['password'];
$host=$mail['host'];
$sender=$mail['sender'];
$chek = mysqli_query($con,"SELECT * FROM pay");
 
 $pdata = mysqli_fetch_array($chek);
$min=$pdata['min'];
 if(isset($_POST['buy'])) {
$network = $_POST['network']; 
 $price = $_POST['price'];
  $type = $_POST['type'];
   $mobile = $_POST['mobile'];
   $plan = $_POST['plan'];
   $status ="0";
   $total=$bal -$price;
   $service="Data Subcription";
   $transid=rand(100000000,999999999);
   date_default_timezone_set('Africa/Lagos');
   $date=date("l j<\s\up>S</\s\up>, F Y @ g:ia");
   $sub = mysqli_query($con, "SELECT * FROM transactions WHERE network='$network' AND amount='$price' AND type='$type' AND mobile='$mobile' AND status='$status' AND username='$username' ");
      if (empty($network)) {
      	$msg='<div class="alert alert-warning"><button type="button" class="close" data-dismiss="alert">×</button><strong>Please Select Netwok</strong>';
      	 } elseif (empty($price)) {
        $msg = '<div class="alert alert-warning"><button type="button" class="close" data-dismiss="alert">×</button><strong>Please Select Price</strong>';
      	 } elseif (empty($type)) {
        $msg = '<div class="alert alert-warning"><button type="button" class="close" data-dismiss="alert">×</button><strong>Please Select Data Type</strong>';
  } elseif  ($price > $bal) {
   	$msg ='<div class="alert alert-warning"><button type="button" class="close" data-dismiss="alert">×</button><strong>insuffient account, please deposit</strong>';
   } elseif ($min > $total) {
        $msg = '<div class="alert alert-warning"><button type="button" class="close" data-dismiss="alert">×</button><strong>The minimum amount that must be in your account is<span>₦'.$min.'</span></strong>';
    } elseif (mysqli_num_rows($sub) == 1) {
        $msg = '<div class="alert alert-warning"><button type="button" class="close" data-dismiss="alert">×</button><strong> You have already submitted a transaction request with these details previously. 
        <br> Please be patient as your transaction request is under review, <br>you be contacted very soon <b>if approved.</b> </strong>';
        } else {
        $host = "$link";
	$refer= (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
	$api =  "$apikey"; //Your API Key
	$data = array(
	'serviceID'=> "$network", //Merchants or Operator ID ( gotv, airtel, dstv, mtn-data, glo-data etc...)
	'plan'=> "$plan", //The plan Subscribing for (gotv-jolli, gotv-max etc)
	'amount' => "$price", // (Required) Amount to pay 
	'phone' => "$mobile", //without country code
	'email' => "$email", //string
   'requestID' => "$transid" // unique for every transaction // unique for every transaction
	);  
	$curl       = curl_init();
	curl_setopt_array($curl, array(
	CURLOPT_URL => $host,
	CURLOPT_RETURNTRANSFER => true,
	CURLOPT_POST => true,
	CURLOPT_ENCODING => "",
	CURLOPT_POSTFIELDS => $data,
	CURLOPT_REFERER => $refer,
	CURLOPT_HTTPHEADER => array("Authorization: Bearer $api"),
	CURLOPT_FOLLOWLOCATION=> true,
	CURLOPT_MAXREDIRS => 10,   
	CURLOPT_POSTREDIR => 3,   
	CURLOPT_TIMEOUT => 30,
	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	CURLOPT_CUSTOMREQUEST => "POST",
	));
	$r =  curl_exec($curl); 
	curl_close($curl);
	$resp= json_decode($r,true);
        	
      $paymentStatus = $resp['code'];  	
        $hmm="invaled key";	
 if( $paymentStatus === '401' ) {	
$query = mysqli_query($con, "INSERT INTO transactions (username,transid,network,service,type,amount,mobile,plans,status,date) VALUES('$username','$transid','$network','$service','$type','$price','$mobile','$plan','$status','$date') ");

            $msg='<div class="alert alert-warning">
										<button type="button" class="close" data-dismiss="alert">×</button>
										<strong>Transaction Pending</strong>  
									</div>';
		 @require "../Mail/phpmailer/PHPMailerAutoload.php";
         require_once "../core/invoice.php";
         $mail = new PHPMailer();
        $mail->CharSet = "UTF-8";
         $mail->IsSMTP();
         $mail->SMTPAuth = true;
            $mail->SMTPSecure = "ssl";
            $mail->Host = "$hosts";
            $mail->Port = 465;              
            $mail->Username = "$musername";
            $mail->Password = "$mpassword";
            $mail->IsHTML(true);
            $mail->setFrom("$sender");
            $mail->addAddress("$email");
            $mail->isHTML(true);
            $mail->Subject = "Invoice Email";
            $mail->Body = $temp;         
            if(!$mail->send()){
                                
                               if (!$mail->send()) {
                //I left this blank because i don't want anything to pop out on the ui again
                //echo "<script> alert('error sending email mysqli_error($mail)');</script>";
            } else {
                 //I left this blank because i don't want anything to pop out on the ui again
                 // echo "<script> alert('email was sent');</script>";
            };
             
             if( $paymentStatus === '401' ) {
            $msg='<div class="alert alert-warning">
										<button type="button" class="close" data-dismiss="alert">×</button>
										<strong>Transaction Pending</strong>  
									</div>';
	$query = mysqli_query($con, "INSERT INTO transactions (username,transid,network,service,type,amount,mobile,plans,status,date) VALUES('$username','$transid','$network','$service','$type','$price','$mobile','$plan','$status','$date') ");
	
	@require "../Mail/phpmailer/PHPMailerAutoload.php";
         require_once "../core/invoice.php";
         $mail = new PHPMailer();
        $mail->CharSet = "UTF-8";
         $mail->IsSMTP();
         $mail->SMTPAuth = true;
            $mail->SMTPSecure = "ssl";
            $mail->Host = "$hosts";
            $mail->Port = 465;              
            $mail->Username = "$musername";
            $mail->Password = "$mpassword";
            $mail->IsHTML(true);
            $mail->setFrom("$sender");
            $mail->addAddress("$email");
            $mail->isHTML(true);
            $mail->Subject = "Invoice Email";
            $mail->Body = $temp;         
            if(!$mail->send()){
                                
                               if (!$mail->send()) {
                //I left this blank because i don't want anything to pop out on the ui again
                //echo "<script> alert('error sending email mysqli_error($mail)');</script>";
            } else {
                 //I left this blank because i don't want anything to pop out on the ui again
                 // echo "<script> alert('email was sent');</script>";
            };
   if( $paymentStatus === '404' ) {
       
        $msg='<div class="alert alert-danger">
										<button type="button" class="close" data-dismiss="alert">×</button>
										<strong>Content NOt Found</strong>  
									</div>';
		if( $paymentStatus === '206' ) {
		     $msg='<div class="alert alert-danger">
										<button type="button" class="close" data-dismiss="alert">×</button>
										<strong>Invalid Content</strong>  
									</div>';
			if( $paymentStatus === '200' ) {
			     $msg='<div class="alert alert-success">
										<button type="button" class="close" data-dismiss="alert">×</button>
										<strong>Transaction Successful</strong>  
									</div>';
									$statu="1";
	$query = mysqli_query($con, "INSERT INTO transactions (username,transid,network,service,type,amount,mobile,plans,status,date) VALUES('$username','$transid','$network','$service','$type','$price','$mobile','$plan','$statu','$date') ");
$updat = mysqli_query($con,"UPDATE user SET bal='$total' WHERE username='$username'  ") or die(mysqli_error());
        }
		}
   }
  }
}
    }
}
}

}
?>
<!DOCTYPE html>
<html lang="en">


<head>
	<meta name="theme-color" content="#5230b0">
	<meta charset="utf-8" />
    <title><?php echo $web['name'];?> | Buy Data, Airtime to cash, Bills Payment</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="referrer" content="no-referrer-when-downgrade">
	
    <!--favicon icon-->
	<link rel="icon" href="/static/stylem/assets/wp-content/uploads/2020/10/favicon.png" sizes="32x32" />
	<link rel="icon" href="/static/stylem/assets/wp-content/uploads/2020/10/favicon.png" sizes="192x192" />
	<link rel="apple-touch-icon" href="/static/stylem/assets/wp-content/uploads/2020/10/favicon.png" />
	

    

    <meta content="<?php echo $web['name'];?>- Buy Airtime and Data for all Network. Make payment for DSTV, GOTV, PHCN other services" name="descriptison">

    <meta itemprop="name" content="<?php echo $web['name'];?>- Buy Airtime and Data for all Network. Make payment for DSTV, GOTV, PHCN other services">
    <meta itemprop="description" content="Buy Cheap Internet Data Plan and Airtime Recharge for Airtel, 9mobile, GLO, MTN, Pay DSTV, GOTV, PHCN.">
    <meta itemprop="image" content="/static/styling/images/bg.jpg">
    <link rel="stylesheet" href="/static/ogbam/w3.css">

    <!-- Twitter Card data -->
    <meta name="twitter:card" content="/static/styling/images/bg.jpg">
    <meta name="twitter:title" content="<?php echo $web['name'];?>- Buy Airtime and Data for all Network. Make payment for DSTV, GOTV, PHCN other services">
    <meta name="twitter:description" content="Buy Cheap Internet Data Plan and Airtime Recharge for Airtel, 9mobile, GLO, MTN, Pay DSTV, GOTV, PHCN.">
    <meta name="twitter:image:src" content="/static/styling/images/bg.jpg">

    <!-- Open Graph data -->
    <meta property="og:locale" content="en_US">
    <meta property="og:title" content="datavilla- Buy Airtime and Data for all Network. Make payment for DSTV, GOTV, PHCN other services">
    <meta property="og:image" content="/static/styling/images/bg.jpg">
    <meta property="og:description" content="Buy Cheap Internet Data Plan and Airtime Recharge for Airtel, 9mobile, GLO, MTN, Pay DSTV, GOTV, PHCN."/>
    <meta property="og:site_name" content="<?php echo $web['name'];?>"/>
    <meta property="og:url" content="<?php echo $web['web'];?>">
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
										<span class="user-level">balance: &#8358; <?php echo  $wallet_bal['balance'];?>.00 </span>
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
							
								<li class="nav-item active">
							
									<a href="buydata.php">
										<i class="fas fa-signal"></i> <p>Buy Data</p>
									</a>
								</li>
							
								<li class="nav-item">
							
									<a href="topup.php">
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
<link rel="stylesheet" href="/static/ogbam/form.css">
<!-- Latest compiled and minified CSS -->

<!-- jQuery library -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

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
    #process{
        display: none;
    }



     /--thank you pop starts here--/
     .thank-you-pop{
      width:100%;
       padding:20px;
      text-align:center;
    }
    .thank-you-pop img{
      width:76px;
      height:auto;
      margin:0 auto;
      display:block;
      margin-bottom:25px;
    }

    .thank-you-pop h1{
      font-size: 42px;
        margin-bottom: 25px;
      color:#5C5C5C;
    }
    .thank-you-pop p{
      font-size: 20px;
        margin-bottom: 27px;
       color:#5C5C5C;
    }
    .thank-you-pop h3.cupon-pop{
      font-size: 25px;
        margin-bottom: 40px;
      color:#222;
      display:inline-block;
      text-align:center;
      padding:10px 20px;
      border:2px dashed #222;
      clear:both;
      font-weight:normal;
    }
    .thank-you-pop h3.cupon-pop span{
      color:#03A9F4;
    }
    .thank-you-pop a{
      display: inline-block;
        margin: 0 auto;
        padding: 9px 20px;
        color: #fff;
        text-transform: uppercase;
        font-size: 14px;
        background-color: #8BC34A;
        border-radius: 17px;
    }
    .thank-you-pop a i{
      margin-right:5px;
      color:#fff;
    }
    #ignismyModal .modal-header{
        border:0px;
    }
    /--thank you pop ends here--/

</style>

<div style="padding:90px 15px 20px 15px" >

          <div class="outputc"> <?= $msg; ?></div>
        <div class="box w3-card-4">
         <a style="text-align: center; color:red; display:block; font-size:2em;"> Error! <?php echo $error_msg; ?>. </a> <br>
        
        
</div>

  <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/gasparesganga-jquery-loading-overlay@2.1.7/dist/loadingoverlay.min.js"></script>
  

 

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
 
 <script type="text/javascript">
 function active_disactive_user(val){
 	 var id = $('select option:selected').attr('data');
    $("#network").val((id));
   $.ajax({
     type:'POST',
     url:'top.php',
     data:{val : val},
     success: function(result){
         $("#airtime").html(result);
     
     },
    error:function (){}
    });
}
</script>
<script language="JavaScript">
function active_disactive(val,id)
    {
        var newUrl = document.getElementById('airtime').options[0].getAttribute('data');
        var conceptName = $('#airtime').find(":selected").attr('data');
        $("#charge").text(val);
        $("#plan").val(conceptName);
  
    }
</script>

<script type="application/javascript">
function active_type(val){
	var id = $('select option:selected').attr('data');
	   $.ajax({
     type:'POST',
     url:'adex.php',
     data:{val : val},
     success: function(result){
      $("#ade").html(result);
     },
    error:function (){}
    });
}
</script>
	<script type="text/javascript">
$('#sprice option').click(function() {
var value= $(this).attr('data');
alert(value);
})



	</script>

	<?php require_once '../core/footer.php'; ?>

<?php if($min > $bal) { ?>
?>
<script>
$( document ).ready(function() {
swal({
 
  text: "<?php echo $row['name'];?> Wallet below minimum vending amount ₦<?php echo $row['bal'];?>",
  icon: "info",
  button: "ok",
  timer: 60000,
}).then(() => {
  window.location="index.php"
});
});
</script>
<?php } else { ?>
<?php } 
exit; 
?>









</body>
 
	<?php
} else {
    echo "<script>document.location.href='../logout'; </script>";
  exit;
}

?>
</html>
	