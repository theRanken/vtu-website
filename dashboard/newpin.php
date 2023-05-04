<?php
require_once '../core/conn.php';
session_start();
if (isset($_SESSION['name'])) {
require_once '../core/conn.php';
require_once '../core/api.php';
$das="100";
	$aemail=$web['email'];

$sql = mysqli_query($con, "SELECT * FROM user WHERE id = {$_SESSION['id']}");
            if 
            (mysqli_num_rows($sql) > 0){
              $row = mysqli_fetch_assoc($sql);
            }
          $checkpin = $row['pin'];
          ?>
          <?php include '../includes/header.php'; ?>
<!-- End Sidebar -->

		<div class="main-panel ">
				

<link rel="stylesheet" href="/static/ogbam/form.css">

<div style="padding:90px 15px 20px 15px" >


  

<div class="row">
 

 <div class="col-sm-5">
    <div class="box " >
        <?php if($checkpin == ""){
            ?>
  <h2 class="w3-center">Setup Your Pin</h2>
 <form method="post" name="pinsetup" id="pinsetup" >
                <div class="form-group">
                 <label for="id_pin" class=" requiredField">
                Enter Pin<span class="asteriskField">*</span>
            </label>
                    <input type="password" name="pin1" max-value="9999" class="form-control" required id="pin1">
                    <small>Enter 4 digit pin </small>

                </div>

                <div class="form-group">
                   <label for="id_pin" class=" requiredField">
                Re-Enter Pin<span class="asteriskField">*</span>
            </label>
                    <input type="password" name="pin2" max-value="9999" class="form-control" required id="pin2">

                    <small>Enter same  4 digit pin </small>
                    
                </div>
             <div class="form-group">
             <button type="submit" class="btn btn-info">save pin</button></div>
    </form>
    </div>

    </div>
<?php }else{
   ?>
  <h2 class="w3-center">Change Your Pin</h2>
 <form method="post" name="changePinForm" id="changePinForm">
    <input type="hidden" name="csrfmiddlewaretoken" value="4zjFG4KIY4PejHXXSLfq5BO68hR5l5OnVlcIfITZntIFlh9LLwKxdbsTdcrMkoi1">
  <div class="form-group">
                 <label for="id_pin" class=" requiredField">
                Old Pin or Password<span class="asteriskField">*</span>
            </label>
                    <input type="password" name="oldpin" max-value="99999" class="form-control" required id="oldpin">

                </div>
                <div class="form-group">
                 <label for="id_pin" class=" requiredField">
                Enter New Pin<span class="asteriskField">*</span>
            </label>
                    <input type="password" name="pin1" max-value="99999" class="form-control" required id="pin1">

                </div>

                <div class="form-group">
                   <label for="id_pin" class=" requiredField">
                Re-Enter New Pin<span class="asteriskField">*</span>
            </label>
                    <input type="password" name="pin2" max-value="99999" class="form-control" required id="pin2">
                    
                </div>
             <div class="form-group">
             <button type="submit" class="btn btn-info">Change Pin</button></div>
    </form>
    </div>

    </div>
   <?php
} 
?>




    </div>
    


</div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>


<script>
$(function() {
  
  $("form[name='pinsetup']").validate({
    // Specify validation rules
    rules: {
      // The key name on the left side is the name attribute
      // of an input field. Validation rules are defined
      // on the right side
      pin1: {
        required: true,
        minlength: 4,
        maxlength: 4,
       
      },
      pin2: {
       required: true,
       minlength: 4,
        maxlength: 4,
       
      },
      
     
    },
    // Specify validation error messages
    messages: {
      
      pin1: {
        required: "Please enter pin",
        minlength: "Your pin must be 4 digit in length",
       
      },

      pin2: {
        required: "Please enter pin",
        minlength: "Your pin must be 4 digit in length",
       
      },

      
    },
    // Make sure the form is submitted to the destination defined
    // in the "action" attribute of the form when valid
    submitHandler: function(form) {
    
    

 $('#pinsetup').submit(function(e){
        e.preventDefault();
        $form = $(this)
        var formData = new FormData(this);
        var pin1 = $("#pin1").val();
        var pin2 = $("#pin2").val();
        $.ajax({
       type:'POST',
       beforeSend: function(){
         $.LoadingOverlay("show");
            },
       url: '../assets/pin.php',
    
         data:{
            id: <?php echo $row['id'] ?>,
                pin1:pin1,
                pin2:pin2
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
          });

          
   }
    
 
  });
});

</script>


<script>
$(function() {
  
  $("form[name='changePinForm']").validate({
    // Specify validation rules
    rules: {
      // The key name on the left side is the name attribute
      // of an input field. Validation rules are defined
      // on the right side
      pin1: {
        required: true,
        minlength: 4,
        maxlength: 4,
       
      },
      pin2: {
       required: true,
       minlength: 4,
        maxlength: 4,
       
      },
      oldpin: {
        required: true,
        minlength: 4,
        maxlength: 4,
       
      },
     
    },
    // Specify validation error messages
    messages: {
      
      pin1: {
        required: "Please enter pin",
        minlength: "Your pin must be 4 digit in length",
       
      },

      pin2: {
        required: "Please enter pin",
        minlength: "Your pin must be 4 digit in length",
       
      },

      oldpin: {
        required: "Please enter pin",
        minlength: "Your pin must be 4 digit in length",
       
      },
      
    },
    // Make sure the form is submitted to the destination defined
    // in the "action" attribute of the form when valid
    submitHandler: function(form) {
    
    

 $('#changePinForm').submit(function(e){
        e.preventDefault();
        $form = $(this)
        var formData = new FormData(this);
        var oldpin = $("#oldpin").val();
        var pin1 = $("#pin1").val();
        var pin2 = $("#pin2").val();
        $.ajax({
       type:'POST',
       beforeSend: function(){
         $.LoadingOverlay("show");
            },
       url: '../assets/changepin.php',
    
         data:{
            id: <?php echo $row['id'] ?>,
                oldpin: oldpin,
                pin1:pin1,
                pin2:pin2
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
          });

          
   }
    
 
  });
});

</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
<?php include '../includes/footer.php'; ?>
 
</body>
 
	<?php
} else {
    echo "<script>document.location.href='logout.php'; </script>";
  exit;
}

?>
</html>