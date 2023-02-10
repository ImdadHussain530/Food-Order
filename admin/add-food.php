<?php include('partials/header.php'); ?>

<div class="container">
    <div class="row mt-5">
        <div class="col-6">
            <h1 class="">Add Food</h1>
            <div>
                <?php
                if (isset($_SESSION['msg'])) {
                    echo $_SESSION['msg'];
                    unset($_SESSION['msg']);
                }

                $sql = "SELECT * from tbl_category";
                $res = mysqli_query($conn, $sql);
                
                ?>
            </div>
        </div>
        <br>
        <br>
        <br>
        <br>
    </div>
    <div class="row">

        <form method="post" enctype="multipart/form-data" class="col-6">
            <div class="form-group row">
                <label  class="col-sm-2 col-form-label">Title</label>
                <div class="col-sm-10">
                    <input type="text" name="title" class="form-control" id="title">
                </div>
            </div>
            <div class="form-group row">
                <label  class="col-sm-2 col-form-label">Description</label>
                <div class="col-sm-10">
                    <textarea type="text" name="description" class="form-control" id="description"></textarea>
                </div>
            </div>
            <div class="form-group row">
                <label  class="col-sm-2 col-form-label">Price</label>
                <div class="col-sm-10">
                    <input type="number" name="price" class="form-control" id="price">
                </div>
            </div>
            <div class="form-group row">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Image</span>
                    </div>
                    <div class="custom-file">
                        <input id='file-upload' type="file" class="custom-file-input" id="image" name="image">
                        <label id='uploadfile' class="custom-file-label" for="image">
                            Choose file
                        </label>
                        <script>
                            document.querySelector("#file-upload").onchange = function() {
                                document.querySelector("#uploadfile").textContent = this.files[0].name;
                            }
                        </script>
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label for="inputPassword" class="col-sm-2 col-form-label">Category</label>
                <div class="col-sm-10">
                <select class="custom-select" name="category_id" id="category_id">
                <option selected>Choose...</option>
                    <?php
                        if ($res == true) {
                            //datafound success
                        
                        $count = mysqli_num_rows($res);   
                        if($count>0){
                            while($row = mysqli_fetch_assoc($res)){
                                ?>
                                <option value="<?php echo $row['id'];?>"><?php echo $row['title'];?></option>
                                <?php
                            }
                        }
                        }else{
                            //data not found
                        }
                    
                    ?>
                </select>
                    
                </div>
            </div>
            <div class="form-group row">
                <label for="inputPassword" class="col-sm-2 col-form-label">Featured</label>
                <div class="col-sm-10">
                    <input type="radio" name="featured" class="form-control-radio mr-1" id="Featured" value="yes">Yes</input>
                    <input type="radio" name="featured" class="form-control-radio mr-1" id="Featured" value="no">No</input>
                </div>
            </div>
            <div class="form-group row">
                <label for="inputPassword" class="col-sm-2 col-form-label">Active</label>
                <div class="col-sm-10">
                    <input type="radio" name="active" class="form-control-radio mr-1" id="active" value="yes" checked>Yes</input>
                    <input type="radio" name="active" class="form-control-radio mr-1" id="active" value="no">No</input>
                </div>
            </div>
            <div class="form-group row">
                <button class="btn btn-primary btn-lg m-1" name="submit" id="submit" type="submit">Submit</button>
            </div>
        </form>
    </div>



</div>

<?php
include('partials/footer.php');




// print_r($_FILES['image']); to see the detail in the array

if (isset($_POST['submit'])) {

    $title = ucfirst($_POST['title']);
    $description = $_POST['description'];
    $category_id=$_POST['category_id'];

    if (isset($_FILES['image'])) {
        
        if($_FILES['image']['name']!=""){
            $currentimg_name = $_FILES['image']['name'];
            $temp_address = $_FILES['image']['tmp_name'];
            $wheretoStoreDir="../images/food/";

            //uploadImg fn made by us which return false or image_name
            $uploadRes=uploadImg($currentimg_name, $temp_address, $wheretoStoreDir);
            
            if($uploadRes==false){
                $_SESSION['msg'] = "<div class='alert alert-danger'>Image not Uploded.</div>";
                header('location:' . SITEURL . 'admin/add-food.php');
                die();
            }
            $image_name=$uploadRes;
        }else{
            $image_name = "";
        }

        
    } else {
        $image_name = "";
    }

    if (isset($_POST['price'])) {
        $price = $_POST['price'];
    } else {
        $price =0;
    }

    if (isset($_POST['featured'])) {
        $featured = $_POST['featured'];
    } else {
        $featured = 'no';
    }

    if (isset($_POST['active'])) {
        $active = $_POST['active'];
    } else {
        $active = 'yes';
    }
    $sql = "INSERT INTO tbl_food SET
        title='$title',
        description='$description',
        price='$price',
        category_id='$category_id',
        image_name='$image_name',
        featured='$featured',
        active='$active'
    ";

    $res = mysqli_query($conn, $sql);

    if ($res == true) {
        $_SESSION['msg'] = "<div class='alert alert-success'>Category Upload successfully</div>";
        header('location:' . SITEURL . 'admin/manage-food.php');
    } else {
        $_SESSION['msg'] = "<div class='alert alert-danger'>Category Not Upload</div>";
        header('location:' . SITEURL . 'admin/add-food.php');
    }
}
?>