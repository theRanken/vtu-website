<?php
	require_once '../core/conn.php';
	header('Content-type: application/json; charset=UTF-8');
	$response = array();
	if (isset($_POST['gotv'])) {
	    $gotv = $_POST['gotv'];
	    $dstv= $_POST['dstv'];
	    $startime = $_POST['startime'];
	    
	     if(empty($gotv)){
	         $response['title']  = 'opps';
		    $response['status']  = 'error';
			$response['message'] = 'please select Gotv';
	    }else if(empty($dstv)){
	         $response['title']  = 'opps';
		    $response['status']  = 'error';
			$response['message'] = 'please select Dstv';
	    }else if(empty($startime)){
	         $response['title']  = 'opps';
		    $response['status']  = 'error';
			$response['message'] = 'please select Startime';
  }else{
	        
	    $updat = mysqli_query($con,"UPDATE cable_lock SET gotv='$gotv',dstv='$dstv',startime='$startime'");     
	        
	        if($updat){
	   
	       $response['title']  = 'success';
		    $response['status']  = 'success';
			$response['message'] = 'you have sucessfully upated the cable service'; 
	    }else{
                $response['title']  = 'opps';
	     	    $response['status']  = 'error';
		     	$response['message'] = 'unable to update the data service';
	    }
	    }
	    
	}else{
	        $response['title']  = 'opps';
	     	    $response['status']  = 'error';
		     	$response['message'] = 'please fill all the box do not leave anyone empty';
	}
  echo json_encode($response);