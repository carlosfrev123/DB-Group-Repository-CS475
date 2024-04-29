<?php
session_start(); 
?>

<header>  
  <nav class="navbar navbar-expand-md bannercolor">
    <div class="container-fluid">            
      <a class="navbar-brand" href="home.php">Cavalier Candles</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar" aria-controls="collapsibleNavbar" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="collapsibleNavbar">
        <ul class="navbar-nav ms-auto">
          <?php if (!isset($_SESSION['email'])) { ?>              
            <li class="nav-item">
              <a class="nav-link" href="login.php">Log in/ Sign up</a>
            </li>              
          <?php  } else { ?>      
            <li class="nav-item">
                <a class="nav-link" href="profile.php"> Profile </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="cart.php">Cart</a>
            </li> 
            <li class="nav-item">
              <a class="nav-link" href="wishlist.php">Wishlist</a>
            </li>  
            <li class="nav-item">                  
                <a class="nav-link" href="signout.php">Sign out</a>
            </li>
          <?php } ?>
        
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
    color: #fff; 
    font-weight: bold; 
  }
</style>

