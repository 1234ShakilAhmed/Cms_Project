<?php

if(isset($_GET['post_id'])){
    $post_id = $_GET['post_id'];

    $qry = "SELECT * FROM posts WHERE post_id = $post_id";

    $result = mysqli_query($connection,$qry);
    if(!$result){
        die("Connection Failed".mysqli_error($connection));
    }
    while($row = mysqli_fetch_assoc($result)){
            $post_title = $row['post_title'];
            $post_category_id = $row['post_category_id'];
            $post_author = $row['post_author'];
            $post_status = $row['post_status'];
            $post_image = $row['post_image'];
            $post_tags = $row['post_tags'];
            $post_content = $row['post_content'];

    }
}


if(isset($_POST['update_post'])){
    $post_title = $_POST['post_title'];
    $post_author = $_POST['post_author'];
    $post_category_id = $_POST['post_category_id'];
    $post_status = $_POST['post_status'];
    $post_image = $_FILES['post_image']['name'];
    $post_image_tmp = $_FILES['post_image']['tmp_name'];
    $post_tags = $_POST['post_tags'];
    $post_content = $_POST['post_content'];
    move_uploaded_file($post_image_tmp, "../images/$post_image");

    $qry = "UPDATE posts SET post_title = '$post_title', post_category_id = $post_category_id, post_author='$post_author',post_status='$post_status',post_image='$post_image',post_tags='$post_tags',post_content='$post_content' WHERE post_id = $post_id";
     
    $result = mysqli_query($connection,$qry);

    if(!$result){
        die("Query Failed".mysqli_error($connection));
    }
    echo"Recored Update <a href='../post.php?post_id=$post_id'>View Post </a> Or <a href='./posts.php'> Edit Post</a>";
}


?>




<form action="" method="post" enctype="multipart/form-data"> 
<div class="form-group">
<label for="">Post Title</label>
<input type="text" name='post_title' class="form-control" value="<?php echo $post_title; ?>">
</div>
<div class="form-group">
<label for="">Post Category</label>
<select name="post_category_id" id="">
    <?php
    $qry = "SELECT * FROM categories";

    $result = mysqli_query($connection,$qry);

    if(!$result){
        die("Query Failed".mysqli_error($connection));
    }

    while($row = mysqli_fetch_assoc($result)){
        $cat_id = $row['cat_id'];
        $cat_title = $row['cat_title'];

        echo"<option value='$cat_id'>$cat_title </option>";
    }

?>



</select>
</div>
<div class="form-group">
<label for="">Post Author</label>
<input type="text" name='post_author' class="form-control" value="<?php echo $post_author; ?>" >
</div>
<div class="form-group">
<label for="">Post Status</label>
<select name="post_status" >
    <option value="<?php  echo $post_status;?>"><?php  echo $post_status;?> </option>
<?php 
if($post_status=='published'){
    echo "<option value='Draft'>Draft</option>";
}else{
    echo "<option value='published'>Publish</option>";
}


?>
</select>

</div>

<div class="from-group">
    <img src="../images/<?php echo $post_image;?>" width="100" alt="">
</div>

<div class="form-group">
<label for="">Post Image</label>
<input type="file" name='post_image' >
</div>

<div class="form-group">
<label for="">Post Tags</label>
<input type="text" name='post_tags' class="form-control" value="<?php echo $post_tags; ?>">
</div>
<div class="form-group">
<label for="">Post Content </label>
<textarea name="post_content" id="editor" class="form-control" cols="30" rows="10" ><?php echo $post_content; ?> </textarea>
</div>
<div class="form-group">

<input type="submit" name='update_post' class="btn btn-primary" Value="Update Post">
</div>




</form>
