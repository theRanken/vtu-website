<?php
session_start();
require('../core/conn.php');
if(!isset($_SESSION["name"])){
header("location: ../login");
  exit;
		}
$ins = mysqli_query($con,"SELECT * FROM user WHERE name='$name' ");
$data = mysqli_fetch_array($ins);
								
	$email = $data['email'];
	$phone = $data['phone'];
	$name = $data['name'];

	$succ = $_GET['txref'];
	
	$ref = $_SESSION['ref'];
	
	$ret = mysqli_query($con,"SELECT * FROM deposit WHERE trans='$ref' ");
		
		$da = mysqli_fetch_array($ret);
		
		$amount = $da['amount'];
		$tid = $da['trans'];
		$money = $da['charge'];
		$status = $da['status'];
		$query_rec = mysqli_query($con,"SELECT * FROM pay");
			
			$apib = mysqli_fetch_array($query_rec);
			
$paykey = $apib['fsecret'];	
// confirm Rave payment 

if (isset($_GET['txref'])) {
        $cref = $_GET['txref'];
        $amount = ""; //Correct Amount from Server
        $currency = ""; //Correct Currency from Server

        $query = array(
            "SECKEY" => $paykey,
            "txref" => $cref
        );

        $data_string = json_encode($query);
                
        $ch = curl_init('https://api.ravepay.co/flwv3-pug/getpaidx/api/v2/verify');                                                                      
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);                                              
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));

        $response = curl_exec($ch);
        
        

        $header_size = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
        $header = substr($response, 0, $header_size);
        $body = substr($response, $header_size);
        
        
        curl_close($ch);

        $resp = json_decode($response, true);
        
        
      	$paymentStatus = $resp['data']['status'];
        $chargeResponsecode = $resp['data']['chargecode'];
        $chargeAmount = $resp['data']['amount'];
        $chargeCurrency = $resp['data']['currency'];
        $vbMessage = $resp['data']['vbvmessage'];
        
        $card = $resp['data']['card']['brand'];
        
        $digit4 =   $resp['data']['card']['last4digits'];
        
     
if($chargeResponsecode === '00' && $paymentStatus === 'successful' ) {
    
    
    $payamt = $amount;

    
                if($cref === $tid  && $status !== '1'){
                    
                    
               $addfund = mysqli_query($con, "UPDATE user SET bal=bal+$payamt WHERE email='$email'"); 
                // update
                $tk = md5(uniqid());
				$statu = "1";
                $r = $_GET['flwref'];
                
				$up = "UPDATE deposit SET status='$statu' WHERE trans ='$tid' ";
				$con->query($up);
				  require_once 'sent.php';
		     $alert = '<script>alert("You Have Sucessuflly Deposited '.$money.' to Your Account!")
     </script><script> window.location.href="index.php";</script>';
echo $alert;	
          ?> 
          <?php    
               
                }
    
    
    
    
          // transaction was successful...
  			 // please check other things like whether you already gave value for this ref
          // if the email matches the customer who owns the product etc
          //Give Value and return to Success page
          
          // amount to credit minus fees


        }else { 
            
            // don't give value and return to failed page
             $alert = '<script>alert("Transaction Faild!")
     </script><script>window.location.href="index.php";</script>';
echo $alert;
      ?>
 <?php         
            
        }
    
    
    
    }
		else {
      die('No reference supplied');
      
     
    }


  

         

?>