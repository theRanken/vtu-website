<?php 
session_start();
if(isset( $_SESSION['admin'])) {
require_once '../core/conn.php';
$das="5";

$sql = mysqli_query($con, "SELECT * FROM admin WHERE id = {$_SESSION['admin']}");
            if 
            (mysqli_num_rows($sql) > 0){
              $row = mysqli_fetch_assoc($sql);
            }
            ?>
<?php include 'include/header.php';
include 'include/nav.php';
?>
<?php
$chek = mysqli_query($con, "SELECT * FROM  airtimeprice");
 $adex = mysqli_fetch_array($chek);
?>
<style>
#search-box{padding: 10px;border: #a8d4b1 1px solid;border-radius:4px;}
</style>
<!----credit user------>

<div class="main-panel ">
				

<link rel="stylesheet" href="/static/ogbam/form.css">

<div style="padding:90px 15px 20px 15px" >


    <h2 class="w3-center">Airtime Discount</h2>

    <div class="box w3-card-4">

        <form method='post'>


            <div class="row">

                <div class="col-sm-8">

                    <input type="hidden" name="csrfmiddlewaretoken" value="on68V8UnKhKU3dHAzRgMJK5IcJXz5GpAp89hIUMR5ijpPjQYTHmceDYINHogi1pK"> 


    
    <div id="div_id_amount" class="form-group">
        
            <label for="id_amount" class="">
                MTN SMART USER
            </label>
                <div class="">
                    <input type="number" name="snart"  class="textinput textInput form-control" oninput="" id="mtn_smart" value="<?php echo $adex['smartpricemtn']; ?>">
                </div>
    </div>
    
  <div id="div_id_amount" class="form-group">
        
            <label for="id_amount" class="">
                MTN AFFILATE USER
            </label>
                <div class="">
                    <input type="number" name="snart"  class="textinput textInput form-control" oninput="" id="mtn_reseller" value="<?php echo $adex['afpricemtn']; ?>">
                </div>
    </div>   

 <div id="div_id_amount" class="form-group">
        
            <label for="id_amount" class="">
                MTN TOPUP USER
            </label>
                <div class="">
                    <input type="number" name="snart"  class="textinput textInput form-control" oninput="" id="mtn_topup" value="<?php echo $adex['toppricemtn']; ?>">
                </div>
    </div>

 <div id="div_id_amount" class="form-group">
        
            <label for="id_amount" class="">
                AIRTEL SMART USER
            </label>
                <div class="">
                    <input type="number" name="snart"  class="textinput textInput form-control" oninput="" id="airtel_smart" value="<?php echo $adex['smartpriceair']; ?>">
                </div>
    </div>


 <div id="div_id_amount" class="form-group">
        
            <label for="id_amount" class="">
                AIRTEL AFFILATE USER
            </label>
                <div class="">
                    <input type="number" name="snart"  class="textinput textInput form-control" oninput="" id="airtel_reseller" value="<?php echo $adex['afpriceair']; ?>">
                </div>
    </div>
 <div id="div_id_amount" class="form-group">
        
            <label for="id_amount" class="">
                AIRTEL TOPUP USER
            </label>
                <div class="">
                    <input type="number" name="snart"  class="textinput textInput form-control" oninput="" id="airtel_topup" value="<?php echo $adex['toppriceair']; ?>">
                </div>
    </div>
 <div id="div_id_amount" class="form-group">
        
            <label for="id_amount" class="">
                GLO SMART USER
            </label>
                <div class="">
                    <input type="number" name="snart"  class="textinput textInput form-control" oninput="" id="glo_smart" value="<?php echo $adex['smartpriceglo']; ?>">
                </div>
    </div>

 <div id="div_id_amount" class="form-group">
        
            <label for="id_amount" class="">
                GLO AFFILATE USER
            </label>
                <div class="">
                    <input type="number" name="snart"  class="textinput textInput form-control" oninput="" id="glo_reseller" value="<?php echo $adex['afpriceglo']; ?>">
                </div>
    </div>
 <div id="div_id_amount" class="form-group">
        
            <label for="id_amount" class="">
                GLO TOPUP USER
            </label>
                <div class="">
                    <input type="number" name="snart"  class="textinput textInput form-control" oninput="" id="glo_topup" value="<?php echo $adex['toppriceglo']; ?>">
                </div>
    </div>
    
 <div id="div_id_amount" class="form-group">
        
            <label for="id_amount" class="">
                9MOBILE SMART USER
            </label>
                <div class="">
                    <input type="number" name="snart"  class="textinput textInput form-control" oninput="" id="9mobile_smart" value="<?php echo $adex['smartpriceet']; ?>">
                </div>
    </div>

 <div id="div_id_amount" class="form-group">
        
            <label for="id_amount" class="">
                9MOBILE AFFILATE USER
            </label>
                <div class="">
                    <input type="number" name="snart"  class="textinput textInput form-control" oninput="" id="9mobile_reseller" value="<?php echo $adex['afpriceet']; ?>">
                </div>
    </div>

 <div id="div_id_amount" class="form-group">
        
            <label for="id_amount" class="">
                9MOBILE TOPUP USER
            </label>
                <div class="">
                    <input type="number" name="snart"  class="textinput textInput form-control" oninput="" id="9mobile_topup" value="<?php echo $adex['toppriceet']; ?>">
                </div>
    </div>

                    <a href="javascript:void(0)" id="bonous" ><button type="button" class="btn" style='margin-bottom:15px;' >Proceed</button></a>
                   	
                </div>
                <div class="col-sm-4  ">
            </div>

    </div>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<!------ end credit user ----->
<!---  airtime discount ------>
<script>
$("#bonous").click(function() {
var mtn_smart = $("#mtn_smart").val();
var mtn_reseller = $("#mtn_reseller").val();
var mtn_topup = $("#mtn_topup").val();
var airtel_smart = $("#airtel_smart").val();
var airtel_reseller = $("#airtel_reseller").val();
var airtel_topup = $("#airtel_topup").val();
var glo_smart = $("#glo_smart").val();
var glo_reseller = $("#glo_reseller").val();
var glo_topup = $("#glo_topup").val();
var mobile_smart = $("#9mobile_smart").val();
var mobile_reseller = $("#9mobile_reseller").val();
var mobile_topup = $("#9mobile_topup").val();

    swal({
  title: "Dear <?php echo $row['username'];?>",
  text: "Are you sure you want to update the airtime discount",
  icon: "warning",
  buttons: true,
  dangerMode: true,
}) 
.then((willDelete) => {
  if (willDelete) {

 $.ajax({
           type:'POST',
         beforeSend: function(){
            $.LoadingOverlay("show");
                 },
         url: '../assets/airtimediscount.php',
            data: {
                mtn_smart:mtn_smart,
                mtn_reseller:mtn_reseller,
                mtn_topup:mtn_topup,
                airtel_smart:airtel_smart,
                airtel_reseller:airtel_reseller,
                airtel_topup:airtel_topup,
                glo_smart:glo_smart,
                glo_reseller:glo_reseller,
                glo_topup:glo_topup,
                mobile_smart:mobile_smart,
                mobile_reseller:mobile_reseller,
                mobile_topup:mobile_topup
                          
                        },
            dataType: 'json',
                      success: function (response) {
                          if (response.status == 500){
                               $.LoadingOverlay("hide");
                            swal({
                              title: "Successful!",
                              text: "You successfully updated the airtime discount",
                              icon: "success",
                              button: "Okay",
                            })
                            $('.swal-button--confirm').click(function(){
                                  $.ajax({
                                        beforeSend: function(){
                                            $.LoadingOverlay("show");
                                        },
            success:  location.reload()
                                  });
                            });
                          }else{
                     $.LoadingOverlay("hide");
            swal(response.title, response.message, response.status)
                
                      }
                      },
                      complete: function(response){
                        $.LoadingOverlay("hide")
                      }
                      
                  });
}
  else{
    swal("you pressed cancel ");
  }
 });
});
</script>
<!---- end credit user ----->

<?php include 'include/footer.php'; ?>
<?php
} else {
    echo "<script>document.location.href='logout.php'; </script>";
  exit;
}

?>