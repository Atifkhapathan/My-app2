<?php

// Define database credentials
$db_host = "localhost";
$db_user = "root";
$db_password = "";
$db_name = "ppg";

// Create connection
try {
  $conn = new mysqli($db_host, $db_user, $db_password, $db_name);
  // Set character encoding to UTF-8
  $conn->set_charset("utf8mb4");
} catch(mysqli_sql_exception $e) {
  echo "Error connecting to database: " . $e->getMessage();
  exit;
}

// Make the connection available globally if needed
$GLOBALS['conn'] = $conn;

?>
