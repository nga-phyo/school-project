

<?php include_once '../db.php' ?>
<?php include_once '../helper.php' ?>

<nav class="navbar navbar-expand-lg bg-dark navbar-dark">
  <div class="container">
    <a class="navbar-brand" href="dashboard.php">Dashboard</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    
      <form class="d-flex" role="search">

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">

        <?php if(!isset($_SESSION['auth'])): ?>
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="./register.php">Register</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./login.php">Login</a>
        </li>
        <?php else: ?>

          <?php 
          
          $id = $_SESSION['auth']['id'];
          $sql = "SELECT * FROM student Inner join category on student.class = category.cat_id where `id` = '$id'";
          $result = mysqli_query($conn,$sql);
          $ans = mysqli_fetch_assoc($result);
  
          
          ?>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          <?php echo $ans['name'] ?>
          </a>

    
          <ul class="dropdown-menu bg-info-subtle">
            <li><a class="dropdown-item" href="#"><i class="fa-solid fa-book"></i> <?php echo $ans['cat_name'] ?></a></li>
            <li><a class="dropdown-item" href="#"><i class="fa-regular fa-id-card"></i> <?php echo $ans['student_id'] ?></a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#"><i class="fa-solid fa-address-card"></i> Information</a></li>
          </ul>
        </li>

          <li class="nav-item">
          <a class="nav-link" href="./logout.php">Logout</a>
        </li>
      <?php endif ?>


        
        
      </ul>
      </form>
    </div>
  </div>
</nav>