<?php
require_once '../core/conn.php';
$sql = mysqli_query($con, "SELECT * FROM  mail");
            if 
            (mysqli_num_rows($sql) > 0){
              $mail = mysqli_fetch_assoc($sql);
            }
            $footer=$web['footer'];
$musername=$mail['username'];
$mpassword=$mail['password'];
$hosts=$mail['host'];
$sender=$mail['sender'];
$adminemail=$web['email'];

@require "../Mail/phpmailer/PHPMailerAutoload.php";
         require_once "../core/loan.php";
         $mail = new PHPMailer();
        $mail->CharSet = "UTF-8";
         $mail->IsSMTP();
         $mail->SMTPAuth = true;
            $mail->SMTPSecure = "ssl";
            $mail->Host = "$hosts";
            $mail->Port = 465;              
            $mail->Username = "$musername";
            $mail->Password = "$mpassword";
            $mail->IsHTML(true);
            $mail->setFrom("$sender");
            $mail->addAddress("$adminemail");
            $mail->isHTML(true);
            $mail->Subject = "Loan Request";
            $mail->Body = $temp;         
            if(!$mail->send()){
                                
                               if (!$mail->send()) {
                //I left this blank because i don't want anything to pop out on the ui again
                //echo "<script> alert('error sending email mysqli_error($mail)');</script>";
            } else {
                 //I left this blank because i don't want anything to pop out on the ui again
                 // echo "<script> alert('email was sent');</script>";
            };
            }         

?>