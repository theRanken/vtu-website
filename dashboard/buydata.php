<?php
session_start();
if (isset($_SESSION['name'])) {
  require_once '../core/conn.php';
  require_once '../core/api.php';
  $das = "3";
  $aemail = $web['email'];

  $sql = mysqli_query($con, "SELECT * FROM user WHERE id = {$_SESSION['id']}");
  if(mysqli_num_rows($sql) > 0) {
    $row = mysqli_fetch_assoc($sql);
  }
  $checkpin = $row['pin'];
  $chek = mysqli_query($con, "SELECT * FROM data_lock");
  $adex = mysqli_fetch_array($chek);
  ?>
  <?php require_once '../includes/header.php'; ?>
  <div class="main-panel ">
    <link rel="stylesheet" href="/static/ogbam/form.css">
    <link rel="stylesheet" href="/static/ogbam/form.css">
    <!-- Latest compiled and minified CSS -->

    <!-- jQuery library -->
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

      #process {
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

    <div style="padding:90px 15px 20px 15px" class="generic">
      <h2 class="w3-center">DATA SUBSCRIPTION</h2>
      <div class="box w3-card-4">
        <form method='POST' id="dataform">
          <div class="row">
            <div class="col-sm-8">
              <br>
              <br>
              <div id="PanelBoard">
                <div id="div_id_network" class="form-group">
                  <label for="network" class=" requiredField">
                    Select Network<span class="asteriskField">*</span>
                  </label>
                  <div class="">
                    <select name="network" class="select form-control" required id="network">
                      <option value="">---------</option>
                      <option value="1" networkname="MTN" <?php if ($adex['mtn_gifting'] == "off" && $adex['mtn_sme'] == "off")
                        echo 'style="display: none;"'; ?>>MTN</option>
                      <option value="2" networkname="AIRTEL" <?php if ($adex['airtel_data'] == "off")
                        echo 'style="display: none;"'; ?>>AIRTEL</option>
                      <option value="3" networkname="GLO" <?php if ($adex['glo_data'] == "off")
                        echo 'style="display: none;"'; ?>>GLO</option>
                      <option value="4" networkname="9MOBILE" <?php if ($adex['9mobile_data'] == "off")
                        echo 'style="display: none;"'; ?>>9MOBILE</option>
                    </select>
                  </div>
                </div>
                <div id="div_id_data_type" class="form-group"></div>
                  <label for="id_data_type" class=" requiredField">
                    Select Data Type<span class="asteriskField">*</span>
                  </label>
                  <div class="">
                    <select name="type" class="select form-control" id="id_data_type">
                      <option value="" selected>--select------</option>
                      <option value="GIFTING" <?php if ($adex['mtn_gifting'] == "off")
                        echo 'style="display: none;"'; ?>>
                        GIFTING DATA</option>
                      <option value="SME" <?php if ($adex['mtn_sme'] == "off")
                        echo 'style="display: none;"'; ?>>SME DATA
                      </option>
                    </select>
                  </div>
                </div>
                <div id="div_id_plan" class="form-group" style="display: none;">
                  <label for="id_plan_number" class=" requiredField">
                    Select Data Plan<span class="asteriskField">*</span>
                  </label>
                  <div class="">
                    <select class="select form-control" name="plan" id="id_plan" required>
                      <option selected>select data</option>
                    </select>
                  </div>
                </div>
                <div id="div_id_phone_number" class="form-group">
                  <label for="id_phone_number" class=" requiredField">
                    Mobile Number<span class="asteriskField">*</span>
                  </label>
                  <div class="">
                    <input type="tel" name="phone" maxlength="11" minlength="11" class="textinput textInput form-control"
                      required id="phone" onkeyup="verifyNetwork()">
                  </div>
                </div>
                <span id="verifyer"></span>
                <div id="div_id_Amount" class="form-group">
                  <label for="id_Amount" class="">
                    Amount
                  </label>

                  <div class="">
                    <input type="text" name="Amount" maxlength="11" minlength="11"
                      class="textinput textInput form-control" id="id_Amount">

                  </div>
                </div>
                <div class="form-group">
                  <div id="div_id_Ported_number" class="form-check">
                    <input type="checkbox" name="Ported_number" class="checkboxinput form-check-input" id="id_Ported_number">
                    <label for="id_Ported_number" class="form-check-label">Bypass number validator</label>
                  </div>
                </div>
                <a href="javascript:void(0)" id="submit"><button type="button" class="btn" style='margin-bottom:15px;'>Proceed</button></a>
              </div>
            </div>
            <div class="col-sm-4 ">
              <br><center><h4>Codes for Data Balance: </h4></center>
              <ul class="list-group">
                <li class="list-group-item list-group-item-warning">MTN [SME] *461*4# </li>
                <li class="list-group-item list-group-item-warning">MTN [Gifting] *131*4# or *460*260# </li>
                <li class="list-group-item list-group-item-dark"> 9phone [Gifting] *228# </li>
                <li class="list-group-item list-group-item-danger"> Airtel *140# </li>
                <li class="list-group-item list-group-item-success"> Glo *127*0#. </li>
              </ul>
            </div>
    
        </form>
      </div>
    </div>
  </div>

          <br><br><br><br><br><br><br><br><br>
          <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
          <script src="adex_developer.js"></script>
          <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
          <script
            src="https://cdn.jsdelivr.net/npm/gasparesganga-jquery-loading-overlay@2.1.7/dist/loadingoverlay.min.js"></script>
          <script>
            $("#network").change(function () {

              var network = $('#network').find(":selected").attr('networkname');
              if (network == "MTN") {

                $("#div_id_plan").css("display", "none");
                $("#div_id_data_type").css("display", "block");

              } else {

                $("#div_id_data_type").css("display", "none");
                $("#div_id_plan").css("display", "block");

              }


            });
          </script>

          <script>
            $("#id_data_type").change(function () {
              var networkd = $("#id_data_type option:selected").val();
              console.log(networkd)

              if (networkd == "SME") {

                $('#id_plan option[plantype="SME"]').css('display', 'block');
                $("#div_id_plan").css("display", "block");
                $('#id_plan option[plantype="GIFTING"]').css('display', 'none');
                $('#id_plan option[plantype="CORPORATE GIFTING"]').css('display', 'none');


              } else if (networkd == "GIFTING") {
                $('#id_plan option[plantype="GIFTING"]').css('display', 'block');
                $("#div_id_plan").css("display", "block");
                $('#id_plan option[plantype="SME"]').css('display', 'none');
                $('#id_plan option[plantype="CORPORATE GIFTING"]').css('display', 'none');

              } else if (networkd == "CORPORATE GIFTING") {
                $('#id_plan option[plantype="CORPORATE GIFTING"]').css('display', 'block');
                $("#div_id_plan").css("display", "block");
                $('#id_plan option[plantype="SME"]').css('display', 'none');
                $('#id_plan option[plantype="GIFTING"]').css('display', 'none');


              } else {

                $("#div_id_plan").css("display", "none");
                $('#id_plan option[plantype="GIFTING"]').css('display', 'block');
                $('#id_plan option[plantype="CORPORATE GIFTING"]').css('display', 'block');

                $('#id_plan option[plantype="SME"]').css('display', 'block');
              }



            });
          </script>

          <!------- get data plan here ------>
          <script>
            $("#network").change(function () {
              network = $('#network').find(":selected").attr('networkname');            // get the selected network name from the HTML input

              $.ajax({
                type: 'POST',
                url: '../assets/getdata.php',
                data: { network: network },
                success: function (result) {
                  $("#id_plan").html(result);

                },
                error: function () { }
              });

            });
          </script>
          <!------ dat all getting the plan -------->

          <!---disable  amount ------->
        <script>
          $("#id_plan").change(function () {
            var amt = $("#id_plan option:selected").val();
            console.log(amt);
            $("#id_Amount").val(String(amt));
            $("#id_Amount").prop('disabled', true);
          });
        </script>
        <!-----buy the data here ----->


        <script>
          $("#submit").click(function () {
            var mobile = $("#phone").val();
            var networkid = $("#network").find(":selected").val();
            var plan = $('#div_id_plan').find(":selected").attr('data');
            var planid = $('#div_id_plan').find(":selected").attr('planid');
            var type = $('#div_id_data_type').find(":selected").val();
            var ported_number = $('#id_Ported_number').is(":checked");
            var token = "<?php echo base64_encode($row['apikey']); ?>";
            var url = "/api/data";
            var key = atob(token);
            if (mobile == " " || networkid == "" || network == "" || planid == " " || plan == " ") {

              swal("Opps", "Please kidnly fill all the form", "error")

              return false;
            }
            else if (mobile.length < "11") {
              swal("Opps", "The phone number must be 11 digit", "error")

              return false;
            } else {

              swal({
                title: "Dear <?php echo $row['name']; ?>",
                text: "Are  you  sure you want to purchase" + ' ' + plan + ' ' + "for" + ' ' + mobile,
                icon: "warning",
                buttons: ["Oh no!", "Yes"],
                dangerMode: true,
              })
                .then((willDelete) => {
                  if (willDelete) {
                    swal("Enter Your Transaction Pin:", {
                      content: "input",
                    }).then((value) => {
                      $.ajax({
                        type: 'POST',
                        beforeSend: function () {
                          $.LoadingOverlay("show");
                        },
                        url: '../assets/checkpin.php',
                        data: {
                          id: <?php echo $row['id'] ?>,
                          value: value
                        },
                        dataType: 'json',
                        success: function (response) {
                          if (response.status == 0) {
                            $.LoadingOverlay("hide");
                            swal("Oops!", "You have entered in correct password", "error")
                          } else {
                            $.ajax({
                              type: 'POST',
                              beforeSend: function () {
                                $.LoadingOverlay("show");
                              },
                              url: '/api/data/',
                              dataType: 'json',
                              headers: {
                                'Authorization': 'Token ' + key
                              },

                              data: JSON.stringify({
                                "network": networkid,
                                "mobile_number": mobile,
                                "plan": planid,
                                "Ported_number": ported_number
                              }),

                              success: function (data) {
                                if (data.status === "successful") {
                                  swal({
                                    title: "Successful!",
                                    text: "You purchased " + data.network + ' ' + data.plan_name + " " + data.amount + " for " + data.mobile_number,
                                    icon: "success",
                                    button: "View reciept",
                                  })
                                  $('.swal-button--confirm').click(function () {
                                    $.ajax({
                                      beforeSend: function () {
                                        $.LoadingOverlay("show");
                                      },
                                      success: window.location.href = 'dataprint.php?id=' + String(data.transid)
                                    });
                                  });
                                } else {
                                  swal({
                                    title: "Error!",
                                    text: "Yo! An error occured",
                                    icon: "error",
                                    button: "View reciept",
                                  })
                                  $('.swal-button--confirm').click(function () {
                                    $.ajax({
                                      beforeSend: function () {
                                        $.LoadingOverlay("show");
                                      },
                                      success: window.location.href = 'dataprint.php?id=' + String(data.transid)
                                    });
                                  });


                                }
                              },


                              error: function (XMLHttpRequest, textStatus, errorThrown) {
                                $.LoadingOverlay("hide");
                                console.log(errorThrown)
                                if (String(JSON.parse(XMLHttpRequest.status)) == 500) {
                                  swal("Oops!", "Something went wrong please contact admin ", "error")
                                } else if (JSON.parse(XMLHttpRequest.responseText).msg) {
                                  swal("Oops!", String(JSON.parse(XMLHttpRequest.responseText).msg), "error")
                                } else {
                                  swal("Oops!", String(XMLHttpRequest.responseText), "error")
                                }
                              },

                              complete: function () {
                                $.LoadingOverlay("hide");
                              }

                            });

                          }
                        },


                        error: function (XMLHttpRequest, textStatus, errorThrown) {
                          $.LoadingOverlay("hide");
                          console.log(textStatus)
                          if (String(JSON.parse(XMLHttpRequest.status)) == 500) {
                            swal("Oops!", "Something went wrong please contact admin ", "error")
                          } else {
                            var parsed_data = JSON.parse(XMLHttpRequest.responseText);
                            swal("Oops!", String(parsed_data.error), "error")
                          }
                        },

                        complete: function () {
                          $.LoadingOverlay("hide");
                        }

                      });

                    });
                    //end
                  }
                  else {
                    swal("you pressed cancel ");
                  }
                });
            }
          });

        </script>


        <!---- end buying the data ----->
        <?php require_once '../core/footer.php'; ?>

        <?php if ($checkpin == '') { ?>
        <script>
          $(document).ready(function () {
            swal({
              text: "<?php echo $row['name']; ?>, you have not create a transaction pin please create a transaction pin",
              icon: "info",
              button: "ok",
              timer: 60000,
            }).then(() => {
              window.location = "newpin.php"
            });
          });
        </script>
        <?php } else { ?>
        <?php
            exit; 
          }
        ?>

        <?php if ($min > $bal) { ?>
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
        <?php } else { ?>
  </body>
  <?php 
        exit;
      }       
    } else {
      echo "<script>document.location.href='logout.php'; </script>";
      exit;
    }
  ?>
</html>