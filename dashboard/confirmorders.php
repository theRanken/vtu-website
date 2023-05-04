<?php
session_start();
if (isset($_SESSION['name'])) {
require_once "../core/conn.php";
$user_id = $_SESSION['id'];
  $check_user = mysqli_query($con, "SELECT * FROM user WHERE id='$user_id'");
   if(mysqli_num_rows($check_user)==1){
        $client = mysqli_fetch_assoc($check_user);
   }
 
    $sql = mysqli_query($con, "SELECT * FROM  mail");
    if (mysqli_num_rows($sql) > 0) {
        $mail = mysqli_fetch_assoc($sql);
    }
    $uid = $client['id'];
    $bal = $client['bal'];
    $username = $client['username'];
    $musername = $mail['username'];
    $mpassword = $mail['password'];
    $host = $mail['host'];
    $sender = $mail['sender'];
    date_default_timezone_set('Africa/Lagos');
    $date = date("l j<\s\up>S</\s\up>, F Y @ g:iA");
    $chek = mysqli_query($con, "SELECT * FROM pay");

    $pdata = mysqli_fetch_array($chek);
    $min = $pdata['min'];
    if (isset($_POST['generate'])) {

        $exam = mysqli_real_escape_string($con, $_POST['exam']);
        $db = mysqli_real_escape_string($con, $_POST['dbcheck']);
        $card_type = mysqli_real_escape_string($con, $_POST['card_type']);
        $quantity = mysqli_real_escape_string($con, $_POST['quantity']);
        $amount = mysqli_real_escape_string($con, $_POST['amount']);
        $total = $bal - $amount;
        if (!empty($quantity) && ($amount)) {
            if ($amount> $bal) {
                // "insufficient bal";
                echo "<script> window.alert('Your balance is insufficent please fund your account to continue');</script>";
                 echo "<script>window.location.href='spay.php'; </script>";
            }else{


       
        /* else{
                echo "<script> window.location.href='index.php'; </script>";
            } */
            ?>

<html lang="en" style="height: 100%;">

<head>
    <meta http-equiv="content-type" content="text/html;charset=UTF-8">

    <meta charset="utf-8">
    <!--[if IE]>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<![endif]-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Favicons Icon -->
    <link href="images/favicon.ico" type="image/x-icon" rel="shortcut icon">


    <title><?php echo $web['name'];?> | MY PURCHASE ORDER |</title>

    <!-- Mobile Specific -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- CSS Style -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/font-awesome.css" media="all">
    <link rel="stylesheet" type="text/css" href="css/slider.css" media="all">
    <link rel="stylesheet" type="text/css" href="css/owl.carousel.css">
    <link rel="stylesheet" type="text/css" href="css/owl.theme.css">
    <link rel="stylesheet" type="text/css" href="css/style.css" media="all">
    <link rel="stylesheet" type="text/css" href="css/responsive.css">


    <!-- Google Fonts -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,300,700,800,400,600" rel="stylesheet" type="text/css">


    <style type="text/css">
        @media print {
            .noprint {
                display: none;
            }
        }

        @media screen {}
    </style>

    <style>
        .table-curved {
            margin: 30px auto 55px auto;
            width: 97%;
        }

        .table-curved-body {
            font-size: 22px !important;
            color: #000000;
        }

        td,
        th {
            border: 3px solid #dddddd;
            text-align: center;
            padding: 36px;
        }

        tr:hover {
            background-color: #e7e7e7 !important;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }

        /* -----------Smartphone View----------- On screens that are 480px wide or less */
        @media screen and (max-width: 480px) {

            .table-curved {
                display: block;
            }

            .table-curved-body {
                font-size: 12px !important;
                color: #000000;
            }

            td,
            th {
                padding: 6px;
            }

            .table-curved {
                margin: 30px auto 25px auto;
            }

        }
    </style>


    <style type="text/css">
        .keyword-info-container {
            box-sizing: border-box;
            width: 100%;
            margin-bottom: 20px;
            font-size: 12px;
            border-bottom: 1px solid #dee1e5;
        }

        .keyword-info-container.youtube {
            margin-bottom: 0;
            border-bottom: none;
        }

        .keyword-info-container .title {
            color: #26282d;
            font-size: 17px;
            font-weight: bold;
        }

        .keyword-info-container .tabs {
            list-style: none;
            display: flex;
            justify-content: flex-start;
            border-bottom: 1px solid #dee1e5;
            margin-top: -10px;
            padding: 0px 16px;
            align-items: center;
        }

        .keyword-info-container .tabs li {
            padding: 8px;
            padding-left: 0;
            color: #000;
            cursor: pointer;
            font-size: 12px;
        }

        .keyword-info-container .tabs li.small {
            font-size: 10px;
        }

        .keyword-info-container .tabs li:last-child {
            overflow: hidden;
        }

        .keyword-info-container .tabs li.active {
            color: #4285f4;
        }

        table.keyword-info-table {
            border-collapse: collapse;
            width: 100%;
            color: #000;
            font-size: 12px;
            position: relative;
        }

        .keyword-info-table thead {
            height: 50px;
        }

        .keyword-info-table th {
            padding: 10px;
            padding-left: 0;
            font-weight: bold;
            color: #000000;
            font-size: 12px;
        }

        .keyword-info-table th:first-child {
            padding-left: 16px;
        }

        .keyword-info-table th:last-child {
            padding-right: 16px;
        }

        .keyword-info-table td {
            border-bottom: 1px solid #dee1e5;
            padding: 10px;
            padding-left: 0;
        }

        .keyword-info-table td:first-child {
            padding-left: 16px;
        }

        .keyword-info-table td:last-child {
            padding-right: 16px;
        }

        .keyword-info-table tfoot tr {
            background-color: #dee1e544;
        }

        .keyword-info-table tfoot tr:last-child td {
            border-bottom: none;
        }

        .ubersuggest-button {
            color: #0086f7;
            font-family: Arial;
            font-size: 14px;
            font-weight: bold;
            line-height: 29px;
            padding: 8px 30px;
            border: 1px solid #0086f7;
            background-color: #ffffff;
            border-radius: 2px;
            outline: none;
            border: none;
            cursor: pointer;
            margin: 4px;
        }

        .ubersuggest-logo-wrapper {
            display: flex;
            align-items: center;
            justify-content: flex-end;
            margin: 10px 10px 0 0;
            font-weight: bold;
            color: #26282d;
        }

        .ubersuggest-logo {
            width: 182px;
            height: 33px;
            cursor: pointer;
        }

        .keyword-info-container .row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin: 0;
            padding: 20px 16px;
            border-top: 1px solid #dee1e5;
        }

        .header h2 {
            color: #000000;
            font-family: Geomanist;
            font-size: 24px;
            font-weight: 500;
        }

        /*
Youtube Dark theme styling
*/
        html[dark] .keyword-info-container .title {
            color: #fff;
        }

        html[dark] .keyword-info-container .tabs {
            border-color: #ffffff0d;
        }

        html[dark] .keyword-info-container .tabs li {
            color: #fff;
        }

        html[dark] .keyword-info-container .tabs li.active {
            color: #4285f4;
        }

        html[dark] table.keyword-info-table {
            color: #fff;
        }

        html[dark] .keyword-info-table th {
            color: #fff;
        }

        html[dark] .keyword-info-table tfoot tr {
            background-color: #3d3d3d;
        }

        html[dark] .keyword-info-table tfoot tr:last-child td .button-arrow {
            border-color: #fff;
        }

        /*
Google Dark theme styling
*/

        body[data-dt='1'] .keyword-info-container .title {
            color: #fff;
        }

        body[data-dt='1'] .keyword-info-container .tabs {
            border-color: #ffffff0d;
        }

        body[data-dt='1'] .keyword-info-container .tabs li {
            color: #fff;
        }

        body[data-dt='1'] .keyword-info-container .tabs li.active {
            color: #4285f4;
        }

        body[data-dt='1'] table.keyword-info-table {
            color: #fff;
        }

        body[data-dt='1'] .keyword-info-table th {
            color: #fff;
        }

        body[data-dt='1'] .keyword-info-table tfoot tr {
            background-color: #3d3d3d;
        }

        body[data-dt='1'] .keyword-info-table tfoot tr:last-child td .button-arrow {
            border-color: #fff;
        }
    </style>
    <style type="text/css">
        .tippy-touch {
            cursor: pointer !important
        }

        .tippy-notransition {
            transition: none !important
        }

        .tippy-popper {
            max-width: 400px;
            -webkit-perspective: 800px;
            perspective: 800px;
            z-index: 9999;
            outline: 0;
            transition-timing-function: cubic-bezier(.165, .84, .44, 1);
            pointer-events: none
        }

        .tippy-popper.html-template {
            max-width: 96%;
            max-width: calc(100% - 20px)
        }

        .tippy-popper[x-placement^=top] [x-arrow] {
            border-top: 7px solid #333;
            border-right: 7px solid transparent;
            border-left: 7px solid transparent;
            bottom: -7px;
            margin: 0 9px
        }

        .tippy-popper[x-placement^=top] [x-arrow].arrow-small {
            border-top: 5px solid #333;
            border-right: 5px solid transparent;
            border-left: 5px solid transparent;
            bottom: -5px
        }

        .tippy-popper[x-placement^=top] [x-arrow].arrow-big {
            border-top: 10px solid #333;
            border-right: 10px solid transparent;
            border-left: 10px solid transparent;
            bottom: -10px
        }

        .tippy-popper[x-placement^=top] [x-circle] {
            -webkit-transform-origin: 0 33%;
            transform-origin: 0 33%
        }

        .tippy-popper[x-placement^=top] [x-circle].enter {
            -webkit-transform: scale(1) translate(-50%, -55%);
            transform: scale(1) translate(-50%, -55%);
            opacity: 1
        }

        .tippy-popper[x-placement^=top] [x-circle].leave {
            -webkit-transform: scale(.15) translate(-50%, -50%);
            transform: scale(.15) translate(-50%, -50%);
            opacity: 0
        }

        .tippy-popper[x-placement^=top] .tippy-tooltip.light-theme [x-circle] {
            background-color: #fff
        }

        .tippy-popper[x-placement^=top] .tippy-tooltip.light-theme [x-arrow] {
            border-top: 7px solid #fff;
            border-right: 7px solid transparent;
            border-left: 7px solid transparent
        }

        .tippy-popper[x-placement^=top] .tippy-tooltip.light-theme [x-arrow].arrow-small {
            border-top: 5px solid #fff;
            border-right: 5px solid transparent;
            border-left: 5px solid transparent
        }

        .tippy-popper[x-placement^=top] .tippy-tooltip.light-theme [x-arrow].arrow-big {
            border-top: 10px solid #fff;
            border-right: 10px solid transparent;
            border-left: 10px solid transparent
        }

        .tippy-popper[x-placement^=top] .tippy-tooltip.transparent-theme [x-circle] {
            background-color: rgba(0, 0, 0, .7)
        }

        .tippy-popper[x-placement^=top] .tippy-tooltip.transparent-theme [x-arrow] {
            border-top: 7px solid rgba(0, 0, 0, .7);
            border-right: 7px solid transparent;
            border-left: 7px solid transparent
        }

        .tippy-popper[x-placement^=top] .tippy-tooltip.transparent-theme [x-arrow].arrow-small {
            border-top: 5px solid rgba(0, 0, 0, .7);
            border-right: 5px solid transparent;
            border-left: 5px solid transparent
        }

        .tippy-popper[x-placement^=top] .tippy-tooltip.transparent-theme [x-arrow].arrow-big {
            border-top: 10px solid rgba(0, 0, 0, .7);
            border-right: 10px solid transparent;
            border-left: 10px solid transparent
        }

        .tippy-popper[x-placement^=top] [data-animation=perspective] {
            -webkit-transform-origin: bottom;
            transform-origin: bottom
        }

        .tippy-popper[x-placement^=top] [data-animation=perspective].enter {
            opacity: 1;
            -webkit-transform: translateY(-10px) rotateX(0);
            transform: translateY(-10px) rotateX(0)
        }

        .tippy-popper[x-placement^=top] [data-animation=perspective].leave {
            opacity: 0;
            -webkit-transform: translateY(0) rotateX(90deg);
            transform: translateY(0) rotateX(90deg)
        }

        .tippy-popper[x-placement^=top] [data-animation=fade].enter {
            opacity: 1;
            -webkit-transform: translateY(-10px);
            transform: translateY(-10px)
        }

        .tippy-popper[x-placement^=top] [data-animation=fade].leave {
            opacity: 0;
            -webkit-transform: translateY(-10px);
            transform: translateY(-10px)
        }

        .tippy-popper[x-placement^=top] [data-animation=shift].enter {
            opacity: 1;
            -webkit-transform: translateY(-10px);
            transform: translateY(-10px)
        }

        .tippy-popper[x-placement^=top] [data-animation=shift].leave {
            opacity: 0;
            -webkit-transform: translateY(0);
            transform: translateY(0)
        }

        .tippy-popper[x-placement^=top] [data-animation=scale].enter {
            opacity: 1;
            -webkit-transform: translateY(-10px) scale(1);
            transform: translateY(-10px) scale(1)
        }

        .tippy-popper[x-placement^=top] [data-animation=scale].leave {
            opacity: 0;
            -webkit-transform: translateY(0) scale(0);
            transform: translateY(0) scale(0)
        }

        .tippy-popper[x-placement^=bottom] [x-arrow] {
            border-bottom: 7px solid #333;
            border-right: 7px solid transparent;
            border-left: 7px solid transparent;
            top: -7px;
            margin: 0 9px
        }

        .tippy-popper[x-placement^=bottom] [x-arrow].arrow-small {
            border-bottom: 5px solid #333;
            border-right: 5px solid transparent;
            border-left: 5px solid transparent;
            top: -5px
        }

        .tippy-popper[x-placement^=bottom] [x-arrow].arrow-big {
            border-bottom: 10px solid #333;
            border-right: 10px solid transparent;
            border-left: 10px solid transparent;
            top: -10px
        }

        .tippy-popper[x-placement^=bottom] [x-circle] {
            -webkit-transform-origin: 0 -50%;
            transform-origin: 0 -50%
        }

        .tippy-popper[x-placement^=bottom] [x-circle].enter {
            -webkit-transform: scale(1) translate(-50%, -45%);
            transform: scale(1) translate(-50%, -45%);
            opacity: 1
        }

        .tippy-popper[x-placement^=bottom] [x-circle].leave {
            -webkit-transform: scale(.15) translate(-50%, -5%);
            transform: scale(.15) translate(-50%, -5%);
            opacity: 0
        }

        .tippy-popper[x-placement^=bottom] .tippy-tooltip.light-theme [x-circle] {
            background-color: #fff
        }

        .tippy-popper[x-placement^=bottom] .tippy-tooltip.light-theme [x-arrow] {
            border-bottom: 7px solid #fff;
            border-right: 7px solid transparent;
            border-left: 7px solid transparent
        }

        .tippy-popper[x-placement^=bottom] .tippy-tooltip.light-theme [x-arrow].arrow-small {
            border-bottom: 5px solid #fff;
            border-right: 5px solid transparent;
            border-left: 5px solid transparent
        }

        .tippy-popper[x-placement^=bottom] .tippy-tooltip.light-theme [x-arrow].arrow-big {
            border-bottom: 10px solid #fff;
            border-right: 10px solid transparent;
            border-left: 10px solid transparent
        }

        .tippy-popper[x-placement^=bottom] .tippy-tooltip.transparent-theme [x-circle] {
            background-color: rgba(0, 0, 0, .7)
        }

        .tippy-popper[x-placement^=bottom] .tippy-tooltip.transparent-theme [x-arrow] {
            border-bottom: 7px solid rgba(0, 0, 0, .7);
            border-right: 7px solid transparent;
            border-left: 7px solid transparent
        }

        .tippy-popper[x-placement^=bottom] .tippy-tooltip.transparent-theme [x-arrow].arrow-small {
            border-bottom: 5px solid rgba(0, 0, 0, .7);
            border-right: 5px solid transparent;
            border-left: 5px solid transparent
        }

        .tippy-popper[x-placement^=bottom] .tippy-tooltip.transparent-theme [x-arrow].arrow-big {
            border-bottom: 10px solid rgba(0, 0, 0, .7);
            border-right: 10px solid transparent;
            border-left: 10px solid transparent
        }

        .tippy-popper[x-placement^=bottom] [data-animation=perspective] {
            -webkit-transform-origin: top;
            transform-origin: top
        }

        .tippy-popper[x-placement^=bottom] [data-animation=perspective].enter {
            opacity: 1;
            -webkit-transform: translateY(10px) rotateX(0);
            transform: translateY(10px) rotateX(0)
        }

        .tippy-popper[x-placement^=bottom] [data-animation=perspective].leave {
            opacity: 0;
            -webkit-transform: translateY(0) rotateX(-90deg);
            transform: translateY(0) rotateX(-90deg)
        }

        .tippy-popper[x-placement^=bottom] [data-animation=fade].enter {
            opacity: 1;
            -webkit-transform: translateY(10px);
            transform: translateY(10px)
        }

        .tippy-popper[x-placement^=bottom] [data-animation=fade].leave {
            opacity: 0;
            -webkit-transform: translateY(10px);
            transform: translateY(10px)
        }

        .tippy-popper[x-placement^=bottom] [data-animation=shift].enter {
            opacity: 1;
            -webkit-transform: translateY(10px);
            transform: translateY(10px)
        }

        .tippy-popper[x-placement^=bottom] [data-animation=shift].leave {
            opacity: 0;
            -webkit-transform: translateY(0);
            transform: translateY(0)
        }

        .tippy-popper[x-placement^=bottom] [data-animation=scale].enter {
            opacity: 1;
            -webkit-transform: translateY(10px) scale(1);
            transform: translateY(10px) scale(1)
        }

        .tippy-popper[x-placement^=bottom] [data-animation=scale].leave {
            opacity: 0;
            -webkit-transform: translateY(0) scale(0);
            transform: translateY(0) scale(0)
        }

        .tippy-popper[x-placement^=left] [x-arrow] {
            border-left: 7px solid #333;
            border-top: 7px solid transparent;
            border-bottom: 7px solid transparent;
            right: -7px;
            margin: 6px 0
        }

        .tippy-popper[x-placement^=left] [x-arrow].arrow-small {
            border-left: 5px solid #333;
            border-top: 5px solid transparent;
            border-bottom: 5px solid transparent;
            right: -5px
        }

        .tippy-popper[x-placement^=left] [x-arrow].arrow-big {
            border-left: 10px solid #333;
            border-top: 10px solid transparent;
            border-bottom: 10px solid transparent;
            right: -10px
        }

        .tippy-popper[x-placement^=left] [x-circle] {
            -webkit-transform-origin: 50% 0;
            transform-origin: 50% 0
        }

        .tippy-popper[x-placement^=left] [x-circle].enter {
            -webkit-transform: scale(1) translate(-50%, -50%);
            transform: scale(1) translate(-50%, -50%);
            opacity: 1
        }

        .tippy-popper[x-placement^=left] [x-circle].leave {
            -webkit-transform: scale(.15) translate(-50%, -50%);
            transform: scale(.15) translate(-50%, -50%);
            opacity: 0
        }

        .tippy-popper[x-placement^=left] .tippy-tooltip.light-theme [x-circle] {
            background-color: #fff
        }

        .tippy-popper[x-placement^=left] .tippy-tooltip.light-theme [x-arrow] {
            border-left: 7px solid #fff;
            border-top: 7px solid transparent;
            border-bottom: 7px solid transparent
        }

        .tippy-popper[x-placement^=left] .tippy-tooltip.light-theme [x-arrow].arrow-small {
            border-left: 5px solid #fff;
            border-top: 5px solid transparent;
            border-bottom: 5px solid transparent
        }

        .tippy-popper[x-placement^=left] .tippy-tooltip.light-theme [x-arrow].arrow-big {
            border-left: 10px solid #fff;
            border-top: 10px solid transparent;
            border-bottom: 10px solid transparent
        }

        .tippy-popper[x-placement^=left] .tippy-tooltip.transparent-theme [x-circle] {
            background-color: rgba(0, 0, 0, .7)
        }

        .tippy-popper[x-placement^=left] .tippy-tooltip.transparent-theme [x-arrow] {
            border-left: 7px solid rgba(0, 0, 0, .7);
            border-top: 7px solid transparent;
            border-bottom: 7px solid transparent
        }

        .tippy-popper[x-placement^=left] .tippy-tooltip.transparent-theme [x-arrow].arrow-small {
            border-left: 5px solid rgba(0, 0, 0, .7);
            border-top: 5px solid transparent;
            border-bottom: 5px solid transparent
        }

        .tippy-popper[x-placement^=left] .tippy-tooltip.transparent-theme [x-arrow].arrow-big {
            border-left: 10px solid rgba(0, 0, 0, .7);
            border-top: 10px solid transparent;
            border-bottom: 10px solid transparent
        }

        .tippy-popper[x-placement^=left] [data-animation=perspective] {
            -webkit-transform-origin: right;
            transform-origin: right
        }

        .tippy-popper[x-placement^=left] [data-animation=perspective].enter {
            opacity: 1;
            -webkit-transform: translateX(-10px) rotateY(0);
            transform: translateX(-10px) rotateY(0)
        }

        .tippy-popper[x-placement^=left] [data-animation=perspective].leave {
            opacity: 0;
            -webkit-transform: translateX(0) rotateY(-90deg);
            transform: translateX(0) rotateY(-90deg)
        }

        .tippy-popper[x-placement^=left] [data-animation=fade].enter {
            opacity: 1;
            -webkit-transform: translateX(-10px);
            transform: translateX(-10px)
        }

        .tippy-popper[x-placement^=left] [data-animation=fade].leave {
            opacity: 0;
            -webkit-transform: translateX(-10px);
            transform: translateX(-10px)
        }

        .tippy-popper[x-placement^=left] [data-animation=shift].enter {
            opacity: 1;
            -webkit-transform: translateX(-10px);
            transform: translateX(-10px)
        }

        .tippy-popper[x-placement^=left] [data-animation=shift].leave {
            opacity: 0;
            -webkit-transform: translateX(0);
            transform: translateX(0)
        }

        .tippy-popper[x-placement^=left] [data-animation=scale].enter {
            opacity: 1;
            -webkit-transform: translateX(-10px) scale(1);
            transform: translateX(-10px) scale(1)
        }

        .tippy-popper[x-placement^=left] [data-animation=scale].leave {
            opacity: 0;
            -webkit-transform: translateX(0) scale(0);
            transform: translateX(0) scale(0)
        }

        .tippy-popper[x-placement^=right] [x-arrow] {
            border-right: 7px solid #333;
            border-top: 7px solid transparent;
            border-bottom: 7px solid transparent;
            left: -7px;
            margin: 6px 0
        }

        .tippy-popper[x-placement^=right] [x-arrow].arrow-small {
            border-right: 5px solid #333;
            border-top: 5px solid transparent;
            border-bottom: 5px solid transparent;
            left: -5px
        }

        .tippy-popper[x-placement^=right] [x-arrow].arrow-big {
            border-right: 10px solid #333;
            border-top: 10px solid transparent;
            border-bottom: 10px solid transparent;
            left: -10px
        }

        .tippy-popper[x-placement^=right] [x-circle] {
            -webkit-transform-origin: -50% 0;
            transform-origin: -50% 0
        }

        .tippy-popper[x-placement^=right] [x-circle].enter {
            -webkit-transform: scale(1) translate(-50%, -50%);
            transform: scale(1) translate(-50%, -50%);
            opacity: 1
        }

        .tippy-popper[x-placement^=right] [x-circle].leave {
            -webkit-transform: scale(.15) translate(-50%, -50%);
            transform: scale(.15) translate(-50%, -50%);
            opacity: 0
        }

        .tippy-popper[x-placement^=right] .tippy-tooltip.light-theme [x-circle] {
            background-color: #fff
        }

        .tippy-popper[x-placement^=right] .tippy-tooltip.light-theme [x-arrow] {
            border-right: 7px solid #fff;
            border-top: 7px solid transparent;
            border-bottom: 7px solid transparent
        }

        .tippy-popper[x-placement^=right] .tippy-tooltip.light-theme [x-arrow].arrow-small {
            border-right: 5px solid #fff;
            border-top: 5px solid transparent;
            border-bottom: 5px solid transparent
        }

        .tippy-popper[x-placement^=right] .tippy-tooltip.light-theme [x-arrow].arrow-big {
            border-right: 10px solid #fff;
            border-top: 10px solid transparent;
            border-bottom: 10px solid transparent
        }

        .tippy-popper[x-placement^=right] .tippy-tooltip.transparent-theme [x-circle] {
            background-color: rgba(0, 0, 0, .7)
        }

        .tippy-popper[x-placement^=right] .tippy-tooltip.transparent-theme [x-arrow] {
            border-right: 7px solid rgba(0, 0, 0, .7);
            border-top: 7px solid transparent;
            border-bottom: 7px solid transparent
        }

        .tippy-popper[x-placement^=right] .tippy-tooltip.transparent-theme [x-arrow].arrow-small {
            border-right: 5px solid rgba(0, 0, 0, .7);
            border-top: 5px solid transparent;
            border-bottom: 5px solid transparent
        }

        .tippy-popper[x-placement^=right] .tippy-tooltip.transparent-theme [x-arrow].arrow-big {
            border-right: 10px solid rgba(0, 0, 0, .7);
            border-top: 10px solid transparent;
            border-bottom: 10px solid transparent
        }

        .tippy-popper[x-placement^=right] [data-animation=perspective] {
            -webkit-transform-origin: left;
            transform-origin: left
        }

        .tippy-popper[x-placement^=right] [data-animation=perspective].enter {
            opacity: 1;
            -webkit-transform: translateX(10px) rotateY(0);
            transform: translateX(10px) rotateY(0)
        }

        .tippy-popper[x-placement^=right] [data-animation=perspective].leave {
            opacity: 0;
            -webkit-transform: translateX(0) rotateY(90deg);
            transform: translateX(0) rotateY(90deg)
        }

        .tippy-popper[x-placement^=right] [data-animation=fade].enter {
            opacity: 1;
            -webkit-transform: translateX(10px);
            transform: translateX(10px)
        }

        .tippy-popper[x-placement^=right] [data-animation=fade].leave {
            opacity: 0;
            -webkit-transform: translateX(10px);
            transform: translateX(10px)
        }

        .tippy-popper[x-placement^=right] [data-animation=shift].enter {
            opacity: 1;
            -webkit-transform: translateX(10px);
            transform: translateX(10px)
        }

        .tippy-popper[x-placement^=right] [data-animation=shift].leave {
            opacity: 0;
            -webkit-transform: translateX(0);
            transform: translateX(0)
        }

        .tippy-popper[x-placement^=right] [data-animation=scale].enter {
            opacity: 1;
            -webkit-transform: translateX(10px) scale(1);
            transform: translateX(10px) scale(1)
        }

        .tippy-popper[x-placement^=right] [data-animation=scale].leave {
            opacity: 0;
            -webkit-transform: translateX(0) scale(0);
            transform: translateX(0) scale(0)
        }

        .tippy-popper .tippy-tooltip.transparent-theme {
            background-color: rgba(0, 0, 0, .7)
        }

        .tippy-popper .tippy-tooltip.transparent-theme[data-animatefill] {
            background-color: transparent
        }

        .tippy-popper .tippy-tooltip.light-theme {
            color: #26323d;
            box-shadow: 0 4px 20px 4px rgba(0, 20, 60, .1), 0 4px 80px -8px rgba(0, 20, 60, .2);
            background-color: #fff
        }

        .tippy-popper .tippy-tooltip.light-theme[data-animatefill] {
            background-color: transparent
        }

        .tippy-tooltip {
            position: relative;
            color: #fff;
            border-radius: 4px;
            font-size: .95rem;
            padding: .4rem .8rem;
            text-align: center;
            will-change: transform;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
            background-color: #333
        }

        .tippy-tooltip--small {
            padding: .25rem .5rem;
            font-size: .8rem
        }

        .tippy-tooltip--big {
            padding: .6rem 1.2rem;
            font-size: 1.2rem
        }

        .tippy-tooltip[data-animatefill] {
            overflow: hidden;
            background-color: transparent
        }

        .tippy-tooltip[data-interactive] {
            pointer-events: auto
        }

        .tippy-tooltip[data-inertia] {
            transition-timing-function: cubic-bezier(.53, 2, .36, .85)
        }

        .tippy-tooltip [x-arrow] {
            position: absolute;
            width: 0;
            height: 0
        }

        .tippy-tooltip [x-circle] {
            position: absolute;
            will-change: transform;
            background-color: #333;
            border-radius: 50%;
            width: 130%;
            width: calc(110% + 2rem);
            left: 50%;
            top: 50%;
            z-index: -1;
            overflow: hidden;
            transition: all ease
        }

        .tippy-tooltip [x-circle]:before {
            content: "";
            padding-top: 90%;
            float: left
        }

        @media (max-width:450px) {
            .tippy-popper {
                max-width: 96%;
                max-width: calc(100% - 20px)
            }
        }
    </style>
    <style type="text/css">
        .ubersuggest-header-container {
            box-sizing: border-box;
            width: 100%;
            font-size: 12px;
        }

        .ubersuggest-header-container .row {
            margin: 0;
            padding: 15px 16px 15px 16px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            min-height: 30px;
        }

        .ue-enable {
            display: block;
        }

        .ue-disable {
            display: none !important;
        }

        .ubersuggest-header-container .settings {
            display: flex;
            align-items: center;
            margin-right: 18px;
        }

        .ubersuggest-header-container .settings-label {
            margin-right: 21px;
        }

        .ubersuggest-header-container .settings-icon {
            width: 21px;
            height: 21px;
            margin-right: 7px;
        }
    </style>
    <style type="text/css">
        .keyword-info-section {
            color: #26282d;
            font-family: Arial;
            font-size: 12px;
            padding: 8px 0 10px 8px;
            display: flex;
            align-items: center;
        }

        .keyword-info-section.hidden {
            display: none;
        }

        .keyword-info-section.google {
            background-color: #fff;
        }

        body[data-dt='1'] .keyword-info-section.google {
            background-color: #303134;
        }

        .keyword-info-section.youtube {
            margin-right: 15px;
            padding: 0 0 0 10px;
            height: 100%;
            background-color: #fff;
        }

        html[dark='true'] .keyword-info-section.youtube {
            background-color: #121212;
        }

        .keyword-info-section.amazon {
            padding: 13px 0;
            background-color: #fff;
        }
    </style>
    <style type="text/css">
        .kw-overview-container {
            box-sizing: border-box;
            width: 673px;
            padding: 0;
            margin: 0;
            margin-top: 14px;
            font-size: 12px;
            font-family: Arial;
        }

        .kw-overview-container.youtube {
            box-sizing: border-box;
            width: 100%;
            padding: 0;
            margin: 0;
            font-size: 12px;
        }
    </style>
    <style type="text/css">
        .bl-info-container {
            box-sizing: border-box;
            width: 100%;
            padding: 0;
            margin: 0;
            font-size: 12px;
        }

        .bl-info-header {
            display: flex;
            height: 24px;
            width: 100%;
            padding: 0;
            justify-content: space-between;
            cursor: pointer;
            box-sizing: border-box;
            margin-bottom: 5px;
        }

        .bl-info-header .row {
            display: flex;
            margin: 0;
            width: 100%;
            justify-content: space-between;
        }

        .bl-info-header .row.youtube {
            justify-content: flex-start;
        }

        .bl-info-content,
        .kw-info-content {
            width: 100%;
            display: flex;
            flex-direction: column;
            border: 1px solid #dee1e5;
            border-radius: 8px;
            padding-top: 0;
        }

        body[data-dt='1'] .kw-info-content,
        body[data-dt='1'] .bl-info-content {
            background: #2a2a2a;
            border-color: #2a2a2a;
        }

        .bl-info-content img.loading {
            width: 50px;
            margin: 0 auto;
            margin-bottom: 10px;
        }

        .kw-info-content img.loading {
            width: 50px;
            margin: 0 auto;
            margin-top: 10px;
            margin-bottom: 10px;
        }

        table.bl-info-table,
        table.kw-info-table {
            border-collapse: collapse;
            width: 100%;
            color: #808185;
            font-size: 12px;
        }

        body[data-dt='1'] table.bl-info-table,
        body[data-dt='1'] table.kw-info-table {
            color: #fff;
        }

        .bl-info-table thead,
        .kw-info-table thead {
            height: 50px;
        }

        .bl-info-table tr,
        .kw-info-table tr {
            width: 100%;
            max-width: 600px;
        }

        .bl-info-table th,
        .kw-info-table th {
            padding: 10px;
            padding-left: 0;
            font-weight: bold;
            color: #000000;
            font-size: 11px;
            border-bottom: 1px solid #dee1e5;
        }

        body[data-dt='1'] .bl-info-table th,
        body[data-dt='1'] .kw-info-table th {
            color: #fff;
        }

        .bl-info-table th:first-child,
        .kw-info-table th:first-child {
            padding-left: 16px;
        }

        .bl-info-table th:last-child,
        .kw-info-table th:last-child {
            border-right: none;
            padding-right: 16px;
        }

        .bl-info-table td,
        .kw-info-table td {
            border-bottom: 1px solid #dee1e5;
            padding: 10px;
            padding-left: 0;
            max-width: 0;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
            color: #000;
        }

        body[data-dt='1'] .bl-info-table td,
        body[data-dt='1'] .kw-info-table td {
            color: #fff;
        }

        .bl-info-table td:first-child,
        .kw-info-table td:first-child {
            border-left: none;
            padding-left: 16px;
        }

        .bl-info-table td:last-child,
        .kw-info-table td:last-child {
            border-right: none;
            padding-right: 16px;
        }

        .bl-info-table tfoot tr:last-child td,
        .kw-info-table tfoot tr:last-child td {
            border-bottom: none;
        }

        .bl-info-container .row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 10px;
            margin-bottom: 20px;
        }
    </style>
    <style type="text/css">
        .statistics-graph-container {
            box-sizing: border-box;
            width: 100%;
            margin-bottom: 5px;
            font-size: 12px;
            padding: 0px 16px;
        }

        .statistics-graph-container .row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin: 10px 0 20px 0;
        }

        .statistics-graph-container .row .title {
            color: #26282d;
            font-size: 17px;
            font-weight: bold;
        }

        .statistics-graph-container .tabs {
            list-style: none;
            display: flex;
            justify-content: flex-start;
            border-bottom: 1px solid #dee1e5;
            margin: 0 -16px;
            margin-bottom: 10px;
            margin-top: -10px;
            padding: 0px 16px;
        }

        .statistics-graph-container .tabs li {
            display: flex;
            align-items: center;
            padding: 8px 16px;
            color: #000;
            cursor: pointer;
            font-size: 13px;
            border-bottom: 3px solid transparent;
        }

        .statistics-graph-container .tabs li:first-child {
            margin-left: -16px;
        }

        .statistics-graph-container .tabs li.active {
            color: #4285f4;
            border-bottom: 3px solid #4285f4;
        }

        /* Google Dark Theme */
        body[data-dt='1'] .statistics-graph-container .row .title {
            color: #fff;
        }

        body[data-dt='1'] .statistics-graph-container .tabs {
            border-bottom: 1px solid #dee1e5;
        }

        body[data-dt='1'] .statistics-graph-container .tabs li {
            color: #fff;
        }

        body[data-dt='1'] .statistics-graph-container .tabs li.active {
            color: #fff;
            border-bottom: 3px solid #fff;
        }
    </style>

    <style type="text/css">
        #o1r0kcdrlmf81636130071562 {
            outline: none !important;
            visibility: visible !important;
            resize: none !important;
            box-shadow: none !important;
            overflow: visible !important;
            background: none !important;
            opacity: 1 !important;
            filter: alpha(opacity=100) !important;
            -ms-filter: progid:DXImageTransform.Microsoft.Alpha(Opacity 1) !important;
            -mz-opacity: 1 !important;
            -khtml-opacity: 1 !important;
            top: auto !important;
            right: 0px !important;
            bottom: 0px !important;
            left: auto !important;
            position: fixed !important;
            border: 0 !important;
            min-height: 0px !important;
            min-width: 0px !important;
            max-height: none !important;
            max-width: none !important;
            padding: 0px !important;
            margin: 0px !important;
            -moz-transition-property: none !important;
            -webkit-transition-property: none !important;
            -o-transition-property: none !important;
            transition-property: none !important;
            transform: none !important;
            -webkit-transform: none !important;
            -ms-transform: none !important;
            width: auto !important;
            height: auto !important;
            display: block !important;
            z-index: 2000000000 !important;
            background-color: transparent !important;
            cursor: none !important;
            float: none !important;
            border-radius: unset !important;
            pointer-events: auto !important;
            clip: auto !important;
        }
    </style>
    <script src="https://cdn.jsdelivr.net/emojione/2.2.7/lib/js/emojione.min.js" type="text/javascript" async="" defer=""></script>
    <script src="https://cdn.jsdelivr.net/emojione/2.2.7/lib/js/emojione.min.js" type="text/javascript" async="" defer=""></script>
    <style type="text/css">
        @keyframes tawkMaxOpen {
            0% {
                opacity: 0;
                transform: translate(0, 30px);
                ;
            }

            to {
                opacity: 1;
                transform: translate(0, 0px);
            }
        }

        @-moz-keyframes tawkMaxOpen {
            0% {
                opacity: 0;
                transform: translate(0, 30px);
                ;
            }

            to {
                opacity: 1;
                transform: translate(0, 0px);
            }
        }

        @-webkit-keyframes tawkMaxOpen {
            0% {
                opacity: 0;
                transform: translate(0, 30px);
                ;
            }

            to {
                opacity: 1;
                transform: translate(0, 0px);
            }
        }

        #d0k961r0uaq81636130071688.open {
            animation: tawkMaxOpen .25s ease !important;
        }

        @keyframes tawkMaxClose {
            from {
                opacity: 1;
                transform: translate(0, 0px);
                ;
            }

            to {
                opacity: 0;
                transform: translate(0, 30px);
                ;
            }
        }

        @-moz-keyframes tawkMaxClose {
            from {
                opacity: 1;
                transform: translate(0, 0px);
                ;
            }

            to {
                opacity: 0;
                transform: translate(0, 30px);
                ;
            }
        }

        @-webkit-keyframes tawkMaxClose {
            from {
                opacity: 1;
                transform: translate(0, 0px);
                ;
            }

            to {
                opacity: 0;
                transform: translate(0, 30px);
                ;
            }
        }

        #d0k961r0uaq81636130071688.closed {
            animation: tawkMaxClose .25s ease !important
        }
    </style>
