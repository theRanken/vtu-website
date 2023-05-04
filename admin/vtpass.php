<?php
session_start();
if (isset($_SESSION['admin'])) {
  require_once '../core/conn.php';
  $das = "1234";
  $sql = mysqli_query($con, "SELECT * FROM admin WHERE id = {$_SESSION['admin']}");
  if (mysqli_num_rows($sql) > 0) {
    $row = mysqli_fetch_assoc($sql);
  }
  ?>
  <?php
  include 'include/header.php';
  include 'include/nav.php';

  $chek = mysqli_query($con, "SELECT * FROM simhosting");
  $adex = mysqli_fetch_array($chek);
  ?>
  <style>
    #search-box {
      padding: 10px;
      border: #a8d4b1 1px solid;
      border-radius: 4px;
    }
  </style>
  <!----credit user------>
  <div class="main-panel ">


    <link rel="stylesheet" href="/static/ogbam/form.css">

    <div style="padding:90px 15px 20px 15px">




      <h2 class="w3-center">Vtpass Login detials</h2>

      <div class="box w3-card-4">

        <form>
          <div class="row">

            <div class="col-sm-8">

              <input type="hidden" name="csrfmiddlewaretoken"
                value="on68V8UnKhKU3dHAzRgMJK5IcJXz5GpAp89hIUMR5ijpPjQYTHmceDYINHogi1pK">
              <div id="" class="form-group">

                <label for="id_amount" class="">
                  Vtpass Username
                </label>
                <div class="">
                  <input type="text" name="vt_username" class="textinput textInput form-control" id="vtpass_username"
                    value="<?php echo $adex['vt_username'] ?>">

                </div>
              </div>

              <div id="" class="form-group">

                <label for="id_amount" class="">
                  Vtpass Password
                </label>
                <div class="">
                  <input type="password" name="vt_password" class="textinput textInput form-control" id="vtpass_password"
                    value="<?php echo $adex['vt_password'] ?>">

                </div>
              </div>
              <a href="javascript:void(0)" id="bonous"><button type="button" class="btn"
                  style='margin-bottom:15px;'>Proceed</button></a>
            </div>
            <div class="col-sm-4  ">
            </div>
          </div>



          <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
          <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
          <!------ save the setting ----->
        <script>
          $("#bonous").click(function () {
            var vt_username = $('#vtpass_username').val();
            var vt_password = $('#vtpass_password').val();
            if (vt_username == "" || vt_password == "") {

              swal("Opps", "Please kidnly fill all the form", "error")

              return false;
            }
            else {

              swal({
                title: "Dear ADMIN",
                text: "i hope the vtpass login detials is correct",
                icon: "warning",
                buttons: true,
                dangerMode: true,
              })
                .then((willDelete) => {
                  if (willDelete) {
                    $.ajax({
                      type: 'POST',
                      beforeSend: function () {
                        $.LoadingOverlay("show");
                      },
                      url: '../assets/change_vtpass.php',

                      data: {
                        vt_username: vt_username,
                        vt_password: vt_password
                      },
                      dataType: 'json',
                      success: function (response) {
                        if (response.status == 500) {
                          $.LoadingOverlay("hide");
                          swal({
                            title: "Successful!",
                            text: "Vtpass successfully updated",
                            icon: "success",
                            button: "okay",
                          })
                          $('.swal-button--confirm').click(function () {
                            $.ajax({
                              beforeSend: function () {
                                $.LoadingOverlay("show");
                              },
                              success: location.reload()
                            });
                          });
                        } else {
                          $.LoadingOverlay("hide");
                          swal(response.title, response.message, response.status)

                        }


                      },
                      complete: function () {
                        $.LoadingOverlay("hide");
                      }
                    });



                  } else {
                    swal("You pressed Cancel!");
                  }
                });
            }
          });
        </script>


        <?php include 'include/footer.php'; ?>
        <?php
} else {
  echo "<script>document.location.href='logout.php'; </script>";
  exit;
}

?>