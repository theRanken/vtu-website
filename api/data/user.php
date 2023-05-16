<?php
$adex_api = strval($adex_api);
$gb = mysqli_query($con, "SELECT * FROM user WHERE apikey = '$adex_api'") or die(mysqli_error($con));
$reco = mysqli_fetch_array($gb);
$blc = doubleval($reco['bal']);
$level = strval($reco['type']);
$email = strval($reco['email']);
$username = strval($reco['username']);

if ($level == "API") {
    $account_type = "api";
} elseif ($level == "AFFILIATE") {
    $account_type = "reseller";
} elseif ($level == "SMART") {
    $account_type = "price";
}
?>