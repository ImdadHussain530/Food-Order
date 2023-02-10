<?php include('partials-front/header.php'); ?>



<!-- CAtegories Section Starts Here -->
<section class="categories">
    <div class="container">
        <h2 class="text-center">Explore Foods</h2>
        <?php
        $sql = "SELECT * from tbl_category where active='yes'  ";
        $res = mysqli_query($conn, $sql);
        if ($res == true) {
            $count = mysqli_num_rows($res);
            if ($count > 0) {
                while ($rows = mysqli_fetch_assoc($res)) {
        ?>
                    <a href="category-foods.html">
                        <div class="box-3 float-container">
                            <img src="images\category\<?php echo $rows['image_name']?>" alt="Pizza" class="img-responsive img-curve">

                            <h3 class="float-text text-white"><?php echo $rows['title'];?></h3>
                        </div>
                    </a>
        <?php
                }
            }
        }
        ?>

        <div class="clearfix"></div>
    </div>
</section>
<!-- Categories Section Ends Here -->


<?php include('partials-front/footer.php'); ?>