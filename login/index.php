<?php
require_once '../core/conn.php';

$sql = mysqli_query($con, "SELECT * FROM  general");
if (mysqli_num_rows($sql) > 0) {
    $web = mysqli_fetch_assoc($sql);
}
@$name = $_SESSION['name'];
$msg = "";
$username = "";
$password = "";
$password = "";
$ip = $_SERVER['REMOTE_ADDR'];
if (isset($_POST['sub'])) {
    $username = mysqli_real_escape_string($con, $_POST['username']);
    $pass = mysqli_real_escape_string($con, $_POST['pass']);
    $password = substr(sha1(md5($pass)), 3, 10);

    $query1 = "SELECT * FROM user WHERE (username='$username' OR email='$username') AND password='$password' AND status=1 ";
    $result1 = mysqli_query($con, $query1);

    $query2 = "SELECT * FROM user WHERE (username='$username'OR email='$username') AND password='$password'  AND status=0 ";
    $result2 = mysqli_query($con, $query2);

    $query3 = "SELECT * FROM user WHERE (username='$username'OR email='$username') AND password='$password'  AND status=2 ";
    $result3 = mysqli_query($con, $query3);

    if (mysqli_num_rows($result1) == 1) {
        while ($row = mysqli_fetch_array($result1)) {
            $id = $row['id'];
            $username = $row['username'];
            $password = $row['password'];
            $name = $row['name'];
            $type = $row['type'];
            $update = $updat = mysqli_query($con, "UPDATE user SET ip='$ip' WHERE username='$username'");
        }
        session_start();
        $_SESSION['id'] = $id;
        $_SESSION['password'] = $password;
        $_SESSION['name'] = $name;
?>

        <script>
            document.location.href = '../dashboard';
        </script>

    <?php
    } else if (mysqli_num_rows($result2) == 1) {
    ?>
        <script>
            $msg = "<h4 class='alert alert-danger'> Sorry <h5 class='alert alert-secondary'>$username</h5> Your Account has not been verified <a href = '../signup/verification.php' > Click Here To Verify Your Account < /a></h4 > ";
        </script>
    <?php
    } else if (mysqli_num_rows($result3) == 1) {
        $msg = "<h4 class='alert alert-danger'> Sorry <h5 style='color:red; font-weight:bold; font-size:20px;'>$username</h5> Your Account 
   has been Banned because you look to have breached our law(s). Contact 
    <h5 class='btn btn-primary'>Admin</h5> <sph5an> to Unban your account again</h5></h4>";
    ?>
<?php
    } else {
        $msg = "<h5 class='alert alert-warning'><br>
     Oops!! You have entered wrong username or password!
    Please provide your account correct login details and try again.<br></h5>";
    }
}

?>
<?php require_once "../oauth/googleClientLogin.php"; ?>
<?php require_once "../oauth/FBClientLogin.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!------- seo started here</------->
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="msapplication-TileImage" content="../static/img/bg.html">
    <meta itemprop="name" content="kingnaija - Buy Airtime and Data for all Network. Make payment for DSTV, GOTV, PHCN other services">
    <meta itemprop="description" content="Buy Cheap Internet Data Plan and Airtime Recharge for Airtel, 9mobile, GLO, MTN, Pay DSTV, GOTV, PHCN.">
    <meta itemprop="image" content="../static/img/bg.html">
    <link rel="stylesheet" href="../static/ogbam/w3.css">

    <!-- Twitter Card data -->
    <meta name="twitter:card" content="../static/img/bg.html">
    <meta name="twitter:title" content="kingnaija - Buy Airtime and Data for all Network. Make payment for DSTV, GOTV, PHCN other services">
    <meta name="twitter:description" content="Buy Cheap Internet Data Plan and Airtime Recharge for Airtel, 9mobile, GLO, MTN, Pay DSTV, GOTV, PHCN.">
    <meta name="twitter:image:src" content="../static/img/bg.html">

    <!-- Open Graph data -->
    <meta property="og:locale" content="en_US">
    <meta property="og:title" content="kingnaija - Buy Airtime and Data for all Network. Make payment for DSTV, GOTV, PHCN other services">
    <meta property="og:image" content="../static/img/bg.html">
    <meta property="og:description" content="Buy Cheap Internet Data Plan and Airtime Recharge for Airtel, 9mobile, GLO, MTN, Pay DSTV, GOTV, PHCN." />
    <meta property="og:site_name" content="kingnaija " />
    <meta property="og:url" content="../index.html">
    <meta property="og:type" content="website">

    <!--favicon icon-->
    <link rel="icon" href="/upload/<?php echo $web['image']; ?>" type="image/png" sizes="16x16">

    <!--title-->
    <title>Login - AIMACONNECT | Buy Data, Airtime to cash, Bills Payment</title>

    <!--build:css-->
    <link rel="stylesheet" href="/adex/assets/css/main.css">
    <!-- endbuild -->
