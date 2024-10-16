<?php
session_start();
require('../connections.php');
if (isset($_SESSION['admin'])) {
    if (isset($_GET['logout'])) {
        session_destroy();
        header('location:login_data.php');
        exit; 
    }

if (isset($_POST['btn'])) {
    $text = mysqli_real_escape_string($connect, $_POST['culturetext']);
    $image = $_FILES['Image']['name'];
    $tmp_name = $_FILES['Image']['tmp_name'];
    $folder = "image/";
    $target = $folder.basename($image);
    move_uploaded_file($tmp_name,$target);
        $query = "INSERT INTO diverseculture (Image,Text) VALUES ('$target','$text')";
        $execute = mysqli_query($connect, $query);
        
        if ($execute) {
            header('Location: diversecultures.php');
        } else {
            echo "Sorry!";
        }
}
}
    else {
        header('location:authentication-login.php');
        exit;
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

       <form action="diversecultures_data.php" method="post" enctype="multipart/form-data">
        <div class="mb-3 mt-5">
            <label for="" class="form-label">Text</label>
            <input
                type="text"
                class="form-control"
                name="culturetext"
            />
           
        </div>
        
                <div class="mb-3">
                    <label for="" class="form-label">Choose Image</label>
                    <input
                        type="file"
                        class="form-control"
                        name="Image"
                        id="" accept="image/*"
                    />
                </div>
                
                <button
                    type="submit" 
                    class="btn btn-primary buttons" name="btn"
                >
                    Submit
                </button>
                
                </form>
                </div>
            </div>
            <!-- footer start -->
            <?php require('components/footer.php'); ?>
            <!-- footer end -->
        </div>
    </div>
        <!-- Bootstrap JavaScript Libraries -->
        <script
            src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
            integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
            crossorigin="anonymous"
        ></script>

        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
            integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
            crossorigin="anonymous"
        ></script>
    </body>
</html>
