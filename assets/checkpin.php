<?php
require_once '../core/conn.php';
header('Content-type: application/json; charset=UTF-8');
$response = array();
if (isset($_POST['id']) && ($_POST['value'])) {
	require_once '../core/conn.php';
	$pid = $_POST['id'];
	$value = $_POST['value'];
	$query1 = "SELECT * FROM user WHERE pin='$value' AND id='$pid' ";
	$result1 = mysqli_query($con, $query1);
	if (mysqli_num_rows($result1) == 1) {
		$response['status'] = '500';
		$response['title'] = 'sucessfull';
		$response['message'] = 'contine';
	} else {
		$response['status'] = '0';
		$response['titile'] = 'failed';
		$response['message'] = 'incorrect password';
	}
	echo json_encode($response);
}
?>