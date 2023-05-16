<?php
	require_once '../core/conn.php';
	header('Content-type: application/json; charset=UTF-8');
	$response = array();
	if (isset($_POST['mtn_gifting'])) {
	    $mtn_gifting = $_POST['mtn_gifting'];
	    $mtn_sme= $_POST['mtn_sme'];
	    $airtel_data = $_POST['airtel_data'];
	    $glo_data = $_POST['glo_data'];
	    $mobile_data = $_POST['mobile_data'];
	    
	     if(empty($mtn_gifting)){
	         $response['title']  = 'opps';
		    $response['status']  = 'error';
			$response['message'] = 'please select mtn gifting';
	    }else if(empty($mtn_sme)){
	         $response['title']  = 'opps';
		    $response['status']  = 'error';
			$response['message'] = 'please select mtn sme';
	    }else if(empty($glo_data)){
	         $response['title']  = 'opps';
		    $response['status']  = 'error';
			$response['message'] = 'please select glo data';
	    }else if(empty($mobile_data)){
	         $response['title']  = 'opps';
		    $response['status']  = 'error';
			$response['message'] = 'please select 9mobile data';
	    }else if(empty($airtel_data)){
	         $response['title']  = 'opps';
		    $response['status']  = 'error';
			$response['message'] = 'please select airtel data';
  }else{
	        
	    $updat = mysqli_query($con,"UPDATE data_lock SET mtn_gifting='$mtn_gifting',mtn_sme='$mtn_sme',glo_data='$glo_data',9mobile_data='$mobile_data',airtel_data='$airtel_data'");     
	        
	        if($updat){
	   
	       $response['title']  = 'success';
		    $response['status']  = 'success';
			$response['message'] = 'you have sucessfully upated the data service'; 
	    }else{
                $response['title']  = 'opps';
	     	    $response['status']  = 'error';
		     	$response['message'] = 'unable to update the data service';
	    }
	    }
	    
	}else{
	        $response['title']  = 'opps';
	     	    $response['status']  = 'error';
		     	$response['message'] = 'please fill all the box do not leave anyone empty';
	}
  echo json_encode($response);