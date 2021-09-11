<?php 
if(isset($_POST['checkboxArray'])){
    $checkboxarray = $_POST['checkboxArray'];
    echo $bulkoption = $_POST['bulk_option'];
   
    foreach($checkboxarray as $post_id){
          
        switch($bulkoption){
            
            case'Published':
                $qry = "UPDATE posts SET post_status ='published' WHERE post_id = $post_id ";
            break;
            
            case'Draft':
                $qry = "UPDATE posts SET post_status ='draft' WHERE post_id = $post_id";
            break;
            case'Delete':
                $qry = "DELETE FROM posts WHERE post_id = $post_id";
            break;
        }
        //echo "qry = $qry";
         // echo "post_id =$post_id  option =$bulkoption";
            $result = mysqli_query($connection,$qry);

            if(!$result){
                die('Query Failed'.mysqli_error($connection));
            }
    }
}



?>





<form action="" method="post">
    
<table class="table table-hover table-bordered">
    <div class="col-xs-4" id='bulkoption_container'>
        <select name="bulk_option" id="" class='form-control'>
            <option value="">Select Option</option>
            <option value="Published">Publish</option>
            <option value="Draft">Draft</option>
            <option value="Delete">Delete</option>
        </select>
    </div>
    <div class="col-xs-4">
      <input type="submit" class='btn btn-primary' value='Apply'>
      <a href="posts.php?source=add_post" class='btn btn-success'>Add New</a>
    </div>
                            <thead>
                                <th><input type="checkbox" id='selectAllbox'></th>
                                <th>ID</th>
                                <th>Author</th>
                                <th>Title</th>
                                <th>Category</th>
                                <th>Status</th>
                                <th>Image</th>
                                <th>Tags</th>
                                <th>Comments</th>
                                <th>Date</th>
                                <th>Action</th>
                                <th>Action</th>
                            </thead>
                            <tbody>
                               <?php 
                            $qry = "SELECT * FROM posts";
                            $result = mysqli_query($connection, $qry);

                            while($row = mysqli_fetch_assoc($result)){
                                $post_id = $row['post_id'];
                                $post_author = $row['post_author'];
                                $post_title = $row['post_title'];
                                $post_category_id = $row['post_category_id'];
                                $post_status = $row['post_status'];
                                $post_image = $row['post_image'];
                                $post_tags = $row['post_tags'];
                                $post_comments = $row['post_comment_count'];
                                $post_date = $row['post_date'];


                                echo "<tr>";
                                echo"<td> <input type='checkbox' class='checkboxes' name='checkboxArray[]' value='$post_id' > </td>";
                                echo"<td>$post_id</td>";
                                echo"<td>$post_author</td>";
                                echo"<td>$post_title</td>";
                                echo"<td>$post_category_id</td>";
                                echo"<td>$post_status</td>";
                                echo"<td><img src='../images/$post_image' alt='image' width='100'></img></td>";
                                echo"<td>$post_tags</td>";
                                echo"<td>$post_comments</td>";
                                echo"<td>$post_date</td>";
                                echo"<td><a href='posts.php?source=edit_post&post_id=$post_id'>Edit </a></td>";
                                echo"<td><a href='posts.php?delete=$post_id'>Delete </a></td>";
                                echo "</tr>";
                                
                            }


?>
                            </tbody>
                        </table>
</form>
    <?php
        if(isset($_GET['delete'])){
            $delete_id = $_GET['delete'];

            $qry = "DELETE FROM posts WHERE post_id = $delete_id";

            $result = mysqli_query($connection,$qry);

            if(!$result){
                die("Connection Failed".mysqli_error($connection));

            }
            header('Location:posts.php');
        }



?>