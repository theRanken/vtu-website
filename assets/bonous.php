<?php
	require_once '../core/conn.php';
	header('Content-type: application/json; charset=UTF-8');
	
	$response = array();
	
	if (isset($_POST['id'])) {
	    	require_once '../core/conn.php';
		
		$pid = $_POST['id'];
		$amount = $_POST['amount'];
		$sql = mysqli_query($con, "SELECT * FROM user WHERE id ='$pid'");
		if 
            (mysqli_num_rows($sql) > 0){
              $row = mysqli_fetch_assoc($sql);
            }
            $bal=$row['bal'];
             $name=$row['username'];
             $sender=$mail['sender'];
             $refbal=$row['refbal'];
            
     $chek = mysqli_query($con,"SELECT * FROM pay");
      $pdata = mysqli_fetch_array($chek);
    $min=$pdata['refbal'];
           
    	if ($min > $refbal) {
		     $response['title']  = 'insufficient account';
		    $response['status']  = 'warning';
			$response['message'] = 'Your Referal Wallet is below minimum referal amount';
    	}elseif($amount > $refbal){
    	     $response['title']  = 'insufficient account';
		    $response['status']  = 'warning';
			$response['message'] = 'You do not have up to that in your referal wallet';
    	}else{
    	     $total= $refbal - $amount;
             $cool = $bal + $amount;
    	    $update = mysqli_query($con, "UPDATE user SET refbal='$total',bal='$cool' WHERE id='$pid'") or die(mysqli_error());
    	    if ($update){
		  	 $response['title']  = 'successfuly';  
			$response['status']  = 'success';
			$response['message'] = 'Your main account has been credited successfully';
    	    } else {
		    $response['title'] = 'Faild';
			$response['status'] = 'warning';
			$response['message'] = 'there is an error trying to ugrade the account contact our live support immediately';
    	    	}
    	 
		}
		echo json_encode($response);
	
	} 
	