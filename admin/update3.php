<?php
session_start();
require('../connections.php');

if(isset($_SESSION['admin'])){
    if(isset($_GET['logout'])){
        session_destroy();
        header('location:login_data.php');
        exit();
    }

    if(isset($_GET['Id'])){
        $Id = $_GET['Id'];
    }

    if(isset($_POST['edit'])){
        $Id = mysqli_real_escape_string($connect, $_POST['Id']);
        $Text = mysqli_real_escape_string($connect, $_POST['Text']);

        $icon =  $_POST['icon'];
        $Heading = mysqli_real_escape_string($connect, $_POST['Heading']);
        $b_text = mysqli_real_escape_string($connect, $_POST['Btn_text']);
        
        $image = $_FILES['Image']['name'];
        $tmp_name = $_FILES['Image']['tmp_name'];
        $folder = "image/";

        if (!empty($image)) {
            $target = $folder . basename($image);
            move_uploaded_file($tmp_name, $target);
            $imageQueryPart = ", `Image`='$target'";
        } else {
            $imageQueryPart = "";
        }
        
        $query = "UPDATE `architecture_section` SET `Btn_text`='$b_text', `Text`='$Text', `Heading`='$Heading' ,`icon`='$icon' $imageQueryPart WHERE Id='$Id';";
        $execute = mysqli_query($connect, $query);
        if($execute){
            header('location:architecture.php');
            exit();
        }
    }
?>

<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Unseen Pakistan</title>
 
  <link rel="icon" href="../image/icon.png">
  <link rel="stylesheet" href="assets/css/styles.min.css" />
 
</head>

<body>
  <!--  Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    <!-- Sidebar Start -->
    <?php
    require('components/sidebar.php');
    ?>
    <!--  Sidebar End -->
    <!--  Main wrapper -->
    <div class="body-wrapper">
      <!--  Header Start -->
      <?php
      require('components/navbar.php');
      ?>
      <!--  Header End -->
      <div class="container-fluid">
        
        <div class="row">
            <form action="update3.php" method="post" enctype="multipart/form-data">
            <?php
                $query="SELECT `Id`, `Image`, `Btn_text`, `Text`, `Heading`,`icon`  FROM `architecture_section` WHERE Id='$Id';";
                $execute = mysqli_query($connect, $query);
                $fetch = mysqli_fetch_assoc($execute);
            ?>
            <div class="mb-3">
                <label class="visually-hidden" for="inputName">Id</label>
                <input type="hidden" class="form-control" name="Id" id="inputName" value="<?php echo $fetch['Id']; ?>" />
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Heading</label>
                <input type="text" class="form-control" name="Heading" id="" value="<?php echo $fetch['Heading']; ?>" />
            </div> 
        
            <div class="mb-3">
                <label for="" class="form-label">Text</label>
                <input type="text" class="form-control" name="Text" id="" value="<?php echo $fetch['Text']; ?>" />
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Icon</label>
                <input type="text" class="form-control" name="icon" id="" value="<?php echo $fetch['icon']; ?>" />
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Button text</label>
                <input type="text" class="form-control" name="Btn_text" id="" value="<?php echo $fetch['Btn_text']; ?>" />
            </div>
            <div class="mb-3">
                <label for="" class="form-label">
                    <img src="<?php echo $fetch['Image']; ?>" alt="Updated Image" style="height:150px" " />
                </label>
                <input type="file" class="form-control" name="Image" id="" />
            </div>
            <button type="submit" class="btn btn-primary buttons" name="edit">Submit</button>
            </form>
        </div>
      </div>
        
      <!-- footer start -->
      <?php
      require('components/footer.php');
      ?>
      <!-- footer end -->
    </div>
  </div>
  <script src="assets/libs/jquery/dist/jquery.min.js"></script>
  <script src="assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="assets/js/sidebarmenu.js"></script>
  <script src="assets/js/app.min.js"></script>
  <script src="assets/libs/apexcharts/dist/apexcharts.min.js"></script>
  <script src="assets/libs/simplebar/dist/simplebar.js"></script>
  <script src="assets/js/dashboard.js"></script>
</body>

</html>
<?php 
} else {
    header('location:authentication-login.php');
    exit();
}
?>
