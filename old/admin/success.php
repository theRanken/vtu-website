<?php 
session_start();
require_once "../core/conn.php";
$sql = mysqli_query($con, "SELECT * FROM admin WHERE id = {$_SESSION['id']}");
            if 
            (mysqli_num_rows($sql) > 0){
              $row = mysqli_fetch_assoc($sql);
            }

if(isset( $_SESSION['username'])) {
	$msg="";
?>
<?php
if (isset($_GET['update'])) {
    $id = $_GET['update'];
 $sql = mysqli_query($con, "SELECT * FROM transactions WHERE id ='$id'");
            if 
            (mysqli_num_rows($sql) > 0){
              $adex = mysqli_fetch_assoc($sql);
            }
$username=$adex['username'];
$price=$adex['amount'];
$plan=$adex['plans'];
$sql = mysqli_query($con, "SELECT * FROM user WHERE username='$username'");
if (mysqli_num_rows($sql)>0){
    $user= mysqli_fetch_assoc($sql);
}
$bal=$user['bal'];
$deduct= $bal - $price;
$chek = mysqli_query($con,"SELECT * FROM pay");
 
 $pdata = mysqli_fetch_array($chek);
$min=$pdata['min'];

    if  ($price > $bal) {
   	$msg ='<div class="alert alert-warning"><button type="button" class="close" data-dismiss="alert">×</button><strong><span>'.$username.'</span> has insufficient account, This the user Account Balance <span>'.$bal.'</span></strong>';
    } elseif ($min > $deduct) {
        $msg = '<div class="alert alert-warning"><button type="button" class="close" data-dismiss="alert">×</button><strong>The minimum amount that must be in user account is<span>₦'.$min.'</span></strong>';
}
  elseif (empty($price)) {
      	$msg='<div class="alert alert-warning"><button type="button" class="close" data-dismiss="alert">×</button><strong>There is no Price Admin</strong>';
}else{
   mysqli_query($con, "UPDATE user SET bal = '$deduct'  WHERE username = '$username'");
   mysqli_query($con, "UPDATE transactions SET status =1  WHERE id = '$id'");
  
       $msg= '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">×</button><strong>Successful</strong>';

}
}
if (isset($_GET['change'])) {
    $id = $_GET['change'];
 $sql = mysqli_query($con, "SELECT * FROM transactions WHERE id ='$id'");
            if 
            (mysqli_num_rows($sql) > 0){
              $ade = mysqli_fetch_assoc($sql);
            }
$username=$ade['username'];
$price=$ade['amount'];
$plan=$ade['plans'];
$sql = mysqli_query($con, "SELECT * FROM user WHERE username='$username'");
if (mysqli_num_rows($sql)>0){
    $usem= mysqli_fetch_assoc($sql);
}
$bal=$usem['bal'];
$add= $bal + $price; 
$msg1="";
    if (empty($price)) {
      	$msg='<div class="alert alert-warning"><button type="button" class="close" data-dismiss="alert">×</button><strong>There is no Price Admin</strong>';
    }else{
   mysqli_query($con, "UPDATE user SET bal = '$add'  WHERE username = '$username'");
   mysqli_query($con, "UPDATE transactions SET status =0  WHERE id = '$id'");
    
        $msg= '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">×</button><strong>Successful</strong>';


}
}
if (isset($_GET['del'])) {
    $id = $_GET['del'];
    $msg="";
     $sql = mysqli_query($con, "SELECT * FROM transactions WHERE id ='$id'");
            if 
            (mysqli_num_rows($sql) > 0){
              $ade = mysqli_fetch_assoc($sql);
            }
            $username=$ade['username'];
             if (empty($username)) {
      	$msg='<div class="alert alert-warning"><button type="button" class="close" data-dismiss="alert">×</button><strong>The username is empty why bro</strong>';
    }else{
      mysqli_query($con, "DELETE FROM transactions  WHERE id = '$id'");
    
        $msg= '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">×</button><strong>Successful Deleted</strong>';


}
}
if (isset($_GET['ban'])) {
    $id = $_GET['ban'];
    $msg="";
     $sql = mysqli_query($con, "SELECT * FROM transactions WHERE id ='$id'");
            if 
            (mysqli_num_rows($sql) > 0){
              $ade = mysqli_fetch_assoc($sql);
            }
            $username=$ade['username'];
             if (empty($username)) {
      	$msg='<div class="alert alert-warning"><button type="button" class="close" data-dismiss="alert">×</button><strong>The username is empty why bro</strong>';
    }else{
      mysqli_query($con, "UPDATE transactions SET status=2 WHERE id = '$id'");
    
        $msg= '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">×</button><strong>Successful Ban</strong>';


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
				<a href="" class="logo" style="color: white;font-size: 19px;font-weight: bold;margin-right: -70px;"><?php echo $row['username']?></a>
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
 <div class="container-fluid bg-secondary text-light" style="padding-bottom:10px;padding-top:5px;">
          <h3 class="mt-4"><i class="fas fa-credit-card" aria-hidden="true"></i> Successful Transaction</h3>

         </div>

<div style="margin-bottom: 20px;"></div>
              <div class="outputc"> <?= $msg; ?></div>
          <table width="100%" class="table bg-light table-responsive  table-bordered table-hover" id="dataTables-example" style="font-size:13px;">
            <thead>
              <tr>
                <th>No.</th>
                <th>Username</th>
                 <th>Transid</th>
                <th>Amount</th>
                <th>Network</th>
                <th>Service</th>
                <th>Mobile</th>
                <th>Plans</th>
                 <th>Type</th>
                <th>Status</th>

                <th></th>
                <th>
                  <center>Operation</center>
                </th>
              </tr>
            </thead>
            <tbody>
 <?php
$msgs="";
              
              $query = "SELECT * FROM transactions WHERE status=1";
              $result = mysqli_query($con, $query);
              $nu = 1;
              if (mysqli_num_rows($result) == 0) {
                $msgs = "<b>No Successful Transaction Made yet</b>";
              }
              ?>
              <div class="alas">
                <?= $msgs ?>
              </div>
              <?php
              while ($use = mysqli_fetch_array($result)) {
                $id = $use['id'];
                $username = $use['username'];
                $transid = $use['transid'];
                $amount = $use['amount'];
                $network = $use['network'];
                $service = $use['service'];
                $mobile = $use['mobile'];
                $plan = $use['plans'];
                $type = $use['type'];
                $status =$use['status'];


              ?>
                <tr>
                  <td><?php echo htmlentities($nu);echo '.'; ?></td>
                  <td><?= $username; ?></td>
                  <td><?= $transid; ?></td>
                  <td><?= $amount; ?></td>
                  <td><?= $network; ?></td>
                  <td><?= $service; ?></td>
                  <td><?= $mobile; ?></td>
                  <td><?= $plan; ?></td>
                  <td><?= $type; ?></td>
                 <td><?php if($use['status']==0){
                    echo "<span class='btn btn-warning' id=str".$use['id'].">Pending</span>";
                  }; if($use['status']==1){
                    echo "<span class='btn btn-success' id=str".$use['id'].">Paid</span>";
                  };if($use['status']==2){
                    echo "<span class='btn btn-danger' id=str".$use['id'].">Cancled</span>";
                  };?></td>
                   <td></td>
                  <td>
                  <span>

                      <a href="?del=<?= $use['id'] ?>" class="text-danger" onclick="return confirm('Do you really want to delete this record?');" title="Delete"><i class="fa fa-trash" style="font-size:24px"></i>
                      </a> &nbsp;
                    </span>
                    <span>
                      <?php
                      if ($status == 1) {

                      ?>
                        <a href="?change=<?= $use['id'] ?>" class="text-warning" onclick="return confirm('Do you really want to unapprove this payment?');" title="Unapprove"><i class="fa fa-check" style="font-size:24px"></i>
                        </a> &nbsp;

                      <?php } else {
                      ?>

                        <a href="?update=<?= $use['id'] ?>" class="text-success" onclick="return confirm('Do you really want to approve this payment?');" title="Approve"><i class="fa fa-check" style="font-size:24px"></i>
                        
                        <a href="?ban=<?= $use['id'] ?>" class="text-danger" onclick="return confirm('Do you really want to cancel this payment?');" title="Approve"><i class="fas fa-ban" style="font-size:24px"></i>

                        <?php

                      }

                        ?>
                    </span>
                    <span>
                      <?php
                      if ($status == 1) {
                      ?>
                        
                        <?php
                      } else {
                        ?>

                        <?php
                      }

                        ?>
                        </a> &nbsp;
                    </span>

                  </td>
                  <td></td>

                </tr>
              <?php
                $nu = $nu + 1;
              }
              ?>
            </tbody>
          </table>


        </div>
      </div>




















<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    
</div>
			


		</div>
	</div>
		


	<!--   Core JS Files   -->
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
 

 



	<!-- GetButton.io widget -->
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