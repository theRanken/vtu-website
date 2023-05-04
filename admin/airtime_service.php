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
$chek = mysqli_query($con, "SELECT * FROM airtime_lock");
 $adex = mysqli_fetch_array($chek);
?>
<div class="main-panel ">
				

<link rel="stylesheet" href="/static/ogbam/form.css">

<div style="padding:90px 15px 20px 15px" >


    <h2 class="w3-center">AIRTIME service</h2>

    <div class="box w3-card-4">
         <form method='post'>


            <div class="row">

                <div class="col-sm-8">

                    <input type="hidden" name="csrfmiddlewaretoken" value="on68V8UnKhKU3dHAzRgMJK5IcJXz5GpAp89hIUMR5ijpPjQYTHmceDYINHogi1pK"> 
                    
                    <div id="div_id_amount" class="form-group">
        
            <label for="id_amount" class="">
                MTN AIRTIME
            </label>
                 <div class="">
            <select name="status" class="select form-control" required id="mtn_vtu">
    <option value="on" <?php if($adex['mtn_vtu'] == 'on') echo "selected" ?>>Enable</option>
    <option value="off" <?php if($adex['mtn_vtu'] == 'off') echo "selected" ?>>Disable</option>
          </select>      

                </div>
            
        
    </div> 


                    <div id="div_id_amount" class="form-group">
        
            <label for="id_amount" class="">
                GLO AIRTIME
            </label>
                 <div class="">
            <select name="status" class="select form-control" required id="glo_vtu">
    <option value="on" <?php if($adex['glo_vtu'] == 'on') echo "selected" ?>>Enable</option>
    <option value="off" <?php if($adex['glo_vtu'] == 'off') echo "selected" ?>>Disable</option>
          </select>      

                </div>
    </div> 

                    <div id="div_id_amount" class="form-group">
        
            <label for="id_amount" class="">
                AIRTEL  AIRTIME
            </label>
                 <div class="">
            <select name="status" class="select form-control" required id="airtel_vtu">
    <option value="on <?php if($adex['airtel_vtu'] == 'on') echo "selected" ?>">Enable</option>
    <option value="off" <?php if($adex['airtel_vtu'] == 'off') echo "selected" ?>>Disable</option>
          </select>      

                </div>
    </div> 
    
    
                    <div id="div_id_amount" class="form-group">
        
            <label for="id_amount" class="">
                9MOBILE AIRTIME
            </label>
                 <div class="">
            <select name="status" class="select form-control" required id="9mobile_vtu">
    <option value="on" <?php if($adex['9mobile_vtu'] == 'on') echo "selected" ?> >Enable</option>
    <option value="off" <?php if($adex['9mobile_vtu'] == 'off') echo "selected" ?> >Disable</option>
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
var mtn_vtu = $('#mtn_vtu').find(":selected").val();
var glo_vtu = $('#glo_vtu').find(":selected").val();
var airtel_vtu = $('#airtel_vtu').find(":selected").val();
var mobile_vtu = $('#9mobile_vtu').find(":selected").val();
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
       url: '../assets/airtime_service.php',
    
         data:{
                mtn_vtu:mtn_vtu,
                airtel_vtu:airtel_vtu,
                glo_vtu:glo_vtu,
                mobile_vtu:mobile_vtu
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