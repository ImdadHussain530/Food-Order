<?php
include('partials/header.php')
?>
<div class="container">
    <div class="row mt-5">
        <div class="col-6">
            <h1 class="">Admin Detail</h1>
        </div>
        <br>
        <br>
        <br>
        <br>
    </div>
    <div class="row">
        <form method="post" class="col-6">
            <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label">FullName</label>
                <div class="col-sm-10">
                    <input type="text" name="full_name" class="form-control" id="full_name" value="">
                </div>
            </div>
            <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Username</label>
                <div class="col-sm-10">
                    <input type="text" name="username" class="form-control" id="username" value="">
                </div>
            </div>
            <div class="form-group row">
                <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
                <div class="col-sm-10">
                    <input type="password" name="password" class="form-control" id="inputPassword" placeholder="Password">
                </div>
            </div>
            <div class="form-group row">
                <button class="btn btn-primary btn-lg m-1" name="submit" id="submit" type="submit">Submit</button>
            </div>
        </form>
    </div>



</div>

<?php
include('partials/footer.php')
?>

<?php
 if(isset($_POST['submit'])){
    
    $full_name = $_POST['full_name'];
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    $sql = "INSERT INTO tbl_admin set
    full_name='$full_name',
    username='$username',
    password='$password'
    ";


    $res=mysqli_query($conn,$sql) or die("Connection failed: " .mysqli_error($conn));

   //checking data submittion (mysqli_query return boolean in $res)
    if($res==true){
        $_SESSION['msg'] = "<div class='alert alert-success'>Admin added succesfully.</div>";
        header("location:".SITEURL.'admin/manage-admin.php');
    }else{
        $_SESSION['msg'] = "<div class='alert alert-success'>Fail to add admin.</div>";
        header("location:".SITEURL.'admin/add-admin.php');
    }


}
?>
