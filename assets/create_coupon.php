<?php
	require_once '../core/conn.php';
	header('Content-type: application/json; charset=UTF-8');
	$response = array();
	if (isset($_POST['username']) && ($_POST['amount']) && ($_POST['status']) && ($_POST['code'])) {
 
    $username = $_POST['username'];
    $amount =$_POST['amount'];
    $work = $_POST['status'];
    $code = $_POST['code'];
    
     $res = mysqli_query($con, "SELECT * FROM coupon WHERE code='$code'");;
     date_default_timezone_set('Africa/Lagos');
    $date = date("l j<\s\up>S</\s\up>, F Y @ g:iA");
    if($work == 'yes'){
        $status="1";
    }else{
        $status="0"; 
    }
    
  if (mysqli_num_rows($res) == 1) {
         $response['title']  = 'opps';
		  $response['status']  = 'error';
		$response['message'] = 'sorry this coupon code has been used '.$code.' try using different one';
    }elseif(empty($code)){
         $response['title']  = 'opps';
		  $response['status']  = 'error';
		$response['message'] = 'sorry the coupon code cannot be empty';
    } else {
      $query1 =  mysqli_query($con,"INSERT INTO coupon (code,amount,status,username,date)
    VALUES ('$code','$amount','$status','$username','$date')");
    if($query1){
          $response['title']  = 'success';
		    $response['status']  = 'success';
			$response['message'] = 'you have successfully create a coupon code for '.$username.' which worth N'.$amount.' ';
    }else{
        $response['title']  = 'opps';
		  $response['status']  = 'error';
		$response['message'] = 'sorry, something went wrong while creating the coupon code';
    }
    }
    }else{
        $response['title']  = 'opps';
		  $response['status']  = 'error';
		$response['message'] = 'something went wrong contact adex developer';
    }
     echo json_encode($response);
