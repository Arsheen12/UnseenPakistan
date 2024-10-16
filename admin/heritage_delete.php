
<!-- architectural heritage -->
<?php
require('../connections.php');
if(isset($_GET['Id'])){
    $id = $_GET['Id'];
    $query = "DELETE FROM heritage_section WHERE Id = '$id'";
    $execute = mysqli_query($connect,$query);
    if($execute){
        header('location:heritage.php');
    }
}
?>

?>