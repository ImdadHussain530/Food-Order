<?php
include('partials/header.php')
?>
<div class="container">
  <div class="container pt-4">
    <br />
    <h1>Category</h1> <br />
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
    <a class="btn btn-warning btn-lg m-1" type="button" href="<?php echo SITEURL ?>admin/add-category.php">Add Category</a>
  </div>

  <div class="container">
    <table class="table">
      <thead class="thead-dark">
        <tr>
          <th scope="col">Sr.</th>
          <th scope="col">Title</th>
          <th scope="col">Image</th>
          <th scope="col">feature</th>
          <th scope="col">Active</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <?php
      $sn = 1;
      $sql = "SELECT * from tbl_category";
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
                <td><?php echo $rows['title']; ?></td>
                <td>
                  <?php
                  //  echo $rows['image_name']; 
                  if($rows['image_name']!=''){
                    //image found
                    ?>
                    <img src="<?php echo SITEURL; ?>images/category/<?php echo $rows['image_name'];?>" height="150px"></img>
                    <?php
                  }else{
                    //image not found
                    echo "<div class='text-danger'>Image Not Available</div>";
                  }
                  ?>
                </td>
                <td><?php echo $rows['featured']; ?></td>
                <td><?php echo $rows['active']; ?></td>
                <td>
                  <a class="btn btn-primary" type="button" href="<?php echo SITEURL ?>admin/update-category.php/?id=<?php echo $rows['id'] ?>">Update</a>
                  <a class="btn btn-danger" type="button" href="<?php echo SITEURL ?>admin/delete-category.php?id=<?php echo $rows['id'] ?>&image_name=<?php echo $rows['image_name'];?>">Delete</a>
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