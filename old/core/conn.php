<?php  

$con= mysqli_connect("localhost","afrovib1_Dataplan1","afrovib1_Dataplan1","afrovib1_Dataplan1");
if(!$con){
    die("OOPs... Could not connect to the database");}
    
     $sql = mysqli_query($con, "SELECT * FROM  general order by id desc LIMIT 1");
            if 
            (mysqli_num_rows($sql) > 0){
              $web = mysqli_fetch_assoc($sql);
            }
       $sql = mysqli_query($con, "SELECT * FROM  mail order by id desc LIMIT 1");
            if 
            (mysqli_num_rows($sql) > 0){
              $mail = mysqli_fetch_assoc($sql);
            }


