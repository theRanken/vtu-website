<?php
session_start();
if (isset($_SESSION['name'])) {
  require_once "../core/conn.php";
  require_once '../core/api.php';
  $querysite = $con->query("SELECT * FROM pay");
  $setup = $querysite->fetch_array();
  $min = $setup['min'];
  $user = $_SESSION['id'];
  $sql = mysqli_query($con, "SELECT * FROM user WHERE id = '$user' ");
  if (mysqli_num_rows($sql) > 0) {
    $row = mysqli_fetch_assoc($sql);
  }
  $bal = $row['bal'];
  $msg = "";
  $sql = mysqli_query($con, "SELECT * FROM  mail");
  if (mysqli_num_rows($sql) > 0) {
    $mail = mysqli_fetch_assoc($sql);
  }
  $checkpin = $row['pin'];
  $bal = $row['bal'];
  $email = $row['email'];
  $username = $row['username'];
  $xname = $row['name'];
  $token = $row['apikey'];

  ?>
  <?php include '../includes/header.php'; ?>
  <div class="main-panel ">
    <link rel="stylesheet" href="/static/ogbam/form.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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

      .process {
        display: none;
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
      #div_id_customer_name {
        display: none;
      }
    </style>
    <div style="padding:90px 15px 20px 15px">
      <h2 class="w3-center"><b>Cable Subscription Payment/Renewal</b></h2>
      <div class="box w3-card-4">
        <form method="post" id='cableform' data-plans-url="/ajax/load_plans/" novalidate></form>
        <div class="row">
          <div class="col-sm-8 order-first">
            <input type="hidden" name="csrfmiddlewaretoken"
              value="3xARRCcMRCTPy8hmt5szlVav6o9qgV7KDDkhDDq41x2lOyPi6kD9MmOU22QNEJfo">
            <div id="div_id_cablename" class="form-group">
              <label for="id_cablename" class=" requiredField">Cable Service<span class="asteriskField">*</span></label>
              <div class="">
                <select name="cablename" class="select form-control" required id="id_cablename">
                  <option value="" selected>-----Select Cable Service-----</option>
                  <option value="gotv">GOTV</option>
                  <option value="dstv">DSTV</option>
                  <option value="startimes">STARTIME</option>
                </select>
              </div>
            </div>
            <div id="div_id_smart_card_number" class="form-group">
              <label for="id_smart_card_number" class=" requiredField">
                SmartCard / Decoder / IUC number<span class="asteriskField">*</span>
              </label>
              <div class="">
                <input type="text" name="smart_card_number" maxlength="15" minlength="5"
                  class="textinput textInput form-control" required id="id_smart_card_number">
              </div>
              <div id="iuc-error" style="display:none; color:red;">this number must be 10 or 11 digits</div>
            </div>
            <div id="div_id_cableplan" class="form-group">
              <label for="id_cableplan" class=" requiredField">
                Cable Subscription Plan<span class="asteriskField">*</span>
              </label>
              <div class="">
                <select name="cableplan" class="select form-control" required id="id_cableplan">
                  <option value="" selected>---------</option>
                </select>
              </div>
            </div>
            <div id="div_id_customer_name" class="form-group">
              <label for="id_customer_name" class="">
                Customer name
              </label>
              <div class="">
                <input type="text" name="customer_name" maxlength="70" class="textinput textInput form-control"
                  id="id_customer_name">
              </div>
            </div>
            <div id="div_id_customer_phone" class="form-group" style="display:none;">
              <label for="id_customer_phone" class="">
                Customer phone
              </label>
              <div class="">
                <input type="text" name="customer_phone" maxlength="70" class="textinput textInput form-control"
                  id="id_customer_phone">
              </div>
            </div>
            <p class="control" id="charge-control">N3.0 Charge</p>
            <input type="hidden" value="3.0" id="charge"/>
            <!-- <label><b>Customer Name</b></label>
                <p class="control" id="name"> </p> -->
            <input type="hidden" id="csrf-id" value="<?php echo $token ?>"/>
            <input type="hidden" id="session-id" value="<?php echo $user ?>" />
            <button type="button" id="purchaseBtn" class="btn" style='margin-bottom:15px; display:none;'>
              Purchase subscription
            </button>
          </div>
          <div class="col-sm-4  order-last">
            <p style="font-size:20px;">
              You can contact DSTV/GOtv's customers care unit on 01-2703232/08039003788 or the toll
              free lines: 08149860333, 07080630333, and 09090630333 for assistance, STARTIMES's customers care unit on
              (094618888, 014618888)
            </p>
          </div>
        </div>
        </form>
      </div>
    </div>
  </div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
  <script>
    function validateSmartOrIUC(number, cable) {
      $.ajax({
        type: 'GET',
        beforeSend: function () {
          $.LoadingOverlay("show");
        },
        url: '/api/cable/validate-iuc/',
        data: {
          'iuc': number,
          'biller': cable
        },
        dataType: 'json',
        success: function (data, status) {
          if (status == "success" && data.Customer_Name) {
            $("#div_id_customer_name").css("display", "block");
            $("#div_id_customer_phone").css("display", "block");
            $('#validateiuc').hide();
            $("#id_customer_name").val(data.Customer_Name);
            document.getElementById("id_customer_name").disabled = true;
            //$("#name").css("display", "block");
            //$("#name").text(data.name);
            console.log(data);

            $(".process").css("display", "block");
            $("#purchaseBtn").css("display", "block");
          } else {
            swal({
              title: "Error",
              text: "invalid smartcard number!",
              icon: "error",
            });
          }
        },
        complete: function () {
          $.LoadingOverlay("hide");
          $('#process').css("display", "none");
          $('#displaytext').css("display", "block");
        },
      });
    }
    $("#id_cablename").change(function () {
      let cablenameId = $(this).val(); // get the selected country ID from the HTML input
      const url = "/api/cable/?service=" + cablenameId; // get the url of the `load_cities` view
      $.get(url,
        function (data, status) {
          if (status === "error") {
            swal({
              title: "Sorry!",
              text: "failed to load plans",
              icon: "info",
            })
          } else {
            $("#id_cableplan").empty();
            $("#id_cableplan").append(new Option("-----Select Package-----"));
            for (let i = 0; i < data.length; i++) {
              $("#id_cableplan").append(new Option(data[i].name, data[i].variation_code, i === 0));
            }
          }
        }, "json");
      $.get(`/api/cable/charges.php?service=${cablenameId}`, function (data, status) {
        if (status === "error") {
          $("#charge-control").html("₦3.0 Charge");
          $("#charge").val(3.0);
        } else {
          $("#charge-control").html(`₦${data} charge`);
          $("#charge").val(data);
        }

      })
    });
    $("#id_smart_card_number").on({
      keyup: function () {
        let smartCardNumber = $(this).val();
        let cableName = $("#id_cablename option:selected").val();
        let cablePlan = $("#id_cableplan option:selected").val();

        let check = setTimeout(() => {
          // Must not be empty
          if (cablePlan == "" || cableName == "") $("#iuc-error").css("display", "block");
          // validate either startimes or gotv
          if (smartCardNumber.length == 11) {//startimes
            validateSmartOrIUC(smartCardNumber, "startimes");
            $("#iuc-error").css("display", "none");
          } else if (smartCardNumber.length == 10) {//Gotv or Dstv
            validateSmartOrIUC(smartCardNumber, cableName);
            $("#iuc-error").css("display", "none");
          }
        }, 800)

      }
    })
  </script>
  <!-- exising validate -->
  <script>
    $('#purchaseBtn').click(function () {
      let iuc = $("#id_smart_card_number").val();
      let cablenameText = $("#id_cablename option:selected").text();
      let id_cableplan = $("#id_cableplan option:selected").text();
      let customerName = $("#id_customer_name").val();
      let customerPhone = $("#id_customer_phone").val();
      let url = "/api/cable/purchase/";
      let cableplan = $("#id_cableplan").val();
      let cablename = $("#id_cablename ").val();
      let smart_card_number = $("#id_smart_card_number").val();
      let cableplantext = $("#id_cableplan option:selected").text();
      let id_cablenametext = $("#id_cablename option:selected").text();
      let smart_card_numbertext = $("#id_smart_card_number").val();
      let service_charge = $("#charge").val();
      swal({
        title: "Are you sure?",
        text: "You are about to subscribe " + cablenameText + " (" + id_cableplan + ")" + " for " + customerName + " - " + iuc,
        icon: "info",
        buttons: true,
        dangerMode: true,
      })
        .then((willDelete) => {
          if (willDelete) {
            swal("Enter your pin:", {
              content: "input",
            }).then((value) => {
                //first ajax function starts here
                $.ajax({
                  type: 'GET',
                  beforeSend: function () {
                    $.LoadingOverlay("show");
                  },
                  url: "/api/checkpin.php?pin=" + value + "&user=" + $("#session-id").val(),
                  async:false,
                  success: function () {
                    //second ajax function starts here
                    $.ajax({
                      type: 'POST',
                      beforeSend: () => $.LoadingOverlay("show"),
                      url: '/api/cable/purchase/',
                      headers: {
                        "Authorization": "Token " + $("#csrf-id").val()
                      },
                      data: {
                      "service": cablename,
                      "plan": cableplan,
                      "iuc": smart_card_number,
                      "recipient": customerName,
                      "phone": customerPhone,
                      "service_charge" : service_charge
                    },
                      success: function (data) {
                        //$('#successModal').modal()
                        swal({
                          title: "Transaction Successful!",
                          text: "you successfully recharged",
                          icon: "success",
                          button: "View Reciept!",
                        });
                        //
                        $('.swal-button--confirm').click(function () {
                          $.ajax({
                            beforeSend: () => $.LoadingOverlay("show"),
                            success: window.location.href = `/cable-receipt/${data.id}`
                          });
                        });
                      },
                      error: function (XMLHttpRequest, textStatus, errorThrown) {
                        $.LoadingOverlay("hide");
                        console.log(errorThrown)
                        if (String(JSON.parse(XMLHttpRequest.status)) == 500) {
                          swal("Oops!", "Something went wrong please contact admin ", "error")
                        } else if (JSON.parse(XMLHttpRequest.responseText).error) {
                          swal("Oops!", String(JSON.parse(XMLHttpRequest.responseText).error), "error")
                        } else {
                          swal("Oops!", String(XMLHttpRequest.responseText), "error")
                        }
                      },
                      complete: () => $.LoadingOverlay("hide")
                    });
                    //second ajax function ends here
                  },
                  error: function (XMLHttpRequest, textStatus, errorThrown) {
                    $.LoadingOverlay("hide");
                    console.log(errorThrown)
                    if (String(JSON.parse(XMLHttpRequest.status)) == 500) {
                      swal("Oops!", "Something went wrong please contact admin ", "error")
                    } else if (JSON.parse(XMLHttpRequest.responseText).error) {
                      swal("Oops!", String(JSON.parse(XMLHttpRequest.responseText).error), "error")
                    } else {
                      swal("Oops!", String(XMLHttpRequest.responseText), "error")
                    }
                  },
                  complete: () => $.LoadingOverlay("hide")
                });
                //first ajax function ends here
              });
          } else {
            swal("You pressed cancel");
          }
        });
    });
  </script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.22/pdfmake.min.js"></script>
  <script type="text/javascript"
    src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>
  <script type="text/javascript">
    const printBtn = document.getElementById('btnPrint');
    printBtn?.addEventListener('click', Export);

    function Export() {
      html2canvas(document.getElementById('receipt'), {
        onrendered: function (canvas) {
          var data = canvas.toDataURL();
          var docDefinition = {
            content: [{
              image: data,
              width: 500
            }]
          };
          pdfMake.createPdf(docDefinition).download("cablesubreceipt.pdf");
        }
      });
    }
  </script>
  </div>
  </div>
  </div>
  <!-- GetButton.io widget -->
  <?php require_once '../includes/footer.php'; ?>
  <?php
  if ($checkpin == ' ') {
    echo `<script>
      $(document).ready(function() {
        swal({
          text: "$xname, you have not create a transaction pin please create a transaction pin",
          icon: 'info',
          button: 'ok',
          timer: 60000,
        }).then(() => {
          window.location = 'newpin.php'
        });
      });
    </script>`;
  } else {
    exit;
  }

  if ($bal < $min) {
    echo `<script>
      $(document).ready(function() {
        swal({
          text: "$xname Wallet Balance ($bal) below minimum vending amount ",
          icon: "info",
          button: "ok",
          timer: 60000,
        }).then(() => {
          window.location = "index.php"
        });
      });
    </script>`;
  } else {
    exit;
  }

} else {
  echo "<script>document.location.href='logout.php'; </script>";
  exit;
}

?>