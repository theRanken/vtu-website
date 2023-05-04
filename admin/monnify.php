<?php 
session_start();
if(isset( $_SESSION['admin'])) {
require_once '../core/conn.php';
$das="12345";

$sql = mysqli_query($con, "SELECT * FROM admin WHERE id = {$_SESSION['admin']}");
            if 
            (mysqli_num_rows($sql) > 0){
              $row = mysqli_fetch_assoc($sql);
            }
            ?>
<?php include 'include/header.php';
include 'include/nav.php';
$webname= $_SERVER['HTTP_HOST'];
 $chek = mysqli_query($con, "SELECT * FROM pay");
  $adex = mysqli_fetch_array($chek);
  
   $mon = mysqli_query($con, "SELECT * FROM setting");
  $set = mysqli_fetch_array($mon);
?>
<style>
#search-box{padding: 10px;border: #a8d4b1 1px solid;border-radius:4px;}
</style>
<!----credit user------>
<div class="main-panel ">
				

<link rel="stylesheet" href="/static/ogbam/form.css">

<div style="padding:90px 15px 20px 15px" >
    

                
             
    <h2 class="w3-center">Monnify Detials</h2>
    <div class="box w3-card-4">
        <form>
<div class="row">
                <div class="col-sm-8">

                    <input type="hidden" name="csrfmiddlewaretoken" value="on68V8UnKhKU3dHAzRgMJK5IcJXz5GpAp89hIUMR5ijpPjQYTHmceDYINHogi1pK"> 
        <div id="" class="form-group">
        
            <label for="id_amount" class="">
               Monnify Apikey
            </label>
                <div class="">
                    <input type="text" name="monnify_api"  class="textinput textInput form-control"  id="monnify_api" value="<?php echo $adex['mapi']?>">
                    
                </div>
    </div>
    
     <div id="" class="form-group">
        
            <label for="id_amount" class="">
               Monnify Secrete Key
            </label>
                <div class="">
                    <input type="text" name="monnify_secrete"  class="textinput textInput form-control"  id="monnify_secrete" value="<?php echo $adex['msk']?>">
                    
                </div>
    </div>
    
    
    <div id="" class="form-group">
        
            <label for="id_amount" class="">
               Monnify Contract Number
            </label>
                <div class="">
                    <input type="number" name="contract"  class="textinput textInput form-control"  id="contract" value="<?php echo $adex['contact']?>">
                    
                </div>
    </div>
     <div id="" class="form-group">
        
    <label for="id_amount" class="">
                Enable or Disable Monnify
            </label>
                 <div class="">
            <select name="status" class="select form-control" required id="enable_monnify">
    <option value="on" <?php if($set['monnify'] == '1') echo "selected" ?>>Enable</option>
    <option value="off"<?php if($set['monnify'] == '0') echo "selected" ?>>Disable</option>
          </select>      

                </div>
        
    </div> 
 
    
    
     <label class="float-left" for="email">Monnify Callback Url</label>
     <input type="text" class="form-control" value="https://<?php echo $webname;?>/assets/monnifypayment.php" readonly id="myInput">
         <button onclick="myFunction()" style="cursor: pointer;" class="badge badge-dark">Copy url</button>
    
    <a href="javascript:void(0)" id="bonous" ><button type="button" class="btn" style='margin-bottom:15px;' >Proceed</button></a>
</div>
                <div class="col-sm-4  ">
            </div>
    </div>
    
    
    
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<!------ save the setting ----->
<script>
$("#bonous").click(function() {
var monnify_api = $('#monnify_api').val();
var monnify_secrete = $('#monnify_secrete').val();
var contract = $("#contract").val();
var monnify = $('#enable_monnify').find(":selected").val();
if (monnify_secrete=="" || monnify_api == "" || contract == "" ){

           swal("Opps", "Please, kindly fill all the forms", "error")

          return false;
        }
        else{

 swal({
  title: "Dear ADMIN",
  text: "You are about to change the monnify detials",
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
       url: '../assets/change_monnify.php',
    
         data:{
               monnify_secrete:monnify_secrete,
               monnify_api:monnify_api,
               contract:contract,
               monnify:monnify
                        },
       dataType: 'json',
       success: function (response) {
         if (response.status == 500){
                               $.LoadingOverlay("hide");
                            swal({
                              title: "Successful!",
                              text: "Monnify successfully updated",
                              icon: "success",
                              button: "okay",
                            })
                            $('.swal-button--confirm').click(function(){
                                  $.ajax({
                                        beforeSend: function(){
                                            $.LoadingOverlay("show");
                                        },
            success: location.reload()
                                  });
                            });
                          }else{
                     $.LoadingOverlay("hide");
            swal(response.title, response.message, response.status)
                
                      }
            
            
        },
       complete: function(){
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
<script>
function myFunction() {
  /* Get the text field */
  var copyText = document.getElementById("myInput");

  /* Select the text field */
  copyText.select();
  copyText.setSelectionRange(0, 99999); /* For mobile devices */

  /* Copy the text inside the text field */
  navigator.clipboard.writeText(copyText.value);
  
  /* Alert the copied text */
  alert("Copied" );
}
</script>
    
    <?php include 'include/footer.php'; ?>
<?php
} else {
    echo "<script>document.location.href='logout.php'; </script>";
  exit;
}

?>