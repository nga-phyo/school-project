
<?php include_once './db.php' ?>

<nav class="navbar navbar-expand-lg bg-dark navbar-dark">
  <div class="container">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    
      <form class="d-flex" role="search">

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">

        <?php if(!isset($_SESSION['auth'])): ?>
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="./student/register.php">Register</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./student/login.php">Login</a>
        </li>
        <?php else: ?>

          <li class="nav-item">
          <a class="nav-link" href="./student/logout.php">Logout</a>
        </li>
      <?php endif ?>


        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Dropdown
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </li>
        
      </ul>
      </form>
    </div>
  </div>
</nav>