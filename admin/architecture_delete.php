

<?php
require('../connections.php');
if(isset($_GET['Id'])){
    $id = $_GET['Id'];
    $query = "DELETE FROM architecture_section WHERE Id = '$id'";
    $execute = mysqli_query($connect,$query);
    if($execute){
        header('location:architecture.php');
    }
}
?>
