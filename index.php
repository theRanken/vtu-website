<?php 
$_SERVER['HTTPS'] = "on";
require_once 'core/conn.php';

session_start();

// Get general information
$generalQuery = mysqli_query($con, "SELECT * FROM general");
if(mysqli_num_rows($generalQuery) > 0){
  $generalInfo = mysqli_fetch_assoc($generalQuery);
}

// Get active theme
$activeThemeQuery = mysqli_query($con, "SELECT * FROM theme WHERE status = 1");
$activeThemeCount = mysqli_num_rows($activeThemeQuery);

// Get maintenance theme
$maintenanceThemeQuery = mysqli_query($con, "SELECT * FROM theme WHERE status = 5");
$maintenanceThemeCount = mysqli_num_rows($maintenanceThemeQuery);

// Check which theme to display
if($activeThemeCount == 1){
  require_once 'theme/index.php';
  exit;
}elseif($maintenanceThemeCount == 1){
  require_once 'mentainance.php';
  exit;
}else{
  include 'template/index.php';
}
?>
