<!DOCTYPE html>
<html>
    <head>
        <title>Registration</title>
    </head>
    <body>
    <button class= "home-button"
        onclick="location.href= 'welcome.php'"
        >
        Home
        </button>
    
    <center><h2>Registration</h2></center>
        <center><form method="post" action="registrationprocess.php" autocomplete="off">
            
            <label for="firstName">First Name: </label>
            <input type="text" name="firstName" id="firstName" placeholder="Enter First Name" requried autofocus><br><br>

            <label for="lastName">Last Name: </label>
            <input type="text" name="lastName" id="lastName" placeholder="Enter First Name" requried autofocus><br><br>

            <label for="address">Address: </label>
            <input type="text" name="address" id="address" placeholder="Enter Address" requred value=""><br><br>

            <label for="contactNum">Contact: </label>
            <input type="text" name="contactNum" id="contactNum" maxlength= "11" placeholder="Enter Contact No." requred value=""><br><br>

            <label for="username">Username: </label>
            <input type="text" name="username" id="username" placeholder="Enter Username" requred value=""><br><br>

            <label for="password">Password: </label>
            <input type="password" name="password" id="password" placeholder="Enter Password" requred value=""><br><br>

            <label for="confrimpassword">Confirm Password: </label>
            <input type="password" name="confirmpassword" id="confirmpassword" placeholder="Confirm Password" requred value=""><br><br>
            
            <button type="submit" name="submit">Register</button>
            
        </form></center>
        <br>
        <button class= "login-button"
        onclick="location.href= 'login.php'"
        >
        Login
        </button>
    </body>
</html>