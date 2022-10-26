<?php

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$db = "newlogin";

$conn = new mysqli($dbhost, $dbuser, $dbpass, $db);

$username = $_POST['username'];
$password = $_POST['upass'];

$sql = "SELECT * FROM user WHERE username = '$username' AND upass = '$password'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);

if($row['username'] == $username && $row['upass'] == $password){
    echo "Welcome ".$username. " you are successfully logged in !!";
    header("location:index.php");

    session_start();
    $_SESSION['username'] = $username;
}else {
    echo "<script>alert('Check your Credentials')</script>";
    echo "<script>location.replace('login.php')</script>";
}

?>

<a href="index.php"><h2><font color>Go to main page</font></h2></a>