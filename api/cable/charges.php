<?php
require_once dirname(__DIR__) . "/../core/conn.php";

$service = $_GET["service"]; 

if(isset($service)){
    $get_charges = $con->query("SELECT * FROM cablecharges");
    $charges = $get_charges->fetch_assoc();
    $service = (double) $charges[strtolower($service)];

    echo json_encode($service);
    return http_response_code(200);
}else{
    echo json_encode("0.0");
    return http_response_code(404);
}