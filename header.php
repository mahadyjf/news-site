<?php
include "admin/config.php";
$page = basename($_SERVER['PHP_SELF']);
switch ($page) {
    case 'single.php':
        if(isset($_GET['post_id'])){
            $sql_title = "SELECT * FROM post WHERE post_id={$_GET['post_id']} ";
            $result_title = mysqli_query($con, $sql_title) or die("Query Field");
            $row_title = mysqli_fetch_assoc($result_title);
            $post_title = $row_title['title'];
        }else{
            $post_title = "No Post Found";
        }
        break;
        case 'category.php':
        if(isset($_GET['catid'])){
            $sql_title = "SELECT * FROM category WHERE category_id={$_GET['catid']} ";
            $result_title = mysqli_query($con, $sql_title) or die("Query Field");
            $row_title = mysqli_fetch_assoc($result_title);
            $post_title = $row_title['category_name']." News";
        }else{
            $post_title = "No Post Found";
        }
        break;
        case 'author.php':
        if(isset($_GET['aid'])){
            $sql_title = "SELECT * FROM user WHERE user_id={$_GET['aid']} ";
            $result_title = mysqli_query($con, $sql_title) or die("Query Field");
            $row_title = mysqli_fetch_assoc($result_title);
            $post_title = "News By : ".$row_title['first_name']." ".$row_title['last_name'];
        }else{
            $post_title = "No Post Found";
        }
        break;
        case 'search.php':
        if(isset($_GET['search'])){
            $post_title = $_GET['search'];
        }else{
            $post_title = "No Post Found";
        }
        break;
    
    default:
       $post_title = "News";
        break;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title><?php echo $post_title; ?></title>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <!-- Font Awesome Icon -->
    <link rel="stylesheet" href="css/font-awesome.css">
    <!-- Custom stlylesheet -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<!-- HEADER -->
<div id="header">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <!-- LOGO -->
            <div class=" col-md-offset-4 col-md-4">
                <?php
                
                
                $sql2 = "SELECT * FROM setting";
                $result2 = mysqli_query($con, $sql2);
                if(mysqli_num_rows($result2) > 0){
                    while ($row2 = mysqli_fetch_assoc($result2)) {
                        if($row2['logo'] == ''){
                            echo $row2['website_name'];
                        }else{
                            echo '<a href="index.php" id="logo"><img src="admin/images/'.$row2["logo"].'"></a>';
                        }
                    }
                }
                        
                ?>
                
            </div>
            <!-- /LOGO -->
        </div>
    </div>
</div>
<!-- /HEADER -->
<!-- Menu Bar -->
<div id="menu-bar">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <?php
                include "admin/config.php";
                if(isset($_GET['catid'])){
                   $cat_id = $_GET['catid'];
                }
                
                $sql = "SELECT * FROM category WHERE post > 0 ";
                $result = mysqli_query($con, $sql);
                if(mysqli_num_rows($result) > 0){
                    $active="";
                ?>
                <ul class='menu'>
                    <li><a href="<?php echo $path?>">HOME</a></li>
                    <?php 
                    while($row = mysqli_fetch_assoc($result)){
                        if(isset($_GET['catid'])){
                        if($row['category_id'] == $cat_id){
                            $active = "active";
                        }else{
                             $active = "";
                        }
                        }
                    echo "<li><a class='{$active}' href='category.php?catid={$row['category_id']}'>{$row['category_name']}</a></li>";
                }
                     ?>
                </ul>
            <?php } ?>
            </div>
        </div>
    </div>
</div>
<!-- /Menu Bar -->
