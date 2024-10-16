<?php

session_start();
require('../connections.php');
if(isset($_SESSION['admin'])){
  if(isset($_GET['logout'])){
    session_destroy();
    header('location:login_data.php');
  }
 
if(isset($_POST['btn'])){
    $heading = $_POST['Heading'];
    $number = $_POST['Number'];
    $query = "INSERT INTO `heritage_section`( `Heading`, `Number`) VALUES ('$heading','$number');";
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
      <div class="row">
                <form action="heritage_data.php" method="post">
            <div class="mb-3" >
                <label for="" class="form-label" style="margin-top:70px">Heading</label>
                <input
                    type="text"
                    class="form-control"
                    name="Heading"
                    id=""
                />
                </div>
                <div class="mb-3">
                <label for="" class="form-label">Number</label>
                <input
                    type="number"
                    class="form-control"
                    name="Number"
                    id=""
                />
                </div> 
                <button
                    type="submit"
                    class="btn btn-primary buttons" name="btn"
                >
                    Submit
                </button>
                </form>
                </div>
            </div>
            <!-- footer start -->
            <?php require('components/footer.php'); ?>
            <!-- footer end -->
        </div>
    </div>
        <!-- Bootstrap JavaScript Libraries -->
        <script
            src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
            integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
            crossorigin="anonymous"
        ></script>

        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
            integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
            crossorigin="anonymous"
        ></script>
    </body>
</html>
<?php 
}
else{
  header('location:authentication-login.php');
}
?>