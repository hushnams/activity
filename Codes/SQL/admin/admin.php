<?php

$servername = "localost";
$username = "root";
$password = "";
$dbname = "staff";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn ->connect_error){
    die("Connection failed: ".$conn ->connect_error);
}

$sqlquery = "INSERT INTO college VALUES ('Jordan','Poole','Male','GSW','greenmydaddy@gmail.com')";

if($conn ->query($sql)=== TRUE){
    echo "record inserted successfully";
}else{
    echo "Error: " . $sql . "<br>". $conn ->error;
}

?>