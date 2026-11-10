<?php
session_start();
include 'db.php';

$msg="";

if(isset($_POST['login'])){

$user=$_POST['username'];
$pass=$_POST['password'];

$a=$conn->query("SELECT * FROM admins
WHERE username='$user' AND password='$pass'");

if($a->num_rows>0){

$_SESSION['role']="admin";
$_SESSION['admin']=$user;

header("Location: admin.php");

}else{

$e=$conn->query("SELECT * FROM employees
WHERE username='$user'
AND password='$pass'");

if($e->num_rows>0){

$row=$e->fetch_assoc();

if($row['status']=="approved"){

$_SESSION['role']="employee";
$_SESSION['name']=$row['name'];

header("Location:index.php");

}elseif($row['status']=="pending"){
$msg="Waiting for Admin Approval";
}else{
$msg="Registration Rejected";
}

}else{
$msg="Invalid Login";
}

}

}
?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="style.css">
</head>
<body>

<div class="form-box">

<h2>Login</h2>

<p style="color:red;"><?php echo $msg; ?></p>

<form method="POST">

<input name="username" placeholder="Username">

<input name="password" type="password" placeholder="Password">

<button name="login">Login</button>

</form>

</div>

</body>
</html>