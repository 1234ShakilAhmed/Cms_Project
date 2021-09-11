<?php
 function insert_category(){
     global $connection;
    if(isset($_POST['submit'])){
        $cat_title = $_POST['cat_title'];
            if(empty($cat_title)){
                 echo "This Field Must Not be Empty";
            }else{

             $qry = "INSERT INTO categories (cat_title) VALUES('$cat_title')";
                $result = mysqli_query($connection,$qry);
            if(!$result){
                  die("Query Fail".mysqli_error($connection));
                     }
                        }
                            }
 }

function findAll_categories(){
    global $connection;
    $qry = "SELECT * FROM categories";
    $result = mysqli_query($connection , $qry);

    while($row = mysqli_fetch_assoc($result)){
        $cat_id = $row['cat_id'];
        $cat_title = $row['cat_title'];

        echo "<tr>";
        echo "<td>$cat_id</td>";
        echo "<td>$cat_title</td>";
        echo "<td><a href='categories.php?update={$cat_id}'>Edit</a></td>";
        echo "<td><a href='categories.php?delete={$cat_id}'>Delete</a></td>";
        echo "</tr>";

            }
}


function delete_category(){
    global $connection;
    if(isset($_GET['delete'])){
        $delete_id = $_GET['delete'];

        $qry = "DELETE FROM categories WHERE cat_id = $delete_id";

        $result = mysqli_query($connection,$qry);

        header('Location:categories.php');
    }
}

function Update_category(){
        global $connection;
    if(isset($_POST["update_title"])){
        $cat_id = $_GET['update'];
        $cat_title = $_POST['cat_title'];

        $qry = "UPDATE categories SET cat_title = '$cat_title' WHERE cat_id = '$cat_id'";

        $result= mysqli_query($connection,$qry);

        if(!$result){
            die("Connection Failed".mysqli_error($connection));
        }
}
}



?>