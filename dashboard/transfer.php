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
             $checkpin=$row['pin'];
        if ($checkpin == '') {
    echo "<script>
alert('you have not create a pin please create a transaction pin');
window.location.href='newpin.php';</script>";
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


    <h2 class="w3-center">Transfer to another account</h2>

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
                    <input type="number" name="amount" maxlength="30" class="textinput textInput form-control" oninput="checkref()" id="amount">
                    


    




    



                </div>
            
        
    </div>
    
 <div id="div_id_amount" class="form-group">
        
            <label for="id_amount" class="">
                Account username
            </label>
        
            
                <div class="">
                    <input type="text" name="username" maxlength="30" class="textinput textInput form-control"  id="username">
                

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
      var username = $("#username").val();
 swal({
  title: "Dear <?php echo $row['name'];?>",
  text: "Do you really want to transfer" + ' '+ "N" + amount + ' ' + "to this user account" + ' ' + username + '',
  icon: "warning",
  buttons: true,
  dangerMode: true,
})
.then((willDelete) => {
  if (willDelete) {
      swal("Enter Your Transaction Pin:", {
    content: "input",
  }).then((value) => {
    $.ajax({
      type:'POST',
       beforeSend: function(){
    $.LoadingOverlay("show");
            },
       url: '../assets/checkpin.php',
         data:{
            id: <?php echo $row['id'] ?>,
            value: value
                        },
      dataType: 'json',
   success: function (response){
                $.LoadingOverlay("show");
            if (response.status == 0){
                $.LoadingOverlay("hide");
             swal("Oops!","You have entered in correct password","error")
            }else{
    $.ajax({
       type:'POST',
       beforeSend: function(){
         $.LoadingOverlay("show");
            },
       url: '../assets/transfer.php',
    
         data:{
            id: <?php echo $row['id'] ?>,
                amount: amount,
                username: username
                        },
       dataType: 'json',
       success: function (response) {
            $.LoadingOverlay("hide");
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
        
       
                
            }
            
        
   },
        complete: function(){
         $.LoadingOverlay("hide");
    }     
            
    });
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
