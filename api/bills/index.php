<?php
require_once __DIR__ . "/bills.class.php";
require_once dirname(__DIR__) . "/helpers.php";

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header("Access-Control-Allow-Methods: GET, POST");
header("Allow: GET, POST");
header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method, Access-Control-Allow-Origin");


if(is_get()){
    if(
        isset($_GET['billersCode']) && 
        isset($_GET['service']) &&
        isset($_GET['meterType'])
    ){
        try {
            $details = $utility->get_meter_details($_GET['billersCode'], $_GET['service'], $_GET['meterType']);
            echo $details;
            return http_response_code(200);
        } catch (Exception $e) {
            echo json_encode($e->getMessage());
            return http_response_code(500);
        }        

    }else{
        echo json_encode("Error, 'billers code', 'serviceID' & 'meterType' fields are required!");
        return http_response_code(400);
    }
}
else if(is_post()){
    if (is_authorized()) {
        $authorization = get_token();
        if (is_verified($authorization)){
            if(
                isset($_POST['disco_name']) && 
                isset($_POST['meter_number']) && 
                isset($_POST['MeterType']) &&   
                isset($_POST['amount']) &&   
                isset($_POST['Customer_Phone'])
            ){
                $user = user($authorization);

                try{
                    $details = $utility->pay_bill(
                        $user->username, 
                        $_POST['disco_name'],
                        $_POST['meter_number'],
                        $_POST['MeterType'],
                        $_POST['amount'],
                        $_POST['Customer_Phone']
                    );

                    echo json_encode($details);
                    return http_response_code(200);
                }
                catch(Exception $e){
                    echo json_encode($e->getMessage() . " [". $e->getFile() . " (Line ".$e->getLine().")]");
                    return http_response_code(500);
                }
            } else {
                echo json_encode("Bad Request, All Billing fields are required");
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
}
else{
    $method = request_method();
    echo json_encode("Sorry the '". $method ."' method is not allowed on this endpoint");
    return http_response_code(405);
}
