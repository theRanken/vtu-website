<?php
session_start();
if (isset($_SESSION['name'])) {
require_once '../core/conn.php';
$das="4";
    $aemail = $web['email'];
    $sql = mysqli_query($con, "SELECT * FROM user WHERE id = {$_SESSION['id']}");
    if (mysqli_num_rows($sql) > 0) {
        $row = mysqli_fetch_assoc($sql);
    }
    $msg = "";
    $chek = mysqli_query($con,"SELECT * FROM pay");
$pdata = mysqli_fetch_array($chek);
$min=$pdata['min'];
$bal=$row['bal'];
$pin=$row['pin'];
  
   $cable = mysqli_query($con,"SELECT * FROM scratch_card_prices");  
$cable_discount = mysqli_fetch_array($cable);
$waec=$cable_discount['waec_card'];
$neco=$cable_discount['neco_token'];
$nabteb=$cable_discount['nabteb_token'];
    ?>

   <?php include '../includes/header.php';?>
            <div class="main-panel ">
			

<link rel="stylesheet" href="/static/ogbam/form.css">
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
    
</style>
<div style="padding:90px 15px 20px 15px" >


    <h2 class="w3-center"> Generate Result Checker Pin</h2>

    <div class="box w3-card-4">

        <form method='post' id="form_id">


            <div class="row">

                <div class="col-sm-8">

                    <input type="hidden" name="csrfmiddlewaretoken" value="CtB4mBGDG8lzUOdghN1NXiyeWIZE2qUgczlu8CUVQ3u5aeLcU2cnoJcDSmG1qe2U"> 







    
    <div id="div_id_exam_name" class="form-group">
        
            <label for="id_exam_name" class=" requiredField">
                Exam name<span class="asteriskField">*</span>
            </label>
        

        

        

        
            
                <div class="">
                    <select name="exam_name" class="select form-control" required id="id_exam_name">
  <option value="" selected>---------</option>

  <option value="WAEC">WAEC</option>

  <option value="NECO">NECO</option>
  
   <option value="NABTEB">NABTEB</option>

</select>
                    





                </div>
            
        
    </div>
    









    
    <div id="div_id_quantity" class="form-group">
        
            <label for="id_quantity" class=" requiredField">
                Quantity<span class="asteriskField">*</span>
            </label>
        

        

        

        
            
                <div class="">
                    <input type="number" name="quantity" value="1" min="1" max="5" class="numberinput form-control" required id="id_quantity">
                    

                </div>
            
        
    </div>
    


                    <label><b>Amount</b></label>
                    <p class="control" id="amount"> </p>



                 
                    <button type="button" class=" btn" style='  color: white;' id ="btnsubmit"> Generate</button>

                </div>
                <div class="col-sm-4  ">



                    

            </div>

    </div>
</div>






</div>
</div>

</div>
</div>




<!-- jQuery library -->


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<script>
    $(document).ready(function() {
        $("#id_exam_name").change(function() {
        var selectednetwork = $("#id_exam_name option:selected").val();
            var quantity = $("#id_quantity").val();
            if (selectednetwork == "WAEC") {
                $("#amount").text("₦"+ quantity * Number('<?= $waec; ?>'));


            }
            else if (selectednetwork == "NECO") {
                $("#amount").text("₦"+ quantity * Number('<?= $neco; ?>'));
            }
            
            else if (selectednetwork == "NABTEB") {
                $("#amount").text("₦"+ quantity * Number('<?= $nabteb; ?>'));
            }
        });

        $("#id_quantity").keyup(function() {
            //var selectednetwork = $(this).children("option:selected").val();
            var selectednetwork = $("#id_exam_name option:selected").val();
            var quantity = $("#id_quantity").val();
            console.log(quantity)
            console.log(selectednetwork)

 if (quantity > 5) {
                $("#amount").text("Maximum per is 5");

            }

          else if (selectednetwork == "WAEC") {
                $("#amount").text("₦"+ quantity * Number('<?= $waec; ?>'));




            }
            else if (selectednetwork == "NECO") {
                $("#amount").text("₦"+ quantity * Number('<?= $neco; ?>'));
            }
            
            else if (selectednetwork == "NABTEB") {
                $("#amount").text("₦"+ quantity * Number('<?= $nabteb; ?>'));
            }

        });




    });
</script>





<script>
 

    $("#btnsubmit").click(function() {
       
        var url = "/api/epin/"; // get the url of the `load_cities` view
        var exam_name = $("#id_exam_name").val(); // get the selected country ID from the HTML input
        var quantity  = $("#id_quantity").val();
        
        var token = 'CtB4mBGDG8lzUOdghN1NXiyeWIZE2qUgczlu8CUVQ3u5aeLcU2cnoJcDSmG1qe2U';

     swal(
          {
            title: 'Dear Adex',
            text: "Are you sure you want to Generate " + " " + quantity + " pieces of " + exam_name + "   Pin",
            icon: 'warning',
            buttons: ["Oh no!", "Yes"],
            dangerMode: true,
          }
        ).then((willDelete) =>{

    if (willDelete) {
  //start
      swal("Enter Your Pin:", {
    content: "input",
  })
  .then((value) => {

    $.ajax({
            type:'GET',
            dataType: 'json',
            cache: false,
            contentType: false,
            processData: false,
            beforeSend: function(){
                $.LoadingOverlay("show");
                    },
            url: "/api/checkpin?pin=" + value,
            headers: { "X-CSRFToken": token },
             error: function(XMLHttpRequest, textStatus, errorThrown) {
                  $.LoadingOverlay("hide");
                                                    console.log(errorThrown)

                                                    if ( String(JSON.parse(XMLHttpRequest.status)) == 500){
                                                        swal("Oops!","Something went wrong please contact admin ","error")
                                                    }
                                                    else if (JSON.parse(XMLHttpRequest.responseText).error){
                                                          swal("Oops!",String(JSON.parse(XMLHttpRequest.responseText).error),"error")
                                                    }
                                                    else{
                                                        swal("Oops!",String(XMLHttpRequest.responseText),"error")
                                                    }
      },
            success: function (data) {

        $.ajax({
            type:'POST',
            dataType: 'json',
            contentType: "application/json",
       beforeSend: function(){
       $.LoadingOverlay("show");
            }, // initialize an AJAX request
            url: url,
            headers: { "X-CSRFToken": token },
            data: JSON.stringify( {
                 "exam_name": exam_name,
            "quantity": quantity,
          
        }),
         success: function (data) {
                            console.log(data);
                            console.log(data.id);
                           
                            swal({
                              title: "Successful!",
                              text: "You purchased " + quantity + ' pieces of ' + exam_name + " Epin ",
                              icon: "success",
                              button: "View reciept",
                            })
                            $('.swal-button--confirm').click(function(){
                                  $.ajax({
                                        beforeSend: function(){
                                            $.LoadingOverlay("show");
                                        },
                                        success: window.location.href = '/Result-Checker-Pin-order/'+String(data.id)
                                  });
                            });
                      },
                      error: function(XMLHttpRequest, textStatus, errorThrown) {
                           $.LoadingOverlay("hide");
                                                    console.log(errorThrown)

                                                    if ( String(JSON.parse(XMLHttpRequest.status)) == 500){
                                                        swal("Oops!","Something went wrong please contact admin ","error")
                                                    }
                                                    else if (JSON.parse(XMLHttpRequest.responseText).error){
                                                          swal("Oops!",String(JSON.parse(XMLHttpRequest.responseText).error),"error")
                                                    }
                                                    else{
                                                        swal("Oops!",String(XMLHttpRequest.responseText),"error")
                                                    }
                      },

                      complete: function(){
                          $.LoadingOverlay("hide")
                      }
                  });

           
            },

            error: function(XMLHttpRequest, textStatus, errorThrown) {
                  $.LoadingOverlay("hide");
                  console.log(textStatus)
                  if ( String(JSON.parse(XMLHttpRequest.status)) == 500){
                      swal("Oops!","Something went wrong please contact admin ","error")
                  }
                  else{
                       var parsed_data = JSON.parse(XMLHttpRequest.responseText);
                      swal("Oops!",String(parsed_data.error),"error")
                  }
      },

     complete: function(){
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
});

</script>



        <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<!-- GetButton.io widget -->
        <?php require_once '../includes/footer.php'; ?>
        
        
            <?php if($pin == '') { ?>
<script>
$( document ).ready(function() {
swal({
 
  text: "<?php echo $row['name'];?>, You have not create a transaction pin please create one now",
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
<script>
$( document ).ready(function() {
swal({
 
  text: "<?php echo $row['name'];?>, Wallet below minimum vending amount ₦<?php echo $row['bal'];?>",
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

    </html>
<?php
} else {
    echo "<script>document.location.href='logout.php'; </script>";
    exit;
}

?>

</html>