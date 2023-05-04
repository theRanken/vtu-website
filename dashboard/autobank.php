<?php
session_start();
if (isset($_SESSION['name'])) {
  require_once '../core/conn.php';
  $sql = mysqli_query($con, "SELECT * FROM user WHERE id = {$_SESSION['id']}");
  if
  (mysqli_num_rows($sql) > 0) {
    $row = mysqli_fetch_assoc($sql);
  }
  $username = $row['username'];
  $aemail = $web['email'];
  $msgs = "";
  $sql = mysqli_query($con, "SELECT * FROM  mail");
  if
  (mysqli_num_rows($sql) > 0) {
    $mail = mysqli_fetch_assoc($sql);
  }
  $footer = $web['footer'];
  $bal = $row['bal'];
  $email = $row['email'];
  $username = $row['username'];
  $musername = $mail['username'];
  $mpassword = $mail['password'];
  $hosts = $mail['host'];
  $sender = $mail['sender'];
  $das = "7";
  $msg = "";
  ?>
  <?php
  if (isset($_POST['verify'])) {
    $name = $_POST['name'];
    $bankname = $_POST['bankname'];
    $number = $_POST['number'];
    $amount = $_POST['amount'];
    $status = "0";
    date_default_timezone_set('Africa/Lagos');
    $date = date("l j<\s\up>S</\s\up>, F Y @ g:iA");
    $sub = mysqli_query($con, "SELECT * FROM bankpayment WHERE name='$name' AND bankname='$bankname' AND amount='$amount'  AND status='$status' AND username='$username' ");
    if (empty($name)) {
      $msg = '<div class="alert alert-warning"><button type="button" class="close" data-dismiss="alert">×</button><strong>Please input the ful name</strong></div>';
    } elseif ($number < 10) {
      $msg = '<div class="alert alert-warning"><button type="button" class="close" data-dismiss="alert">×</button><strong>incorrect account number</strong></div>';
    } elseif (empty($amount)) {
      $msg = '<div class="alert alert-warning"><button type="button" class="close" data-dismiss="alert">×</button><strong>please input the amount </strong></div>';
    } elseif (mysqli_num_rows($sub) == 1) {
      $msg = '<div class="alert alert-warning"><button type="button" class="close" data-dismiss="alert">×</button><strong> You have already submitted a transaction request with these details previously. 
        <br> Please be patient as your transaction request is under review, <br>you be contacted very soon <b>if approved.</b> </strong>';
    } else {
      $query = mysqli_query($con, "INSERT INTO bankpayment (username,bankname,name,amount,number,status,date) VALUES('$username','$bankname','$name','$amount','$number','$status','$date') ");
      $msg = '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">×</button><strong>Bank Payment upload you shall recieve response if the details are correct.</strong></div>';
      @require "../Mail/phpmailer/PHPMailerAutoload.php";
      require_once "../core/notice.php";
      $mail = new PHPMailer();
      $mail->CharSet = "UTF-8";
      $mail->IsSMTP();
      $mail->SMTPAuth = true;
      $mail->SMTPSecure = "ssl";
      $mail->Host = "$hosts";
      $mail->Port = 465;
      $mail->Username = "$musername";
      $mail->Password = "$mpassword";
      $mail->IsHTML(true);
      $mail->setFrom("$sender");
      $mail->addAddress("$aemail");
      $mail->isHTML(true);
      $mail->Subject = "Bank Payment";
      $mail->Body = $temp;
      if (!$mail->send()) {
        if (!$mail->send()) {
          //I left this blank because i don't want anything to pop out on the ui again
          //echo "<script> alert('error sending email mysqli_error($mail)');</script>";
        } else {
          //I left this blank because i don't want anything to pop out on the ui again
          // echo "<script> alert('email was sent');</script>";
        }
        ;
      }
    }
  }
  ?>
  <?php include '../includes/header.php'; ?>
  <!-- End Sidebar -->
  <div class="main-panel ">
    <div style="padding-top:120px;margin-bottom:90px;">
      <a href="" data-toggle="modal" data-target="#verifyme"><button class="btn btn-info "><i class="fa fa-pencil"
            aria-hidden="true" style='padding-right:10px;font-size:20px;color:white; '></i>Verify Payment</button></a>
      <center>After Payment Make Sure You Click on the <b>Verify Payment</b> to Verify the Bank Transaction</center>
      <div class="box card-4">
        <div class="alas">
          <center><b>
              <?= $msg ?>
            </b></center>
          <table class='table table-all'>
            <tbody>
              <?php
              $msg = "";
              $query = "SELECT * FROM bank";
              $result = mysqli_query($con, $query);
              if (mysqli_num_rows($result) == 0) {
                $msg = "<div>we have not added our account detials yet</div>";
              }
              ?>
              <?php
              while ($use = mysqli_fetch_array($result)) {
                $number = $use['number'];
                $name = $use['name'];
                $bankname = $use['bankname'];
                ?>
                <tr>
                  <td><b>Bank Name</b></td>
                  <td>
                    <?php echo $bankname; ?>
                  </td>
                </tr>
                <tr>
                  <td><b>Account Number</b></td>
                  <td>
                    <?php echo $number; ?>
                  </td>
                </tr>
                <tr>
                  <td><b>Account Name</b></td>
                  <td>
                    <?php echo $name; ?>
                  </td>
                </tr>
                <div>
            </table>
            <?php
              }
              ?>
        </div>
      </div>
    </div>
    <div class="modal fade" id="verifyme" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
      aria-hidden="true">
      <div class="modal-dialog" role="document">
        <form class="refreshFrm" id="addFeebacks" method="post">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">
                <center>Verify Your Payment</center>
              </h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="col-md-12">
                <div class="form-group">
                  <label for="email"><b>Account Name Sent From</b></label>
                  <input type="text" placeholder="Enter the account name" name="name"
                    class="textinput textInput form-control" required>
                  <label for="psw"><b>Bank Name</b></label>
                  <input type="text" placeholder="Enter bank name" name="bankname"
                    class="textinput textInput form-control" required>
                  <label for="psw"><b>Account Number Sent From</b></label>
                  <input type="text" placeholder="Enter account number" name="number"
                    class="textinput textInput form-control" required>
                  <label for="psw"><b>Amount Deposited</b></label>
                  <input type="text" placeholder="Enter amount deposited" name="amount"
                    class="textinput textInput form-control" required>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" name="verify" class="btn btn-primary">Verify Now</button>
              </div>
            </div>
        </form>
      </div>
    </div>
    <style>
      body {
        font-family: Arial, Helvetica, sans-serif;
      }

      * {
        box-sizing: border-box;
      }

      /* Button used to open the contact form - fixed at the bottom of the page */
      .open-button {
        background-color: #555;
        color: white;
        padding: 16px 20px;
        border: none;
        cursor: pointer;
        opacity: 0.8;
        position: fixed;
        bottom: 23px;
        right: 28px;
        width: 280px;
      }

      /* The popup form - hidden by default */
      .form-popup {
        display: none;
        position: fixed;
        bottom: 0;
        right: 15px;
        border: 3px solid #f1f1f1;
        z-index: 9;
      }

      /* Add styles to the form container */
      .form-container {
        max-width: 300px;
        padding: 10px;
        background-color: white;
      }

      /* Full-width input fields */
      .form-container input[type=text],
      .form-container input[type=password] {
        width: 100%;
        padding: 15px;
        margin: 5px 0 22px 0;
        border: none;
        background: #f1f1f1;
      }

      /* When the inputs get focus, do something */
      .form-container input[type=text]:focus,
      .form-container input[type=password]:focus {
        background-color: #ddd;
        outline: none;
      }

      /* Set a style for the submit/login button */
      .form-container .btn {
        background-color: #04AA6D;
        color: white;
        padding: 16px 20px;
        border: none;
        cursor: pointer;
        width: 100%;
        margin-bottom: 10px;
        opacity: 0.8;
      }

      /* Add a red background color to the cancel button */
      .form-container .cancel {
        background-color: red;
      }

      /* Add some hover effects to buttons */
      .form-container .btn:hover,
      .open-button:hover {
        opacity: 1;
      }
    </style>
    <script>
      function openForm() {
        document.getElementById("myForm").style.display = "block";
      }
      function closeForm() {
        document.getElementById("myForm").style.display = "none";
      }
    </script>
    <!-- GetButton.io widget -->
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