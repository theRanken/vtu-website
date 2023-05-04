<?php
	require_once '../core/conn.php';
	header('Content-type: application/json; charset=UTF-8');
	require_once '../core/api.php';
	$response = array();
	if (isset($_POST['name'])){
	    $name=$_POST['name'];
	    $price =$_POST['price'];
	    $plan_id=$_POST['plan_id'];
	    $cable=$_POST['cable'];
	    $res = mysqli_query($con, "SELECT * FROM add_cable WHERE planid='$plan_id'");
	    if(empty($name)){
	        $response['title']  = 'opps';
		    $response['status']  = 'error';
			$response['message'] = 'The name must not be empty please check';
	    }else if(!is_numeric($price)){
	        $response['title']  = 'opps';
		    $response['status']  = 'error';
			$response['message'] = 'The  price must be number';
	    }else if(!is_numeric($plan_id)){
	        $response['title']  = 'opps';
		    $response['status']  = 'error';
			$response['message'] = 'The planid must be number';
	    } else if (mysqli_num_rows($res) == 1) {
               $response['title']  = 'opps';
		    $response['status']  = 'error';
			$response['message'] = 'The Data plan Id exist before in the database =>'.$plan_id.'';
	    }else{
	        $query = mysqli_query($con, "INSERT INTO add_cable (name,planid,price,cable) 
        VALUES ('$name','$plan_id','$price','$cable')");
        
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
	    echo json_encode($response);
	}