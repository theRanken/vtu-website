<?php
	require_once '../core/conn.php';
	header('Content-type: application/json; charset=UTF-8');
	
	$response = array();
	
	if (isset($_POST['id']) && ($_POST['amount'])) {
	    	require_once '../core/conn.php';
		
		$pid = $_POST['id'];
		$amount = $_POST['amount'];
		$sql = mysqli_query($con, "SELECT * FROM user WHERE id ='$pid'");
		if 
            (mysqli_num_rows($sql) > 0){
              $row = mysqli_fetch_assoc($sql);
            }
             $bal=$row['bal'];
             $username=$row['username'];
             $email=$row['email'];
             $type=$row['type'];
             $account="TOPUP";
             date_default_timezone_set('Africa/Lagos');
             $date=date("l j<\s\up>S</\s\up>, F Y @ g:iA");
             $owe="2";
             $sub = mysqli_query($con, "SELECT * FROM loan WHERE username='$username' AND status='$owe'");
              $pending = mysqli_query($con, "SELECT * FROM loan WHERE username='$username' AND status=0");
             if ($type !== $account) {
             $response['title']  = 'opps';
		    $response['status']  = 'warning';
			$response['message'] = 'This package if for only the TOPUP USERS message our admin for more details';
		}elseif (mysqli_num_rows($sub) == 1) {
		     $response['title']  = 'Hmmm';
		    $response['status']  = 'warning';
			$response['message'] = 'You have not paid the one you borrow please pay before you request for new loan';
		}elseif (mysqli_num_rows($pending) == 1) {
		     $response['title']  = 'Please Wait';
		    $response['status']  = 'warning';
			$response['message'] = 'You have send us a request before we are working on it or please send us a message';
		}else{
    	   $insert = mysqli_query($con, "INSERT INTO loan (username,email,date,amount,status) VALUES('$username','$email','$date','$amount',0) ");
    	    if ($insert) {
		  	   $response['title']  = 'successful';  
			$response['status']  = 'success';
			$response['message'] = 'Will shall give you a response within 45 mins';
			 require_once 'loanemail.php';
    	    } else {
		    $response['title'] = 'Faild';
			$response['status']  = 'error';
			$response['message'] = 'there is an error trying to ugrade the account contact our live support immediately';
    	    	}
    	  
		}
		echo json_encode($response);
	
	} 
		
			