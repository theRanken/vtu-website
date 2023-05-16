<?php
session_start();
if (isset($_SESSION['name'])) {
require_once '../core/conn.php';
require_once '../core/api.php';
$das="7";
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
$min=$pdata['refbal'];
$refbal=$row['refbal'];
            ?>
		<!-- End Sidebar -->
 <?php include '../includes/header.php'; ?>
		<div class="main-panel ">
				

<link rel="stylesheet" href="/static/ogbam/form.css">

<div style="padding:90px 15px 20px 15px" >


    <h2 class="w3-center">Transfer your bonus to your wallet</h2>

    <div class="box w3-card-4">

        <form method='post'>


            <div class="row">

                <div class="col-sm-8">

                    <input type="hidden" name="csrfmiddlewaretoken" value="on68V8UnKhKU3dHAzRgMJK5IcJXz5GpAp89hIUMR5ijpPjQYTHmceDYINHogi1pK"> 







    
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
    var amount = $("#amount").val();
 swal({
  title: "Dear <?php echo $row['name'];?>",
  text: "Do you really want to transfer" + ' ' + amount + ' ' + "to your main wallet click yes to continue",
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
       url: '../assets/bonous.php',
    
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

<?php if($min > $refbal) { ?>
<script>
$( document ).ready(function() {
swal({
 
  text: "<?php echo $row['name'];?>, Your Referal Wallet is below minimum referal amount ₦<?php echo $min;?>",
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
