<?php
require_once '../core/conn.php';
header('Content-type: application/json; charset=UTF-8');
	$response = array();
		if (isset($_POST['mtn']) && ($_POST['glo'])  && ($_POST['mobile']) && ($_POST['airtel'])) {
        
        $mtn = $_POST['mtn'];
        $airtel = $_POST['airtel'];
        $glo = $_POST['glo'];
        $mobile = $_POST['mobile'];
        
        $updat = mysqli_query($con,"UPDATE cash_number SET mtn='$mtn',glo='$glo',9mobile='$mobile', airtel='$airtel'");     
	        
	        if($updat){
		    $response['status']  = '500';
	    }else{
                $response['title']  = 'opps';
	     	    $response['status']  = 'error';
		     	$response['message'] = 'unable to update the cash number 1';
		     	
	    }
		}else{
		    $response['title']  = 'opps';
	     	    $response['status']  = 'error';
		     	$response['message'] = 'unable to update the cash number';
		}
		echo json_encode($response);