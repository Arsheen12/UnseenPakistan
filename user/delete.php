<?php
require('../connections.php');
if(isset($_GET['delete'])){
    $id = $_GET['delete'];
    $query = "DELETE FROM user_posts WHERE Post_Id = '$id'";
    $execute = mysqli_query($connect,$query);
    if($execute){
        header('location:post_display.php');
    }
}
?>