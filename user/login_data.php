<?php
session_start();
require('../connections.php');
if($_SERVER["REQUEST_METHOD"]=="POST"){
    $email=$_POST['email'];
    $password=md5($_POST['password']);
}
$query ="SELECT * FROM user_reg WHERE Email='$email' AND Password ='$password';";
$run = mysqli_query($connect,$query);
$data = mysqli_fetch_assoc($run);
if($run){
    $_SESSION['id'] = $data['Id'];
    $_SESSION['user'] = $data['Name'];
    header('location:index.php');
}
?>