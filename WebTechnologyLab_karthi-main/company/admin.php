<?php
session_start();
include 'db.php';

if($_SESSION['role']!="admin"){
header("Location:login.php");
}

$pending=$conn->query("SELECT * FROM employees
WHERE status='pending'");

$approved=$conn->query("SELECT * FROM employees
WHERE status='approved'");
?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="style.css">
</head>
<body>

<div style="padding:30px;">

<h1>Admin Dashboard</h1>

<h2>Pending Employees</h2>

<table>

<tr>
<th>Name</th>
<th>Email</th>
<th>Username</th>
<th>Action</th>
</tr>

<?php while($r=$pending->fetch_assoc()){ ?>

<tr>

<td><?= $r['name'] ?></td>

<td><?= $r['email'] ?></td>

<td><?= $r['username'] ?></td>

<td>

<a class="approve"
href="approve.php?id=<?= $r['id'] ?>">Approve</a>

<a class="reject"
href="reject.php?id=<?= $r['id'] ?>">Reject</a>

</td>

</tr>

<?php } ?>

</table>

<br>

<h2>Approved Employees</h2>

<table>

<tr>
<th>Name</th>
<th>Email</th>
<th>Username</th>
</tr>

<?php while($r=$approved->fetch_assoc()){ ?>

<tr>

<td><?= $r['name'] ?></td>

<td><?= $r['email'] ?></td>

<td><?= $r['username'] ?></td>

</tr>

<?php } ?>

</table>

</div>

</body>
</html>