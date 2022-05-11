<?php
include "config.php";
 if(empty($_FILES['logo']['name'])){
 	$file_name = $_POST['old_logo'];
 }else{
 	$errors = array();

 	$file_name = $_FILES['logo']['name'];
 	$file_size = $_FILES['logo']['size'];
 	$file_tmp = $_FILES['logo']['tmp_name'];
 	$file_type = $_FILES['logo']['type'];
 	$file_ext = strtolower(end(explode('.', $file_name)));
 	$extensions = array("jpeg", "jpg", "png");

 	if(in_array($file_ext, $extensions) === false){
 		$errors[] = "This Extension file not allowed, Pleas choose a JPG or PNG";
 	}elseif($file_size == 2097152){
 		$errors[] = "File sixe must be 2 mb or lower";
 	}elseif(empty($errors) == true){
 		move_uploaded_file($file_tmp, "images/".$file_name);
 	}else{
 		print_r($errors);
			die();
 	}
 }
 $website_name = $_POST['website_name'];
 $footer_desc = $_POST['footer_desc'];
 

$sql = "UPDATE setting SET website_name='$website_name', logo='$file_name', fotter_desc='$footer_desc' ";
 
 $result = mysqli_query($con, $sql);
 if($result){
 	header("Location: $path/admin/setting.php");
	}else{
		echo "<div class='alert alert-danger'>Query Field</div>";
	}
?>