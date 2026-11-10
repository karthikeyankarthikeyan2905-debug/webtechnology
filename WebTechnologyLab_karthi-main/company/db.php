<?php
$conn = new mysqli("localhost","root","","aurora_company");

if($conn->connect_error){
    die("Connection Failed");
}
?>