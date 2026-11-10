<?php
include 'db.php';

$msg="";

if(isset($_POST['register'])){

$name=$_POST['name'];
$email=$_POST['email'];
$user=$_POST['username'];
$pass=$_POST['password'];

$conn->query("INSERT INTO employees(name,email,username,password)
VALUES('$name','$email','$user','$pass')");

$msg="Registration Successful! Waiting for Admin Approval.";
}
?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="style.css">
</head>
<body>

<div class="form-box">

<h2>Employee Register</h2>

<p style="color:green;"><?php echo $msg; ?></p>

<form method="POST">

<input name="name" placeholder="Full Name" required>

<input name="email" type="email" placeholder="Email" required>

<input name="username" placeholder="Username" required>

<input name="password" id="pass" type="password" placeholder="Password" required>

<button name="register">Register</button>

</form>

</div>

<script>
document.querySelector("form").onsubmit=function(){

let p=document.getElementById("pass").value;

if(p.length<4){
alert("Minimum 4 characters");
return false;
}

}
</script>

</body>
</html>