<?php
session_start();
require('../connections.php');
if(isset($_SESSION['admin'])){
  if(isset($_GET['logout'])){
    session_destroy();
    header('location:login_data.php');
  }
  if(isset($_GET['delete'])){
    $id = $_GET['delete'];
    $query="DELETE FROM user_posts where Post_Id='$id'";
    $run = mysqli_query($connect,$query);
    if($run){
        header('location:user_posts.php');
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
        <!--  Row 1 -->
        <div
          class="table-responsive-lg"
        >
          <table
            class="table table-light"
          >
            <thead>
              <tr>
                <th scope="col">Post Id</th>
                <th scope="col">User Name</th>
                <th scope="col">Title</th>
                <th scope="col">Description</th>
                <th scope="col">Image</th>
                <th scope="col">Province</th>
                <th scope="col">Post Status</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
            <?php
          require('../connections.php');
          $query = "SELECT user_posts.Post_Id,user_reg.Name,user_posts.Title,user_posts.Description,user_posts.Image,provinces.Province ,user_posts.Post_Status FROM user_posts INNER JOIN provinces ON user_posts.Province_Id=provinces.Id INNER JOIN user_reg ON user_posts.User_Id=user_reg.Id where user_posts.Post_Status='Pending';";
          $execute = mysqli_query($connect,$query);
          while($fetch = mysqli_fetch_assoc($execute)){
          ?>
              <tr class="">
                <td scope="row"><?php echo $fetch['Post_Id']?></td>
                <td scope="row"><?php echo $fetch['Name']?></td>
                <td scope="row"><img src="<?php echo $fetch['Image']?>" width="200px" height="200px"/></td>
                <td scope="row"><?php echo $fetch['Title']?></td>
                <td scope="row"><?php echo $fetch['Description']?></td>
                <td scope="row"><?php echo $fetch['Province']?></td>
                <td scope="row"><?php echo $fetch['Post_Status']?></td>
                <td scope="row"><a href="userpost_approve.php?approve=<?php echo $fetch['Post_Id'];?>" class="btn btn-success">Approve</a> <a href="user_posts.php?delete=<?php echo $fetch['Post_Id'];?>" class="btn btn-danger">Delete</a></td>
                </tr>
              <?php } ?>
            </tbody>
          </table>
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