<?php
include('../config/constants.php');

 $id = $_GET['id'];
 $image_name = $_GET['image_name'];

if(isset($_GET['id'])&&isset($_GET['image_name'])){
    if($image_name!=""){
        $path="../images/category/".$image_name;
        $del=unlink($path);
        if($del==false){
            $_SESSION['msg']="<div class='alert alert-danger'>error (image)! Data not deleted.</div>";
            header('location:'.SITEURL.'admin/manage-Category.php');
            die();
            

        }
        

    }

    $sql = "DELETE FROM tbl_category WHERE id=$id and image_name='$image_name'";
        $res=mysqli_query($conn,$sql);
        if($res==true){
            $_SESSION['msg'] = "<div class='alert alert-success'>Category Deleted Succesfully</div>";
            header('Location:'.SITEURL.'admin/manage-Category.php/');
        }else{
            $_SESSION['msg'] = "<div class='alert alert-danger'>Category Not Deleted! Please try again later.</div>";
            header('Location:'.SITEURL.'admin/manage-Category.php/');
        }
}

