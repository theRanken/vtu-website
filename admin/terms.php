<?php
session_start();
if (isset($_SESSION['admin'])) {
require_once '../core/conn.php';
require_once '../core/api.php';
$das="123";
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
<?php
$chek = mysqli_query($con, "SELECT * FROM terms");
 $adex = mysqli_fetch_array($chek);
?>

<div class="main-panel">
			<div class="content">
				<div class="page-inner">
					<div class="page-header">
						<h4 class="page-title">Terms and Agreement</h4>
					</div>
							<div class="card">
								<div class="card-header">
								</div>
								<div class="card-body">
									<div class="mb-3 row">
<form>
    <div class="form-group">
												<label for="comment">
												    Message
												</label>
										
													<textarea class="form-control  ckeditor" id="long_desc" rows="5"><?php echo $adex['adex']; ?>
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
     var long_des = CKEDITOR.instances.long_desc.getData();
     
     
     
     if (long_des==""){

           swal("Opps", "Please kidnly fill all the form", "error")

          return false;
        }
        else{
    
 swal({
  title: "Dear <?php echo $row['name'];?>",
  text: "You are about to make some changes",
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
       url: '../assets/update_terms.php',
    
         data:{
            terms:long_des,
                        },
       dataType: 'json',
       success: function (response) {
            if (response.status == 500){
                               $.LoadingOverlay("hide");
                            swal({
                              title: "Successful!",
                              text: "Updated successfully",
                              icon: "success",
                              button: "Okay",
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





	<?php require_once 'include/footer.php'; ?>

</body>
 
	<?php
} else {
    echo "<script>document.location.href='logout.php'; </script>";
  exit;
}

?>
</html>

	