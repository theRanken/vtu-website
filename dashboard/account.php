<?php
session_start();
if (isset($_SESSION['name'])) {
	require_once '../core/conn.php';
	$sql = mysqli_query($con, "SELECT * FROM user WHERE id = {$_SESSION['id']}");
	if (mysqli_num_rows($sql) > 0) {
		$row = mysqli_fetch_assoc($sql);
	}
	$das = "9";
?>
<?php include '../includes/header.php'; ?>
	<div class="main-panel ">
		<div style="padding-top:120px;margin-bottom:90px;">
			<a href="setting.php" class="btn btn-info "><i class="fa fa-pencil" aria-hidden="true"
					style='padding-right:10px;font-size:20px;color:white; '></i>Update</a>
			<div class="box card-4">
				<table class='table table-all'>
					<tbody>
						<tr>
							<td><b>Username</b></td>
							<td>
								<?php echo $row['username']; ?>
							</td>
						</tr>
						<tr>
							<td><b>Phone Number</b></td>
							<td>
								<?php echo $row['phone']; ?>
							</td>
						</tr>
						<tr>
							<td><b>Email</b></td>
							<td>
								<?php echo $row['email']; ?>
							</td>
						</tr>
						<?php
						$msg = "";
						$username = $row['username'];
						$query = "SELECT * FROM kyc WHERE username='$username'";
						$result = mysqli_query($con, $query);
						if (mysqli_num_rows($result) == 0) {
							$msg = "<div>You have not added your account details <a href='kyc.php'>Click Here To Add Your Account Details</a></div>";
						}
						?>
						<?php
						while ($use = mysqli_fetch_array($result)) {
							$id = $use['id'];
							$bank = $use['bank'];
							$accountnumber = $use['number'];
							?>
							<tr>
								<td><b>Bank Name</b></td>
								<td>
									<?= $bank; ?>
								</td>
							</tr>
							<tr>
								<td><b>Account Number</b></td>
								<td>
									<?= $accountnumber; ?>
								</td>
							</tr>
							<tr>
								<td><b>Account Name</b></td>
								<td>
									<?= $use['name']; ?>
								</td>
							</tr>
							<?php
						}
						?>
						<div class="alas">
							<center><b>
									<?= $msg ?>
								</b></center>
							<div>
				</table>
				<!--<a  href="/airtime_create/"  class="w3-button  w3-teal w3-round w3-right "  onclick = "document.getElementById('subscribe').style.display='block' "  style=' border-radius:0  0 20px 20px; '>Proceed</a>
		  -->
			</div>
		</div>
	</div>
	</div>
	</div>
	</div>
	<?php require_once '../includes/footer.php'; ?>
	</body>

	</html>
	<?php
} else {
	echo "<script>document.location.href='logout.php'; </script>";
	exit;
}
?>

</html>