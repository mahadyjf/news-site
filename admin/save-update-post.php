<?php
include "config.php";
 if(empty($_FILES['new-image']['name'])){
 	$newFile_name1 = $_POST['old-image'];
 }else{
 	$errors = array();

 	$file_name = $_FILES['new-image']['name'];
 	$file_size = $_FILES['new-image']['size'];
 	$file_tmp = $_FILES['new-image']['tmp_name'];
 	$file_type = $_FILES['new-image']['type'];
 	$file_ext = strtolower(end(explode('.', $file_name)));
 	$extensions = array("jpeg", "jpg", "png");

 		$newFile_name = date('dmy').time().$file_name;
		$target = "upload/".$newFile_name;
		$newFile_name1=$newFile_name;
 	if(in_array($file_ext, $extensions) === false){
 		$errors[] = "This Extension file not allowed, Pleas choose a JPG or PNG";
 	}elseif($file_size == 2097152){
 		$errors[] = "File sixe must be 2 mb or lower";
 	}elseif(empty($errors) == true){
 		move_uploaded_file($file_tmp, $target);
 	}else{
 		print_r($errors);
			die();
 	}
 }
 $title = $_POST['post_title'];
 $post_id = $_POST['post_id'];
 $postdesc = $_POST['postdesc'];
 $category = $_POST['category'];
 $old_category = $_POST['old_category'];

 $sql = "UPDATE post SET title='$title', description='$postdesc', category=$category, post_img='$newFile_name1' WHERE post_id=$post_id ;";
 if($old_category != $category){
 $sql .= "UPDATE category SET post = post-1 WHERE category_id=$old_category ;";
 $sql .= "UPDATE category SET post = post+1 WHERE category_id=$category ;";
}


 $result = mysqli_multi_query($con, $sql);
 if($result){
 	header("Location: $path/admin/post.php");
	}else{
		echo "<div class='alert alert-danger'>Query Field</div>";
	}
?>