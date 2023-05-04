<?php 
session_start();
require_once '../core/conn.php';
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

$phone = "";
if (isset($_POST['sub'])) {
$phone = mysqli_real_escape_string ($con,$_POST['phone']);
$query1 = "SELECT * FROM user WHERE (username='$phone' OR phone='$phone' OR email='$phone')  AND status=1 ";
   $result1 = mysqli_query($con, $query1);
   
   $query2 = "SELECT * FROM user WHERE (username='$phone' OR phone='$phone' OR email='$phone')  AND status=0 ";
   $result2 = mysqli_query($con, $query2);
   
    $query3 = "SELECT * FROM user WHERE (username='$phone' OR phone='$phone' OR email='$phone')  AND status=2 ";
   $result3 = mysqli_query($con, $query3);
   
    $query4 = "SELECT * FROM user WHERE (username='$phone' OR phone='$phone' OR email='$phone')  AND status=1 ";
   $result4 = mysqli_query($con, $query4);
   
    if (mysqli_num_rows($result1) == 1) {
        $sql = mysqli_query($con, "SELECT * FROM  user WHERE (email='$phone' OR phone='$phone' OR username='$phone') ");
            if 
            (mysqli_num_rows($sql) > 0){
              $use = mysqli_fetch_assoc($sql);
            } 
            
        $otp = rand(100000,999999);
        $email= $use['email'];
        $id= $use['id'];
        $name= $use['name'];
            $_SESSION['otp'] = $otp;
            $_SESSION['mail'] = $email;
            $_SESSION['id'] = $id;
            $_SESSION['name'] = $name;
           @require "../Mail/phpmailer/PHPMailerAutoload.php";
         require_once "../core/reset.php";
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
            $mail->setFrom("$sentfrom", "Reset Password");
            $mail->addAddress("$email");
            $mail->isHTML(true);
            $mail->Subject = "Reset Password";
            $mail->Body = $temp;         
            if(!$mail->send()){
            ?>        
                <script>
                     alert("<?php echo "Reset Failed, Invalid Email ".$email?>");
                  </script>
                   <?php
                      }else{
                         ?>
                        <script>
                                    alert("<?php echo "Successfully, OTP has been  sent to ".$email?> check your spam folder");
                                    window.location.replace('reset.php');
                                </script>
                                <?php
                             if (mysqli_num_rows($result2) == 1) {
                                    $msg = "<h4 class='alert alert-danger'> Sorry <h5 class='alert alert-secondary'>$phone</h5> Your Account has no been verify
     <h5 class='btn btn-primary'>$email</h5>.<br> <h5 style='color:red; font-weight:bold;'>Note:</h5>you can't change your password until you verify your account<br>
     <a href='../signup/verification.php'> Click here for to verify your account</a></h4>";                                
                 } else if (mysqli_num_rows($result3) == 1) {
                     $msg="<h4 class='alert alert-danger'> Sorry <h5 style='color:red; font-weight:bold; font-size:20px;'>$phone</h5> Your Account 
   has been Banned because you look to have breached our law(s). Contact 
    <h5 class='btn btn-primary'>Admon</h5> <h5> to Unban your account again</h5><br></h4>";
                                    ?>
                                    
        <script>
            setTimeout(function() {
                window.location.href = '../contact';
            }, 50000);
        </script>
          <?php
    } else if (mysqli_num_rows($result4) == 1) {
         $sql = mysqli_query($con, "SELECT * FROM  user WHERE (email='$phone' OR phone='$phone' OR username='$phone') ");
            if 
            (mysqli_num_rows($sql) > 0){
              $use = mysqli_fetch_assoc($sql);
            } 
            
        $otp = rand(100000,999999);
        $email= $use['email'];
        $id= $use['id'];
        $name= $use['name'];
            $_SESSION['otp'] = $otp;
            $_SESSION['mail'] = $email;
            $_SESSION['id'] = $id;
            $_SESSION['name'] = $name;
           @require "../Mail/phpmailer/PHPMailerAutoload.php";
         require_once "../core/reset.php";
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
            $mail->setFrom("$sender", "Reset Password");
            $mail->addAddress("$email");
            $mail->isHTML(true);
            $mail->Subject = "Reset Password";
            $mail->Body = $temp;         
            if(!$mail->send()){
            ?>        
                <script>
                     alert("<?php echo "Reset Failed, Invalid Email ".$email?>");
                  </script>
                   <?php
                      }else{
                         ?>
                        <script>
                                    alert("<?php echo "Successfully, OTP has been  sent to ".$email?> check your spam folder");
                                    window.location.replace('reset.php');
                                </script>
         ?>
                               <?php
                      }
                             }else {
                            $msg = "<h5 class='alert alert-warning'><br>
     Oops!! You have entered wrong username or phone or email!
    Please provide your account correct login details and try again.<br></h5>";
              
            }
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
		   

             <center> <a href="../index.html" class="logo">
                                  <img src="../upload/<?=$web['image']?>"  width="300" 
     height="500"  alt="<?php echo $web['name']; ?>"  style="height:40px !important" class="logo-sticky">
              
              </a></center>
              <h3 class="text-center">Forgotten Password</h3>
              
              <form method="POST" >
                  <input type="hidden" name="csrfmiddlewaretoken" value="cbQhSFV8xnbXEsqjwH0rR2pVi63ZyeJPOYBKg3HjQu83rFSkNNbAnjNXEpayt9TZ">
                  <div class="outputc"> <?= $msg; ?></div>
              <div id="div_id_username" class="form-group">
        
            <label for="id_username" class=" requiredField">
                Enter Phone Number or Username or Email<span class="asteriskField">*</span>
            </label>
        
 <div class="">
                    <input type="text" name="phone"  maxlength="150" class="textinput textInput form-control" required id="id_username" value="<?php if (isset($phone)) echo $phone; ?>">
                     </div>
            
        
    </div>
        <div class="form-group form-action-d-flex mb-3">
            
<button type="submit" name='sub'  class="btn btn-primary  mt-3 mt-sm-0 fw-bold"  ">Submit</button>
				</div>
				</div>
			</div>
			</form>
		</div>

	
	</div>
	<script src="../static/dashboard/assets/js/core/jquery.3.2.1.min.js"></script>
	<script src="../static/dashboard/assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
	<script src="../static/dashboard/assets/js/core/popper.min.js"></script>
	<script src="../static/dashboard/assets/js/core/bootstrap.min.js"></script>
	<script src="../static/dashboard/assets/js/atlantis.min.js"></script>
	<script src="../../cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

</body>
</html>