</head>

<body class="cms-index-index cms-home-page" onload="goforit()" data-new-gr-c-s-check-loaded="14.1037.0" data-gr-ext-installed="" style="position: relative; min-height: 100%; top: 0px;">
    <!-- Header -->
    <header>

        <div class="header">
            <div class="container">
                <div class="row">

                    <div class="col-lg-6 col-sm-6 col-xs-12">
                        <!-- Header Logo -->
                        <div class="logo"><a title="Ceetech.com.ng" onclick="javascript:location.href='index.php'"><img alt="Ceetch" width="170px" src="images/logo.png"></a> </div>
                        <!-- End Header Logo -->
                    </div>

                    <div class="col-lg-6 col-sm-6 col-xs-12">
                        <div class="top-cart-contain">


                            <script>
                                var dayarray = new Array("Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday")
                                var montharray = new Array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December")

                                function getthedate() {
                                    var mydate = new Date()
                                    var year = mydate.getYear()
                                    if (year < 1000)
                                        year += 1900
                                    var day = mydate.getDay()
                                    var month = mydate.getMonth()
                                    var daym = mydate.getDate()
                                    if (daym < 10)
                                        daym = "0" + daym
                                    var hours = mydate.getHours()
                                    var minutes = mydate.getMinutes()
                                    var seconds = mydate.getSeconds()
                                    var dn = "AM"
                                    if (hours >= 12)
                                        dn = "PM"
                                    if (hours > 12) {
                                        hours = hours - 12
                                    }
                                    if (hours == 0)
                                        hours = 12
                                    if (minutes <= 9)
                                        minutes = "0" + minutes
                                    if (seconds <= 9)
                                        seconds = "0" + seconds
                                    //change font size here
                                    var cdate = "<font face='Adams' size='6.0em'><b> " + hours + ":" + minutes + ":" + seconds + " " + dn +
                                        " <br><p style=' font-size: 0.5em; '>" + dayarray[day] + ", " + montharray[month] + " " + daym + ", " + year + ".</p></b></font>"
                                    if (document.all)
                                        document.all.clock.innerHTML = cdate
                                    else if (document.getElementById)
                                        document.getElementById("clock").innerHTML = cdate
                                    else
                                        document.write(cdate)
                                }
                                if (!document.all && !document.getElementById)
                                    getthedate()

                                function goforit() {
                                    if (document.all || document.getElementById)
                                        setInterval("getthedate()", 1000)
                                }
                            </script>
                            <span id="clock" title="Hello! the time is:">
                                <font face="Adams" size="6.0em"><b> <br>
                                        <p style=" font-size: 0.5em; "></p>
                                    </b></font>
                            </span>


                        </div>
                    </div>





                </div>
            </div>
        </div>
    </header>
    <!-- end header -->


    <!-- Navbar -->
    <nav class="sticky">
        <div class="container noprint">
            <div class="row">
                <div class="nav-inner">
                    <!-- mobile-menu -->
                    <div class="hidden-desktop" id="menu">
                        <ul class="navmenu">
                            <li>
                                <div class="menutop">
                                    <div class="toggle"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span></div>
                                    <!--<h2>Menu</h2>-->
                                </div>
                            </li>
                        </ul>
                    </div>
                    <!-- mobile-menu -->


                    <!-- End Search-col -->
                </div>
            </div>
        </div>
    </nav>
    <!-- End Nav -->


    <!-- Breadcrumbs -->
    <div class="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="inner">
                        <ul>
                            <li class="home"> <a title="Go Back to My Account Dashboard" onclick="javascript:location.href='index.php'">Home</a><span>—›</span></li>
                            <li class="category13"><strong>My Cards [1 unit(s) of <?php echo $card_type; ?>]</strong></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumbs End -->

    <div class="slider-section">
        <div class="container">
            <div class="row">

                <div style="margin: auto; display: block; float: right;">
                    <a onclick="javascript:location.href='index.php'" id="print_button1" style="width: 150px; padding: 5px 8px 5px 8px;text-align: center;background-color: #02A6D8;color: #fff;text-decoration: none; margin: 10px;"><span style="cursor: pointer;">Back to Dashboard</span></a>
                    <a href="javascript:window.print()" id="print_button2" style="width: 150px; padding: 5px 8px 5px 8px;text-align: center;background-color: #02A6D8;color: #fff;text-decoration: none; margin: 10px;">Print Scratch Card(s)</a>
                </div>


                <p align="center">
                </p>
                <div align="center">
                </div>
                <table class="table-curved">
                    <tbody class="table-curved-body">

                        <tr>
                            <th>S/N</th>
                            <th>CARD TYPE</th>
                            <th>CARD PIN NO</th>
                            <th>CARD SERIAL NO</th>
                            
                        </tr>

                        <tr bgcolor="#f7f7f7" valign="center" align="center">
                        <?php
                        $card_print = mysqli_query($con, "SELECT * FROM $db WHERE status='0' LIMIT $quantity");
                        $nu = 1;

                        if (mysqli_num_rows($card_print) == 0) {
                            echo "<script>window.alert('Sorry we are currently out of $card_type please check back in few minutes time'); </script>";
                            echo "<script>window.location.href='scratch_cards.php'; </script>";
                        }
                        while ($rows = mysqli_fetch_array($card_print)) {
                            $card_id = $rows['id'];
                        ?>
                           <td><?php echo htmlentities($nu); echo '.';  ?></td>
                            <td><?= $card_type; ?></td>
                            <td><?php echo $rows['pin']; ?></td>
                            <td><?php echo $rows['serial_no']; ?></td>


                        </tr>
                        <?php $nu = $nu + 1;
                            //update card status
                            
                            $update_card = mysqli_query($con, "UPDATE $db SET status='1', buyer_id='$username',time_bought='$date' WHERE id='$card_id'");
                            //update buyer bal
                            $rem_bal = $bal - $amount;
                            $update_bal = mysqli_query($con, "UPDATE user SET bal='$rem_bal' WHERE id='$uid'");
                }
            }
        } 
                    
                    }
                         else{
                        echo "<script> window.location.href='index.php'; </script>";
                        } 
                        
                        ?>

                    </tbody>
                </table>

                <img style="margin: auto; display: block;" alt="Thank You" src="images/Thank-you_icon.png">
                <h2 style="color:black; font-size:30pt; font-style:italic; font-family: sans-serif; text-align:center;">Serving you is always a pleasure</h2>

                <p></p>






                <br><br>
            </div>
        </div>
    </div>







    <script type="text/javascript">
        //<![CDATA[
        jQuery(function() {
            jQuery(".slideshow").cycle({
                fx: 'scrollHorz',
                easing: 'easeInOutCubic',
                timeout: 10000,
                speedOut: 800,
                speedIn: 800,
                sync: 1,
                pause: 1,
                fit: 0,
                pager: '#home-slides-pager',
                prev: '#home-slides-prev',
                next: '#home-slides-next'
            });
        });
        //]]>
    </script>







    <iframe frameborder="0" scrolling="no" style="background-color: transparent; border: 0px; display: none;"></iframe>
    <div id="goog-gt-tt" class="skiptranslate" dir="ltr">
        <div style="padding: 8px;">
            <div>
                
        </div>
        <div class="top" style="padding: 8px; float: left; width: 100%;">
        </div>
        <div class="middle" style="padding: 8px;">
            <div class="original-text"></div>
        </div>
        
        <div class="status-message" style="display: none;"></div>
    </div>
    <div id="GOOGLE_INPUT_CHEXT_FLAG" input="" input_stat="{&quot;tlang&quot;:true,&quot;tsbc&quot;:true,&quot;pun&quot;:true,&quot;mk&quot;:true,&quot;ss&quot;:true}" style="display: none;"></div>
    <div class="goog-te-spinner-pos">
        <div class="goog-te-spinner-animation"><svg xmlns="http://www.w3.org/2000/svg" class="goog-te-spinner" width="96px" height="96px" viewBox="0 0 66 66">
                <circle class="goog-te-spinner-path" fill="none" stroke-width="6" stroke-linecap="round" cx="33" cy="33" r="30"></circle>
            </svg></div>
    </div><iframe frameborder="0" class="goog-te-menu-frame skiptranslate" title="Language Translate Widget" style="visibility: visible; box-sizing: content-box; width: 1046px; height: 263px; display: none;"></iframe><a href="#" id="toTop" style="display: block;"><span id="toTopHover"></span></a>
    <div class="ue-sidebar-container"></div>
    <div id="o1r0kcdrlmf81636130071562" style="display: block !important;"><iframe src="about:blank" frameborder="0" scrolling="no" width="64px" height="60px" style="outline:none !important; visibility:visible !important; resize:none !important; box-shadow:none !important; overflow:visible !important; background:none !important; opacity:1 !important; filter:alpha(opacity=100) !important; -ms-filter:progid:DXImageTransform.Microsoft.Alpha(Opacity 1) !important;} -mz-opacity:1 !important; -khtml-opacity:1 !important; top:auto !important; right:16px !important; bottom:20px !important; left:auto !important; position:fixed !important; border:0 !important; min-height:60px !important; min-width:64px !important; max-height:60px !important; max-width:64px !important; padding:0 !important; margin:0 !important; -moz-transition-property:none !important; -webkit-transition-property:none !important; -o-transition-property:none !important; transition-property:none !important; transform:none !important; -webkit-transform:none !important; -ms-transform:none !important; width:64px !important; height:60px !important; display:block !important; z-index:1000001 !important; background-color:transparent !important; cursor:none !important; float:none !important; border-radius:unset !important; pointer-events:auto !important; clip:auto !important;" id="at4i7bhgrlug1636130071608" class="" title="chat widget"></iframe><iframe src="about:blank" frameborder="0" scrolling="no" width="300px" height="360px" style="outline:none !important; visibility:visible !important; resize:none !important; box-shadow:none !important; overflow:visible !important; background:none !important; opacity:1 !important; filter:alpha(opacity=100) !important; -ms-filter:progid:DXImageTransform.Microsoft.Alpha(Opacity 1}) !important; -mz-opacity:1 !important; -khtml-opacity:1 !important; top:auto !important; right:10px !important; bottom:90px !important; left:auto !important; position:fixed !important; border:0 !important; min-height:360px !important; min-width:300px !important; max-height:360px !important; max-width:300px !important; padding:0 !important; margin:0 !important; -moz-transition-property:none !important; -webkit-transition-property:none !important; -o-transition-property:none !important; transition-property:none !important; transform:none !important; -webkit-transform:none !important; -ms-transform:none !important; width:300px !important; height:360px !important; display:none !important; z-index:auto !important; background-color:transparent !important; cursor:none !important; float:none !important; border-radius:5px !important; pointer-events:auto !important; clip:auto !important;" id="d0k961r0uaq81636130071688" class="" title="chat widget"></iframe><iframe src="about:blank" frameborder="0" scrolling="no" width="360px" height="10px" style="outline:none !important; visibility:visible !important; resize:none !important; box-shadow:none !important; overflow:visible !important; background:none !important; opacity:1 !important; filter:alpha(opacity=100) !important; -ms-filter:progid:DXImageTransform.Microsoft.Alpha(Opacity 1}) !important; -mz-opacity:1 !important; -khtml-opacity:1 !important; top:auto !important; right:20px !important; bottom:100px; left:auto !important; position:fixed !important; border:0 !important; min-height:10px !important; min-width:360px !important; max-height:10px !important; max-width:360px !important; padding:0 !important; margin:0 !important; -moz-transition-property:none !important; -webkit-transition-property:none !important; -o-transition-property:none !important; transition-property:none !important; transform:none !important; -webkit-transform:none !important; -ms-transform:none !important; width:360px !important; height:10px !important; display:none !important; z-index:auto !important; background-color:transparent !important; cursor:none !important; float:none !important; border-radius:unset !important; pointer-events:auto !important; clip:auto !important;" id="damsv9ug2kq81636130071660" class="" title="chat widget"></iframe><iframe src="about:blank" frameborder="0" scrolling="no" width="142px" height="86px" style="outline:none !important; visibility:visible !important; resize:none !important; box-shadow:none !important; overflow:visible !important; background:none !important; opacity:1 !important; filter:alpha(opacity=100) !important; -ms-filter:progid:DXImageTransform.Microsoft.Alpha(Opacity 1}) !important; -mz-opacity:1 !important; -khtml-opacity:1 !important; top:auto !important; right:69px !important; bottom:44px !important; left:auto !important; position:fixed !important; border:0 !important; min-height:86px !important; min-width:142px !important; max-height:86px !important; max-width:142px !important; padding:0 !important; margin:0px 0 0 0 !important; -moz-transition-property:none !important; -webkit-transition-property:none !important; -o-transition-property:none !important; transition-property:none !important; transform:rotate(0deg) translateZ(0); -webkit-transform:rotate(0deg) translateZ(0); -ms-transform:rotate(0deg) translateZ(0); width:142px !important; height:86px !important; display:block !important; z-index:1000002 !important; background-color:transparent !important; cursor:none !important; float:none !important; border-radius:unset !important; pointer-events:auto !important; clip:auto !important; -moz-transform:rotate(0deg) translateZ(0); -o-transform:rotate(0deg) translateZ(0); transform-origin:0; -moz-transform-origin:0; -webkit-transform-origin:0; -o-transform-origin:0; -ms-transform-origin:0;" id="i6tiia59sqa81636130071635" class="" title="chat widget"></iframe></div>
</body>

</html>
<?php } else{
    echo "<script>document.location.href='logout.php'; </script>";
    exit;
} ?>