<?php
session_start();
require('../connections.php');
if(isset($_SESSION['admin'])){
  if(isset($_GET['logout'])){
    session_destroy();
    header('location:login_data.php');
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
  <link rel="stylesheet" href="assets/css/index1.css" />
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
        <!--  Row 1 -->
        <div class="container wrap">
                  <div class="box1">
            <div class="box">
              <a href="header_data.php"><h4>Header Data</h4></a>
            </div>
            <div class="box">
            <a href="architecture_data.php"><h4>Architecture Data</h4></a>
            </div>
            <div class="box">
            <a href="heritage_data.php"><h4>Architectural Heritage Data</h4></a>
            </div>
             </div>
       <div class="box2">
            <div class="box">
            <a href="gallery_data.php"><h4>Gallery Data</h4></a>
            </div>
            <div class="box">
            <a href="culture_data.php"><h4>Culture Data</h4></a>
            </div>
            <div class="box">
            <a href="regionalculture_data.php"><h4>Regional Culture Data</h4></a>
            </div>
      </div>
           <div class="box3">
            <div class="box">
            <a href="diversecultures_data.php"><h4>Diverse Culture Data</h4></a>
            </div>
            <div class="box">
            <a href="admin_posts_data.php"><h4>Admin Data</h4></a>
            </div>
            <div class="box">
            <a href="user_posts.php"><h4>Pended User Posts</h4></a>
            </div>
                </div>
        </div>
        
        <!-- footer start -->
        <?php
        require('components/footer.php');
        ?>
        <!-- footer end -->
      </div>
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
}
else{
  header('location:authentication-login.php');
}
?>