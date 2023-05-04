<?php
session_start();
if (isset($_SESSION['name'])) {
error_reporting(0);
require_once "../core/conn.php";
$msg = "";
$sql = mysqli_query($con, "SELECT * FROM user WHERE id = {$_SESSION['id']}");
if (mysqli_num_rows($sql) > 0) {
	$row = mysqli_fetch_assoc($sql);
}
$email=$row['email'];
$ret = mysqli_query($conn,"SELECT * FROM pay ");
$da = mysqli_fetch_array($ret);
$pstack = $da['psecret'];
$curl = curl_init();
$reference = isset($_GET['reference']) ? $_GET['reference'] : '';
if(!$reference){
  die('No reference supplied');
}

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.paystack.co/transaction/verify/" . rawurlencode($reference),
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_HTTPHEADER => [
    "accept: application/json",
    "authorization: Bearer $pstack",
    "cache-control: no-cache"
  ],
));

$response = curl_exec($curl);
$err = curl_error($curl);

if($err){
    // there was an error contacting the Paystack API
  die('Curl returned error: ' . $err);
}

$tranx = json_decode($response);

if(!$tranx->status){
  // there was an error from the API
  die('API returned error: ' . $tranx->message);

}

if('success' == $tranx->data->status){
  // transaction was successful...
  // please check other things like whether you already gave value for this ref
  // if the email matches the customer who owns the product etc
  // Give value
 $paidamt =  substr($tranx->data->amount,0,-2);

$charge = substr($tranx->data->fees,0,-2);

$payamt = $paidamt-$charge;

$amtshow = number_format($payamt,2,'.',',');

$addfund = mysqli_query($con, "UPDATE user SET bal=bal+$payamt WHERE email='$email'");
  echo "<h2>You have credited N$payment successfully.</h2>";
}
}
?>