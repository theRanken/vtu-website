<?php
	require_once '../core/conn.php';
	header('Content-type: application/json; charset=UTF-8');
	$response = array();
	if (isset($_POST['username'])) {
	    $username = $_POST['username'];
	    $my_sender =$_POST['sender'];
	    $des=$_POST['des'];
	    $long_des= $_POST['long_des'];
	     date_default_timezone_set('Africa/Lagos');
   $date=date("l j<\s\up>S</\s\up>, F Y @ g:iA");
       $status="0";
     $res = mysqli_query($con, "SELECT * FROM user WHERE username='$username'");
     
     
     $sql = mysqli_query($con, "SELECT * FROM user WHERE username ='$username'");
		 if (mysqli_num_rows($sql) > 0){
            $row = mysqli_fetch_assoc($sql);
            }
      $email=$row['email'];
   if (mysqli_num_rows($res) == 0) {
              $response['title']  = 'opps';
		    $response['status']  = 'error';
			$response['message'] = 'the username doesnot exist';
   }else{
       $query = mysqli_query($con, "INSERT INTO notif  (username,sender,des,long_des,status,date) 
        VALUES ('$username','$my_sender','$des','$long_des','$status','$date')");
        if($query){
			$sql = mysqli_query($con, "SELECT * FROM  mail");
            if 
            (mysqli_num_rows($sql) > 0){
              $mail = mysqli_fetch_assoc($sql);
            }
           	
			
		     require 'notif_sendmail.php';	
			
			$response['title']  = '500';
		    $response['status']  = '500';
			$response['message'] = '500';
			
        }else{
             $response['title']  = 'opps';
		    $response['status']  = 'error';
			$response['message'] = 'we re unable to send message to him';
        }
   }
       
   }else{
        $response['title']  = 'opps';
		    $response['status']  = 'error';
			$response['message'] = 'something went wrong contact adex developer';
   }
     echo json_encode($response);