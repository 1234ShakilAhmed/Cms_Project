<?php  include "includes/admin_header.php" ?>

    <div id="wrapper">

        <!-- Navigation -->
<?php  include "includes/admin_navigation.php";?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                           Welcome To Admin
                            <small>Author</small>
                        </h1>
                       
                    </div>

                    <div class="col-xs-6">
                      
                        <?php
                          //INSERT INTO Categories
                          insert_category();
                        ?>

                        <form action="" method="post">
                        <div class="form-group">
                            <label for="post_category">Add Category</label>
                            <input type="text" name="cat_title" id="post_category" class="form-control">
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary" name="submit" type="submit">Add Category</button>
                        </div>
                        </form>
                        <?php include "includes/update_categories.php"; ?>
                </div>


                    <div class="col-xs-6">
        


                        <table class="table table-bordered  table-hover">
                            <thead >
                                <th>
                                    Cat Id
                                </th>
                                <th>
                                    Cat Title
                                </th>
                                <th colspan="2">
                                    Action
                                </th>
                            </thead>
                            <tbody>
                            <?php
                    //Find All Categories
                    findAll_categories();

                ?>
                            </tbody>


                            <?php
                    // Delete Categories
                    delete_category();
                            
                            ?>
                        </table>
                        </div>
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
 <?php  include "includes/admin_footer.php";?>
