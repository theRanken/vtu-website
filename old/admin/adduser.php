<?php
require_once '../core/conn.php';
session_start();
if(isset( $_SESSION['username'])) {
   
$musername=$mail['username'];
$mpassword=$mail['password'];
$host=$mail['host'];
$sender=$mail['sender'];

$sql = mysqli_query($con, "SELECT * FROM  mail");
            if 
            (mysqli_num_rows($sql) > 0){
              $mail = mysqli_fetch_assoc($sql);
            }
            
?>
<?php
$msg="";
if(isset($_POST['register'])) {
  $name = $_POST['name'];
  $username = $_POST['username']; 
  $email = $_POST['email']; 
  $phone = $_POST['phone'];
  $address = $_POST['address'];
  $ref = $_POST['ref']; 
  $status= $_POST['status'];
  $password = $_POST['password'];
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

if (empty($status))  {
    # code...
$msg= '<div class="alert alert-warning"><button type="button" class="close" data-dismiss="alert">×</button><strong>Please Choose a Status </strong></div>';
}else if(strlen($phone)<11)
{// Use form validation for this
  $msg='<div class="alert alert-warning"><button type="button" class="close" data-dismiss="alert">×</button><strong>Your phone number must be at least 11 digits!</strong></div>';
}else if(strlen($name)<5)
{// Use form validation for this
  $msg='<div class="alert alert-warning"><button type="button" class="close" data-dismiss="alert">×</button><strong>Please Enter Your Full Name</strong></div>';
}else if(mysqli_num_rows($result)==1){
      $msg='<div class="alert alert-warning"><button type="button" class="close" data-dismiss="alert">×</button><span class="btn btn-success">'.$phone.'</span> <strong>already used by another user!
      <br> Please try using a different phone number</strong></div>';

}else if(mysqli_num_rows($result2)==1)
{
      $msg='<div class="alert alert-warning"><button type="button" class="close" data-dismiss="alert">×</button><span class="btn btn-success">'.$email.'</span><strong> already used by another user!
      <br> Please try using a different Email Address</strong></div>';
}else if(mysqli_num_rows($res)==1)
{
  $msg='<div class="alert alert-warning"><button type="button" class="close" data-dismiss="alert">×</button><strong> <span class="btn btn-primary">'.$username.'</span><strong> already assigned to another customer,
  <br> Please try using a different Username</strong></div>';
}else if(strlen($password)<8)
  {
    // Checking the strenght of the user password
    $msg='<div class="alert alert-warning"><button type="button" class="close" data-dismiss="alert">×</button><strong>Password must contain at least 8 characters</strong></div>';

}else {
 $query=mysqli_query($con, "INSERT INTO user  (name,username,email,phone,address,ref,status,password1,password2,bal,refbal,date,kyc) VALUES ('$name','$username','$email','$phone','$address','$ref','$status','$password','$password','$bal','$refbal','$date',0)") or die(mysqli_error($con));
 if($query) {
            $otp = rand(100000,999999);
            $_SESSION['otp'] = $otp;
            $_SESSION['mail'] = $email;
            $_SESSION['id'] = $id;
            $_SESSION['name'] = $name;
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
            $mail->setFrom("$sender", "Registration Completed");
            $mail->addAddress("$email");
            $mail->isHTML(true);
            $mail->Subject = "Registration Completed";
            $mail->Body = $temp;         
            if(!$mail->send()){
                                
                                ?>        
                                    <script>
                                        alert("<?php echo "Registration Failed, Invalid Email ".$email?>");
                                    </script>
                                     <?php
                            }else{
                                ?>
                                <script>
                                    alert("<?php echo "You have successfully registered! ". $username?>");
                                   </script>
                               <?php
                            }
                            ?>
                            <?php
                }
            
}
        
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
				<a href="" class="logo" style="color: white;font-size: 19px;font-weight: bold;margin-right: -70px;"><?php echo $row['username']?></a>
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
	<?php require_once 'nav.php';?>
		<!-- End Sidebar -->
		<div class="main-panel ">

				
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://cdn.jsdelivr.net/npm/gasparesganga-jquery-loading-overlay@2.1.7/dist/loadingoverlay.min.js"></script>
<div class="container">
      <div class="container-fluid bg-secondary text-light"style="padding-bottom:10px;padding-top:5px;">

          <div class="row justify-content-end bg-secondary text-white" style="padding-top:0px;padding-right:10px;margin-top:0px;">
          <a class="btn btn-primary" href="users.php">
              <span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span>
             Users
            </a>
            </div>
</div>
                <?php echo $msg; ?>
                
<form method="POST" >
                    <input type="hidden" name="csrfmiddlewaretoken" value="cbQhSFV8xnbXEsqjwH0rR2pVi63ZyeJPOYBKg3HjQu83rFSkNNbAnjNXEpayt9TZ">
			 <div class="form-group">
			      <div class="row justify-content-center" style="margin-left:0px;margin-right:0px;">
                       <h5><strong><i class="fa fa-user"></i>Add New User</strong></h5>
                     </div>
                     <div id="div_id_network" class="form-group">
        
            <label for="id_network" class=" requiredField">
                Username <span class="asteriskField">*</span>
            </label>
              <div class="">
  <div class="input-group-addon">
                    <input type="text" name="username"  maxlength="" class="textinput textInput form-control" required id="id_username" value="<?php if (isset($username)) echo $username; ?>">
                     </div>
         
                   
 </div>
          
      
        
            <label for="id_username" class=" requiredField">
                Full Name<span class="asteriskField"></span>
            </label>
        
                   <div class="">
                      <div class="input-group-addon">
                    <input type="text" name="name"  class="textinput textInput form-control" required id="id_username" value="<?php if (isset($name)) echo $name; ?>">
                     </div>
                     
                     
        
            <label for="id_username" class=" requiredField">
                Phone Number<span class="asteriskField"></span>
            </label>
        
 <div class="">
     <div class="input-group-addon">
                    <input type="phone" name="phone"  maxlength="11" minlength="11"class="textinput textInput form-control" required id="id_username" value="<?php if (isset($phone)) echo $phone; ?>">
                     </div>
                      
  
        
        <label for="id_network" class=" requiredField">
                Email <span class="asteriskField">*</span>
            </label>
              <div class="">
  <div class="input-group-addon">
                    <input type="text" name="email"   class="textinput textInput form-control" required id="id_username" value="<?php if (isset($email)) echo $email; ?>">
                     </div>
                     
         <label for="id_network" class=" requiredField">
                Address <span class="asteriskField">*</span>
            </label>
              <div class="">
  <div class="input-group-addon">
                    <input type="text" name="address"   class="textinput textInput form-control" required id="id_username" value="<?php if (isset($password)) echo $password; ?>">
                     </div>
         
                   
 </div>
                   
 </div>
 
 <label for="id_network" class=" requiredField">
                Password <span class="asteriskField">*</span>
            </label>
              <div class="">
  <div class="input-group-addon">
                    <input type="password" name="password"  minlength="8" class="textinput textInput form-control" required id="id_username" value="<?php if (isset($password)) echo $password; ?>">
                     </div>
         
                   
 </div>
                   
 </div>
        
        
        
        
        
            <label for="id_disco_name" class=" requiredField">
            Status<span class="asteriskField"></span>
            </label>
        <div class="">
                    <select name="status" class="select form-control" required id="id_disco_name">
            
         <option value="" selected>---------</option>
          <option value="0">Unverified</option>

         <option value="1">Verified</option>
         <option value="2">Ban</option>
         </select>
                    
                </div>
            
        
    </div>
    <div class="row justify-content-center"  style="margin-left:0px;margin-right:0px;">
                       <div class="form-group">
                         <a href="dashboard.php" class="btn btn-danger fa-pull-right"> <i class="fa fa-chevron-left" aria-hidden="true"></i> Cancel </a>
                       </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                       <div class="form-group">
                         <button name="register" class="btn btn-primary fa-pull-right">Proceed <i class="fa fa-chevron-right" aria-hidden="true"></i></button>
                       </div>
                       </div>
                       </div>
                    
                 </form>

            
        </div>
    </div>






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
</script>



<?php require_once '../core/footer.php'; ?>	</body>
	</html>





 
	<?php
} else {
    echo "<script>document.location.href='../logout'; </script>";
  exit;
}

?>
</html>
	