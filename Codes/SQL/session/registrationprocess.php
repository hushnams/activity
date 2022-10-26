<?php

session_start();

    $conn = mysqli_connect("localhost", "root", "", "tb_user");

    $firstName = $_REQUEST["firstName"];
    $lastName = $_REQUEST["lastName"];
    $username = $_REQUEST["username"];
    $address = $_REQUEST["address"];
    $contactNum = $_REQUEST["contactNum"];
    $password = $_REQUEST["password"];
    $confirmpassword = $_REQUEST["confirmpassword"];
    
    $duplicate = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");

    if(mysqli_num_rows($duplicate) > 0){

        echo "<script> alert('Username Has Already Taken'); </script>";
        echo "<script> location.replace('registration.php'); </script>";

    }else{
        
        if($password == $confirmpassword){
            $query = "INSERT INTO user VALUES('','$firstName', '$lastName' , '$address', '$contactNum', '$username', '$password')";

            mysqli_query($conn, $query);
            
            echo "<script> alert('Registration Successful'); </script>";
            echo "<script> location.replace('login.php'); </script>";


        }else{
            echo "<script> alert('Password Does Not Match'); </script>";
            echo "<script> location.replace('registration.php'); </script>";
 
        }
    }





?>