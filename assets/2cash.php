<?php
	require_once '../core/conn.php';
	header('Content-type: application/json; charset=UTF-8');
	$response = array();
	if (isset($_POST['mtn']) && ($_POST['glo']) && ($_POST['mobile']) && ($_POST['airtel'])) {
	    $mtn = $_POST['mtn'];
	    $glo= $_POST['glo'];
	    $mobile = $_POST['mobile'];
	    $airtel = $_POST['airtel'];
	    
	     if(empty($mtn)){
	         $response['title']  = 'opps';
		    $response['status']  = 'error';
			$response['message'] = 'Mtn share and sell dicount  must not be empty';
	    }else if(empty($glo)){
	         $response['title']  = 'opps';
		    $response['status']  = 'error';
			$response['message'] = 'Glo share and sell dicount must not be empty';
	    }else if(empty($mobile)){
	         $response['title']  = 'opps';
		    $response['status']  = 'error';
			$response['message'] = '9mobile share and sell dicount must not be empty';
	    }else if(empty($airtel)){
	         $response['title']  = 'opps';
		    $response['status']  = 'error';
			$response['message'] = 'Airtel share and selll dicount must not be empty';
  }else{
	        
	    $updat = mysqli_query($con,"UPDATE 2cash SET mtn='$mtn',glo='$glo',airtel='$airtel', 9mobile='$mobile'");     
	        
	        if($updat){
	   
	       $response['title']  = 'success';
		    $response['status']  = '500';
			$response['message'] = 'success'; 
	    }else{
                $response['title']  = 'opps';
	     	    $response['status']  = 'error';
		     	$response['message'] = 'unable to update the share and sell';
	    }
	    }
	    
	}else{
	        $response['title']  = 'opps';
	     	    $response['status']  = 'error';
		     	$response['message'] = 'please fill all the box do not leave anyone empty';
	}
  echo json_encode($response);