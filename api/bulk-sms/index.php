<?php
require_once __DIR__ . "/bulk.class.php";
require dirname(__DIR__) . "/helpers.php";

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header("Access-Control-Allow-Methods: GET");
header("Allow: GET, POST, OPTIONS, PUT, DELETE");
header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method, Access-Control-Allow-Origin");

if (is_authorized()) {
    $authorization = get_token();
    if (is_verified($authorization)){
        if(
            isset($_POST['sender']) && 
            isset($_POST['recipient']) && 
            isset($_POST['message']) && 
            isset($_POST['dndMode'])
        ){


        } else {
            echo json_encode("Bad Request, All bulk message fields are required");
            return http_response_code(400);
        }
    } else {
        echo json_encode("Sorry You do not have verified access");
        return http_response_code(401);
    }

} else {
    echo json_encode("Sorry you're not authorized to access this resource");
    return http_response_code(401);
}