</head>

<body>

    <!--preloader start-->
    <!-----<div id="preloader">
        <div class="preloader-wrap">
            <img src="/adex/assets/img/logo-color.png" alt="logo" class="img-fluid" />
            <div class="thecube">
                <div class="cube c1"></div>
                <div class="cube c2"></div>
                <div class="cube c4"></div>
                <div class="cube c3"></div>
            </div>
        </div>
    </div>----->
    <!--preloader end-->
    <section class="page-header-section ptb-100 bg-image full-height" image-overlay="8">
        <div class="background-image-wraper" style="background: url('/upload/images.jpg'); opacity: 1;"></div>
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-12 col-md-8 col-lg-6">
                    <div class="login-signup-wrap p-5 gray-light-bg rounded shadow">
                        <div class="login-signup-header text-center">
                            <a href="/index.php">
                                <!---<img src="/adex/assets/img/logo-color.png" class="img-fluid mb-3" alt="Logo">---->
                                <h3><span style="color:red;">AIMACONNECT</h3>
                                <?php
                                    if(isset($_SESSION['GoogleError'])){
                                        echo "<div class='my-2 alert alert-danger alert-dismissible'>";
                                        echo $_SESSION['GoogleError'];
                                        echo "</div>";
                                        unset($_SESSION['GoogleError']);
                                    }
                                ?>
                            </a>
                            <h4 class="mb-5">Login Your Account</h4>
                        </div>
                        <? echo $msg; ?>
                        <form class="login-signup-form" method="POST">
                            <div class="form-group">
                                <!-- Label -->
                                <label class="pb-1">
                                    Email Address or Username
                                </label>
                                <!-- Input group -->
                                <div class="input-group input-group-merge">
                                    <div class="input-icon">
                                        <span class="ti-email"></span>
                                    </div>
                                    <input type="text" class="form-control" placeholder="user@gmail.com or user" name="username">
                                </div>
                            </div>

                            <!-- Password -->
                            <div class="form-group">
                                <!-- Label -->
                                <label class="pb-1 d-flex justify-content-between align-items-center">
                                    <div>Password</div>
                                    <div class="text-muted">
                                        <a href="../reset/">Forgot Password</a>
                                    </div>
                                </label>
                                <!-- Input group -->
                                <div class="input-group input-group-merge">
                                    <div class="input-icon">
                                        <span class="ti-lock"></span>
                                    </div>
                                    <input type="password" class="form-control" placeholder="Enter your password" name="pass">
                                </div>
                            </div>

                            <!-- Submit -->
                            <button type="submit" name="sub" class="btn btn-block btn-brand-02 border-radius mt-4 mb-3">
                                Login Now
                            </button>
                        </form>
                        <div class="other-login-signup my-3">
                            <div class="or-login-signup text-center">
                                <strong>Or Login With</strong>
                            </div>
                        </div>
                        <ul class="list-inline social-login-signup text-center">
                            <li class="list-inline-item my-1">
                                <a href="javascript:location='<?php echo $FBClientAuthURL ?>'" class="btn btn-facebook"><i class="fab fa-facebook-f pr-1"></i> Facebook</a>
                            </li>
                            <li class="list-inline-item my-1">
                                <a href="javascript:location='<?php echo $googleAuthUrl ?>'" class="btn btn-google"><i class="fab fa-google pr-1"></i> Google</a>
                            </li> 
                            <li class="list-inline-item my-1">
                                <a href="#" class="btn btn-instagram"><i class="fab fa-twitter pr-1"></i> Instagram</a>
                            </li>
                        </ul>
                        <p class="text-center mb-0">Don't have an account? <a href="/signup">Register</a></p>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6">
                    <div class="copyright-wrap small-text text-center mt-5 text-white">
                        <p class="mb-0">&copy; AIMACONNECT vtu, All rights reserved</p>
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
    <!--endbuild-->
</body>

</html>