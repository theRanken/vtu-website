<?php
require_once '../core/conn.php';
session_start();
$sql = mysqli_query($con, "SELECT * FROM user WHERE id = {$_SESSION['id']}");
            if 
            (mysqli_num_rows($sql) > 0){
              $row = mysqli_fetch_assoc($sql);
            }
$vtu="SME";
$share="GIFTING";
$phone=$row['phone'];
$val=$_POST['val'];
if($vtu == $_POST['val'] ){
	 echo "<script>$('#mobile').attr('readOnly','readOnly')</script>";
	 echo "<script>$('#mobile').val('$phone')</script>";
        }elseif ($share == $_POST['val'] ) {
              echo "<script>$('#mobile').removeAttr('readOnly')</script>";
        } else {
        	echo "<script>$('#mobile').removeAttr('readOnly')</script>";
        };

?>