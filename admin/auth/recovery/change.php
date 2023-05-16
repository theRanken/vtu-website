<?php
require_once '../../../core/conn.php';

$email= "";
$msg = "";

if (isset($_POST['submit'])) {
    $email = mysqli_real_escape_string($con, $_POST['email']);


    $get_account = "SELECT * FROM admin WHERE email='$email' ";
    $result = mysqli_query($con, $get_account);


    if (mysqli_num_rows($result) > 0){
        $msg = "<h5 class='alert alert-success'><br>We just sent you a recovery email with details to reset your password.<br></h5>";
        // echo "<script>document.location.href = '/admin/dashboard.php';</script>";
    }else{
         $msg = "<h5 class='alert alert-error'><br>Oops!! No Account with that email was found try gain with an email you remember using on this site.<br></h5>";
    }
}
?>
<!doctype html>
<html lang="en">
  <head>
  	<title>DATA PLAN - Change Password</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="css/style.css">
	</head>
	<body>
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">
					<h2 class="heading-section">DATA PLAN - ADMIN DASHBOARD</h2>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-md-6 col-lg-5">
					<div class="login-wrap p-4 p-md-5">
		      	<div class="icon d-flex align-items-center justify-content-center">
		      		<span class="fa fa-user-o"></span>
		      	</div>
		      	<h3 class="text-center mb-4">Change Password</h3>
		            <?php echo $msg; ?>
					<form  class="login-form" method="POST">
                        <div class="form-group">
                            <input type="text" name="old" class="form-control rounded-left" placeholder="Enter Your Email" required>
                            <input type="text" name="new" class="form-control rounded-left" placeholder="Enter Your Email" required>
                            <input type="text" name="new-confirm" class="form-control rounded-left" placeholder="Enter Your Email" required>
                        </div>
                        <div class="form-group">
                            <button type="submit" name="submit" class="btn btn-primary rounded submit p-3 px-5">Set New Password</button>
                        </div>
                    </form>
	        </div>
				</div>
			</div>
		</div>
	</section>

        <script src="js/jquery.min.js"></script>
        <script src="js/popper.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/main.js"></script>

	</body>
</html>

