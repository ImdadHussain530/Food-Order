<nav class="navbar navbar-expand-lg navbar-light bg-info">
  <a class="navbar-brand" href="#">food-order</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link text-light" href="index.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-light" href="manage-admin.php">Admin</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-light" href="manage-Food.php">Food</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-light" href="manage-Category.php">Category</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-light" href="manage-Order.php">Order</a>
      </li>

      <li class="nav-item">
        <a class="nav-link text-warning" href="logout.php">
          <?php 
          if (isset($username)) {
            echo "LogOut";
          }
          ?>
        </a>
      </li>
      <!-- <li class="nav-item">
        <a class="nav-link text-light disabled" href="#">Disabled</a>
      </li> -->
    </ul>

  </div>
  <div class="d-flex justify-content-end">
    <div>
      <?php 
      if (isset($username)) {
            echo $username;
          }
      ?>
    </div>
  </div>


</nav>