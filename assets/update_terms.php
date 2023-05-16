<?php
	require_once '../core/conn.php';
	header('Content-type: application/json; charset=UTF-8');
	$response = array();
	if (isset($_POST['terms'])) {
	    $terms=$_POST['terms'];
	    
	 $query = mysqli_query($con, "UPDATE terms SET adex='$terms'");
        
        if($query){
		
    
			$response['title']  = '500';
		    $response['status']  = '500';
			$response['message'] = '500';
			
        }else{
             $response['title']  = 'opps';
		    $response['status']  = 'error';
			$response['message'] = 'we re unable to update the terms and agreement';
        }

   }else{
        $response['title']  = 'opps';
		    $response['status']  = 'error';
			$response['message'] = 'something went wrong contact adex developer';
   }
     echo json_encode($response);