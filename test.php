<?php
$networkid="1";
$mobile="08140274251";
$bypass="false";
$planid="4504";
 $curl = curl_init();
curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://www.superjarang.com/api/data/',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS =>'{"network": '.$networkid.',
"mobile_number": "'.$mobile.'",
 "Ported_number": '. $bypass.',
"plan": '.$planid.'
      
  }',  CURLOPT_HTTPHEADER => array(
    'Content-Type: application/json',
    "Authorization: Token hoCBtCCiC3s3g9AAE2B7vAyBbAA2H6fI7dc1CC3Fk654lB9BG2CmJnr0wx3e"
  ),
));
$dataapi = curl_exec($curl);
curl_close($curl);

echo ($dataapi);