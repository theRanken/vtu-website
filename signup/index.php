<?php
require_once '../core/conn.php';
session_start();
$check = mysqli_query($con, "SELECT * FROM general WHERE status=1");
if (mysqli_num_rows($check) == 1) {
    echo "<script>
alert('Registration Closed');
 window.location.href='.$domain.';</script>";
    exit;
}
$ipaddress = $_SERVER['REMOTE_ADDR'];

$chekd = mysqli_query($con, "SELECT * FROM setting");
$setting = mysqli_fetch_array($chekd);
$malier = $setting['email'];


$sql = mysqli_query($con, "SELECT * FROM  mail");
if (mysqli_num_rows($sql) > 0) {
    $mail = mysqli_fetch_assoc($sql);
}

$refcom = mysqli_query($con, "SELECT * FROM general");
if (mysqli_num_rows($refcom) > 0) {
    $refN = mysqli_fetch_assoc($refcom);
    $refComm = $refN['referprice'];
}

$qrysite = mysqli_query($con, "SELECT * FROM setting");
$setting = mysqli_fetch_array($qrysite);
$sendmail = $setting['email'];
if ($sendmail == '1') {
    $status = "0";
} else {
    $status = "1";
}

$msg = "";
$msg2 = '';
$msg3 = '';
$msg4 = '';
$msg5 = '';
$msg6 = '';
$msg7 = '';
$msg1 = '';
$msg65 = "";
$sql = mysqli_query($con, "SELECT * FROM  general");

$musername = $mail['username'];
$mpassword = $mail['password'];
$host = $mail['host'];
$sender = $mail['sender'];

