<?php
require_once dirname(__DIR__) . "/core/conn.php";
require "helpers.php";

$pin = $_GET["pin"];
$user = $_GET["user"];

if(isset($pin) && isset($user)){
    $get_pin = $con->query("SELECT * FROM user WHERE id='$user' AND pin='$pin' ");
    if($get_pin->num_rows <= 0 ){
        echo json_encode("Invalid Pin");
        return http_response_code(404);
    }
    echo json_encode("Pin Correct");
    return http_response_code(200);
}else{
    echo json_encode("expects both 'pin' &  'user' field(s)");
    return http_response_code(422);
}