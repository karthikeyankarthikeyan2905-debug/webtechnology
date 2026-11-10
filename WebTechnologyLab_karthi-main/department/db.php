<?php
$host = "sql209.infinityfree.com";
$username = "if0_43401198";
$password = "karthi2905";
$database = "if0_43401198_department_db";

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Database Connection Failed: " . $conn->connect_error);
}

?>
