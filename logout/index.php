<?php 
require_once "../core/conn.php";
	session_start();
 session_destroy();
	 
?>
           <script>
               document.location.href='../login';
           </script>
           <?php 
	exit;

?>
