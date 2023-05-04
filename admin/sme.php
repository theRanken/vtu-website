<?php 
session_start();
if(isset( $_SESSION['admin'])) {
  require_once '../core/conn.php';
  $das="1234";

  $sql = mysqli_query($con, "SELECT * FROM admin WHERE id = {$_SESSION['admin']}");
  if (mysqli_num_rows($sql) > 0){
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
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<!----credit user------>
<div class="main-panel ">
  <link rel="stylesheet" href="/static/ogbam/form.css">
  <div style="padding:90px 15px 20px 15px">
    <h2 class="w3-center">VENDOR PLUG API KEYS</h2>
    <div class="box w3-card-4">
      <form id="bonus">
        <div class="row">
          <div class="col-sm-8">
            <input type="hidden" name="csrfmiddlewaretoken" value="on68V8UnKhKU3dHAzRgMJK5IcJXz5GpAp89hIUMR5ijpPjQYTHmceDYINHogi1pK">
            <div id="" class="form-group">
              <label for="id_amount" class="">GENERAL API URL </label>
              <div class="">
                <input type="text" name="sme_plug_url" class="textinput textInput form-control" id="sme_plug_url" value="<?php echo $adex['smeplugurl']?>">
              </div>
              <label for="id_amount" class="">GENERAL API KEY </label>
              <div class="">
                <input type="text" name="sme_plug" class="textinput textInput form-control" id="sme_plug" value="<?php echo $adex['smeplug']?>">
              </div>
            </div>
            <button type="submit" class="btn" style='margin-bottom:15px;'>Save Changes</button>
          </div>
          <div class="col-sm-4  "></div>
        </div>
        <!------ save the setting ----->
        <script>
          $("#bonus").click(function(e) {
            e.preventDefault();
            var sme_plug = $('#sme_plug').val();
            var sme_plug_url = $('#sme_plug_url').val();
            if (sme_plug == "" || sme_plug_url == "") {
              swal("Opps", "Please kindly fill all the form", "error")
              return false;
            } else {
              swal({
                title: "Dear ADMIN",
                text: "You are about to change the API Settings",
                icon: "warning",
                buttons: true,
                dangerMode: true,
              }).then((willDelete) => {
                if (willDelete) {
                  $.ajax({
                    type: 'POST',
                    beforeSend: function() {
                      $.LoadingOverlay("show");
                    },
                    url: '../assets/change_smeplug.php',
                    data: {
                      sme_plug: sme_plug,
                      sme_plug_url: sme_plug_url,
                    },
                    dataType: 'json',
                    success: function(response) {
                      if (response.status == 200) {
                        $.LoadingOverlay("hide");
                        swal({
                          title: "Successful!",
                          text: "API Settings updated successfully!",
                          icon: "success",
                          button: "okay",
                        })
                        $('.swal-button--confirm').click(function() {
                          $.ajax({
                            beforeSend: function() {
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
                    complete: function() {
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
      </form>
    </div>
    <br>
    <div class="box w3-card-4">
      <form id="data-api">
        <div class="row">
          <div class="col-sm-8">
            <input type="hidden" name="csrfmiddlewaretoken" value="on68V8UnKKlMU3dHAzRgMJK5IcJXz5GpAp89hIUMR5ijpPjQYTHmceDYINHogi886hK">
            <div id="" class="form-group">
              <label for="id_amount" class="">DATA API URL </label>
              <div class="">
                <input type="text" name="data_plug_url" class="textinput textInput form-control" id="data_plug_url" value="<?php echo $adex['data_plug_url'] ?>">
              </div>
              <label for="id_amount" class="">DATA API KEY </label>
              <div class="">
                <input type="text" name="data_plug_key" class="textinput textInput form-control" id="data_plug_key" value="<?php echo $adex['data_plug_api_key']?>">
              </div>
            </div>
            <button type="submit" class="btn" style='margin-bottom:15px;'>Save Changes</button>
          </div>
          <div class="col-sm-4  "></div>
        </div>
        <!------ save the setting ----->
        <script>
          $("#data-api").submit(function(e) {
            e.preventDefault();
            var data_plug_url = $('#data_plug_url').val();
            var data_plug_key = $('#data_plug_key').val();
            console.log(data_plug_key);
            console.log(data_plug_url);
            if (data_plug_url == "" || data_plug_key == "") {
              swal("Oops!", "Please kindly fill all Data API Settings fields", "error")
              return false;
            } else {
              swal({
                title: "Dear ADMIN",
                text: "You are about to change the Data API Settings",
                icon: "warning",
                buttons: true,
                dangerMode: true,
              }).then((willDelete) => {
                if (willDelete) {
                  $.ajax({
                    type: 'POST',
                    beforeSend: function() {
                      $.LoadingOverlay("show");
                    },
                    url: '../assets/change_smeplug.php',
                    data: {
                      data_plug_url: data_plug_url,
                      data_plug_key: data_plug_key
                    },
                    dataType: 'json',
                    success: function(response) {
                      console.log(response.status);
                      if (response.status == 200) {
                        $.LoadingOverlay("hide");
                        swal({
                          title: "Successful!",
                          text: "Data API Settings updated successfully!",
                          icon: "success",
                          button: "okay",
                        })
                        $('.swal-button--confirm').click(function() {
                          $.ajax({
                            beforeSend: function() {
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
                    complete: function() {
                      $.LoadingOverlay("hide");
                    }
                  });
                } else {
                  swal("You Cancelled Data API Settings Update!");
                }
              });
            }
          });
        </script>
      </form>
    </div>
    <br>
    <div class="box w3-card-4">
      <form id="topup-submit">
        <div class="row">
          <div class="col-sm-8">
            <input type="hidden" name="csrfmiddlewaretoken" value="on68V8UnKhKU3dHAzRgMJK5IcJXz5GpAp89hIUMR5ijpPjQYTHmceDYINHogi1pK">
            <div id="" class="form-group">
              <label for="id_amount" class="">TOPUP API URL </label>
              <div class="">
                <input type="text" name="topup_plug_url" class="textinput textInput form-control" id="topup_plug_url" value="<?php echo $adex['topup_plug_url']?>">
              </div>
              <label for="id_amount" class="">TOPUP API KEY </label>
              <div class="">
                <input type="text" name="topup_plug_key" class="textinput textInput form-control" id="topup_plug_key" value="<?php echo $adex['topup_plug_api_key']?>">
              </div>
            </div>
            <button type="submit" class="btn" style='margin-bottom:15px;'>Save Changes</button>
          </div>
          <div class="col-sm-4  "></div>
        </div>
        <!------ save the setting ----->
        <script>
          $("#topup-submit").submit(function(e) {
            e.preventDefault();
            var topup_plug_url = $('#topup_plug_url').val();
            var topup_plug_key = $('#topup_plug_key').val();
            if (topup_plug_url  == "" || topup_plug_key  == "") {
              swal("Opps", "Please kindly fill all the Topup Settings fields", "error")
              return false;
            } else {
              swal({
                title: "Dear ADMIN",
                text: "You are about to change the Topup API Settings",
                icon: "warning",
                buttons: true,
                dangerMode: true,
              }).then((willDelete) => {
                if (willDelete) {
                  $.ajax({
                    type: 'POST',
                    beforeSend: function() {
                      $.LoadingOverlay("show");
                    },
                    url: '../assets/change_smeplug.php',
                    data: {
                      topup_plug_url: topup_plug_url,
                      topup_plug_key: topup_plug_key,
                    },
                    dataType: 'json',
                    success: function(response) {
                      if (response.status == 200) {
                        $.LoadingOverlay("hide");
                        swal({
                          title: "Successful!",
                          text: "TopUp API Settings updated successfully!",
                          icon: "success",
                          button: "okay",
                        })
                        $('.swal-button--confirm').click(function() {
                          $.ajax({
                            beforeSend: function() {
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
                    complete: function() {
                      $.LoadingOverlay("hide");
                    }
                  });
                } else {
                  swal("You Cancelled TopUp Api settings Update!");
                }
              });
            }
          });
        </script>
      </form>
    </div>
    <br>
    <div class="box w3-card-4">
      <form id="cable-submit">
        <div class="row">
          <div class="col-sm-8">
            <input type="hidden" name="csrfmiddlewaretoken" value="on68V8UnKhKU3dHAzRgMJK5IcJXz5GpAp89hIUMR5ijpPjQYTHmceDYINHogi1pK">
            <div id="" class="form-group">
              <label for="id_amount" class="">CABLE API URL </label>
              <div class="">
                <input type="text" name="cable_plug_url" class="textinput textInput form-control" id="cable_plug_url" value="<?php echo $adex['cable_plug_url']?>">
              </div>
              <label for="id_amount" class="">CABLE API KEY </label>
              <div class="">
                <input type="text" name="cable_plug_key" class="textinput textInput form-control" id="cable_plug_key" value="<?php echo $adex['cable_plug_api_key']?>">
              </div>
            </div>
            <button type="submit" class="btn" style='margin-bottom:15px;'>Save Changes</button>
          </div>
          <div class="col-sm-4  "></div>
        </div>
        <!------ save the setting ----->
        <script>
          $("#cable-submit").submit(function(e) {
            e.preventDefault();
            var cable_plug_url = $('#cable_plug_url').val();
            var cable_plug_key = $('#cable_plug_key').val();
            if (cable_plug_url == "" || cable_plug_key == "") {
              swal("Opps", "Please kindly fill all Cable API settings fields", "error")
              return false;
            } else {
              swal({
                title: "Dear ADMIN",
                text: "You are about to change the Cable API Settings",
                icon: "warning",
                buttons: true,
                dangerMode: true,
              }).then((willDelete) => {
                if (willDelete) {
                  $.ajax({
                    type: 'POST',
                    beforeSend: function() {
                      $.LoadingOverlay("show");
                    },
                    url: '../assets/change_smeplug.php',
                    data: {
                      cable_plug_url: cable_plug_url,
                      cable_plug_key: cable_plug_key,
                    },
                    dataType: 'json',
                    success: function(response) {
                      if (response.status == 200) {
                        $.LoadingOverlay("hide");
                        swal({
                          title: "Successful!",
                          text: "Cable API Settings updated successfully!",
                          icon: "success",
                          button: "okay",
                        })
                        $('.swal-button--confirm').click(function() {
                          $.ajax({
                            beforeSend: function() {
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
                    complete: function() {
                      $.LoadingOverlay("hide");
                    }
                  });
                } else {
                  swal("You Cancelled Cable API Settings Update!");
                }
              });
            }
          });
        </script>
      </form>
    </div>
  </div>
</div>   
<?php include 'include/footer.php'; ?> 
<?php
  }else{
    echo "<script>document.location.href='logout.php'; </script>";
    exit;
  }
?>