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
<!DOCTYPE html>
<html></html>
<head>
    <title>Home-Page</title>
   
    </head>
    <body>
    <link rel="stylesheet" type="text/css" href="stayl.css">





        <div id="body1">
           <div class="welcome"><h1 class="mainhead"> Welcome , <ins><?php echo $row['username']; ?></h1></ins></div>
             </div>


    <h2> 



        <?php 
            echo "Name: ". $row['firstName']. " ".$row['lastName']. "<br><br>";
            echo "Address: ". $row['address']. "<br><br>";
            echo "Contact No.: ". $row['contactNum']. "<br><br>";

        ?>
    </h2>

   <div class="footer">
   <p class="footer-text-left">

   <div class="logout-button"><a href="logout.php"><img src="aaa.png"></a></div>


</div>
    </body>

</html>