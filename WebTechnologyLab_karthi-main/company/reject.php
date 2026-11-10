<?php
include 'db.php';

$id=$_GET['id'];

$conn->query("UPDATE employees
SET status='rejected'
WHERE id=$id");

header("Location:admin.php");
?>