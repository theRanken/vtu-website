<?php  

$sname = "localhost";
$uname = "supreme1_vtu";
$password = "supreme1_vtu";

$db_name = "supreme1_vtu";

$conn = mysqli_connect($sname, $uname, $password, $db_name);

if (!$conn) {
	echo "Connection failed!";
	exit();
}
?>