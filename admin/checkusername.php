<?php
require_once '../core/conn.php';
if(!empty($_POST["keyword"])) {
$query ="SELECT * FROM user WHERE username like '" . $_POST["keyword"] . "%' ORDER BY username LIMIT 0,6";
$result = $con->query($query);
if(!empty($result)) {
?>
<ul id="country-list">
<?php
foreach($result as $username) {
?>
<li onClick="selectCountry('<?php echo $username["username"]; ?>');"><?php echo $username["username"]; ?></li>
<?php } ?>
</ul>
<?php } } ?>