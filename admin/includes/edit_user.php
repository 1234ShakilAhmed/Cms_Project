<?php

if(isset($_GET['user_id'])){
    $user_id = $_GET['user_id'];

    $qry = "SELECT * FROM users WHERE user_id = $user_id";

    $result = mysqli_query($connection,$qry);
    if(!$result){
        die("Connection Failed".mysqli_error($connection));
    }
    while($row = mysqli_fetch_assoc($result)){
            $username = $row['username'];
            $first_name = $row['user_firstname'];
            $last_name = $row['user_lastname'];
            $user_email = $row['user_email'];
            $user_password = $row['user_password'];
            $user_role = $row['user_role'];

    }
}


if(isset($_POST['edit_user'])){

            $username = $_POST['username'];
            $first_name = $_POST['first_name'];
            $last_name = $_POST['last_name'];
            $user_email = $_POST['user_email'];
            $user_password = $_POST['user_password'];
            $user_role = $_POST['user_role'];

        $qry = "SELECT randsat FROM users";

                $result = mysqli_query($connection,$qry);

                if(!$result){
                    die("Query Failed".mysqli_error($connection));
                }

                while($row = mysqli_fetch_assoc($result))
                    $randsat = $row['randsat'];

                    $user_password= crypt($user_password,$randsat);

                
                    $qry = "UPDATE users SET username = '$username', user_firstname = '$first_name', user_lastname='$last_name',user_email='$user_email',user_role='$user_role',user_password = '$user_password' WHERE user_id = $user_id";
     
    $result = mysqli_query($connection,$qry);

    if(!$result){
        die("Query Failed".mysqli_error($connection));
    }
}


?>




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
<label for="">Username</label>
<input type="text" name='username' class="form-control" value="<?php echo $username; ?>" >
</div>
<div class="form-group">
<label for="">E-mail</label>
<input type="email" name='user_email' class="form-control" value="<?php echo $user_email; ?>">
</div>

<div class="form-group">
<label for="">Role</label>
<select name="user_role" id="">
<option value="<?php  echo$user_role; ?>"><?php  echo $user_role; ?></option>
<?php
            if($user_role == 'Admin'){
                echo "<option value='Admin'> Admin</option>";
            }else{
                 echo "<option value='Admin'> Admin</option>";
            }

?>
</select>
</div>

<div class="form-group">
<label for="">Password</label>
<input type="password" name='user_password' class="form-control" value="<?php echo $user_password; ?>">
</div>

<div class="form-group">

<input type="submit" name='edit_user' class="btn btn-primary" Value="Edit User">
</div>




</form>
