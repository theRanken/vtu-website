<?php
require_once '../core/conn.php';
$sql = mysqli_query($con, "SELECT * FROM user WHERE id = {$_SESSION['id']}");
            if 
            (mysqli_num_rows($sql) > 0){
              $row = mysqli_fetch_assoc($sql);
            }

$account=$row['type'];
$accountnumber=$row['accountnumber'];
$bankname=$row['bankname'];
$accountname=$row['accountname'];
if($account == 'SMART'){
	$accounttype="SMART USER";
}elseif($account == 'TOPUP'){
	$accounttype="TOPUP USER";
}elseif($account == 'AFFILIATE'){
	$accounttype = "AFFILIATE USER";
}elseif($account == 'API')
{
$accounttype="API USER";
};
?>