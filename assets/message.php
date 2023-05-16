<?php
	require_once '../core/conn.php';
	header('Content-type: application/json; charset=UTF-8');
	$response = array();
	if (isset($_POST['message']) && ($_POST['lock'])) {
	    $message=$_POST['message'];
	    $lock=$_POST['lock'];
	 $query = mysqli_query($con, "UPDATE notif_lock SET message='$message', popup='$lock'");
        
        if($query){
	
		    $response['status']  = '500';
			
        }else{
             $response['title']  = 'opps';
		    $response['status']  = 'error';
			$response['message'] = 'we re unable to update the notification';
        }

   }else{
        $response['title']  = 'opps';
		    $response['status']  = 'error';
			$response['message'] = 'something went wrong contact adex developer';
   }
     echo json_encode($response);