<?php
	require_once '../core/conn.php';
	header('Content-type: application/json; charset=UTF-8');
	
	$response = array();
	
	if (isset($_POST['theme'])) {
	      $theme=$_POST['theme'];
		     if($theme == "one"){
		         $status="2";
		     }elseif($theme == "two"){
		         $status="5";
		     }
		     $update = mysqli_query($con, "UPDATE theme SET status='$status'");
    	    if ($update) {
		  	   $response['status']  = '500';
    	    } else {
		    $response['title'] = 'Fail';
			$response['status']  = 'warning';
			$response['message'] = 'there is an error trying to ugrade the account contact our live support immediately';
    	    	}
            
            
            	echo json_encode($response);
	
	} 
