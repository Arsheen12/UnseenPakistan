

<!--  Gallery -->
<?php
require('../connections.php');
if(isset($_GET['Id'])){
    $id = $_GET['Id'];
    $query = "DELETE FROM gallery_section WHERE Id = '$id'";
    $execute = mysqli_query($connect,$query);
    if($execute){
        header('location:gallery.php');
    }
}
?>