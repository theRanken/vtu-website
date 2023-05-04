<?php
session_start();
require_once "../core/conn.php";

if(isset( $_SESSION['username'])) {
?>
<?php 
 $id=$_GET['id'];
if(isset($_POST['register'])) {

  $query1 = "DELETE from user WHERE id='$id'";
        
        if(mysqli_query($con, $query1)) {
        
    echo "<div class='alert alert-info'><center>".'Success:, User Record Deleted..'."</center></div>";
     ?>
           <script>
               document.location.href='dashboard.php';
           </script>
           <?php 
     exit;
    } 
     else{
        echo "<div class='alert alert-danger'><center>".'Error with Query..'."</center></div>";
    }
} 

$time=time();
$date= date('d-m-y', $time);
?>
<!DOCTYPE html>
<html lang="en">
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $web['name'];?></title>
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/dataTables.bootstrap.css">
  <link rel="stylesheet" href="css/dataTables.responsive.css">
  <link rel="stylesheet" href="font/css/fontawesome.css">
  <link rel="stylesheet" href="font/css/fontawesome.min.css">
  <link rel="stylesheet" href="font/css/all.css">
  <link rel="stylesheet" href="font/css/all.min.css">
  <link href="css/simple-sidebar.css" rel="stylesheet">
    <style>
       #reg{
        text-allign:center !important;
       }

    </style>
   
</head>
<?php 
     

      $query="SELECT * FROM user WHERE id='$id'" or die (mysqli_error());
      $result= mysqli_query($con,$query);
      while($row=mysqli_fetch_assoc($result)){
        $id=$row['id'];
        $name=$row['name'];
       
      }
      ?>
<body style="background-image: url('imags/bg.jpg');">

<div class=" col-sm-12 container-fluid ">
   
   
    <br>  <br>  <br>  <br>  <br>  <br>  <br>  <br>  <br>  <br>  <br>  <br>  <br> 

</div>
<div class="row justify-content-center bg-white text-white" style="padding-top:0px;padding-right:10px;margin-top:0px;">
          
        <form action="" method="POST" name="register">
            <div class="form-group">
                <div class="alert alert-danger">
               <center> <h3> Are you sure you want to Delete? <br>  <?php echo $name."?" ;?> </h3> </center>
                </div>
            </div>
             <br> 
             </div>
             <div class="row justify-content-center bg-white text-white" style="padding-top:0px;padding-right:10px;margin-top:0px;">
            <div class="form-group">        
                <div class="checkbox">
                    <a class="btn btn-primary"   id="login-button" href="users.php"> No <span class="glyphicon glyphicon-off"></span></a>
                    <button 
                        type="submit" class="btn btn-danger pull-right"
                        id="login-button" name="register">Yes <span class="glyphicon glyphicon-trash"></span>
                    </button>
                </div>
            </div>
        
        </form>
        </div>
    <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="js/dataTables.bootstrap.min.js"></script>
  <script src="js/dataTables.responsive.js"></script>
  <script src="js/jquery.dataTables.min.js"></script>
  <script src="font/js/fontawesome.js"></script>
  <script src="font/js/fontawesome.min.js"></script>
  <script src="font/js/all.min.js"></script>
  <script src="font/js/all.js"></script>
</body>
<html>
<?php
} else {
   ?>
            <script>
               document.location.href='/logout';
           </script>
           <?php
}

?>