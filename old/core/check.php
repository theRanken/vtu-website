<?php 

$dbServername = "localhost";
$dbUsername = "afrovib1_Dataplan1";
$dbPassword = "afrovib1_Dataplan1";
$dbName = "afrovib1_Dataplan1";

$con= new mysqli($dbServername, $dbUsername, $dbPassword, $dbName);
 $sql = mysqli_query($con, "SELECT * FROM  general order by id desc LIMIT 1");
            if 
            (mysqli_num_rows($sql) > 0){
              $web = mysqli_fetch_assoc($sql);
            }
/*
// Check connection
if ($mysqli -> connect_error) {
  echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
  exit();
}*/
?>