<?php
require_once '../core/conn.php';
session_start();
$sql = mysqli_query($con, "SELECT * FROM user WHERE id = {$_SESSION['id']}");
            if 
            (mysqli_num_rows($sql) > 0){
              $row = mysqli_fetch_assoc($sql);
            }

$account=$row['type'];
if($account == 'SMART'){
	$accounttype="price";
}elseif($account == 'TOPUP'){
	$accounttype="top";
}elseif($account == 'AFFILIATE'){
	$accounttype = "reseller";
}elseif($account == 'API')
{
$accounttype="api";
};

?>