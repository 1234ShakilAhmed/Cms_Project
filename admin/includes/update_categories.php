                        <form action="" method="post">
                        <div class="form-group">
                            <label for="post_category">Edit Category</label>
                            <?php
                            // View All Updates
                                if(isset($_GET['update'])){
                                    $cat_id = $_GET['update'];

                                    $qry = "SELECT * FROM categories WHERE cat_id = $cat_id";
                                    $result = mysqli_query($connection,$qry);

                                    while($row = mysqli_fetch_assoc($result)){
                                        $cat_title = $row['cat_title'];
                                
                        ?>
                            <input type="text" name="cat_title" id="post_category" value="<?php echo $cat_title;?>" class="form-control">
                            <?php     }
                                }?>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary" name="update_title" type="submit">Update Category</button>
                        </div>
                        </form>

                    <?php
                    // Update Category
                    Update_category();


                    ?>