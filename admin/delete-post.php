<?php
include "config.php";
$del_id = $_GET['post_id'];
$cat_id = $_GET['catid'];

$sql1 = "SELECT * FROM post WHERE post_id={$del_id} ";
$result1 = mysqli_query($con, $sql1);
$row1 = mysqli_fetch_assoc($result1) or die("Query Field");

unlink("upload/".$row1['post_img']);

$sql = "DELETE FROM post WHERE post_id={$del_id} ;";
$sql .= "UPDATE category SET post = post-1 WHERE category_id={$cat_id} ";

$result = mysqli_multi_query($con, $sql);
if($result){
 	header("Location: $path/admin/post.php");
	}else{
		echo "<div class='alert alert-danger'>Query Field</div>";
	}
?>