<?php
include('../config/constants.php');
$id = $_GET['id'];
$sql = "DELETE FROM tbl_admin WHERE id=$id";
$res = mysqli_query($conn, $sql);
if($res==true){
    $_SESSION['msg'] = "<div class='alert alert-success'>Admin Deleted Succesfully</div>";
    header('Location:'.SITEURL.'admin/manage-admin.php/');
    
}else{
    $_SESSION['msg'] = "<div class='alert alert-danger'>Admin Not Deleted! Please try again later.</div>";
    header('Location:'.SITEURL.'admin/manage-admin.php/');
}
?>