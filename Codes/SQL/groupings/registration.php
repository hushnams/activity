<!DOCTYPE html>
<html>
    <head>
        <title>Registration</title>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>

    <style>

        .register-button{
            float: center;
            background: rgb(128, 126, 126);
            padding: 8px 8px;
            color: black;
            border-radius: 5px;
            margin-right: 10px;
            margin-top: 10px;
            border: none;
            height: 36px;
            width: 105px;

        }


    </style>
      
    <div class="twoContainer">
    <img src="gs.jpg">
    <div class="form">
        <form method="post" action="registrationprocess.php" autocomplete="off">
                <b>REGISTRATION</b>
            <input type="text" name="firstName" id="firstName" placeholder="Enter First Name" requried autofocus><br>
            
            <input type="text" name="lastName" id="lastName" placeholder="Enter Last Name" requried autofocus><br>
            
            <input type="text" name="address" id="address" placeholder="Enter Address" requred value=""><br>
           
            <input type="text" name="contactNum" id="contactNum" placeholder="Enter Contact No." requred value=""><br>
           
            <input type="text" name="username" id="username" placeholder="Enter Username" requred value=""><br>
           
            <input type="password" name="password" id="password" placeholder="Enter Password" requred value=""><br>

            <input type="password" name="confirmpassword" id="confirmpassword" placeholder="Confirm Password" requred value=""><br><br>

            <button type="submit" name="submit" class="register-button">Register</button><br><br>
            
            <p>Already have an account? <a href="login.php">Sign In</a></p>


        
        </form> </h3> </div>

        <style>
            .home-button{
                background-color: white ;
            }   
        </style>

        <button class= "home-button"
        onclick="location.href= 'welcome.php'"
        >
        Home
        </button>
        
    </body>
</html>