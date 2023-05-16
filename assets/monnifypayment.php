<?php
$dateTime = new DateTime('now', new DateTimeZone('Africa/Lagos')); 
$time=$dateTime->format("d-M-y  h:i A");
$chek = mysqli_query($con, "SELECT * FROM pay");
$pdata = mysqli_fetch_array($chek);
$mapi=$pdata['mapi'];
$msk=$pdata['msk'];
$clientSecret=$msk; 





$localhost = 'localhost';
$databaseusername = 'africa16_Africandream2';
$databasepassword = 'NewAfricandream2022@';
$databasename = "africa16_Africandream2";
$con=mysqli_connect("$localhost","$databaseusername","$databasepassword","$databasename");

///// SECRET KEY FOUND ON PROFILE


// Retrieve the request's body and parse it as JSON

                $input = @file_get_contents("php://input");
            
                // Do something with $event
                // $event = json_decode($input);
              file_put_contents("monnify_test_log.txt", $input);
        $res = json_decode($input, true);
                //  print_r($res);
                //  $response = file_get_contents("monnify_log.txt");
 if (!empty($res)) {
                
                // $hash = $res["eventData"]["transactionHash"];
    
                $mnfy_email = $res["eventData"]["customer"]["email"];
                     
                $amount_paid = $res["eventData"]["amountPaid"];
                
                $mnfy_trans_ref = $res["eventData"]["transactionReference"];
                
                $payment_status =  $res["eventData"]["paymentStatus"];
                
                $paidon = $res["eventData"]["paidOn"];
                
                $payment_ref = $res["eventData"]["paymentReference"];
 ////////////////////////////////////////////////////////////////////
        //////////////////////////////////////////////////////////////////
             /////user details//////
                     $email = $res["eventData"]['customer']['email'];
           $usersdet = mysqli_fetch_array(mysqli_query($con,"SELECT * FROM user WHERE email= '$mnfy_email'"));
                     
                     $id = $usersdet['id'];
                     $user_username = $usersdet['email'];
                     $username = $usersdet['username'];
                     $wallet = $usersdet['bal'];
                     $amount1="50";
                 $amount2=ceil($amount_paid - $amount1);
                     $prebalance = $usersdet['bal'];
                     $postbalance = $prebalance + $amount2;
                     $user_id =  $usersdet['id'];
                     
            $secret_key =$msk;
            
            // $monnify_key['monnify_secret_key'];
          
        $public_key =$mapi; 
          
          // $monnify_key['monnify_public_key'];
        ///////////////////////////////////////////////////////////////////
        /////////////////////////////////////////////////////////////////////     
$transaction_hash  = "$secret_key|$payment_ref|$amount_paid|$paidon|$mnfy_trans_ref";
                
                $verify_hash = hash('sha512', $transaction_hash);
 // if ($hash == $verify_hash) {
 
                if ( $res["eventType"] == 'SUCCESSFUL_TRANSACTION') {
                    
                    
                            //whether ip is from the share internet  
                            if(!empty($_SERVER['HTTP_CLIENT_IP'])) {  
                                        $ip = $_SERVER['HTTP_CLIENT_IP'];  
                                }  
                            //whether ip is from the proxy  
                            elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
                                        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
                            }  
                        //whether ip is from the remote address  
                            else{  
                                    $ip = $_SERVER['REMOTE_ADDR'];  
                            }  
 if( $ip == "35.242.133.146"){
                        
                            if ( $res["eventData"]["paymentStatus"] == "PAID") {
                            
                                
                                // $ratio =100/101.5;
                                $ratio ="50";
                                $amount = $amount_paid - $ratio;
                                $time_string = time();
                                $description = "monnify funding. of ₦".$amount." on user".$username;;
                                
        $check = mysqli_num_rows(mysqli_query($con,"SELECT * FROM deposit WHERE trans = '$mnfy_trans_ref'"));
        
                                if($check > 0){
                                    http_response_code(200);
                                    exit();
                                }else{
                                   
                                    // wher i will add into the payers account
                                    $newbal =  $wallet + $amount;   
                                    ////////////////////////////////////////////
                                     /////////////////////////////////////////
                                     
                                     
$insert= mysqli_query($con, "INSERT INTO deposit (name,amount,charge,status,trans,date,type) VALUES ('$username', '$amount_paid','$amount','1','$mnfy_trans_ref','$time','$description') ");       
                                    
                              /////////fund user
                              
    $str ="UPDATE user SET  bal = '$newbal' WHERE email = '$mnfy_email'";
                                      $result = mysqli_query($con, $str);
                                     
                                        //  http_response_code(200);
                                    // }
                                       
                                    http_response_code(200);
                                    exit();
                                }
                            
                            }else{
                                http_response_code(500);
                            }
                    }
                    
                }

            }
            
?>