<?php
include('../config/constants.php');

?>
<!doctype html>
<html lang="en">

<head>
  <title>food order website-home page</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
  <?php
  include('../admin/partials/nav.php');
  ?>
<div class="pt-5">
    <h3 class="text-center">Admin Login Form</h3>
    <?php
    if (isset($_SESSION['not_login'])) {
        echo $_SESSION['not_login'];
        unset($_SESSION['not_login']);
    }
    ?>
    <div class="container">
        <div class="row">
            <div class="col-md-5 mx-auto">
                <div class="card card-body">
                    <form id="submitForm"  method="post" data-parsley-validate="" data-parsley-errors-messages-disabled="true" novalidate="" _lpchecked="1">
                        <input type="hidden" name="_csrf" value="7635eb83-1f95-4b32-8788-abec2724a9a4">
                        <div class="form-group ">
                            <label for="username"> Enter your Username </label>
                            <input type="text" class="form-control text-lowercase" required="" id="username"  name="username" value="">
                        </div>
                        <div class="form-group">
                            <label class="d-flex flex-row align-items-center" for="password"> Enter your Password</label>
                            <input type="password" class="form-control" required="" id="password" name="password" value="">
                        </div>

                        <div class="form-group pt-1">
                            <button class="btn btn-primary btn-block" name="submit" type="submit"> Log In </button>
                        </div>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</div>

<?php

if (isset($_POST['submit'])) {
    
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    

    $sql = "SELECT * FROM tbl_admin WHERE 
    username='$username'and
    password='$password'
    ";

    $res = mysqli_query($conn, $sql);
    if ($res == true) {
        $count = mysqli_num_rows($res);
        if ($count == 1) {
            //username and password correct
            $_SESSION['user'] = $username;
            header('location:' . SITEURL . 'admin/index.php');
        } else {
            $_SESSION['msg'] = "<div class='container col-4 alert alert-danger'>Username or Password not exist's</div>";
            header('location:' . SITEURL . 'admin/login.php');
        }
    }
}


?>


<?php include('../admin/partials/footer.php') ?>