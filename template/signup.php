<?php
require("connect-db.php");
require("signup-db.php");

// Check if the sign up button has been clicked
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!empty($_POST['signupBtn'])){
      addAccount($_POST['email'], $_POST['password'], $_POST['name'], $_POST['address'], $_POST['age']);
      // Redirect to home.php after successful signup
      header('Location: home.php');
      exit();
    }
  }

?>

<!DOCTYPE html>
<html>
<head>
  <title>Sign up</title>
</head>
<body>
  <h2>Sign up</h2>
  <form method="POST">
    <label for="email">Email:</label>
    <input id="email" name="email" required><br><br>
    
    <label for="password">Password:</label>
    <input type="password" id="password" name="password" required><br><br>
    
    <label for="name">Name:</label>
    <input id="name" name="name" required><br><br>

    <label for="address"><Address></Address>Enter Address:</label>
    <input id="address" name="address" required><br><br>
    
    <label for="age">Age:</label>
    <input type="number" id="age" name="age" required><br><br>
    
    <div class="col-4 d-grid ">
      <input type="submit" value="Sign Up" id="signupBtn" name="signupBtn" class="btn btn-dark"
           title="Sign up for an account" />                  
      </div>	
  </form>
  
</body>

</html>