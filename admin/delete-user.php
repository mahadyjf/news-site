<?php
include "config.php";
session_start(); 
      if($_SESSION['role'] == 0){
      header("Location: $path/admin/post.php");
      } 
$id= $_GET['id'];
$sql = "DELETE FROM user WHERE user_id='$id' ";
if(mysqli_query($con, $sql)){
	header("Location: {$path}admin/users.php");
}
mysqli_close($con);
?>