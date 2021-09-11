<?php include "includes/header.php" ?>
    <!-- Navigation -->
<?php include "includes/navigation.php"; ?>




    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Post Content Column -->
            <div class="col-lg-8">
                <?php
    if(isset($_GET['post_id'])){
        $post_id = $_GET['post_id'];
        $post_author = $_GET['author'];
        $qry ="SELECT * FROM posts WHERE post_author ='$post_author'";

        $result = mysqli_query($connection,$qry);

        if(!$result){
            die("Query Failed".mysqli_error($connection));
        }
        while($row = mysqli_fetch_assoc($result)){
            $post_title = $row['post_title'];
            $post_author = $row['post_author'];
            $post_date = $row['post_date'];
            $post_image = $row['post_image'];
            $post_content = $row['post_content'];

?>

                <!-- Blog Post -->

                <!-- Title -->
                <h1><?php echo $post_title; ?></h1>

                <!-- Author -->
                <p class="lead">
                    by <a href="#"><?php echo $post_author; ?></a>
                </p>

                <hr>

                <!-- Date/Time -->
                <p><span class="glyphicon glyphicon-time"></span> Posted on <?php echo $post_date; ?></p>

                <hr>

                <!-- Preview Image -->
                <img class="img-responsive" src="images/<?php echo $post_image; ?>" alt="">

                <hr>

                <!-- Post Content -->
                <p class="lead">
                    <?php echo $post_content; ?>
                </p>
<?php }
?>
                <hr>

                <!-- Blog Comments -->

                <!-- Comments Form -->


                <hr>

       <!-- Comment -->
       <?php } ?>       

            </div>

            <!-- Blog Sidebar Widgets Column -->
           <?php include "includes/sidebar.php"; ?>

        </div>
        <!-- /.row -->

        <hr>
 <?php include "includes/footer.php";?>