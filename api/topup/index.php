<?php
require_once '../../core/conn.php';
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header("Access-Control-Allow-Methods: POST");
header("Allow: GET, POST, OPTIONS, PUT, DELETE");
header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method, Access-Control-Allow-Origin");

$headers = apache_request_headers();
$response = array();
if (isset($headers['Authorization'])) {
$token = trim(str_replace("Token", "", $headers['Authorization']));
 $retr = "SELECT * FROM user WHERE apikey='$token' AND status='1'";
	$exe = mysqli_query($con,$retr);
    if (mysqli_num_rows($exe)==1) {
     //now the user token is validated let get the body
     //get the data body
    $input = @file_get_contents("php://input");
        file_put_contents("data.txt", $input);
    //decode the json file
    $body = json_decode($input);
    $network=$body->network;
    $phone=$body->mobile_number;
    $amount=$body->amount;
    $ported_number=$body->Ported_number;
    $airtime_type=$body->airtime_type;
   date_default_timezone_set('Africa/Lagos');
  $date=date("l j<\s\up>S</\s\up>, F Y @ g:iA");
      $transid=rand(100000000,999999999);
      $service="AIRTIME";
    $rob = mysqli_fetch_array($exe);
     $adex_api=$rob['apikey'];
     $adex_result = "true";
     //get user detials 
     
      //check the networkid if is correct
   $adex_network = mysqli_query($con,"SELECT * FROM networkid WHERE networkid='$network'");
	$check_network =  mysqli_num_rows($adex_network);
	  if($check_network == 1){
	   while ($elijah_network = mysqli_fetch_array($adex_network)) {
	$network_id=$elijah_network['networkid'];
	$network_name=$elijah_network['network'];
	   }
	   //check if is avialable
	   $data_lock = mysqli_query($con,"SELECT * FROM airtime_lock");
	$lock = mysqli_fetch_array($data_lock);
	 $mtn_vtu = $lock['mtn_vtu'];
	 $airtel_vtu =$lock['airtel_vtu'];
	 $glo_vtu = $lock['glo_vtu'];
	 $mobile =$lock['9mobile_vtu'];
	 if(strlen($phone !== 11)){
	     if(is_numeric($phone)){
	   if($network_name == 'MTN'){
	    if($mtn_vtu == "on"){
	    }else{
 header('HTTP/1.0 403 unauthorised');
   $response['status']="fail";
	$response['msg'] = "$network_name  is not avialable now please try again later"; 
	$adex_result = "false";
	    }
	    //mtn sme data
	 }elseif($network_name == 'AIRTEL' && $airtel_vtu=='off'){
             header('HTTP/1.0 403 unauthorised');
   $response['status']="fail";
	$response['msg'] = "$network_name  is not avialable now please try again later"; 
	$adex_result = "false";
             //glo data
         }elseif($network_name == 'GLO' && $glo_vtu=='off'){
             header('HTTP/1.0 403 unauthorised');
   $response['status']="fail";
	$response['msg'] = "$network_name  is not avialable now please try again later"; 
	$adex_result = "false";
           // 9mobil data
           	//checking if is ported number or not
         }elseif($network_name == '9MOBILE' && $mobile=='off'){ 
          header('HTTP/1.0 403 unauthorised');
   $response['status']="fail";
	$response['msg'] = "$network_name  is not avialable now please try again later"; 
	$adex_result = "false";
}
if($ported_number == 0){
               $validate = substr($phone, 0, 4);
 if($network_name=="MTN"){
if(strpos(" 0702 0703 0713 0704 0706 0716 0802 0803 0806 0810 0813 0814 0816 0903 0913 0906 0916 0804 ", $validate) == FALSE || strlen($phone) != 11){
   
    header('HTTP/1.0 403 planid required');
   	$response['msg'] = "This number is not an $network_name Number => $phone";
   	$adex_result = "false";
}
}
else if($network_name=="GLO"){
if(strpos(" 0805 0705 0905 0807 0907 0707 0817 0917 0717 0715 0815 0915 0811 0711 0911 ", $validate) == FALSE || strlen($phone) != 11){
    
 header('HTTP/1.0 403 planid required');
   	$response['msg'] = "This number is not an $network_name Number => $phone";
   	$adex_result = "false";
}
}
else if($network_name=="AIRTEL"){
if(strpos(" 0904 0802 0902 0702 0808 0908 0708 0918 0818 0718 0812 0912 0712 0801 0701 0901 0907 0917 ", $validate) == FALSE || strlen($phone) != 11){
    header('HTTP/1.0 403 planid required');
   	$response['msg'] = "This number is not an $network_name Number => $phone";
   	$adex_result = "false";
}
}
else if($network_name =="9MOBILE"){
if(strpos(" 0809 0909 0709 0819 0919 0719 0817 0917 0717 0718 0918 0818 0808 0708 0908 ", $validate) == FALSE || strlen($phone) != 11){
    
     header('HTTP/1.0 403 planid required');
   	$response['msg'] = "This number is not an $network_name Number => $phone";
   	$adex_result = "false";
}
}
 }
//check the price dicount 
require_once ('user.php');
if($network_name == "MTN"){
   $airtime_price=$airtimemtn;
}elseif($network_name == "AIRTEL"){
    $airtime_price=$airtimeair;
}elseif($network_name == "9MOBILE"){
    $airtime_price = $airtimeet;
}elseif($network_name == "GLO"){
    $airtime_price =$airtimeglo;
}
 $min_sql = mysqli_query($con, "SELECT * FROM pay");
     $min_row = mysqli_fetch_assoc($min_sql);
     //minimum money to be in user wallet
     $min=$min_row['min'];
     //minimum airtime you can purchase
     $airtime_min=$min_row['airtime'];
     
     if($airtime_min < $amount){
         $total_price= ($airtime_price/100)*$amount;
         $data_price=$amount;
         $debit = $blc - $total_price;
         if($total_price < $blc){
             if($min < $debit){
             $req = mysqli_query($con,"SElECT * FROM transactions WHERE transid = '$transid' ") or die(mysqli_error());	
	$nu = mysqli_num_rows($req);
	if($nu == 0){
	    if($adex_result == "true"){
	    //debit user 
 $doupt = mysqli_query($con,"UPDATE user set bal='$debit' WHERE email='$email'");
 if($doupt){
     require_once ('../../core/api.php');
     $transid56=rand(10000000000,99999999999);
      $curl = curl_init();
curl_setopt_array($curl, array(
  CURLOPT_URL => $topup_api_url,
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS =>'{
    "network": '.$network_id.',
    "amount": '.$amount.',
    "phone": "'.$phone.'",
    "bypass": false,
    "request-id": '.$transid56.',
    "plan_type": "VTU"
      
  }',
  CURLOPT_HTTPHEADER => array(
    'Content-Type: application/json',
    "Authorization: Token ".$topup_api_secret
  ),
));
$dataapi = curl_exec($curl);
$result=json_decode($dataapi);
curl_close($curl);
if($result->status=='process'){
    $query = mysqli_query($con, "INSERT INTO transactions (username,transid,network,service,type,amount,mobile,plans,status,date,oldbal,newbal) VALUES('$username','$transid','$network_name','$service','$airtime_type','$total_price','$phone','AIRTIME','1','$date','$blc','$debit') ");
    
    
     require_once 'mail.php';
@require "../../Mail/phpmailer/PHPMailerAutoload.php";
         require_once "../../core/invoice.php";
         $adminemail=$web['email'];
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
            $mail->addAddress("$adminemail");
            $mail->isHTML(true);
            $mail->Subject = "AIRTIME Transaction";
            $mail->Body = $temp;         
            if(!$mail->send()){
                                
                //I left this blank because i don't want anything to pop out on the ui again
                //echo "<script> alert('error sending email mysqli_error($mail)');</script>";
            } else {
                 //I left this blank because i don't want anything to pop out on the ui again
                 // echo "<script> alert('email was sent');</script>";
            };

    
    $response['amount']="$data_price";
    $response['transid']="$transid";
    $response['date']="$date";
    $response['newbal']="$debit";
    $response['oldbal']="$blc";
    $response['mobile_number']="$phone";
    $response['plan_type']="$airtime_type";
    $response['network']="$network_name";
    $response['status']="successful";
    
}else{
       $fund=$debit + $total_price;
     $doupt_fund = mysqli_query($con,"UPDATE user set bal='$fund' WHERE email='$email'");
      $query = mysqli_query($con, "INSERT INTO transactions (username,transid,network,service,type,amount,mobile,plans,status,date,oldbal,newbal) VALUES('$username','$transid','$network_name','$service','$airtime_type','$amount','$phone','$data_name','0','$date','$blc','$fund') ");
      
      
       require_once 'mail.php';
@require "../../Mail/phpmailer/PHPMailerAutoload.php";
         require_once "../../core/fail.php";
         $adminemail=$web['email'];
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
            $mail->addAddress("$adminemail");
            $mail->isHTML(true);
            $mail->Subject = "Fail AIRTIME Transaction";
            $mail->Body = $temp;         
            if(!$mail->send()){
                                
                //I left this blank because i don't want anything to pop out on the ui again
                //echo "<script> alert('error sending email mysqli_error($mail)');</script>";
            } else {
                 //I left this blank because i don't want anything to pop out on the ui again
                 // echo "<script> alert('email was sent');</script>";
            };

      
     
      
  $response['amount']="$amount";
    $response['transid']="$transid";
    $response['date']="$date";
    $response['newbal']="$fund";
    $response['oldbal']="$blc";
    $response['mobile_number']="$phone";
    $response['plan_type']="$airtime_type";
    $response['network']="$network_name";
    $response['status']="fail";  
}
 }else{
      header('HTTP/1.0 403 networkid required');
   $response['status']="fail";
	$response['msg'] = "Network error please try again";  
 }
	    }
	}else{
	  header('HTTP/1.0 403 networkid required');
   $response['status']="fail";
	$response['msg'] = "Please Reload the page something occur";  
	}
 
             }else{
       header('HTTP/1.0 403 networkid required');
   $response['status']="fail";
	$response['msg'] = "You can't withdraw all the money in your account the minimum money dat must be left is ₦".number_format($min,2).""; 
             }
         }else{  
    header('HTTP/1.0 400 planid required');
   $response['status']="fail";
	$response['msg'] = "You can't topup due to insuffiecent balance fund your wallet and try again  ₦".number_format($blc,2)."";
    }
         }else{  
    header('HTTP/1.0 400 planid required');
   $response['status']="fail";
	$response['msg'] = "You minimum airtime you can purchase is  ₦".number_format($airtime_min,2)."";
    }
	     } else{  
    header('HTTP/1.0 400 planid required');
   $response['status']="fail";
	$response['msg'] = "invalid phone number $phone";
    }
	 } else{  
    header('HTTP/1.0 400 planid required');
   $response['status']="fail";
	$response['msg'] = "invalid phone number $phone";
    }

   } else{  
    header('HTTP/1.0 500 planid required');
   $response['status']="fail";
	$response['msg'] = "The Network id is invalid $token";
    }
     
    } else {
        // tell the user no products found
         header('HTTP/1.0 500 planid required');
        $response["status"] = "fail";
        $response["msg"] = "Authorization token not found $token";
    }
} else {
    header('HTTP/1.0 500 Unauthorized');

    // tell the user no products found
    $response["status"] = "fail";
    $response["msg"] = "Your authorization token is required.";
    // exit;
}
echo json_encode($response);
