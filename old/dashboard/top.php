<?php
require_once '../core/conn.php';
if (isset($_POST['val'])) {
	$val=$_POST['val'];
	$sql = "SELECT * FROM plans WHERE did='$val'"; $result = $con->query($sql); if ($result->num_rows > 0) {
              while($rowd = $result->fetch_assoc())
           $plans .="<option data=\"{$rowd["name"]}\" value=\"{$rowd["price"]}\">{$rowd["name"]} => ₦{$rowd["price"]} </option>";
       ?>
           <option value="">Select Price</option>
            <?php echo $plans; ?> 
	<?php
	}else{

		echo '<option value="">Price Not Found!</option>';
	}
}
?>
