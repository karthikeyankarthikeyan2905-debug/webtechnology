<?php
include "db.php";

if(isset($_POST['save'])){

$name=$_POST['name'];
$email=$_POST['email'];
$phone=$_POST['phone'];
$address=$_POST['address'];

$conn->query("INSERT INTO contact(name,email,phone,address)
VALUES('$name','$email','$phone','$address')");

header("Location:index.php");
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Add Contact</title>
<link rel="stylesheet" href="style.css">
</head>
<body>

<div class="form-container">

<h1>Add Contact</h1>

<form method="POST">

<label>Name</label>
<input name="name" required>

<label>Email</label>
<input type="email" name="email" required>

<label>Phone</label>
<input name="phone" id="phone" required>

<label>Address</label>
<textarea name="address"></textarea>

<button name="save">Save Contact</button>

</form>

</div>

<script src="script.js"></script>

</body>
</html>