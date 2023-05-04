<?php 
require_once '../core/conn.php';
session_start();
$msg="";
$sql = mysqli_query($con, "SELECT * FROM  mail");
            if 
            (mysqli_num_rows($sql) > 0){
              $mail = mysqli_fetch_assoc($sql);
            }
$musername=$mail['username'];
$mpassword=$mail['password'];
$host=$mail['host'];
$sender=$mail['sender'];

if(isset( $_SESSION['change'])) {
     $email = $_SESSION['mail'];
      $name = $_SESSION['change'];
       $id = $_SESSION['id'];
       
       if (isset($_POST['sub'])) {
           
$password = $_POST['password'];
  $cpassword = $_POST['cpassword'];
  
  $hash=substr(sha1(md5($password)), 3, 10);
  if ($_POST['password']!==$_POST['cpassword']) {
    # code...
$msg= "<div class='alert alert-danger'>Your passwords did not match</div>";
}else if(strlen($password)<8)
  {
    // Checking the strenght of the user password
    $msg="<div class='alert alert-danger'>Passord must contain at least 8 characters</div>";

}else {
    $query= mysqli_query($con, "UPDATE user SET password='$hash' WHERE email='$email'") or die(mysqli_error());
    if($query) {
         @require "../Mail/phpmailer/PHPMailerAutoload.php";
         require_once "../core/v.php";
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
            $mail->Subject = "Password Change";
            $mail->Body = $temp;         
            if (!$mail->send()) {
                //I left this blank because i don't want anything to pop out on the ui again
                //echo "<script> alert('error sending email mysqli_error($mail)');</script>";
            } else {
                 //I left this blank because i don't want anything to pop out on the ui again
                 // echo "<script> alert('email was sent');</script>";
            }
            ?>
             <script>
                 alert("Password Changed, you may sign in now");
                   window.location.replace("../login");
             </script>
             <?php
        }else {
    $msg="<div class='alert alert-danger'>An Error Occur Contact The Admin</div>";

    }
   
} 
}

         

?>


 <!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>Forgot - <?php echo $web['name']; ?> | Buy Data, Airtime to cash, Bills Payment</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="theme-color" content="#5230b0 ">
	<meta name="msapplication-TileColor" content="#5230b0 ">
	<meta itemprop="name" content="<?php echo $web['name']; ?> - Buy Airtime and Data for all Network. Make payment for DSTV, GOTV, PHCN other services">
    <meta itemprop="description" content="Buy Cheap Internet Data Plan and Airtime Recharge for Airtel, 9mobile, GLO, MTN, Pay DSTV, GOTV, PHCN.">
    <meta itemprop="image" content="../static/img/bg.html">
  <link rel="stylesheet" href="../static/ogbam/w3.css">
  <link rel="icon" href="/upload<?php echo $web['image']; ?>" type="image/png" sizes="16x16">
    <!-- Twitter Card data -->
    <meta name="twitter:title" content="<?php echo $web['name']; ?> - Buy Airtime and Data for all Network. Make payment for DSTV, GOTV, PHCN other services">
    <meta name="twitter:description" content="Buy Cheap Internet Data Plan and Airtime Recharge for Airtel, 9mobile, GLO, MTN, Pay DSTV, GOTV, PHCN.">
    <!-- Open Graph data -->
    <meta property="og:locale" content="en_US">
    <meta property="og:title" content="<?php echo $web['name']; ?> - Buy Airtime and Data for all Network. Make payment for DSTV, GOTV, PHCN other services">
   
    <meta property="og:description" content="Buy Cheap Internet Data Plan and Airtime Recharge for Airtel, 9mobile, GLO, MTN, Pay DSTV, GOTV, PHCN."/>
    <meta property="og:site_name" content="<?php echo $web['name']; ?>"/>
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
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="css/style.css" />
 <!--build:css-->
    <link rel="stylesheet" href="/adex/assets/css/main.css">
    <!-- endbuild -->
    </head>

<body>

    <!--preloader start-->
    <!------<div id="preloader">
        <div class="preloader-wrap">
            <img src="/adex/assets/img/logo-color.png" alt="logo" class="img-fluid" />
            <div class="thecube">
                <div class="cube c1"></div>
                <div class="cube c2"></div>
                <div class="cube c4"></div>
                <div class="cube c3"></div>
            </div>
        </div>
    </div>------>
    <!--preloader end-->
    <section class="page-header-section ptb-100 bg-image full-height" image-overlay="8">
        <div class="background-image-wraper" style="background: url('/upload/images.jpg'); opacity: 1;"></div>
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-12 col-md-8 col-lg-6">
                    <div class="login-signup-wrap p-5 gray-light-bg rounded shadow">
                        <div class="login-signup-header text-center">
                            <a href="/index.php">
                                <!----<img src="/adex/assets/img/logo-color.png" class="img-fluid mb-3" alt="Logo">---->
                                 <h3><span style="color:red;">SURPLUS</span> DATA</h3>
                                </a>
                            <h4 class="mb-5">Change Password</h4>
                        </div>
                        <form class="login-signup-form" method="POST">
                            <?php echo $msg; ?>
                            <div class="form-group">
                                <!-- Label -->
                                <label class="pb-1">
                                    Password
                                </label>
                                <!-- Input group -->
                                <div class="input-group input-group-merge">
                                    <div class="input-icon">
                                        <span class="ti-lock"></span>
                                    </div>
                                    <input type="password" name="password" class="form-control" placeholder="Enter your password" required>
                                </div>
                            </div>
                               <div class="form-group">
                                <!-- Label -->
                                <label class="pb-1">
                                  Confirm  Password
                                </label>
                                <!-- Input group -->
                                <div class="input-group input-group-merge">
                                    <div class="input-icon">
                                        <span class="ti-lock"></span>
                                    </div>
                                    <input type="password" name="cpassword" class="form-control" placeholder="Confirm your password" required>
                                </div>
                            </div>
                            <!-- Submit -->
                            <button type="submit" name="sub" class="btn btn-block btn-brand-02 border-radius mt-4 mb-3">
                                Login Now
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6">
                    <div class="copyright-wrap small-text text-center mt-5 text-white">
                        <p class="mb-0">&copy; Design By -> Adex Developer</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--scroll bottom to top button start-->
    <div class="scroll-top scroll-to-target primary-bg text-white" data-target="html">
        <span class="fas fa-hand-point-up"></span>
    </div>
    <!--scroll bottom to top button end-->
    <!--build:js-->
    <script src="/adex/assets/js/vendors/jquery-3.5.1.min.js"></script>
    <script src="/adex/assets/js/vendors/popper.min.js"></script>
    <script src="/adex/assets/js/vendors/bootstrap.min.js"></script>
    <script src="/adex/assets/js/vendors/jquery.easing.min.js"></script>
    <script src="/adex/assets/js/vendors/owl.carousel.min.js"></script>
    <script src="/adex/assets/js/vendors/countdown.min.js"></script>
    <script src="/adex/assets/js/vendors/jquery.waypoints.min.js"></script>
    <script src="/adex/assets/js/vendors/jquery.rcounterup.js"></script>
    <script src="/adex/assets/js/vendors/magnific-popup.min.js"></script>
    <script src="/adex/assets/js/vendors/validator.min.js"></script>
    <script src="/adex/assets/js/app.js"></script>
</body>
<?php include ('../includes/footer.php'); ?>
</html> 

<?php
} else {
    echo "<script>document.location.href='index.php'; </script>";
  exit;
}

?>