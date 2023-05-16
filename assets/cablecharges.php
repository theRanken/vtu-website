<?php
	require_once '../core/conn.php';
	header('Content-type: application/json; charset=UTF-8');
	$response = array();
	if (isset($_POST['dstv']) && ($_POST['gotv']) && ($_POST['startime'])) {
	    $dstv = $_POST['dstv'];
	    $gotv= $_POST['gotv'];
	    $startime = $_POST['startime'];
	    
	     if(empty($gotv)){
	         $response['title']  = 'opps';
		    $response['status']  = 'error';
			$response['message'] = 'GOTV charges   must not be empty';
	    }else if(empty($startime)){
	         $response['title']  = 'opps';
		    $response['status']  = 'error';
			$response['message'] = 'Startime charges must not be empty';
	    }else if(empty($dstv)){
	         $response['title']  = 'opps';
		    $response['status']  = 'error';
			$response['message'] = 'Dstv charges must not be empty';
  }else{
	        
	    $updat = mysqli_query($con,"UPDATE cablecharges SET gotv='$gotv',startime='$startime',dstv='$dstv'");     
	        
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