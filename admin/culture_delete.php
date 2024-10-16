
<?php
require('../connections.php');
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $query = "DELETE FROM culture WHERE id = '$id'";
    $execute = mysqli_query($connect,$query);
    if($execute){
        header('location:culture.php');
    }
}
?>