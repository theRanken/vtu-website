<?php
	require_once '../core/conn.php';
	header('Content-type: application/json; charset=UTF-8');
	require_once '../core/api.php';
	$response = array();
		if (isset($_POST['id']) && ($_POST['name']) && ($_POST['username']) && ($_POST['email']) && ($_POST['phone']) && ($_POST['password']) && ($_POST['status'])) {
		    $id=$_POST['id'];
		    $name=$_POST['name'];
		    $username=$_POST['username'];
	        $email=$_POST['email'];
	        $phone=$_POST['phone'];
	        $password=$_POST['password'];
	        $status=$_POST['status'];
	         date_default_timezone_set('Africa/Lagos');
    $date = date("d/m/Y h:i");
    $type="SMART";
    $res = mysqli_query($con, "SELECT * FROM user WHERE username='$username'");
    $result = mysqli_query($con, "SELECT * FROM user WHERE phone='$phone'");
    $result2 = mysqli_query($con, "SELECT * FROM user WHERE email='$email'");
     $hash=substr(sha1(md5($password)), 3, 10);
      $apikey = substr(str_shuffle("0123456789ABCDEFGHIJklmnopqrstvwxyzAbAcAdAeAfAgAhBaBbBcBdC1C23C3C4C5C6C7C8C9xix2x3"), 0, 60);
    
    $ipaddress = $_SERVER['REMOTE_ADDR'];
    $qrysite = mysqli_query($con,"SELECT * FROM user WHERE id='$id' ");
$setup = mysqli_fetch_array($qrysite);
$ref=$setup['username'];
 if (empty($name)) {
             $response['title']  = 'opps';
		    $response['status']  = 'error';
			$response['message'] = 'The name must not be empty please check';
        } elseif (empty($username)){
              $response['title']  = 'opps';
		    $response['status']  = 'error';
			$response['message'] = 'Please check the username';
        } elseif (empty($phone)){
              $response['title']  = 'opps';
		    $response['status']  = 'error';
			$response['message'] = 'please check the phone number';
        } elseif (empty($status)) {
             $response['title']  = 'opps';
		    $response['status']  = 'error';
			$response['message'] = 'Please  verify the account';
        }else if (strlen($phone) < 11) { 
	    	  $response['title']  = 'opps';
		    $response['status']  = 'error';
			$response['message'] = 'you have entered incorrect phone number';
        } else if (strlen($name) < 5) { 
           $response['title']  = 'opps';
		    $response['status']  = 'error';
			$response['message'] = 'Please enter the full name of the person';
        } else if (mysqli_num_rows($result) == 1) {
		  $response['title']  = 'opps';
		    $response['status']  = 'error';
			$response['message'] = 'the phone number as already be taken';
        } else if (mysqli_num_rows($result2) == 1) {
              $response['title']  = 'opps';
		    $response['status']  = 'error';
			$response['message'] = 'the email  as already be taken';
        } else if (mysqli_num_rows($res) == 1) {
               $response['title']  = 'opps';
		    $response['status']  = 'error';
			$response['message'] = 'the username as already be taken';
        } else if (strlen($password) < 8) {
             $response['title']  = 'opps';
		    $response['status']  = 'error';
			$response['message'] = 'the password must be greater than 8 for security reasons';
        }else{
            $query = mysqli_query($con, "INSERT INTO user  (name,username,email,phone,ref,status,password,type,bal,refbal,date,kyc,apikey,ip) 
        VALUES ('$name','$username','$email','$phone','$ref','$status','$hash','$type','0.00','0.00','$date',0,'$apikey','$ipaddress')");
         if ($query) {
             require_once 'mail.php';
              @require "../Mail/phpmailer/PHPMailerAutoload.php";
                    require_once '../core/v.php';
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
                    $mail->setFrom("$sender", "welcome Email");
                    $mail->addAddress("$email");
                    $mail->isHTML(true);
                    $mail->Subject = "welcome Email";
                    $mail->Body = $temp;
                    if (!$mail->send()) {
                        
                        ////<script>
                            ////alert("You have successfuly register to our website");
                            ////window.location.replace('../login');
                        ///</script>
                   
                    } else {
                  
                        //<script>
                           // alert( "you have successfully register to our website");
                            //window.location.replace('../login');
                        //</script>
                        
                        }
             $response['title']  = 'success';
		     $response['status']  = '500';
			 $response['message'] = 'sucessful';        
        }else{ 
             $response['title']  = 'opps';
		    $response['status']  = 'error';
			$response['message'] = 'something went while registering new user try agin or contact Adex developer';
           
        }
        }
		}else{
    $response['title']  = 'opps';
	$response['status']  = 'error';
  $response['message'] = 'somethimg occur please try again';
}
echo json_encode($response);