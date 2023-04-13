<?php
$conn = new mysqli("localhost", "u_name", "pssd", "db");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>

