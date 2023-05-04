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

if(isset( $_SESSION['names'])) {
    error_reporting(0);
     $email = $_SESSION['mails'];
      $name = $_SESSION['names'];
       $id = $_SESSION['ids'];
       
       if (isset($_POST['sub'])) {
           $password = $_POST['password'];
  $cpassword = $_POST['cpassword'];
  if ($_POST['password']!==$_POST['cpassword']) {
    # code...
$msg= "<div class='alert alert-danger'>Your passwords did not match</div>";
}else if(strlen($password)<8)
  {
    // Checking the strenght of the user password
    $msg="<div class='alert alert-danger'>Passord must contain at least 8 characters</div>";

}else {
    mysqli_query($con, "UPDATE user SET password1 = '$password' AND password2 = '$cpassword' WHERE email = '$email' OR id='$id' OR name='$name' ");
    if(mysqli_query($con,$query)) {
         @require "../Mail/phpmailer/PHPMailerAutoload.php";
         require_once "../core/otp.php";
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
        }

    }
   
} else {
    $msg="<div class='alert alert-danger'>An Error Occur Contact The Admin</div>";
  exit;
}

         

?>


<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>Reset Password - <?php echo $web['name']; ?> | Buy Data, Airtime to cash, Bills Payment</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="theme-color" content="#5230b0 ">

    

  
      

	<meta name="msapplication-TileColor" content="#5230b0 ">
	<meta name="msapplication-TileImage" content="../static/img/bg.html">
	<meta itemprop="name" content="<?php echo $web['name']; ?> - Buy Airtime and Data for all Network. Make payment for DSTV, GOTV, PHCN other services">
    <meta itemprop="description" content="Buy Cheap Internet Data Plan and Airtime Recharge for Airtel, 9mobile, GLO, MTN, Pay DSTV, GOTV, PHCN.">
    <meta itemprop="image" content="../static/img/bg.html">
  <link rel="stylesheet" href="../static/ogbam/w3.css">

    <!-- Twitter Card data -->
    <meta name="twitter:card" content="../static/img/bg.html">
    <meta name="twitter:title" content="<?php echo $web['name']; ?> - Buy Airtime and Data for all Network. Make payment for DSTV, GOTV, PHCN other services">
    <meta name="twitter:description" content="Buy Cheap Internet Data Plan and Airtime Recharge for Airtel, 9mobile, GLO, MTN, Pay DSTV, GOTV, PHCN.">
    <meta name="twitter:image:src" content="../static/img/bg.html">

    <!-- Open Graph data -->
    <meta property="og:locale" content="en_US">
    <meta property="og:title" content="<?php echo $web['name']; ?> - Buy Airtime and Data for all Network. Make payment for DSTV, GOTV, PHCN other services">
    <meta property="og:image" content="../static/img/bg.html">
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
		   

             
              <div class="outputc"> <?= $msg; ?></div>
			<h3 class="text-center">Reset Password</h3>
			 <form method="POST" >
                    <input type="hidden" name="csrfmiddlewaretoken" value="cbQhSFV8xnbXEsqjwH0rR2pVi63ZyeJPOYBKg3HjQu83rFSkNNbAnjNXEpayt9TZ">
			 <div class="form-group">
                        
                        


    
    <div id="div_id_username" class="form-group">
        
            <label for="id_username" class=" requiredField">
                Password<span class="asteriskField">*</span>
            </label>
        
 <div class="">
                    <input type="text" name="password" class="textinput textInput form-control" required id="id_username" value="<?php if (isset($password)) echo $password; ?>">
                     </div>
            
        
    </div>
    



    <div id="div_id_password" class="form-group">
        
            <label for="id_password" class=" requiredField">
            Confirm  Password<span class="asteriskField">*</span>
            </label>
        

         <div class="">
             <div class="input-group-addon">
                  <input type="password" name="cpassword"  class="textinput textInput form-control" required id="typepass" value="<?php if (isset($cpassword)) echo $cpassword; ?>">
                    
                     </div>
        
    </div>
    



               
			
<div class="form-group form-action-d-flex mb-3">
				
				   
					
					<button type="submit" name='sub'  class="btn btn-primary  mt-3 mt-sm-0 fw-bold"  ">Reset Pasword</button>
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

<?php
} else {
    echo "<script>document.location.href='index.php'; </script>";
  exit;
}

?>