<?php
require_once '../core/conn.php';

if(!empty($_POST['ref'])) {
    $query ="SELECT * FROM user WHERE username='" . $_POST['ref']." ' ";
    $result= mysqli_query($con,$query);
    $count = mysqli_num_rows($result);
    $ref=$_POST['ref'];
    if($count > 0){
        echo "<span style='color:green'>Referral Avialable for use.</span>";
        echo "<script>$('#submit').prop('disabled',false);</script>";
    }else{
        echo "<span style='color:red'>Referral not Avialable.</span>";
    }
 
}
  ?>