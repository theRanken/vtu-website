<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=utf-8" />

<head>
    <meta name="theme-color" content="#5230b0">
    <meta charset="utf-8" />
    <title>Dashboard-
        <?php echo $web['name']; ?>
    </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="referrer" content="no-referrer-when-downgrade">
    <meta name="google-site-verification" content="iu8-HQXz8y6zh51XMM4SsYKkcrzHkw7lxmpbjKygCZs" />
    <meta name="google-site-verification" content="iu8-HQXz8y6zh51XMM4SsYKkcrzHkw7lxmpbjKygCZs" />
    <link rel="manifest" href="../upload/veriylogo.jpg">
    <link rel="manifest" href="../upload/veriylogo.jpg">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/upload/<?php echo $web['image']; ?>">
    <meta name="theme-color" content="#ffffff">
    <meta content="data- Buy Airtime and Data for all Network. Make payment for DSTV, GOTV, PHCN other services"
        name="descriptison">
    <meta itemprop="name"
        content="data- Buy Airtime and Data for all Network. Make payment for DSTV, GOTV, PHCN other services">
    <meta itemprop="description"
        content="Buy Cheap Internet Data Plan and Airtime Recharge for Airtel, 9mobile, GLO, MTN, Pay DSTV, GOTV, PHCN.">
    <meta itemprop="image" content="/upload/<?php echo $web['image']; ?>">
    <link rel="stylesheet" href="/upload/<?php echo $web['image']; ?>">
    <link rel="icon" sizes="180x180" href="/upload/<?php echo $web['image']; ?>">
    <link rel="icon" type="image/png" sizes="32x32" href="/upload/<?php echo $web['image']; ?>">
    <link rel="icon" type="image/png" sizes="16x16" href="/upload/<?php echo $web['image']; ?>">
    <!-- Twitter Card data -->
    <meta name="twitter:card" content="../static/styling/images/bg.html">
    <meta name="twitter:title"
        content="<?php echo $web['name']; ?>- Buy Airtime and Data for all Network. Make payment for DSTV, GOTV, PHCN other services">
    <meta name="twitter:description"
        content="<?php echo $web['name']; ?> Buy Cheap Internet Data Plan and Airtime Recharge for Airtel, 9mobile, GLO, MTN, Pay DSTV, GOTV, PHCN.">
    <meta name="twitter:image:src" content="../static/styling/images/bg.html">
    <!-- Open Graph data -->
    <meta property="og:locale" content="en_US">
    <meta property="og:title"
        content="<?php echo $web['name']; ?> - Buy Airtime and Data for all Network. Make payment for DSTV, GOTV, PHCN other services">
    <meta property="og:image" content="../static/styling/images/bg.html">
    <meta property="og:description"
        content="<?php echo $web['name']; ?> Buy Cheap Internet Data Plan and Airtime Recharge for Airtel, 9mobile, GLO, MTN, Pay DSTV, GOTV, PHCN." />
    <meta property="og:site_name" content="<?php echo $web['name']; ?>" />
    <meta property="og:url" content="../index.html">
    <meta property="og:type" content="website">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
    <link rel="icon" href="../static/dashboard/assets/img/icon.html" type="image/x-icon" />
    <!-- Fonts and icons -->
    <script src="../static/dashboard/assets/js/plugin/webfont/webfont.min.js"></script>
    <link rel="stylesheet" href="../static/dashboard/assets/css/fonts.min.css" media="all">
    <!-- toast -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" media="all">
    <script src="https://unpkg.com/sweetalert%402.1.2/dist/sweetalert.min.js"></script>
    <script>
        WebFont.load({
            google: { "families": ["Lato:300,400,700,900"] },
            custom: { "families": ["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"], urls: ['/static/dashboard/assets/css/fonts.min.css'] },
            active: function () {
                sessionStorage.fonts = true;
            }
        });
    </script>
    <script>
        function greet() {
            var greeting, time = new Date().getHours();
            if (time < 10) {
                greeting = "Good morning,";
            } else if (time < 20) {
                greeting = "Good day,";
            } else {
                greeting = "Good evening,";
            }
            const greetContainer = document.getElementById("greet");
            if(greetContainer){
                greetContainer.innerHTML = greeting;
            }
            return;
        }
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
            color: white;
            border: 1px solid #3e549a;
            text-shadow: 0px -1px 0px rgba(0, 0, 0, 0.3);
        }
    </style>
    <!-- Popup notifications -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <!-- CSS Files -->
    <link rel="stylesheet" href="../static/dashboard/assets/css/w3.css">
    <link rel="stylesheet" href="../static/dashboard/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../static/dashboard/assets/css/atlantis.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body data-background-color="bg3" onload="if(typeof greet === 'function' && typeof alertinfo === 'function'){greet(); alertinfo();}">
    <div class="wrapper">
        <div class="main-header">
            <!-- Logo Header -->
            <div class="logo-header" style="background-color:<?php echo $web['color']; ?>">
                <a href="#" class="logo"
                    style="color: white;font-size: 19px;font-weight: bold;margin-right: -70px;">Welcome</a>
                <button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse"
                    data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon" style="background-color:<?php echo $web['color']; ?>">
                        <i class="icon-menu"></i>
                    </span>
                </button>
                <button class="topbar-toggler more"><i class="icon-options-vertical"></i></button>
                <div class="nav-toggle" style="background-color:<?php echo $web['color']; ?>">
                    <button class="btn btn-toggle toggle-sidebar">
                        <i class="icon-menu"></i>
                    </button>
                </div>
            </div>
            <!-- End Logo Header -->
            <!-- Navbar Header -->
            <nav class="navbar navbar-header navbar-expand-lg" style="background-color:<?php echo $web['color']; ?>">
                <div class="container-fluid" style="background-color:<?php echo $web['color']; ?>">
                    <ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
                        <li class="nav-item toggle-nav-search hidden-caret">
                            <a class="nav-link" data-toggle="collapse" href="#search-nav" role="button"
                                aria-expanded="false" aria-controls="search-nav">
                                <i class="fa fa-search"></i>
                            </a>
                        </li>
                        <li class="nav-item dropdown hidden-caret">
                            <a class="nav-link" href="../logout/">
                                <i class="fas fa-power-off"></i> Logout
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
            <!-- End Navbar -->
        </div>
        <?php
        $chekd = mysqli_query($con, "SELECT * FROM setting");
        $setting = mysqli_fetch_array($chekd);
        $flutter = $setting['flutter'];
        $paystack = $setting['paystack'];
        $malier = $setting['email'];
        $bank = $setting['bank'];
        $monnify = $setting['monnify'];
        ?>
        <!-- Sidebar -->
        <!-- Sidebar -->
        <div class="sidebar sidebar-style-2" data-background-color="dark">
            <div class="sidebar-wrapper scrollbar scrollbar-inner">
                <div class="sidebar-content">
                    <div class="user">
                        <div class="avatar avatar-online avatar-sm float-left mr-2">
                            <img src="../static/dashboard/assets/img/avatar.png" alt="..."
                                class="avatar-img rounded-circle">
                        </div>
                        <div class="info">
                            <a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
                                <span>
                                    <?php echo $row['username']; ?>
                                    <span class="user-level">balance: &#8358;
                                        <?php echo number_format($row['bal'], 2); ?>
                                    </span>
                                </span>
                            </a>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                    <ul class="nav nav-primary">
                        <li class="nav-item <?php if ($das === "1")
                            echo "active" ?>">
                                <a href="index.php">
                                    <i class="fas fa-home"></i>
                                    <p>Dashboard</p>
                                </a>
                            </li>
                            <li class="nav-item <?php if ($das === "3")
                            echo "active" ?>">
                                <a href="buydata.php">
                                    <i class="fas fa-signal"></i>
                                    <p>Buy Data</p>
                                </a>
                            </li>
                            <li class="nav-item <?php if ($das === "2")
                            echo "active" ?>">
                                <a href="topup.php">
                                    <i class="fas fa-phone-square"></i>
                                    <p>Buy Airtime</p>
                                </a>
                            </li>
                            <li class="nav-item <?php if ($das === "4")
                            echo "active" ?>">
                                <a href="scratch_cards.php">
                                    <i class="fab fa-cc-discover"></i>
                                    <p>Buy Scratch Card</p>
                                </a>
                            </li>
                            <li class="nav-item <?php if ($das === "6")
                            echo "active" ?>">
                                <a data-toggle="collapse" href="#utilities">
                                    <i class="fas fa-lightbulb"></i>
                                    <p>Utilities Payment</p>
                                    <span class="caret"></span>
                                </a>
                                <div class="collapse" id="utilities">
                                    <ul class="nav nav-collapse">
                                        <li>
                                            <a href="bill.php"> <span class="sub-item">Bill Payment</span> </a>
                                        </li>
                                        <li>
                                            <a href="cable.php"> <span class="sub-item">Cable Subscription</span> </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item <?php if ($das === "7")
                            echo "active" ?>">
                                <a data-toggle="collapse" href="#fund">
                                    <i class="fas fa-credit-card"></i>
                                    <p>Fund Wallet</p>
                                    <span class="caret"></span>
                                </a>
                                <div class="collapse" id="fund">
                                    <ul class="nav nav-collapse">
                                    <?php if ($monnify == "1") { ?>
                                        <li>
                                            <a href="pay.php"> <span class="sub-item">Automated Bank Transfer (ATM)</span>
                                            </a>
                                        </li>
                                    <?php }
                        ; ?>
                                    <?php if ($paystack == "1") { ?>
                                        <li>
                                            <a href="stack.php"> <span class="sub-item">Fund with paystack (ATM)</span> </a>
                                        </li>
                                    <?php }
                                    ; ?>
                                    <?php if ($flutter == "1") { ?>
                                        <li>
                                            <a href="spay.php"> <span class="sub-item">Fund with flutterwave gateway
                                                    (ATM)</span> </a>
                                        </li>
                                    <?php }
                                    ; ?>
                                    <?php if ($bank == "1") { ?>
                                        <li>
                                            <a href="autobank.php"> <span class="sub-item">Manual funding (N50
                                                    charge)</span> </a>
                                        </li>
                                    <?php }
                                    ; ?>
                                    <li>
                                        <a href="coupon.php"> <span class="sub-item">Fund with coupon</span> </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item <?php if ($das === "8")
                            echo "active" ?>">
                                <a href="price.php">
                                    <i class="fas fa-money-bill"></i>
                                    <p>Pricing</p>
                                </a>
                            </li>
                            <li class="nav-item <?php if ($das === "9")
                            echo "active" ?>">
                                <a href="account.php">
                                    <i class="fas fa-user"></i>
                                    <p>Account</p>
                                </a>
                            </li>
                            <li class="nav-item <?php if ($das === "10")
                            echo "active" ?>">
                                <a href="change.php">
                                    <i class="fas fa-cog"></i>
                                    <p>Change Password</p>
                                </a>
                            </li>
                            <li class="nav-item <?php if ($das === "100")
                            echo "active" ?>">
                                <a href="newpin.php">
                                    <i class="fas fa-money-bill"></i>
                                    <p>Transaction Pin</p>
                                </a>
                            </li>
                            <li class="nav-item <?php if ($das === "11")
                            echo "active" ?>">
                                <a href="setting.php">
                                    <i class="fas fa-cog"></i>
                                    <p>Setting</p>
                                </a>
                            </li>
                            <li class="nav-item <?php if ($das === "12")
                            echo "active" ?>">
                                <a href="developer.php">
                                    <i class="fas fa-code"></i>
                                    <p>Developer's API</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="../logout">
                                    <i class="fas fa-sign-out-alt"></i>
                                    <p>Logout</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="../index.php">
                                    <i class="fas fa-laptop-code"></i>
                                    <p>version -> 2.0.0.2</p>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- End Sidebar -->