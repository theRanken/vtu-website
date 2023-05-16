<?php
session_start();
if (isset($_SESSION['name'])) {
require_once '../core/conn.php';

$sql = mysqli_query($con, "SELECT * FROM user WHERE id = {$_SESSION['id']}");
            if 
            (mysqli_num_rows($sql) > 0){
              $row = mysqli_fetch_assoc($sql);
            }
            $sql = mysqli_query($con, "SELECT * FROM  mail");
            if 
            (mysqli_num_rows($sql) > 0){
              $mail = mysqli_fetch_assoc($sql);
            }
            $msg="";
  $kyc= $row['kyc'];
  $username=$row['username'];
  
   $chek = mysqli_query($con, "SELECT * FROM 2cash");
  $adex = mysqli_fetch_array($chek);
  
  $cash_number = mysqli_query($con, "SELECT * FROM cash_number");
  $cash = mysqli_fetch_array($cash_number);
?> 
<?php include '../includes/header.php'; ?>
<div class="main-panel ">
<link rel="stylesheet" href="/static/ogbam/form.css">
<link rel="stylesheet" href="/static/ogbam/form.css">
<!-- Latest compiled and minified CSS -->
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

        .blink_me {
  animation: blinker 1s linear infinite;
}

@keyframes blinker {
  50% {
    opacity: 0;
  }
}


#process, #process2{
        display: none;
    }



     /*--thank you pop starts here--*/
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
    /*--thank you pop ends here--*/

    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js" integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ=" crossorigin="anonymous"></script>
<div style="padding:90px 15px 20px 15px" >


    <h2 class="w3-center"> Airtime Funding/ Airtime to Cash</h2>

        <div class="box w3-card-4">
                    <?php
      $sql = mysqli_query($con, "SELECT * FROM kyc WHERE username='$username'");
            if 
            (mysqli_num_rows($sql) > 0){
                
              $account = mysqli_fetch_assoc($sql);
                ?>
     <div class="row">

                <div class="col-sm-8">
                    
                    <form method='post'>

                    <input type="hidden" name="csrfmiddlewaretoken" value="qpv7s50iQa8DQlFhbypxPCLHDul4yJwfGuKosbCD5wlWdpp52SiQjQjUAHDDSdAv"> 

    <div id="div_id_network" class="form-group">
        
            <label for="id_network" class=" requiredField">
                Network<span class="asteriskField">*</span>
            </label>
        
            
                <div class="">
                    <select name="network" class="select form-control" required id="id_network">
  <option value="" selected>---------</option>

  <option value="1">MTN</option>

  <option value="2">GLO</option>

  <option value="3">9MOBILE</option>

  <option value="4">AIRTEL</option>

</select>
                    
                </div>
        
    </div>
    
    <div id="div_id_mobile_number" class="form-group">
        
            <label for="id_mobile_number" class=" requiredField">
                Mobile Number of the Transaction Sim<span class="asteriskField">*</span>
            </label>
        

                <div class="">
                    <input type="text" name="mobile_number" maxlength="11" minlength="11" class="textinput textInput form-control" required id="phone" onkeyup="verifyNetwork()">
                    
                </div>
    			</div>
    			
   <span id="verifyer"></span>

    <div id="div_id_amount" class="form-group">
        
            <label for="id_amount" class=" requiredField">
                Amount<span class="asteriskField">*</span>
            </label>
        
            
                <div class="">
                    <input type="number" name="amount" min="0" class="numberinput form-control" required id="id_amount">
                    



                </div>
            
        
    </div>
    
        <div class="form-group">
    <div id="div_id_use_to_fund_wallet" class="form-check">
        

                    <input type="checkbox" name="use_to_fund_wallet" class="checkboxinput form-check-input" id="id_use_to_fund_wallet">
                
                <label for="id_use_to_fund_wallet" class="form-check-label">
                    Check if you want to use it to fund wallet else transfer to bank below.
                </label>
                


    </div>
    
        
        </div>
    

              <label><b>you will receive</b></label>
                    <p class="control" id="amount"></p>
                    <label><b>Bank name</b></label>
                    <p class="control" id="bname"><?php echo $account['bank'];?></p>

                    <label><b>Account Number</b></label>
                    <p class="control" id="Anum"><?php echo $account['number'];?></p>
                  <button type="button" name="deposit" id="open" class="btn btn-primary btn-sm waves-effect waves-light">Proceed</button>
                
                
                <?php
              $account = mysqli_fetch_assoc($sql);
            }else{
    ?>
               <div class="row">

                <div class="col-sm-8">
                    
                    <div class="alert alert-info">
                        <strong><i class="fa fa-bank"></i>
                        Add Bank:  <br><div align="justify"><font size="2">Dear Customer , to perform this transaction ,kindly update your account to receive the money. </font>
                        <a href="kyc.php" class="btn btn-primary btn-sm waves-effect waves-light">Add Bank</a></div>
                        </strong>
                      </div>
                    
                </div>
                <div class="col-sm-4  ">



                    

            </div>
           
                <?php
            }
     ?>
                    
                    
                    
