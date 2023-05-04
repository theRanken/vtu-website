<?php
$chek = mysqli_query($con, "SELECT * FROM simhosting");
 $adex = mysqli_fetch_array($chek);
 $api_url = $adex['smeplugurl'];
 $apikey=$adex['smeplug'];
 
 $curl = curl_init();
curl_setopt_array($curl, array(
  CURLOPT_URL => $api_url,
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_HTTPHEADER => array(
    'Content-Type: application/json',
    "Authorization: Token $apikey"
  ),
));
$dataapi = curl_exec($curl);
curl_close($curl);
$result=json_decode($dataapi);
$adexplug_blc= $result?->balance ? $result->balance : 0.00;
