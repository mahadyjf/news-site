<div id ="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
            	<?php
                
                
                $sql2 = "SELECT * FROM setting";
                $result2 = mysqli_query($con, $sql2);
                if(mysqli_num_rows($result2) > 0){
                    while ($row2 = mysqli_fetch_assoc($result2)) {?>
                        
                
                <span><?php echo $row2['fotter_desc'];?></span>
                <?php     }
                }
                        
                ?>
            </div>
        </div>
    </div>
</div>
</body>
</html>
