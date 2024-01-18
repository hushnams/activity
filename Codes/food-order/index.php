<?php include('partials-front/menu.php');?>

    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search text-center">
        <div class="container">
            <form action="<?php echo SITEURL; ?>product-search.php" method="POST">
                <input type="search" name="search" placeholder="Search for Products.." required>
                <input type="submit" name="submit" value="Search" class="btn btn-primary">
            </form>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->

    <?php
        if(isset($_SESSION['order']))
        {
            echo $_SESSION['order'];
            unset($_SESSION['order']);
        }
    ?>

    <!-- CAtegories Section Starts Here -->
    <section class="categories">
        <div class="container text-center">
            <h2 class="text-center">Welcome To Our Website</h2>

            <?php
                $sql = "SELECT * FROM tbl_category WHERE active = 'YES' AND featured = 'YES' LIMIT 3";

                $res = mysqli_query($conn, $sql);

                $count = mysqli_num_rows($res);

                if($count > 0 )
                {
                    while($row = mysqli_fetch_assoc($res))
                    {
                        $id = $row['id'];
                        $title = $row['title'];
                        $image_name = $row['image_name'];

                        ?>
                        <a href="<?php echo SITEURL; ?>category-product.php?category_id=<?php echo $id; ?>">
                            <div class="box-3 float-container">
                                <?php 
                                    if($image_name == "")
                                    {
                                        echo "<div class = 'error'>Image Not Available.</div>";

                                    }

                                    else
                                    {
                                        ?>
                                        <img src="<?php echo SITEURL; ?>images/category/<?php echo $image_name; ?>" alt="Pizza" class="img-responsive img-curve">
                                        <?php
                                    }
                                
                                ?>
                                


                                <h3 class="float-text text-white"><?php echo $title;?></h3>
                            </div>
                         </a>
                        <?php
                    }
                }

                else
                {
                    echo "<div class = 'error'>Category Not Added.</div>";
                    
                }
            
            
            
            ?>



            <div class="clearfix"></div>
        </div>
    </section>
    <!-- Categories Section Ends Here -->



    <!-- fOOD MEnu Section Starts Here -->
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Products<h2>

            <?php 
                $sql2 = "SELECT * FROM tbl_product WHERE active = 'Yes' AND featured = 'Yes' LIMIT 6";

                $res2 = mysqli_query($conn, $sql2);

                $count = mysqli_num_rows($res2);

                if($count > 0 )
                {
                    while($row = mysqli_fetch_assoc($res2))
                    {
                        $id = $row['id'];
                        $title = $row['title'];
                        $price = $row['price'];
                        $description = $row['description'];
                        $image_name = $row['image_name'];     
                        
                        ?>  
                        <div class="food-menu-box">
                            <div class="food-menu-img">
                                <?php
                                    if($image_name == "")
                                    {
                                        echo "<div class='error text-center'>Image not found.</div>";
                                    }
                                    else
                                    {
                                        ?>
                                        <img src="<?php echo SITEURL; ?>images/product/<?php echo $image_name; ?>" alt="Chicke Hawain Pizza" class="img-responsive img-curve">
                                        <?php
                                    }
                                ?>

                            </div>

                            <div class="food-menu-desc">
                                <h4><?php echo $title; ?></h4>
                                <p class="food-price">&#x20B1;<?php echo $price; ?></p>
                                 <p class="food-detail">
                                    <?php echo $description; ?>
                                </p>
                                <br>

                                <a href="<?php echo SITEURL; ?>order.php?product_id=<?php echo $id; ?>" class="btn btn-primary">Order Now</a>
                            </div>
                        </div>
                        <?php
                    }
                }

                else
                {
                    echo "<div class = 'error'>Food Not Available.</div>";
                }

                
            
            
            
            ?>

            

            <div class="clearfix"></div>

            

        </div>

        <p class="text-center">
            <form action="<?php echo SITEURL; ?>product.php" method="GET" style="text-align: center;">
                <button type="submit" class="btn btn-primary">See All Foods</button>
            </form>
        </p>
    </section>
    <!-- fOOD Menu Section Ends Here -->

<?php include('partials-front/footer.php');?>