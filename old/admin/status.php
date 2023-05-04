<?php
require_once "../core/conn.php";

            $query = mysqli_query($con, "update user set status='".$_POST['val']."' where id='".$_POST['id']."' ");
    if($query){
        $q =mysqli_query($con, "select * from user where id='".$_POST['id']."' ");
        @$data =mysqli_fetch_assoc($query);
        echo $data['$status'];
    }



?>