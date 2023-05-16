<?php
$mtn="MTN";
$airtel="AIRTEL";
$mobile="9MOBILE";
$glo="GLO";
$val=$_POST['val'];
if($mtn== $val ){
	echo "<script>$('#code').val('*600 *000*Newpin*Newpin#')</script>";
        echo "<script>$('#codes').val('Press: *600* number *  + amount + *PIN#')</script>";
} elseif ($airtel==$val) {
      echo "<script>$('#code').val('*432# Select Pin Management @ number4 option.  Press 1 to change pin Your current Pin should be your default pin  0000 Then Enter any New Pin.')</script>";
        echo "<script>$('#codes').val('Press: *432* 1  + <br> + Input the phone number you want to transfer to  (). + <br> +  Input the amount involve +   ₦ + amount')</script>";
 }elseif ($mobile == $val) {
        echo "<script>$('#code').val('Press *247*0000*newpin#')</script>";
        echo "<script>$('#codes').val('Press: *131*PIN* + amount + *number*')</script>";
 }elseif ($glo == $val) {
 	echo "<script>$('#code').val(' *132 *00000*Newpin *Newpin#')</script>";
        echo "<script>$('#codes').val('Press: *131*08*  + amount + *PIN#')</script>";
 }else {
 	echo '';
 };
?>