<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container">
    <a class="navbar-brand" href="index.php">GoCommerce</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="categories.php">Company</a>
          <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="about.php">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="contact.php">Contact</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="news.php"> News</a>
        </li>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="visited.php">Visited Page</a>
        </li>
        <?php
          if(isset($_SESSION['auth'])) { ?>
             <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              <?= $_SESSION['auth_user']['name']; ?>
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="cart-view.php">My Cart</a></li>
              <li><a class="dropdown-item" href="my_order.php">My Orders</a></li>
              
              <li><a class="dropdown-item" href="logout.php">Logout</a></li>
            </ul>
          </li> ?>
          <?php
          } else { ?>
              <li class="nav-item">
                <a class="nav-link" href="login.php">Login</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="register.php">Register</a>
              </li>
          <?php
          } ?>
        
      </ul>
    </div>
  </div>
</nav>