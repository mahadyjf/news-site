<?php
	include "config.php";
	session_start();
	if(isset($_FILES['fileToUpload'])){
		$errors = array();

		$file_name = $_FILES['fileToUpload']['name'];
		$file_size = $_FILES['fileToUpload']['size'];
		$file_tmp = $_FILES['fileToUpload']['tmp_name'];
		$file_type = $_FILES['fileToUpload']['type'];
		$file_ext1 = explode('.', $file_name);
		$file_ext = strtolower(end($file_ext1));
		$extensions = array("jpeg", "jpg", "png");

		if(in_array($file_ext, $extensions) === false){
			$errors[] = "This Extension file not allowed, Pleas choose a JPG or PNG";
		}
		if($file_size > 2097152){
			$errors[] = "File sixe must be 2 mb or lower";
		}
		$newFile_name = date('dmy').time().$file_name;
		$target = "upload/".$newFile_name;
		$newFile_name1=$newFile_name;
		if(empty($errors) == true){
			move_uploaded_file($file_tmp, $target);
		}else{
			print_r($errors);
			die();
		}
	}

	$post_title = $_POST['post_title'];
	$postdesc = $_POST['postdesc'];
	$category = $_POST['category'];
	$author = $_SESSION['user_id'];
	$date = date("d M, Y");

	$sql = "INSERT INTO post(title, description, category, post_date, author, post_img) 
			VALUES('$post_title', '$postdesc', $category, '$date', $author, '$newFile_name1') ;";
	$sql .= "UPDATE category SET post = post + 1 WHERE category_id = {$category}";
	$result = mysqli_multi_query($con, $sql);
	if($result){
		header("Location: $path/admin/post.php");
	}else{
		echo "<div style='color:red;' class='alert alert-danger'>Query Field</div>";
	}

?>
