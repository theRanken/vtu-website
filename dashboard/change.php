<?php
session_start();
if (isset($_SESSION['name'])) {
require_once '../core/conn.php';
$das="10"; 
	$sql = mysqli_query($con, "SELECT * FROM user WHERE id = {$_SESSION['id']}");
            if 
            (mysqli_num_rows($sql) > 0){
              $row = mysqli_fetch_assoc($sql);
            }
            $id=$row['id'];
            $username=$row['username'];
            ?>
            <?php
if(isset($_POST['change'])){
     
$password =mysqli_real_escape_string($con, $_POST['password']);
$cpassword =mysqli_real_escape_string($con, $_POST['cpassword']);
$previous =mysqli_real_escape_string($con, $_POST['previous']);
 
     $past=substr(sha1(md5($previous)), 3, 10);
$res=mysqli_query($con,"SELECT * FROM user WHERE username='$username' AND password='$past'");
  if(!empty($password) && !empty($cpassword)){
     if ($_POST['password']!==$_POST['cpassword']) {
    $msg= "<span style='color:red'>Password doesn't match</span>";
     }else if(strlen($password)<8){
    // Checking the strenght of the user password
    $msg= "<div class='alert alert-danger'>Passord must contain at least 8 characters</div>";
     }else if(mysqli_num_rows($res)==0){
      $msg= "<div class='alert alert-danger'><span class='btn btn-success'>$username</span> The Previous Password You entered Doesn't Match!
      <br>Contact the admin for help or you request for forgotten password</div>";
}else {
   $recent=substr(sha1(md5($password)), 3, 10);
$update = mysqli_query($con,"UPDATE user SET password='$recent' WHERE id='$id'  ") or die(mysqli_error()); 

if ($update){

    $msg= "
  
  <div class='alert alert-success'>
    Password Change Successuffly
  </div>
  
  <script>
setTimeout(function(){ window.location.href='change.php' }, 1000);</script>
   ";

 }else{
   
  $msg= "<div class='alert alert-danger'>No Entry made </div>"; 
   };
       
    } 
}
}

?>
<?php include '../includes/header.php'; ?>
<div class="main-panel ">
				

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="static/ogbam/form.css">
<!-- Latest compiled and minified CSS -->

<!-- jQuery library -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<style>
    .control {
        display: block;
        width: 100%;
        height: calc(2.25rem + 2px);
        padding: .375rem .75rem;
        font-size: 1rem;
        font-weight: 400;
        line-height: 1.5;
        color: #495057;
        background-color: #fff;
        background-clip: padding-box;
        border: 1px solid #ced4da;
        border-radius: .25rem;
        transition: border-color .15s ease-in-out, box-shadow .15s ease-in-out;
    }
    #process{
        display: none;
    }



     /--thank you pop starts here--/
     .thank-you-pop{
      width:100%;
       padding:20px;
      text-align:center;
    }
    .thank-you-pop img{
      width:76px;
      height:auto;
      margin:0 auto;
      display:block;
      margin-bottom:25px;
    }

    .thank-you-pop h1{
      font-size: 42px;
        margin-bottom: 25px;
      color:#5C5C5C;
    }
    .thank-you-pop p{
      font-size: 20px;
        margin-bottom: 27px;
       color:#5C5C5C;
    }
    .thank-you-pop h3.cupon-pop{
      font-size: 25px;
        margin-bottom: 40px;
      color:#222;
      display:inline-block;
      text-align:center;
      padding:10px 20px;
      border:2px dashed #222;
      clear:both;
      font-weight:normal;
    }
    .thank-you-pop h3.cupon-pop span{
      color:#03A9F4;
    }
    .thank-you-pop a{
      display: inline-block;
        margin: 0 auto;
        padding: 9px 20px;
        color: #fff;
        text-transform: uppercase;
        font-size: 14px;
        background-color: #8BC34A;
        border-radius: 17px;
    }
    .thank-you-pop a i{
      margin-right:5px;
      color:#fff;
    }
    #ignismyModal .modal-header{
        border:0px;
    }
    /--thank you pop ends here--/

</style>

<div style="padding:90px 15px 20px 15px" >
 <div class="outputc"> <?= $msg; ?></div>

          
      
    <h2 class="w3-center">Change Password</h2>
    
    
   
<form method="POST" >
                    <input type="hidden" name="csrfmiddlewaretoken" value="cbQhSFV8xnbXEsqjwH0rR2pVi63ZyeJPOYBKg3HjQu83rFSkNNbAnjNXEpayt9TZ">
                      
       <div class="form-group">
            
         <label for="id_username" class=" requiredField">
              Previous Password <span class="asteriskField"></span>
            </label>
        
                   <div class="">
                      <div class="input-group-addon">
                    <input type="password" name="previous"  class="textinput textInput form-control" required id="" value="">
                     </div>
                   </div>
        
        
            <label for="id_username" class=" requiredField">
              Password <span class="asteriskField"></span>
            </label>
        
                   <div class="">
                      <div class="input-group-addon">
                    <input type="password" name="password"  class="textinput textInput form-control" required id="" value="">
                     </div>
                   </div>
                     
        
            <label for="id_username" class=" requiredField">
                Confirm Password <span class="asteriskField"></span>
            </label>
        
                   <div class="">
                      <div class="input-group-addon">
                    <input type="password" name="cpassword"  class="textinput textInput form-control" required id="" value="">
                     </div>

           
                     </div>
                     <br />
             <button type="submit" id="submit" name="change" class="btn btn-info">Change Password</button>
             </form>
                       <!-- Card Columns Example Social Feed-->    
         </p>
          </div>
    </div>

</div>





</div>
      


    </div>
  </div>

   

<!-- GetButton.io widget -->
  <?php require_once '../includes/footer.php'; ?>
  </body>
  </html>





 
  <?php
} else {
    echo "<script>document.location.href='logout.php'; </script>";
  exit;
}

?>
</html>