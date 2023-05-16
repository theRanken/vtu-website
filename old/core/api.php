<?php
require_once 'conn.php';
$sql = mysqli_query($con, "SELECT * FROM  api");
            if 
            (mysqli_num_rows($sql) > 0){
              $apis = mysqli_fetch_assoc($sql);
            }
            $link=$apis['host'];
            $apikey=$apis['apikey'];
            
?>