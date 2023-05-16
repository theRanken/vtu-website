<?php
	require_once '../core/conn.php';
	header('Content-type: application/json; charset=UTF-8');
	$response = array();
	if (isset($_POST['waec']) && ($_POST['neco']) && ($_POST['nabteb'])) {
	    $waec = $_POST['waec'];
	    $neco= $_POST['neco'];
	    $nabteb = $_POST['nabteb'];
	    
	     if(empty($waec)){
	         $response['title']  = 'opps';
		    $response['status']  = 'error';
			$response['message'] = 'WAEC charges   must not be empty';
	    }else if(empty($neco)){
	         $response['title']  = 'opps';
		    $response['status']  = 'error';
			$response['message'] = 'NECO charges must not be empty';
	    }else if(empty($nabteb)){
	         $response['title']  = 'opps';
		    $response['status']  = 'error';
			$response['message'] = 'NABTEB charges must not be empty';
  }else{
	        
	    $updat = mysqli_query($con,"UPDATE scratch_card_prices SET waec_card='$waec',neco_token='$neco',nabteb_token='$nabteb'");     
	        
	        if($updat){
	   
	       $response['title']  = 'success';
		    $response['status']  = '500';
			$response['message'] = 'success'; 
	    }else{
                $response['title']  = 'opps';
	     	    $response['status']  = 'error';
		     	$response['message'] = 'unable to update the Discount';
	    }
	    }
	    
	}else{
	        $response['title']  = 'opps';
	     	    $response['status']  = 'error';
		     	$response['message'] = 'please fill all the box do not leave anyone empty';
	}
  echo json_encode($response);