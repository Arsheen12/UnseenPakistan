<?php
session_start();
require('../connections.php');
if(isset($_SESSION['admin'])){
  if(isset($_GET['logout'])){
    session_destroy();
    header('location:login_data.php');
  }
  if(isset($_POST['btn'])){
    $heading = mysqli_real_escape_string($connect, $_POST['Heading']);
    $text = mysqli_real_escape_string($connect, $_POST['Text']);
    $b_text = mysqli_real_escape_string($connect, $_POST['Btn_text']);
    $icon = mysqli_real_escape_string($connect, $_POST['icon']);

    $image = $_FILES['Image']['name'];
    $tmp_name = $_FILES['Image']['tmp_name'];
    $folder = "image/";
    $target = $folder.basename($image);
    move_uploaded_file($tmp_name,$target);
    $query = "INSERT INTO architecture_section(Heading,Text,Btn_text,Image,icon)VALUES('$heading','$text','$b_text','$target','$icon');";
    $execute = mysqli_query($connect,$query);
    if($execute){
        header('location:architecture.php');
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
              <div class="row mt-3">
            
                <form action="architecture_data.php" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="" class="form-label" style="margin-top: 30px;">Heading</label>
                <input
                    type="text"
                    class="form-control"
                    name="Heading"
                    id=""
                />
                </div>
                <div class="mb-3">
                <label for="" class="form-label">Text</label>
                <input
                    type="text"
                    class="form-control"
                    name="Text"
                    id=""
                />
                </div>
                <div class="mb-3">
                <label for="" class="form-label">Icon</label>
                <input
                    type="text"
                    class="form-control"
                    name="icon"
                    id=""
                />
                </div>
                <div class="mb-3">
                <label for="" class="form-label">Button text</label>
                <input
                    type="text"
                    class="form-control"
                    name="Btn_text"
                    id=""
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
            </div>
    </div>
     <!-- footer start -->
     <?php
        require('components/footer.php');
        ?>
        <!-- footer end -->

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
}
else{
  header('location:authentication-login.php');
}
?>