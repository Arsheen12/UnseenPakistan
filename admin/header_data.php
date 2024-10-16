<?php
session_start();
require('../connections.php');

if (isset($_SESSION['admin'])) {
    if (isset($_GET['logout'])) {
        session_destroy();
        header('location:login_data.php');
        exit; 
    }

    if (isset($_POST['btn'])) {
        $heading = mysqli_real_escape_string($connect, $_POST['heading']);
        $text = mysqli_real_escape_string($connect, $_POST['texts']);
        $b_text = mysqli_real_escape_string($connect, $_POST['btext']);

        $query = "INSERT INTO header_section (Heading, Texts, Btn_text) VALUES ('$heading', '$text', '$b_text')";
        $execute = mysqli_query($connect, $query);

        if ($execute) {
            header('location:header.php');
            exit; 
        } else {
            echo "Error: " . mysqli_error($connect);
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
        <?php require('components/sidebar.php'); ?>
        <!--  Sidebar End -->
        <!--  Main wrapper -->
        <div class="body-wrapper">
            <!--  Header Start -->
            <?php require('components/navbar.php'); ?>
            <!--  Header End -->
            <div class="container-fluid">
                <div class="row mt-5">
                    <form action="header_data.php" method="post">
                        <div class="mb-3">
                            <label for="" class="form-label">Heading</label>
                            <input type="text" class="form-control" name="heading" id="" />
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Text</label>
                            <input type="text" class="form-control" name="texts" id="" />
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Button text</label>
                            <input type="text" class="form-control" name="btext" id="" />
                        </div>
                        <button type="submit" class="btn btn-primary buttons" name="btn">Submit</button>
                    </form>
                </div>
            </div>
            <!-- footer start -->
            <?php require('components/footer.php'); ?>
            <!-- footer end -->
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
else {
    header('location:authentication-login.php');
    exit;
}
?>