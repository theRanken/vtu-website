<?php
	require_once '../core/conn.php';
	header('Content-type: application/json; charset=UTF-8');
	
	$response = array();
	
	if (isset($_POST['reseller']) && ($_POST['topup'])) {
		$reseller = $_POST['reseller'];
		$topup = $_POST['topup'];
		   if(!is_numeric($reseller)){
            $response['title']  = 'incorrect';
		    $response['status']  = 'warning';
			$response['message'] = 'please enter the price';
            }elseif(!is_numeric($topup)){
                $response['title']  = 'incorrct';
		    $response['status']  = 'warning';
			$response['message'] = 'please enter the corect Topup Price';
            }else{
                 $update = mysqli_query($con, "UPDATE upgrade_user SET reseller='$reseller', topup='$topup'");
    	    if ($update) {
		  	   $response['title']  = 'success';  
			$response['status']  = '500';
    	    } else {
		    $response['title'] = 'Fail';
			$response['status']  = 'warning';
			$response['message'] = 'there is an error occur';
    	    	}
            }
            	echo json_encode($response);
	
	} 
