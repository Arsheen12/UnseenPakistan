<?php
session_start();
require('../connections.php');
if(isset($_SESSION['admin'])){
  if(isset($_GET['logout'])){
    session_destroy();
    header('location:login_data.php');
  }
if(isset($_GET['Id'])){
    $id = $_GET['Id'];
}
if(isset($_POST['edit'])){
    $id = $_POST['id'];
    $image = $_FILES['Image']['name'];
    $tmp_name = $_FILES['Image']['tmp_name'];
    $folder = "image/";
    $target = $folder.basename($image);
    move_uploaded_file($tmp_name,$target);
    $query = "UPDATE gallery_section SET Image='$target' WHERE Id='$id';";
    $execute = mysqli_query($connect,$query);
    if (move_uploaded_file($tmp_name, $target)) {
      echo "File uploaded successfully!";
  } else {
      echo "Failed to upload file!";
  }
  
    if($execute){
        header('location:gallery.php');
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
       <form action="update5.php" method="post" enctype="multipart/form-data">
        <?php
            $query="SELECT gallery_section.Id,gallery_section.Image FROM gallery_section where Id='$id';";
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
                id="inputName" value="<?php echo $fetch['Id'];?>"
                placeholder=""
            />
        </div>
        <?php
        $imagePath = '';

if (isset($target)) {
    $imagePath = $target;
} else {
    $imagePath = $fetch['Image'];
}
?>

        <div class="mb-3">
            <label for="" class="form-label"><img src="<?php echo $imagePath; ?>" alt="Updated Image" style="height:150px">


            </label>
            <input
                type="file"
                class="form-control"
                name="Image"
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














