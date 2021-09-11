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
                            <small><?php echo $_SESSION['username']; ?></small>
                        </h1>
                       
                    </div>
                </div>
                <!-- /.row -->


                       
                <!-- /.row -->
                
<div class="row">
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-file-text fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <?php 

                        $qry = "SELECT * FROM posts";
                        $result = mysqli_query($connection,$qry);
                        $post_count = mysqli_num_rows($result);

                        ?>

                  <div class='huge'><?php echo $post_count;  ?></div>
                        <div>Posts</div>
                    </div>
                </div>
            </div>
            <a href="posts.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-green">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-comments fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                            <?php
                            $qry = "SELECT * FROM comments";
                            $result = mysqli_query($connection,$qry);

                            $comment_count = mysqli_num_rows($result);

                             ?>
                     <div class='huge'><?php echo $comment_count; ?></div>
                      <div>Comments</div>
                    </div>
                </div>
            </div>
            <a href="comments.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-yellow">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-user fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                            <?php
                    $qry = "SELECT * FROM users ";
                    $result = mysqli_query($connection,$qry);

                    $user_count = mysqli_num_rows($result);

                            ?>

                    <div class='huge'><?php echo $user_count; ?></div>
                        <div> Users</div>
                    </div>
                </div>
            </div>
            <a href="users.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-red">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-list fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                                                    <?php
                    $qry = "SELECT * FROM categories ";
                    $result = mysqli_query($connection,$qry);

                    $category_count = mysqli_num_rows($result);

                            ?>
                        <div class='huge'><?php echo $category_count; ?></div>
                         <div>Categories</div>
                    </div>
                </div>
            </div>
            <a href="categories.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
</div>
                <!-- /.row -->

                <?php
                        $qry = "SELECT * FROM posts WHERE post_status = 'Draft'";
                        $result = mysqli_query($connection,$qry);
                        $draft_count = mysqli_num_rows($result);

                        $qry = "SELECT * FROM posts WHERE post_status = 'Published'";
                        $result = mysqli_query($connection,$qry);
                        $published_count = mysqli_num_rows($result);

                        $qry = "SELECT * FROM comments WHERE comment_status ='UnApprove'";
                        $result = mysqli_query($connection,$qry);
                        $unapproved_count = mysqli_num_rows($result);


                        $qry = "SELECT * FROM users WHERE user_role = 'Subscriber'";
                        $result = mysqli_query($connection,$qry);
                        $subscriber_count = mysqli_num_rows($result);



                ?>

                <div class="row">

                    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['Data','Count'],
       <?php
            $text = ['All Posts','Active Posts','Draft Posts','Users','Subscriber','Comments','Unapprove Comment','Categories'];
            $value = [$post_count,$published_count,$draft_count,$user_count,$subscriber_count,$comment_count, $unapproved_count,$category_count];

            for($i=0; $i<8;$i++){
                    echo"['".$text[$i]."',".$value[$i]."],";
            }




       ?>
       
       
       
       
        //   ['Year', 'Sales'],
        //   ['2014', 1000],
        //   ['2015', 1170],
        //   ['2016', 660],
        //   ['2017', 1030]
        ]);

        var options = {
          chart: {
            title: '',
            subtitle: '',
          }
        };

        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>
                </div>
                <div id="columnchart_material" style="width: auto; height: 500px;"></div>

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
 <?php  include "includes/admin_footer.php";?>
