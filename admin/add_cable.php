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
    

                
             
    <h2 class="w3-center">ADD CABLE PLAN</h2>

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
                    <input type="text" name="name"  class="textinput textInput form-control"  id="name" placeholder="e.g DSTV PADI">
                    
                </div>
    </div>
    
     <div id="" class="form-group">
        
            <label for="id_amount" class="">
                Price
            </label>
                <div class="">
                    <input type="number" name="price"  class="textinput textInput form-control"  id="price" placeholder="enter the real price from vtpass because we added charges alrady">
                </div>
    </div>


     <div id="" class="form-group">
        
            <label for="id_amount" class="">
                Cable Plan Id
            </label>
                <div class="">
                    <input type="number" name="plan_id"  class="textinput textInput form-control" oninput="checkref(this.value)" id="plan_id" placeholder="Note get the data plan id from vtpass">
                </div>
                <span id="detect_planid"></span>
    </div>

     <div class="form-group">
        
            <label for="id_amount" class="">
                Cable
            </label>
              <div class="">
            <select name="status" class="select form-control" required id="cable" onchange="active_disactive(this.value)">
   <option  selected><-----select cable -------></option>
    <option value="DSTV">DSTV</option>
    <option value="GOTV">GOTV</option>
    <option value="STARTIME">STARTIME</option>
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
<!--- credit upgrade her ------>
<script>
$("#bonous").click(function() {
var name = $('#name').val();
var price = $("#price").val();
var cable = $('#cable').find(":selected").val();;
var plan_id = $("#plan_id").val();

if (name=="" || price=="" || cable=="" || plan_id=="" ){

           swal("Opps", "Please kidnly fill all the form", "error")

          return false;
        }
        else{

 swal({
  title: "Dear ADMIN",
  text: "You are about to add a cable plan, I hope  your plan id detials is correct",
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
       url: '../assets/add_cableplan.php',
    
         data:{
                name:name,
                price:price,
                plan_id:plan_id,
                cable:cable
                        },
       dataType: 'json',
       success: function (response) {
         if (response.status == 500){
                               $.LoadingOverlay("hide");
                            swal({
                              title: "Successful!",
                              text: "You have successfully added a cable plan",
                              icon: "success",
                              button: "View cable Plan",
                            })
                            $('.swal-button--confirm').click(function(){
                                  $.ajax({
                                        beforeSend: function(){
                                            $.LoadingOverlay("show");
                                        },
            success:  document.location.href='cable_plan.php'
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
                url: "detect_cableid.php",
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