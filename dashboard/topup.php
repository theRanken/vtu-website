<?php 
session_start();
if(isset( $_SESSION['name'])) {
require_once '../core/conn.php';
require '../assets/airtimeprice.php';
$aemail=$web['email'];
$das="2";
$qrysite = mysqli_query($con,"SELECT * FROM pay");
$setup = mysqli_fetch_array($qrysite);
$min=$setup['min'];

$sql = mysqli_query($con, "SELECT * FROM user WHERE id = {$_SESSION['id']}");
            if 
            (mysqli_num_rows($sql) > 0){
              $row = mysqli_fetch_assoc($sql);
            }
          $checkpin=$row['pin'];
          $bal=$row['bal'];
        
$chek = mysqli_query($con, "SELECT * FROM airtime_lock");
  $adex = mysqli_fetch_array($chek);
?>
<?php require_once '../includes/header.php'; ?>
    <!-- Sidebar -->
    
    <!-- End Sidebar -->

    <div class="main-panel ">
        

<link rel="stylesheet" href="/static/ogbam/form.css">
<!-- Latest compiled and minified CSS -->

<!-- jQuery library -->



<div style="padding:90px 15px 20px 15px" >
   <div class="outputc"> <?= $msg; ?></div>
      
    <h2 class="w3-center">Airtime TopUp</h2>
        <div class="box w3-card-4">
             
        <form method="post" id='dataform'  novalidate>

             <div class="row">

                <div class="col-sm-8">

     <input type="hidden" name="csrfmiddlewaretoken" value="SwivVSWrQq0eq8bzNCr5YXzvKmDHbTQj4Ix5UD1tPiowGI2M4vZfxUILLfF3r9Ax">  
                
 <div id="div_id_network" class="form-group">
        
            <label for="id_network" class=" requiredField">
                Network<span class="asteriskField">*</span>
            </label>
              <div class="">
    <select name="network" class="select form-control" required id="network">
  <option value="">---------</option>
  <option value="1" networkname="MTN" <?php if($adex['mtn_vtu'] == "off") echo 'style="display: none;"'; ?>>MTN</option>
  <option value="4" networkname="AIRTEL" <?php if($adex['airtel_vtu'] == "off") echo 'style="display: none;"'; ?>>AIRTEL</option>
  <option value="2" networkname="GLO" <?php if($adex['glo_vtu'] == "off") echo 'style="display: none;"'; ?>>GLO</option>
  <option value="3" networkname="9MOBILE" <?php if($adex['9mobile_vtu'] == "off") echo 'style="display: none;"'; ?>>9MOBILE</option>
</select>
 </div>        
    </div>
           <div class="">
    <div id="div_id_airtime_type" class="form-group">
            <label for="id_airtime_type" class=" requiredField">
                Amount<span class="asteriskField">*</span>
            </label>
                <div class="">
   <input type="number" name="amount" min="100" class="numberinput form-control" required id="amount">
                    
                </div>
                    
<small id="hint_id_airtime_type" class="form-text text-muted">Enter the price of the airtime</small>
      </div>
            
    </div>
      <div class="">
<div id="div_id_airtime_type" class="form-group">
        
            <label for="id_airtime_type" class=" requiredField">
                Airtime Type<span class="asteriskField">*</span>
            </label>
        

  <div class="">
        <select name="type" class="select form-control" id="type">
  <option value="VTU" data="VTU" selected>VTU</option>
  <option value="Share and Sell" data="Share and Sell">Share And Sell</option>

</select>
 <small id="hint_id_airtime_type" class="form-text text-muted">VTU or share and Sell</small>
                    </div>
        
    </div>

<div id="div_id_mobile_number" class="form-group">
        
            <label for="id_mobile_number" class=" requiredField">
                Mobile number<span class="asteriskField">*</span>
            </label>
        

                <div class="">
                    <input type="text" name="mobile" maxlength="11" minlength="11" class="textinput textInput form-control" required id="phone"  onkeyup="verifyNetwork()" >
                    
                      <p  id='me'> </p>
<span id="verifyer"></span>
                </div>
    </div>
    
    
    <div id="div_id_mobile_number" class="form-group">
        
            <label for="id_mobile_number" class=" requiredField">
                Amount To Pay<span class="asteriskField">*</span>
            </label>
        
                <div class="">
                    <input type="text" name="mobile" readonly class="textinput textInput form-control" required id="amount_pay">
                    
                </div>
    </div>
    
    

<div id="div_id_Ported_number" class="form-check">
        

                    <input type="checkbox" name="Ported_number" class="checkboxinput form-check-input" id="id_Ported_number">
                
                <label for="id_Ported_number" class="form-check-label">
                    Bypass number validator 
                </label>
    </div>
    
        </div>
             <label><b>Discount </b>  <span class="price" id="discount"></span></label>
     

                <a href="javascript:void(0)" id="button" ><button type="button" class="btn" style='margin-bottom:15px;' name="button" >Proceed</button></a>

                </div>
                <div class="col-sm-8  w3-text-brown">




                    </ul>


               </div>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="adex_developer.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/gasparesganga-jquery-loading-overlay@2.1.7/dist/loadingoverlay.min.js"></script>
  

 
 <script>
    $(document).ready(function() {
        
       $("#type ,#network").change(function() {

            var selectednetwork =$("#network option:selected").val();
            var selectedtype = $("#type option:selected").val();
            var network =$('#network').find(":selected").attr('networkname');

        console.log(selectedtype)
       
        console.log(selectedtype)

        if (selectedtype == "VTU"){
            if (network  == "MTN") {
              $("#amount").keyup(function() {
                    $("#charge").text('N' + (Number($("#amount").val()) * Number("0.<?php echo $airtimemtn; ?>")));
                    $("#amount_pay").val((Number($("#amount").val()) * Number("0.<?php echo $airtimemtn; ?>")));
                 $("#discount").text( (100 - Number("0.<?php echo $airtimemtn; ?>") * 100 )  + '% Discount');

                });

            }

            else if (network  == "GLO") {
                 $('form button[type="button"]').prop("disabled", false);
                $("#amount").keyup(function() {
                    $("#charge").text('N' + (Number($("#amount").val()) * Number("0.<?php echo $airtimeglo; ?>")));
                    $("#amount_pay").val((Number($("#amount").val()) * Number("0.<?php echo $airtimeglo; ?>")));
                  $("#discount").text( (100 - Number("0.<?php echo $airtimeglo; ?>") * 100)  + '% Discount');


                });

            }
            else if (network  == "AIRTEL") {
                 $('form button[type="button"]').prop("disabled", false);
                $("#amount").keyup(function() {
                    $("#charge").text('N' + (Number($("#amount").val()) * Number("0.<?php echo $airtimeair; ?>")));
                    $("#amount_pay").val((Number($("#amount").val()) * Number("0.<?php echo $airtimeair; ?>")));
                  $("#discount").text( (100 - Number("0.<?php echo $airtimeair; ?>") * 100)  + '% Discount');


                });

            }else if (network  == "9MOBILE") {
                 $('form button[type="button"]').prop("disabled", false);
                $("#amount").keyup(function() {
                    $("#charge").text('N' + (Number($("#amount").val()) * Number("0.<?php echo $airtimeet; ?>")));
                    $("#amount_pay").val((Number($("#amount").val()) * Number("0.<?php echo $airtimeet; ?>")));
                  $("#discount").text( (100 - Number("0.<?php echo $airtimeet; ?>") * 100)  + '% Discount');


                });

            }

            }

            else {

                  if (network  == "MTN") {

                $("#amount").keyup(function() {
                    $("#charge").text('N' + (Number($("#amount").val()) * Number("1.0")));
                    $("#amount_pay").val((Number($("#amount").val()) * Number("1.0")));
                  $("#discount").text(( 100 - Number("1.0") * 100)  + '% Discount');

                });

            }

            else if (network  == "GLO") {
                 $('form button[type="button"]').prop("disabled", false);
                $("#amount").keyup(function() {
                    $("#charge").text('N' + (Number($("#amount").val()) * Number("1.0")));
                    $("#amount_pay").val((Number($("#amount").val()) * Number("1.0")));
                   $("#discount").text( (100 - Number("1.0") * 100)  + '% Discount');


                });

            }
            else if (network  == "AIRTEL") {
                 $('form button[type="button"]').prop("disabled", false);
                $("#amount").keyup(function() {
                    $("#charge").text('N' + (Number($("#amount").val()) * Number("1.0")));
                    $("#amount_pay").val((Number($("#amount").val()) * Number("1.0")));
                  $("#discount").text( (100 - Number("1.0") * 100)  + '% Discount');


                });

            }else if (network  == "9MOBILE") {
                 $('form button[type="button"]').prop("disabled", false);
                $("#amount").keyup(function() {
                    $("#charge").text('N' + (Number($("#amount").val()) * Number("1.0")));
                    $("#amount_pay").val((Number($("#amount").val()) * Number("1.0")));
                  $("#discount").text(( 100- Number("1.0") * 100)  + '% Discount');


                });

            }


            }


        });





    });
</script>
 
 



<script>
  $("#button").click(function() {
 var mobile = $("#phone").val();
 var amount = $("#amount").val();
 var price = $("#amount_pay").val();
 var network = $('#network').find(":selected").attr('networkname');
 var networkid = $("#network").find(":selected").val();
  var type = $('#type').find(":selected").val();
  var ported_number = $('#id_Ported_number').is(":checked");
  var token = "<?php echo  base64_encode($row['apikey']); ?>";
   var url = "/api/topup";
    var key = atob(token);
  
  if (mobile=="" || price=="" || networkid=="" || network=="" || amount == " "){

           swal("Opps", "Please kidnly fill all the form", "error")

          return false;
        }
        else if (mobile.length < "11"){
            swal("Opps", "The phone number must be 11 digit", "error")

          return false;
        }else
        {

        swal({
  title: "Dear <?php echo $row['name'];?>",
  text: "You're about to send " + network + " ₦" + amount + " to " + mobile,
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
       timeout:8000, // i set  8 seconds for the transtion
   success: function (response){
            if (response.status == 0){
                $.LoadingOverlay("hide");
             swal("Oops!","You have entered in correct password","error")
            }else{
      $.ajax({
   type: 'POST',
     beforeSend: function(){
    $.LoadingOverlay("show");
            },
    url: '/api/topup/',
    dataType: 'json',
    headers: {
        'Authorization' : 'Token ' + key
    },
    
     data: JSON.stringify({
      "network": networkid,
    "mobile_number": mobile,
 "Ported_number": ported_number,
 "airtime_type": type,
 "amount":amount
       }),
       
  success: function (data){
      if (data.status === "successful") {
                             swal({
                                 title: "Transaction Successful!",
                text: "you sent " + data.amount + " " + data.network + " airtime to " + data.mobile_number,                                                 
                icon: "success",
                                        button: "View Reciept!",
                                            })
                                        $('.swal-button--confirm').click(function () {
                                                    $.ajax({
                                                        beforeSend: function () {
                                                            $.LoadingOverlay("show");
                                                        },
                                                        success: window.location.href = 'airtimeprint.php?id=' + String(data.transid)
                                                    });
                                                });
                                            } else {
                                                swal({
                                                    title: "Error!",
                                                    text: "Yo! An error occured",
                                                    icon: "error",
                                                    button: "View reciept",
                                                })
                                                $('.swal-button--confirm').click(function () {
                                                    $.ajax({
                                                        beforeSend: function () {
                                                            $.LoadingOverlay("show");
                                                        },
                                                        success: window.location.href = 'airtimeprint.php?id=' + String(data.transid)
                                                    });
                                                });


                                            }
  },
  
  
                      error: function(XMLHttpRequest, textStatus, errorThrown) {
                                        $.LoadingOverlay("hide");
                                                     console.log(errorThrown)
                                        if (String(JSON.parse(XMLHttpRequest.status)) == 500) {
                                            swal("Oops!", "Something went wrong please contact admin ", "error")
                                        } else if (JSON.parse(XMLHttpRequest.responseText).msg){
                                            swal("Oops!", String(JSON.parse(XMLHttpRequest.responseText).msg), "error")
                                        } else {
                                            swal("Oops!", String(XMLHttpRequest.responseText), "error")
                                        }
                                    },
                                    
                                    complete: function() {
        $.LoadingOverlay("hide");
                    }
  
});

    }
},
            

             error: function(XMLHttpRequest, textStatus, errorThrown) {
                                $.LoadingOverlay("hide");
                                console.log(textStatus)
                                if (String(JSON.parse(XMLHttpRequest.status)) == 500) {
                                    swal("Oops!", "Something went wrong please contact admin ", "error")
                                } else {
                                    var parsed_data = JSON.parse(XMLHttpRequest.responseText);
                                    swal("Oops!", String(parsed_data.error), "error")
                                }
                            },

                            complete: function() {
                                $.LoadingOverlay("hide");
                            }
            
        });

});
//end
  }
  else{
    swal("you pressed cancel ");
  }
 });
        }
});
</script>



<?php require_once '../core/footer.php';
?>


<?php if($checkpin == '') { ?>
?>
<script>
$( document ).ready(function() {
swal({
 text: "<?php echo $row['name'];?>, you have not create a transaction pin please create a transaction pin",
  icon: "info",
  button: "ok",
  timer: 60000,
}).then(() => {
  window.location="newpin.php"
});
});
</script>
<?php } else { ?>
<?php } 
exit; 
?>


<?php if($min > $bal) { ?>
?>
<script>
$( document ).ready(function() {
swal({
 
  text: "<?php echo $row['name'];?> Wallet below minimum vending amount ₦<?php echo $row['bal'];?>",
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
    echo "<script>document.location.href='../logout'; </script>";
  exit;
}

?>
</html>