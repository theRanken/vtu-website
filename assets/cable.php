<?php
	require_once '../core/conn.php';
	header('Content-type: application/json; charset=UTF-8');
	require_once '../core/api.php';
	$response = array();
	
	if (isset($_POST['id']) && ($_POST['cableid']) && ($_POST['number']) && ($_POST['planid']) && ($_POST['cablename']) && ($_POST['plan'])) {
	     $pid = $_POST['id'];
		 $cableid = $_POST['cableid'];
		 $number = $_POST['number'];
		 $planid = $_POST['planid'];
		 $cableprice = $_POST['cableprice'];
		 $cablename = $_POST['cablename'];
		 $cablename = $_POST['plan'];
		 $aemail=$web['email'];
		$sql = mysqli_query($con, "SELECT * FROM user WHERE id ='$pid'");
		 if 
            (mysqli_num_rows($sql) > 0){
                             $row = mysqli_fetch_assoc($sql);
            }
    $qrysite = mysqli_query($con,"SELECT * FROM pay");
$setup = mysqli_fetch_array($qrysite);
$min=$setup['min'];
             $bal=$row['bal'];
             $username=$row['username'];
             $email=$row['email'];
    $total=$bal -$cableprice;  
   $service="Cable Subcription";
   $transid=rand(100000000,999999999);
   date_default_timezone_set('Africa/Lagos');
   $date=date("l j<\s\up>S</\s\up>, F Y @ g:iA");
   $status="0";
$sub = mysqli_query($con, "SELECT * FROM transactions WHERE network='$cablename' AND amount='$cableprice' AND type='cable' AND mobile='$number' AND status='$status' AND username='$username' AND service='$plan' ");
    require 'mail.php';
        if (empty($planid)) {
             $response['title']  = 'opps';
		    $response['status']  = 'error';
			$response['message'] = 'Please select cable type';
        } elseif (empty($price)){
              $response['title']  = 'opps';
		    $response['status']  = 'error';
			$response['message'] = 'Please select cable Plans';
        } elseif (empty($number)){
              $response['title']  = 'opps';
		    $response['status']  = 'error';
			$response['message'] = 'Phone Number cant be empty';
        } elseif  ($cableprice > $bal) {
              $response['title']  = 'oops';
		    $response['status']  = 'error';
			$response['message'] = 'Please fund your wallet you have insufficient acccount';
        } elseif ($min > $total) {
             $response['title']  = 'oops';
		    $response['status']  = 'error';
			$response['message'] = 'you are not allowed to withdraw all the money in your account. The minimum money that must be in your account is'.$min.'';
        } elseif (mysqli_num_rows($sub) == 1) {
             $response['title']  = 'oops';
		    $response['status']  = 'error';
			$response['message'] = 'You have already submitted a transaction request with these details previously. Please be patient as your transaction request is under review you be contacted very soon if approved';
        } else {
        $host = "https://surplusdata.com.ng/api/cable?apikey=$apikey&number=$number&cable=$cableid&transid=$transid&plan=$planid";

//Initialize cURL.
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $host);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
$data = curl_exec($ch);
$result = json_decode($data);

//Close the cURL handle.
curl_close($ch);

$success = $result->status;
curl_close($curl);
if($success == 'success'){
     $total=$bal -$price;
    $statu="1";
	$query = mysqli_query($con, "INSERT INTO transactions (username,transid,network,service,type,amount,mobile,plans,status,date) VALUES('$username','$transid','$cablename','$plan','cable','$cableprice','$number','$plan','$statu','$date') ");
$updat = mysqli_query($con,"UPDATE user SET bal='$total' WHERE email='$email'  ") or die(mysqli_error());
require_once 'mail.php';
@require "../Mail/phpmailer/PHPMailerAutoload.php";
         require_once "../core/invoice.php";
         $mail = new PHPMailer();
        $mail->CharSet = "UTF-8";
         $mail->IsSMTP();
         $mail->SMTPAuth = true;
            $mail->SMTPSecure = "ssl";
            $mail->Host = "$hosts";
            $mail->Port = 465;              
            $mail->Username = "$musername";
            $mail->Password = "$mpassword";
            $mail->IsHTML(true);
            $mail->setFrom("$sender");
            $mail->addAddress("$aemail");
            $mail->isHTML(true);
            $mail->Subject = "Data Transaction";
            $mail->Body = $temp;         
            if(!$mail->send()){
                                
                               if (!$mail->send()) {
                //I left this blank because i don't want anything to pop out on the ui again
                //echo "<script> alert('error sending email mysqli_error($mail)');</script>";
            } else {
                 //I left this blank because i don't want anything to pop out on the ui again
                 // echo "<script> alert('email was sent');</script>";
            };
            
        }
        $response['title']  = 'success';
		    $response['status']  = '500';
			$response['message'] = 'sucessful';
		 $response['id'] = $transid;
}else{
    
    $query = mysqli_query($con, "INSERT INTO transactions (username,transid,network,service,type,amount,mobile,plans,status,date) VALUES('$username','$transid','$cablename','$plan','cable','$cableprice','$number','$plan','$status','$date') ");
    require_once 'mail.php';
@require "../Mail/phpmailer/PHPMailerAutoload.php";
         require_once "../core/fail.php";
         $mail = new PHPMailer();
        $mail->CharSet = "UTF-8";
         $mail->IsSMTP();
         $mail->SMTPAuth = true;
            $mail->SMTPSecure = "ssl";
            $mail->Host = "$hosts";
            $mail->Port = 465;              
            $mail->Username = "$musername";
            $mail->Password = "$mpassword";
            $mail->IsHTML(true);
            $mail->setFrom("$sender");
            $mail->addAddress("$aemail");
            $mail->isHTML(true);
            $mail->Subject = "Data Transaction";
            $mail->Body = $temp;         
            if(!$mail->send()){
                                
                               if (!$mail->send()) {
                //I left this blank because i don't want anything to pop out on the ui again
                //echo "<script> alert('error sending email mysqli_error($mail)');</script>";
            } else {
                 //I left this blank because i don't want anything to pop out on the ui again
                 // echo "<script> alert('email was sent');</script>";
            };
            
        }
              $response['title']  = 'oops';
		    $response['status']  = 'error';
			$response['message'] = 'something occour please contact the admin';
}
}
}else{
  $response['title']  = 'oops';
  $response['status']  = 'error';
 $response['message'] = 'something occour please try again later';   
}
echo json_encode($response);