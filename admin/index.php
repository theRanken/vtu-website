<?php
require_once '../core/conn.php';

$username = "";
$password = "";
$msg = "";

if (isset($_POST['submit'])) {
    $username = mysqli_real_escape_string($con, $_POST['username']);
    $password = mysqli_real_escape_string($con, $_POST['password']);


    $query1 = "SELECT * FROM admin WHERE username='$username' AND password1='$password' AND status=1 ";
    $result1 = mysqli_query($con, $query1);

    $query2 = "SELECT * FROM admin WHERE username='$username' AND password1='$password'  AND status=0 ";
    $result2 = mysqli_query($con, $query2);

    $query3 = "SELECT * FROM admin WHERE username='$username' AND password1='$password'  AND status=2 ";
    $result3 = mysqli_query($con, $query3);


    if (mysqli_num_rows($result1) == 1) {
        while ($row = mysqli_fetch_array($result1)) {
            $id = $row['id'];
            $username = $row['username'];
            $password = $row['password1'];
        }
        session_start();
        $_SESSION['admin'] = $id;
        $_SESSION['admin_username'] = $username;
        $_SESSION['admin_password'] = $password;

?>
<script>
document.location.href = '/admin/dashboard.php';
</script>
<?php
} else if (mysqli_num_rows($result2) == 1) {
	$msg = "<h4 class='alert alert-danger'> Sorry <h5 class='alert alert-secondary'>$username</h5> Your account is not active, contact the admin</h4>";
} else if (mysqli_num_rows($result3) == 1) {
	$msg = "<h4 class='alert alert-danger'> Sorry <h5 style='color:red; font-weight:bold; font-size:20px;'>$username</h5> Your account has been banned because you look to have breached our law(s). Contact <h5 class='btn btn-primary'>Admin</h5> <sph5an> to unban your account again</h5></h4>";
?>
<?php

    } else {
        $msg = "<h5 class='alert alert-warning'><br>Oops!! You have entered wrong username or password! Please provide your account correct login details and try again.<br></h5>";
    }
}

?>


<!doctype html>
<html lang="en">
  <head>
  	<title>DATA PLAN - Admin Dashboard</title>
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
		      	<h3 class="text-center mb-4">Welcome Back Admin</h3>
		               	<?php echo $msg; ?>
						<form  class="login-form" method="POST">
		      		<div class="form-group">
		      			<input type="text" name="username" class="form-control rounded-left" placeholder="Username" required>
		      		</div>
	            <div class="form-group d-flex">
	              <input type="password" name="password" class="form-control rounded-left" placeholder="Password" required>
	            </div>
	            <div class="form-group d-md-flex">
	            	<div class="w-50">
	            		<label class="checkbox-wrap checkbox-primary">Remember Me
									  <input type="checkbox" checked>
									  <span class="checkmark"></span>
									</label>
								</div>
								<div class="w-50 text-md-right">
									<a href="./auth/recovery/">Forgot Password</a>
								</div>
	            </div>
	            <div class="form-group">
	            	<button type="submit" name="submit" class="btn btn-primary rounded submit p-3 px-5">Get Started</button>
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

