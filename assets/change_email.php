<?php
	require_once '../core/conn.php';
	header('Content-type: application/json; charset=UTF-8');
	$response = array();
	if (isset($_POST['sender']) && ($_POST['host']) && ($_POST['username']) && ($_POST['password'])) {
	    
	    $username= $_POST['username'];
	    $sender=$_POST['sender'];
	    $password=$_POST['password'];
	    $host=$_POST['host'];
	    
	    if(empty($username)){
	        $response['tittle']='opps';
	        $response['status']='error';
	        $response['message']='fill all the form';
	    }elseif(empty($password)){
	        $response['tittle']='opps';
	        $response['status']='error';
	        $response['message']='fill all the form';
	    }elseif(empty($sender)){
	        $response['tittle']='opps';
	        $response['status']='error';
	        $response['message']='fill all the form';
	    }elseif(empty($host)){
	        $response['tittle']='opps';
	        $response['status']='error';
	        $response['message']='fill all the form';
	    }else{
	        
	     $updat = mysqli_query($con,"UPDATE mail SET sender='$sender',host='$host',username='$username',password='$password' ");     
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