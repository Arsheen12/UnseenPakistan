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
            <div
                class="table-responsive"
            >
                <table
                    class="table table-light"
                >
                    <thead>
                        <tr>
                            <th scope="col">Post Id</th>
                            <th scope="col">Image</th>
                            <th scope="col">Title</th>
                            <th scope="col">Description</th>
                            <th scope="col">Province</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $query ="SELECT user_posts.Post_Id,user_posts.Title,user_posts.Description,user_posts.Image,provinces.Province FROM user_posts INNER JOIN provinces ON user_posts.Province_Id=provinces.Id where Post_Status='Approved';";
                        $execute = mysqli_query($connect,$query);
                        while($fetch=mysqli_fetch_assoc($execute)){ 
                        ?>
                        <tr class="">
                            <td scope="row"><?php echo $fetch['Post_Id'];?></td>
                            <td scope="row"><img src="<?php echo $fetch['Image'];?>" width="200px" height="200px"/></td>
                            <td scope="row"><?php echo $fetch['Title'];?></td>
                            <td scope="row"><?php echo $fetch['Description'];?></td>
                            <td scope="row"><?php echo $fetch['Province'];?></td>
                            <td scope="row"><a href="approvedup_delete.php?Id=<?php echo $fetch['Post_Id'];?>" class="btn btn-danger">Delete</a></td>
                            
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