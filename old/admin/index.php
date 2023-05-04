<?php 

require_once '../core/conn.php';

$username = "";
$password1 = "";
$msg="";
            
if (isset($_POST['sub'])) {
    $username = mysqli_real_escape_string ($con,$_POST['username']);
    $password1 = mysqli_real_escape_string ($con,$_POST['password1']);
    
    
    $query1 = "SELECT * FROM admin WHERE username='$username' AND password1='$password1' AND status=1 ";
    $result1 = mysqli_query($con, $query1);
    
     $query2 = "SELECT * FROM admin WHERE username='$username' AND password1='$password1'  AND status=0 ";
    $result2 = mysqli_query($con, $query2);
    
    $query3 = "SELECT * FROM admin WHERE username='$username' AND password1='$password1'  AND status=2 ";
    $result3 = mysqli_query($con, $query3);
    
    
    if (mysqli_num_rows($result1) == 1) {
        while ($row = mysqli_fetch_array($result1)) {
            $id = $row['id'];
            $username = $row['username'];
            $password1 = $row['password1'];
        
        }
        session_start();
        $_SESSION['id'] = $id;
        $_SESSION['username'] = $username;
        $_SESSION['password1'] = $password1;
        
?>

        <script>
            document.location.href = 'dashboard.php';
        </script>
<?php
    } else if (mysqli_num_rows($result2) == 1) {

        $msg = "<h4 class='alert alert-danger'> Sorry <h5 class='alert alert-secondary'>$username</h5> Your account is not active,
     contact the admin</h4>";
    } else if (mysqli_num_rows($result3) == 1) {
        $msg = "<h4 class='alert alert-danger'> Sorry <h5 style='color:red; font-weight:bold; font-size:20px;'>$username</h5> Your account 
   has been banned because you look to have breached our law(s). Contact 
    <h5 class='btn btn-primary'>Admin</h5> <sph5an> to unban your account</h5></h4>";
    ?>
<?php

    } else {
        $msg = "<h5 class='alert alert-warning'><br>
     Oops!! You have entered wrong username or password!
    Please provide your account correct login details and try again.<br></h5>";
    }
}

?>




<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>Admin - <?php echo $web['name']; ?> | Buy Data, Airtime to cash, Bills Payment</title>
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
		   

             <center> <a href="../index.php" class="logo">
                                  <img src="../upload/<?=$web['image']?>"  width="300" 
     height="500"  alt="<?php echo $web['name']; ?>"  style="height:40px !important" class="logo-sticky">
              
              </a></center>
              <div class="outputc"> <?= $msg; ?></div>
			<h3 class="text-center">Admin Dashboard </h3>
			 <form method="POST" >
                    <input type="hidden" name="csrfmiddlewaretoken" value="cbQhSFV8xnbXEsqjwH0rR2pVi63ZyeJPOYBKg3HjQu83rFSkNNbAnjNXEpayt9TZ">
			 <div class="form-group">
                        
                        


    
    <div id="div_id_username" class="form-group">
        
            <label for="id_username" class=" requiredField">
                Username<span class="asteriskField">*</span>
            </label>
        
 <div class="">
                    <input type="text" name="username"  maxlength="150" class="textinput textInput form-control" required id="id_username" value="<?php if (isset($username)) echo $username; ?>">
                     </div>
            
        
    </div>
    



    <div id="div_id_password" class="form-group">
        
            <label for="id_password" class=" requiredField">
                Password<span class="asteriskField">*</span>
            </label>
        

         <div class="">
             <div class="input-group-addon">
                  <input type="password" name="password1"  class="textinput textInput form-control" required id="typepass" value="<?php if (isset($password1)) echo $password1; ?>">
                    
                     </div>
        
    </div>
    <br>
    <input type="checkbox" onclick="Toggle()"> Show Password



               
			
<div class="form-group form-action-d-flex mb-3">
				
				   <a href="#" class="link float-right">Forgot Password ?</a>
					
					<button type="submit" name='sub'  class="btn btn-primary  mt-3 mt-sm-0 fw-bold"  ">Sign In</button>
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
<script>
    $("#menu-toggle").click(function(e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    });
    
    // Change the type of input to password or text 
                function Toggle() { 
                    var temp = document.getElementById("typepass"); 
                    if (temp.type === "password") { 
                        temp.type = "text"; 
                    } 
                    else { 
                        temp.type = "password"; 
                    } 
                } 
  </script>
</html> 