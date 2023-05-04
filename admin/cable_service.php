<?php 
session_start();
if(isset( $_SESSION['admin'])) {
require_once '../core/conn.php';
$das="6";

$sql = mysqli_query($con, "SELECT * FROM admin WHERE id = {$_SESSION['admin']}");
            if 
            (mysqli_num_rows($sql) > 0){
              $row = mysqli_fetch_assoc($sql);
            }
            ?>
<?php include 'include/header.php';
include 'include/nav.php';
?>
<?php
$chek = mysqli_query($con, "SELECT * FROM cable_lock");
 $adex = mysqli_fetch_array($chek);
?>
<div class="main-panel ">
				

<link rel="stylesheet" href="/static/ogbam/form.css">

<div style="padding:90px 15px 20px 15px" >


    <h2 class="w3-center">CABLE SERVICE</h2>

    <div class="box w3-card-4">
         <form method='post'>


            <div class="row">

                <div class="col-sm-8">

                    <input type="hidden" name="csrfmiddlewaretoken" value="on68V8UnKhKU3dHAzRgMJK5IcJXz5GpAp89hIUMR5ijpPjQYTHmceDYINHogi1pK"> 
                    
                    <div id="div_id_amount" class="form-group">
        
            <label for="id_amount" class="">
                STARTIME
            </label>
                 <div class="">
            <select name="status" class="select form-control" required id="startime">
    <option value="on" <?php if($adex['startime'] == 'on') echo "selected" ?>>Enable</option>
    <option value="off" <?php if($adex['startime'] == 'off') echo "selected" ?>>Disable</option>
          </select>      

                </div>
    </div> 

                    <div id="div_id_amount" class="form-group">
        
            <label for="id_amount" class="">
                DSTV
            </label>
                 <div class="">
            <select name="status" class="select form-control" required id="dstv">
    <option value="on <?php if($adex['dstv'] == 'on') echo "selected" ?>">Enable</option>
    <option value="off" <?php if($adex['dstv'] == 'off') echo "selected" ?>>Disable</option>
          </select>      

                </div>
    </div> 
    
    
                    <div id="div_id_amount" class="form-group">
        
            <label for="id_amount" class="">
                GOTV
            </label>
                 <div class="">
            <select name="status" class="select form-control" required id="gotv">
    <option value="on" <?php if($adex['gotv'] == 'on') echo "selected" ?> >Enable</option>
    <option value="off" <?php if($adex['gotv'] == 'off') echo "selected" ?> >Disable</option>
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
<!------ start here ------->
<script>
$("#bonous").click(function() {
var gotv = $('#gotv').find(":selected").val();
var startime = $('#startime').find(":selected").val();
var dstv = $('#dstv').find(":selected").val();
 swal({
  title: "Dear ADMIN",
  text: "Are you sure?",
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
       url: '../assets/cable_service.php',
    
         data:{
                gotv:gotv,
                dstv:dstv,
                startime:startime
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
   <!---- end start user ----->

<?php include 'include/footer.php'; ?>
<?php
} else {
    echo "<script>document.location.href='logout.php'; </script>";
  exit;
}

?>