<?php
session_start();
require('../connections.php');
if(isset($_SESSION['user'])){
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
  <title>Unseen Pakistsan</title>
  <link rel="icon" href="../image/icon.png">
  <link rel="stylesheet" href="assets/css/style1.css"/>
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
      <div class="container-fluid ">
        <!--  Row 1 -->
        <div class="container wrap px-4">
        <div class="cards">
          <h4>Welcome.</h4>
          <h3 class="main-texts"><?php echo $_SESSION['user'];?></h3>
          <p>Thanks for joinnig with us. We are always trying to get you a complete service.
          You can add posts and view your posts at home!</p>
          <a href="post_data.php" class="btn btn-primary">Add Posts</a>
        </div>
        </div>
        <div class="container px-1">
        <div class="post mt-5">
          <div class="post1">
            <?php
           $user_id = $_SESSION['id'];
            $query1 = "SELECT COUNT(*) AS total_count FROM user_posts WHERE User_Id='$user_id';";
            $query2 = "SELECT COUNT(*) AS approved_count FROM user_posts WHERE Post_Status = 'Approved' AND User_Id='$user_id'";
            $query3 = "SELECT COUNT(*) AS pending_count FROM user_posts WHERE Post_Status = 'Pending' AND User_Id='$user_id'";
            $run1 = mysqli_query($connect,$query1);
            $run2 = mysqli_query($connect,$query2);
            $run3 = mysqli_query($connect,$query3);
            $fetch1 = mysqli_fetch_assoc($run1);
            $fetch2 = mysqli_fetch_assoc($run2);
            $fetch3 = mysqli_fetch_assoc($run3);
            ?>
          <h3 class="main-texts">Your Posts:</h3>
          <h5>Total Posts: <?php echo implode($fetch1);?></h5>
          <h5>Approved Posts: <?php echo implode($fetch2);?></h5>
          <h5>Pending Posts: <?php echo implode($fetch3);?></h5>
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