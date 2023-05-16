<?php 
session_start();
if(isset( $_SESSION['admin'])) {
require_once '../core/conn.php';
$das="123";

$sql = mysqli_query($con, "SELECT * FROM admin WHERE id = {$_SESSION['admin']}");
            if 
            (mysqli_num_rows($sql) > 0){
              $row = mysqli_fetch_assoc($sql);
            }
            ?>
<?php include 'include/header.php';
include 'include/nav.php';

 $chek = mysqli_query($con, "SELECT * FROM mail");
  $adex = mysqli_fetch_array($chek);
?>
<style>
#search-box{padding: 10px;border: #a8d4b1 1px solid;border-radius:4px;}
</style>
<!----credit user------>
<div class="main-panel ">
				

<link rel="stylesheet" href="/static/ogbam/form.css">

<div style="padding:90px 15px 20px 15px" >
    

                
             
    <h2 class="w3-center">Email Configuration</h2>

    <div class="box w3-card-4">

        <form>
<div class="row">

                <div class="col-sm-8">

                    <input type="hidden" name="csrfmiddlewaretoken" value="on68V8UnKhKU3dHAzRgMJK5IcJXz5GpAp89hIUMR5ijpPjQYTHmceDYINHogi1pK"> 
        <div id="" class="form-group">
        
            <label for="id_amount" class="">
               Sender Name
            </label>
                <div class="">
                    <input type="text" name="sender"  class="textinput textInput form-control"  id="sender" value="<?php echo $adex['sender']?>">
                    
                </div>
    </div>
<div id="" class="form-group">
        
            <label for="id_amount" class="">
              Host Name
            </label>
                <div class="">
                    <input type="text" name="host"  class="textinput textInput form-control"  id="host" value="<?php echo $adex['host']; ?>">
                    <br>
                </div>
    </div>
<div id="" class="form-group">
        
            <label for="id_amount" class="">
               Username
            </label>
                <div class="">
                    <input type="text" name="username"  class="textinput textInput form-control"  id="username" value="<?php echo $adex['username']?>">
                    
                </div>
    </div>
    <div id="" class="form-group">
        
            <label for="id_amount" class="">
              Password
            </label>
                <div class="">
                    <input type="password" name="password"  class="textinput textInput form-control"  id="password" value="<?php echo $adex['password']?>">
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
var sender = $('#sender').val();
var host = $("#host").val();
var username = $("#username").val();
var password = $("#password").val();

if (sender=="" || host=="" || username=="" || password=="" ){

           swal("Opps", "Please kidnly fill all the form", "error")

          return false;
        }
        else{

 swal({
  title: "Dear ADMIN",
  text: "You are about to change the email configuration",
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
       url: '../assets/change_email.php',
    
         data:{
               sender:sender,
               username:username,
               host:host,
               password:password
                        },
       dataType: 'json',
       success: function (response) {
         if (response.status == 500){
                               $.LoadingOverlay("hide");
                            swal({
                              title: "Successful!",
                              text: "You have successfully updated the email configuration",
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


<!----- end saving setting ---> 
    
<?php include 'include/footer.php'; ?>
<?php
} else {
    echo "<script>document.location.href='logout.php'; </script>";
  exit;
}

?>