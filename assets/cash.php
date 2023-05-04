<?php
require_once '../core/conn.php';
header('Content-type: application/json; charset=UTF-8');
	$response = array();
		if (isset($_POST['username']) && ($_POST['amount'])  && ($_POST['network']) && ($_POST['phone'])) {
	    $username = $_POST['username'];
	    $amount = $_POST['amount'];
	    $network=$_POST['network'];
	    $phone=$_POST['phone'];
	    $fund=$_POST['fund'];
	    $email=$web['email'];
	        $chek = mysqli_query($con, "SELECT * FROM 2cash");
  $discount = mysqli_fetch_array($chek);
	 $user = mysqli_query($con, "SELECT * FROM mail");
  $mail = mysqli_fetch_array($user);
$musername=$mail['username'];
$mpassword=$mail['password'];
$host=$mail['host'];
$sender=$mail['sender'];
	    date_default_timezone_set('Africa/Lagos');
   $date=date("l j<\s\up>S</\s\up>, F Y @ g:iA");
	    if($fund == "true"){
	        $adex="FUND WALLET";
	    }else{
	        $adex="BANK TRANSFER";
	    }
	    
	    if($network == "MTN"){
	      $amount_pay= $amount * ($discount['mtn']/100); 
	    }elseif($network == "AIRTEL"){
	         $amount_pay= $amount * ($discount['airtel']/100);
	    }elseif($network == "GLO"){
	         $amount_pay= $amount * ($discount['glo']/100);
	    }else{
	         $amount_pay= $amount * ($discount['9mobile']/100);
	    }
	    if(!is_numeric($phone)){
	        $response['message']="This phone number is invalid $phone";
	    }elseif (strlen($phone) != 11){
	        $response['message']="incomplete phone number $phone";
	    }elseif(empty($username)){
	        $response['message']="Please reload the page";
	    }else{
	  $query = mysqli_query($con, "INSERT INTO airtime (username,amount,network,pay,type,status,mobile,date) VALUES('$username','$amount','$network','$amount_pay','$adex','0','$phone','$date') ");      
	    if($query){    
	@require "../Mail/phpmailer/PHPMailerAutoload.php";
         require_once "../core/airtime.php";
         $mail = new PHPMailer();
        $mail->CharSet = "UTF-8";
         $mail->IsSMTP();
         $mail->SMTPAuth = true;
            $mail->SMTPSecure = "ssl";
            $mail->Host = "$host";
            $mail->Port = 465;              
            $mail->Username = "$musername";
            $mail->Password = "$mpassword";
            $mail->IsHTML(true);
            $mail->setFrom("$sender");
            $mail->addAddress("$email");
            $mail->isHTML(true);
            $mail->Subject = "Airtime To Cash";
            $mail->Body = $temp;         
            if(!$mail->send()){
                //I left this blank because i don't want anything to pop out on the ui again
                //echo " <script>
                // alert('Transaction successful. Follow the steps sent to your gmail to complete transaction');
                 //  window.location.replace('cash.php');
            // </script>";
            } else {
                 //I left this blank because i don't want anything to pop out on the ui again
                 // echo "<script> alert('email was sent');</script>";
            } 
            
            	$response['status']='500';
	    }else{
	        $response['message']="we are unable to connect please try again later adex";
	    }
	    }
		}else{
		    $response['message']="Please Reload the page";
		}
	 echo json_encode($response);