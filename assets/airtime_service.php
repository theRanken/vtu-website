<?php
	require_once '../core/conn.php';
	header('Content-type: application/json; charset=UTF-8');
	$response = array();
	if (isset($_POST['mtn_vtu'])) {
	    $mtn_vtu= $_POST['mtn_vtu'];
	    $airtel_vtu = $_POST['airtel_vtu'];
	    $glo_vtu = $_POST['glo_vtu'];
	    $mobile_vtu = $_POST['mobile_vtu'];
	    
	     if(empty($mtn_vtu)){
	         $response['title']  = 'opps';
		    $response['status']  = 'error';
			$response['message'] = 'please select mtn airtime';
	    }else if(empty($glo_vtu)){
	         $response['title']  = 'opps';
		    $response['status']  = 'error';
			$response['message'] = 'please select glo airtime';
	    }else if(empty($mobile_vtu)){
	         $response['title']  = 'opps';
		    $response['status']  = 'error';
			$response['message'] = 'please select 9mobile airtime';
	    }else if(empty($airtel_vtu)){
	         $response['title']  = 'opps';
		    $response['status']  = 'error';
			$response['message'] = 'please select airtel airtime';
  }else{
	        
	    $updat = mysqli_query($con,"UPDATE airtime_lock SET mtn_vtu='$mtn_vtu',glo_vtu='$glo_vtu',9mobile_vtu='$mobile_vtu',airtel_vtu='$airtel_vtu'");     
	        
	        if($updat){
	   
	       $response['title']  = 'success';
		    $response['status']  = 'success';
			$response['message'] = 'you have sucessfully upated the Airtime service'; 
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