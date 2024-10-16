<?php
session_start();
require('../connections.php');
if(isset($_SESSION['admin'])){
  if(isset($_GET['logout'])){
    session_destroy();
    header('location:login_data.php');
  }
  if(isset($_GET['id'])){
    $id = $_GET['id'];
}
if(isset($_POST['edit'])){
    $id = $_POST['id'];
    $Description = mysqli_real_escape_string($connect, $_POST['Description']);
    $Heading = mysqli_real_escape_string($connect, $_POST['Heading']);
    $icon = mysqli_real_escape_string($connect, $_POST['Icon']);
    $query = "UPDATE `culture` SET `Icon`='$icon',`Description`='$Description',`Heading`='$Heading' WHERE id='$id';";
    $execute = mysqli_query($connect,$query);
    if($execute){
        header('location:culture.php');
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
        
      <div class="row">
       <form action="update7.php" method="post">
        <?php
            $query="SELECT `id`, `Icon`, `Description`, `Heading` FROM `culture` where id='$id';";
            $execute = mysqli_query($connect,$query);
            $fetch = mysqli_fetch_assoc($execute);
        ?>
        <div class="mb-3">
            <label class="visually-hidden" for="inputName"
                >Id</label
            >
            <input
                type="hidden"
                class="form-control"
                name="id"
                id="inputName" value="<?php echo $fetch['id'];?>"
                placeholder=""
            />
        </div>
        <div class="mb-3">
                <label for="" class="form-label">Heading</label>
                <input
                    type="text"
                    class="form-control"
                    name="Heading"
                    id="" value="<?php echo $fetch['Heading'];?>"
                />
                </div> 
        
            <div class="mb-3">
                <label for="" class="form-label">Description</label>
                <input
                    type="text"
                    class="form-control"
                    name="Description"
                    id="" value="<?php echo $fetch['Description'];?>"
                />
                </div>
                
        <div class="mb-3">
            <label for="" class="form-label">
            Icon
            </label>
            <input
                type="text"
                class="form-control"
                name="Icon" value="<?php echo $fetch['Icon'];?>"
                id="" 
            />
        </div>
                <button
                    type="submit"
                    class="btn btn-primary buttons" name="edit"
                >
                    Submit
                </button>
                
        </form>
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