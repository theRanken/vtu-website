<?php
require_once '../core/conn.php';
session_start();
$check=mysqli_query($con,"SELECT * FROM general WHERE status=1");
if(mysqli_num_rows($check)==1){
echo "<script>
alert('Registration Closed');
setTimeout(function(){ window.location.href='.$domain.' }, 1000);</script>";
exit;
}
$sql = mysqli_query($con, "SELECT * FROM  mail");
            if 
            (mysqli_num_rows($sql) > 0){
              $mail = mysqli_fetch_assoc($sql);
            }
            
$msg="";$msg2='';$msg3='';$msg4='';$msg5='';$msg6='';$msg7='';$msg1='';$msg65="";
$sql = mysqli_query($con, "SELECT * FROM  general");

$musername=$mail['username'];
$mpassword=$mail['password'];
$host=$mail['host'];
$sender=$mail['sender'];

if(isset($_POST['submit'])) {
  $name = $_POST['name'];
  $username = $_POST['username']; 
  $email = $_POST['email']; 
  $phone = $_POST['phone'];
  $address = $_POST['address'];
  $ref = $_POST['ref']; 
  $status="0";
  $password1 = $_POST['password1'];
  $password2 =$_POST['password2'];
  $bal ="0.0";
  $refbal="0.0";
  date_default_timezone_set('Africa/Lagos');
    $date = date("d/m/Y h:i");

  $res=mysqli_query($con,"SELECT * FROM user WHERE username='$username'");
  $result=mysqli_query($con,"SELECT * FROM user WHERE phone='$phone'");
  $result2=mysqli_query($con,"SELECT * FROM user WHERE email='$email'");
  $sql = mysqli_query($con, "SELECT * FROM  user WHERE username ='" . $_POST['ref']." ' ");
            if 
            (mysqli_num_rows($sql) > 0){
              $use = mysqli_fetch_assoc($sql);
            }

if ($_POST['password1']!==$_POST['password2']) {
    # code...
$msg= "<div class='alert alert-danger'>Your passwords did not match</div>";
}else if(strlen($phone)<11)
{// Use form validation for this
  $msg2="<div class='alert alert-danger'>Your phone number must be at least 11 digits!</div>";
}else if(strlen($name)<5)
{// Use form validation for this
  $msg65="<div class='alert alert-danger'>Please Enter Your Full Name</div>";
}else if(mysqli_num_rows($result)==1){
      $msg3="<div class='alert alert-danger'> <span class='btn btn-success'>$phone</span> already used by another user!
      <br> Please try using a different phone number</div>";

}else if(mysqli_num_rows($result2)==1)
{
      $msg6="<div class='alert alert-danger'><span class='btn btn-success'>$email</span> already used by another user!
      <br> Please try using a different Email Address</div>";
}else if(mysqli_num_rows($res)==1)
{
  $msg4="<div class='alert alert-danger'> <span class='btn btn-primary'>$username</span> already assigned to another customer,
  <br> Please try using a different Username</div>";
}else if(strlen($password1)<8)
  {
    // Checking the strenght of the user password
    $msg5="<div class='alert alert-danger'>Password must contain at least 8 characters</div>";

}else {
 $query=mysqli_query($con, "INSERT INTO user  (name,username,email,phone,address,ref,status,password1,password2,bal,refbal,date,kyc) VALUES ('$name','$username','$email','$phone','$address','$ref','$status','$password1','$password2','$bal','$refbal','$date',0)") or die(mysqli_error($con));
 if($query) {
            $otp = rand(100000,999999);
            $_SESSION['otp'] = $otp;
            $_SESSION['mail'] = $email;
            $_SESSION['id'] = $id;
            $_SESSION['name'] = $name;
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
            $mail->setFrom("$sender", "Regisration Verification");
            $mail->addAddress("$email");
            $mail->isHTML(true);
            $mail->Subject = "Register Verification";
            $mail->Body = $temp;         
            if(!$mail->send()){
                                
                                ?>        
                                    <script>
                                        alert("<?php echo "Register Failed, Invalid Email ".$email?>");
                                    </script>
                                     <?php
                            }else{
                                ?>
                                <script>
                                    alert("<?php echo "Register Successfully, OTP has been  sent to " . $email ?>");
                                    window.location.replace('verification.php');
                                </script>
                               <?php
                            }
                            ?>
                            <?php
                }
            
}
        
        }
      

?> 
<?php

if(!empty($_POST["ref"])){
            $id=mysqli_insert_id($con);
            $doThis=$con->query("INSERT INTO referral SET referrer_id=$id, referent_id='" . $use['id']." ', refusername='" . $_POST['ref']." ',referprice=0.0,status=0") or die(mysqli_error($con));
?>
  <?php
}
?>
                                    
        

<!DOCTYPE html>
<html lang="en">

