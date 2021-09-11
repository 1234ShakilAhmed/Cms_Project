<?php
 if(isset($_POST['create_user'])){
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $username = $_POST['username'];
        $user_email = $_POST['email'];
        $user_role = $_POST['user_role'];
       

       $qry = "INSERT INTO users(username,user_firstname, user_lastname, user_email, user_image,user_role) VALUES ('$username','$first_name','$last_name','$user_email',' ','$user_role')";

       $result = mysqli_query($connection,$qry);

       if(!$result){
           die("Connection Failed ".mysqli_error($connection));
       }

 }



?>



<form action="" method="post" enctype="multipart/form-data"> 
<div class="form-group">
<label for="">First Name</label>
<input type="text" name='first_name' class="form-control">
</div>
<div class="form-group">
<label for="">Last Name</label>
<input type="text" name='last_name' class="form-control">
</div>
<div class="form-group">
<label for="">User Name</label>
<input type="text" name='username' class="form-control">
</div>
<div class="form-group">
<label for="">E-mail</label>
<input type="email" name='email' class="form-control">
</div>

<div class="form-group">
<label for="">Password</label>
<input type="password" name='password' class="form-control">
</div>
<div class="form-group">
<label for="">User Role</label>
<select name="user_role" id="">
    <option value="Subscriber">Select Option</option>
    <option value="Admin">Admin</option>
    <option value="Subscriber">Subscriber</option>
</select>
</div>

<div class="form-group">

<input type="submit" name='create_user' class="btn btn-primary" Value="Create User">
</div>




</form>