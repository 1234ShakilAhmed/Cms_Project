<table class="table table-hover table-bordered">
                            <thead>
                                <th>ID</th>
                                <th>Username</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Admin</th>
                                <th>Subscriber</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </thead>
                            <tbody>
                               <?php 
                            $qry = "SELECT * FROM users";
                            $result = mysqli_query($connection, $qry);

                            while($row = mysqli_fetch_assoc($result)){
                                $user_id = $row['user_id'];
                                $username = $row['username'];
                                $user_firstname = $row['user_firstname'];
                                $user_lastname = $row['user_lastname'];
                                $user_email = $row['user_email'];
                                $user_role = $row['user_role'];
                                


                                echo "<tr>";
                                echo"<td>$user_id</td>";
                                echo"<td>$username</td>";
                                echo"<td> $user_firstname</td>";
                                echo"<td>$user_lastname</td>";
                                echo"<td>$user_email</td>";
                                echo"<td>$user_role</td>";
                                echo"<td><a href='users.php?admin=$user_id'>Admin </a></td>";
                                echo"<td><a href='users.php?subscriber=$user_id'>Subscriber </a></td>";
                                echo"<td><a href='users.php?source=edit_user&user_id=$user_id'>Edit </a></td>";
                                echo"<td><a href='users.php?delete=$user_id'>Delete</a></td>";
                                echo "</tr>";
                                
                            }


?>
                            </tbody>
                        </table>

    <?php
        if(isset($_GET['delete'])){
            $user_id = $_GET['delete'];

            $qry = "DELETE FROM users WHERE user_id = $user_id";

            $result = mysqli_query($connection,$qry);

            if(!$result){
                die("Connection Failed".mysqli_error($connection));

            }
            header('Location:users.php');
        }
        if(isset($_GET['admin'])){
            $user_id = $_GET['admin'];

            $qry = "UPDATE users SET user_role ='Admin' WHERE user_id = $user_id";

            $result = mysqli_query($connection,$qry);
            if(!$result){
                die("Query Failed".mysqli_error($connection));
            }
            header('Location:users.php');
        }

    if(isset($_GET['subscriber'])){
        $user_id = $_GET['subscriber'];

        $qry = "UPDATE users SET user_role= 'Subscriber' WHERE user_id = $user_id";

        $result = mysqli_query($connection,$qry);

        if(!$result){
            die("Query Failed".mysqli_error($connection));
        }
        header('Location:users.php');
    }


?>