<?php
include('../config/constants.php');

 $id = $_GET['id'];
 $image_name = $_GET['image_name'];

if(isset($_GET['id'])&&isset($_GET['image_name'])){
    if($image_name!=""){
        $path="../images/food/".$image_name;
        $del=unlink($path);
        if($del==false){
            $_SESSION['msg']="<div class='alert alert-danger'>error!image Data not deleted.</div>";
            header('location:'.SITEURL.'admin/manage-Category.php');
            die();
            

        }
        

    }

    $sql = "DELETE FROM tbl_food WHERE id=$id and image_name='$image_name'";
        $res=mysqli_query($conn,$sql);
        if($res==true){
            $_SESSION['msg'] = "<div class='alert alert-success'>Food Deleted Succesfully</div>";
            header('Location:'.SITEURL.'admin/manage-food.php/');
        }else{
            $_SESSION['msg'] = "<div class='alert alert-danger'>Food Not Deleted! Please try again.</div>";
            header('Location:'.SITEURL.'admin/manage-food.php/');
        }
}

