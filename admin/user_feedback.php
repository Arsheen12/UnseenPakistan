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
    $query="DELETE FROM user_feedback where Id='$id'";
    $run = mysqli_query($connect,$query);
    if($run){
        header('location:user_feedback.php');
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
                <th scope="col">Id</th>
                <th scope="col">User Name</th>
                <th scope="col">Contact Number</th>
                <th scope="col">Email</th>
                <th scope="col">Feedback</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
            <?php
        require('../connections.php');
          $query = "SELECT * FROM user_feedback;";
          $execute = mysqli_query($connect,$query);
          while($fetch = mysqli_fetch_assoc($execute)){
          ?>
              <tr class="">
                <td scope="row"><?php echo $fetch['Id']?></td>
                <td scope="row"><?php echo $fetch['Name']?></td>
                <td scope="row"><?php echo $fetch['Contact_Number']?></td>
                <td scope="row"><?php echo $fetch['Email']?></td>
                <td scope="row"><?php echo $fetch['Feedback']?></td>
                <td scope="row"><a href="userfeedback_reply.php?reply=<?php echo $fetch['Id'];?>" class="btn btn-success">Reply</a> <a href="user_feedback.php?delete=<?php echo $fetch['Id'];?>" class="btn btn-danger">Delete</a></td>
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