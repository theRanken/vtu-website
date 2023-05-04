<?php
	require_once '../core/conn.php';
	header('Content-type: application/json; charset=UTF-8');
	$response = array();
	if (isset($_POST['monnify_secrete']) && ($_POST['monnify_api']) && ($_POST['contract'])) {
	    $monnify_secrete = $_POST['monnify_secrete'];
	    $monnify_api = $_POST['monnify_api'];
	    $contract=$_POST['contract'];
	    $monnify=$_POST['monnify'];
	    if($monnify == "on"){
	        $monnify_set="1";
	    }else{
	        $monnify_set ="0";
	    }
	    
	    if(empty($monnify_api)){
	         $response['tittle']='opps';
	        $response['status']='error';
	        $response['message']='fill all the form';
	    }else{
	        
	      $updat = mysqli_query($con,"UPDATE pay SET msk='$monnify_secrete',mapi='$monnify_api',contact='$contract'"); 
	      
	       $set = mysqli_query($con,"UPDATE setting SET monnify='$monnify_set'");
	        if($updat && $set){
	   
	       $response['title']  = 'success';
		    $response['status']  = '500';
			$response['message'] = 'success'; 
	    }else{
                $response['title']  = 'opps';
	     	    $response['status']  = 'error';
		     	$response['message'] = 'unable to change api key';
	    }
	    }
	}else{
	        $response['title']  = 'opps';
	     	    $response['status']  = 'error';
		     	$response['message'] = 'please fill all the box do not leave anyone empty';
	}
  echo json_encode($response);