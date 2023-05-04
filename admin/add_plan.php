<?php 
session_start();
if(isset( $_SESSION['admin'])) {
require_once '../core/conn.php';
$das="7";

$sql = mysqli_query($con, "SELECT * FROM admin WHERE id = {$_SESSION['admin']}");
            if 
            (mysqli_num_rows($sql) > 0){
              $row = mysqli_fetch_assoc($sql);
            }
            ?>
<?php include 'include/header.php';
include 'include/nav.php';
?>
<style>
#search-box{padding: 10px;border: #a8d4b1 1px solid;border-radius:4px;}
</style>
<!----credit user------>

<div class="main-panel ">
				

<link rel="stylesheet" href="/static/ogbam/form.css">

<div style="padding:90px 15px 20px 15px" >
    

                
             
    <h2 class="w3-center">ADD DATA PLAN</h2>

    <div class="box w3-card-4">

        <form>


            <div class="row">

                <div class="col-sm-8">

                    <input type="hidden" name="csrfmiddlewaretoken" value="on68V8UnKhKU3dHAzRgMJK5IcJXz5GpAp89hIUMR5ijpPjQYTHmceDYINHogi1pK"> 
        <div id="" class="form-group">
        
            <label for="id_amount" class="">
                Name
            </label>
                <div class="">
                    <input type="text" name="name"  class="textinput textInput form-control"  id="name" placeholder="e.g 1GB">
                    
                </div>
    </div>
    
     <div id="" class="form-group">
        
            <label for="id_amount" class="">
                Smart User Price
            </label>
                <div class="">
                    <input type="number" name="smart"  class="textinput textInput form-control"  id="smart">
                </div>
    </div>

     <div id="" class="form-group">
        
            <label for="id_amount" class="">
                Affilate  User Price
            </label>
                <div class="">
                    <input type="number" name="reseller"  class="textinput textInput form-control"  id="reseller" >
                </div>
    </div>

     <div id="" class="form-group">
        
            <label for="id_amount" class="">
                Topup User Price
            </label>
                <div class="">
                    <input type="number" name="topup"  class="textinput textInput form-control"  id="topup" >
                </div>
    </div>
    
     <div id="" class="form-group">
        
            <label for="id_amount" class="">
                API User Price
            </label>
                <div class="">
                    <input type="number" name="api"  class="textinput textInput form-control" id="websiteowner">
                </div>
    </div>
    
     <div id="" class="form-group">
        
            <label for="id_amount" class="">
                Data Plan Id
            </label>
                <div class="">
                    <input type="number" name="plan_id"  class="textinput textInput form-control" oninput="checkref(this.value)" id="plan_id" placeholder="Note get the data plan id from adexplug.com">
                </div>
                <span id="detect_planid"></span>
    </div>
    
    
     <div id="" class="form-group">
        
            <label for="id_amount" class="">
                Days
            </label>
                <div class="">
                    <input type="text" name="day"  class="textinput textInput form-control" oninput="" id="day">
                </div>
                <span id="detect_planid"></span>
    </div>

     <div class="form-group">
        
            <label for="id_amount" class="">
                Network
            </label>
              <div class="">
            <select name="status" class="select form-control" required id="network" onchange="active_disactive(this.value)">
   <option  selected><-----select network -------></option>
    <option value="MTN">MTN</option>
    <option value="AIRTEL">AIRTEL</option>
    <option value="GLO">GLO</option>
    <option value="9MOBILE">9MOBILE</option>
          </select>      

                </div>
    </div> 
<div class="form-group" id="hide">
        
            <label for="id_amount" class="">
                Plan Type
            </label>
              <div class="">
            <select name="status" class="select form-control" required id="type">
    <option value="GIFTING">GIFTING DATA</option>
    <option value="SME">SME DATA</option>
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
<!------ end credit user ----->
 <script>
    $(document).ready(function() {
  $("#hide").css("display", "none");
});
</script>
<script language="JavaScript">
function active_disactive(val)
    {
        if (val  == "MTN") {
      $('#type').prop('disabled',false);
      $("#hide").css("display", "block");
        }else{
    $("#hide").css("display", "block");
     $('#type').prop('disabled',true);
     $('#type').val("GIFTING");
        }
    }
</script>


<!--- credit upgrade her ------>
<script>
$("#bonous").click(function() {
var name = $('#name').val();
var smart = $("#smart").val();
var topup = $("#topup").val();
var reseller = $("#reseller").val();
var type = $('#type').find(":selected").val();
var network =  $('#network').find(":selected").val();
var plan_id = $("#plan_id").val();
var api =$("#websiteowner").val();
var day = $("#day").val();

if (name=="" || smart=="" || topup=="" || reseller=="" || plan_id=="" || network=="" || type=="" || api== ""){

           swal("Opps", "Please kidnly fill all the form", "error")

          return false;
        }
        else{

 swal({
  title: "Dear ADMIN",
  text: "You are about to add a data plan, I hope  your plan id detials is correct",
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
       url: '../assets/add_dataplan.php',
    
         data:{
                name:name,
                smart:smart,
                topup:topup,
                reseller:reseller,
                type:type,
                plan_id:plan_id,
                network:network,
                api:api,
                day:day
                        },
       dataType: 'json',
       success: function (response) {
         if (response.status == 500){
                               $.LoadingOverlay("hide");
                            swal({
                              title: "Successful!",
                              text: "You have successfully added a data plan",
                              icon: "success",
                              button: "View Data Plan",
                            })
                            $('.swal-button--confirm').click(function(){
                                  $.ajax({
                                        beforeSend: function(){
                                            $.LoadingOverlay("show");
                                        },
            success:  document.location.href='data_plan.php'
                                  });
                            });
                          }else{
                     $.LoadingOverlay("hide");
            swal(response.title, response.message, response.status)
                
                      }
            
            
        },
       complete: function(){
         $.LoadingOverlay("hide");
    }
     });
     
  
            
  } else {
    swal("You pressed Cancel!");
  }
});
}
   });
</script>

   <!---- end upgrade user ----->
   <!----- detect plan_id ----->
   <script>
        function checkref() {
            jQuery.ajax({
                url: "detect_planid.php",
                data: 'plan_id=' + $("#plan_id").val(),
                type: "POST",
                success: function(data) {
                    $("#detect_planid").html(data);
                },
                error: function() {}
            });
        }
    </script>
    <!---- done detecting user ------>

<?php include 'include/footer.php'; ?>
<?php
} else {
    echo "<script>document.location.href='logout.php'; </script>";
  exit;
}

?>