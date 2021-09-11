<?php
 if(isset($_POST['create_post'])){
        $post_title = $_POST['post_title'];
        $post_cat_id = $_POST['post_category_id'];
        $post_author = $_POST['post_author'];
        $post_status = $_POST['post_status'];
        $post_image = $_FILES['post_image']['name'];
        $post_image_tmp = $_FILES['post_image']['tmp_name'];
        $post_tags = $_POST['post_tags'];
        $post_content = $_POST['post_content'];
        $post_date = date('d-m-y');
        $post_comment_count = 0;
       move_uploaded_file($post_image_tmp,"../images/$post_image");

       $qry = "INSERT INTO posts(post_category_id, post_title, post_author, post_date, post_image, post_content,post_tags,post_comment_count, post_status) VALUES ($post_cat_id,'$post_title','$post_author','$post_date','$post_image','$post_content','$post_tags',$post_comment_count,'$post_status')";

       $result = mysqli_query($connection,$qry);

       if(!$result){
           die("Connection Failed ".mysqli_error($connection));
       }

        $post_id = mysqli_insert_id($connection);

        echo"Created Post <a href='../post.php?post_id=$post_id'>View Post </a> Or <a href='./post.php'> Edit Post</a>";

 }



?>



<form action="" method="post" enctype="multipart/form-data"> 
<div class="form-group">
<label for="">Post Title</label>
<input type="text" name='post_title' class="form-control">
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
<input type="text" name='post_author' class="form-control">
</div>
<div class="form-group">
<label for="">Post Status</label>
<select name="post_status" >
    <option value="Draft">Select Option</option>
    <option value="Published">Publish</option>
    <option value="Draft">Draft</option>
</select>

</div>

<div class="form-group">
<label for="">Post Image</label>
<input type="file" name='post_image' >
</div>
<div class="form-group">
<label for="">Post Tags</label>
<input type="text" name='post_tags' class="form-control">
</div>
<div class="form-group">
<label for="">Post Content </label>
<textarea name="post_content" id="editor" class="form-control" cols="30" rows="10"></textarea>
</div>
<div class="form-group">

<input type="submit" name='create_post' class="btn btn-primary" Value="Publish Post">
</div>




</form>