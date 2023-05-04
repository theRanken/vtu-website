<?php
session_start();
if (isset($_SESSION['name'])) {
require_once '../core/conn.php';
require_once '../core/api.php';
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
$chek = mysqli_query($con,"SELECT * FROM pay");
 $pdata = mysqli_fetch_array($chek);
$min=$pdata['minl'];
$bal=$row['bal'];
            ?>
		<!-- End Sidebar -->
 <?php include '../includes/header.php'; ?>
		<div class="main-panel ">
				

<link rel="stylesheet" href="/static/ogbam/form.css">

<div style="padding:90px 15px 20px 15px" >


    <h2 class="w3-center">Account Booster</h2>

    <div class="box w3-card-4">

        <form method='post'>


            <div class="row">

                <div class="col-sm-8">

                    <input type="hidden" name="csrfmiddlewaretoken" value="on68V8UnKhKU3dHAzRgMJK5IcJXz5GpAp89hIUMR5ijpPjQYTHmceDYINHogi1pK"> 
 <div id="div_id_amount" class="form-group">
 <label for="id_network" class=" requiredField">
                Account Type<span class="asteriskField">*</span>
            </label>
              <div class="">
  <select name="net" class="select form-control"  id="adex" onchange="active_disactive_user(this.value)" required>
   <?php 
       $types="ACCOUNT";
   $sql = "SELECT * FROM categories WHERE type='$types'"; $result = $con->query($sql); if ($result->num_rows > 0) {
              while($rows = $result->fetch_assoc())
              
              $plansValue .="<option data=\"{$rows["name"]}\" networkid=\"{$rows["networkid"]}\"value=\"{$rows["id"]}\">{$rows["name"]} </option>"; }?>
    <option value="">Select Network</option>
    <?php echo $plansValue; ?>

</select>
                    
 </div>
            
       <input type="hidden" name="network" id="network">
       <input type="hidden" name="networkid" id="networkid">
    </div>
    <div id="div_id_amount" class="form-group">
     <label for="id_airtime_type" class=" requiredField">
                Plans<span class="asteriskField">*</span>
            </label>
      
                <div class="">
                    <select name="price" class="select form-control" id="airtime" onchange="active_disactive(this.value)" required>
  <option value="" >Seclect Plans</option>

<input type="hidden" name="plan" id="plan">
<input type="hidden" name="planid" id="planid">
</select>
    
    
    <div id="div_id_amount" class="form-group">
        
            <label for="id_amount" class="">
                Amount
            </label>
        
            
                <div class="">
                    <input type="text" name="amount" maxlength="30" class="textinput textInput form-control" oninput="checkref()" id="amount">
                    


    




    



                </div>
            
        
    </div>
    
 
    



    

                    <a href="javascript:void(0)" id="bonous" ><button type="button" class="btn" style='margin-bottom:15px;' >Proceed</button></a>
                   	
                </div>
                <div class="col-sm-4  ">
            </div>






    </div>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
$("#bonous").click(function() {
    var plan = $("#plan").val();
     var mobile = $("#mobile").val();
     
 swal({
  title: "Dear <?php echo $row['name'];?>",
  text: "Are  you  sure you want to purchase" + ' ' + plan + ' ' + "for" + ' ' + mobile,
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
       url: '../assets/booster.php',
    
         data:{
            id: <?php echo $row['id'] ?>,
                amount: amount
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


<?php include '../includes/footer.php'; ?>

<?php if($min > $min) { ?>
<script>
$( document ).ready(function() {
swal({
 
  text: "<?php echo $row['name'];?>, Your  Wallet is below minimum  amount ₦<?php echo $bal;?>",
  icon: "info",
  button: "ok",
  timer: 60000,
}).then(() => {
  window.location="index.php"
});
});
</script>
<?php } else { ?>
<?php } 
exit; 
?>
</body>
 
	<?php
} else {
    echo "<script>document.location.href='logout.php'; </script>";
  exit;
}

?>
</html>
