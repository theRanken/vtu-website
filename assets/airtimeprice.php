<?php
require_once '../core/conn.php';
session_start();
$sql = mysqli_query($con, "SELECT * FROM airtimeprice ");
            if 
            (mysqli_num_rows($sql) > 0){
              $airtime = mysqli_fetch_assoc($sql);
            }

$sql = mysqli_query($con, "SELECT * FROM user WHERE id = {$_SESSION['id']}");
            if 
            (mysqli_num_rows($sql) > 0){
              $row = mysqli_fetch_assoc($sql);
            }

$account=$row['type'];
if($account == 'SMART'){
  $airtimemtn=$airtime['smartpricemtn'];
	$airtimeglo=$airtime['smartpriceglo'];
	$airtimeet=$airtime['smartpriceet'];
	$airtimeair=$airtime['smartpriceair'];
}elseif($account == 'TOPUP'){
		$airtimemtn=$airtime['toppricemtn'];
	   $airtimeglo=$airtime['toppriceglo'];
	$airtimeet=$airtime['toppriceet'];
		$airtimeair=$airtime['toppriceair'];
}elseif($account == 'AFFILIATE'){
	$airtimemtn=$airtime['afpricemtn'];
	$airtimeglo=$airtime['afpriceglo'];
	$airtimeet=$airtime['afpriceet'];
	$airtimeair=$airtime['afpriceair'];
    
}else{
$airtimemtn=$airtime['toppricemtn'];
 $airtimeglo=$airtime['toppriceglo'];
$airtimeet=$airtime['toppriceet'];
$airtimeair=$airtime['toppriceair'];
};

?>