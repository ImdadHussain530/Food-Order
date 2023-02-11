<?php
include('partials/header.php')
?>
<div class="container-fluid mb-3">
  <div class="container-fluid pt-4 ">
    <br />
    <h1>Order</h1> <br />
    <!--START message showing add-admin -->
    <div> 
      <?php
      if (isset($_SESSION['msg'])) {
        echo $_SESSION['msg'];
        unset($_SESSION['msg']);
      }
      ?>
    </div>

    <!--END message showing add-admin -->

  </div>
  

  <div class="container-fluid">
    <table class="table">
      <thead class="thead-dark">
        <tr>
          <th scope="col">Sr.</th>
          <th scope="col">Customer_name</th>
          <th scope="col">Customer_address</th>
          <th scope="col">Customer_email</th>
          <th scope="col">Customer_contact</th>
          <th scope="col">Food</th>
          <th scope="col">Price</th>
          <th scope="col">Qty</th>
          <th scope="col">Total</th>
          <th scope="col">Order_date</th>
          <th scope="col">Status</th>
          <th scope="col">Action</th>
          
        </tr>
      </thead>
      <?php
      $sn = 1;
      $sql = "SELECT * from tbl_order";
      $res = mysqli_query($conn, $sql);
      if ($res == true) {
        //number of rows count
        $count = mysqli_num_rows($res);
        if ($count > 0) {
          while ($rows = mysqli_fetch_assoc($res)) {
      ?>
            <tbody>
              <tr>
                <th scope="row"><?php echo $sn++; ?></th>
                <td><?php echo $rows['customer_name']; ?></td>
                <td><?php echo $rows['customer_address']; ?></td>
                <td><?php echo $rows['customer_email']; ?></td>
                <td><?php echo $rows['customer_contact']; ?></td>
                <td><?php echo $rows['food']; ?></td>
                <td><?php echo $rows['price']; ?></td>
                <td><?php echo $rows['qty']; ?></td>
                <td><?php echo $rows['total']; ?></td>
                <td><?php echo $rows['order_date']; ?></td>
                <td><?php echo $rows['status']; ?></td>
                <td>
                  <a class="btn btn-primary" type="button" href="<?php echo SITEURL ?>admin/update-order.php/?id=<?php echo $rows['id'] ?>">Update </a>
                </td>
              </tr>

            </tbody>
      <?php
          }
        } else {
          echo "No data found.";
        }
      } else {
        echo "Invalid Connection.";
      }
      ?>

    </table>
  </div>
</div>
<?php
include('partials/footer.php')
?>