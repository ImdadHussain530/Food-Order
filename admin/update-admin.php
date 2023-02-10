<?php
include('partials/header.php')
?>
<div class="container">
    <div class="row mt-5">
        <div class="col-6">
            <h1 class="">Update
                Admin</h1>

        </div>
        <?php
        $id = $_GET['id'];
        $sql = "SELECT * FROM tbl_admin WHERE id=$id";
        $res = mysqli_query($conn, $sql);
        if ($res == true) {
            $count = mysqli_num_rows($res);
            if ($count == 1) {
                //admin available
                $admin_avl = "<div class='alert alert-success'>Admin Available</div>";
                $data = mysqli_fetch_assoc($res);
            } else {
                //admin not available
                $_SESSION['msg'] = "<div class='alert alert-danger'>Admin Not Founded.</div>";
                header("location:" . SITEURL . 'admin/manage-admin.php');
            }
        } else {
            echo "not working";
        }
        ?>
        <br>
        <br>
        <br>
        <br>
    </div>
    <?php echo $admin_avl ?>
    <div class="row">
        <form method="post" class="col-6">
            <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label">FullName</label>
                <div class="col-sm-10">
                    <input type="text" name="full_name" class="form-control" id="full_name" value="<?php echo $data['full_name'] ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Username</label>
                <div class="col-sm-10">
                    <input type="text" name="username" class="form-control" id="username" value="<?php echo $data['username'] ?>">
                </div>
            </div>

            <div class="form-group row">
                <input class="form-control" type="hidden" name="id" value="<?php echo $data['id'] ?>">
                <button class="btn btn-primary btn-lg m-1" name="submit" id="submit" type="submit">Update</button>
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
    $id = $_POST['id'];
    $full_name = $_POST['full_name'];
    $username = $_POST['username'];

    $sql = "UPDATE tbl_admin SET
        full_name='$full_name',
        username='$username' WHERE
        id='$id'
        ";

    $res = mysqli_query($conn, $sql);
    if ($res == true) {
        
            //admin available
            $_SESSION['msg'] = "<div class='alert alert-success'>Admin Updated Successfully</div>";
            header("location:" . SITEURL . 'admin/manage-admin.php');
       
          
        
    }else{
          //admin not available
          $_SESSION['msg'] = "<div class='alert alert-danger'>Admin Not Updated.</div>";
          header("location:" . SITEURL . 'admin/manage-admin.php');
    }
} 
?>