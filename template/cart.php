<?php 
session_start();
require("connect-db.php"); 
require("cart-db.php");

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['updateBtn'])) {
    $itemId = $_POST['product_ID'];
    $newQuantity = $_POST['new_quantity'];
    updateCartItemQuantity($product_ID, $newQuantity, getUserId($_SESSION['email'])); // Function to update the quantity in the database
}
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">    
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="author" content="Bereket, Carlos, Emily, Natalie">
  <meta name="description" content="Your Cart">
  <meta name="keywords" content="Cavalier Candles">
  <link rel="icon" type="image/png" href="https://www.cs.virginia.edu/~up3f/cs4750/images/db-icon.png" />
  
  <title>Cavalier Candles</title>
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">  
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">  
  <link rel="stylesheet" href="maintenance-system.css">  

  <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Candle Shop</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        .filter-option {
            margin-top: 20px;
            margin-left: 20px;
        }

        .product-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }
        .product {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin-bottom: 20px;
            box-sizing: border-box;
            width: calc(33.33% - 20px)
        }
        
        .product img {
            max-width: 100%;
            height: auto;
            border-radius: 8px;
        }

        .add-to-cart-button {
        border: 1px solid black;
        background-color: #FFB6C1;
        cursor: pointer;
        margin-left: 100px;
        }

        .add-to-cart-button:hover{
            background-color: grey
        }
    </style>
</head>

<body>  
<body>  
    <?php include("header.php"); ?>

    <div class="product-container">
        <?php 
        $cartItems = getCartItems(getUserId($_SESSION['email'])); // Fetch cart items from the database using appropriate SQL queries

        // Loop through cart items and display them with quantity adjustment options
        foreach ($cartItems as $item) {
            ?>
            <div class="product">
                <h2><?php echo $item['Name']; ?></h2>
                <p>Price: $<?php echo $item['Price']; ?></p>
                <p>Size: <?php echo $item['size']; ?></p>
                <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                    <input type="hidden" name="item_id" value="<?php echo $item['ID']; ?>">
                    <label for="quantity">Quantity:</label>
                    <input type="number" name="new_quantity" value="<?php echo $item['quantity']; ?>" min="1">
                    <input type="submit" name="updateBtn" value="Update Quantity" class="add-to-cart-button" style="background-color: #FFB6C1; margin-left: 10px;">
                    
                </form>
            </div>
            <?php
        }
        ?>
    </div>
    </body>

</html>