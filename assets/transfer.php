<?php
	require_once '../core/conn.php';
	header('Content-type: application/json; charset=UTF-8');
	
	$response = array();
	
	if (isset($_POST['id']) && ($_POST['amount']) && ($_POST['username'])) {
		require_once '../core/conn.php';
		$pid = $_POST['id'];
		$amount = $_POST['amount'];
		$username = $_POST['username'];
		  $transid=rand(100000000,999999999);
         date_default_timezone_set('Africa/Lagos');
   $date=date("l j<\s\up>S</\s\up>, F Y @ g:iA");
		$res=mysqli_query($con,"SELECT * FROM user WHERE username='$username'");
		$chek = mysqli_query($con,"SELECT * FROM user WHERE username='$username' ");
      $frnd = mysqli_fetch_assoc($chek);
    $bal=$frnd['bal'];
	$email=$frnd['email'];	
        $cheks = mysqli_query($con,"SELECT * FROM user WHERE id='$pid'");
      $pdata = mysqli_fetch_array($cheks);
    $mybal=$pdata['bal'];
    $myusername=$pdata['username'];
    $chek = mysqli_query($con,"SELECT * FROM pay");
      $admin = mysqli_fetch_array($chek);
    $min=$admin['min'];
    $total = $mybal - $amount;
    	       $res=mysqli_query($con,"SELECT * FROM user WHERE username='$username'");
             if(mysqli_num_rows($res)==0) {   
            $response['title']  = 'Unknown account';
		    $response['status']  = 'warning';
			$response['message'] = 'this account does not exist';
            
            }elseif ($myusername == $username){
		     $response['title']  = 'Sorry';
		    $response['status']  = 'warning';
			$response['message'] = 'You can transfer to your self';
            	}elseif($amount > $mybal){
            	   $response['title']  = 'Insufficent Account';
		    $response['status']  = 'warning';
			$response['message'] = 'you have low balance, please fund your wallet and try again';
            	}elseif($min > $total){
            	     $response['title']  = 'Note';
		    $response['status']  = 'warning';
			$response['message'] = 'You can not transfer all the money in your account';
            	}else{
            	    $fund = $amount + $bal;
            	     $add = mysqli_query($con, "UPDATE user SET bal='$fund' WHERE username='$username'") or die(mysqli_error());
            	     $debit = mysqli_query($con, "UPDATE user SET bal='$total' WHERE id='$pid'") or die(mysqli_error());
            	     
            	 $query = mysqli_query($con, "INSERT INTO transfer (username,amount,newbal,oldbal,transid,name,status,date) VALUES('$myusername','$amount','$total','$mybal','$transid','$email','1','$date') ");
            	     if ($debit){
		  	 $response['title']  = 'successfuly';  
			$response['status']  = 'success';
			$response['message'] = 'You have successfully credit '.$username.', '.$amount.' Naria';
			require_once 'transferemail.php';
    	    } else {
		    $response['title'] = 'Faild';
			$response['status'] = 'warning';
			$response['message'] = 'something occur please try again later';
    	    	}
            	}
            
            		echo json_encode($response);
            	}