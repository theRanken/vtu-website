<?php
	require_once '../core/conn.php';
	header('Content-type: application/json; charset=UTF-8');
	
	$response = array();
	
	if (isset($_POST['refbal']) && ($_POST['min']) && ($_POST['airtime']) && ($_POST['refprice'])) {
	$airtime=$_POST['airtime'];
	$min=$_POST['min'];
	$refbal=$_POST['refbal'];
	$refprice=$_POST['refprice'];
	
        if(!is_numeric($min)){
            $response['title']  = 'incorrect';
		    $response['status']  = 'warning';
			$response['message'] = 'it must be numeric';
            }else if(!is_numeric($refbal)){
            $response['title']  = 'incorrect';
		    $response['status']  = 'warning';
			$response['message'] = 'it must be numeric';
            }else if(!is_numeric($airtime)){
            $response['title']  = 'incorrect';
		    $response['status']  = 'warning';
			$response['message'] = 'it must be numeric';
            }else if(!is_numeric($refprice)){
            $response['title']  = 'incorrect';
		    $response['status']  = 'warning';
			$response['message'] = 'it must be numeric';
        }    else    {
                 $update = mysqli_query($con, "UPDATE pay SET min='$min', airtime='$airtime',refbal='$refbal'");
                 $set = mysqli_query($con, "UPDATE general SET referprice='$refprice'");
    	    if ($update && $set) {
		  	   
			$response['status']  = '500';
    	    } else {
		    $response['title'] = 'Fail';
			$response['status']  = 'warning';
			$response['message'] = 'there is an error trying to ugrade the account contact our live support immediately';
    	    	}
            }
            	echo json_encode($response);
	
	} 
