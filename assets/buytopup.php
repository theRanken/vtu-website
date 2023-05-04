 <?php
	require_once '../core/conn.php';
	header('Content-type: application/json; charset=UTF-8');
	$response = array();
	if (isset($_POST['id']) && ($_POST['price'])) {
		$pid = $_POST['id'];
		$price = $_POST['price'];
		$amount = $_POST['amount'];
		$network = $_POST['network'];
		$networkid = $_POST['networkid'];
		$type = $_POST['type'];
		$mobile= $_POST['mobile'];
		$ported_number =$_POST['ported_number'];
		$name="true";
$sql = mysqli_query($con, "SELECT * FROM user WHERE id ='$pid'");
		 if (mysqli_num_rows($sql) > 0){
            $row = mysqli_fetch_assoc($sql);
            }
             $bal=$row['bal'];
             $username=$row['username'];
             $email=$row['email'];
		 $total=$bal -$price;  
   $service="Airtime TopUp";
   $transid=rand(100000000,999999999);
   date_default_timezone_set('Africa/Lagos');
   $date=date("l j<\s\up>S</\s\up>, F Y @ g:iA");
    $chek = mysqli_query($con, "SELECT * FROM pay");
  $airtime = mysqli_fetch_array($chek);
   $status="0";
   $confirm=$airtime['airtime'];
   include '../core/api.php';
    require 'mail.php';
        if (empty($network)) {
             $response['title']  = 'opps';
		    $response['status']  = 'error';
			$response['message'] = 'Please select Network Type';
        } elseif (empty($networkid)) {
              $response['title']  = 'opps';
		    $response['status']  = 'error';
			$response['message'] = 'something occur contact the admin';
        } elseif (empty($price)) {
              $response['title']  = 'opps';
		    $response['status']  = 'error';
			$response['message'] = 'Please enter your amount';
        } elseif (empty($type)) {
             $response['title']  = 'opps';
		    $response['status']  = 'error';
			$response['message'] = 'Please select Airtime Type';
        } elseif  ($price > $bal) {
              $response['title']  = 'oops';
		    $response['status']  = 'error';
			$response['message'] = "Please fund your wallet you have insufficient acccount";
        } elseif  ($confirm > $amount) {
              $response['title']  = 'oops';
		    $response['status']  = 'error';
			$response['message'] = 'The minimum airtime you can purchase is '.$confirm.' Naria';
        }elseif($ported_number == 'false'){
            $validate = substr($mobile, 0, 4);
            if($network=="MTN"){
if(strpos(" 0702 0703 0713 0704 0706 0716 0802 0803 0806 0810 0813 0814 0816 0903 0913 0906 0916 0804 ", $validate) == FALSE || strlen($mobile) != 11){
         $response['title']  = 'oops';
		    $response['status']  = 'error';
			$response['message'] = 'This is not an '.$network.' number '.$mobile.'';
}
}
else if($network=="GLO"){
if(strpos(" 0805 0705 0905 0807 0907 0707 0817 0917 0717 0715 0815 0915 0811 0711 0911 ", $validate) == FALSE || strlen($mobile) != 11){

 $response['title']  = 'oops';
		    $response['status']  = 'error';
			$response['message'] = 'This is not an '.$network.' number '.$mobile.'';
}
}
else if($network=="AIRTEL"){
if(strpos(" 0904 0802 0902 0702 0808 0908 0708 0918 0818 0718 0812 0912 0712 0801 0701 0901 0907 0917 ", $validate) == FALSE || strlen($mobile) != 11){

 $response['title']  = 'oops';
		    $response['status']  = 'error';
			$response['message'] = 'This is not an '.$network.' number '.$mobile.'';
}
}
else if($network=="9MOBILE"){
if(strpos(" 0809 0909 0709 0819 0919 0719 0817 0917 0717 0718 0918 0818 0808 0708 0908 ", $validate) == FALSE || strlen($mobile) != 11){

       $response['title']  = 'oops';
		    $response['status']  = 'error';
			$response['message'] = 'This is not an '.$network.' number '.$mobile.'';
}
}
        } elseif ($min > $total) {
             $response['title']  = 'oops';
		    $response['status']  = 'error';
			$response['message'] = 'you are not allowed to withdraw all the money in your account. The minimum money that must be in your account is'.$min.'';
        }elseif (strlen($mobile) != 11){
            $response['title']  = 'oops';
		    $response['status']  = 'error';
			$response['message'] = 'This is not an '.$network.' number  '.$mobile.'';
        } elseif($name=="true")
        
        {
        
$curl = curl_init();
curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://smeplug.ng/api/v1/airtime/purchase',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS =>'{
	"network_id": "'.$networkid.'",
	"phone": "'.$mobile.'",
	"amount": "'.$amount.'"
}',
  CURLOPT_HTTPHEADER => array(
    'Content-Type: application/json',
    "Authorization: Bearer $secretekey"
  ),
));
$dataapi = curl_exec($curl);
$result=json_decode($dataapi);
curl_close($curl);
if($result->status=='true'){
     $total=$bal -$price;
    $statu="1";
    $query = mysqli_query($con, "INSERT INTO transactions (username,transid,network,service,type,amount,mobile,plans,status,date,oldbal,newbal) VALUES('$username','$transid','$network','$service','$type','$price','$mobile','you purchase $network for $mobile','$statu','$date','$bal','$total') ");
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
            $mail->Subject = "AIRTIME Transaction";
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
    
    $query = mysqli_query($con, "INSERT INTO transactions (username,transid,network,service,type,amount,mobile,plans,status,date,oldbal,newbal) VALUES('$username','$transid','$network','$service','$type','$price','$mobile','$plan','$status','$date','$bal','$bal') ");
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
            $mail->Subject = "Fail AIRTIME Transaction";
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
	$response['message'] = "$network Network Not Avialabe Please try agian Later";
}
}
}else{
    $response['title']  = 'oops';
		    $response['status']  = 'error';
			$response['message'] = 'something occour please contact the admin';
}
echo json_encode($response);