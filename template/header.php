<?php session_start(); ?>

<header>  
  <nav class="navbar navbar-expand-md bannercolor">
    <div class="container-fluid">            
      <a class="navbar-brand" href="home.php">Cavalier Candles</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar" aria-controls="collapsibleNavbar" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="collapsibleNavbar">
        <ul class="navbar-nav ms-auto">
          <!-- check if currently logged in, display Log out button 
               otherwise, display sign up and log in buttons -->
          <?php if (!isset($_SESSION['email'])) { ?>              
            <!-- <li class="nav-item">
              <a class="nav-link" href="register.php">Join our community</a>
            </li> -->
            <li class="nav-item">
              <a class="nav-link" href="login.php">Log in/ Sign up</a>
            </li>              
          <?php  } else { ?>                    
            <li class="nav-item">                  
                <a class="nav-link" href="signout.php">Sign out</a>
            </li>
            <li class="nav-item">
                <a class="nav-link"> User: <?php echo htmlspecialchars($_SESSION['email']); ?></a>
            </li>  
          <?php } ?>
        
          <!-- <li class="nav-item">
            <a class="nav-link" href="#">Software</a>
          </li>             -->
          <!-- <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="dropdown01" role="button" data-bs-toggle="dropdown" aria-expanded="false">Research</a>
            <ul class="dropdown-menu" aria-labelledby="dropdown01">
              <li><a class="dropdown-item" href="#">Design</a></li>
              <li><a class="dropdown-item" href="#">Development</a></li>
              <li><a class="dropdown-item" href="#">Testing</a></li>
              <li><a class="dropdown-item" href="#">Maintenance</a></li>
            </ul>
          </li> -->
          <!-- <li class="nav-item">
            <a class="nav-link" href="#">Activity</a>
          </li> -->
          <li class="nav-item">
            <a class="nav-link" href="cart.php">Cart</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
</header>    

<style>
  .bannercolor {
    background-color: #FFB6C1; 
  }
  .navbar-brand,
  .navbar-nav .nav-link {
    color: #fff; /* White text color */
    font-weight: bold; 
  }
</style>

