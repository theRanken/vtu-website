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

 $chek = mysqli_query($con, "SELECT * FROM general ");
  $adex = mysqli_fetch_array($chek);
?>
<style>
#search-box{padding: 10px;border: #a8d4b1 1px solid;border-radius:4px;}
</style>
<!----credit user------>
<div class="main-panel ">
				

<link rel="stylesheet" href="/static/ogbam/form.css">

<div style="padding:90px 15px 20px 15px" >
    

                
             
    <h2 class="w3-center">WEB SETTING</h2>

    <div class="box w3-card-4">

        <form>
<div class="row">

                <div class="col-sm-8">

                    <input type="hidden" name="csrfmiddlewaretoken" value="on68V8UnKhKU3dHAzRgMJK5IcJXz5GpAp89hIUMR5ijpPjQYTHmceDYINHogi1pK"> 
        <div id="" class="form-group">
        
            <label for="id_amount" class="">
               Web Name
            </label>
                <div class="">
                    <input type="text" name="name"  class="textinput textInput form-control"  id="name" value="<?php echo $adex['name']?>">
                    
                </div>
    </div>
<div id="" class="form-group">
        
            <label for="id_amount" class="">
              Web Image
            </label>
                <div class="">
                    <input type="file" name="image"  class="textinput textInput form-control"  id="file" value="">
                    <br>
                   <div id="uploaded_image"><img src="/upload/<?php echo $adex['image']; ?>" height="150" width="225" class="img-thumbnail" id="uploaded_image"/>
                     </div> 
                </div>
    </div>
<div id="" class="form-group">
        
            <label for="id_amount" class="">
               Phone Number
            </label>
                <div class="">
                    <input type="number" name="phone"  class="textinput textInput form-control"  id="phone" value="<?php echo $adex['phone']?>">
                    
                </div>
    </div>
    <div id="" class="form-group">
        
            <label for="id_amount" class="">
              Email Address
            </label>
                <div class="">
                    <input type="email" name="email"  class="textinput textInput form-control"  id="email" value="<?php echo $adex['email']?>">
                    
                </div>
    </div>
    <div id="" class="form-group">
        
            <label for="id_amount" class="">
               Address
            </label>
                <div class="">
                    <input type="text" name="address"  class="textinput textInput form-control"  id="address" value="<?php echo $adex['address']?>">
                    
                </div>
    </div>
    
    <div id="" class="form-group">
        
            <label for="id_amount" class="">
               Facebook Link
            </label>
                <div class="">
                    <input type="text" name="name"  class="textinput textInput form-control"  id="facebook" value="<?php echo $adex['facebook']?>">
                    
                </div>
    </div>
    
    <div id="" class="form-group">
        
            <label for="id_amount" class="">
               Instergram  Link
            </label>
                <div class="">
                    <input type="text" name="name"  class="textinput textInput form-control"  id="instergram" value="<?php echo $adex['instergram']?>">
                    
                </div>
    </div>

    <div id="" class="form-group">
        
            <label for="id_amount" class="">
               Youtube Link
            </label>
                <div class="">
                    <input type="text" name="name"  class="textinput textInput form-control"  id="youtube" value="<?php echo $adex['youtube']?>">
                    
                </div>
    </div>


    <div id="" class="form-group">
        
            <label for="id_amount" class="">
               Whatsapp Link
            </label>
                <div class="">
                    <input type="text" name="name"  class="textinput textInput form-control"  id="wame" value="<?php echo $adex['whatlink']?>">
                    
                </div>
    </div>


    <div id="" class="form-group">
        
            <label for="id_amount" class="">
               whatsapp group link
            </label>
                <div class="">
                    <input type="text" name="name"  class="textinput textInput form-control"  id="wame_group" value="<?php echo $adex['whatgroup']?>">
                    
                </div>
    </div>


    <div id="" class="form-group">
        
            <label for="id_amount" class="">
               Phone Number with country code
            </label>
                <div class="">
                    <input type="text" name="name"  class="textinput textInput form-control"  id="footer" value="<?php echo $adex['footer']?>">
                    
                </div>
    </div>


    <div id="" class="form-group">
        
            <label for="id_amount" class="">
               Dashboard Color
            </label>
                <div class="">
                    <input type="color" name="name"  class="textinput textInput form-control"  id="color" value="<?php echo $adex['color']?>">
                    
                </div>
    </div>
<a href="javascript:void(0)" id="bonous" ><button type="button" class="btn" style='margin-bottom:15px;' >Proceed</button></a>
</div>
                <div class="col-sm-4  ">
            </div>
    </div>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!----- upload image here -------->

<script>
    $(document).ready(function(){
        
 $(document).on('change', '#file', function(){
  var name = document.getElementById("file").files[0].name;
  var form_data = new FormData();
  var ext = name.split('.').pop().toLowerCase();
  if(jQuery.inArray(ext, ['gif','png','jpg','jpeg']) == -1) 
  {
   alert("Invalid Image File");
  }
  var oFReader = new FileReader();
  oFReader.readAsDataURL(document.getElementById("file").files[0]);
  var f = document.getElementById("file").files[0];
  var fsize = f.size||f.fileSize;
  if(fsize > 2000000)
  {
   alert("Image File Size is very big");
  }
  else {
   form_data.append("file", document.getElementById('file').files[0]);
   $.ajax({
    url:"web_image.php",
    method:"POST",
    data: form_data,
    contentType: false,
    cache: false,
    processData: false,
    beforeSend:function(){
     $('#uploaded_image').html("<label class='text-success'>Image Uploading...</label>");
    },   
    success:function(data){
     $('#uploaded_image').html(data);
     
       
    }
   });
  }
 });
    
    });
</script>
<!------ we re done uploading image----->
<!------ save the setting ----->
<script>
$("#bonous").click(function() {
var name = $('#name').val();
var image = $("#image_post").val();
var phone = $("#phone").val();
var email = $("#email").val();
var address = $("#address").val();
var facebook =$("#facebook").val();
var instergram =$("#instergram").val();
var wame = $("#wame").val();
var youtube = $("#youtube").val();
var footer = $("#footer").val();
var wame_group = $("#wame_group").val();
var color = $("#color").val();

if (name=="" || image=="" || phone=="" || email=="" || address=="" || facebook=="" || instergram=="" || wame== "" || youtube== "" || footer== "" || wame_group== "" || color== ""){

           swal("Opps", "Please kidnly fill all the form", "error")

          return false;
        }
        else{

 swal({
  title: "Dear ADMIN",
  text: "You are about to change the website information",
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
       url: '../assets/change_web.php',
    
         data:{
                name:name,
                image:image,
                phone:phone,
                email:email,
                address:address,
                facebook:facebook,
                instergram:instergram,
                wame:wame,
                youtube:youtube,
                footer:footer,
                wame_group:wame_group,
                color:color
                        },
       dataType: 'json',
       success: function (response) {
         if (response.status == 500){
                               $.LoadingOverlay("hide");
                            swal({
                              title: "Successful!",
                              text: "You have successfully change the website setting information",
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