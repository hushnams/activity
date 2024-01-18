<?php include('partials/menu.php');?>

        <!-- Main Content Section Starts -->
        <div class="main-content">

            <div class = "wrapper">
                <h1>Manage Product</h1>

                <br><br>
                
                <?php

                    if(isset($_SESSION['add']))
                    {
                        echo $_SESSION['add'];
                        unset($_SESSION['add']);
                    }

                    if(isset($_SESSION['delete']))
                    {
                        echo $_SESSION['delete'];    
                        unset($_SESSION['delete']);               
                    }

                    if(isset($_SESSION['upload']))
                    {
                        echo $_SESSION['upload'];
                        unset($_SESSION['upload']);
                    }

                    if(isset($_SESSION['unathorized']))
                    {
                        echo $_SESSION['unathorized'];
                        unset($_SESSION['unathorized']);
                    }

                    if(isset($_SESSION['update']))
                    {
                        echo $_SESSION['update'];
                        unset($_SESSION['update']);
                    }



 
                ?>

                <br><br>

                <!-- Button to Add Admin -->
                <a href="<?php echo SITEURL;?>admin/add-product.php" class="btn-primary">Add Product</a>

                <br><br><br>

                <table class="tbl-full">
                    <tr>
                        <th>S.N</th>
                        <th>Title</th>
                        <th>Price</th>
                        <th>Image</th>
                        <th>Featured</th>
                        <th>Active</th>
                        <th>Actions</th>
                    </tr>
                    <?php

                        $sql = "SELECT * FROM  tbl_product";

                        $res = mysqli_query($conn, $sql);
                        
                        $sn = 1;

                        $count = mysqli_num_rows($res);

                        if($count > 0 )
                        {
                            while($row=mysqli_fetch_assoc($res))
                            {
                                $id = $row['id'];
                                $title = $row['title'];
                                $price = $row['price'];
                                $image_name = $row['image_name'];
                                $featured = $row['featured'];
                                $active = $row['active'];

                                ?>
                                    <tr>
                                        <td><?php echo $sn++?></td>
                                        <td><?php echo $title; ?></td>
                                        <td>&#x20B1;<?php echo $price; ?></td>
                                        <td>

                                            <?php 
                                                if($image_name == "")
                                                {
                                                    echo "<div class = 'error'>Image Not Added</div>";
                                                }

                                                else
                                                {
                                                    ?>

                                                    <img src="<?php echo SITEURL; ?>images/product/<?php echo $image_name; ?>" width="100px" >

                                                    <?php
                                                }
                                            ?>

                                        </td>
                                        <td><?php echo $featured; ?></td>
                                        <td><?php echo $active; ?></td>
                                        <td>
                                            <a href="<?php echo SITEURL; ?>admin/update-product.php?id=<?php echo $id;?>" class = "btn-secondary">Update Product</a>
                                            <a href="<?php echo SITEURL; ?>admin/delete-product.php?id=<?php echo $id; ?>&image_name=<?php echo $image_name; ?>" class = "btn-danger">Delete Product</a>
                                        </td>
                                    </tr>
                                <?php

                            }
                        }

                        else
                        {
                            echo "<tr><td colspan = '7' class = 'error'> Food Not Added Yet. </td></tr>";
                        }
                    ?>


                </table>

            </div>
        </div>
        <!-- Main Content Section Ends -->
       
<?php include('partials/footer.php')?>