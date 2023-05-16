<?php
	require_once '../core/conn.php';
	header('Content-type: application/json; charset=UTF-8');
	
	$response = array();
	
	if (isset($_POST['data'])) {
		require_once '../core/conn.php';
		$pid = $_POST['data'];
		$sql = mysqli_query($con, "SELECT * FROM user WHERE id ='$pid'");
            if 
            (mysqli_num_rows($sql) > 0){
              $row = mysqli_fetch_assoc($sql);
            }
            $update_adex = mysqli_query($con, "SELECT * FROM upgrade_user");
  $upgrade_user = mysqli_fetch_array($update_adex);
            $bal=$row['bal'];
            $type=$row['type'];
             $name=$row['username'];
            $upgrade=$upgrade_user['topup'];
            $check= $bal - $upgrade;
		 $account="TOPUP";
		if ($upgrade > $bal) {
		     $response['title']  = 'insufficient account';
		    $response['status']  = 'warning';
			$response['message'] = 'you did not have enough fund please fund your wallet and try again';
		}elseif($type == $account){
		      $response['title']  = 'faild';
		   $response['status']  = 'warning';
			$response['message'] = 'This account is Topup package already'; 
		}else{
		  $update = mysqli_query($con, "UPDATE user SET type='$account',bal='$check' WHERE id='$pid'") or die(mysqli_error());
		  	if ($update) {
		  	  $response['title']  = 'successfuly';  
			$response['status']  = 'success';
			$response['message'] = ''.$name.', Your account has been Upgraded Sucessfuly' ;
		} else {
		    $response['title'] = 'Faild';
			$response['status']  = 'warning';
			$response['message'] = 'there is an error trying to ugrade the account contact our live support immediately';
		}
		
		}
		echo json_encode($response);
	
	} 