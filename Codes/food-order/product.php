<?php include('partials-front/menu.php') ?>

    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search text-center">
        <div class="container">
            
            <form action="<?php echo SITEURL; ?>product-search.php" method="POST">
                <input type="search" name="search" placeholder="Search for Food.." required>
                <input type="submit" name="submit" value="Search" class="btn btn-primary">
            </form>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->



    <!-- fOOD MEnu Section Starts Here -->
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Products</h2>

            <?php

                $sql = "SELECT * FROM tbl_product WHERE active = 'Yes'";

                $res = mysqli_query($conn, $sql);

                $count = mysqli_num_rows($res);

                if($count > 0)
                {
                    while($row = mysqli_fetch_assoc($res))
                    {
                        $id = $row['id'];
                        $title = $row['title'];
                        $description = $row['description'];
                        $price = $row['price'];
                        $image_name = $row['image_name'];

                        ?>
                        <div class="food-menu-box">
                            <div class="food-menu-img">
                                <?php
                                    if($image_name == "")
                                    {
                                        echo "<div class='error text-center'>Image not Found.</div>";
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
                                    <?php echo $description;?>
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
                    echo "<div class='error text-center'>Product not Found.</div>";
                }
            
            ?>



  


            <div class="clearfix"></div>

            

        </div>

    </section>
    <!-- fOOD Menu Section Ends Here -->

<?php include('partials-front/footer.php') ?>