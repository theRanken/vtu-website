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
$chek = mysqli_query($con, "SELECT * FROM data_lock");
 $adex = mysqli_fetch_array($chek);
?>
<div class="main-panel ">
				

<link rel="stylesheet" href="/static/ogbam/form.css">

<div style="padding:90px 15px 20px 15px" >


    <h2 class="w3-center">Data service</h2>

    <div class="box w3-card-4">
         <form method='post'>


            <div class="row">

                <div class="col-sm-8">

                    <input type="hidden" name="csrfmiddlewaretoken" value="on68V8UnKhKU3dHAzRgMJK5IcJXz5GpAp89hIUMR5ijpPjQYTHmceDYINHogi1pK"> 
                    
                    
                    <div id="div_id_amount" class="form-group">
        
            <label for="id_amount" class="">
                MTN Gifting Data
            </label>
                 <div class="">
            <select name="status" class="select form-control" required id="mtn_gifting">
    <option value="on" <?php if($adex['ntn_gifting'] == 'on') echo "selected" ?>>Enable</option>
    <option value="off"<?php if($adex['mtn_gifting'] == 'off') echo "selected" ?>>Disable</option>
          </select>      

                </div>
            
        
    </div> 
 
                    <div id="div_id_amount" class="form-group">
        
            <label for="id_amount" class="">
                MTN SME Data
            </label>
                 <div class="">
            <select name="status" class="select form-control" required id="mtn_sme">
    <option value="on" <?php if($adex['mtn_sme'] == 'on') echo "selected" ?>>Enable</option>
    <option value="off" <?php if($adex['mtn_sme'] == 'off') echo "selected" ?>>Disable</option>
          </select>      

                </div>
            
        
    </div> 


                    <div id="div_id_amount" class="form-group">
        
            <label for="id_amount" class="">
                GLO Data
            </label>
                 <div class="">
            <select name="status" class="select form-control" required id="glo_data">
    <option value="on" <?php if($adex['glo_data'] == 'on') echo "selected" ?>>Enable</option>
    <option value="off" <?php if($adex['glo_data'] == 'off') echo "selected" ?>>Disable</option>
          </select>      

                </div>
    </div> 

                    <div id="div_id_amount" class="form-group">
        
            <label for="id_amount" class="">
                AIRTEL  Data
            </label>
                 <div class="">
            <select name="status" class="select form-control" required id="airtel_data">
    <option value="on <?php if($adex['airtel_data'] == 'on') echo "selected" ?>">Enable</option>
    <option value="off" <?php if($adex['airtel_data'] == 'off') echo "selected" ?>>Disable</option>
          </select>      

                </div>
    </div> 
    
    
                    <div id="div_id_amount" class="form-group">
        
            <label for="id_amount" class="">
                9MOBILE  Data
            </label>
                 <div class="">
            <select name="status" class="select form-control" required id="9mobile_data">
    <option value="on" <?php if($adex['9mobile_data'] == 'on') echo "selected" ?> >Enable</option>
    <option value="off" <?php if($adex['9mobile_data'] == 'off') echo "selected" ?> >Disable</option>
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
var mtn_gifting = $('#mtn_gifting').find(":selected").val();
var mtn_sme = $('#mtn_sme').find(":selected").val();
var airtel_data = $('#airtel_data').find(":selected").val();
var glo_data = $('#glo_data').find(":selected").val();
var mobile_data = $('#9mobile_data').find(":selected").val();
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
       url: '../assets/data_service.php',
    
         data:{
                mtn_gifting:mtn_gifting,
                mtn_sme:mtn_sme,
                airtel_data:airtel_data,
                glo_data:glo_data,
                mobile_data:mobile_data
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