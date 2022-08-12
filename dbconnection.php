<?php
$servername = "localhost";
$username = "test";
$password = "ex2022";
$db ="tv_series";

// Create connection
$connection = new mysqli($servername, $username, $password, $db);

// Check connection
if ($connection->connect_error) {
  die("Connection failed: " . $connection->connect_error);
}
//i prefer to use it in testing mode
echo "Connection test passed successfully";
?>