<?php
	require_once '../core/conn.php';
	header('Content-type: application/json; charset=UTF-8');
	$response = array();
	if (isset($_POST['username'])) {
 
    $username = $_POST['username'];
    
     $query = "SELECT * FROM loan WHERE id='$username'";
              $result = mysqli_query($con, $query);
              $nu = 1;
              $adex=mysqli_fetch_assoc($result);
            $user =$adex['username'];
            $amount =$adex['amount'];
            $email=$adex['email'];
             $adex_dev = "SELECT * FROM user WHERE username='$user'";
              $account = mysqli_query($con, $adex_dev);
    if(empty($username)){
         $response['title']  = 'opps';
		    $response['status']  = 'error';
			$response['message'] = 'something went wromg contact adex developer';
    }elseif (mysqli_num_rows($result) == 0) {
               $response['title']  = 'opps';
		    $response['status']  = 'error';
			$response['message'] = 'something went wrong contact adex developer';
    }elseif(mysqli_num_rows($account) == 0) {
               $response['title']  = 'opps';
		    $response['status']  = 'error';
			$response['message'] = "This user does not exit in the database";
			
    }else{
        $user_bal=mysqli_fetch_assoc($account);
        $bal=$user_bal['bal'];
        $credit=$bal+$amount;
        $updat = mysqli_query($con,"UPDATE user SET bal='$credit'  WHERE username='$user'  ");
            $update = mysqli_query($con,"UPDATE loan SET status='1'  WHERE id='$username'  ");
            if($updat){
                require_once 'creditloan.php';
            $response['username']  =$user;
		    $response['status']  = '500';
			$response['amount'] = $amount;
            }else{
           $response['title']  = 'opps';
		    $response['status']  = 'error';
			$response['message'] = "try again later sir";
            }
         }
	}else{
	    $response['title']  = 'opps';
	  $response['status']  = 'error';
	 $response['message'] = 'something went wrong contact adex developer';
	}
 echo json_encode($response);