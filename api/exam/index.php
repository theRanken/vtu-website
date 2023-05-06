<?php
require_once __DIR__ . "/exam.class.php";
require_once dirname(__DIR__) . "/helpers.php";

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header("Access-Control-Allow-Methods: GET, POST");
header("Allow: GET, POST");
header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method, Access-Control-Allow-Origin");


if(is_get()){
    if(isset($_GET['service'])){
        try {
            $details = $exam->get_types($_GET['service']);
            echo $details;
            return http_response_code(200);
        } catch (Exception $e) {
            echo json_encode($e->getMessage());
            return http_response_code(500);
        }        
    }
    else{
        echo json_encode("Error: 'serviceID' field is required!");
        return http_response_code(400);
    }
}
else if(is_post()){
    if (is_authorized()) {
        $authorization = get_token();
        if (is_verified($authorization)){
            if(
                isset($_POST['service']) &&
                isset($_POST['variation']) &&  
                isset($_POST['phone'])
            ){
                $user = user($authorization);
                $service = $_POST['service'];
                $variation = $_POST['variation'];
                $phone = $_POST['phone'];

               try{
                    $details = $exam->buy_scratch_card($user, $service, $variation, $phone);
                    echo $details;
                    return http_response_code(200);

                }catch(Exception $e){
                    echo json_encode($e->getMessage());
                    return http_response_code(500);
                }

            } else {
                echo json_encode("Error: All fields are required!");
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
