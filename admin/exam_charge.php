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
$chek = mysqli_query($con, "SELECT * FROM scratch_card_prices");
 $adex = mysqli_fetch_array($chek);
?>
<style>
#search-box{padding: 10px;border: #a8d4b1 1px solid;border-radius:4px;}
</style>
<!----credit user------>

<div class="main-panel ">
				

<link rel="stylesheet" href="/static/ogbam/form.css">

<div style="padding:90px 15px 20px 15px" >


    <h2 class="w3-center">Result Checker Charges</h2>

    <div class="box w3-card-4">

        <form method='post'>


            <div class="row">

                <div class="col-sm-8">

                    <input type="hidden" name="csrfmiddlewaretoken" value="on68V8UnKhKU3dHAzRgMJK5IcJXz5GpAp89hIUMR5ijpPjQYTHmceDYINHogi1pK"> 


    
    <div id="div_id_amount" class="form-group">
        
            <label for="id_amount" class="">
                WAEC 
            </label>
                <div class="">
                    <input type="number" name="snart"  class="textinput textInput form-control" oninput="" id="waec" value="<?php echo $adex['waec_card']; ?>">
                </div>
    </div>
    
  <div id="div_id_amount" class="form-group">
        
            <label for="id_amount" class="">
                NECO
            </label>
                <div class="">
                    <input type="number" name="snart"  class="textinput textInput form-control" oninput="" id="neco" value="<?php echo $adex['neco_token']; ?>">
                </div>
    </div>   

 <div id="div_id_amount" class="form-group">
        
            <label for="id_amount" class="">
                NABTEB
            </label>
                <div class="">
                    <input type="number" name="snart"  class="textinput textInput form-control" oninput="" id="nabteb" value="<?php echo $adex['nabteb_token']; ?>">
                </div>
    </div>

 

                    <a href="javascript:void(0)" id="bonous" ><button type="button" class="btn" style='margin-bottom:15px;' >Proceed</button></a>
                   	
                </div>
                <div class="col-sm-4  ">
            </div>

    </div>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
 <!---- share and sell start here ------->

<script>
$("#bonous").click(function() {
var waec = $("#waec").val();
var neco = $("#neco").val();
var nabteb = $("#nabteb").val();
    swal({
  title: "Dear <?php echo $row['username'];?>",
  text: "Are  you  sure you want to update the result checker charges",
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
         url: '../assets/exam_charges.php',
            data: {
               waec:waec,
               neco:neco,
               nabteb:nabteb
                        },
            dataType: 'json',
                      success: function (response) {
                          if (response.status == 500){
                               $.LoadingOverlay("hide");
                            swal({
                              title: "Successful!",
                              text: "You have successfully updated the Exam Discount",
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

<!------ share and sell ends here ----->

<?php include 'include/footer.php'; ?>
<?php
} else {
    echo "<script>document.location.href='logout.php'; </script>";
  exit;
}

?>