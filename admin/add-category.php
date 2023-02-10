<?php include('partials/header.php'); ?>

<div class="container">
    <div class="row mt-5">
        <div class="col-6">
            <h1 class="">Add Category</h1>
            <div>
                <?php
                if (isset($_SESSION['msg'])) {
                    echo $_SESSION['msg'];
                    unset($_SESSION['msg']);
                }
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
                <label for="staticEmail" class="col-sm-2 col-form-label">Title</label>
                <div class="col-sm-10">
                    <input type="text" name="title" class="form-control" id="title">
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
                <label for="inputPassword" class="col-sm-2 col-form-label">Featured</label>
                <div class="col-sm-10">
                    <input type="radio" name="featured" class="form-control-radio mr-1" id="Featured" value="yes">Yes</input>
                    <input type="radio" name="featured" class="form-control-radio mr-1" id="Featured" value="no">No</input>
                </div>
            </div>
            <div class="form-group row">
                <label for="inputPassword" class="col-sm-2 col-form-label">Active</label>
                <div class="col-sm-10">
                    <input type="radio" name="active" class="form-control-radio mr-1" id="active" value="yes" checked="checked">Yes</input>
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

    if (isset($_FILES['image'])) {
        
        if($_FILES['image']['name']!=""){
            $currentimg_name = $_FILES['image']['name'];
            $temp_address = $_FILES['image']['tmp_name'];
            $wheretoStoreDir="../images/category/";

            //uploadImg fn made by us which return false or image_name
            $uploadRes=uploadImg($currentimg_name, $temp_address, $wheretoStoreDir);
            
            if($uploadRes==false){
                $_SESSION['msg'] = "<div class='alert alert-danger'>Image not Uploded.</div>";
                header('location:' . SITEURL . 'admin/add-category.php');
                die();
            }
            $image_name=$uploadRes;
            
        //    ----------------------------START Do it with user define function -------------//

            // $current_name = $_FILES['image']['name']; // $current_name,$destination_dirctory,$source

            // //change image name to make image duplicate error in the project.
            // $trim = explode(".", $current_name);
            // $typeofimage = end($trim); //trim eg: pizza.jpeg then trim in two part and get end part by the function end()
            // $image_name = 'Category' . round(microtime(true)) . '.' . $typeofimage; //eg: Category1675771421.jpg

            // $source = $_FILES['image']['tmp_name']; //from the array we access this location
            // $destination_dirctory="../images/category/";
            // $destination = $destination_dirctory . $image_name;
            // $upload = move_uploaded_file($source, $destination);
            // if ($upload == false) {

            //     $_SESSION['msg'] = "<div class='alert alert-danger'>Image not Uploded.</div>";
            //     header('location:' . SITEURL . 'admin/add-category.php');
            //     die();
            // }
        //    ----------------------------END Do it with user define function -------------//
             

        }else{
            $image_name = "";
        }

        
    } else {
        $image_name = "";
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
    $sql = "INSERT INTO tbl_category SET
        title='$title',
        image_name='$image_name',
        featured='$featured',
        active='$active'
    ";

    $res = mysqli_query($conn, $sql);

    if ($res == true) {
        $_SESSION['msg'] = "<div class='alert alert-success'>Category Upload successfully</div>";
        header('location:' . SITEURL . 'admin/manage-Category.php');
    } else {
        $_SESSION['msg'] = "<div class='alert alert-danger'>Category Not Upload</div>";
        header('location:' . SITEURL . 'admin/add-category.php');
    }
}
?>