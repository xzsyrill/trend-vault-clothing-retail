<?php

if ($_SERVER['SERVER_NAME'] === 'localhost') {
    $host = "localhost";
    $user = "root";
    $password = "";
    $dbname = "clothing-retail-db";
} else {
    $host = "sql202.infinityfree.com";
    $user = "if0_42055923";
    $password = "YOUR_PASSWORD";
    $dbname = "if0_42055923_trendvault";
}

$conn = new mysqli($host, $user, $password, $dbname);

if ($conn->connect_error) {
    die("Database Connection Failed: " . $conn->connect_error);
}
?>