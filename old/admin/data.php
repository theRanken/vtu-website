<?php
require_once '../core/conn.php';
if(!empty($_POST['val'])) {
    $sql = "SELECT * FROM categories WHERE (type='" . $_POST['val']."' ) AND (name='" . $_POST['id']." ') "; $result = $con->query($sql); if ($result->num_rows > 0) {
              while($rowd = $result->fetch_assoc())
   $id=$rowd['id'];
    
    echo $id;
    
}
}

?>


