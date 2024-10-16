<?php
session_start();
require('../connections.php');
if(isset($_SESSION['user'])){
  if(isset($_GET['logout'])){
    session_destroy();
    header('location:login_data.php');
  }
  $user_id = $_SESSION['id'];

  if(isset($_POST['btn'])){
    $title = $_POST['title'];
    $desc = mysqli_real_escape_string($connect, $_POST['desc']);
    if($_FILES["image"]["type"] == "image/png" || $_FILES["image"]["type"] == "image/jpg" || $_FILES["image"]["type"] == "image/jpeg" || $_FILES["image"]["type"] == "image/jfif"){
    $image = $_FILES['image']['name'];
    $tmp_name = $_FILES['image']['tmp_name'];
    $folder = "../image/";
    $target = $folder.basename($image);
    move_uploaded_file($tmp_name,$target);
    }else{
      header('location:post_data.php');
    }
    $province = $_POST['province'];
    $query="INSERT INTO user_posts(User_Id,Title,Description,Image,Province_Id) VALUES ('$user_id','$title', '$desc','$target','$province')";
    $execute = mysqli_query($connect,$query);
    if($execute){
      $_SESSION['message'] = "Your post has been entered successfully you will be able to view it after the admins approval.";
      $_SESSION['message_type'] = "success"; 
      } else{
        $_SESSION['message'] = "Error entering posts";
       $_SESSION['message_type'] = "danger"; 
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
  <link rel="stylesheet" href="assets/css/style1.css">
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
          
      
        
        <div class="container mt-3">
          <form  action="post_data.php" method="post" enctype="multipart/form-data">
          <?php if (isset($_SESSION['message'])): ?>
              <div class="alert alert-<?php echo htmlspecialchars($_SESSION['message_type']); ?> alert-dismissible fade show" role="alert">
                <?php echo htmlspecialchars($_SESSION['message']); ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
              <?php unset($_SESSION['message']); // Clear the message after displaying ?>
              <?php endif; ?>
          <h3 class="mb-3 "><strong>Add Your Posts:</strong></h3>
<div class="mb-3">
    <label for="" class="form-label">Title</label>
    <input
        type="text"
        class="form-control"
        name="title"
        id=""
    />
</div>
<div class="mb-3">
    <label for="" class="form-label">Description</label>
    <input
        type="text"
        class="form-control"
        name="desc"
        id=""
    />
</div>
<div class="mb-3">
    <label for="" class="form-label">Choose Image</label>
    <input
        type="file"
        class="form-control"
        name="image" accept="image/*"
        id=""
    />
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
        $query="SELECT * FROM provinces;";
        $execute = mysqli_query($connect,$query);
        while($fetch = mysqli_fetch_assoc($execute)){
        ?>
        <option value="<?php echo $fetch['Id'];?>"><?php echo $fetch['Province'];?></option>
        <?php } ?>
    </select>
</div>

<button
    type="submit"
    class="btn btn-primary buttons" name="btn"
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