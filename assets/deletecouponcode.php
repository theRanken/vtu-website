<?php
	require_once '../core/conn.php';
	header('Content-type: application/json; charset=UTF-8');
	$response = array();
	if (isset($_POST['code'])) {
 
    $code = $_POST['code'];
    
     $query = "SELECT * FROM coupon WHERE code='$code'";
              $result = mysqli_query($con, $query);
              $nu = 1;
              if(empty($code)){
             $response['title']  = 'opps';
		    $response['status']  = 'error';
			$response['message'] = 'something went wromg contact adex developer';
    }elseif (mysqli_num_rows($result) == 0) {
               $response['title']  = 'opps';
		    $response['status']  = 'error';
			$response['message'] = 'something went wrong contact adex developer';
               }else{
            $updat = mysqli_query($con, "DELETE FROM coupon WHERE code=$code");
            if($updat){
                $response['title']  = 'success';
		    $response['status']  = '500';
			$response['message'] = 'success';
            }else{
           $response['title']  = 'opps';
		    $response['status']  = 'error';
			$response['message'] = 'something went wrong please try again later';
            }
         }
	}else{
	    $response['title']  = 'opps';
	  $response['status']  = 'error';
	 $response['message'] = 'something went wrong contact adex developer';
	}
 echo json_encode($response);