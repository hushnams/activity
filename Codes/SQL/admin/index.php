<!DOCTYPE html>
<html lang="en">
   <head>
      <title>GFG- Store Data</title>
   </head>
   <body>
   <style> 
    
    body {
  background-image: url('heart.jpg');
}
        h1{
            color: white;
            font-size: 50px;
        }
        p{
            font-size: 30px;
            color: white;
        
}
</style>
      <center>
         <h1>Storing Form data in Database</h1>
         <form action="insert.php" method="post">
             
<p>
               <label for="firstName">First Name:</label>
               <input type="text" name="first_name" id="firstName">
            </p>
 
             
<p>
               <label for="lastName">Last Name:</label>
               <input type="text" name="last_name" id="lastName">
            </p>
 
             
<p>
               <label for="Gender">Gender:</label>
               <input type="radio" name="gender" id="Gender" <?php
               if (isset($gender) && $gender=="female")echo "checked";?> 
               value = "Female">Female

               <input type="radio" name="gender" id="Gender" <?php
               if (isset($gender) && $gender=="male")echo "checked";?> 
               value = "Male">Male

               <input type="radio" name="gender" id="Gender" <?php
               if (isset($gender) && $gender=="others")echo "checked";?> 
               value = "Others">Others
            </p>
 
             
<p>
               <label for="Address">Address:</label>
               <input type="text" name="address" id="Address">
            </p>
 
             
<p>
               <label for="emailAddress">Email Address:</label>
               <input type="email" name="email" id="emailAddress">
            </p>
 
            <input type="submit" value="Submit">
         </form>
      </center>
   </body>
</html>