</form>
                </div>
             
 <!-- Modal -->
<div class="modal fade" id="processModal" tabindex="-1" role="dialog" aria-labelledby="processModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
            <center><h4 class="modal-title" id="processModalLongTitle"> To complete this request, follow the instructions below.</h4></center>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p>
            <h5 class='w3-text-blue  w3-padding' id="instruction"> </h5>
        </p>
        <hr>
        <p id ="opt1"> </p>

        <p id ="opt2"> </p>
 <b>Create Pin:</b>

        <p id ="opt3"> </p>

<span>Transfer through <b>Transfer Code:</b></span>
        <p id ="opt4"> </p>

          </p>

        <p><b>NOTE: Ensure you have transfered  <span id="amtm"></span>  into the Number above before clicking on airtime sent. Also, you must send exactly <span id="amtm"></span> Airtime within 30 minutes or this transaction will be cancelled.</b></p>
        <P><b>NOTE: Confirmation is instant and payment is automated usually within 5-30mins.<br>Also note that to send to us, you need to send from your personal sim .</p>

          <p style="color:red;" class="blink_me"><b>NOTE: Click on comfirmation button without send the airtime can lead to your account and email been ban.</b></p>
      </div>
        <div class="modal-footer">
                <button type="button"  class=" btn process" id="btnsubmit"style="background-color: rgb(17, 199, 17);" id="btnsubmit"> <span id="process2"> <div class="fa-1x"> <i class="fas fa-spinner fa-spin"></i> </div> Processing Please wait </span>  <span id="subm">COMFIRM AIRTIME SENT</span></button>

          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
           </div>
      </div>
    </div>
  </div>





<div class="modal fade" id="successModal" tabindex="-1" role="dialog" aria-labelledby="successModalTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">

      <div class="modal-body">
        <div class="thank-you-pop">
          <img src="/upload/thankyou.png" alt="">
          <h1>Thank You!</h1>
          <p>Your request is received and we will process it shortly</p>

         </div>
         <center>
           <a href="index.php" class="btn btn-info">OK</a>
         </center>
      </div>

    </div>
  </div>
</div>


<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">

      <div class="modal-body">
        <div class="thank-you-pop">
          <img src="/upload/error.png" alt="">
          <p id ="errmessage" style="font-size: 20px;"></p>
          <button type="button" class="btn btn-primary" data-dismiss="modal">OK</button>

         </div>
      </div>



    </div>
  </div>
</div>            
<!-- Modal -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/gasparesganga-jquery-loading-overlay@2.1.7/dist/loadingoverlay.min.js"></script>
<script src="adex_convert.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
                $(document).ready(function() {

                    $("#id_network").change(function() {
                        var name = $(this).children("option:selected").text();
                        $("#id_amount").keyup(function() {
                            var amount = Number($("#id_amount").val());
                            console.log('85');

                            if (name == "MTN") {

                                $("#amount").text('₦' + (Number(amount) * (Number("<?php echo $adex['mtn']; ?>") / 100)));


                            }


                            if (name == "GLO") {
                                $("#amount").text('₦' + (Number(amount) * (Number("<?php echo $adex['glo']; ?>") / 100)));

                            }

                            if (name == "9MOBILE") {
                                $("#amount").text('₦' + (Number(amount) * (Number("<?php echo $adex['9mobile']; ?>") / 100)));

                            }
                            if (name == "AIRTEL") {
                                $("#amount").text('₦' + (Number(amount) * (Number("<?php echo $adex['airtel']; ?>") / 100)));

                            }


                        });
                    });





                });
            </script>


