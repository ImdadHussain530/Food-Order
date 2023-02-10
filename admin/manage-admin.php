<?php
include('partials/header.php')
?>
<div class="container">
  <div class="container pt-4">
    <br />
    <h1>Manage</h1> <br />
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
  <div class="container">
    <a class="btn btn-warning btn-lg m-1" type="button" href="<?php echo SITEURL ?>admin/add-admin.php">Add Admin</a>
  </div>

  <div class="container">
    <table class="table">
      <thead class="thead-dark">
        <tr>
          <th scope="col">Sr.</th>
          <th scope="col">FullName</th>
          <th scope="col">UserName</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <?php
      $sn = 1;
      $sql = "SELECT * from tbl_admin";
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
                <td><?php echo $rows['full_name']; ?></td>
                <td><?php echo $rows['username']; ?></td>
                <td>
                  <a class="btn btn-primary" type="button" href="<?php echo SITEURL ?>admin/update-password.php/?id=<?php echo $rows['id'] ?>">Change Password</a>
                  <a class="btn btn-primary" type="button" href="<?php echo SITEURL ?>admin/update-admin.php/?id=<?php echo $rows['id'] ?>">Update</a>
                  <a class="btn btn-danger" type="button" href="<?php echo SITEURL ?>admin/delete-admin.php/?id=<?php echo $rows['id'] ?>">Delete</a>
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