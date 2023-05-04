<?php
require_once '../core/conn.php';
  $sql = mysqli_query($con, "SELECT * FROM  mail");
            if 
            (mysqli_num_rows($sql) > 0){
              $mail = mysqli_fetch_assoc($sql);
            }
            $musername=$mail['username'];
$mpassword=$mail['password'];
$hosts=$mail['host'];
$sender=$mail['sender'];
$chek = mysqli_query($con,"SELECT * FROM pay");
 $pdata = mysqli_fetch_array($chek);
$min=$pdata['min'];
