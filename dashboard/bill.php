<?php
session_start();
if (isset($_SESSION['name'])) {
  require_once '../core/conn.php';
  require_once '../core/api.php';
  $das = "6";
  $aemail = $web['email'];
  $user = $_SESSION['id'];
  $sql = mysqli_query($con, "SELECT * FROM user WHERE id = '$user' ");
  if(mysqli_num_rows($sql) > 0) $row = mysqli_fetch_assoc($sql);
  $bal = $row['bal'];
  $checkpin = $row['pin'];
  if ($checkpin == '') {
    echo "<script>
alert('you have not create a pin please create a transaction pin');
window.location.href='newpin.php';</script>";
  }
  ?>
  <?php
  if (isset($_POST['submit'])) {
    ?>
    <script>
      alert("Our Developers are working on it. please check back later");
    </script>
    <?php
  }
  ?>
  <?php include '../includes/header.php'; ?>
  <!-- End Sidebar -->
  <div class="main-panel ">
    <link rel="stylesheet" href="/static/ogbam/form.css">
    <style>
      .control {
        display: block;
        width: 100%;
        height: calc(2.25rem + 2px);
        padding: .375rem .75rem;
        font-size: 1rem;
        font-weight: 400;
        line-height: 1.5;
        color: #495057;
        background-color: #fff;
        background-clip: padding-box;
        border: 1px solid #ced4da;
        border-radius: .25rem;
        transition: border-color .15s ease-in-out, box-shadow .15s ease-in-out;
      }

      .process,
      #div_id_customer_address,
      #div_id_customer_name {
        display: none;
        pointer-events: none;
      }

      #name {
        display: none;
      }

      #process,
      #process2 {
        display: none;
      }

      /*--thank you pop starts here--*/
      .thank-you-pop {
        width: 100%;
        padding: 20px;
        text-align: center;
      }

      .thank-you-pop img {
        width: 76px;
        height: auto;
        margin: 0 auto;
        display: block;
        margin-bottom: 25px;
      }

      .thank-you-pop h1 {
        font-size: 42px;
        margin-bottom: 25px;
        color: #5C5C5C;
      }

      .thank-you-pop p {
        font-size: 20px;
        margin-bottom: 27px;
        color: #5C5C5C;
      }

      .thank-you-pop h3.cupon-pop {
        font-size: 25px;
        margin-bottom: 40px;
        color: #222;
        display: inline-block;
        text-align: center;
        padding: 10px 20px;
        border: 2px dashed #222;
        clear: both;
        font-weight: normal;
      }

      .thank-you-pop h3.cupon-pop span {
        color: #03A9F4;
      }

      .thank-you-pop a {
        display: inline-block;
        margin: 0 auto;
        padding: 9px 20px;
        color: #fff;
        text-transform: uppercase;
        font-size: 14px;
        background-color: #8BC34A;
        border-radius: 17px;
      }

      .thank-you-pop a i {
        margin-right: 5px;
        color: #fff;
      }

      #ignismyModal .modal-header {
        border: 0px;
      }

      /*--thank you pop ends here--*/
    </style>
    <script>
      window.addEventListener("offline", function(){
        Swal.fire("Network Disconnected!");
      })
    </script>
    <div style="padding:90px 15px 20px 15px">
      <h2 class="w3-center">Electricity Bill Payment</h2>
      <div class="box w3-card-4">
        <form method="post" id='billform' name="billform" data-plans-url="/ajax/load_plans/" novalidate>
          <div class="row">
            <div class="col-sm-8">
              <input type="hidden" name="session-id" id="session-id" value="<?php echo $user; ?>" >
              <input type="hidden" name="csrfmiddlewaretoken" value="Jfm4UM5rVpjdJTjzqDurZPMBoxhxTli1TCC5Dn5iJaAJNRmFQRTdVIgNbrde5Cl0">
              <div id="div_id_disco_name" class="form-group">
                <label for="id_disco_name" class=" requiredField">
                  Electricity Distributor Company<span class="asteriskField">*</span>
                </label>
                <div class="">
                  <select name="disco_name" class="select form-control" required id="id_disco_name">
                    <option value="" selected>-----SELECT ELECTRICITY SERVICE-----</option>
                    <option value="ikeja-electric">Ikeja Electric</option>
                    <option value="eko-electric">Eko Electric</option>
                    <option value="abuja-electric">Abuja Electric</option>
                    <option value="kano-electric">Kano Electric</option>
                    <option value="enugu-electric">Enugu Electric</option>
                    <option value="portharcourt-electric">Port Harcourt Electric</option>
                    <option value="ibadan-electric">Ibadan Electric</option>
                    <option value="kaduna-electric">Kaduna Electric</option>
                    <option value="jos-electric">Jos Electric</option>
                    <option value="benin-electric">Benin Electric</option>
                    <option value="yola-electric">Yola Electric</option>
                  </select>
                </div>
              </div>
              <div id="div_id_MeterType" class="form-group">
                <label for="id_MeterType" class=" requiredField">
                  MeterType<span class="asteriskField">*</span>
                </label>
                <div class="">
                  <select name="MeterType" class="select form-control" required id="id_MeterType">
                    <option value="" selected>-----SELECT METER TYPE-----</option>
                    <option value="prepaid">Prepaid</option>
                    <option value="postpaid">Postpaid</option>
                  </select>
                </div>
              </div>
              <div id="div_id_meter_number" class="form-group">
                <label for="id_meter_number" class="">
                  Meter number
                </label>
                <div class="">
                  <input type="text" name="meter_number" maxlength="30" class="textinput textInput form-control"
                    id="id_meter_number">
                </div>
              </div>
              <div id="div_id_customer_name" class="form-group">
                <label for="id_customer_name" class="">
                  Customer name
                </label>
                <div class="">
                  <input type="text" name="customer_name" maxlength="250" class="textinput textInput form-control"
                    id="id_customer_name">
                </div>
              </div>
              <div id="div_id_customer_address" class="form-group">
                <label for="id_customer_address" class="">
                  Customer address
                </label>
                <div class="">
                  <input type="text" name="customer_address" maxlength="500" class="textinput textInput form-control"
                    id="id_customer_address">
                </div>
              </div>
              <div id="div_id_amount" class="form-group">
                <label for="id_amount" class=" requiredField">
                  Amount<span class="asteriskField">*</span>
                </label>
                <div class="">
                  <input type="text" name="amount" maxlength="30" class="textinput textInput form-control" required
                    id="id_amount">
                </div>
              </div>
              <div id="div_id_Customer_Phone" class="form-group">
                <label for="id_Customer_Phone" class=" requiredField">
                  Customer phone<span class="asteriskField">*</span>
                </label>
                <div class="">
                  <input type="text" name="Customer_Phone" maxlength="11" minlength="11"
                    class="textinput textInput form-control" required id="id_Customer_Phone">
                  <small id="hint_id_Customer_Phone" class="form-text text-muted">customer phone number</small>
                </div>
              </div>
              <p class="control">0.1 Percent Discount </p>
              <button type="submit" class=" btn" name="submit"
                style='background-image: linear-gradient(-20deg, orange 0%, orange 100%);margin-bottom:15px;'> Submit
                Order </button>
        </form>
      </div>
      <div class="col-sm-4 ">
      </div>
    </div>
  </div>
  </div>
  </div>
  <script src="./javascript/electricity-bill.js"></script>
  <?php include '../includes/footer.php'; ?>
  <?php if ($min > $bal) { ?>
    ?>
    <script>
      $(document).ready(function () {
        swal({
          text: "<?php echo $row['name']; ?> Wallet below minimum vending amount ₦<?php echo $row['bal']; ?>",
          icon: "info",
          button: "ok",
          timer: 60000,
        }).then(() => {
          window.location = "index.php"
        });
      });
    </script>
  <?php
  } else {
    exit;
  }
  ?>
  </body>
  </html>
  <?php
} else {
  echo "<script>document.location.href='logout.php'; </script>";
  exit;
}
?>