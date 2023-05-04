<?php
require_once 'conn.php';
$data="1";
$result=mysqli_query($con,"SELECT * FROM theme WHERE status='$data'");
$check=mysqli_query($con,"SELECT * FROM theme WHERE status=5");
if(mysqli_num_rows($result)==1){
header("location:$domain/theme");
exit;
}else{
    if(mysqli_num_rows($check)==1){
      header("location:$domain/mentainance.php");  
    }
}
?>