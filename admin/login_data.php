<?php
session_start();
require('../connections.php');
if($_SERVER["REQUEST_METHOD"]=="POST"){
    $email=$_POST['email'];
    $password=$_POST['password'];
}
$query ="SELECT * FROM admin WHERE Email='$email' AND Password ='$password';";
$run = mysqli_query($connect,$query);
$data = mysqli_fetch_assoc($run);
if($run){
    $_SESSION['admin'] = $data['Name'];
    $_SESSION['id'] = $data['id'];
    header('location:index.php');
}
?>