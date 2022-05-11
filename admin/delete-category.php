<?php
include "config.php";
$catid = $_GET['catid'];
$sql = "DELETE FROM category WHERE category_id=$catid ";
$result = mysqli_multi_query($con, $sql);
        if($result){
        header("Location: $path/admin/category.php");
        }else{
          echo "<div class='alert alert-danger'>Query Field</div>";
        }
?>