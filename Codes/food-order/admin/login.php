<?php 
    include('../config/constants.php');
?>


<html>
    <body>
        <title>Vape Ordering System</title>
        <link rel="stylesheet" href="../css/admin.css">
    </body>

    <div class="login">
        <h1 class="text-center">Login</h1><br><br>
        <?php

            if(isset($_SESSION['login']))
            {
                echo $_SESSION['login'];
                unset($_SESSION['login']);
            }

            if(isset($_SESSION['no-login-message']))

            {
                echo $_SESSION['no-login-message'];
                unset($_SESSION['no-login-message']);
            }





        
        ?>
        <br><br>
        <!-- Login Form Starts Here -->

        <form action="" method="POST" class="text-center">
            Username: <br>
            <input type="text" name="username" id="" placeholder="Enter Username"><br><br>
            

            Password: <br>
            <input type="password" name="password" placeholder="Enter Password"><br><br>

            <input type="submit" name="submit" value="Login" class="btn-primary"><br><br>

        </form>


        <!-- Login Form Ends Here -->
        <p class="text-center" >Created By - <a href="www.vinzentcostelo.com">Costelo</a></p>
    </div>
</html>

<?php

    if(isset($_POST['submit']))
    {
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $raw_password =  md5($_POST['password']);
        $password = mysqli_real_escape_string($conn, $raw_password);

        $sql = "SELECT * FROM tbl_admin WHERE username = '$username' AND password = '$password'";
        $res = mysqli_query($conn, $sql);

        $count = mysqli_num_rows($res);

        if($count==1)
        {
            $_SESSION['login'] = "<div class = 'success text-center'>Login Successful</div>";
            $_SESSION['user'] = $username; //TO CHECK USER IS LOGIN OR NOT, LOGOUT WILL UNSET IT
            header('location:'.SITEURL.'admin/');

        }

        else
        {
            $_SESSION['login'] = "<div class = 'error text-center'>Username or Password Did Not Match</div>";
            header('location:'.SITEURL.'admin/login.php');


        }


    }



?>