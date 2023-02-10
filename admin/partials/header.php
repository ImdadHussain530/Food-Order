<?php
ob_start();//header not working properly therefore use this function
include('../config/constants.php');
include('../config/functions.php');

  if(isset($_SESSION['user'])){
    $username=$_SESSION['user'];
  }else{
   $_SESSION['not_login'] = "<div class='alert alert-success container col-2 text-center'>Login Please...</div>";
    header('location:'.SITEURL.'admin/login.php');
  }
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
<?php include('../admin/partials/nav.php');?>