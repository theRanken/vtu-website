<?php 
session_start();
if (isset($_SESSION['name'])) {
    require_once '../core/conn.php';

$sql = mysqli_query($con, "SELECT * FROM user WHERE id = {$_SESSION['id']}");
            if 
            (mysqli_num_rows($sql) > 0){
              $row = mysqli_fetch_assoc($sql);
            }
            $username=$row['username'];

    ?>
<?php include '../includes/header.php'; ?>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>


<div class="main-panel ">
			

<div  style="padding:90px 10px 0 10px" >
<style>

.btn-danger {
    background-color: rgb(230, 68, 47) !important; color: white;
}

.btn-success {
    background-color: rgb(4, 219, 4) !important; color: white;
}

.btn-info{
    background-color: rgb(4, 122, 219) !important; color: white;
}
</style>
    <h2 class=''> <b>Your Account History And Activities.</b> </h2>

    <div class="">
        <div class="">
            <h4>FILTER</h4>
        </div>
        <div>
            <p>

                <a href='#airtime' <span class="badge badge-info badge-pill w3-hover-blue w3-margin-bottom ">Airtime Payment</span> </a>
                <a href='#data'> <span class="badge badge-info badge-pill w3-hover-blue w3-margin-bottom">Data Plan</span> </a>
                <a href='#transfer'> <span class="badge badge-info badge-pill w3-hover-blue w3-margin-bottom">Transfer</span> </a>
    
                <a href='#topup'><span class="badge badge-info badge-pill w3-hover-blue w3-margin-bottom">Airtime Topup</span>  </a>
                    <a href='#withdraw'> <span class="badge badge-info badge-pill w3-hover-blue w3-margin-bottom">Withdraw</span> </a>
                <a href='#Cablesub'> <span class="badge badge-info badge-pill w3-hover-blue w3-margin-bottom">Cable subscription</span> </a>
                <a href='#bank'> <span class="badge badge-info badge-pill w3-hover-blue w3-margin-bottom">Bank payment</span> </a>
                <a href='#auto'> <span class="badge badge-info badge-pill w3-hover-blue w3-margin-bottom">Auto Funding</span> </a>
                <a href='#bill'> <span class="badge badge-info badge-pill w3-hover-blue w3-margin-bottom">Bill payment</span> </a>
                <a href='#epin'> <span class="badge badge-info badge-pill w3-hover-blue w3-margin-bottom">Recharge Pin</span> </a>
                <a href='#epin'> <span class="badge badge-info badge-pill w3-hover-blue w3-margin-bottom">result checker</span> </a>



            </p>
        </div>
    </div>
    <hr>





 
<!-- history end here -->


  <!-- history start here -->
  

    <div class="">
  <!-- history start here -->
  
<!-- history end here -->



<!-- history end here -->



        <!-- history start here -->
        
 <!-- history end here -->

        <!-- history start here -->
          <?php
         $query = "SELECT * FROM transactions WHERE username='$username' AND service='DATA'";
              $result = mysqli_query($con, $query);
              $nu = 1;
              if (mysqli_num_rows($result) == 0) {
                $msg = "You Are Yet To make any data Payment";
              }else{
         ?>
        <div class="card" id="data">
            <div class="card-body">
                <h5 class="card-title">Data History</h5>
                <div class="table-responsive">
                    <table id="basic-datatables" class=" display table table-striped table-bordered">
                        
                        <thead>
                     
                            <tr>
                                <th>ID</th>
                                <th>Network</th>
                                <th>Plan</th>
                                <th>Plan amount</th>
                                <th>Data Type</th>
                                <th>Number</th>
                                <th>Date</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                                
                                <?php
 $msg="";
    $username=$row['username'];
              
              $query = "SELECT * FROM transactions WHERE username='$username' AND service='DATA' ORDER BY id DESC";
              $result = mysqli_query($con, $query);
              $nu = 1;
              if (mysqli_num_rows($result) == 0) {
                $msg = "You Are Yet To make any data Payment";
              }
              ?>
              <?php
              while ($use = mysqli_fetch_array($result)) {
                $id = $use['id'];
                $transid=$use['transid'];
                $amount = $use['amount'];
                 $plan = $use['plans'];
                 $network= $use['network'];
                 $mobile = $use['mobile'];
                 $type = $use['type'];
                 $date = $use['date'];
                 $status = $use['status'];
               


              ?>

                            
                            <tr>
                                <td>DATA<?echo $transid ?></td>
                                <td><? echo $network ?></td>
                                <td><? echo $plan ?></td>
                                <td>&#8358;<?php echo number_format($amount,2); ?></td>
                                <td><?= $type; ?></td>
                                <td><? echo $mobile ?></td>
                                <td><? echo $date; ?></td>
                                 <?php if($status == '1'){
                                 $butten="success";?>
                                    <td > <button type="button" class="btn btn-success">Successful</button> </td>
                                    <?php
                                    }else{
                                        $butten="fail";
                                      ?>
                                     <td > <button type="button" class="btn btn-danger">Failed</button> </td>
                                    <?php
                                    }
                                    ?>
                                    <td > <button type="button" id="submit" onclick="active_disactive_data(this.value)"  value="<?php echo $transid; ?>" class="btn btn-secondary text-white">View</button></td>
                                    
                            </tr>
                            <?php
                       
                            
                         
                                   
              }
              ?>
              </tbody>

                    </table>
                </div>

            </div>
        </div>
        <?php } ?>
 <!-- history end here -->

 <?php
         $query = "SELECT * FROM bankpayment WHERE username='$username'";
              $result = mysqli_query($con, $query);
              $nu = 1;
              if (mysqli_num_rows($result) == 0) {
              }else{
         ?>
        <div class="card" id="bank">
            <div class="card-body">
                <h5 class="card-title">Bank Payment History</h5>
                <div class="table-responsive">
                    <table id="basic-datatables" class=" display table table-striped table-bordered">
                        
                        <thead>
                     
                            <tr>
                                <th>Username</th>
                                <th>Bank Name</th>
                                <th>Account Name</th>
                                <th>Account Number</th>
                                <th>Amount</th>
                                <th>Date</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                     $query = "SELECT * FROM bankpayment WHERE username='$username' ORDER BY id DESC";
              $result = mysqli_query($con, $query);
              $nu = 1;
              ?>
  <?php
              while ($use = mysqli_fetch_array($result)) {
                $id = $use['id'];
                $username=$use['username'];
                $amount = $use['amount'];
                 $bankname= $use['bankname'];
                 $name= $use['name'];
                 $number = $use['number'];
                 $date = $use['date'];
                 $status = $use['status'];
                 ?>
  
   <tr>
                                <td><?echo $username; ?></td>
                                <td><? echo $bankname ?></td>
                                <td><? echo $name ?></td>
                                <td><? echo $number; ?></td>
                                <td><?=  number_format($amount,2); ?></td>
                                <td><? echo $date ?></td>
                                 <?php if($status == '1'){
                                 $butten="success";?>
                                    <td > <button type="button" class="btn btn-success">Paid</button> </td>
                                    <?php
                                    }elseif($status == '0'){
                                        $butten="pending";
                                      ?>
                                     <td > <button type="button" class="btn btn-warning">Pending</button> </td>
                                    <?php
                                    }else{
                                        $butten="cancled";
                                        ?>
                                        <td > <button type="button" class="btn btn-danger">Cancled</button> </td>
                                        <?php
                                    }
                                    ?>
                                    <td > <button type="button" id="submit" onclick="active_disactive_bank(this.value)"  value="<?php echo $butten; ?>" class="btn btn-secondary text-white">View</button></td>
                                    
                            </tr>
                            <?php
                       
                            
                         
                                   
              }
              ?>
              </tbody>

                    </table>
                </div>

            </div>
        </div>
  <?php
              }
              ?>
  
  
  
  
  
        <!-- history start here -->
         <?php
        $query = "SELECT * FROM transactions WHERE username='$username' AND service='AIRTIME'";
              $result = mysqli_query($con, $query);
              
              if (mysqli_num_rows($result) == 0) {
                $msg = "You Are Yet To make any data Payment";
              }else{
         ?>

             <div class="card" id="topup">
            <div class="card-body">
                <h5 class="card-title">Airtime Topup History</h5>
                <div class="table-responsive">
                    <table id="basic-datatables" class=" display table table-striped table-bordered">
                        <thead>

                            <tr>
                                <th>ID</th>
                                <th>Network</th>
                                <th>Amount</th>
                                <th>Number</th>
                                <th>Date</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php
 $msg="";
    $username=$row['username'];
              $query = "SELECT * FROM transactions WHERE username='$username' AND service='AIRTIME' ORDER BY id DESC";
              $result = mysqli_query($con, $query);
              
              if (mysqli_num_rows($result) == 0) {
                $msg = "You Are Yet To make any airtime transaction";
              }
              
              ?>
              <?php
              while ($use = mysqli_fetch_array($result)) {
                $id = $use['id'];
                $transid=$use['transid'];
                $amount = $use['amount'];
                 $plan = $use['plans'];
                 $network= $use['network'];
                 $mobile = $use['mobile'];
                 $type = $use['type'];
                 $date = $use['date'];
                 $status = $use['status'];
               


              ?>

                            
                                <tr>
                                    <td>AIRTIME<?echo $transid ?></td>
                                    <td><? echo $network ?></td>
                                    <td>&#8358;<?echo $amount ?></td>
                                    <td><? echo $mobile ?></td>
                                    <td><? echo $date ?></td>
                                    
                                         <?php if($status == '1'){
                                 $butten="success";?>
                                    <td > <button type="button" class="btn btn-success">Successful</button> </td>
                                    <?php
                                    }else{
                                        $butten="fail";
                                      ?>
                                     <td > <button type="button" class="btn btn-danger">Failed</button> </td>
                                    <?php
                                    }
                                    ?>
                                    <td > <button type="button" id="submit" onclick="active_disactive_airtime(this.value)"  value="<?php echo $transid; ?>" class="btn btn-secondary text-white">View</button></td>
                                    
                            </tr>
                            <?php
                                           
              }
              ?>
              </tbody>

                    </table>
                </div>

            </div>
        </div>
        <?php } ?>
	
<!-------- airtime 2 cash ---------->

<?php
        $query = "SELECT * FROM airtime WHERE username='$username'";
              $result = mysqli_query($con, $query);
              
              if (mysqli_num_rows($result) == 0) {
                $msg = "You Are Yet To make any data Payment";
              }else{
         ?>

             <div class="card" id="airtime">
            <div class="card-body">
                <h5 class="card-title">Airtime 2 Cash</h5>
                <div class="table-responsive">
                    <table id="basic-datatables" class=" display table table-striped table-bordered">
                        <thead>

                            <tr>
                                <th>Username</th>
                                <th>Network</th>
                                <th>Mobile Number</th>
                                <th>Amount</th>
                                <th>Amount to be Paid</th>
                                <th>Payment Type</th>
                                <th>Status</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php
              $query = "SELECT * FROM airtime WHERE username='$username' ORDER BY id DESC";
              $result = mysqli_query($con, $query);
              
              if (mysqli_num_rows($result) == 0) {
                $msg = "You Are Yet To make any airtime transaction";
              }
              
              ?>
              <?php
              while ($use = mysqli_fetch_array($result)) {
                $id = $use['id'];
                $amount = $use['amount'];
                 $amount_pay = $use['pay'];
                 $network= $use['network'];
                 $mobile = $use['mobile'];
                 $type = $use['type'];
                 $date = $use['date'];
                 $status = $use['status'];
               


              ?>

                            
                                <tr>
                                    <td><?= $username; ?></td>
                                    <td><? echo $network ?></td>
                                    <td><?echo $mobile ?></td>
                                    <td>&#8358;<? echo number_format($amount,2) ?></td>
                                    <td>&#8358;<? echo number_format($amount_pay,2) ?></td>
                                    <td><? echo $type; ?></td>
                                         <?php if($status == '1'){
                                 $butten="success";?>
                                    <td > <button type="button" class="btn btn-success">Paid</button> </td>
                                    <?php
                                    }elseif($status == '0'){
                                        $butten="fail";
                                      ?>
                                     <td > <button type="button" class="btn btn-warning">Pending</button> </td>
                                    <?php
                                    }elseif($status == '2'){
                                    ?>
                                     <td > <button type="button" class="btn btn-danger">Cancled</button> </td>
                                     <?php
                                    }
                                     ?>
                                     <td><?php echo $date; ?></td>
                            </tr>
                            <?php
                                           
              }
              ?>
              </tbody>

                    </table>
                </div>

            </div>
        </div>
        <?php } ?>
	
<!-------- auto funding ---------->

<?php
        $query = "SELECT * FROM deposit WHERE name='$username'";
              $result = mysqli_query($con, $query);
              if (mysqli_num_rows($result) == 0) {
                $msg = "You Are Yet To make any data Payment";
              }else{
         ?>

             <div class="card" id="auto">
            <div class="card-body">
                <h5 class="card-title">Auto Funding</h5>
                <div class="table-responsive">
                    <table id="basic-datatables" class=" display table table-striped table-bordered">
                        <thead>

                            <tr>
                                <th>Username</th>
                                <th>Amount</th>
                                <th>Amount Sent</th>
                                <th>Trans id</th>
                                <th>Status</th>
                                 <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php
              $query = "SELECT * FROM deposit WHERE name='$username' ORDER BY id DESC";
              $result = mysqli_query($con, $query);
              
              if (mysqli_num_rows($result) == 0) {
                $msg = "You Are Yet To make any airtime transaction";
              }
              
              ?>
              <?php
              while ($use = mysqli_fetch_array($result)) {
                $id = $use['id'];
                 $amount = $use['amount'];
                 $amount_pay = $use['charge'];
                 $transid= $use['trans'];
                 $date = $use['date'];
                 $status = $use['status'];
               


              ?>

                            
                                <tr>
                                    <td><?= $username; ?></td>
                                    <td>&#8358;<? echo number_format($amount,2) ?></td>
                                    <td>&#8358;<? echo number_format($amount_pay,2) ?></td>
                                    <td><? echo $transid; ?></td>
                                         <?php if($status == '1'){
                                 $butten="success";?>
                                    <td > <button type="button" class="btn btn-success">Paid</button> </td>
                                    <?php
                                    }elseif($status == '0'){
                                        $butten="fail";
                                      ?>
                                     <td > <button type="button" class="btn btn-warning">Pending</button> </td>
                                    <?php
                                    }elseif($status == '2'){
                                    ?>
                                     <td > <button type="button" class="btn btn-danger">Cancled</button> </td>
                                     <?php
                                    }
                                     ?>
                                     <td><?php echo $date; ?></td>
                            </tr>
                            <?php
                                           
              }
              ?>
              </tbody>

                    </table>
                </div>

            </div>
        </div>
        <?php } ?>

<!-------- transfre to user ---------->

<?php
        $query = "SELECT * FROM transfer WHERE username='$username'";
              $result = mysqli_query($con, $query);
              if (mysqli_num_rows($result) == 0) {
                $msg = "You Are Yet To make any data Payment";
              }else{
         ?>

             <div class="card" id="transfer">
            <div class="card-body">
                <h5 class="card-title">Transfer to User</h5>
                <div class="table-responsive">
                    <table id="basic-datatables" class=" display table table-striped table-bordered">
                        <thead>

                            <tr>
                                <th>Username</th>
                                <th>Amount</th>
                                <th>Account Email</th>
                                <th>Trans id</th>
                                <th>Status</th>
                                 <th>Date</th>
                                 <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php
              $query = "SELECT * FROM transfer WHERE username='$username' ORDER BY id DESC";
              $result = mysqli_query($con, $query);
              
              if (mysqli_num_rows($result) == 0) {
                $msg = "You Are Yet To make any airtime transaction";
              }
              
              ?>
              <?php
              while ($use = mysqli_fetch_array($result)) {
                $id = $use['id'];
                 $amount = $use['amount'];
                 $transid= $use['transid'];
                 $date = $use['date'];
                 $status = $use['status'];
                 $name = $use['name'];
               


              ?>

                            
                                <tr>
                                    <td><?= $username; ?></td>
                                    <td>&#8358;<? echo number_format($amount,2) ?></td>
                                    <td><? echo ($name) ?></td>
                                    <td>Trans<? echo $transid; ?></td>
                                         <?php if($status == '1'){
                                 $butten="success";?>
                                    <td > <button type="button" class="btn btn-success">Successful</button> </td>
                                    <?php
                                    }elseif($status == '0'){
                                        $butten="fail";
                                      ?>
                                     <td > <button type="button" class="btn btn-warning">Pending</button> </td>
                                    <?php
                                    }elseif($status == '2'){
                                    ?>
                                     <td > <button type="button" class="btn btn-danger">Cancled</button> </td>
                                     <?php
                                    }
                                     ?>
                                     <td><?php echo $date; ?></td>
                                     
                                     <td > <button type="button" id="submit" onclick="active_disactive_transfer(this.value)"  value="<?php echo $transid; ?>" class="btn btn-secondary text-white">View</button></td>
                                    
                            </tr>
                            <?php
                                           
              }
              ?>
              </tbody>

                    </table>
                </div>

            </div>
        </div>
        <?php } ?>





  <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/gasparesganga-jquery-loading-overlay@2.1.7/dist/loadingoverlay.min.js"></script>
  

 <script type="text/javascript">
 
  function active_disactive_data(val) {
      
 window.location.href = 'dataprint.php?id=' + String(val)


}


 function active_disactive_airtime(val) {
      
 window.location.href = 'airtimeprint.php?id=' + String(val)


}


 function active_disactive_bank(val) {
      
swal(val)

}

</script>



		<?php require_once '../includes/footer.php'; ?>

</body>
 
	<?php
} else {
    echo "<script>window.location.href='logout.php'; </script>";
  exit;
}

?>
</html>
	