<?php
require_once '../core/conn.php';

if(!empty($_POST['plan_id'])) {
    $query ="SELECT * FROM add_cable WHERE planid='" . $_POST['plan_id']." ' ";
    $result= mysqli_query($con,$query);
    $count = mysqli_num_rows($result);
    $plan=$_POST['plan_id'];
    if($count > 0){
        echo "<span style='color:red'>This plan id exits before in the database please check well from vtpass .$plan</span>";
    }else{
       
    }
 
}
  ?>