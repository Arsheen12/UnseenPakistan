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
    $heading = $_POST['heading'];
    $number = $_POST['number'];
    move_uploaded_file($tmp_name,$target);
    $query = "UPDATE heritage_section SET Heading='$heading',Number='$number' WHERE Id='$id';";
    $execute = mysqli_query($connect,$query);
    if($execute){
        header('location:heritage.php');
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
       <form action="update4.php" method="post">
        <?php
            $query="SELECT heritage_section.Id,heritage_section.Heading,heritage_section.Number FROM heritage_section where Id='$id';";
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
        
            <div class="mb-3">
                <label for="" class="form-label">Heading</label>
                <input
                    type="text"
                    class="form-control"
                    name="heading"
                    id="" value="<?php echo $fetch['Heading'];?>"
                />
                </div>
                <div class="mb-3">
                <label for="" class="form-label">Number</label>
                <input
                    type="number"
                    class="form-control"
                    name="number"
                    id="" value="<?php echo $fetch['Number'];?>"
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