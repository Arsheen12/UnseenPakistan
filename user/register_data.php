<?php
require('../connections.php');
if(isset($_POST['btn'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $query = "INSERT INTO user_reg(Name,Email,Password)values('$name','$email','$password');";
    $execute = mysqli_query($connect,$query);
    if($execute){
        header('location:index.php');
    }
}



?>