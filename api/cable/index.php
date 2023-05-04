<?php
require_once __DIR__ . "/cable.class.php";
header("Content-Type: application/json");

if (isset($_GET['service'])) {
    
    try {
        $service_subscription_plans = $cable->plans($_GET['service']);
        echo $service_subscription_plans;
        return http_response_code(200);
    } catch (Exception $e) {
        echo json_encode(["message" => $e->getMessage()]);
        return http_response_code(500);
    }
}else{
    echo json_encode([
        "message" => "Bad Request"
    ]);
    return http_response_code(400);
}