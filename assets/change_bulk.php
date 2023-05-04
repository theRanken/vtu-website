<?php
	require_once '../core/conn.php';
	header('Content-type: application/json; charset=UTF-8');
	$response = array();
	if (isset($_POST['bulk_username']) && ($_POST['bulk_password'])) {
	    $bulk_username = $_POST['bulk_username'];
	    $bulk_password = $_POST['bulk_password'];
	    
	    if(empty($bulk_username)){
	         $response['tittle']='opps';
	        $response['status']='error';
	        $response['message']='fill all the form';
	    }else{
	        
	      $updat = mysqli_query($con,"UPDATE simhosting SET bulk_username='$bulk_username',bulk_password='$bulk_password'");     
	        if($updat){
	   
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