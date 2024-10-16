<?php
session_start();
require('../connections.php');

if (isset($_SESSION['admin'])) {
    if (isset($_GET['logout'])) {
        session_destroy();
        header('location:login_data.php');
    }

    if (isset($_GET['Id'])) {
        $Id = $_GET['Id'];
    }

    if (isset($_POST['edit'])) {
        $Id = $_POST['Id'];
        $Heading = mysqli_real_escape_string($connect, $_POST['Heading']);
        $Description = mysqli_real_escape_string($connect, $_POST['Description']);
        $b_text = mysqli_real_escape_string($connect, $_POST['Btn_Text']);
        $province_id = mysqli_real_escape_string($connect, $_POST['province_id']);
        $Icon = $_POST['Icon'];


        $image = $_FILES['Image']['name'];
        $tmp_name = $_FILES['Image']['tmp_name'];
        $folder = "image/";
        $oldImage = $_POST['old_image']; 

        if (!empty($image)) {
            $target = $folder . basename($image);
            move_uploaded_file($tmp_name, $target);
        } else {
            $target = $oldImage; 
        }

        $query = "UPDATE `admin_posts` SET `Heading`='$Heading', `Description`='$Description',`Icon`='$Icon', `Btn_Text`='$b_text', `Image`='$target', `province_id`='$province_id' WHERE Id='$Id'";
        $execute = mysqli_query($connect, $query);

        if ($execute) {
            header('location:admin_posts.php');
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
        <div class="row mt-2">
              <form action="update9.php" method="post" enctype="multipart/form-data">
                  <?php
                  $query = "SELECT `Id`, `Heading`, `Description`, `Icon`, `Btn_Text`, `Image`, `province_id` FROM `admin_posts` WHERE Id='$Id'";
                  $execute = mysqli_query($connect, $query);
                  $fetch = mysqli_fetch_assoc($execute);
                  ?>

                  <input type="hidden" name="Id" value="<?php echo $fetch['Id']; ?>" />
                  <input type="hidden" name="old_image" value="<?php echo $fetch['Image']; ?>" /> 

                  <div class="mb-3 ">
                      <label for="" class="form-label" style="margin-top: 30px;">Heading</label>
                      <input type="text" class="form-control" name="Heading" value="<?php echo $fetch['Heading']; ?>" />
                  </div>

                  <div class="mb-3">
                      <label for="" class="form-label">Description</label>
                      <input type="text" class="form-control" name="Description" value="<?php echo $fetch['Description']; ?>" />
                  </div>
                  <div class="mb-3">
                      <label for="" class="form-label">Icon</label>
                      <input type="text" class="form-control" name="Icon" value="<?php echo $fetch['Icon']; ?>" />
                  </div>

                  <div class="mb-3">
                      <label for="" class="form-label">Province</label>
                      <select class="form-control" name="province_id">
                          <?php
                          $query = "SELECT * FROM provinces";
                          $result = mysqli_query($connect, $query);
                          while ($data = mysqli_fetch_assoc($result)) {
                              $selected = ($data['Id'] == $fetch['province_id']) ? "selected" : "";
                              echo "<option value='" . $data['Id'] . "' $selected>" . $data['Province'] . "</option>";
                          }
                          ?>
                      </select>
                  </div>

                  <div class="mb-3">
                      <label for="" class="form-label">Button Text</label>
                      <input type="text" class="form-control" name="Btn_Text" value="<?php echo $fetch['Btn_Text']; ?>" />
                  </div>

                  <div class="mb-3">
                      <label for="" class="form-label">
                          <img src="<?php echo $fetch['Image']; ?>" alt="Current Image" style="height:150px;" />
                      </label>
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
