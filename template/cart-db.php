<?php
require 'connect-db.php';

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

function getCartItems($userId){
  global $db;
  $query = "WITH userCart AS(SELECT * FROM CartItem WHERE user_ID = :user_ID) SELECT size, Price, Name, pic, quantity FROM userCart NATURAL JOIN Product";

  $statement = $db->prepare($query);
  $statement->bindValue(':user_ID', $userId);
  $statement->execute();
  $result = $statement->fetchAll();
  $statement->closeCursor();

  return $result;
}

function updateCartItemQuantity($userId, $productId, $quantity){
  global $db;
  $query = "UPDATE CartItem SET quantity = :quantity WHERE user_ID = :user_ID AND product_ID = :product_ID";
  
  $statement = $db->prepare($query);
  $statement->bindValue(':quantity', $quantity);
  $statement->bindValue(':user_ID', $userId);
  $statement->bindValue(':product_ID', $productId);
  $statement->execute();
  $result = $statement->fetch();
  $statement->closeCursor();

  return $result;
}

//unfinished code 
// function deleteCartItem(){
//   global $db;
//   $query = "DELETE FROM CartItem WHERE user_ID = :user_ID AND product_ID = :product_ID"
// }

?>
