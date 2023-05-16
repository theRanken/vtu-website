<?php
	require_once '../core/conn.php';
	header('Content-type: application/json; charset=UTF-8');
	$response = array();
	if (isset($_POST['username'])) {
    $code = $_POST['username'];
    //send mail configuration
    $users = mysqli_query($con, "SELECT * FROM mail");
  $mail = mysqli_fetch_array($users);
$musername=$mail['username'];
$mpassword=$mail['password'];
$host=$mail['host'];
$sender=$mail['sender'];
//done 
 date_default_timezone_set('Africa/Lagos');
   $date=date("l j<\s\up>S</\s\up>, F Y @ g:iA");
     $query = "SELECT * FROM bankpayment WHERE id='$code'";
              $result = mysqli_query($con, $query);
              $main = mysqli_fetch_array($result);
             $name= $main['username'];
              $amount= $main['amount'];
    $user = "SELECT * FROM user WHERE username='$name' ";
              $adex = mysqli_query($con, $user);
              $search=  mysqli_fetch_array($adex);
            $bal=$search['bal'];
            $email=$search['email'];
              if(empty($code)){
             $response['title']  = 'opps';
		    $response['status']  = 'error';
			$response['message'] = 'something went wromg contact adex developer';
    }elseif (mysqli_num_rows($result) == 0) {
               $response['title']  = 'opps';
		    $response['status']  = 'error';
			$response['message'] = 'something went wrong contact adex developer';
    }elseif (mysqli_num_rows($adex) == 0) {
               $response['title']  = 'opps';
		    $response['status']  = 'error';
			$response['message'] = 'something went wrong contact adex developer';
               }else{
                   $fund= $bal + $amount;
            $update = mysqli_query($con, "UPDATE  user SET bal='$fund' WHERE username='$name'");
            $updat = mysqli_query($con, "UPDATE  bankpayment SET status='1' WHERE id='$code' ");
            if($updat){
                
            @require "../Mail/phpmailer/PHPMailerAutoload.php";
         require_once "../core/credit.php";
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
            $mail->Subject = "Bank Payment";
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
            
        
            $response['username']  ="$name";
		    $response['status']  = '500';
			$response['amount'] ="$amount";
            }else{
           $response['title']  = 'opps';
		    $response['status']  = 'error';
			$response['message'] = 'something went wrong please try again later';
            }
         }
	}else{
	    $response['title']  = 'opps';
	  $response['status']  = 'error';
	 $response['message'] = 'something went wrong contact adex developer';
	}
 echo json_encode($response);