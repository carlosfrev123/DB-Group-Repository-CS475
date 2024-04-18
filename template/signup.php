<?php
require("connect-db.php");
require("signup-db.php");

// Check if the sign up button has been clicked
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!empty($_POST['signupBtn'])) {
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
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        form {
            width: 100%;
            max-width: 500px;
        }
        .form-group {
            display: flex;
            align-items: center;
            margin-bottom: 10px; /* Spacing between form groups */
        }
        .form-group label {
            width: 20%;
            margin-right: 10px; /* Spacing between label and input */
        }
        .form-group input {
            width: 80%;
        }
    </style>
</head>
<body>
    <h2>Sign up</h2>
    <form method="POST">
        <div class="form-group">
            <label for="email">Email:</label>
            <input id="email" name="email" required>
        </div>

        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
        </div>

        <div class="form-group">
            <label for="name">Name:</label>
            <input id="name" name="name" required>
        </div>

        <div class="form-group">
            <label for="address">Address:</label>
            <input id="address" name="address" required>
        </div>

        <div class="form-group">
            <label for="age">Age:</label>
            <input type="number" id="age" name="age" required>
        </div>

        <div class="col-12 d-grid">
            <input type="submit" value="Sign Up" id="signupBtn" name="signupBtn" class="btn btn-dark"
                title="Sign up for an account" />
        </div>
    </form>
</body>
</html>
