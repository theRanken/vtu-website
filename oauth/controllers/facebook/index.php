<?php
require_once "../../FBClientLogin.php";

$code = $_GET['code'] ?? false; 

if(isset($code)){
    $token = $FBClient->fetchAccessTokenCode($code);
}

echo "<pre>".print_r($token)."</pre>";