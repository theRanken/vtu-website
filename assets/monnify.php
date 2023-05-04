<?php
session_start(); 

$username =$row['username'];
$email=$row['email'];
$name=$row['name'];
  // SECRET KEY IN PROFILE
$chek = mysqli_query($con, "SELECT * FROM pay");
$pdata = mysqli_fetch_array($chek);
$mapi=$pdata['mapi'];
$msk=$pdata['msk'];
$both="$mapi:$msk";
$stringk=base64_encode($both);

//API REQUEST
$url = 'https://api.monnify.com/api/v1/auth/login';
$ch = curl_init();

curl_setopt_array($ch, [
    CURLOPT_URL => $url, 
    CURLOPT_POST => 1,
    CURLOPT_RETURNTRANSFER => 1,
    CURLOPT_HTTPHEADER => [
        "Authorization: Basic ".$stringk."", ///// STRINGK is the return base64 hash of the Sk & apiKey
    ]

]);

$json = curl_exec($ch);
curl_close($ch);

echo "<script>console.log(".$json.")</script>";


$result = json_decode($json, true);

$accessToken=$result['responseBody']['accessToken'];

$fullname=$username;
$c_code=rand(1000000000, 9000000000);
$aref=uniqid();
$bref=rand(1000, 9000);
$ref=$aref.$bref;
$remail=$email;
$xx=$pdata['contact'];
   

$postdata = array(
    'accountName' => "$fullname", ///////// Account Name to display
    'accountReference' => "$ref", /// Unique ID to update customer wallet
    'currencyCode' => "NGN",        //////// Currency to pay
    'customerEmail' => "$remail",           ////// Customer email address
    'contractCode' => "$xx",    //////// Nunique number to start trade
    'customerName' => "$fullname", /////// Customer Name to setup account
);

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL =>  "https://api.monnify.com/api/v2/bank-transfer/reserved-accounts",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => 
                      '{
                            "accountReference": "'.$ref.'",
                            "accountName": "'.$fullname.'",
                            "currencyCode": "NGN",
                            "contractCode": "'.$xx.'",
                            "customerEmail": "'.$remail.'",
                            "bvn": "22433145825",
                            "customerName": "'.$fullname.'",
                            "getAllAvailableBanks": false,
                             "preferredBanks": ["50515","035"]
                           
                      }',
                    //   "preferredBanks": ["232"]
                     //232 sterlin
                            //035 wema
                            //50515 rolex microfinance bank
CURLOPT_HTTPHEADER => array(
    "Authorization: Bearer ".$accessToken,
    "Content-Type: application/json"
  ),
));

$response = curl_exec($curl);
 file_put_contents("autobank_data.txt", $response);
curl_close($curl);
//  echo $response;



$value = json_decode($response, true);

if($value["requestSuccessful"] == true){
     
       $account_name  = $value["responseBody"]["accountName"];
       
       if($value["responseBody"]["accounts"][0]["bankCode"]== "035"){
         $wema =  $value["responseBody"]["accounts"][0]["accountNumber"];
         $wema_name = $value["responseBody"]["accounts"][0]["bankName"];
     
     }else if($value["responseBody"]["accounts"][0]["bankCode"]== "50515"){
         $rolex =  $value["responseBody"]["accounts"][0]["accountNumber"];
         $rolex_name = $value["responseBody"]["accounts"][0]["bankName"];
     
     }else{ }
     
     if($value["responseBody"]["accounts"][1]["bankCode"]== "035"){
         $wema =  $value["responseBody"]["accounts"][1]["accountNumber"];
         $wema_name = $value["responseBody"]["accounts"][1]["bankName"];
     
     }else if($value["responseBody"]["accounts"][1]["bankCode"]== "50515"){
         $rolex =  $value["responseBody"]["accounts"][1]["accountNumber"];
         $rolex_name = $value["responseBody"]["accounts"][1]["bankName"];
     
     }else{ }
     
     if($value["responseBody"]["accounts"][2]["bankCode"]== "035"){
         $wema =  $value["responseBody"]["accounts"][2]["accountNumber"];
         $wema_name = $value["responseBody"]["accounts"][2]["bankName"];
     
     }else if($value["responseBody"]["accounts"][2]["bankCode"]== "50515"){
         $rolex =  $value["responseBody"]["accounts"][2]["accountNumber"];
         $rolex_name = $value["responseBody"]["accounts"][2]["bankName"];
     
     }else{ }
     
     

   mysqli_query($con, "UPDATE user SET bankname='".$wema_name."', accountnumber='".$wema."', accountname='".$fullname."',autofund='ACTIVE',rolexbank='$rolex_name',rolexnumber='$rolex' WHERE email='".$remail."'");     
     
}

?>