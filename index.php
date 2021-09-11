 <?php 
    include "includes/header.php";
 ?>

    <!-- Navigation -->
<?php include "includes/navigation.php"; ?>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">
                <?php
                    $page_count = 2;
                if(isset($_GET['page'])){
                    $page = $_GET['page'];

                }else
                    $page = '';

                if($page == '' || $page ==1)
                    $post_no = 0;
                
                else
                        $post_no = ($page*$page_count)-$page_count;
                
                
                 $qry = "SELECT * FROM posts WHERE post_status = 'published'";
                 $result = mysqli_query($connection,$qry) or
                    die("Query Fail".mysqli_error($result));

                 $count = mysqli_num_rows($result);
                 $count = ceil($count/$page_count);


            $qry = "SELECT * FROM posts WHERE post_status = 'published' LIMIT $post_no ,$page_count";

            $result = mysqli_query($connection,$qry);
                $cnt =0;
            while($row = mysqli_fetch_assoc($result)){
                    $cnt++;
                    $post_id = $row['post_id'];
                    $post_title = $row['post_title'];
                    $post_author = $row['post_author'];
                    $post_date = $row['post_date'];
                    $post_image = $row['post_image'];
                    $post_content = $row['post_content'];
                    $post_status = $row['post_status'];

?>
                <h1 class="page-header">
                    Page Heading
                    <small>Secondary Text</small>
                </h1>

                <!-- First Blog Post -->
                <h2>
                    <a href="#"><?php echo $post_title; ?></a>
                </h2>
                <p class="lead">
                    by <a href="author_post.php?author=<?php echo $post_author; ?>&post_id=<?php echo $post_id;?>"><?php echo $post_author; ?></a>
                </p>
                <p><span class="glyphicon glyphicon-time " ></span> <?php echo $post_date; ?></p>
                <hr>
                <a href="post.php?post_id=<?php echo $post_id?>">
                <img class="img-responsive" src="images/<?php echo $post_image; ?>" alt="">
                </a>
                <hr>
                <p><?php echo $post_content; ?></p>
                <a class="btn btn-primary" href="post.php?post_id=<?php echo $post_id?>">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                <hr>
               <?php } 
               if($cnt==0)
                    echo"<h1>No Post Story</h1>";
               ?>

                <!-- Second Blog Post -->
             

                <!-- Third Blog Post -->
              

                <!-- Pager -->
                <ul class="pager">
                    <li class="previous">
                        <a href="#">&larr; Older</a>
                    </li>
                    <li class="next">
                        <a href="#">Newer &rarr;</a>
                    </li>
                </ul>

            </div>

            <!-- Blog Sidebar Widgets Column -->
<?php  include "includes/sidebar.php" ?>

        </div>
        <!-- /.row -->

        <ul class='pager'>
            <?php
            for($i=1; $i<=$count;$i++){
                if($i == $page){
                    echo "<li><a class='active' href='index.php?page=$i'>$i </a> </li>";
                }else{
                    echo "<li><a href='index.php?page=$i'>$i </a> </li>";
                }

               
            }


            ?>
            <li></li>
        </ul>

        <hr>

        <!-- Footer -->
       <?php
       include "includes/footer.php";?>