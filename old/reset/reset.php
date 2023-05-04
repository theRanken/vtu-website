<?php
require_once '../core/conn.php';
session_start();
if(isset( $_SESSION['name'])) {
    error_reporting(0);
?>
<!DOCTYPE html>
<html lang="en">

<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>verify - | Buy Data, Airtime to cash, Bills Payment</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="theme-color" content="#5230b0">

	
    
	
           

	<meta name="msapplication-TileColor" content="#5230b0 ">
	<meta name="msapplication-TileImage" content="../static/img/bg.html">
	<meta itemprop="name" content="Adex VTU- Buy Airtime and Data for all Network. Make payment for DSTV, GOTV, PHCN other services">
    <meta itemprop="description" content="Buy Cheap Internet Data Plan and Airtime Recharge for Airtel, 9mobile, GLO, MTN, Pay DSTV, GOTV, PHCN.">
    <meta itemprop="image" content="../static/img/bg.html">
  	<link rel="stylesheet" href="../static/ogbam/w3.css">
    <meta name="twitter:card" content="../static/img/bg.html">
    <meta name="twitter:title" content="ADEX VTU- Buy Airtime and Data for all Network. Make payment for DSTV, GOTV, PHCN other services">
    <meta name="twitter:description" content="Buy Cheap Internet Data Plan and Airtime Recharge for Airtel, 9mobile, GLO, MTN, Pay DSTV, GOTV, PHCN.">
    <meta name="twitter:image:src" content="../static/img/bg.html">

    <!-- Open Graph data -->
    <meta property="og:locale" content="en_US">
    <meta property="og:title" content=" Buy Airtime and Data for all Network. Make payment for DSTV, GOTV, PHCN other services">
    <meta property="og:image" content="../static/img/bg.html">
    <meta property="og:description" content="Buy Cheap Internet Data Plan and Airtime Recharge for Airtel, 9mobile, GLO, MTN, Pay DSTV, GOTV, PHCN."/>
    <meta property="og:site_name" content=/>
    <meta property="og:url" content="../index.php">
    <meta property="og:type" content="website">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../static/assets/vendor/bootstrap/css/bootstrap.min.html">
    <link href="../static/assets/vendor/fonts/circular-std/style.html" rel="stylesheet">
    <link rel="stylesheet" href="../static/assets/libs/css/style.html">
    <link rel="stylesheet" href="../static/assets/vendor/fonts/fontawesome/css/fontawesome-all.html">
    <link rel="stylesheet" href="../../cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<link rel="icon" href="../static/dashboard/assets/img/icon.html" type="image/x-icon"/>

	<!-- Fonts and icons -->
	<script src="../static/dashboard/assets/js/plugin/webfont/webfont.min.js"></script>
 
  <link href="../../cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
  
	
	<script>
		WebFont.load({
			google: {"families":["Lato:300,400,700,900"]},
			custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"], urls: ['/static/dashboard/assets/css/fonts.min.css']},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
	</script>
	
	<script>
	toastr.error('Error','Error Title')

</script>
	<!-- CSS Files -->
	<link rel="stylesheet" href="../static/dashboard/assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="../static/dashboard/assets/css/atlantis.css">
	

	
</head>
<body class="login" >
	<div class="wrapper wrapper-login">
	
		<div class="container container-login animated fadeIn">
		   

			<center> <a href="../index.php" class="logo">
				                    <img src="../upload/<?=$web['image']?>"  width="300" 
     height="500"  alt=""  style="height:40px !important" class="logo-sticky">
			</a></center>
			<main class="login-form">
    <div class="cotainer">
        <div class="row justify-content-center">
            <div class="col-md-8">
    <div class="text-center">Confirm</div>
                        <form action="#" method="POST">
                            <div class="form-group row">
                                <label for="email_address" class="col-md-4 col-form-label text-md-right">OTP Code</label>
                                <div class="col-md-6">
                                    <input type="text" id="otp" class="form-control" name="otp_code" required autofocus>
                                </div>
                            </div>

                            <div class="form-group form-action-d-flex mb-3" >
                                <input type="submit" value="Verify" name="verify" class="btn btn-primary  mt-3 mt-sm-0 fw-bold" >
                            </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>

</main>
</body>

</html>
<?php
session_start();
    require_once '../core/conn.php';
    $ip=0;
    $otp = $_SESSION['otp'];
        $email = $_SESSION['mail'];
        $otp_code = $_POST['otp_code'];
        $name=$_SESSION['name'];
        $id=$_SESSION['id'];
$sql = mysqli_query($con, "SELECT * FROM  user WHERE email='$email");
            if 
            (mysqli_num_rows($sql) > 0){
              $use = mysqli_fetch_assoc($sql);
            }

    if(isset($_POST["verify"])){
        $otp = $_SESSION['otp'];
        $email = $_SESSION['mail'];
        $otp_code = $_POST['otp_code'];
        $name=$_SESSION['name'];
        $id=$_SESSION['id'];
        if($otp != $otp_code){
            
            ?>
           <script>
               alert("Invalid OTP code");
           </script>
           <?php
        }else{
            $_SESSION['names'] = $name;
            $_SESSION['mails'] = $email;
            $_SESSION['ids'] = $id;
 
 
 
            ?>
             <script>
                 alert("Verfiy account done, you may change your password  now");
                   window.location.replace("change.php");
             </script>
             <?php
        }
    }

} else {
    echo "<script>document.location.href='index.php'; </script>";
  exit;
}

?>