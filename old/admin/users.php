<?php 
session_start();
require_once "../core/conn.php";
$sql = mysqli_query($con, "SELECT * FROM admin WHERE id = {$_SESSION['id']}");
            if 
            (mysqli_num_rows($sql) > 0){
              $row = mysqli_fetch_assoc($sql);
            }

if(isset( $_SESSION['username'])) {
    $sql = mysqli_query($con, "SELECT * FROM price");
            if 
            (mysqli_num_rows($sql) > 0){
              $asd = mysqli_fetch_assoc($sql);
            }

$msg="";
if (isset($_GET['delete'])) {
    $id =  $_GET['delete'];
    $delete = mysqli_query($con, "DELETE FROM user WHERE id=$id");

    if ($delete) {
      $msg = "<div class='alert alert-danger'>
                              User has been Deleted </div>";
?>
      <script>
        setTimeout('Redirect()', 5000);

        function Redirect() {
          window.location = "users.php";
        }
      </script>
      <?php
    }
  }
    ?>

<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<head>
	<meta name="theme-color" content="#5230b0">
	<meta charset="utf-8" />
    <title>Dashboard- <?php echo $web['name']; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="referrer" content="no-referrer-when-downgrade">
	
    
	
	

    <link rel="manifest" href="../static/styling/img/site.html">
	<link rel="manifest" href="../static/img/manifest.json">
	<meta name="msapplication-TileColor" content="#ffffff">
	<meta name="msapplication-TileImage" content="../static/img/ms-icon-144x144.html">
	<meta name="theme-color" content="#ffffff">

    <meta content="data- Buy Airtime and Data for all Network. Make payment for DSTV, GOTV, PHCN other services" name="descriptison">

    <meta itemprop="name" content="data- Buy Airtime and Data for all Network. Make payment for DSTV, GOTV, PHCN other services">
    <meta itemprop="description" content="Buy Cheap Internet Data Plan and Airtime Recharge for Airtel, 9mobile, GLO, MTN, Pay DSTV, GOTV, PHCN.">
    <meta itemprop="image" content="../static/styling/images/bg.html">
    <link rel="stylesheet" href="../static/ogbam/w3.css">

    <!-- Twitter Card data -->
    <meta name="twitter:card" content="../static/styling/images/bg.html">
    <meta name="twitter:title" content="<?php echo $web['name']; ?>- Buy Airtime and Data for all Network. Make payment for DSTV, GOTV, PHCN other services">
    <meta name="twitter:description" content="<?php echo $web['name']; ?> Buy Cheap Internet Data Plan and Airtime Recharge for Airtel, 9mobile, GLO, MTN, Pay DSTV, GOTV, PHCN.">
    <meta name="twitter:image:src" content="../static/styling/images/bg.html">

    <!-- Open Graph data -->
    <meta property="og:locale" content="en_US">
    <meta property="og:title" content="<?php echo $web['name']; ?> - Buy Airtime and Data for all Network. Make payment for DSTV, GOTV, PHCN other services">
    <meta property="og:image" content="../static/styling/images/bg.html">
    <meta property="og:description" content="<?php echo $web['name']; ?> Buy Cheap Internet Data Plan and Airtime Recharge for Airtel, 9mobile, GLO, MTN, Pay DSTV, GOTV, PHCN."/>
    <meta property="og:site_name" content="<?php echo $web['name']; ?>"/>
    <meta property="og:url" content="../index.html">
    <meta property="og:type" content="website">

	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<link rel="icon" href="../static/dashboard/assets/img/icon.html" type="image/x-icon"/>
     
	<!-- Fonts and icons -->
	<script src="../static/dashboard/assets/js/plugin/webfont/webfont.min.js"></script>
	<link rel="stylesheet" href="../static/dashboard/assets/css/fonts.min.css" media="all">
	<!-- toast -->
    <script src="../../cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
	<link rel="stylesheet" href="../../cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" media="all">
	
	<script src="../../unpkg.com/sweetalert%402.1.2/dist/sweetalert.min.js"></script>
	
	
	<script>
		WebFont.load({
			google: {"families":["Lato:300,400,700,900"]},
			custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"], urls: ['/static/dashboard/assets/css/fonts.min.css']},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
	</script>

	<style>
     

.swal-overlay {
  background-color: rgba(43, 165, 137, 0.45);
}


.swal-button {
  padding: 7px 19px;
  border-radius: 2px;
  background-color: #1572E8 !important;
  font-size: 12px;
  color:white;
  border: 1px solid #3e549a;
  text-shadow: 0px -1px 0px rgba(0, 0, 0, 0.3);
}
</style>


	<!-- Popup notifications -->
	<script src="../../ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
	
	<!-- CSS Files -->
	<link rel="stylesheet" href="../static/dashboard/assets/css/w3.css">
	<link rel="stylesheet" href="../static/dashboard/assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="../static/dashboard/assets/css/atlantis.css">
	
	
	
	
</head>

<body data-background-color="bg3" onload="greet(); alertinfo()">
	<div class="wrapper">
		<div class="main-header">
			<!-- Logo Header -->
			<div class="logo-header bg-secondary-gradient ">
				<a href="profile.php" class="logo" style="color: white;font-size: 19px;font-weight: bold;margin-right: -70px;"><?php echo $row['username']?></a>
				<button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon">
						<i class="icon-menu"></i>
					</span>
				</button>
				<button class="topbar-toggler more"><i class="icon-options-vertical"></i></button>
				<div class="nav-toggle">
					<button class="btn btn-toggle toggle-sidebar">
						<i class="icon-menu"></i>
					</button>
				</div>
			</div>
			<!-- End Logo Header -->

			<!-- Navbar Header -->
	<?php require_once 'nav.php';?>
		<!-- End Sidebar -->
		<div class="main-panel ">

				
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://cdn.jsdelivr.net/npm/gasparesganga-jquery-loading-overlay@2.1.7/dist/loadingoverlay.min.js"></script>
<div class="container">


<div class="container-fluid bg-secondary text-light"style="padding-bottom:10px;padding-top:5px;">
          <h3 class="mt-4"><i class="fa fa-user" aria-hidden="true"></i> Verified User </h3>

          <div class="row justify-content-end bg-secondary text-white" style="padding-top:0px;padding-right:10px;margin-top:0px;">
          <a class="btn btn-primary" href="adduser.php">
              <span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span>
              Add New User
            </a>
            </div>
            </div>
            <div class="output"><? echo $msg; ?></div>
      
            <div style="margin-bottom: 20px;"></div>
      
            <table width="100%" class="table bg-light table-responsive  table-bordered table-hover" id="dataTables-example"style="font-size:13px;">
                  <thead>
              <tr>
                <th>S/N</th>
                <th>Name</th>
                <th>username</th>
                <th>Email</th>
                <th>phone No</th>
                 <th>Current Balance</th>
                <th>Address</th>
                <th>Registration Date</th>
                <th>Password</th>
                 <th>Action</th>
                 <th><center><i class="fa fa-cogs" aria-hidden="true"></i></center> </th> 
              </tr>
              </thead>
              <tbody>
                   <?php 
                 
      
                  $query="SELECT * FROM user WHERE status=1";
                  $result= mysqli_query($con,$query);
                  $nu=1;
                  while($user=mysqli_fetch_array($result)){
                    $id=$user['id'];
                    
                     //Specific Users balance
            $check_wallet = "SELECT * FROM wallet WHERE customer_id = " . $id;
           //Run query on wallet
           $wallet_result = mysqli_query($con, $check_wallet);
       if(mysqli_num_rows($wallet_result) > 0){
          $existing_data = mysqli_fetch_array($wallet_result);
          
		  echo$balance = intval($existing_data["balance"]);
       }
                    ?>
               <tr>
                   <td><?php echo htmlentities ($nu); echo '.'; ?></td>
                  <td><?php echo $user['name'];?></td>
                  <td><?php echo $user['username'];?></td>
                  <td><?php echo $user['email'];?></td>
                  <td><?php echo $user['phone'];?></td>
                  <td>N<?php echo $balance;?></td>
                    <td><?php echo $user['address'];?></td>
                      <td><?php echo $user['date'];?></td>
                        <td><?php echo $user['password1'];?></td>
                        <td><?php if($user['status']==0){
                    echo "<span class='btn btn-warning' id=str".$user['id']."> Unverified</span>";
                  }; if($user['status']==1){
                    echo "<span class='btn btn-success' id=str".$user['id'].">Approved</span>";
                  };if($user['status']==2){ echo "<span class='btn btn-danger' id=str".$user['id'].">Banned</span>";
                  };?></td>
                  </td>
                  
                 
               
                  <td>
                  <center>
                      <label><b>Login Actions</b></label>
                    <select class="form-control  " onchange="active_disactive_user(this.value,<?php echo $user['id']; ?>)">
                    <option value="">Select Action</option>
                    <option value="2">Ban</option>
                    <option value="1">Unban</option>
                    <option value="1">Verify</option>
                    <option value="0">unVerify</option>
                    
                        </select>
                        <a class="btn btn-warning" id="trt" href="#" title="Edit User">Update</a>
                         <a class="btn btn-danger" href="?delete=<?php echo $user['id']; ?>"  title="Delete User">Delete</i></a>
                        
                   </center></td>
                  
                  
               </tr>
               <?php
                $nu = $nu + 1;
              }
           
              ?>
              </tbody>
            </table>









<script src="/static/dashboard/assets/js/core/jquery.3.2.1.min.js"></script>
	<script src="/static/dashboard/assets/js/core/popper.min.js"></script>
	<script src="/static/dashboard/assets/js/core/bootstrap.min.js"></script>

	<!-- jQuery UI -->
	<script src="/static/dashboard/assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
	<script src="/static/dashboard/assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>

	<!-- jQuery Scrollbar -->
	<script src="/static/dashboard/assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>

	<!-- Moment JS -->
	<script src="/static/dashboard/assets/js/plugin/moment/moment.min.js"></script>

	<!-- Chart JS -->
	<script src="/static/dashboard/assets/js/plugin/chart.js/chart.min.js"></script>

	<!-- jQuery Sparkline -->
	<script src="/static/dashboard/assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js"></script>

	<!-- Chart Circle -->
	<script src="/static/dashboard/assets/js/plugin/chart-circle/circles.min.js"></script>

	<!-- Datatables -->
	<script src="/static/dashboard/assets/js/plugin/datatables/datatables.min.js"></script>

	<!-- Bootstrap Notify -->
	<script src="/static/dashboard/assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js"></script>

	<!-- Bootstrap Toggle -->
	<script src="/static/dashboard/assets/js/plugin/bootstrap-toggle/bootstrap-toggle.min.js"></script>

	<!-- jQuery Vector Maps -->
	<script src="/static/dashboard/assets/js/plugin/jqvmap/jquery.vmap.min.js"></script>
	<script src="/static/dashboard/assets/js/plugin/jqvmap/maps/jquery.vmap.world.js"></script>

	<!-- Google Maps Plugin -->
	<script src="/static/dashboard/assets/js/plugin/gmaps/gmaps.js"></script>

	<!-- Dropzone -->
	<script src="/static/dashboard/assets/js/plugin/dropzone/dropzone.min.js"></script>

	<!-- Fullcalendar -->
	<script src="/static/dashboard/assets/js/plugin/fullcalendar/fullcalendar.min.js"></script>

	<!-- DateTimePicker -->
	<script src="/static/dashboard/assets/js/plugin/datepicker/bootstrap-datetimepicker.min.js"></script>

	<!-- Bootstrap Tagsinput -->
	<script src="/static/dashboard/assets/js/plugin/bootstrap-tagsinput/bootstrap-tagsinput.min.js"></script>

	<!-- Bootstrap Wizard -->
	<script src="/static/dashboard/assets/js/plugin/bootstrap-wizard/bootstrapwizard.js"></script>

	<!-- jQuery Validation -->
	<script src="/static/dashboard/assets/js/plugin/jquery.validate/jquery.validate.min.js"></script>

	<!-- Summernote -->
	<script src="/static/dashboard/assets/js/plugin/summernote/summernote-bs4.min.js"></script>

	<!-- Select2 -->
	<script src="/static/dashboard/assets/js/plugin/select2/select2.full.min.js"></script>

	<!-- Sweet Alert -->
	<script src="/static/dashboard/assets/js/plugin/sweetalert/sweetalert.min.js"></script>

	<!-- Owl Carousel -->
	<script src="/static/dashboard/assets/js/plugin/owl-carousel/owl.carousel.min.js"></script>

	<!-- Magnific Popup -->
	<script src="/static/dashboard/assets/js/plugin/jquery.magnific-popup/jquery.magnific-popup.min.js"></script>

	<!-- Atlantis JS -->
	<script src="/static/dashboard/assets/js/atlantis.min.js"></script>

	<!-- jquery validator -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/gasparesganga-jquery-loading-overlay@2.1.7/dist/loadingoverlay.min.js"></script>
 
 <script type="text/javascript">

function active_disactive_user(val,id){

 $.ajax({
     
     type:'POST',
     url:'status.php',
     data:{val:val,id:id},
     success: function(result){
     
     
           if(result=='') {
           
          } 
     
         else if(result==0){
             $('#str'+id).html('Offline');
         }
         else if(result==1){
             $('#str'+id).html('Online');
         }
         else{
             $('#str'+id).html('Suspended');
         }
     }
     
     
 });
     
     
     

}

</script>
  
  <script>
    $("#menu-toggle").click(function(e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    });
  </script>



<?php require_once '../core/footer.php'; ?>
	</body>
	</html>





 
	<?php
} else {
    echo "<script>document.location.href='../logout'; </script>";
  exit;
}

?>
</html>
	