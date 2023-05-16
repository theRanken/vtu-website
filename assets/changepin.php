<?php
	require_once '../core/conn.php';
	header('Content-type: application/json; charset=UTF-8');
	
	$response = array();
		if (isset($_POST['id']) && ($_POST['pin1']) && ($_POST['pin2'])  && ($_POST['oldpin'])){
	    	require_once '../core/conn.php';
	    	$pin1=$_POST['pin1'];
	    	$pin2=$_POST['pin2'];
	    	$oldpin=$_POST['oldpin'];
	    	$id=$_POST['id'];
	     $query1 = "SELECT * FROM user WHERE pin='$oldpin' OR password='$oldpin' ";
        $result1 = mysqli_query($con, $query1);
         if ($pin1 !== $pin2) {
             $response['title']  = 'opps';
		    $response['status']  = 'error';
			$response['message'] = 'Please check your pins they did not match';
         }else{
     if (mysqli_num_rows($result1) == 1) {
         
    $updat = mysqli_query($con, "UPDATE user SET pin='$pin1' WHERE id='$id'");
           $response['title']  = 'success';
		    $response['status']  = 'success';
			$response['message'] = 'you have successfully change your transaction pin';
         }else{
            $response['title']  = 'opps';
		    $response['status']  = 'error';
			$response['message'] = 'you have enter incorrect oldpin or password';  
         }
         }
		echo json_encode($response);
	    	 }