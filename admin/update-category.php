<?php include "header.php";
include "config.php"; 

      if($_SESSION['role'] == 0){
      header("Location: $path/admin/post.php");
      }

       //Update Code
       if(isset($_POST['sumbit'])){
        $catid = $_POST['cat_id'];
        $cat_name = $_POST['cat_name'];
        $sql = "UPDATE category SET category_name='$cat_name' WHERE category_id=$catid ";
        $result = mysqli_multi_query($con, $sql);
        if($result){
        header("Location: $path/admin/category.php");
        }else{
          echo "<div class='alert alert-danger'>Query Field</div>";
        }
             }
?>
  <div id="admin-content">
      <div class="container">
          <div class="row">
              <div class="col-md-12">
                  <h1 class="adin-heading"> Update Category</h1>
              </div>
              <div class="col-md-offset-3 col-md-6">
                <?php
                $cat_id = $_GET['catid'];
                $sql1 = "SELECT * FROM category WHERE category_id=$cat_id ";
                $result1 = mysqli_query($con, $sql1);
                if(mysqli_num_rows($result1) > 0){
                  while($row = mysqli_fetch_assoc($result1)){
                
                ?>
                  <form action="<?php $_SERVER['PHP_SELF']; ?>" method ="POST">
                      <div class="form-group">
                          <input type="hidden" name="cat_id"  class="form-control" value="<?php echo $row['category_id'];?>" placeholder="">
                      </div>
                      <div class="form-group">
                          <label>Category Name</label>
                          <input type="text" name="cat_name" class="form-control" value="<?php echo $row['category_name'];?>"  placeholder="" required>
                      </div>
                      <input type="submit" name="sumbit" class="btn btn-primary" value="Update" required />
                  </form>
                <?php }}?>
                </div>
              </div>
            </div>
          </div>
<?php include "footer.php"; ?>
