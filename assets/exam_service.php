<?php
	require_once '../core/conn.php';
	header('Content-type: application/json; charset=UTF-8');
	$response = array();
	if (isset($_POST['waec'])) {
	    $waec = $_POST['waec'];
	    $neco = $_POST['neco'];
	    $nabteb = $_POST['nabteb'];
	    
	     if(empty($waec)){
	         $response['title']  = 'opps';
		    $response['status']  = 'error';
			$response['message'] = 'please select WAEC';
	    }else if(empty($neco)){
	         $response['title']  = 'opps';
		    $response['status']  = 'error';
			$response['message'] = 'please select NECO';
	    }else if(empty($nabteb)){
	         $response['title']  = 'opps';
		    $response['status']  = 'error';
			$response['message'] = 'please select Nabteb';
  }else{
	        
	    $updat = mysqli_query($con,"UPDATE exam_lock SET waec='$waec',neco='$neco',nabteb='$nabteb'");     
	        
	        if($updat){
	   
	       $response['title']  = 'success';
		    $response['status']  = 'success';
			$response['message'] = 'you have sucessfully upated the Exam service'; 
	    }else{
                $response['title']  = 'opps';
	     	    $response['status']  = 'error';
		     	$response['message'] = 'unable to update the Exam service';
	    }
	    }
	    
	}else{
	        $response['title']  = 'opps';
	     	    $response['status']  = 'error';
		     	$response['message'] = 'please fill all the box do not leave anyone empty';
	}
  echo json_encode($response);