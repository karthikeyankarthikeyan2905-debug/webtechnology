<?php
$host = "sql209.infinityfree.com";
$username = "if0_43401198";
$password = "karthi2905";
$database = "if0_43401198_employee_db";
$conn = new mysqli("localhost","root","","aurora_company");

if($conn->connect_error){
    die("Connection Failed");
}
?>
