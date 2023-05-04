<?php
	require_once '../core/conn.php';
	header('Content-type: application/json; charset=UTF-8');
	
	$response = array();
		if (isset($_POST['id']) && ($_POST['pin1']) && ($_POST['pin2'])) {
	    	require_once '../core/conn.php';
	    	$pin1=$_POST['pin1'];
	    	$pin2=$_POST['pin2'];
	    	$id=$_POST['id'];
	    	$sql = mysqli_query($con, "SELECT * FROM user WHERE id ='$id'");
		if 
            (mysqli_num_rows($sql) > 0){
              $row = mysqli_fetch_assoc($sql);
            }
             $username=$row['username'];
	    	 if ($pin1 !== $pin2) {
             $response['title']  = 'opps';
		    $response['status']  = 'error';
			$response['message'] = 'Please check your pins they did not match';
	    	 }else{
	    	     $insert=mysqli_query($con, "UPDATE user SET pin='$pin1' WHERE id='$id' ");
	    	    if ($insert) {
		  	   $response['title']  = 'successful';  
			$response['status']  = 'success';
			$response['message'] = 'You have succesfully create a transaction pin';
	    	    } else {
		    $response['title'] = 'Faild';
			$response['status']  = 'error';
			$response['message'] = 'There is a problem while inserting your pin pls contact the admin for help';
    	    	}
    	  
		}
		echo json_encode($response);
	    	 }