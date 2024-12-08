<?php
// db_connect.php

$servername = "localhost";  // MySQL server address
$username = "root";         // MySQL username
$password = "";             // MySQL password
$dbname = "linkedcafe_db";  // Database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
