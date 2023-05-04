<?php
require_once '../core/conn.php';
$chek = mysqli_query($con, "SELECT * FROM simhosting");
 $adex = mysqli_fetch_array($chek);
 $apikey=$adex['smeplug'];
if(!empty($_POST['plan_id'])) {
    $query ="SELECT * FROM plans WHERE planid='" . $_POST['plan_id']." ' ";
    $result= mysqli_query($con,$query);
    $count = mysqli_num_rows($result);
    $plan=$_POST['plan_id'];
    if($count > 0){
        echo "<span style='color:red'>This plan id exits before in the database please check well from adexplug.com .$plan</span>";
    }else{
        
 $curl = curl_init();
curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://www.adexplug.com/api/plans/',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS =>'{
"plan": '.$plan.' }',  
  
  CURLOPT_HTTPHEADER => array(
    'Content-Type: application/json',
    "Authorization: Token $apikey"
  ),
));
$dataapi = curl_exec($curl);
curl_close($curl);
$result=json_decode($dataapi);

if($result->status == "successful"){
    
     echo "<span style='color:green'>".$result->msg."</span>";
 
    }else{
        
            echo "<span style='color:red'>".$result->msg."</span>"; 
        
    }
 
}
}
  ?>