<?php
session_start();
require('../connections.php');
if(isset($_SESSION['id'])){
 $id=$_SESSION['id'];
}
if(isset($_POST['fbtn'])){
    $password = md5($_POST['password']);
    $cpassword = md5($_POST['cpassword']);
    if($password === $cpassword){
        $query = "UPDATE admin SET Password = '$password' where Id='$id';";
        $run = mysqli_query($connect,$query);
        header('location:authentication-login.php');
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
    <div
      class="position-relative overflow-hidden radial-gradient min-vh-100 d-flex align-items-center justify-content-center">
      <div class="d-flex align-items-center justify-content-center w-100">
        <div class="row justify-content-center w-100">
          <div class="col-md-8 col-lg-6 col-xxl-3">
            <div class="card mb-0">
              <div class="card-body">
                <a href="../index.php" class="text-nowrap logo-img text-center d-block py-3 w-100">
                <h2 class="text-primary main-texts">Unseen Pakistan</h2>
                </a>
                <p class="text-center"><b>Your Social Campaigns</b></p>
                <form action="changepass.php" method="post">
                  <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                  </div>
                  <div class="mb-4">
                    <label for="exampleInputPassword1" class="form-label">Confirm Password</label>
                    <input type="password" name="cpassword"class="form-control" id="exampleInputPassword1">
                  </div>
                  <input type="submit" name="fbtn"class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2" value="Set Password">
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