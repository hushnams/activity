 
<?php include('partials/menu.php');?>

<div class="main-content">  
    <div class="wrapper">
        <h1>Update Category</h1>

        <br><br>

        <?php
            //Check if the id set or not
            if(isset($_GET['id']))
            {
                //Get the ID and all other details
                //echo "Getting the Data";
                $id=$_GET['id'];
                //Create SQL Query to get all details
                $sql="SELECT * FROM tbl_category WHERE id=$id";

                //Execute the Query
                $res = mysqli_query($conn, $sql);

                //Count the rows to check whether the id is valid or not
                $count=mysqli_num_rows($res);

                if($count==1)
                {
                    //Get all the data
                    $row = mysqli_fetch_assoc($res);
                    $title = $row['title'];
                    $current_image = $row['image_name'];
                    $featured = $row['featured'];
                    $active = $row['active'];                }
                else
                {
                    //Redirect to manage the category with session messeage
                    $_SESSION['no-category-found']="<div class='error'>Category not Found.</div>";
                    header('location:'.SITEURL.'admin/manage-category.php');
                }

            }
            else
            {
                //Redirect to Manage Category
                header('location:'.SITEURL.'admin/manage-category.php');
            }


        ?>

        <form action="" method="POST" enctype="multipart/form-data">
            <table>
                <tr>
                    <td>Title: </td>
                    <td>
                        <input type="text" name="title" value="<?php echo $title; ?>">
                    </td>
                </tr>

                <tr>
                    <td>Current Image: </td>
                    <td>
                        <?php
                            if($current_image != "")
                            {
                                //Display the Image    
                                ?>
                                    <img src = "<?php echo SITEURL; ?>images/category/<?php echo $current_image;?>" width="150px">
                                <?php

                            }
                            else
                            {
                                //Display the Message
                                echo "<div class='error'>Image not Added</div>";
                            }
                        ?>
                    </td>
                </tr>

                <tr>
                    <td>New Image: </td>
                    <td>
                        <input type = "file" name="image">
                    </td>
                </tr>

                <tr>
                    <td>Feature: </td>
                    <td>
                        <input <?php if($featured=="Yes"){echo "Checked";}?> type = "radio" name="featured" value="Yes"> Yes
                        <input <?php if($featured=="No"){echo "Checked";}?> type = "radio" name="featured" value="No">  No
                    </td>
                </tr>

                <tr>
                    <td>Active: </td>
                    <td>
                        <input <?php if($active=="Yes"){echo "Checked";}?> type = "radio" name="active" value="Yes"> Yes
                        <input <?php if($active=="No"){echo "Checked";}?> type = "radio" name="active" value="No">  No
                    </td>
                </tr>

                <tr> 
                    <td>
                        <input type = "hidden" name = "current_image" value="<?php echo $current_image; ?>">
                        <input type = "hidden" name = "id" value="<?php echo $id; ?>">
                        <input type = "submit" name="submit" value="Update Category" class="btn-secondary">
                    </td>
                </tr>

            </table>
        </form>
        
        <?php

            if(isset($_POST['submit']))
            {
                //echo "clicked"
                //1. Get all the values form our form

                $id = $_POST['id'];
                $title = $_POST['title'];
                $current_image = $_POST['current_image'];
                $featured = $_POST['featured'];
                $active = $_POST['active'];

                //2. updating new image if selected
                if(isset($_FILES['image']['name']))
                {
                    //Get the image Details
                    $image_name = $_FILES['image']['name'];

                    //Check whether the image is available or not
                    if($image_name != "")
                    {
                        //Image Available
                        //Upload the new image

                            //Auto Rename our image
                            //Get the Extension of our image (jpg., png, gif, etc) e.g. "specialfood1.jpg"
                            $ext=end(explode('.',$image_name));

                            //Rename the image
                            $image_name = "Food_Category_".rand(000,999).'.'.$ext; //e.g Food_Category_834.jpg
                            
                            $source_path = $_FILES['image']['tmp_name'];

                            $destination_path = "../images/category/".$image_name;

                            //Finally upload the image
                            $upload = move_uploaded_file($source_path, $destination_path);

                            // Check whether the image is uploaded or not
                            // if the image is not uploaded then we will stop the process and redirect with error message

                            if($upload==false)
                            {
                                //Set message
                                $_SESSION['upload']="<div class = 'error'>Failed to Upload image.</div>";
                                //Redirect to Add Category
                                header('location:'.SITEURL.'admin/manage-category.php');
                                //Stop the Process
                                die();
                            }

                        //8. Remove the Current image
                        
                        if($current_image != "")
                        {
                            $remove_path = "../images/category/".$current_image;
                            $remove = unlink($remove_path);

                            //Check whether the image is removed or not
                            //if failed to removed then display a message and stop the process
                            if($remove==false)
                            {
                                //failed to remove image
                                $_SESSION['failed-remove']="<div class='error'>Failed to remove current Image.</div>";
                                header('location:'.SITEURL.'admin/manage-category.php');
                                die(); //stop the process
                            }
                        }
                        
                    }
                    else
                    {
                        $image_name = $current_image;
                    }
                }
                else
                {
                    $image_name = $current_image;
                }


                $sql2 = "UPDATE tbl_category SET 
                     title='$title',
                     image_name = '$image_name',
                     featured='$featured',
                     active='$active'
                     WHERE id=$id";

                //3. Update the Database

                $res2 = mysqli_query($conn, $sql2);

                //4. Redirect to Manage Category with message
                //Check whether executed or not

                if($res2==true)
                {
                    //Category Updated
                    $_SESSION['update']="<div class='success'>Category Updated Successfully.</div>";
                    header('location:'.SITEURL.'admin/manage-category.php');
                }
                else
                {
                    //Failed to Update the Category
                    $_SESSION['update']="<div class='error'>Failed to Updated.</div>";
                    header('location:'.SITEURL.'admin/manage-category.php');
                }
            }


        ?>

    </div>
</div>


<?php include('partials/footer.php');?>
 