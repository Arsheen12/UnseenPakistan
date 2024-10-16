<?php
require('../connections.php');
if(isset($_GET['approve'])){
    $id = $_GET['approve'];
    $query="UPDATE user_posts SET Post_Status='Approved' where Post_Id='$id';";
    $execute = mysqli_query($connect,$query);
    if($execute){
        header('location:user_posts.php');
    }
}


?>