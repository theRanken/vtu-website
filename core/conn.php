<?php

date_default_timezone_set("Africa/Lagos");
$localhost = 'localhost';
$databaseusername = 'tanko-vtu';
$databasepassword = 'tanko-vtu';
$databasename = "tanko-vtu";
$purchasecode = "MTIzNDU2Nzg5MA";
$con = mysqli_connect(
  $localhost,
  $databaseusername,
  $databasepassword,
  $databasename
);

// Check connection
if (mysqli_connect_errno()) echo "Failed to connect to MySQL: " . mysqli_connect_error();

$sql = $con->query("SELECT * FROM  general order by id desc LIMIT 1");
if ($sql->num_rows > 0) $web = $sql->fetch_assoc();

$aemail = $web['email'];

$sql = $con->query("SELECT * FROM  mail order by id desc LIMIT 1");

if ($sql->num_rows > 0) $mail = $sql->fetch_assoc();

?>