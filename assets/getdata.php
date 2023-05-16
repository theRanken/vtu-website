<?php
include '../assets/accounttype.php';
require_once '../core/conn.php';
if (isset($_POST['network'])) {
	$val=$_POST['network'];
	$sql = "SELECT * FROM plans WHERE network='$val'"; $result = $con->query($sql); 
	if ($result->num_rows > 0) {
        while($rowd = $result->fetch_assoc())
           $plans .="<option data=\"{$rowd["name"]}\" planid=\"{$rowd["customid"]}\"  plantype=\"{$rowd["type"]}\" value=\"{$rowd["$accounttype"]}\" planprice=\"{$rowd["$accounttype"]}\">{$rowd["name"]} => ₦".number_format($rowd["price"],2)." </option>";
?>
    		<option value="">Select Price</option>
            <?php echo $plans; ?> 
<?php
	}else{

		echo '<option value="">THERE IS NO DATA PLAN FOR THIS NETWORK</option>';
	}
} 
?>
