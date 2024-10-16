<?php
session_start();
require('../connections.php');

if (isset($_SESSION['admin'])) {
    if (isset($_GET['logout'])) {
        session_destroy();
        header('location:login_data.php');
    }

    if (isset($_POST['btn'])) {
        $Heading = mysqli_real_escape_string($connect, $_POST['Heading']);
        $Description = mysqli_real_escape_string($connect, $_POST['Description']);
        $b_text = mysqli_real_escape_string($connect, $_POST['Btn_Text']);
        $Icon =  $_POST['Icon'];

        $province_id = $_POST['province_id'];
        $image = $_FILES['Image']['name'];
        $tmp_name = $_FILES['Image']['tmp_name'];
        $folder = "image/";
        $target = $folder . basename($image);
       move_uploaded_file($tmp_name, $target);
            $query = "INSERT INTO `admin_posts`( `Heading`, `Description`,`Icon`, `Btn_Text`, `Image`, `province_id`) 
                      VALUES ('$Heading', '$Description','$Icon', '$b_text', '$target', '$province_id')";
            $execute = mysqli_query($connect, $query);
            if ($execute) {
                header('location:admin_posts.php');
            } else {
                "There is an error!";
            }
    }
?>

<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Unseen Pakistsan</title>

  <link rel="icon" href="../image/icon.png">
  <link rel="stylesheet" href="assets/css/styles.min.css" />
  <link rel="stylesheet" href="style1.css">
  <link rel="stylesheet" href="index.css">




  
</head>


<body>
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    <?php require('components/sidebar.php'); ?>
    <div class="body-wrapper">
      <?php require('components/navbar.php'); ?>
      <div class="container-fluid">
        <div class="row">
          <form action="admin_posts_data.php" method="post" enctype="multipart/form-data">
            <div class="mb-3 mt-3">
              <label for="heading" class="form-label" style="margin-top: 30px;">Heading</label>
              <input type="text" class="form-control" name="Heading" required />
            </div>
            <div class="mb-3">
              <label for="description" class="form-label">Description</label>
              <input type="text" class="form-control" name="Description" required />
            </div>
            <div class="mb-3">
              <label for="Icon" class="form-label">Icon</label>
              <input type="text" class="form-control" name="Icon" required />
            </div>
            <div class="mb-3">
              <label for="province" class="form-label">Province</label>
              <select name="province_id" class="form-control" required>
                <?php
                $query = "SELECT Id, province FROM provinces";
                $result = mysqli_query($connect, $query);

                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<option value='{$row['Id']}'>{$row['province']}</option>";
                }
                ?>
              </select>
            </div>
            <div class="mb-3">
              <label for="image" class="form-label">Choose Image</label>
              <input type="file" class="form-control" name="Image" accept="image/*">
            </div>
            <div class="mb-3">
              <label for="btn_text" class="form-label">Button Text</label>
              <input type="text" class="form-control" name="Btn_Text" required />
            </div>
            <button type="submit" class="btn btn-primary buttons" name="btn">Submit</button>
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
