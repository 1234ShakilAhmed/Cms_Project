<table class="table table-hover table-bordered">
                            <thead>
                                <th>ID</th>
                                <th>Author</th>
                                <th>Comment</th>
                                <th>Email</th>
                                <th>Status</th>
                                <th>In Response To</th>
                                <th>Date</th>
                                <th>Approve</th>
                                <th>UnApprove</th>
                                <th>Delete</th>
                            </thead>
                            <tbody>
                               <?php 
                            $qry = "SELECT * FROM comments";
                            $result = mysqli_query($connection, $qry);

                            while($row = mysqli_fetch_assoc($result)){
                                $comment_id = $row['comment_id'];
                                $comment_post_id = $row['comment_post_id'];
                                $comment_author = $row['comment_author'];
                                $comment_status = $row['comment_status'];
                                $comment_email = $row['comment_email'];
                                $comment_content = $row['comment_content'];
                                $comment_date = $row['comment_date'];


                                echo "<tr>";
                                echo"<td>$comment_post_id</td>";
                                echo"<td>$comment_author</td>";
                                echo"<td> $comment_content</td>";
                                echo"<td>$comment_email</td>";
                                echo"<td>$comment_status</td>";
                               
                               $qry1 = "SELECT * FROM posts WHERE post_id = $comment_post_id";
                               $result1 = mysqli_query($connection,$qry1);
                               if(!$result1){
                                   die("Query Failed ".mysqli_error($connection));
                               }
                               while($row1 = mysqli_fetch_assoc($result1)){
                                   $post_title = $row1['post_title'];
                                    echo"<td><a href='../post.php?post_id=$comment_post_id'>$post_title</a></td>";
                               }
                                echo"<td>$comment_date</td>";
                                echo"<td><a href='comments.php?approve=$comment_id'>Approve </a></td>";
                                echo"<td><a href='comments.php?unapprove=$comment_id'>UnApprove </a></td>";
                                echo"<td><a href='comments.php?delete=$comment_id'>Delete</a></td>";
                                echo "</tr>";
                                
                            }


?>
                            </tbody>
                        </table>

    <?php
        if(isset($_GET['delete'])){
            $delete_id = $_GET['delete'];

            $qry = "DELETE FROM comments WHERE comment_id = $delete_id";

            $result = mysqli_query($connection,$qry);

            if(!$result){
                die("Connection Failed".mysqli_error($connection));

            }
            header('Location:comments.php');
        }
        if(isset($_GET['approve'])){
            $approve_comment_id = $_GET['approve'];

            $qry = "UPDATE comments SET comment_status ='Approved' WHERE comment_id = $approve_comment_id";

            $result = mysqli_query($connection,$qry);
            if(!$result){
                die("Query Failed".mysqli_error($connection));
            }
            header('Location:comments.php');
        }

    if(isset($_GET['unapprove'])){
        $unapprove_comment_id = $_GET['unapprove'];

        $qry = "UPDATE comments SET comment_status = 'UnApprove' WHERE comment_id = $unapprove_comment_id";

        $result = mysqli_query($connection,$qry);

        if(!$result){
            die("Query Failed".mysqli_error($connection));
        }
        header('Location:comments.php');
    }


?>