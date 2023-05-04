<?php
require_once '../core/conn.php';
	header('Content-type: application/json; charset=UTF-8');
	require_once '../core/api.php';
	$response = array();
	
	if (isset($_POST['id']) ) {
	    
	    $id=$_POST['id'];
	    
	    $qrysite = mysqli_query($con,"SELECT * FROM user WHERE id='$id'");
    $setup = mysqli_fetch_array($qrysite);
    $email=$setup['email'];
	     $apikey = substr(str_shuffle("0123456789ABCDEFGHIJklmnopqrstvwxyzAbAcAdAeAfAgAhBaBbBcBdC1C23C3C4C5C6C7C8C9xix2x3"), 0, 60);

	 $update = mysqli_query($con,"UPDATE user SET apikey='$apikey' WHERE email ='$email' ");
	 if($update){
	     $response['status']='500';
	 }else{
	     $response['status']='error';
	 }
	}else{
	    $response['status']='error';
	}
	echo json_encode($response);