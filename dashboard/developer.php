<?php 
require_once '../core/conn.php';
require_once '../core/api.php';
session_start();
if(isset( $_SESSION['name'])) {
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
            $das="12";
$bal= $row['bal'];
$email=$row['email'];
$username= $row['username'];
$musername=$mail['username'];
$mpassword=$mail['password'];
$hosts=$mail['host'];
$sender=$mail['sender'];
$userapi=$row['type']
?>

<?php include '../includes/header.php'; ?>
		<!-- Sidebar -->
			
		<!-- End Sidebar -->

		<div class="main-panel ">
			

    <div class="container" style="margin:80px 20px 20px 30px; ; font-size:20px;">
      
        <div class= "row">

        		       <div class= "col-lg-6">
        		           
          <a href="https://wa.me/07013397088" class="btn btn-info"> API Documentation page </a>
        		           
        		           <div class="form-group">
                                        <label class="float-left" for="email">My Authorization Token:</label>
                                        <input type="text" class="form-control" value="<?php echo $row['apikey']; ?>" readonly id="myInput">
                                        <button onclick="myFunction()" style="cursor: pointer;" class="badge badge-dark">Copy Key</button>
                                        <button onclick="mychange()" style="cursor: pointer;" class="badge badge-dark">Change Api</button>
                                    </div
                                    <?php if($userapi == 'API'){
                                                 ?>
                                     <form method="POST" name"uploadwebhook">
                                <input type="hidden" name="csrfmiddlewaretoken" value="dL9Lr9eXqQfcjTn0TYu2DlGwijdWPlrCZzPIvOevPJlkDhoQVJO6txuerRUqrVGC">
                                
                                
                               <div class="form-group">
                                        <label class="float-left" for="email">Webhook URL:</label>
                                        <input class="form-control" type="url"  name= "webhook"  required value="<?php echo $row['webhook']; ?>">
                                    </div>
              
                                    <div class="form-group mb-0">
                                        <button class="btn btn-primary " type="submit"  >Save Webhook</button>
                                    </div>
                                                        
          <?php
      }
      ?>   
                                    
                                </form>
                     	    

        		       
        		   </div>
        		       
        		   </div>
                                    
   


    		    		<div class="h3 text-center" style="margin-top: 30px;" id="plan"><b>Price List</b></div>

    		    		<div class="table-responsive">

<table class="table table-striped tale-hovered">
	
	<thead>
		<tr>
						<th>Data ID</th>
						<th>Network</th>
						<th>Plan type</th>
			<th>Amount</th>
			<th>Size</th>
		</tr>
	</thead>
	<tbody>
     <?php

              $query = "SELECT * FROM plans  ORDER BY customid ASC";
                $result = mysqli_query($con, $query);
                $nu = 1;
                $msg="";
                if (mysqli_num_rows($result) == 0) {
                  $msg = "No Plan added yet";
                }
                ?>
                <div class="alas">
                  <?= $msg ?>
                </div>
                <?php
                while ($use = mysqli_fetch_array($result)) {
                  $id = $use['id'];
                  $network = $use['network'];
                  $customid = $use['customid'];
                  $size = $use['name'];
                  $plan = $use['type'];
                  $price = $use['api'];


                ?>
				    <tr>
                    <td><?= $customid; ?></td>
                    <td><?= $network; ?></td>
                    <td><?= $plan; ?></td>
                    <td><?= '₦'.number_format($price,2); ?></td>
                    <td><?= strtoupper($size); ?></td>
                    
                     <td></td>
                  
        </tr>
        
		<?php }?>		


			</tbody>
</table>


</div>

    <div class="h3 text-center" style="margin-top: 30px;" id="network"><b>Network List</b></div>
    <div class="table-responsive">
<table class="table table-striped tale-hovered">
	<thead>
		<tr>
						<th>Network ID</th>
						<th>Network name</th>

		</tr>
	</thead>
	<tbody>
            
				<tr>
						<td>1</td>
						<td>MTN</td>

        </tr>
        
				<tr>
						<td>2</td>
						<td>AIRTEL</td>

        </tr>
        
				<tr>
						<td>3</td>
						<td>9MOBILE</td>

        </tr>
        
				<tr>
						<td>4</td>
						<td>GLO</td>

        </tr>
        
				<tr>
						<td>5</td>
						<td>SMILE</td>

        </tr>
        


		</tbody>
</table>
</div>


 <div class="h3 text-center" style="margin-top: 30px;" id="network"><b>Cable List</b></div>
    <div class="table-responsive">
<table class="table table-striped tale-hovered">
	<thead>
		<tr>
						<th>Cable ID</th>
						<th>Cable name</th>

		</tr>
	</thead>
	<tbody>
            
				<tr>
						<td>1</td>
						<td>GOTV</td>

        </tr>
        
				<tr>
						<td>2</td>
						<td>DSTV</td>

        </tr>
        
				<tr>
						<td>3</td>
						<td>STARTIME</td>

        </tr>
        


		</tbody>
</table>
</div>


 <div class="h3 text-center" style="margin-top: 30px;" id="network"><b>Cable  Plan List</b></div>
    <div class="table-responsive">
<table class="table table-striped tale-hovered">
	<thead>
		<tr>
						<th>Cableplan ID</th>
						<th> Cable Nmae</th>
						<th>Cableplan name</th>
						<th>Cableplan amount</th>

		</tr>
	</thead>
	<tbody>
	    
	    <?php

              $query_c = "SELECT * FROM cableapi";
                $result_c = mysqli_query($con, $query_c);
                $nu = 1;
                $msg="";
                if (mysqli_num_rows($result) == 0) {
                  $msg = "No plan added yet";
                }
                ?>
                <div class="alas">
                  <?= $msg ?>
                </div>
                <?php
                while ($use = mysqli_fetch_array($result_c)) {
                  $id = $use['id'];
                  $cable = $use['cable'];
                  $customid = $use['cableid'];
                  $cablename = $use['cablename'];
                  $price = $use['price'];


                ?>
            
				<tr>
						<td><?= $customid; ?></td>
						<td><?= $cable; ?></td>
						<td><?= $cablename; ?></td>
						<td><?= '₦'.number_format($price,2); ?></td>

        </tr>
        <?php
                } 
                ?>


		</tbody>
</table>
</div>


<div class="h3 text-center" style="margin-top: 30px;" id="network"><b>Electricity Company  List</b></div>
    <div class="table-responsive">
<table class="table table-striped tale-hovered">
	<thead>
		<tr>
						<th>Disco ID</th>
						<th>Disco name</th>


		</tr>
	</thead>
	<tbody>
            
				<tr>
						<td>1</td>
						<td>Ikeja Electric</td>


        </tr>
        
				<tr>
						<td>2</td>
						<td>Eko Electric</td>


        </tr>
        
				<tr>
						<td>3</td>
						<td>Abuja Electric</td>


        </tr>
        
				<tr>
						<td>4</td>
						<td>Kano Electric</td>


        </tr>
        
				<tr>
						<td>5</td>
						<td>Enugu Electric</td>


        </tr>
        
				<tr>
						<td>6</td>
						<td>Port Harcourt Electric</td>


        </tr>
        
				<tr>
						<td>7</td>
						<td>Ibadan Electric</td>


        </tr>
        
				<tr>
						<td>8</td>
						<td>Kaduna Electric</td>


        </tr>
        
				<tr>
						<td>9</td>
						<td>Jos Electric</td>


        </tr>
        
				<tr>
						<td>10</td>
						<td>Benin Electric</td>


        </tr>
        
				<tr>
						<td>11</td>
						<td>Yola Electric</td>


        </tr>
        


		</tbody>
</table>

</div>
    </div>


		</div>



	</div>
	</div>



	<!--   Core JS Files   -->
	<script>
function myFunction() {
  /* Get the text field */
  var copyText = document.getElementById("myInput");

  /* Select the text field */
  copyText.select();
  copyText.setSelectionRange(0, 99999); /* For mobile devices */

  /* Copy the text inside the text field */
  navigator.clipboard.writeText(copyText.value);
  
  /* Alert the copied text */
  alert("You have successfuly copy your apikey: " + copyText.value);
}
</script>
<script>
  function mychange() {
      swal({
  title: "Dear <?php echo $row['name'];?>",
  text: "Are  you want to change your apikey",
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
            if (response.status == 0){
                $.LoadingOverlay("hide");
             swal("Oops!","You have entered in correct password","error")
            }else{
             $.ajax({
           type:'POST',
         beforeSend: function(){
            $.LoadingOverlay("show");
                 },
         url: '../assets/changeapi.php',
            data: {
                          id: <?php echo $row['id']; ?>
                        },
            dataType: 'json',
                      success: function (response) {
                          if (response.status == 500){
                               $.LoadingOverlay("hide");
                            swal({
                              title: "Successful!",
                              text: "You have successfully change your apikey",
                              icon: "success",
                              button: "okay",
                            })
                            $('.swal-button--confirm').click(function(){
                                  $.ajax({
                                        beforeSend: function(){
                                            $.LoadingOverlay("show");
                                        },
            success: window.location.href = 'developer.php'
                                  });
                            });
                          }else{
                     $.LoadingOverlay("hide");
            swal("error", "something occur please try again", "error")
            .then(function(){ 
               location.reload();
                  }
                 );
                      }
                      },
                      complete: function(response){
                        $.LoadingOverlay("hide")
                      }
                      
                  });

            }
            },
        });

});
//end
  }
  else{
    swal("you pressed cancel ");
  }
 });
      
  }
</script>

<?php require_once '../includes/footer.php'; ?>











</body>
 
	<?php
} else {
    echo "<script>document.location.href='../logout'; </script>";
  exit;
}

?>
</html>
	


	









	<!-- GetButton.io widget -->
	

</body>

</html>