<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>Signup - <?php echo $web['name']; ?> | Buy Data, Airtime to cash, Bills Payment</title>
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
    <meta property="og:title" content="<php echo $web['name'];?>- Buy Airtime and Data for all Network. Make payment for DSTV, GOTV, PHCN other services">
    <meta property="og:image" content="../static/img/bg.html">
    <meta property="og:description" content="Buy Cheap Internet Data Plan and Airtime Recharge for Airtel, 9mobile, GLO, MTN, Pay DSTV, GOTV, PHCN."/>
    <meta property="og:site_name" content="<php echo $web['name'];?>"/>
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
     height="500"  alt="<?php echo $web['name']; ?>"  style="height:40px !important" class="logo-sticky">
		
			</a></center>
			
			<h3 class="text-center">Sign Up </h3>
			 <form method="POST" >
                    <input type="hidden" name="csrfmiddlewaretoken" value="MddotYq2ToRQfXV8OReBVMTRiDopHoFIo0YRRmcdcvOW2an95XpKr3hTEWvYCjPS">
			 <div class="form-group">
                        
                        

  <div id="error_msg"></div>
    
    <div id="fname" class="form-group">
        
            <label for="fname" class=" requiredField">
                FullName<span class="asteriskField">*</span>
            </label>
        

        

        

        
            
                <div class="">
                    <input type="text" name="name"  class="textinput textInput form-control"   value="<?php if(isset($name)){echo $name;} ?>" required>
                    
                     </div>
            <?php echo $msg65; ?>
        
    </div>
    



            
                        


    
    <div id="div_id_username" class="form-group">
        
            <label for="id_username" class=" requiredField">
                Username<span class="asteriskField">*</span>
            </label>
        

        

        

        
            
                <div class="">
                    <input type="text" name="username" autofocus class="textinput textInput form-control"  id="id_username" value="<?php if(isset($username)){echo $username;} ?>" required>
                    
                    <?php echo $msg4; ?>


    




    



                </div>
            
        
    </div>
    



            
                        


    
    <div id="div_id_email" class="form-group">
        
            <label for="id_email" class=" requiredField">
                Email<span class="asteriskField">*</span>
            </label>
        

        

        

        
            
                <div class="">
                    <input type="email" name="email" maxlength="254" class="emailinput form-control"  id="id_email" value="<?php if(isset($email)){echo $email;} ?>" required>

                </div>     
    </div>
    <?php echo $msg6; ?>



            
                        


    
    <div id="div_id_Phone" class="form-group">
        
            <label for="id_Phone" class=" requiredField">
                Phone<span class="asteriskField">*</span>
            </label>
        

        

        

        
            
                <div class="">
                    <input type="text" name="phone" maxlength="11" minlength="11" class="textinput textInput form-control"  id="id_Phone" value="<?php if(isset($phone)){echo $phone;} ?>" required>
                    
                </div>    
    </div>
    <?php echo $msg2; ?>
    <?php echo $msg3; ?>



            
                        


    
    <div id="div_id_Address" class="form-group">
        
            <label for="id_Address" class=" requiredField">
                Address<span class="asteriskField">*</span>
            </label>
        

        

        

        
            
                <div class="">
                    <input type="text" name="address" maxlength="500" class="textinput textInput form-control" id="id_Address" value="<?php if(isset($address)){echo $address;} ?>" required>
                    


    




    



                </div>
            
        
    </div>
    



            
                        


    
    <div id="div_id_referer_username" class="form-group">
        
            <label for="ref" class="">
                Referral username [optional]
            </label>
        

        

        

        
            
                <div class="">
                    
                    <input type="text" name="ref" class="textinput textInput form-control"  id="ref" value="<?php if(isset($ref)){echo $ref;} ?>" oninput="checkref()" >
                   
                    <span id="check-ref"></span>
    
        <small id="hint_id_referer_username" class="form-text text-muted">Leave blank if no referral</small>
    




                </div>
            
        
    </div>
    



            
                        


    
    <div id="div_id_password1" class="form-group">
        
            <label for="id_password1" class=" requiredField">
                Password<span class="asteriskField">*</span>
            </label>
        

        

        

        
            
                <div class="">
                    <input type="password" name="password1" class="textinput textInput form-control"  id="id_password1" value="<?php if(isset($password1)){echo $password1;} ?>" required>
                    


    




    
    
        <small id="hint_id_password1" class="form-text text-muted">min_lenght-8 mix characters [i.e musa1234] </small>
    




                </div>
            
        
    </div>
<?php echo $msg; ?>    
<?php echo $msg5; ?>


            
                        


    
    <div id="div_id_password2" class="form-group">
        
            <label for="id_password2" class=" requiredField">
                Confirm Password<span class="asteriskField">*</span>
            </label>
        

        

        

        
            
                <div class="">
                    <input type="password" name="password2" class="textinput textInput form-control" id="id_password2" value="<?php if(isset($password2)){echo $password2;} ?>" required>
                


    




    
    
        <small id="hint_id_password2" class="form-text text-muted">Enter same password as before</small>
    




                </div>
            
        
    </div>
    



               
            <div class="row form-sub m-0">
					<div class="custom-control custom-checkbox">
						<input type="checkbox" class="custom-control-input" name="agree" id="agree" required>
						<label class="custom-control-label" for="agree"><a href="../terms">I Agree the terms and conditions.</a></label>
					</div>
				</div>
			
<div class="form-group form-action-d-flex mb-3">
				
					
					<button type="submit" name="submit" id="submit" class="btn btn-primary  mt-3 mt-sm-0 fw-bold" >Sign Up</button>
				</div>
			
			
				<div class="login-account">
					<span class="msg">Already a member?</span>
					<a href="../login/" id="show-signup" class="link">Sign In</a>
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
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
function checkref() {
    
    jQuery.ajax({
    url: "ref.php",
    data:'ref='+$("#ref").val(),
    type: "POST",
    success:function(data){
        $("#check-ref").html(data);
    },
    error:function (){}
    });
}
</script>
</body>
</html>