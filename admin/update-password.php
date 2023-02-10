<?php
include('partials/header.php')
?>
<div class="container">
    <div class="row mt-5">
        <div class="col-6">
            <h1 class="">Update
                Password</h1>

        </div>
        <?php
        $id = $_GET['id'];
        ?>
        <br>
        <br>
        <br>
        <br>
    </div>
   
    <div class="row">
        <form method="post" class="col-6">
            <div class="form-group row">
                <label for="staticEmail" class="col-sm-3 col-form-label">Old Password</label>
                <div class="col-sm-9">
                    <input type="password" name="old_password" class="form-control" id="old_password">
                </div>
            </div>
            <div class="form-group row">
                <label for="staticEmail" class="col-sm-3 col-form-label">New Password</label>
                <div class="col-sm-9">
                    <input type="password" name="new_password" class="form-control" id="new_password" >
                </div>
            </div>
            <div class="form-group row">
                <label for="staticEmail" class="col-sm-4 col-form-label">Confirm password</label>
                <div class="col-sm-8">
                    <input type="password" name="confirm_password" class="form-control" id="confirm_password">
                </div>
            </div>

            <div class="form-group row">
                <button class="btn btn-primary btn-lg m-1" name="submit" id="submit" type="submit">Change</button>
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
    $id = $_GET['id'];
    $old_password = md5($_POST['old_password']);
    $new_password = md5($_POST['new_password']);
    $confirm_password = md5($_POST['confirm_password']);

    $sql = "SELECT * FROM tbl_admin WHERE id=$id and password='$old_password'";

    $res=mysqli_query($conn,$sql);

    if($res==true){
        $count = mysqli_num_rows($res);
        if($count==1){
            //user found
            if($new_password==$confirm_password){
                //change password now
                $sql="UPDATE tbl_admin SET
                password='$new_password'
                ";
                $res=mysqli_query($conn,$sql);
                if($res==true){
                    $_SESSION['msg'] = "<div class='alert alert-success'>Password Updated Successfully</div>";
                    header("location:" . SITEURL . 'admin/manage-admin.php');
                }
            }else{
                $_SESSION['msg'] = "<div class='alert alert-danger'>Password Not Changed.</div>";
          header("location:" . SITEURL . 'admin/manage-admin.php');
            }
        }else{
            // user not found
            echo "Admin not Founded";
        }

    }

    
} 
?>