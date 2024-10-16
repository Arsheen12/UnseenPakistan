<?php
session_start();
require('../connections.php');

if (isset($_SESSION['admin'])) {
    if (isset($_GET['logout'])) {
        session_destroy();
        header('location:login_data.php');
        exit;
    }

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
    }

    if (isset($_POST['edit'])) {
        $id = $_POST['id'];
        $text = mysqli_real_escape_string($connect, $_POST['culturetext']);
        $image = $_FILES['Image']['name'];
        $tmp_name = $_FILES['Image']['tmp_name'];
        $folder = "image/";
        $oldImage = $_POST['old_image']; 
        if (!empty($image)) {
            $target = $folder . basename($image);
            move_uploaded_file($tmp_name, $target);
            $query = "UPDATE `diverseculture` SET `Image`='$target', `culturetext`='$text' WHERE id='$id';";
        } else {
            $query = "UPDATE `diverseculture` SET `culturetext`='$text', `Image`='$oldImage' WHERE id='$id';"; 
        }

        $execute = mysqli_query($connect, $query);

        if ($execute) {
            header('location:diversecultures.php');
            exit;
        } else {
            echo "Update failed!";
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
    <?php require('components/sidebar.php'); ?>
    <!--  Sidebar End -->
    <!--  Main wrapper -->
    <div class="body-wrapper">
      <!--  Header Start -->
      <?php require('components/navbar.php'); ?>
      <!--  Header End -->
      <div class="container-fluid">
        <div class="row">
          <form action="update8.php" method="post" enctype="multipart/form-data">
            <?php
            $query = "SELECT `Id`, `culturetext`, `Image` FROM `diverseculture` WHERE Id='$id';";
            $execute = mysqli_query($connect, $query);
            $fetch = mysqli_fetch_assoc($execute);
            ?>

            <div class="mb-3">
                <input type="hidden" class="form-control" name="id" value="<?php echo $fetch['Id']; ?>" />
                <input type="hidden" name="old_image" value="<?php echo $fetch['Image']; ?>" /> 
            </div>
            <div class="mb-3">
            <label for="" class="form-label">Text</label>
            <input
    type="text"
    class="form-control mb-3"
    name="culturetext"
    value="<?php echo isset($fetch['culturetext']) ? htmlspecialchars($fetch['culturetext']) : ''; ?>"
/>

          
  </div>
            <div class="mb-3">
                <label for="" class="form-label"><img src="<?php echo $fetch['Image']; ?>" alt="Current Image" style="height:100px"></label>
                <input type="file" class="form-control" name="Image" />
            </div>

            <button type="submit" class="btn btn-primary buttons" name="edit">Submit</button>
          </form>
        </div>
      </div>
      
      <!-- footer start -->
      <?php require('components/footer.php'); ?>
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
}
?>
