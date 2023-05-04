<?php
	header('Content-type: application/json; charset=UTF-8');
	if (isset($_POST['purchasecode'])){
	    
	    $purchasecode=$_POST['purchasecode'];
	    $encode=base64_encode($purchasecode);
	    include 'setupinfo.php';
$host = "https://surplusdata.com.ng/api/purchasecode?purchasecode=$purchasecode";
//Initialize cURL.
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $host);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
$data = curl_exec($ch);
$resp = json_decode($data);

//Close the cURL handle.
curl_close($ch);
$status=$resp->status;
if($status == 'readytogo'){
	$setupDatabase = $setupInfo["database"];
	$setupAdmin = $setupInfo["admin"];
	$setupKey = $setupInfo["key"];
	$setupwebsite = $setupInfo["website"];
	$setupapikey = $setupInfo["apikey"];
	$setuppayment = $setupInfo["payment"];
	$setuppurchasecode = $encode;

	$formSetup = "<?php
	\$setupInfo[\"database\"]=$setupDatabase;
	\$setupInfo[\"admin\"]=$setupAdmin;
	\$setupInfo[\"key\"]=$setupKey;
	\$setupInfo[\"website\"]=$setupwebsite;
	\$setupInfo[\"purchasecode\"]=$setuppurchasecode;
	\$setupInfo[\"apikey\"]=$setupapikey;
	\$setupInfo[\"payment\"]=$setuppayment;
	?>";

	file_put_contents('setupinfo.php',$formSetup);
    
    $response['status']='500';
    $response['purchasecode']="$encode";
}else{
    $response['status']='error';
}
}else{
  $response['status']='error';  
}
echo json_encode($response);