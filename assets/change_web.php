<?php
	require_once '../core/conn.php';
	header('Content-type: application/json; charset=UTF-8');
	$response = array();
	if (isset($_POST['name'])) {
	    
	    $name=$_POST['name'];
	    $image=$_POST['image'];
	    $phone=$_POST['phone'];
	    $email=$_POST['email'];
	    $address=$_POST['address'];
	    $facebook=$_POST['facebook'];
	    $instergram=$_POST['instergram'];
	    $wame=$_POST['wame'];
	    $youtube=$_POST['youtube'];
	    $footer=$_POST['footer'];
	    $wame_group=$_POST['wame_group'];
	    $color=$_POST['color'];
	    
	    if($phone < 11){
	       
	         $response['title']  = 'opps';
		    $response['status']  = 'error';
			$response['message'] = 'Your phone number must be 11 digit';
	        
	    }elseif($footer < 14){
	         $response['title']  = 'opps';
		    $response['status']  = 'error';
			$response['message'] = 'please include your country code with the phone number e.g +2347013397088';
	    }else{
	        
	   $updat = mysqli_query($con,"UPDATE general SET name='$name', image='$image', phone='$phone', email='$email', address='$address', facebook='$facebook', instergram='$instergram', whatlink='$wame', youtube='$youtube', footer='$footer', whatgroup='$wame_group', color='$color'");
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
			$response['message'] = 'something went wrong please try again later';
	    
	}
	echo json_encode($response);
 