if (isset($_POST['submit'])) {
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $username =  mysqli_real_escape_string($con, $_POST['username']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $phone =  mysqli_real_escape_string($con, $_POST['phone']);
    $ref =  mysqli_real_escape_string($con, $_POST['ref']);
    $password =  mysqli_real_escape_string($con, $_POST['password']);
    $password2 =  mysqli_real_escape_string($con, $_POST['password2']);
    $bal = "0.0";
    $refbal = "0.0";
    date_default_timezone_set('Africa/Lagos');
    $date = date("d/m/Y h:i");
    $type = "SMART";
    $res = mysqli_query($con, "SELECT * FROM user WHERE username='$username'");
    $result = mysqli_query($con, "SELECT * FROM user WHERE phone='$phone'");
    $result2 = mysqli_query($con, "SELECT * FROM user WHERE email='$email'");
    $sql = mysqli_query($con, "SELECT * FROM  user WHERE username ='" . $_POST['ref'] . " ' ");
    $hash = substr(sha1(md5($password)), 3, 10);
    $apikey = substr(str_shuffle("0123456789ABCDEFGHIJklmnopqrstvwxyzAbAcAdAeAfAgAhBaBbBcBdC1C23C3C4C5C6C7C8C9xix2x3"), 0, 60);

    $ipaddress = $_SERVER['REMOTE_ADDR'];
    $userip = mysqli_query($con, "SELECT * FROM user WHERE ip ='$ipaddress'");


    if (mysqli_num_rows($sql) > 0) {
        $use = mysqli_fetch_assoc($sql);
    }

    if ($_POST['password'] !== $_POST['password2']) {
        # code...
        $msg = "<div class='alert alert-danger'>Your passwords did not match</div>";
    } else if (strlen($phone) < 11) { // Use form validation for this
        $msg2 = "<div class='alert alert-danger'>Your phone number must be at least 11 digits!</div>";
    } else if (strlen($name) < 5) { // Use form validation for this
        $msg65 = "<div class='alert alert-danger'>Please Enter Your Full Name</div>";
    } else if (mysqli_num_rows($result) == 1) {
        $msg3 = "<div class='alert alert-danger'> <span class='btn btn-success'>$phone</span> already used by another user!
      <br> Please try using a different phone number</div>";
    } else if (mysqli_num_rows($result2) == 1) {
        $msg6 = "<div class='alert alert-danger'><span class='btn btn-success'>$email</span> already used by another user!
      <br> Please try using a different Email Address</div>";
    } else if (mysqli_num_rows($res) == 1) {
        $msg4 = "<div class='alert alert-danger'> <span class='btn btn-primary'>$username</span> already assigned to another customer,
  <br> Please try using a different Username</div>";
    } else if (strlen($password) < 8) {
        // Checking the strenght of the user password
        $msg5 = "<div class='alert alert-danger'>Password must contain at least 8 characters</div>";
    } elseif ((mysqli_num_rows($userip) == 1)) {
        $msg6 = "<div class='alert alert-danger'><span class='btn btn-success'>$username</span> you are not allowed to create two account
      <br>message the admin for help</div>";
    } else {
        if (!empty($ref)) {
            $refUser = mysqli_query($con, "SELECT * FROM user WHERE username='$ref'");
            if (mysqli_num_rows($refUser) < 1) {
                $msg2 = "<div class='alert alert-danger'>Referral does not exist. Please enter a valid Referral or leave the field blank</div>";
            }
            $refDetails = mysqli_fetch_assoc($refUser);
            $refbalz = $refDetails['refbal'];
            $refAm = $refComm + $refbalz;
            mysqli_query($con, "UPDATE user SET refbal='$refAm' WHERE username='$ref'");
        }
        $query = mysqli_query($con, "INSERT INTO user  (name,username,email,phone,ref,status,password,type,bal,refbal,date,kyc,apikey,ip) 
        VALUES ('$name','$username','$email','$phone','$ref','$status','$hash','$type','$bal','$refbal','$date',0,'$apikey','$ipaddress')") or die(mysqli_error($con));


        if ($query) {
            if ($malier == '1') {
                function LogoutTime($str)
                {
                    $pdate = new DateTime(); // For today/now, don't pass an arg.
                    $pdate->modify($str);

                    return strtotime($pdate->format("Y-m-d H:i:s"));
                }
                $log = LogoutTime("+1 hour");
                $otp = rand(100000, 999999);
                $used = "0";
                //check for already existing record
                $check_record = mysqli_query($con, "SELECT * FROM otp WHERE username='$username' OR email='$email'");
                if (mysqli_num_rows($check_record) > 0) {
                    echo "<div class='alert alert-danger'>User already exist please click <a href='verify.php'>here</a> to verify your account</div>";
                } else {
                    //insert token to database for verification purposes
                    $insert_otp = mysqli_query($con, "INSERT INTO otp (username,email,reg_otp,time_sent,status) VALUE('$username','$email','$otp','$log','$used')");
                    $_SESSION['password'] = $password;
                    if ($insert_otp) {

                        $_SESSION['otp'] = $otp;
                        $_SESSION['mail'] = $email;
                        $_SESSION['name'] = $name;
                        @require "../Mail/phpmailer/PHPMailerAutoload.php";
                        require_once "../assets/otp.php";
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
                        if (!$mail->send()) {

?>
                            <script>
                                alert("<?php echo "There was a problem sending otp to " . $email ?>");
                                window.location.replace('verification.php');
                            </script>
                        <?php
                        } else {
                        ?>
                            <script>
                                alert("<?php echo "OTP has been  sent to " . $email ?> Please verify your email");
                                window.location.replace('verification.php');
                            </script>
                <?php
                        }
                    } else {
                        echo "<div class='alert alert-danger'>There was a problem with the registration proccess, please try again later </div>";
                        $delete_acct = mysqli_query($con, "DELETE FROM user WHERE username='$username' && email='$email'");
                    }
                }

                ?>
                <?php




            } else {
                @require "../Mail/phpmailer/PHPMailerAutoload.php";
                require_once '../core/v.php';
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
                $mail->setFrom("$sender", "welcome Email");
                $mail->addAddress("$email");
                $mail->isHTML(true);
                $mail->Subject = "welcome Email";
                $mail->Body = $temp;
                if (!$mail->send()) {

                ?>
                    <script>
                        alert("You have successfuly registered on our website");
                        window.location.replace('../login');
                    </script>
                <?php
                } else {
                ?>
                    <script>
                        alert("you have successfully registered on our website");
                        window.location.replace('../login');
                    </script>
<?php
                }
            }
        } else {
            echo "<div class='alert alert-danger'>Registration was not successful please try again later </div>";
        }
    }
}


?>
<?php require_once "../oauth/googleClientLogin.php"; ?>
<?php require_once "../oauth/FBClientLogin.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Signup - AIMACONNECT | Buy Data, Airtime to cash, Bills Payment</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="theme-color" content="#1B0569">

    <!-- Favicon -->
    <link rel="icon" href="/upload/<?php echo $web['image']; ?>" type="image/x-icon">

    <!-- <meta name="msapplication-TileColor" content="#5230b0 "> -->
    <meta name="msapplication-TileImage" content="../new/img/bg.html">
    <meta itemprop="name" content="data nead - Buy Airtime and Data for all Network. Make payment for DSTV, GOTV, PHCN other services">
    <meta itemprop="description" content="Buy Cheap Internet Data Plan and Airtime Recharge for Airtel, 9mobile, GLO, MTN, Pay DSTV, GOTV, PHCN.">
    <meta itemprop="image" content="../new/img/bg.html">
    <link rel="stylesheet" href="../new/ogbam/w3.css">

    <!-- Twitter Card data -->
    <meta name="twitter:card" content="../new/img/bg.html">
    <meta name="twitter:title" content="data nead - Buy Airtime and Data for all Network. Make payment for DSTV, GOTV, PHCN other services">
    <meta name="twitter:description" content="Buy Cheap Internet Data Plan and Airtime Recharge for Airtel, 9mobile, GLO, MTN, Pay DSTV, GOTV, PHCN.">
    <meta name="twitter:image:src" content="../new/img/bg.html">

    <!-- Open Graph data -->
    <meta property="og:locale" content="en_US">
    <meta property="og:title" content="data nead - Buy Airtime and Data for all Network. Make payment for DSTV, GOTV, PHCN other services">
    <meta property="og:image" content="../new/img/bg.html">
    <meta property="og:description" content="Buy Cheap Internet Data Plan and Airtime Recharge for Airtel, 9mobile, GLO, MTN, Pay DSTV, GOTV, PHCN." />
    <meta property="og:site_name" content="data nead " />
    <meta property="og:url" content="../index.php">
    <meta property="og:type" content="website">
    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
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
            </div>F
        </div>
    </div>
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
                            </a>
                            <h3><span style="color:red;">AIMACONNECT</h3>
                            <h4 class="mb-5">Sign Up</h4>
                        </div>
                        <form class="login-signup-form" method="POST">
                            <div class="form-group">
                                <!-- Label -->
                                <label class="pb-1">
                                    Enter your full name
                                </label>
                                <!-- Input group -->
                                <div class="input-group input-group-merge">
                                    <div class="input-icon">
                                        <span class="ti-user"></span>
                                    </div>
                                    <input type="text" class="form-control" placeholder="Enter your name" name="name" required value="<?php if (isset($_POST['name'])) echo $name; ?>">
                                </div>
                                <?php echo $msg65; ?>
                            </div>
                            <div class="form-group">
                                <!-- Label -->
                                <label class="pb-1">
                                    Enter username
                                </label>
                                <!-- Input group -->
                                <div class="input-group input-group-merge">
                                    <div class="input-icon">
                                        <span class="ti-user"></span>
                                    </div>
                                    <input type="text" class="form-control" placeholder="Enter your username" name="username" required value="<?php if (isset($_POST['username'])) echo $username; ?>">
                                </div>
                                <?php echo $msg4; ?>
                            </div>
                            <div class="form-group">
                                <!-- Label -->
                                <label class="pb-1">
                                    Email Address
                                </label>
                                <!-- Input group -->
                                <div class="input-group input-group-merge">
                                    <div class="input-icon">
                                        <span class="ti-email"></span>
                                    </div>
                                    <input type="email" class="form-control" placeholder="abbanyayavtu@gmail.com" name="email" required value="<?php if (isset($_POST['email'])) echo $email; ?>">
                                </div>
                                <?php echo $msg6; ?>
                            </div>

                            <div class="form-group">
                                <!-- Label -->
                                <label class="pb-1">
                                    Enter your Phone Number
                                </label>
                                <!-- Input group -->
                                <div class="input-group input-group-merge">
                                    <div class="input-icon">
                                        <span class="ti-mobile"></span>
                                    </div>
                                    <input type="number" class="form-control" placeholder="Enter phone number e.g 07060764090" name="phone" required value="<?php if (isset($_POST['phone'])) echo $phone; ?>">
                                </div>
                                <?php echo $msg2; ?>
                                <?php echo $msg3; ?>
                            </div>

                            <div class="form-group">
                                <!-- Label -->
                                <label class="pb-1">
                                    Referral Username [optional]
                                </label>
                                <!-- Input group -->
                                <div class="input-group input-group-merge">
                                    <div class="input-icon">
                                        <span class="ti-user"></span>
                                    </div>
                                    <input type="text" class="form-control" placeholder="referral username" name="ref" id="ref" oninput="checkref()">
                                    <p>
                                </div>
                                <span id="check-ref"></span>
                                <small id="hint_id_referer_username" class="form-text text-muted">Leave blank if no referral</small>
                                <?php echo $msg2; ?>
                            </div>

                            <!-- Password -->
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
                                    <input type="password" min="8" class="form-control" placeholder="Enter your password" name="password" required value="<?php if (isset($_POST['password'])) echo $password; ?>">
                                </div>
                                <small id="hint_id_referer_username" class="form-text text-muted">min_lenghht-8 mix characters [i.e Abba1234]</small>
                                <?php echo $msg; ?>
                                <?php echo $msg5; ?>
                            </div>
                            <!--  con Password -->
                            <div class="form-group">
                                <!-- Label -->
                                <label class="pb-1">
                                    Confirm Password
                                </label>
                                <!-- Input group -->
                                <div class="input-group input-group-merge">
                                    <div class="input-icon">
                                        <span class="ti-lock"></span>
                                    </div>
                                    <input type="password" min="8" class="form-control" placeholder="Confirm the password" name="password2" required value="<?php if (isset($_POST['password2'])) echo $password2; ?>">
                                </div>
                            </div>

                            <div class="my-4">
                                <div class="custom-control custom-checkbox mb-3">
                                    <input type="checkbox" class="custom-control-input" id="check-terms" required>
                                    <label class="custom-control-label small-text" for="check-terms">I agree to the <a href="/terms">Terms &amp; Conditions</a></label>
                                </div>
                            </div>

                            <!-- Submit -->
                            <button type="submit" class="btn btn-block btn-brand-02 border-radius mt-4 mb-3" name="submit">
                                Sign up
                            </button>
                        </form>
                        <div class="other-login-signup my-3">
                            <div class="or-login-signup text-center">
                                <strong>Or Sign Up With</strong>
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
                                <a href="#" class="btn btn-twitter"><i class="fab fa-twitter pr-1"></i> Twitter</a>
                            </li>
                        </ul>
                        <p class="text-center mb-0">Already have an account? <a href="/login">Login</a></p>
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
    <script>
        function checkref() {
            jQuery.ajax({
                url: "ref.php",
                data: 'ref=' + $("#ref").val(),
                type: "POST",
                success: function(data) {
                    $("#check-ref").html(data);
                },
                error: function() {}
            });
        }
    </script>
    <!--endbuild-->
</body>

</html>