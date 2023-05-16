<?php
session_start();
if (!isset($_SESSION['name'])) {
  echo "<script>document.location.href='logout.php'; </script>";
  exit;
}

require_once '../core/conn.php';
require_once '../core/api.php';

$das = "";
$aemail = $web['email'];

$sql = mysqli_query($con, "SELECT * FROM user WHERE id = {$_SESSION['id']}");
if (mysqli_num_rows($sql) > 0) {
  $row = mysqli_fetch_assoc($sql);
}

$username = $row['username'];
$msg = "";

$sql = mysqli_query($con, "SELECT * FROM mail");
if (mysqli_num_rows($sql) > 0) {
  $mail = mysqli_fetch_assoc($sql);
}
?>
<?php include '../includes/header.php'; ?>
<div class="main-panel">
  <div class="row justify-content-end bg-secondary text-white" style="padding-top:0px;padding-right:10px;margin-top:0px;">
    <a class="btn btn-primary" href="coupon.php">
      <span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span>
      New Coupon Codes
    </a>
  </div>
  <div style="margin-bottom: 20px;"></div>

  <table width="100%" class="table bg-light table-responsive  table-bordered table-hover" id="dataTables-example" style="font-size:13px;">
    <thead>
      <tr>
        <th>No.</th>
        <th>Username</th>
        <th>Email</th>
        <th>Phone</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $query = "SELECT * FROM user WHERE ref='$username'";
      $result = mysqli_query($con, $query);
      $nu = 1;

      if (mysqli_num_rows($result) == 0) {
        echo "<script>alert('You have not referred anyone yet'); window.location.href='index.php';</script>";
      }

      while ($use = mysqli_fetch_array($result)) {
        $id = $use['id'];
        $username = $use['username'];
        $email = $use['email'];
        $phone = $use['phone'];
      ?>

        <tr>
          <td><?php echo htmlentities($nu) . '.'; ?></td>
          <td><?= $username; ?></td>
          <td><?= $email; ?></td>
          <td><?= $phone; ?></td>
        </tr>

      <?php
        $nu++;
      }
      ?>
    </tbody>
  </table>
</div>
<?php include '../includes/footer.php'; ?>
</body>

</html>