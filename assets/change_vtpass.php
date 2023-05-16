<?php
	require_once '../core/conn.php';
	header('Content-type: application/json; charset=UTF-8');
	$response = array();
	if (isset($_POST['vt_username']) && ($_POST['vt_password'])) {
	    $vt_username = $_POST['vt_username'];
	    $vt_password = $_POST['vt_password'];
	    
	    if(empty($vt_username)){
	         $response['tittle']='opps';
	        $response['status']='error';
	        $response['message']='fill all the form';
	    }else{
	        
	      $updat = mysqli_query($con,"UPDATE simhosting SET vt_username='$vt_username',vt_password='$vt_password'");     
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