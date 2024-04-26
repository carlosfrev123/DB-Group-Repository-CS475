<?php

require 'connect-db.php'; 
if (isset($_GET['size']) && isset($_GET['Name'])) {
    $size = $_GET['size'];
    $name = $_GET['Name'];

    // Call function to get price
    $result = updatePrice($size, $name);
    echo htmlspecialchars($result['Price']); // Price output
}

if (isset($_GET['quantity']) && isset($_GET['user_ID']) && isset($_GET['product_ID'])) {
    echo "Line 13 ";
    $product_ID = $_GET['product_ID'];
    $quantity = $_GET['quantity'];
    $user_ID = $_GET['user_ID'];
    
    
    $result = InsertToCart($product_ID, $user_ID, $quantity);
   
}

echo "Product ID: " . $_GET['product_ID'] . "<br>";
echo "Quantity: " . $_GET['quantity'] . "<br>";
echo "User ID: " . $_GET['user_ID'] . "<br>";


// get Products query
function getAvailableProducts($db) {
    global $db;
    $query = "SELECT product_ID, Name, Price, size FROM Product WHERE stock > 0 GROUP BY Name";
    
    $statement = $db->prepare($query);
    $statement->execute();
    $result = $statement->fetchAll();
    $statement->closeCursor();

    return $result;
}

function updatePrice($displayedSize, $displayedName) {
    global $db;
    $query = "SELECT Price FROM Product WHERE Name = :displayedName AND size = :displayedSize";

    $statement = $db->prepare($query);
    $statement->bindValue(':displayedName', $displayedName);
    $statement->bindValue(':displayedSize', $displayedSize);
    $statement->execute();
    $result = $statement->fetch();  
    $statement->closeCursor();  

    return $result;
}


function getUserId($email){
    global $db;

    $query = "SELECT user_ID FROM UserInfo WHERE email = :email";
    
    $statement = $db->prepare($query);
    $statement->bindValue(':email', $email);
    $statement->execute();
    $result = $statement->fetch();
    $statement->closeCursor();

    return $result['user_ID'];   
}




function InsertToCart($product_ID, $user_ID, $quantity){
    global $db;
   
    $query = "INSERT INTO CartItem (product_ID, user_ID, quantity) VALUES (:product_ID, :user_ID, :quantity)";
    
    $statement = $db->prepare($query);
    $statement->bindValue(':product_ID', $product_ID);
    $statement->bindValue(':user_ID', $user_ID);
    $statement->bindValue(':quantity', $quantity);
    $success = $statement->execute();
    $statement->closeCursor();


}

?>
