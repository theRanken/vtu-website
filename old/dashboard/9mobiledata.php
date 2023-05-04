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
          

if(isset( $_SESSION['name'])) {
	$aemail=$web['email'];
	$customer_id = $_SESSION['id'];
$sql = mysqli_query($con, "SELECT * FROM user WHERE id = {$_SESSION['id']}");
            if 
            (mysqli_num_rows($sql) > 0){
              $row = mysqli_fetch_assoc($sql);
            }

$network_id = 1;
//Process form for data purchase
$plan = $phone = $plan_err = $phone_err = "";
if(isset($_POST["send"])){
    $plan = htmlspecialchars($_POST["plan"]);
    $phone = htmlspecialchars($_POST["phone"]);
    if(empty($plan)){
       $plan_err = "Please, select a plan to be bundled!";
    }
    
    if(empty($phone)){
        $phone_err = "Please, enter the phone number that will get the data";
    }
    else if(!empty($phone) AND strlen($phone) < 11 OR strlen($phone) > 11){
        $phone_err = "Phone number must be eleven (11) characters long.";
    }
    else if(empty($plan_err) AND empty($phone_err)){
       
        //Check Wallet balance
        $myBalance = $wallet_bal['balance'];
        $amount_used = $wallet_bal['amount_used'];
        if($plan == '182'){
            //9Mobile 500mb gifting 450 => 470
            $charge_amount = 470;
        }
        else if($plan == '183'){
            //9mobile 1.5gb gifting 900 => 940
            $charge_amount = 940;
        }
         else if($plan == '184'){
            //9Mobile 2.0gb gifting 1080 => 1150
            $charge_amount = 1150;
        }
        
         else if($plan == '185'){
            //9Mobile 3.0gb gifting 1350 => 1500
            $charge_amount = 1500;
        }
        
        else if($plan == '186'){
            //9Mobile 4.5gb gifting 1800 => 1900
            $charge_amount = 1900;
        }
        
        else if($plan == '187'){
            //9Mobile 11.0gb gifting 3600 => 3800
            $charge_amount = 3800;
        }
        
        else if($plan == '188'){
            //9Mobile 15.0gb gifting 4500 => 4800
            $charge_amount = 4800;
        }
        
        else if($plan == '189'){
            //9Mobile 40.0gb gifting 9000 => 9500
            $charge_amount = 9500;
        }
        
        else if($plan == '190'){
            //9Mobile 75.0gb gifting 13500 => 13800
            $charge_amount = 13800;
        }
        
        if($myBalance < $charge_amount){
            $lowbalance = "Insuficient balance in your wallet!";
        }else{
            //Integrate API
           $endpoint = "https://www.superjaraapi.com/api/data/";

        //data required. You can check the doc for more options to add....
        $postdata = array(
            "network" => $network_id,
            "mobile_number" =>  $phone, //$phone_number,
            "plan" => $plan,
            "Ported_number" => true
        );
        
        //making a call to the endpoint....
        $ch = curl_init();
        //curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_URL, $endpoint);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($postdata)); //Post Fields
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 200);
        curl_setopt($ch, CURLOPT_TIMEOUT, 200);
        
        //Set the headers from the endpoint 
          curl_setopt($ch, CURLOPT_HTTPHEADER, array(
         //enter your test secret key in front of the word Bearer
            "Authorization: Token 5a35e5c11298c53addfdfdbf1da793b4eb44ab1c",
            "Content-Type: Application/json",
            "Cache-Control: no-cache"
          ));
        
        
        $request = curl_exec($ch);
        $result = json_decode($request);
        print_r($request);
        
        
        curl_close($ch);
        $error = $result->error['0'];
       echo $id = $result->id;
       echo $bundeled_phone_number = $result->mobile_number;
       echo $network_purchased = $result->network;
       echo $plan_amount = $result->plan_amount;
        $plan_network = $result->plan_network;
        $plan_code = $result->plan;
        $plan_name = $result->plan_name;
        echo $status = $result->Status;
        $purchased_date = $result->create_data;
        if($status == "successful"){
            //echo"<script>alert('Successfully bundled!')</script>";
           echo $final_balance = $myBalance - $charge_amount;
           echo $used = $amount_used + $charged_amount;
           //Update DB
           
            //update record
			$update = "UPDATE wallet SET
			balance = '$final_balance',
			amount_used = '$used'
        		WHERE customer_id = {$_SESSION['id']}";
        		if(mysqli_query($con, $update)){
        			
        			//Insert Transaction to table
        			$insertMTN = "INSERT INTO transactions(airtime_id, status, mobile_number, plan_network, plan_name, plan_amount, charged, customer_id) 
        			VALUES('$airtime_id', '$status', '$bundeled_phone_number', '$plan_network', '$plan_name', '$plan_name', '$charge_amount', '$customer_id')";
        			$inserted = mysqli_query($con, $insertMTN);
        			if($inserted){
        			    header("Location: cool.php");
        			    exit;
        			}else{
        			     header("Location: notcool.php?error='Transaction not inserted'");
        			    exit;
        			}
        		}else{
        		 header("Location: notcool.php?error=wallet not updated");
        			    exit;
        		}
           
        }else{
             header("Location: notcool.php?error=Recharge Not Successful");
        			    exit;
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
									<p>Developed By Adex</p>
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
      
    <h2 class="w3-center">Fill the form below to purchase your MTN data:</h2>
    <span style="display:block; color:red;"><?php echo $lowbalance; ?></span>
    <span style="display:block; color:red;"><?php echo $error; ?></span>
<form action="" method="POST">

<div class="form-group">
    
    <label>Select Plan</label>
    <span style="display:block; color:red;"><?php echo $plan_err; ?></span>
<select class="form-control" name="plan">
    <option value="">Select a Plan</option>
    <option value="182">9MOBILE 500MB GIFTING => &#8358 470 [30Days]</option>
	<option value="183">9MOBILE 1.5GB GIFTING => &#8358 940 [30Days]</option>
	<option value="184">9MOBILE 2GB GIFTING => &#8358 1,150 [30Days]</option>
	<option value="185">9MOBILE 3GB GIFTING => &#8358 1,500 [30Days]</option>
	<option value="186">9MOBILE 4.5GB GIFTING => &#8358 1,900 [30Days]</option>
	<option value="187">9MOBILE 11.0GB GIFTING => &#8358 3,800 [30Days]</option>
	<option value="188">9MOBILE 15.0GB GIFTING => &#8358 4,800 [30Days]</option>
	<option value="189">9MOBILE 40GB GIFTING => &#8358 9,500 [30Days]</option>
	<option value="190">9MOBILE 75GB GIFTING => &#8358 13,800 [30Days]</option>
</select>
</div>
 <div class="form-group">
<label>Enter phone number</label>
<span style="display:block; color:red;"><?php echo $phone_err; ?></span>
<input type="text" class="form-control" name="phone" placeholder="Enter the number you want the data to be sent to...">
</div>

	<button type="submit" name="send" class="btn btn-primary">Buy Now</button>
</form>  
        
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
	