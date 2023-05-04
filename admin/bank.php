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
 $chek = mysqli_query($con, "SELECT * FROM bank");
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
    

    <h2 class="w3-center">Bank Detials</h2>
    <div class="box w3-card-4">
        <form>
<div class="row">
                <div class="col-sm-8">

                    <input type="hidden" name="csrfmiddlewaretoken" value="on68V8UnKhKU3dHAzRgMJK5IcJXz5GpAp89hIUMR5ijpPjQYTHmceDYINHogi1pK"> 
        <div id="" class="form-group">
        
            <label for="id_amount" class="">
               Bank Name
            </label>
                <div class="">
                    <input type="text" name="bankname"  class="textinput textInput form-control"  id="bankname" value="<?php echo $adex['bankname']?>">
                    
                </div>
    </div>
    
     <div id="" class="form-group">
        
            <label for="id_amount" class="">
               Account Name
            </label>
                <div class="">
                    <input type="text" name="name"  class="textinput textInput form-control"  id="name" value="<?php echo $adex['name']?>">
                    
                </div>
    </div>
    
    
    <div id="" class="form-group">
        
            <label for="id_amount" class="">
               ACCOUNT NUMBER
            </label>
                <div class="">
                    <input type="number" name="number"  class="textinput textInput form-control"  id="number" value="<?php echo $adex['number']?>">
                    
                </div>
    </div>
    <div id="" class="form-group">
        
    <label for="id_amount" class="">
                Enable or Disable Bank
            </label>
                 <div class="">
            <select name="status" class="select form-control" required id="enable_bank">
    <option value="on" <?php if($set['bank'] == '1') echo "selected" ?>>Enable</option>
    <option value="off"<?php if($set['bank'] == '0') echo "selected" ?>>Disable</option>
          </select>      

                </div>
        
    </div> 
    
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
var bankname = $('#bankname').val();
var number = $('#number').val();
var name = $("#name").val();
var bank = $('#enable_bank').find(":selected").val();
if (bankname =="" || number == "" || name == "" ){

           swal("Opps", "Please kidnly fill all the form", "error")

          return false;
        }
        else{

 swal({
  title: "Dear ADMIN",
  text: "You are about to change the bank account detials",
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
       url: '../assets/change_bank.php',
    
         data:{
               bankname:bankname,
               number:number,
               name:name,
               bank:bank
                        },
       dataType: 'json',
       success: function (response) {
         if (response.status == 500){
                               $.LoadingOverlay("hide");
                            swal({
                              title: "Successful!",
                              text: "Bank acount changed successfully",
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