<?php
session_start();
if (isset($_SESSION['admin'])) {
require_once '../core/conn.php';
require_once '../core/api.php';
$das="8";
$sql = mysqli_query($con, "SELECT * FROM admin WHERE id = {$_SESSION['admin']}");
            if 
            (mysqli_num_rows($sql) > 0){
              $row = mysqli_fetch_assoc($sql);
            }
?>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.ckeditor.com/4.17.1/standard/ckeditor.js"></script>
<?php require_once 'include/header.php';
require_once 'include/nav.php';
?>


<div class="main-panel">
			<div class="content">
				<div class="page-inner">
					<div class="page-header">
						<h4 class="page-title">SEND NOTIFICATION</h4>
					</div>
							<div class="card">
								<div class="card-header">
								</div>
								<div class="card-body">
									<div class="mb-3 row">
									
										    <form>
										 	 <div id="div_id_amount" class="form-group">
        
            <label for="id_amount" class="">
              Enter User  Username
            </label>
        
            
                <div class="">
                    <input type="text" name="username"  class="textinput textInput form-control" oninput="checkref()" id="search-box">
                    
                     <div id="detect"></div>
                     <div id="suggesstion-box"></div>
                </div>
    </div>
											<div class="form-group">
												<label for="tittle">Sender name</label>
												<input type="text" class="form-control form-control-lg" id="tittle"  placeholder="Enter the sender name">
											</div>
											<div class="form-group">
												<label for="describption">Describption</label>
												<input type="text" class="form-control" id="des" placeholder="write a short note">
											</div>
											<div class="form-group">
												<label for="comment">
												    Message
												</label>
										
													<textarea class="form-control  ckeditor" id="long_desc" rows="5" value="">
													    </textarea>
											</div>
											<div class="card-action">
									<button type="button" class="btn btn-success" id="post">Send</button>
									<button type="button" class="btn btn-danger">Cancel</button>
								</div>	
                               </form>

</div>

</div>

</div>

</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

                  <script>
                   CKEDITOR.replace( 'long_desc', {
                    height: 300,
                        extraPlugins : 'filebrowser',
                     filebrowserBrowseUrl:'browser.php?type=Images',
                       filebrowserUploadMethod:"form",
                    filebrowserUploadUrl:"upload.php"
                   });
                  </script>

<script>
  $("#post").click(function() {
        var tittle = $("#tittle").val();
     var des = $("#des").val();
      var username = $("#search-box").val();
     var long_des = CKEDITOR.instances.long_desc.getData();
     
     
     
     if (tittle=="" || des=="" || username=="" || long_des==""){

           swal("Opps", "Please kidnly fill all the form", "error")

          return false;
        }
        else{
    
 swal({
  title: "Dear <?php echo $row['name'];?>",
  text: "You are about to send" + ' ' + username + ' ' + "a message",
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
       url: '../assets/send_notif.php',
    
         data:{
            username:username,
              sender:tittle,
            des:des,
            long_des:long_des,
                        },
       dataType: 'json',
       success: function (response) {
            if (response.status == 500){
                               $.LoadingOverlay("hide");
                            swal({
                              title: "Successful!",
                              text: "You have successfully sent" + ' ' + username + ' ' + " a message",
                              icon: "Success",
                              button: "Okay",
                            })
                            $('.swal-button--confirm').click(function(){
                                  $.ajax({
                                        beforeSend: function(){
                                            $.LoadingOverlay("show");
                                        },
            success: window.location.href = 'dashboard.php'
                                  });
                            });
                          }else{
        
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









	<?php require_once 'include/footer.php'; ?>

<?php if($min > $bal) { ?>
?>
<script>
$( document ).ready(function() {
swal({
 
  text: "<?php echo $row['name'];?> Wallet balance is below minimum vending amount ₦<?php echo $row['bal'];?>",
  icon: "info",
  button: "ok",
  timer: 60000,
}).then(() => {
  window.location="index.php"
});
});
</script>
<?php } else { ?>
<?php } 
exit; 
?>









</body>
 
	<?php
} else {
    echo "<script>document.location.href='logout.php'; </script>";
  exit;
}

?>
</html>

	