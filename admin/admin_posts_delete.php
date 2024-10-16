<?php
require('../connections.php');
if(isset($_GET['Id'])){
    $Id = $_GET['Id'];
    $query = "DELETE FROM admin_posts WHERE Id = '$Id'";
    $execute = mysqli_query($connect,$query);
    if($execute){
        header('location:admin_posts.php');
    }
}
?>

?>