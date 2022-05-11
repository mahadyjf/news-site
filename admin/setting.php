<?php include "header.php"; ?>
  <div id="admin-content">
      <div class="container">
         <div class="row">
             <div class="col-md-12">
                 <h1 class="admin-heading">Add New Post</h1>
             </div>
              <div class="col-md-offset-3 col-md-6">
			<?php
			    include "config.php";
			    
			    $sql = "SELECT * FROM setting";
			    $result = mysqli_query($con, $sql);
			    if(mysqli_num_rows($result) > 0){
			        while ($row = mysqli_fetch_assoc($result)) {
			            
			    ?>
                  <!-- Form -->
                  <form  action="save-setting.php" method="POST" enctype="multipart/form-data">
                      <div class="form-group">
                          <label for="website_name">Website Name</label>
                          <input type="text" name="website_name" class="form-control" value="<?php echo $row['website_name'];?>" autocomplete="off" required>
                      </div>
                      
                      
                      <div class="form-group">
                          <label for="logo">Website logo</label>
                          <input type="file" name="logo" >
                          <img src="images/<?php echo $row['logo'];?>">
                          <input type="hidden" name="old_logo" value="<?php echo $row['logo'];?>">
                      </div>
                      <div class="form-group">
                          <label for="footer_desc">Footer Description</label>
                          <textarea name="footer_desc" class="form-control" rows="5"  required><?php echo $row['fotter_desc'];?></textarea>
                      </div>
                      <input type="submit" name="submit" class="btn btn-primary" value="Save" required />
                  </form>
                  <!--/Form -->
              <?php } }?>
              </div>
          </div>
      </div>
  </div>
<?php include "footer.php"; ?>
