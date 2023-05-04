<?php
require_once '../core/conn.php';

if(!empty($_POST['ref'])) {
    $query ="SELECT * FROM user WHERE username='" . $_POST['ref']." ' ";
    $username=$_POST['ref'];
    $result= mysqli_query($con,$query);
    $count = mysqli_num_rows($result);
    $row = mysqli_fetch_assoc($result);
    $package=$row['type'];
    $ref=$_POST['ref'];
    if($count > 0){
        echo "<span style='color:green'>$username is currently running on $package USER</span>";
    }else{
        echo "<span style='color:red'>This user doesnot exist.</span>";
    }
 
}
  ?>