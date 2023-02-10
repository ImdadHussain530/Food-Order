<?php
include('partials/header.php')
?>
<div class="container-fluid mb-3">
  <div class="container-fluid pt-4 ">
    <br />
    <h1>Food</h1> <br />
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
    <a class="btn btn-warning btn-lg m-1" type="button" href="<?php echo SITEURL ?>admin/add-food.php">Add Food</a>
  </div>

  <div class="container-fluid">
    <table class="table">
      <thead class="thead-dark">
        <tr>
          <th scope="col">Sr.</th>
          <th scope="col">Title</th>
          <th scope="col">Description</th>
          <th scope="col">Price</th>
          <th scope="col">Image</th>
          <th scope="col">Category</th>
          <th scope="col">feature</th>
          <th scope="col">Active</th>
          <th scope="col">Action</th>
          
        </tr>
      </thead>
      <?php
      $sn = 1;
      $sql = "SELECT * from tbl_food";
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
                <td><?php echo $rows['description']; ?></td>
                <td><?php echo $rows['price']; ?></td>
                <td>
                  <?php
                  //  echo $rows['image_name']; 
                  if($rows['image_name']!=''){
                    //image found
                    ?>
                    <img src="<?php echo SITEURL; ?>images/food/<?php echo $rows['image_name'];?>" height="150px"></img>
                    <?php
                  }else{
                    //image not found
                    echo "<div class='text-danger'>Image Not Available</div>";
                  }
                  ?>
                </td>
                <td><?php
                $category_id = $rows['category_id'];
                if($category_id!=0){
                  $sql2 = "SELECT * from tbl_category where id='$category_id' ";
                  $res2 = mysqli_query($conn, $sql2);
                  $data2 = mysqli_fetch_assoc($res2);
                  echo $data2['title'];

                }else{
                  echo "Not-Available";
                }
                
                
                
                ?></td>
                <td><?php echo $rows['featured']; ?></td>
                <td><?php echo $rows['active']; ?></td>
                <td>
                  <a class="btn btn-primary" type="button" href="<?php echo SITEURL ?>admin/update-food.php/?id=<?php echo $rows['id'] ?>">Update</a>
                  <a class="btn btn-danger" type="button" href="<?php echo SITEURL ?>admin/delete-food.php?id=<?php echo $rows['id'] ?>&image_name=<?php echo $rows['image_name'];?>">Delete</a>
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