<?php include "header.php"; ?>
  <div id="admin-content">
      <div class="container">
          <div class="row">
              <div class="col-md-10">
                  <h1 class="admin-heading">All Posts</h1>
              </div>
              <div class="col-md-2">
                  <a class="add-new" href="add-post.php">add post</a>
              </div>
              <div class="col-md-12">
                <?php
                include "config.php";

                $limit = 3;
                
                if(isset($_GET['page'])){
                  $page = $_GET['page'];
                }else{
                  $page = 1;
                }
                $offset = ($page - 1) * $limit;
                if($_SESSION['role'] == 1){
                $sql = "SELECT * FROM post 
                LEFT JOIN category ON post.category=category.category_id
                LEFT JOIN user ON post.author=user.user_id
                ORDER BY post.post_id DESC LIMIT $offset, $limit ";
              }else{
                $sql = "SELECT * FROM post 
                LEFT JOIN category ON post.category=category.category_id
                LEFT JOIN user ON post.author=user.user_id WHERE user_id={$_SESSION['user_id']}
                ORDER BY post.post_id DESC LIMIT $offset, $limit ";
              }
                $result = mysqli_query($con, $sql);
                if(mysqli_num_rows($result)){
                ?>
                  <table class="content-table">
                      <thead>
                          <th>S.No.</th>
                          <th>Title</th>
                          <th>Category</th>
                          <th>Date</th>
                          <th>Author</th>
                          <th>Edit</th>
                          <th>Delete</th>
                      </thead>
                      <tbody>
                        <?php
                        while ($row = mysqli_fetch_assoc($result)) {
                          
                        ?>
                          <tr>
                              <td class='id'><?php echo $row['post_id'];?></td>
                              <td><?php echo $row['title'];?></td>
                              <td><?php echo $row['category_name'];?></td>
                              <td><?php echo $row['post_date'];?></td>
                              <td><?php echo $row['username'];?></td>
                              <td class='edit'><a href='update-post.php?post_id=<?php echo $row['post_id'];?>'><i class='fa fa-edit'></i></a></td>
                              <td class='delete'><a href='delete-post.php?post_id=<?php echo $row['post_id'];?>&catid=<?php echo $row['category'];?>'><i class='fa fa-trash-o'></i></a></td>
                          </tr>
                          <?php } ?>
                      </tbody>
                  </table>
                <?php }
                if($_SESSION['role'] == 1){
                $sql1 = "SELECT * FROM post";
              }else{
                $sql1 = "SELECT * FROM post WHERE author={$_SESSION['user_id']} ";
              }
                $result1 = mysqli_query($con, $sql1);
                if(mysqli_num_rows($result1)){
                  $total_rec = mysqli_num_rows($result1);
                  $totla_page = ceil($total_rec/$limit);
                  echo "<ul class='pagination admin-pagination'>";
                  if($page > 1){
                    echo "<li><a href='post.php?page=".($page - 1)."'>PREV</a></li>";
                  }
                  for($i = 1; $i <= $totla_page; $i++){
                    if($page == $i){
                      $active = 'active';
                    }else{
                      $active = '';
                    }
                    echo "<li class='".$active."'><a href='post.php?page=".$i."'>".$i."</a></li>";
                  }
                  if($page < $totla_page){
                    echo "<li><a href='post.php?page=".($page + 1)."'>NEXT</a></li>";
                  }
                  echo "</ul>";
                }
                ?>
                  
                      <!-- <li class="active"><a>1</a></li> -->
                      
                      
                  
              </div>
          </div>
      </div>
  </div>
<?php include "footer.php"; ?>