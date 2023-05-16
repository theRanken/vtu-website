<?php
session_start();
if (isset($_SESSION['name'])) {
require_once '../core/conn.php';

	$aemail=$web['email'];
$sql = mysqli_query($con, "SELECT * FROM user WHERE id = {$_SESSION['id']}");
            if 
            (mysqli_num_rows($sql) > 0){
              $row = mysqli_fetch_assoc($sql);
            }
    $das="";        
    $msg="";
            
    if(isset($_POST['rate'])){
     $username=$_POST['username'];
     $message=$_POST['message'];
     $status="0";
    date_default_timezone_set('Africa/Lagos');
   $date=date("l j<\s\up>S</\s\up>, F Y @ g:ia");
   
    $query= mysqli_query($con,"INSERT INTO rate (username,message,status,date) VALUES('$username','$message','$status','$date')")or die(mysqli_error($con));
     if($query){
         $msg ='<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">×</button><strong><span> '.$username.'</span>. Thank You For Rating Our Service</strong>';
         ?>
         <!--<script>document.location.href="index.php";</script> -->
         <?php
     } 
     else{
         $msg ='<div class="alert alert-warning"><button type="button" class="close" data-dismiss="alert">×</button><strong><span> '.$username.'</span>, there was problem submitting your comment please try again later</strong>';
     }
     
 }


    ?>


<?php include '../includes/header.php'; ?>
		<div class="main-panel ">
				

<link rel="stylesheet" href="static/ogbam/form.css">
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
   

</style>

<div style="padding:90px 15px 20px 15px" >

<div style="padding:90px 15px 20px 15px" >

          
      
    <h2 class="w3-center">Rate Our Service</h2>
    
    <div class="outputc"><?= $msg; ?></div>
        <div class="box w3-card-4">


<form method="post" id='dataform'  novalidate>

             <div class="row">

                <div class="col-sm-8">

     <input type="hidden" name="csrfmiddlewaretoken" value="SwivVSWrQq0eq8bzNCr5YXzvKmDHbTQj4Ix5UD1tPiowGI2M4vZfxUILLfF3r9Ax">  
                      

 
 	<div class="">
<div id="div_id_airtime_type" class="form-group">
        
            <label for="id_airtime_type" class=" requiredField">
               Username<span class="asteriskField">*</span>
            </label>
         <input type="text" name="username"  class="textinput textInput form-control" readonly="readonly" value="<?php echo $row['username']; ?>" required>
     </div>
 </div>
<div id="div_id_network" class="form-group">
            <label for="id_network" class=" requiredField">
                Message<span class="asteriskField">*</span>
            </label>
            
<textarea name="message" class="form-control rounded-0" placeholder="Write Your Comment" required></textarea>
    
 <button type="submit" class="btn" name="rate" style='color: white;' id ="">Rate Now</button>

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
		

 <?php require_once '../includes/footer.php'; ?>

</body>
 
	<?php
} else {
    echo "<script>document.location.href='logout.php'; </script>";
  exit;
}

?>
</html>
	