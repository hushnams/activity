<?php
session_start();
$username = $_SESSION['username'];

if(!isset($_SESSION["login"])){

}else{
    header("location: login.php");
}

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$db = "tb_user";

$conn = new mysqli($dbhost, $dbuser, $dbpass, $db);
$sql = "SELECT * FROM user WHERE username = '$username'";

$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);

?>

<head>
    <title>Home-Page</title>
    <center><h1>Welcome , <ins><?php echo $row['username']; ?></ins></h1></center>
    <h2> 
        <?php 
            echo "Name: ". $row['firstName']. " ".$row['lastName']. "<br><br>";
            echo "Address: ". $row['address']. "<br><br>";
            echo "Contact No.: ". $row['contactNum']. "<br><br>";

        ?>
    </h2>

    <a href="logout.php">Logout</a>
</head>