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
  <!--  Row 1 -->
  <div class="table-responsive">
    <table class="table table-light table-striped">
      <thead>
        <tr>
          <th scope="col" >Id</th>
          <th scope="col" >Province</th>
          <th scope="col" >Heading</th>
          <th scope="col" >Description</th>
          <th scope="col" >Button Text</th>
          <th scope="col" >Image</th>
          <th scope="col" >Icon</th>
          <th scope="col" >Action</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $query = "SELECT admin_posts.Id,admin_posts.Heading,admin_posts.Description,admin_posts.Btn_Text,admin_posts.Image,admin_posts.Icon, provinces.province AS Province_Name 
                  FROM admin_posts 
                  JOIN provinces ON admin_posts.province_id = provinces.id";
        $execute = mysqli_query($connect, $query);

        while ($fetch = mysqli_fetch_assoc($execute)) {
        ?>
        <tr>
          <td scope="row"><?php echo $fetch['Id']; ?></td>
          <td scope="row"><?php echo $fetch['Province_Name']; ?></td>
          <td scope="row"><?php echo $fetch['Heading']; ?></td>
          <td scope="row"><?php echo substr($fetch['Description'], 0, 100) . '...'; ?></td>
          <td scope="row"><?php echo substr($fetch['Btn_Text'], 0, 15) . '...'; ?></td>
          <td scope="row">
            <img src="<?php echo $fetch['Image']; ?>" width="100px" height="80px" alt="Post Image" />
          </td>
          <td scope="row"><?php echo $fetch['Icon']; ?></td>
          <td scope="row">
            <a href="update9.php?Id=<?php echo $fetch['Id']; ?>" class="btn btn-warning">Edit</a> 
            <a href="admin_posts_delete.php?Id=<?php echo $fetch['Id']; ?>" class="btn btn-danger">Delete</a>
          </td>
        </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>
</div>
<?php
require('components/footer.php')
;?>
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