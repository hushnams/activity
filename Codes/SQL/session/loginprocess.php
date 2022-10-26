<?php

require "config.php";

$username = $_POST['username'];
$password = $_POST['password'];

$sql = "SELECT * FROM user WHERE username = '$username' AND password = '$password'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);

if($row['username'] == $username && $row['password'] == $password){
    echo "<script>alert('Login Succesful')</script>";
    echo "<script>location.replace('home.php')</script>";

    session_start();
    $_SESSION['username'] = $username;
    
}else{

    echo "<script>alert('Please Enter Valid Username and Password')</script>";
    echo "<script>location.replace('login.php')</script>";
}


?>
