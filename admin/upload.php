<?php
if(isset($_FILES['upload']['name']))
{
    $adex= $_SERVER['HTTP_HOST'];
	$file=$_FILES['upload']['name'];
	$filetmp=$_FILES['upload']['tmp_name'];
	move_uploaded_file($filetmp,'upload/'.$file);
	$function_number=$_GET['CKEditorFuncNum'];
	$url='https://'.$adex.'/secure/upload/'.$file;
	$message='';
	echo "<script>window.parent.CKEDITOR.tools.callFunction('".$function_number."','".$url."','".$message."');</script>";     
}
?>