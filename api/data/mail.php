<?php
  $sql = mysqli_query($con, "SELECT * FROM  mail");
            if 
            (mysqli_num_rows($sql) > 0){
              $mail = mysqli_fetch_assoc($sql);
            }
            $musername=$mail['username'];
$mpassword=$mail['password'];
$hosts=$mail['host'];
$sender=$mail['sender'];
?>