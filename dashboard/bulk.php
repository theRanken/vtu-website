<?php
session_start();
if (isset($_SESSION['name'])) {
  require_once '../core/conn.php';
  require_once '../core/api.php';
  $da = "";
  $msg = "";
  $user = $_SESSION['id'];
  $sql = mysqli_query($con, "SELECT * FROM user WHERE id ='$user' ");
  if(mysqli_num_rows($sql) > 0) $row = mysqli_fetch_assoc($sql);
  $bal = $row['bal'];
  $apikey = $row['apikey'];
  $chek = mysqli_query($con, "SELECT * FROM pay");
  $pdata = mysqli_fetch_array($chek);
  $min = $pdata['min'];
  $refbal = $row['refbal'];
  ?>
<?php include '../includes/header.php'; ?>
<!-- End Sidebar -->
<div class="main-panel px-xl-5 mx-auto">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="static/ogbam/form.css">
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

    #process {
        display: none;
    }

    /*--thank you pop starts here-*/
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
    <div style="padding:90px 15px 20px 15px">
        <div class="outputc" id="outputc"></div>
    </div>
    <h2 class="w3-center">BulkSms</h2>
    <div class="box w3-card-4 mx-2 mx-xl-5 px-3 px-xl-5 py-5">
        <form method='post' id="dataform">
            <div class="row">
                <div class="col-sm-8">
                    <input type="hidden" name="csrfmiddlewaretoken"
                        value="3jjCkSBjujnR7RGjEe19cUcAXcUjAZQmzmb7O5NsXpoUltXy6RDHB7ndoZDp2lM1" />
                    <div id="div_id_sendername" class="form-group">
                        <label for="id_sendername" class=" requiredField">
                            From [Sendername]: <span class="asteriskField">*</span>
                        </label>
                        <div class="">
                            <input type="text" name="sendername" maxlength="12" class="textinput textInput form-control"
                                required id="id_sendername">
                        </div>
                    </div>
                    <div id="div_id_to" class="form-group">
                        <label for="id_to" class=" requiredField">
                            To [Recipients]: <span class="asteriskField">*</span>
                        </label>
                        <div class="">
                            <textarea name="to" cols="1" rows="4" maxlength="4000" class="textarea form-control"
                                required id="id_to"></textarea>
                            <small id="hint_id_to" class="form-text text-muted">
                                Type or Paste up to 10,000 phone numbers here
                                (080... or 23480...) separate with comma ,NO SPACES!
                            </small>
                        </div>
                    </div>
                    <div id="div_id_message" class="form-group">
                        <label for="id_message" class=" requiredField">
                            Message<span class="asteriskField">*</span>
                        </label>
                        <div class="">
                            <textarea name="message" cols="1" rows="4" maxlength="4000" class="textarea form-control"
                                required id="id_message"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <div id="div_id_DND" class="form-check">
                            <input type="checkbox" name="DND" class="checkboxinput form-check-input" id="id_DND">
                            <label for="id_DND" class="form-check-label" style="width:inherit;">
                                Select this to ensure delivery to
                                DND numbers at 2 units per number.
                            </label>
                        </div>
                    </div>
                    <input type="hidden" name="sessionId" value="<?php echo $apikey ?>" />
                    <button type="submit" name="submit" value="Continue to Funding"
                        class="logo-header btn bg-secondary-gradient"
                        style="color:white;font-size: 19px;font-weight: bold;margin-right: -70px;  margin-left: auto; margin-right: auto;width: 8em">
                        Proceed
                    </button>
                </div>
                <div class="col-sm-4  ">
                    <h2> ₦3.5 per unit </h2>
                </div>
            </div>
        </form>
    </div>
    <script>
    const bulkForm = document.getElementById('dataform');

    function getRecipients() {
        const recipients = document.getElementById("id_to");
        let numbers = recipients.value.trim().split(',');
        return Array.from(numbers).map(item=>item.trim());
    }
    bulkForm.addEventListener('submit', (e) => {
        e.preventDefault();

        const bulkFormData = new FormData();
        bulkFormData.append("sender", e.target.sendername.value);
        bulkFormData.append("recipients", e.target.id_to.value.trim());
        bulkFormData.append("message", e.target.message.value);
        bulkFormData.append("dndMode", e.target.DND.checked);
        

        fetch('/api/bulk-sms/', {
            method : "POST",
            headers : {
                "Authorization" : `Token ${e.target.sessionId.value}`
            },
            body : bulkFormData
        })
        .then(response => {
            if(response.ok){
                return response.text();
            }
            Promise.reject(response);
        })
        .then(data=>{
            swal()
        })
        .catch(err => {
           return swal({
                title: "We're sorry an error occurred",
                text: `${err}`,
                icon: "error",
                buttons: true,
            }).then(data=>{location.href = location.href});
        })
    });
    </script>
</div>
</div>
</div>
</div>
<?php include '../includes/footer.php'; ?>
<?php if ($min > $bal) { ?>
?>
<script>
$(document).ready(function() {
    swal({
        text: "<?php echo $row['name']; ?>, Wallet below minimum vending amount ₦<?php echo $row['bal']; ?>",
        icon: "info",
        button: "ok",
        timer: 60000,
    }).then(() => {
        window.location = "index.php"
    });
});
</script>
<?php } else { ?>
<?php
    exit;
  }
  ?>
</body>
<?php
} else {
  echo "<script>document.location.href='logout.php'; </script>";
  exit;
}
?>