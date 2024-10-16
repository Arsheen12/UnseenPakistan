<?php
session_start();
require('../connections.php');
if(isset($_POST['fbtn'])){
    $email = $_POST['email'];
   $query="SELECT user_reg.Id FROM user_reg WHERE Email='$email'";
    $run=mysqli_query($connect,$query);
    $fetch=mysqli_fetch_assoc($run);
    if($fetch){
    $_SESSION['id'] = $fetch['Id'];
    header('location:changepass.php');
    }
    else{
       header('location:forgotpass.php');
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
  <link rel="stylesheet" href="assets/css/style1.css">

</head>

<body>
  <!--  Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    <div
      class="position-relative overflow-hidden radial-gradient min-vh-100 d-flex align-items-center justify-content-center">
      <div class="d-flex align-items-center justify-content-center w-100">
        <div class="row justify-content-center w-100">
          <div class="col-md-8 col-lg-6 col-xxl-3">
            <div class="card mb-0">
              <div class="card-body">
                <a href="../index.php" class="text-nowrap logo-img text-center d-block py-3 w-100">
                   <h2 class="text-primary main-texts">
                    <b>Unseen Pakistan</b>
                   </h2>
                </a>
                <p class="text-center"><b>Your Social Campaigns</b></p>
                <form action="forgotpass.php" method="post">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                  </div>
                  <input type="submit" name="fbtn"class="btn buttons btn-primary w-100 py-8 fs-4 mb-4 rounded-2" value="Submit">
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="assets/libs/jquery/dist/jquery.min.js"></script>
  <script src="assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>