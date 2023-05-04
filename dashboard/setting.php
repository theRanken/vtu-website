<?php 
session_start();
if (isset($_SESSION['name'])) {
require_once "../core/conn.php";
$sql = mysqli_query($con, "SELECT * FROM user WHERE id = {$_SESSION['id']}");
            if 
            (mysqli_num_rows($sql) > 0){
              $row = mysqli_fetch_assoc($sql);
            }

   $das="11";  
$username=$row['username'];

         
$msg="";
if(isset($_POST['setting'])){
      

$bank =mysqli_real_escape_string($con, $_POST['bank']);
$name =mysqli_real_escape_string($con, $_POST['name']);
$number = mysqli_real_escape_string($con,$_POST['number']);
      
  if(!empty($bank) && !empty($name) && !empty($number)){
$updat = mysqli_query($con,"UPDATE kyc SET bank='$bank',name='$name',number='$number' WHERE username='$username' ") or die(mysqli_error()); 

    $msg= "
  
  <div class='alert alert-success'>
    Account Updated Successfully
  </div>
  
  <script>
setTimeout(function(){ window.location.href='account.php' }, 1000);</script>
   ";

 }else{
   
  $msg= "<div class='alert alert-danger'>No Entry made </div>"; 
   };
       
    }; 


?>
<?php include '../includes/header.php'; ?>
		<div class="main-panel ">
				
	<link rel="stylesheet" href="/static/ogbam/form.css">		


<div style="padding:90px 15px 20px 15px" >


    <h2 class="w3-center">Edit Profile</h2>

    <div class="box w3-card-4">
   <div class="outputc"> <?= $msg; ?></div>
        <form method='post'>


            <div class="row">

                <div class="col-sm-8">

                    <input type="hidden" name="csrfmiddlewaretoken" value="wn0sfATgsgAp7VdXipPoueYJHJtJFGm5P3yMPmnewZVU9cLFg76fxia3gagsYxHl"> 






 <?php
 $msg="";
    $usernames=$row['username'];
    
    $sql = mysqli_query($con, "SELECT * FROM kyc WHERE username ='$usernames'");
            if 
            (mysqli_num_rows($sql) > 0){
              $adex = mysqli_fetch_assoc($sql);
            }
              
              $query = "SELECT * FROM kyc WHERE username='$username'";
              $result = mysqli_query($con, $query);
              if (mysqli_num_rows($result) == 0) {
                echo "
 
  <div class='alert alert-danger'>
    NO Account Number Found
  </div>
  
  <script>
setTimeout(function(){ window.location.href='kyc.php' }, 1000);</script>
   ";
              }
			  else{
              ?>
              <?php
              while ($bank = mysqli_fetch_array($result)) {
                $id = $bank['id'];
                $banks = $bank['bank'];
                $number = $bank['number'];
                $name = $bank['name'];
                
                 
             
             ?>

    
    <div id="div_id_BankName" class="form-group">
        
            <label for="id_BankName" class="">
                BankName
            </label>
        

        <input type="text" name="bank" value="<?=$banks; ?>" class="form-control" id="id_BankName" placeholder="Enter Bank Name" required />
        

    
            
        
    </div>
    









    
    <div id="div_id_AccountName" class="form-group">
        
            <label for="id_AccountName" class="">
                AccountName
            </label>
        

        

        

        
            
                <div class="">
                    <input type="text" name="name" value="<?php echo $adex['name']; ?>"  class="textinput textInput form-control" id="id_AccountName">
                    


    




    



                </div>
            
        
    </div>
    









    
    <div id="div_id_AccountNumber" class="form-group">
        
            <label for="id_AccountNumber" class=" requiredField">
                Accountnumber<span class="asteriskField">*</span>
            </label>
        

        

        

        
            
                <div class="">
                    <input type="text" name="number" value="<?php echo $adex['number']; ?>"  class="textinput textInput form-control" required id="id_AccountNumber" minlength="10" maxlength="10">
                    


    




    <?php } }?> 



                </div>
            
        
    </div>
  
  <button type="submit" class="btn" style='margin-bottom:15px;' name="setting" >Proceed</button>
</form>

                </div>
                <div class="col-sm-8  ">



                    

            </div>







    </div>

</div>
			


		</div>
	</div>
		

	<!-- GetButton.io widget -->


<?php require_once '../includes/footer.php'; ?>	</body>
	</html>





 
	<?php
} else {
    echo "<script>document.location.href='logout.php'; </script>";
  exit;
}

?>
</html>






	