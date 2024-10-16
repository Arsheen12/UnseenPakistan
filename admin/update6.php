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
    $Description = mysqli_real_escape_string($connect, $_POST['description']);
    $fact = mysqli_real_escape_string($connect, $_POST['fact']);
    $Capital = mysqli_real_escape_string($connect, $_POST['capital']);
    $Landmark = mysqli_real_escape_string($connect, $_POST['landmark']);
    $dress = mysqli_real_escape_string($connect, $_POST['dress']);
    $festival = mysqli_real_escape_string($connect, $_POST['festival']);
    $Name = mysqli_real_escape_string($connect, $_POST['name']);

    $image = $_FILES['image']['name'];
    $tmp_name = $_FILES['image']['tmp_name'];
    $folder = "image/";
    $target = $folder.basename($image);
    move_uploaded_file($tmp_name,$target);
    $query = "UPDATE `regions` SET `name`='$Name',`description`='$Description',`capital`='$Capital',`landmark`='$Landmark',`dress`='$dress',`festival`='$festival',`fact`='$fact',`image`='$target' WHERE id='$id'";
    $execute = mysqli_query($connect,$query);
    if($execute){
        header('location:regionalculture.php');
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
       <form action="update6.php" method="post">
        <?php
            $query="SELECT `id`, `name`, `description`, `capital`, `landmark`, `dress`, `festival`, `fact`, `image` FROM `regions` WHERE  id='$id';";
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
                <label for="" class="form-label"> Name</label>
                <input
                    type="text"
                    class="form-control"
                    name="name"
                    id="" value="<?php echo $fetch['name'];?>"
                />
                </div> 
                <div class="mb-3">
                <label for="" class="form-label"> Description</label>
                <input
                    type="text"
                    class="form-control"
                    name="description"
                    id=""  value="<?php echo isset($fetch['description']) ? htmlspecialchars($fetch['description']) : ''; ?>""
                />
                </div> 
           
               
            <div class="mb-3">
                <label for="" class="form-label">Dress</label>
                <input
                    type="text"
                    class="form-control"
                    name="dress"
                    id="" value="<?php echo $fetch['dress'];?>"
                />
                </div>
                
            <div class="mb-3">
                <label for="" class="form-label">Landmark</label>
                <input
                    type="text"
                    class="form-control"
                    name="landmark"
                    id="" value="<?php echo $fetch['landmark'];?>"
                />
                </div>
                
            <div class="mb-3">
                <label for="" class="form-label">Festival</label>
                <input
                    type="text"
                    class="form-control"
                    name="festival"
                    id="" value="<?php echo $fetch['festival'];?>"
                />
                </div>
               
                <div class="mb-3">
                <label for="" class="form-label">Fact</label>
                <input
                    type="text"
                    class="form-control"
                    name="fact"
                    id="" value="<?php echo $fetch['fact'];?>"
                />
              

        <div class="mb-3">
            <label for="" class="form-label"><img src="../<?php echo $fetch['image']; ?>" alt="Updated Image" style="height: 100px;">


            </label>
            <input
                type="file"
                class="form-control"
                name="image"
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