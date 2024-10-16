<?php
session_start();
require('../connections.php');
if(isset($_SESSION['user'])){
  if(isset($_GET['logout'])){
    session_destroy();
    header('location:login_data.php');
  }
  if(isset($_GET['update'])){
    $id = $_GET['update'];
  }
  if(isset($_POST['btn'])){
    $p_id = $_POST['id'];
    $title = $_POST['title'];
    $desc = $_POST['desc'];
    $image = $_FILES['image']['name'];
    $tmp_name = $_FILES['image']['tmp_name'];
    $folder = "../image/";
    $target = $folder.basename($image);
    move_uploaded_file($tmp_name,$target);
    $province = $_POST['province'];
    $query="UPDATE user_posts SET Title='$title',Description='$desc',Image='$target',Province_Id='$province', Post_Status='Pending' WHERE Post_Id='$p_id';";
    $execute = mysqli_query($connect,$query);
    if($execute){
        header('location:post_display.php');
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
        <?php
        $query="SELECT user_posts.Post_Id,user_posts.Title,user_posts.Description,user_posts.Image,user_posts.Province_Id FROM user_posts where Post_Id='$id';";
        $execute=mysqli_query($connect,$query);
        $fetch = mysqli_fetch_assoc($execute);
        
        ?>
      <div class="container mt-5">
        <h3>Update Your Posts:</h3>
        <form action="post_data.php" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label class="visually-hidden" for="inputName"
                    >Id</label
                >
                <input
                    type="hidden"
                    class="form-control"
                    name="id"
                    id="inputName" value="<?php echo $fetch['Post_Id'];?>"
                    placeholder=""
                />
            </div>
            
<div class="mb-3">
    <label for="" class="form-label">Title</label>
    <input
        type="text"
        class="form-control"
        name="title" value="<?php echo $fetch['Title'];?>"
        id=""
    />
</div>
<div class="mb-3">
    <label for="" class="form-label">Description</label>
    <input
        type="text"
        class="form-control"
        name="desc" value="<?php echo $fetch['Description'];?>"
        id=""
    />
</div>
<div class="mb-3">
                <label for="" class="form-label">
                    <img src="<?php echo $fetch['Image']; ?>" alt="Updated Image" height="100px" width="150px"/>
                </label>
                <input type="file" class="form-control" name="Image" id="" />
            </div>
<div class="mb-3">
    <label for="" class="form-label">Province</label>
    <select
        class="form-select form-select-lg"
        name="province"
        id=""
    >
        <option selected>Select one</option>
        <?php
        $query="SELECT *FROM provinces;";
        $execute = mysqli_query($connect,$query);
        while($fetch = mysqli_fetch_assoc($execute)){
        ?>
        <option value="<?php echo $fetch['Id'];?>"><?php echo $fetch['Province'];?></option>
        <?php } ?>
    </select>
</div>

<button
    type="submit"
    class="btn btn-primary" name="btn"
>
    Submit
</button>

        </form>
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