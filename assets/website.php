<?php
	header('Content-type: application/json; charset=UTF-8');
	require_once '../core/conn.php';
	include ('setupinfo.php');
	if (isset($_POST['websitename']) && ($_POST['phone']) && ($_POST['email'])){
	    $websitename=$_POST['websitename'];
	    $phone=$_POST['phone'];
	    $email=$_POST['email'];
	    
	    if(empty($websitename)){
	        
	        $response['message']='the website name  field can not be field';
	        
	        }else if(strlen($phone)<5){
	            
	            $response['message']='phone number must be greater than 11';
	        }elseif(empty($email)){
	            $response['message']='the email field can not be field';
	        }else{
	            $http="https://";
	          $serverName=$http.$_SERVER['HTTP_HOST'];
	   $update = mysqli_query($con, "UPDATE general SET name='$websitename', phone='$phone',email='$email',web='$serverName' ");
	   if($update) {
	 $setupDatabase = $setupInfo["database"];
	$setupAdmin=$setupInfo["admin"];
	$setupKey = $setupInfo["key"];
	$setupwebsite =1;
	$setupapikey = $setupInfo["apikey"];
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
	        }
	        echo json_encode($response);
	}
	    