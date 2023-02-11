<?php include('partials-front/header.php'); ?>

<!-- fOOD sEARCH Section Starts Here -->
<section class="food-search text-center">
        <div class="container">
            
            <form action="<?php echo SITEURL."food-search.php"?>" method="POST">
                <input type="search" name="search" placeholder="Search for Food.." required>
                <input type="submit" name="submit" value="Search" class="btn btn-primary">
            </form>

        </div>
</section>
<!-- fOOD sEARCH Section Ends Here -->



<!-- fOOD MEnu Section Starts Here -->
<section class="food-menu">
    <div class="container">
        <h2 class="text-center">Food Menu</h2>
        <?php
        $sql2 = "SELECT * from tbl_food where active='yes' ";
        $res2 = mysqli_query($conn, $sql2);
        if ($res2 == true) {
            $count = mysqli_num_rows($res2);
            if ($count > 0) {
                while ($rows = mysqli_fetch_assoc($res2)) {
        ?>
                    <div class="food-menu-box">
                        <div class="food-menu-img">
                        <?php
                                    if($rows['image_name']!=""){
                                        ?>
                                        <img src="<?php echo SITEURL."/images/food/".$rows['image_name'];?>" alt="Chicke Hawain Pizza" class="img-responsive img-curve">
                                        <?php
                                        
                                    }else{
                                        echo "<h4 style='color:red; margin-top:50%; transform: translatey(-50%); text-align: center;'>Image not avaible</h4>";
                                    }
                                ?>
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

        <div class="clearfix"></div>



    </div>

</section>
<!-- fOOD Menu Section Ends Here -->

<?php include('partials-front/footer.php'); ?>