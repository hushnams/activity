<?php include('partials/menu.php');?>



<div class= "main-content" >
    <div class= "wrapper" >
        <h1>Add Admin</h1>
        <br><br>

        <?php 
            if(isset($_SESSION['add']))
            {
                echo $_SESSION['add']; //DISPLAYING SESSION MESSAGE
                unset($_SESSION['add']); //REMOVING SESSION MESSAGE
            }
                
        ?>

        <form action="" method="POST">
            <table class="tbl-30">
                <tr>
                    <td>Full Name: </td>
                    <td>
                        <input type="text" name="full_name" placeholder="Enter Your Name">
                    </td>
                </tr>

                <tr>
                    <td>Username: </td>
                    <td>
                        <input type="text" name="username" placeholder="Enter Username">
                    
                    </td>
                </tr>


                <tr>
                    <td>Password: </td>
                    <td>
                        <input type="password" name="password" placeholder="Enter Password">
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add Admin" class="btn-secondary">
                    </td>

                </tr>
            </table>
        </form>

    </div>
</div>









<?php include('partials/footer.php');?>


<?php 
    //Process the value from FORM and SAVE it in Database
    //Check whether the submit button is clicked or not

    if(isset($_POST['submit']))
    {
        //echo "Button Clicked";

        $full_name = $_POST['full_name'];
        $username = $_POST['username'];
        $password = md5($_POST['password']); //Password Encryption
        
        //SQL Query to SAVE the data into database
        
        $sql = "INSERT INTO tbl_admin SET 
            full_name = '$full_name',
            username = '$username',
            password = '$password'
                
        ";
        
        //Execute Query and Save Data in Database
        $conn = mysqli_connect('localhost', 'root','') or die(mysqli_error());
        $db_select = mysqli_select_db($conn, 'food-order') or die(mysqli_error());
        
        $res = mysqli_query($conn, $sql) or die(mysqli_error());

        if($res == TRUE)
        {
            //echo "Data Inserted";
            $_SESSION['add'] = "Admin Added Succesfully";
            header("location:".SITEURL.'admin/manage-admin.php');
        }
    
        else
        {
            //echo "Failed to Insert Data";
            $_SESSION['add'] = "Failed to Add Admin";
            header("location:".SITEURL.'admin/add-admin.php');

            
        }

    }








?>