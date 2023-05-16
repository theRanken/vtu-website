<?php
require_once '../core/conn.php';
//require_once '../login/index.php';
session_start();

echo $customer_id = $_SESSION['id'];
$curl = curl_init();
//curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

if(!empty($_GET["reference"])){
  $sanitize = filter_var_array($_GET, FILTER_SANITIZE_STRING);
  $reference = rawurlencode($sanitize["reference"]);
}else{
  die("No reference was supplied!");
}

  curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.paystack.co/transaction/verify/" . $reference,
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_HTTPHEADER => [
    "accept: application/json",
    "authorization: Bearer sk_test_4f15f9df38e2a07a01ea5055c3bf1fa05e19640f",
    "cache-control: no-cache"
  ],
));

$response = curl_exec($curl);
$err = curl_error($curl);

if($err){
    // there was an error contacting the Paystack API
  die('Curl returned error: ' . $err);
}

$tranx = json_decode($response);
if(!$tranx->status){
  // there was an error from the API
  die('API returned error: ' . $tranx->message);
}

if('success' == $tranx->data->status){


//echo"<pre>" . $response . "</pre>";
echo $status = $tranx->data->status;
echo $amount = $tranx->data->amount / 100;
echo $email = $tranx->data->customer->email;
echo $ref = $tranx->data->reference;
$refbonus = 5/100 * $amount;
//print_r($product_desc);
 /*$total = 0;
$balance = 0;
$amount_used = 0;
*/

//Insert into Funds table starts here

$insert_data = "INSERT INTO funds(trans_id,customer_id,credit)VALUES('$ref','$customer_id', '$amount')";
$funds_data = mysqli_query($con, $insert_data);
if($funds_data){


//Search Wallet table
   $check_wallet = "SELECT * FROM wallet WHERE customer_id = " . $customer_id;
   //Run query on wallet
   $wallet_result = mysqli_query($con, $check_wallet);
       if(mysqli_num_rows($wallet_result) > 0){
          $existing_data = mysqli_fetch_array($wallet_result);
          echo$total = intval($existing_data["total"] + $amount);
		  echo$balance = intval($existing_data["balance"] + $amount);
		  echo$amount_used = intval($existing_data["amount_used"]);
            //update record
			$update = "UPDATE wallet SET
			total = '$total',
			balance = '$balance',
			amount_used = '$amount_used'
        		WHERE customer_id = {$customer_id}";
        		if(mysqli_query($con, $update)){
        			echo"<script>alert('Your wallet has been updated successfully!')</script>";
        		}else{
        			echo"Could not update!";
        		}
       }elseif(mysqli_num_rows($wallet_result) < 1){
           //Insert data into wallet
		  echo$amount_used = 0;
           $insert_into_wallet = "INSERT INTO wallet(customer_id,total, balance, amount_used)VALUES('$customer_id', '$amount', '$amount', '$amount_used')";
           if(mysqli_query($con,$insert_into_wallet)){
				echo"Data inserted into wallet!";
				
			
			
				//Crediting referrer upon first topup
			$referrer = "SELECT * FROM referral WHERE referrer_id = $customer_id";
			if(mysqli_num_rows($referrer) > 0){
          $existing_data = mysqli_fetch_array($wallet_result);
         // $referrer_id = $existing_data["referrer_id"];
          $referent_id = $existing_data["referent_id"];
          $refusername = $existing_data["refusername"];
          $status = $existing_data["status"];
			if($status === 0){
			    $stat = 1;
			    $updateReferral = "UPDATE referral SET
    			referprice = '$refbonus',
    			status = '$stat'
        		WHERE referent_id = {$referent_id}";
        		if(mysqli_query($con, $updateReferral)){
        		  echo"Success in referal";	
        		}
			}
			
			
        		
        		
			}		
       }
       }


   
}else{
  
}
   header("Location: index.php?wallet='Wallet Updated Successfully!'");
}
		
		/*else{
			echo"Could not update!";
		}
		
		}else{
			$insert_data_into_wallet = "INSERT INTO wallet(customer_id,total)VALUES('$customer_id', '$amount')";
			if(mysqli_query($con,$insert_data_into_wallet)){
				echo"Data inserted into Wallet successfully";
			
		}
		
		
			}
	}else{
		echo"Error inserting data";
	}

//Insert into Funds Table stops here


 $sql = mysqli_query($con, "SELECT * FROM user WHERE email = '$email'");
            if 
            (mysqli_num_rows($sql) > 0){
             $pay = mysqli_fetch_assoc($sql);
             $username = $pay['username'];
             $bal = $pay['bal'];
             
            }

 $total_amount = intval($bal + $amount);
//Update table user on balance
$sql_update = "UPDATE user SET 
    bal = $total_amount
      WHERE email = '$email'";
      if(mysqli_query($con, $sql_update)){
			echo "Updated successfully!";
		}else{
			echo"Could not update!";
		}
}else{
	die("Transaction not found!");
}
*/

?>
