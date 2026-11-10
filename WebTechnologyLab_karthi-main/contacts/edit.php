<?php
include "db.php";

$id=$_GET['id'];

$row=$conn->query("SELECT * FROM contact WHERE id=$id")->fetch_assoc();

if(isset($_POST['update'])){

$name=$_POST['name'];
$email=$_POST['email'];
$phone=$_POST['phone'];
$address=$_POST['address'];

$conn->query("UPDATE contacts SET
name='$name',
email='$email',
phone='$phone',
address='$address'
WHERE id=$id");

header("Location:index.php");
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Edit Contact</title>
<link rel="stylesheet" href="style.css">
</head>
<body>

<div class="form-container">

<h1>Edit Contact</h1>

<form method="POST">

<label>Name</label>
<input name="name" value="<?= $row['name'] ?>">

<label>Email</label>
<input name="email" value="<?= $row['email'] ?>">

<label>Phone</label>
<input name="phone" value="<?= $row['phone'] ?>">

<label>Address</label>
<textarea name="address"><?= $row['address'] ?></textarea>

<button name="update">Update Contact</button>

</form>

</div>

</body>
</html>