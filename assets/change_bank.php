<?php
	require_once '../core/conn.php';
	header('Content-type: application/json; charset=UTF-8');
	$response = array();
	if (isset($_POST['bankname']) && ($_POST['name']) && ($_POST['number'])) {
	    $bankname = $_POST['bankname'];
	    $name = $_POST['name'];
	    $number=$_POST['number'];
	    $bank=$_POST['bank'];
	    
	    if($bank == "on"){
	        $bank_set ="1";
	    }else{
	        $bank_set="0";
	    }
	    
	    if(empty($bankname)){
	         $response['tittle']='opps';
	        $response['status']='error';
	        $response['message']='fill all the form';
	    }else{
	        
	      $updat = mysqli_query($con,"UPDATE bank SET name='$name',number='$number',bankname='$bankname'"); 
	      $set= mysqli_query($con,"UPDATE setting SET bank='$bank_set'"); 
	        if($updat){
	   
	       $response['title']  = 'success';
		    $response['status']  = '500';
			$response['message'] = 'success'; 
	    }else{
                $response['title']  = 'opps';
	     	    $response['status']  = 'error';
		     	$response['message'] = 'unable to change bank detials';
	    }
	    }
	}else{
	        $response['title']  = 'opps';
	     	    $response['status']  = 'error';
		     	$response['message'] = 'please fill all the box do not leave anyone empty';
	}
  echo json_encode($response);