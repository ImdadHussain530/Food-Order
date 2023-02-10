<?php
include('partials/header.php')
?>
<div class="container">
    <div class="row mt-5">
        <div class="col-6">
            <h1 class="">Update
                Admin</h1>
                <?php
                if (isset($_SESSION['msg'])) {
                    echo $_SESSION['msg'];
                    unset($_SESSION['msg']);
                }
                ?>

        </div>
        <?php
        $id = $_GET['id'];
        $sql = "SELECT * FROM tbl_category WHERE id=$id";
        $res = mysqli_query($conn, $sql);
        if ($res == true) {
            $count = mysqli_num_rows($res);
            if ($count == 1) {
                //admin available
                $category_avl = "<div class='alert alert-success'>Category Available</div>";
                $data = mysqli_fetch_assoc($res);
            } else {
                //admin not available
                $_SESSION['msg'] = "<div class='alert alert-danger'>Category Not Founded.</div>";
                header("location:" . SITEURL . 'admin/manage-category.php');
            }
        }

        $title = $data['title'];
        $currentimage_name = $data['image_name'];
        $featured = $data['featured'];
        $active = $data['active'];
        ?>
        <br>
        <br>
        <br>
        <br>
    </div>
    <?php echo $category_avl ?>
    <div class="row">
    <form method="post" enctype="multipart/form-data" class="col-6">
            <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Title</label>
                <div class="col-sm-10">
                    <input type="text" name="title" class="form-control" id="title" value="<?php echo $title;?>">
                </div>
            </div>
            <div class="form-group row">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Current Image</span>
                    </div>
                    <div>
                        <?php
                        if($currentimage_name!=""){
                            $siteurl = SITEURL;
                            echo "<img src='$siteurl/images/category/$currentimage_name' width='200px'></img>";
                        }
                        ?>
                    </div>
                    
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
                    <input type="radio" name="featured" <?php echo ($featured=="yes")?"checked":" "; ?>  class="form-control-radio mr-1" id="Featured" value="yes">Yes</input>
                    <input type="radio" name="featured" <?php echo ($featured=="no")?"checked":" "; ?> class="form-control-radio mr-1" id="Featured" value="no">No</input>
                </div>
            </div>
            <div class="form-group row">
                <label for="inputPassword" class="col-sm-2 col-form-label">Active</label>
                <div class="col-sm-10">
                    <input type="radio" name="active" <?php echo ($active=="yes")?"checked":" "; ?> class="form-control-radio mr-1" id="active" value="yes">Yes</input>
                    <input type="radio" name="active" <?php echo ($active=="no")?"checked":" "; ?> class="form-control-radio mr-1" id="active" value="no">No</input>
                </div>
            </div>
            <div class="form-group row">
                <input type="hidden" name="old_name" value="<?php echo $currentimage_name?>">
                <input type="hidden" name="id" value="<?php echo $id?>">

                <button class="btn btn-primary btn-lg m-1" name="submit" id="submit" type="submit">Submit</button>
            </div>
        </form>
    </div>



</div>

<?php
include('partials/footer.php')
?>

<?php
if (isset($_POST['submit'])) {
    //get values
    echo $id=$_POST['id'];
    $title = $_POST['title'];
    $image_name = $_POST['old_name']; //old
    $featured = $_POST['featured'];
    $active = $_POST['active'];
    $new_img = $_FILES['image']['name']; //new
    if($new_img!=""){
        $source =$_FILES['image']['tmp_name'];
        $destination ="../images/category/";
        $upload=uploadImg($new_img,$source,$destination);
        if($upload==false){
            $_SESSION['msg']="<div class='alert alert-danger'>Image not Uploded.</div>";
                header('location:' . SITEURL . 'admin/update-category.php/?id='."$id");
                die();
        }else{
            if($image_name!=''){
                
                $path="../images/category/".$image_name;
                
                $del=unlink($path);
               
                if($del==false){
                     $_SESSION['msg']="<div class='alert alert-danger'>error (image)! Data not deleted.</div>";
                     header('location:' . SITEURL . 'admin/update-category.php/?id='."$id");
                    die();
                }

            }
        }
        $image_name=$upload;
        
    }

    $sql = "UPDATE tbl_category SET
        title='$title',
        image_name='$image_name',
        featured='$featured',
        active='$active'
        WHERE
        id='$id'
        ";

    $res = mysqli_query($conn, $sql);
    if ($res == true) {
        
            //admin available
            $_SESSION['msg'] = "<div class='alert alert-success'>Category Updated Successfully</div>";
            header("location:" . SITEURL . 'admin/manage-Category.php');
       
          
        
    }else{
          //admin not available
          $_SESSION['msg'] = "<div class='alert alert-danger'>Category Not Updated.</div>";
          header("location:" . SITEURL . 'admin/manage-Category.php');
    }
} 
?>