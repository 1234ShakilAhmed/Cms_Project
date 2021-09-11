<?php  include "includes/admin_header.php";

        if(isset($_SESSION['username'])){
            $username = $_SESSION['username'];

            $qry = "SELECT * FROM users WHERE username ='$username'";
             $result = mysqli_query($connection,$qry);

             if(!$result){
                 die("Query Failed".mysqli_error($connection));
             }

             while($row=mysqli_fetch_assoc($result)){
             $username = $row['username'];
            $first_name = $row['user_firstname'];
            $last_name = $row['user_lastname'];
            $user_email = $row['user_email'];
            $user_password = $row['user_password'];
            $user_role = $row['user_role'];
             }
        }

if(isset($_POST['update_user'])){

            $username = $_POST['username'];
            $first_name = $_POST['first_name'];
            $last_name = $_POST['last_name'];
            $user_email = $_POST['email'];
            $user_password = $_POST['user_password'];
            $user_role = $_POST['user_role'];

    $qry = "UPDATE users SET username = '$username', user_firstname = '$first_name', user_lastname='$last_name',user_email='$user_email',user_role='$user_role' WHERE username = '$username'";
     
    $result = mysqli_query($connection,$qry);

    if(!$result){
        die("Query Failed".mysqli_error($connection));
    }
}
    

 ?>

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

                        <form action="" method="post" enctype="multipart/form-data"> 
<div class="form-group">
<label for="">First Name</label>
<input type="text" name='first_name' class="form-control" value="<?php echo $first_name; ?>">
</div>
<div class="form-group">
<label for="">Last Name</label>
<input type="text" name='last_name' class="form-control" value="<?php echo $last_name; ?>">
</div>
<div class="form-group">
<label for="">User Name</label>
<input type="text" name='username' class="form-control" value="<?php echo $username; ?>">
</div>
<div class="form-group">
<label for="">E-mail</label>
<input type="email" name='email' class="form-control" value="<?php echo $user_email; ?>">
</div>

<div class="form-group">
<label for="">Password</label>
<input type="password" name='password' class="form-control" value="<?php echo $user_password; ?>">
</div>
<div class="form-group">
<label for="">User Role</label>
<select name="user_role" id="">
    <option value="<?php echo $user_role; ?>"><?php echo $user_role; ?></option>
    <?php if($user_role=='Admin'){
            echo"<option value='Admin'> Admin </option>";
    }else{
        echo"<option value='Subscriber'> Subscriber </option>";
    }


    ?>
</select>
</div>

<div class="form-group">

<input type="submit" name='update_user' class="btn btn-primary" Value="Update User">
</div>




</form>

                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
 <?php  include "includes/admin_footer.php";?>
