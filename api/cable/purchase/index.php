<?php
require_once dirname(__DIR__) . "/cable.class.php";
require_once dirname(dirname(__DIR__)) . "/helpers.php";

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header("Access-Control-Allow-Methods: GET");
header("Allow: GET, POST, OPTIONS, PUT, DELETE");
header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method, Access-Control-Allow-Origin");


if (is_authorized()) {
    $authorization = get_token();
    if (is_verified($authorization)){
        if(
            isset($_POST['service']) && 
            isset($_POST['plan']) && 
            isset($_POST['iuc']) && 
            isset($_POST['recipient']) && 
            isset($_POST['phone'])
        ){
            // get details from the post request
            $user = user($authorization); // user making the request
            $recipient = $_POST['recipient']; // person who recieves the subscription
            $serviceID = $_POST['service']; // subscription service e.g DSTV
            $iucNumber = $_POST['iuc']; // Smart Card or IUC Number
            $variationCode = $_POST['plan']; // subscription service plan e.g Dstv Compact
            $amount = $_POST['amount'] ?? null;
            $phone = $_POST['phone']; //In number of months
            $serviceCharge = $_POST['service_charge'];

            //checks if the service is available as set by the admin
            if(is_cable_locked($serviceID)){
                echo json_encode($serviceID." is currently unavailable");
                return http_response_code(400);
            }
            // try the purchase
            try {
                echo $cable->purchase(
                    $user->username,
                    $recipient,
                    $serviceID,
                    $iucNumber,
                    $variationCode,
                    $phone,
                    $serviceCharge
                );
                return http_response_code(200);
            } catch (Exception $e) {
                echo json_encode($e->getMessage());
                return http_response_code(500);
            }
        } else {
            echo json_encode("Bad Request, All purchase fields are required");
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