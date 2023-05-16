<?php
	require_once '../core/conn.php';
	header('Content-type: application/json; charset=UTF-8');
	$response = array();
	if (isset($_POST['mtn_smart'])) {
	    $mtn_smart = $_POST['mtn_smart'];
	    $mtn_reseller= $_POST['mtn_reseller'];
	    $mtn_topup = $_POST['mtn_topup'];
	    $airtel_smart = $_POST['airtel_smart'];
	    $airtel_reseller = $_POST['airtel_reseller'];
	    $airtel_topup = $_POST['airtel_topup'];
	    $glo_smart = $_POST['glo_smart'];
	    $glo_reseller = $_POST['glo_reseller'];
	    $glo_topup = $_POST['glo_topup'];
	    $mobile_smart = $_POST['mobile_smart'];
	    $mobile_reseller = $_POST['mobile_reseller'];
	    $mobile_topup = $_POST['mobile_topup'];
	    
	    if(empty($mtn_smart)){
	         $response['title']  = 'opps';
		    $response['status']  = 'error';
			$response['message'] = 'Mtn smart user dicount  must not be empty';
	    }else if(empty($mtn_reseller)){
	         $response['title']  = 'opps';
		    $response['status']  = 'error';
			$response['message'] = 'Mtn Affilate user dicount must not be empty';
	    }else if(empty($mtn_topup)){
	         $response['title']  = 'opps';
		    $response['status']  = 'error';
			$response['message'] = 'Mtn Topup user dicount must not be empty';
	    }else if(empty($airtel_smart)){
	         $response['title']  = 'opps';
		    $response['status']  = 'error';
			$response['message'] = 'Airtel smart user dicount must not be empty';
	    }else if(empty($airtel_reseller)){
	         $response['title']  = 'opps';
		    $response['status']  = 'error';
			$response['message'] = 'Airtel Affilate user dicount must not be empty';
	    }else if(empty($airtel_topup)){
	         $response['title']  = 'opps';
		    $response['status']  = 'error';
			$response['message'] = 'Airtel Topup user dicount must not be empty';
	    }else if(empty($glo_smart)){
	         $response['title']  = 'opps';
		    $response['status']  = 'error';
			$response['message'] = 'Glo smart user dicount must not be empty';
	    }else if(empty($glo_reseller)){
	         $response['title']  = 'opps';
		    $response['status']  = 'error';
			$response['message'] = 'Glo Affilate user dicount must not be empty';
	    } else if(empty($glo_topup)){
	         $response['title']  = 'opps';
		    $response['status']  = 'error';
			$response['message'] = 'Glo Topup user dicount must not be empty';
	    }else  if(empty($mobile_smart)){
	         $response['title']  = 'opps';
		    $response['status']  = 'error';
			$response['message'] = '(mobile smart user dicount must not be empty';
	    }else  if(empty($mobile_reseller)){
	         $response['title']  = 'opps';
		    $response['status']  = 'error';
			$response['message'] = '9mobile Affilate user dicount must not be empty';
	    }else  if(empty($mobile_topup)){
	         $response['title']  = 'opps';
		    $response['status']  = 'error';
			$response['message'] = '9mobile Topup user dicount must not be empty';
	    }else{
	        
	    $updat = mysqli_query($con,"UPDATE airtimeprice SET afpricemtn='$mtn_reseller', afpriceglo='$glo_reseller', afpriceair='$airtel_reseller', afpriceet='$mobile_reseller', toppricemtn='$mtn_topup', toppriceglo='$glo_topup', toppriceair='$airtel_topup', toppriceet='$mobile_topup', smartpricemtn='$mtn_smart', smartpriceglo='$glo_smart',smartpriceair='$airtel_smart',smartpriceet='$mobile_smart'");     
	        
	        if($updat){
	   
	       $response['title']  = 'success';
		    $response['status']  = '500';
			$response['message'] = 'success'; 
	    }else{
                $response['title']  = 'opps';
	     	    $response['status']  = 'error';
		     	$response['message'] = 'Un able to update airtime discount';
	    }
	    }
	     echo json_encode($response);
	}
 