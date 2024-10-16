

<?php
require('../connections.php');
if(isset($_GET['Id'])){
    $id = $_GET['Id'];
    $query = "DELETE FROM user_posts WHERE Post_Id = '$id'";
    $execute = mysqli_query($connect,$query);
    if($execute){
        header('location:approveduser_posts.php');
    }
}
?>
