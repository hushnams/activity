<!DOCTYPE html>
<html>
    <head>
        <title>Login</title>

        <style>

            .home-button{
                background-color: white;
                color: black;
                border: none;
                height: 36px;
                width: 105px;
                border-radius: 5px;
                margin-right: 10px;
                margin-top: 10px;
                padding: 8px 8px;   



            }

            .login-button{

                float: center;
                background: rgb(128, 126, 126);
                padding: 8px 8px;
                color: white;
                border-radius: 5px;
                margin-right: 10px;
                margin-top: 10px;
                border: none;
                height: 36px;
                width: 105px;

            }


        </style>

        <body>

        <button class= "home-button"
        onclick="location.href= 'welcome.php'"
        >
        Home
        </button>

        <link rel="stylesheet" type="text/css" href="stayl.css">
        
        <div class="twoContainer">
        <img src="gs.jpg">
            <center><form action="loginprocess.php" method="post">
                            <b>LOGIN</b><br>
                            <p style="color:white">pogi ko haha</style><br>

            <input type="text" name="username" id="username" placeholder="Enter Username" requred value=""><br><br>
           
           <input type="password" name="password" id="password" placeholder="Enter Password" requred value=""><br><br>

           <style>

            .login-button{
                font-style: Tahoma;
            }

        
           </style>

           
           <button type="submit" name="login-button" class="login-button" >

            Sign In

           </button>

                <br>

                <p style="color:black">Not Registered? <a href="registration.php">Create an Account</a></p>


            </form></center>
           
           
            
        </body>
    </head>
</html>