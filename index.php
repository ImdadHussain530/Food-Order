<?php include('partials-front/header.php');?>

    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search text-center">
        <div class="container">
            
            <form action="food-search.html" method="POST">
                <input type="search" name="search" placeholder="Search for Food.." required>
                <input type="submit" name="submit" value="Search" class="btn btn-primary">
            </form>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->

    <!-- CAtegories Section Starts Here -->
    <section class="categories">
        <div class="container">
            <h2 class="text-center">Explore Foods</h2>
            <?php
                $sql = "SELECT * from tbl_category where featured='yes' and active='yes' limit 3 ";
                $res = mysqli_query($conn, $sql);
            if ($res == true) {
                $count = mysqli_num_rows($res);
                if ($count > 0) {
                    while($rows = mysqli_fetch_assoc($res)){
                        ?>
                        <a href="category-foods.html">
                        <div class="box-3 float-container">
                            <img src="images\category\<?php echo $rows['image_name']?>" alt="Pizza" class="img-responsive img-curve">

                            <h3 class="float-text text-white"><?php echo $rows['title'];?></h3>
                        </div>
                        </a>
                        <?php
                    }
                }else{
                    echo 'Category not added';
                }
            }
            ?>

            

            <div class="clearfix"></div>
        </div>
    </section>
    <!-- Categories Section Ends Here -->

    <!-- fOOD MEnu Section Starts Here -->
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Food Menu</h2>
            <?php
                $sql2 = "SELECT * from tbl_food where featured='yes' and active='yes' ";
                $res2 = mysqli_query($conn, $sql2);
            if ($res2 == true) {
                $count = mysqli_num_rows($res2);
                if ($count > 0) {
                    while ($rows = mysqli_fetch_assoc($res2)) {
                        ?>
                        <div class="food-menu-box">
                            <div class="food-menu-img">
                                <img src="<?php echo SITEURL."/images/food/".$rows['image_name'];?>" alt="Chicke Hawain Pizza" class="img-responsive img-curve">
                            </div>

                            <div class="food-menu-desc">
                                <h4><?php echo $rows['title']?></h4>
                                <p class="food-price"><?php echo $rows['price']?></p>
                                <p class="food-detail">
                                <?php echo $rows['description']?>
                                </p>
                                <br>

                                <a href="<?php echo SITEURL.'order.php';?>" class="btn btn-primary">Order Now</a>
                            </div>
                        </div>
                        
                        <?php

                    }
                }
            }     
            ?>

            <div class="clearfix">yes</div>

            

        </div>

        <p class="text-center">
            <a href="<?php echo SITEURL.'foods.php';?>">See All Foods</a>
        </p>
    </section>
    <!-- fOOD Menu Section Ends Here -->

<?php include('partials-front/footer.php');?>
   