<script>


  $("#open").click(function() {


    var network = $("#id_network").val(); // get the selected country ID from the HTML input

    var mobile_number = $("#phone").val();
    var amount = $("#id_amount").val();


    if(network == "" || amount == "" || mobile_number == "" ){
        swal("opps", "All field are required", "error")

    }
    else {
      var networkn = $("#id_network option:selected").text(); // get the selected country ID from the HTML input

      if (networkn =="MTN"){
        $("#opt1").text("How to Transfer on MTN")
        $("#opt2").text("Before you send an airtime, you Must have a 4 digit pin")
        $("#opt3").text("Press: *600 *000*Newpin*Newpin #")
        $("#opt4").text("Press: *600*<?php echo $cash['mtn']; ?>* " + amount +"*PIN#")
        $("#amtm").text("₦"+ amount)

        //$("#code").text(" How to transfer Airtime on MTN Share ’N’ Sell Dial: *600*081661718xx* " + amount +"*PIN#")
        //$("#instruct").text("Kindly Transfer the sum of  " + amount +" to 081661718xx ,follow the process below ")

      }

      else if (networkn =="GLO"){

         $("#opt1").text("How to Transfer on GLO")
        $("#opt2").text("Before you send an airtime, you Must have a 5 digit pin")

        $("#opt3").text("Press: *132 *00000*Newpin *Newpin #")
        $("#opt4").text("Press: *131*<?php echo $cash['glo']; ?>* " + amount +" *PIN# ")
        $("#amtm").text("₦"+ amount)

        //$("#code").text("How to transfer Airtime on GLO:  *131*080742991xx* " + amount +" *PIN# ")
        //$("#instruct").text("Kindly Transfer the sum of  " + amount +" to 080742991xx ,follow the process below ")

      }
      else if (networkn =="AIRTEL"){

         $("#opt1").text("How to Transfer on AIRTEL")
        $("#opt2").text("Before you send an airtime, you Must have a 4 digit pin")

        $("#opt3").html("Press: *432# " +"<br>"+ " Select 'Pin Management' @ number4 option. " + "<br>"+" Press 1 to change pin." +"<br>"+ "Your current Pin should be your default pin -- 0000 "+"<br>"+ "Then Enter any NewPin.")
        $("#opt4").html(" Press: *432 * 1 " +"<br>"+ "Input the phone number you want to transfer to  (<?php echo $cash['airtel']; ?>)." +"<br>"+ "  Input the amount involve" + "  ₦"+ amount)
        $("#amtm").text("₦"+ amount)

       // $("#code").text("How to transfer Airtime on AIRTEL:*432*1*#  To 091244050xx")
      //  $("#instruct").text("Kindly Transfer the sum of  " + amount +" to 090949092xx ,follow the process below ")


      }
      else{


         $("#opt1").text("How to Transfer on 9MOBILE")
        $("#opt2").text("Before you send an airtime, you Must have a 4 digit pin")

        $("#opt3").text("Press *247*0000*newpin#")
        $("#opt4").text("Press: *131*PIN*" + amount +"*<?php echo $cash['9mobile']; ?>*")
        $("#amtm").text("₦"+ amount)


      }
      $('#processModal').modal()
   }
  });

</script>



<script>
  $("#btnsubmit").click(function() {
      var network = $("#id_network option:selected").text();   // get the selected network name from the HTML input
      var phone = $("#phone").val();
      var amount = $("#id_amount").val();
      var networkn = $("#id_network option:selected").text(); // get the selected country ID from the HTML input
       var fund = $('#id_use_to_fund_wallet').is(":checked");

      if (networkn =="MTN"){
        var r = confirm("Are you sure you have sent " + " " + networkn  + " " + "N"+amount + " " + "to"+ " " +    "<?php echo $cash['mtn']; ?> to avoid your account and email been ban"   );

      }

      else if (networkn =="GLO"){
        var r = confirm("Are you sure you have sent " + " " + networkn  + " " + "N"+amount + " " + "to"+ " " +   "<?php echo $cash['glo']; ?> to avoid your account and email been ban"    );

      }
      else if (networkn =="AIRTEL"){
        var r = confirm("Are you sure you have sent " + " " + networkn  + " " + "N"+amount + " " + "to"+ " " +    "<?php echo $cash['airtel']; ?> to avoid your account and email been ban"   );

      }
      else{
        var r = confirm("Are you sure you have sent " + " " + networkn  + " " + "N"+amount + " " + "to"+ " " +   "<?php echo $cash['9mobile']; ?> to avoid your account and email been ban"    );

      }


  if (r == true) {
      
      
                   $.ajax({
           type:'POST',
         beforeSend: function(){
       $('#process2').css("display", "block");
        $('#subm').css("display", "none");
                 },
         url: '../assets/cash.php',
            data: {
            username:"<?php echo $row['username']; ?>",
             amount:amount,
                phone:phone,
                network:network,
                 fund:fund
                          
                        },
            dataType: 'json',
             timeout:8000, // i set  8 seconds for the transtion
                      success: function (response) {
                          if (response.status == 500){
             $('#processModal').modal('hide');
             $('#successModal').modal()
                            
                          }else{
            $('#errmessage').text(response.message);
              $('#processModal').modal('hide');
              $('#myModal').modal()
                      }
                      },
                       error:function(response){ 
           $('#errmessage').text("we re unable to connect please try again");
              $('#processModal').modal('hide');
              $('#myModal').modal()
                     
                 },
                      complete: function(response){
                         $('#process2').css("display", "none");
                         $('#subm').css("display", "block");

                      }
                      
                  });

  }
  });
  </script>





  <!-- GetButton.io widget -->
  <?php require_once '../includes/footer.php'; ?>
  </body>
  </html>

  <?php
} else {
    echo "<script>document.location.href='logout.php'; </script>";
  exit;
}

?>
</html>