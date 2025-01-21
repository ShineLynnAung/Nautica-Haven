<?php
$server_name   = "localhost";
$user_name     = "root";
$password      = "";
$database_name = "resort";

// Create a new mysqli connection
$conn = new mysqli($server_name, $user_name, $password, $database_name);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>