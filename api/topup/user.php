<?php
// fetch airtime prices
$sql = mysqli_query($con, "SELECT * FROM airtimeprice");
if(mysqli_num_rows($sql) > 0){
  $airtime = mysqli_fetch_assoc($sql);
}

//fetch api key for the current user
$sql = mysqli_query($con, "SELECT * FROM user WHERE apikey='$adex_api'");
if(mysqli_num_rows($sql) > 0){
  $row = mysqli_fetch_assoc($sql);
}
// get account detils for this user
$account = $row['type'];
$username = $row['username'];
$blc = $row['bal'];
$email = $row['email'];

// check the account type
if ($account == 'SMART') {
  $airtimemtn = $airtime['smartpricemtn'];
  $airtimeglo = $airtime['smartpriceglo'];
  $airtimeet = $airtime['smartpriceet'];
  $airtimeair = $airtime['smartpriceair'];
} else if($account == 'TOPUP'){
  $airtimemtn = $airtime['toppricemtn'];
  $airtimeglo = $airtime['toppriceglo'];
  $airtimeet = $airtime['toppriceet'];
  $airtimeair = $airtime['toppriceair'];
} else if ($account == 'AFFILIATE'){
  $airtimemtn = $airtime['afpricemtn'];
  $airtimeglo = $airtime['afpriceglo'];
  $airtimeet = $airtime['afpriceet'];
  $airtimeair = $airtime['afpriceair'];

} else{
  $airtimemtn = $airtime['toppricemtn'];
  $airtimeglo = $airtime['toppriceglo'];
  $airtimeet = $airtime['toppriceet'];
  $airtimeair = $airtime['toppriceair'];
}
?>