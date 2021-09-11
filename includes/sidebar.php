<div class="col-md-4">

<!-- Blog Search Well -->
<div class="well">
    <h4>Blog Search</h4>
    <form action="search.php" method="post">
    <div class="input-group">
        <input type="text" name="search" class="form-control">
        <span class="input-group-btn">
            <button class="btn btn-default" name="submit" type="submit">
                <span class="glyphicon glyphicon-search"></span>
        </button>
        </span>
    </div>
    </form>
    <!-- /.input-group -->
</div>
<!-- Login Form -->
<div class="well">
    <h4>Login</h4>
    <form action="includes/login.php" method="post">
        <div class="form-group">
            <input type="text" placeholder="Enter Username" name="username" class="form-control" >
        </div>
    <div class="input-group">
        <input type="password" placeholder="Enter Password" name= "password" class="form-control" placeholder="password">
        <span class="input-group-btn">
            <button class="btn btn-primary" name="submit" type="submit" >
                Login
        </button>
        </span>
    </div>
    </form>
    <!-- /.input-group -->
</div>

<!-- Blog Categories Well -->
<div class="well">
    <h4>Blog Categories</h4>
    <div class="row">
        <div class="col-lg-6">
            <ul class="list-unstyled">
        <?php
            $qry = "SELECT * FROM categories";
            $result = mysqli_query($connection ,$qry);

            while($row = mysqli_fetch_assoc($result)){
                $cat_title = $row['cat_title'];

                echo "<li><a href='#'>$cat_title</a>";
            }

      



?>


               
            </ul>
        </div>
        <!-- /.col-lg-6 -->
        
    </div>
    <!-- /.row -->
</div>

<?php include "widget.php";?>

</div>