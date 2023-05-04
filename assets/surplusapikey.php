<?php
	header('Content-type: application/json; charset=UTF-8');
	require_once '../core/conn.php';
	include ('setupinfo.php');
	if (isset($_POST['apikey'])){
	    $apikey=$_POST['apikey'];
	    if(empty($apikey)){
	        
	        $response['message']='The apikey can not be empty';
	        
	        }else{
	  $host = "https://surplusdata.com.ng/api/balance?apikey=$apikey";
//Initialize cURL.
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $host);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);

$data = curl_exec($ch);
$resp = json_decode($data);

//Close the cURL handle.
curl_close($ch);			
$success = $resp->status;
$minebal = $resp->message;

if($success == 'success'){
    
    $update = mysqli_query($con, "UPDATE api SET apikey='$apikey' WHERE id=1 ");
     if($update) {
	 $setupDatabase = $setupInfo["database"];
	$setupAdmin =$setupInfo["admin"];
	$setupKey=$setupInfo["key"];
	$setupwebsite = $setupInfo["website"];
	$setupapikey =1;
	$setuppayment = $setupInfo["payment"];
	$setuppurchasecode =$setupInfo["purchasecode"];
	       
	       
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
	   }else{
	       $response['message']='something occur please try again or contact Adex (07013397088)';
	   }
    
}else{
    $response['message']=$minebal;
}



	  
	        }
	        echo json_encode($response);
	}
	    