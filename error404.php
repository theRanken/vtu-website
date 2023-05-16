<?php
require_once 'core/conn.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!--favicon icon-->
    <link rel="icon" href="/upload/<?php echo $web['image']; ?>" type="image/png" sizes="16x16">

    <!--title-->
    <title>404 - superjarang</title>

    <!--build:css-->
    <link rel="stylesheet" href="/adex/assets/css/main.css">
    <!-- endbuild -->
</head>

<body>

    <!--preloader start-->
    <!-------<div id="preloader">
        <div class="preloader-wrap">
            <img src="/adex/assets/img/logo-color.png" alt="logo" class="img-fluid" />
            <div class="thecube">
                <div class="cube c1"></div>
                <div class="cube c2"></div>
                <div class="cube c4"></div>
                <div class="cube c3"></div>
            </div>
        </div>
    </div>-------->
    <!--preloader end-->

    <div class="main">

        <!--404 section start-->
        <section class="ptb-100 bg-image full-height" image-overlay="8">
            <div class="background-image-wraper" style="background: url('/upload/back.jpg'); opacity: 1;"></div>
            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="col-md-9 col-lg-7">
                        <div class="error-content-wrap text-center text-white">
                            <div class="notfound-404">
                                <h1 class="text-white">404</h1>
                            </div>
                            <h2 class="text-white">Sorry, something went wrong</h2>
                            <p class="lead">The page you are looking for might have been removed had its name changed or is temporarily
                                unavailable.</p><a class="btn btn-brand-03" href="/index.php">Go to Homepage</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--404 section end-->

    </div>

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