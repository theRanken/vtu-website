<?php


$vt_pass = mysqli_query($con,"SELECT * FROM simhosting");
$pass = mysqli_fetch_array($vt_pass);

$vt_username =$pass['vt_username'];
$vt_password =$pass['vt_password'];

$vtpass_login = $vt_username.':'.$vt_password;
$us=base64_encode($vtpass_login);

$adminphone=$web['phone'];

$verify_url="https://vtpass.com/api/merchant-verify";

$balance_url="https://vtpass.com/api/balance";

$pay_url="https://vtpass.com/api/pay";

$query_url="https://vtpass.com/api/requery";


echo $us;
?>