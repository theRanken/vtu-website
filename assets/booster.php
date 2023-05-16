<?php
	require_once '../core/conn.php';
	header('Content-type: application/json; charset=UTF-8');
	
	$response = array();
		if (isset($_POST['id'])) {
	    	require_once '../core/conn.php';
		
		$pid = $_POST['id'];
		  $response['title']  = 'Working';
		    $response['status']  = 'warning';
			$response['message'] = 'we are still working on it please check back later';
				echo json_encode($response);
		}