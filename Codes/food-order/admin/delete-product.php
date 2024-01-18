<?php
    //Include Constants Page
    include('../config/constants.php');


    if(isset($_GET['id']) AND isset($_GET['image_name']))  //Either use '&&' or 'AND'
    {
        //Process to Delete
        //1. Get ID and Image Name
        $id=$_GET['id'];
        $image_name=$_GET['image_name'];

        //2. Remove the Image if Available
        //Check whether the image is available or not delete on if available

        if($image_name != "")
        {
            // It has image and need to remove from folder 
            // Get the Image Path
            $path = "../images/product/".$image_name;

            //Remove image file from folder
            $remove = unlink($path);

            //Check whether the image is  remove or not
            if($remove==false)
            {
                //Failed to remove image

                $_SESSION['upload'] = "<div class='error'>Failed to Remove Image File.</div>";
                
                //Redirect to Manage product
                header('location:'.SITEURL.'admin/manage-product.php');
                
                //Stop the process of Deleting product
                die();
            }

        }

        //3. Delete product from Database

        $sql = "DELETE FROM tbl_product WHERE id=$id";

        // Execute the query
        $res = mysqli_query($conn, $sql);

        //Check whether the query executed or not and set the session message respectively
        //4. Redirect to Manage product with Session Message

        if($res==true)
        {
            //product Delete
            $_SESSION['delete'] = "<div class='success'>Product Deleted Sucessfully.</div>";
            header('location:'.SITEURL.'admin/manage-product.php');
        }
        else
        {
            //Failed to Delete
            $_SESSION['delete'] = "<div class='error'>Failed to Deleted Product.</div>";
            header('location:'.SITEURL.'admin/manage-product.php');
        }


    }
    else
    {
        //Redirect to Manage product Page
        $_SESSION['unauthorize']="<div class = 'error'>Unauthorized Access.</div>";
        header('Location:'.SITEURL.'admin/manage-product.php');

    }

?>
