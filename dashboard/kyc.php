<?php
session_start();
if (isset($_SESSION['name'])) {
require_once '../core/conn.php';
$das="";
	$aemail=$web['email'];
$sql = mysqli_query($con, "SELECT * FROM user WHERE id = {$_SESSION['id']}");
            if 
            (mysqli_num_rows($sql) > 0){
              $row = mysqli_fetch_assoc($sql);
            }
            $msg="";
            $sql = mysqli_query($con, "SELECT * FROM  mail");
            if 
            (mysqli_num_rows($sql) > 0){
              $mail = mysqli_fetch_assoc($sql);
            }
$bal= $row['bal'];
$email=$row['email'];
$username= $row['username'];
$musername=$mail['username'];
$mpassword=$mail['password'];
$host=$mail['host'];
$sender=$mail['sender'];
?>
<?php
//Pay stack bank list
$url ="https://api.paystack.co/bank";
$results = json_decode(file_get_contents($url), true);
foreach ($results['data'] as $bank) {
	# code.
	$bank['code']."-".$bank['name'];
}
if(isset($_POST['go'])) {
$username = $_POST['username']; 
 $bank = $_POST['bank'];
  $number = $_POST['number'];
   $name = $_POST['name'];
    $sub = mysqli_query($con, "SELECT * FROM kyc WHERE username='$username' AND bank='$bank' AND number='$number' AND name='$name' ");
    if (empty($bank)) {
      	$msg='<div class="alert alert-warning"><button type="button" class="close" data-dismiss="alert">×</button><strong>Please Select Bank Name</strong>';
    } elseif (empty($number)) {
        $msg = '<div class="alert alert-warning"><button type="button" class="close" data-dismiss="alert">×</button><strong>Please Enter Your Account Number</strong>';
    } elseif (empty($name)) {
        $msg = '<div class="alert alert-warning"><button type="button" class="close" data-dismiss="alert">×</button><strong>Please Enter Your Account Name</strong>';
    }else if(strlen($number)<10)
{// Use form validation for this
$msg = '<div class="alert alert-warning"><button type="button" class="close" data-dismiss="alert">×</button><strong>Your Account number is not correct please check agian</strong>';
 }else if(strlen($name)<8)
{// Use form validation for this
$msg = '<div class="alert alert-warning"><button type="button" class="close" data-dismiss="alert">×</button><strong>Your Account name is not correct please check agian</strong>';
 } elseif (mysqli_num_rows($sub) == 1) {
        $msg = '<div class="alert alert-warning"><button type="button" class="close" data-dismiss="alert">×</button><strong>This Account exist in our database before ples try another account</b> </strong>';
}else {
 $query ="INSERT INTO kyc (username,bank,number,name) 
  VALUES ('$username','$bank','$number','$name')";
   if(mysqli_query($con,$query)) {
         mysqli_query($con, "UPDATE user SET kyc = 1 WHERE username = '$username'");
       ?>
        <script>
                 alert("Account verified succesfully");
                   window.location.replace("index.php");
             </script>
       <?php
   } else {
            $msg = '<div class="alert alert-success">
										<button type="button" class="close" data-dismiss="alert">×</button>
										<strong>There was problem while trying to Verify t your AccountNumber please try again later</strong>  
									</div>';
								
        }
    }
}
?>
<?php include '../includes/header.php'; ?>
<div class="main-panel ">
<link rel="stylesheet" href="/static/ogbam/form.css">
<link rel="stylesheet" href="/static/ogbam/form.css">
<!-- Latest compiled and minified CSS -->
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



     /*--thank you pop starts here--*/
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
    /*--thank you pop ends here--*/

</style>

<div style="padding:90px 15px 20px 15px" >
          <div class="outputc"> <?= $msg; ?></div>
      
    <h2 class="w3-center">Account Verification</h2>
        <div class="box w3-card-4">
             
        <form method="post" id='dataform'  novalidate>

             <div class="row">

                <div class="col-sm-8">

     <input type="hidden" name="csrfmiddlewaretoken" value="SwivVSWrQq0eq8bzNCr5YXzvKmDHbTQj4Ix5UD1tPiowGI2M4vZfxUILLfF3r9Ax">  
                      

 
 	<div class="">
<div id="div_id_airtime_type" class="form-group">
        
            <!--------<label for="id_airtime_type" class=" requiredField">
               Username<span class="asteriskField">*</span>
            </label>------>
         <input type="hidden" name="username"  class="textinput textInput form-control" readonly="readonly" value="<?php echo $row['username']; ?>" required>
     </div>
 </div>
        <div id="div_id_network" class="form-group">
            <label for="id_network" class=" requiredField">
                Bank Name<span class="asteriskField">*</span>
            </label>
              <div class="">
  <select name="bank" class="select form-control" required id="mySelect" onchange="checkSelect()">
   <option disabled selected>Select Bank</option>
   <?php foreach ($results['data'] as $bank) {?>
   <option value="<?php echo $bank['name']; ?>"><?php echo $bank['name']; ?></option>
  <?php } ?>
    
</select>
         
                   
 </div>
            
      
    </div>
           <div class="">
    <div id="div_id_airtime_type" class="form-group">
        
            <label for="id_airtime_type" class=" requiredField">
                Account Number<span class="asteriskField">*</span>
            </label>
             <input type="text" name="number"  class="textinput textInput form-control" required id="numb" onkeyup="checkNumb()" min="10" maxlength="10">
         </div>
     </div>
      
      <div class="">
<div id="div_id_airtime_type" class="form-group">
	<?php
	if(isset($results['data']['account_name'])){
		echo "<div class='form-group'>".$results['data']['account_name']."<div>";
	};

	?>
        
 <label for="id_airtime_type" class=" requiredField">
                Account Name<span class="asteriskField">*</span>
            </label>
         <input type="text" name="name"  class="textinput textInput form-control" required id="accountname">
     </div>
 </div>
        


                   

                   <button type="submit" name="go"  class="btn btn-primary btn-sm waves-effect waves-light">Add Bank</button>

                </div>
                <div class="col-sm-8  w3-text-brown">




                    </ul>


                </div>

                

            </div>
      </div>
  </div>
</div>












  <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/gasparesganga-jquery-loading-overlay@2.1.7/dist/loadingoverlay.min.js"></script>
  

 

</div>





















</div>
			


		</div>
	</div>
		

 
<script type="application/javascript">

</script>
	











	<?php require_once '../includes/footer.php'; ?>

</body>
 
	<?php
} else {
    echo "<script>document.location.href='logout.php'; </script>";
  exit;
}

?>
</html>
	