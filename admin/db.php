<?php
$conn = new mysqli("localhost", "phpmyadmin", "Loosers@2016", "phpmyadmin");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>

