<?php
	require_once '../core/conn.php';
	header('Content-type: application/json; charset=UTF-8');
	
	$response = array();
	
	if (isset($_POST['username']) && ($_POST['accounttype'])) {
		$accounttype = $_POST['accounttype'];
		$username = $_POST['username'];
		$sql = mysqli_query($con, "SELECT * FROM user WHERE username ='$username'");
		if (mysqli_num_rows($sql) > 0){
              $row = mysqli_fetch_assoc($sql);
              $type=$row['type'];
              $realusername= $row['username'];
            }
            if($realusername !== $username){
            $response['title']  = 'incorrect username';
		    $response['status']  = 'warning';
			$response['message'] = 'This username does not exits';
            }elseif($accounttype === $type){
                $response['title']  = 'Notice';
		    $response['status']  = 'warning';
			$response['message'] = ''.$username.', is currently running on '.$accounttype.' ';
            }else{
                 $update = mysqli_query($con, "UPDATE user SET type='$accounttype' WHERE username='$username'") or die(mysqli_error());
    	    if ($update) {
		  	   $response['title']  = 'successful';  
			$response['status']  = 'success';
			$response['message'] = 'You have successfully upgrade '.$username.' account to '.$accounttype.' users';
    	    } else {
		    $response['title'] = 'Fail';
			$response['status']  = 'warning';
			$response['message'] = 'there is an error trying to ugrade the account contact our live support immediately';
    	    	}
            }
            	echo json_encode($response);
	
	} 
