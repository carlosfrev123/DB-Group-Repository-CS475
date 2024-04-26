<?php

require_once __DIR__ . '/../.env';

$username = getenv('username');
$password = getenv('password');
$host = getenv('host');
$dbname = getenv('dbname');
$dsn = "mysql:host=$host;dbname=$dbname";

////////////////////////////////////////////

/** connect to the database **/
try 
{
   $db = new PDO($dsn, $username, $password);
   
   // display a message to let us know that we are connected to the database 
   // echo "<p>You are connected to the database -- host=$host</p>";
}
catch (PDOException $e)     // handle a PDO exception (errors thrown by the PDO library)
{
   $error_message = $e->getMessage();        
   echo "<p>An error occurred while connecting to the database: $error_message </p>";
}
catch (Exception $e)       // handle any type of exception
{
   $error_message = $e->getMessage();
   echo "<p>Error message: $error_message </p>";
}

?>