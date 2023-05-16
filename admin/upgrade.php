<?php 
session_start();
if(isset( $_SESSION['admin'])) {
require_once '../core/conn.php';
$das="4";

$sql = mysqli_query($con, "SELECT * FROM admin WHERE id = {$_SESSION['admin']}");
            if 
            (mysqli_num_rows($sql) > 0){
              $row = mysqli_fetch_assoc($sql);
            }
            ?>
<?php include 'include/header.php';
include 'include/nav.php';
?>
<style>
#search-box{padding: 10px;border: #a8d4b1 1px solid;border-radius:4px;}
</style>
<!----credit user------>

<div class="main-panel ">
				

<link rel="stylesheet" href="/static/ogbam/form.css">

<div style="padding:90px 15px 20px 15px" >


    <h2 class="w3-center">Upgrade Account</h2>

    <div class="box w3-card-4">

        <form>


            <div class="row">

                <div class="col-sm-8">

                    <input type="hidden" name="csrfmiddlewaretoken" value="on68V8UnKhKU3dHAzRgMJK5IcJXz5GpAp89hIUMR5ijpPjQYTHmceDYINHogi1pK"> 
    <div id="div_id_amount" class="form-group">
        
            <label for="id_amount" class="">
                Username
            </label>
        
            
                <div class="">
                    <input type="text" name="username"  class="textinput textInput form-control" oninput="checkref()" id="search-box">
                    
                     <div id="detect"></div>
                     <div id="suggesstion-box"></div>
                </div>
    </div>
    
    <div id="div_id_amount" class="form-group">
        
            <label for="id_amount" class="">
                Account Type
            </label>
              <div class="">
                   <select name="accounttype" class="select form-control" required id="accounttype">
   <option  selected>Select account type</option>
    <option  value="SMART" >SMART USERS</option>
     <option  value="AFFILIATE" >AFFILIATE USERS</option>
      <option  value="TOPUP" >TOPUP USERS</option>
       <option  value="API" >API USERS</option>
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
<!------ end credit user ----->
<!---- suggestion username ---->
<script>
    // AJAX call for autocomplete 
$(document).ready(function(){
	$("#search-box").keyup(function(){
		$.ajax({
		type: "POST",
		url: "checkusername.php",
		data:'keyword='+$(this).val(),
		beforeSend: function(){
			$("#search-box").css("background","#FFF url(LoaderIcon.gif) no-repeat 165px");
		},
		success: function(data){
			$("#suggesstion-box").show();
			$("#suggesstion-box").html(data);
			$("#search-box").css("background","#FFF");
		}
		});
	});
});
//To select username
function selectCountry(val) {
$("#search-box").val(val);
$("#suggesstion-box").hide();
}
</script>
<!--- end suggestion username ---->
<!--- credit upgrade her ------>
<script>
$("#bonous").click(function() {
var username = $('#search-box').val();
var accounttype = $('#accounttype').find(":selected").val();
 swal({
  title: "Dear ADMIN",
  text: "Do you really want to upgrage" + ' '+ username + ' ' + "Account to" + ' '+ accounttype + ' ' + "USERS",
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
       url: '../assets/upgrade.php',
    
         data:{
           
                accounttype:accounttype,
                username: username
                        },
       dataType: 'json',
       success: function (response) {
        
            swal(response.title, response.message, response.status)
            .then(function(){ 
               location.reload();
                  }
                 );
            
            
        },
       complete: function(){
         $.LoadingOverlay("hide");
        
  
    }
     });
            
            
  } else {
    swal("You pressed Cancel!");
  }
});



   });
   </script>
   <!---- end upgrade user ----->
   <!----- detect user ----->
   <script>
        function checkref() {
            jQuery.ajax({
                url: "detect.php",
                data: 'ref=' + $("#search-box").val(),
                type: "POST",
                success: function(data) {
                    $("#detect").html(data);
                },
                error: function() {}
            });
        }
    </script>
    <!---- done detecting user ------>

<?php include 'include/footer.php'; ?>
<?php
} else {
    echo "<script>document.location.href='logout.php'; </script>";
  exit;
}

?>