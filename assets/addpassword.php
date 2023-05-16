<?php
require_once '../core/conn.php';
header('Content-type: application/json; charset=UTF-8');
	$response = array();
		if (isset($_POST['username']) && ($_POST['password'])  && ($_POST['email'])) {
        
        $username = $_POST['username'];
        $password = $_POST['password'];
        $email = $_POST['email'];
      
         if($password < 8){
              $response['title']  = 'opps';
	     	    $response['status']  = 'error';
		     	$response['message'] = 'your password is not strong enough';
         }else{
        
        $updat = mysqli_query($con,"UPDATE admin SET username='$username',email='$email',password1='$password'");     
	        
	        if($updat){
		    $response['status']  = '500';
	    }else{
                $response['title']  = 'opps';
	     	    $response['status']  = 'error';
		     	$response['message'] = 'unable to udate the password try again later';
		     	
	    }
         }
		}else{
		    $response['title']  = 'opps';
	     	    $response['status']  = 'error';
		     	$response['message'] = 'unable to update the cash number';
		}
		echo json_encode($response);