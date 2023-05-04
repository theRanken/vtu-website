<?php
require_once '../core/conn.php';
header('Content-type: application/json; charset=UTF-8');

$response = array();
if (isset($_POST['amount']) && ($_POST['username'])) {
	require_once '../core/conn.php';
	$amount = $_POST['amount'];
	$username = $_POST['username'];
	date_default_timezone_set('Africa/Lagos');
	$date = date("l j<\s\up>S</\s\up>, F Y @ g:iA");
	$res = mysqli_query($con, "SELECT * FROM user WHERE username='$username' ");
	$chek = mysqli_query($con, "SELECT * FROM user WHERE username='$username' ");
	$frnd = mysqli_fetch_assoc($chek);
	$bal = $frnd['bal'];
	$email = $frnd['email'];
	$name = $frnd['name'];
	$fund = $bal - $amount;
	$res = mysqli_query($con, "SELECT * FROM user WHERE username='$username'");
	if (mysqli_num_rows($res) == 0) {
		$response['title'] = 'Unknown account';
		$response['status'] = 'warning';
		$response['message'] = 'Sorry account does not exist!';
		$response['code'] = 400;
	} else if ($bal < $amount) {

		$response['title'] = 'Opps';
		$response['status'] = 'warning';
		$response['message'] = 'Insufficient balance! current balance is ₦' . $bal;
		$response['code'] = 400;
	} else {
		$add = mysqli_query($con, "UPDATE user SET bal='$fund' WHERE username='$username'") or die(mysqli_error($con));
		if ($add) {
			$response['title'] = 'successful';
			$response['status'] = '500';
			$response['message'] = $username . ' has been debited ₦' . $amount;
			$response['code'] = 200;
			require_once 'debitmail.php';
		} else {
			$response['title'] = 'Fail';
			$response['status'] = 'warning';
			$response['message'] = 'something occur please try agian later';
			$response['code'] = 500;
		}
	}

	echo json_encode($response);
}