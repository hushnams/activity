<!DOCTYPE html>
<html>
    <head>
        <style>
	
            body {
                background-color: #72aee6;
                display: flex;
                
                height: 100vh;
                flex-direction: column;
            
            }

            *{

                font-family: sans-serif;
                box-sizing: border-box;
            }

            .home-button{
                border: none;
                height: 36px;
                width: 105px;


            }

            .registration-button{
                border: none;
                height: 36px;
                width: 105px;

            }

            .login-button{

                border: none;
                height: 36px;
                width: 105px;

            }

            



        </style>
        <title>Login</title>
        <body>
        <button class= "home-button"
        onclick="location.href= 'welcome.php'"
        >
        Home
        </button>
           <center><h2>Login</h2></center>
            <center><form action="loginprocess.php" method="post">

                <label for="username">Username</label>
                <input type="text" name="username" id="username" required value=""><br><br>

                <label for="password">Password</label>
                <input type="password" name="password" id="password" required value=""><br><br>

                <button type="submit" name="submit" class="login-button">

                    Login
                
                </button>

            </form></center>

            <br>

            <center>Not Registered? <a href="registration.php">Create an Account</a></center>

        </body>
    </head>
</html>