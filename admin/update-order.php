<?php
include('partials/header.php')
?>
<div class="container mb-20">
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
        <form method="post" class="col-12">
            <div class="form-group row">
                <div class="col">
                    <label for="staticEmail" class="col-sm-6 col-form-label">Customer Name</label>
                    <input readonly type="text" name="customer_name" class="form-control" id="customer_name" value="<?php echo $data['customer_name'] ?>">
                </div>
                <div class="col">
                    <label for="staticEmail" class="col-sm-6 col-form-label">Customer Address</label>
                    <input readonly type="text" name="customer_address" class="form-control" id="customer_address" value="<?php echo $data['customer_address'] ?>">
                </div>
                
            </div>
            
            <div class="form-group row">
                <div class="col">
                    <label for="staticEmail" class="col-sm-6 col-form-label">Customer Email</label>
                <input readonly type="text" name="customer_email" class="form-control" id="customer_email" value="<?php echo $data['customer_email'] ?>">
                </div>
                <div class="col">
                    <label for="staticEmail" class="col-sm-6 col-form-label">Customer Contact</label>
                <input readonly type="text" name="customer_contact" class="form-control" id="customer_contact" value="<?php echo $data['customer_contact'] ?>">
                </div>
                
            </div>
            <div class="form-group row">
                <div class="col">
                    <label for="staticEmail" class="col-sm-5 col-form-label">Food</label>
                    <input readonly type="text" name="food" class="form-control" id="food" value="<?php echo $data['food'] ?>">
                </div>
                <div class="col row ">
                    <div class="col-6">
                        <label for="staticEmail" class="col-sm-3 col-form-label">Price</label>
                        <input type="text" name="price" class="form-control" readonly id="price" value="<?php echo $data['price'] ?>">
                    </div>
                    <div class="col-6">
                        <label for="staticEmail" class="col-sm-3 col-form-label">Quantity</label>
                        <input type="text" name="qty" class="form-control" readonly id="qty" value="<?php echo $data['qty'] ?>">
                    </div>
                </div>
            </div>
            
            <div class="form-group row">
                <div class="col">
                    <label for="staticEmail" class="col-sm-6 col-form-label">Total</label>
                <input readonly type="text" name="total" class="form-control" id="total" value="<?php echo $data['total'] ?>">
                </div>
                <div class="col">
                    <label for="staticEmail" class="col-sm-6 col-form-label">Order Date</label>
                    <input readonly type="text" name="order_date" class="form-control" id="order_date" value="<?php echo $data['order_date'] ?>">
                </div>
            </div>

            <div class="form-group row">
                <div class="col-6">
                <label for="staticEmail" class="col-form-label">Status</label>
                <select name='status' class="p-2 bg-primary text-light">
                        <option value="Ordered" <?php echo ($data['status']=="Ordered")?"selected":""; ?>>Ordered</option>
                        <option value="Dispatch" <?php echo ($data['status']=="Dispatch")?"selected":""; ?>>Dispatch</option>
                        <option value="Out For delevery" <?php echo ($data['status']=="OutFordelevery")?"selected":""; ?>>Out For delevery</option>
                        <option value="Deleverd" <?php echo ($data['status']=="Ordered")?"Deleverd":""; ?>>Deleverd</option>
                    </select>
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
    $customer_name=$_POST['customer_name']; 
    $customer_address=$_POST['customer_address']; 
    $customer_email=$_POST['customer_email']; 
    $customer_contact=$_POST['customer_contact']; 
    $food=$_POST['food']; 
    $price=$_POST['price']; 
    $qty=$_POST['qty']; 
    $total=$_POST['total']; 
    $order_date=$_POST['order_date']; 
    $status=$_POST['status']; 

    $sql = "UPDATE tbl_order SET
        food='$food',
    price=$price,
    qty=$qty,
    total=$total,
    order_date='$order_date',
    status='$status',
    customer_name='$customer_name',
    customer_contact=$customer_contact,
    customer_email='$customer_email',
    customer_address='$customer_address' 
    WHERE
    id=$id
     ";

    $res = mysqli_query($conn, $sql);
    if ($res == true) {
        
            //admin available
            $_SESSION['msg'] = "<div class='alert alert-success'>Order Updated Successfully</div>";
            header("location:" . SITEURL . 'admin/manage-order.php');
       
          
        
    }else{
          //admin not available
          $_SESSION['msg'] = "<div class='alert alert-danger'>Order Not Updated.</div>";
          header("location:" . SITEURL . 'admin/manage-order.php');
    }
} 
?>