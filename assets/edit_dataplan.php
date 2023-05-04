<?php
	require_once '../core/conn.php';
	header('Content-type: application/json; charset=UTF-8');
	$response = array();
	if (isset($_POST['name']) && ($_POST['reseller'])){
	    $name=$_POST['name'];
	    $reseller =$_POST['reseller'];
	    $topup=$_POST['topup'];
	    $smart=$_POST['smart'];
	    $network=$_POST['network'];
	    $type=$_POST['type'];
	    $plan_id=$_POST['plan_id'];
	    $api = $_POST['api'];
	    $day=$_POST['day'];
	     $customid=rand(1000,9999);
	   $tableid=$_POST['tableid'];
	    
	    $check_transid = mysqli_query($con, "SELECT * FROM plans WHERE customid='$customid'");
	    if(empty($name)){
	        $response['title']  = 'opps';
		    $response['status']  = 'error';
			$response['message'] = 'The name must not be empty please check';
	    }else if(!is_numeric($reseller)){
	        $response['title']  = 'opps';
		    $response['status']  = 'error';
			$response['message'] = 'The reseller user price must be number';
	    }else if(!is_numeric($smart)){
	        $response['title']  = 'opps';
		    $response['status']  = 'error';
			$response['message'] = 'The smart user price must be number';
	    }else if(!is_numeric($topup)){
	        $response['title']  = 'opps';
		    $response['status']  = 'error';
			$response['message'] = 'The topup user price must be number';
	    }else if(!is_numeric($plan_id)){
	        $response['title']  = 'opps';
		    $response['status']  = 'error';
			$response['message'] = 'The planid must be number';
	    }elseif(!is_numeric($api)){
	        $response['title']  = 'opps';
		    $response['status']  = 'error';
			$response['message'] = 'The api price must be number';
	    }else{
	        $query = mysqli_query($con, "UPDATE plans SET name='$name',network='$network',day='$day',top='$topup',api='$api',reseller='$reseller',planid='$plan_id',type='$type',price='$smart' WHERE id='$tableid'");
        
        if($query){
	        $response['title']  = 'opps';
		    $response['status']  = '500';
			$response['message'] = 'success';
	    }else{
	     $response['title']  = 'opps';
		    $response['status']  = 'error';
			$response['message'] = 'something went wrong bro';   
	    }
	    }
	}else{
	    $response['title']  = 'opps';
		    $response['status']  = 'error';
			$response['message'] = 'something went wrong bro'; 
	}
	 echo json_encode($response);