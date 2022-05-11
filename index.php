<?php include 'header.php'; ?>
    <div id="main-content">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <!-- post-container -->
                    <div class="post-container">
                   
                        <?php
                        include "admin/config.php";
                        $limit=3;
                        if(isset($_GET['page'])){
                            $page = $_GET['page'];
                        }else{
                            $page = 1;
                        }
                        $offset = ($page - 1)*$limit;
                        $sql = "SELECT * FROM post LEFT JOIN category ON post.category=category.category_id 
                        LEFT JOIN user ON post.author=user.user_id ORDER BY post_id DESC LIMIT $offset, $limit ";
                        $result = mysqli_query($con, $sql) or die("Query Field");
                        if(mysqli_num_rows($result)){
                            while ($row = mysqli_fetch_assoc($result)) {
                               
                        ?>
                        
                        <div class="post-content">
                            <div class="row">
                                <div class="col-md-4">
                                    <a class="post-img" href="single.php?post_id=<?php echo $row['post_id']; ?>"><img src="admin/upload/<?php echo $row['post_img']; ?>" alt=""/></a>
                                </div>
                                <div class="col-md-8">
                                    <div class="inner-content clearfix">
                                        <h3><a href='single.php?post_id=<?php echo $row['post_id']; ?>'><?php echo $row['title']; ?></a></h3>
                                        <div class="post-information">
                                            <span>
                                                <i class="fa fa-tags" aria-hidden="true"></i>
                                                <a href='category.php?catid=<?php echo $row['category_id']; ?>'><?php echo $row['category_name']; ?></a>
                                            </span>
                                            <span>
                                                <i class="fa fa-user" aria-hidden="true"></i>
                                                <a href='author.php?aid=<?php echo $row['author']; ?>'><?php echo $row['username']; ?></a>
                                            </span>
                                            <span>
                                                <i class="fa fa-calendar" aria-hidden="true"></i>
                                               <?php echo $row['post_date']; ?>
                                            </span>
                                        </div>
                                        <p class="description">
                                            <?php echo substr($row['description'],0,130)."....."; ?>
                                        </p>
                                        <a class='read-more pull-right' href='single.php?post_id=<?php echo $row['post_id']; ?>'>read more</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        
                    
                        
                        
                      
                       

                    <?php }
                    } 
                    
                    $sql1 = "SELECT * FROM post";
                    $result1 = mysqli_query($con, $sql1);
                    if(mysqli_num_rows($result1)){
                        $total_rec=mysqli_num_rows($result1);
                        $total_page = ceil($total_rec/$limit);
                        echo "<ul class='pagination'>";
                        if($page > 1){
                            echo "<li><a href='index.php?page=".($page - 1)."'>PREV</a></li>";
                        }
                        for ($i=1; $i <=$total_page ; $i++) { 
                            
                            if($page == $i){
                                $active = 'active';
                            }else{
                                $active = '';
                            }
                            echo "<li class='".$active."'><a href='index.php?page=".$i."'>".$i."</a></li>";
                        }
                        if($page < $total_page){
                            echo "<li><a href='index.php?page=".($page + 1)."'>NEXT</a></li>";
                        }
                        echo "</ul>";
                    }
                    
                    ?>
                        
                           <!--  <li class="active"><a href="">1</a></li> -->
                            
                            
                         </div><!-- /post-container -->
                    
                
                </div>
                <?php include 'sidebar.php'; ?>
            </div>
        </div>
    </div>
<?php include 'footer.php'; ?>
