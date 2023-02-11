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
        $sql = "SELECT * FROM tbl_order WHERE id=$id";
        $res = mysqli_query($conn, $sql);
        if ($res == true) {
            $count = mysqli_num_rows($res);
            if ($count == 1) {
                //admin available
                $admin_avl = "<div class='alert alert-success'>Order Available</div>";
                $data = mysqli_fetch_assoc($res);
            } else {
                //admin not available
                $_SESSION['msg'] = "<div class='alert alert-danger'>Order Not Founded.</div>";
                header("location:" . SITEURL . 'admin/manage-order.php');
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
                <label for="staticEmail" class="col-sm-2 col-form-label">Customer Name</label>
                <div class="col-sm-10">
                    <input type="text" name="full_name" class="form-control" id="customer_name" value="<?php echo $data['customer_name'] ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Customer Name</label>
                <div class="col-sm-10">
                    <input type="text" name="full_name" class="form-control" id="customer_address" value="<?php echo $data['customer_address'] ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Customer Name</label>
                <div class="col-sm-10">
                    <input type="text" name="full_name" class="form-control" id="customer_email" value="<?php echo $data['customer_email'] ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Customer Name</label>
                <div class="col-sm-10">
                    <input type="text" name="full_name" class="form-control" id="customer_contact" value="<?php echo $data['customer_contact'] ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Customer Name</label>
                <div class="col-sm-10">
                    <input type="text" name="full_name" class="form-control" id="food" value="<?php echo $data['food'] ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Customer Name</label>
                <div class="col-sm-10">
                    <input type="text" name="full_name" class="form-control" id="qty" value="<?php echo $data['qty'] ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Customer Name</label>
                <div class="col-sm-10">
                    <input type="text" name="full_name" class="form-control" id="total" value="<?php echo $data['total'] ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Customer Name</label>
                <div class="col-sm-10">
                    <input type="text" name="full_name" class="form-control" id="order_date" value="<?php echo $data['order_date'] ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Customer Name</label>
                <div class="col-sm-10">
                    <input type="text" name="full_name" class="form-control" id="status" value="<?php echo $data['status'] ?>">
                </div>
            </div>
        </form>
    </div>



</div>

<?php
include('partials/footer.php')
?>

<?php
// if (isset($_POST['submit'])) {
//     //get values
//     $id = $_POST['id'];
//     $full_name = $_POST['full_name'];
//     $username = $_POST['username'];

//     $sql = "UPDATE tbl_admin SET
//         full_name='$full_name',
//         username='$username' WHERE
//         id='$id'
//         ";

//     $res = mysqli_query($conn, $sql);
//     if ($res == true) {
        
//             //admin available
//             $_SESSION['msg'] = "<div class='alert alert-success'>Admin Updated Successfully</div>";
//             header("location:" . SITEURL . 'admin/manage-admin.php');
       
          
        
//     }else{
//           //admin not available
//           $_SESSION['msg'] = "<div class='alert alert-danger'>Admin Not Updated.</div>";
//           header("location:" . SITEURL . 'admin/manage-admin.php');
//     }
// } 
?>