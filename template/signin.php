<?php 
require("connect-db.php");
//require("home-db.php");

?>

<!DOCTYPE html>
<html>

<body>  
<?php 
//include("header.php"); ?>

<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
<style>
  body {
    background-color: #f8f9fa; 
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh; /* Full viewport height */
  }
  .container {
    margin-top: 100px;
    max-width: 400px; 
  }
  .form-control {
    border-color: #e9ecef;
  }
  .btn-pink {
    background-color: #FFB6C1;
    border-color: #FFB6C1;
    color: #fff;
    width: 100%;
  }
  .btn-pink:hover {
    background-color: #FFB6C1;
    border-color: #FFB6C1;
  }

</style>
</head>
<body>

<div class="container d-flex justify-content-center">
  <form method="post" action="<?php $_SERVER['PHP_SELF'] ?>" onsubmit="return validateInput()">
  <div class="mb-3">
  <div class="mb-3">
    Don't have an account? <span onclick="location.href='signup.php'" style="color: blue; text-decoration: none;" onmouseover="this.style.textDecoration='underline'" onmouseout="this.style.textDecoration='none'">Sign up</span>
    </div>
  
    <h2 class="mb-4">Login</h2>
    <div class='mb-3'>
      <label for="Email" class="form-label">Email:</label>
      <input type='text' class='form-control' 
             id='Email' name='Email' 
             placeholder='Enter your email' 
             value="<?php if ($request_to_update != null) echo $request_to_update['reqDate'] ?>" />
    </div>
    <div class='mb-3'>
      <label for="Password" class="form-label">Password:</label>
      <input type='password' class='form-control' id='Password' name='Password'
             placeholder='Enter your password'
             value="<?php if ($request_to_update != null) echo $request_to_update['reqBy'] ?>" />
    </div>
    <div class="mb-3">
      <input type="submit" value="Login" id="loginBtn" name="loginBtn" class="btn btn-pink" />
    </div>
  </form>
</div>

</body>


<hr/>
<br/><br/>

<?php 
//include('footer.html') ?> 

<!-- <script src='maintenance-system.js'></script> -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>
</html>