<?php

include "db.php";

$message = "";
$message_type = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = trim($_POST["name"]);
    $email = trim($_POST["email"]);
    $username = trim($_POST["username"]);
    $password = $_POST["password"];
    $confirm_password = $_POST["confirm_password"];


    if (
        empty($name) ||
        empty($email) ||
        empty($username) ||
        empty($password) ||
        empty($confirm_password)
    ) {

        $message = "Please fill all fields.";
        $message_type = "error";

    } elseif ($password !== $confirm_password) {

        $message = "Passwords do not match.";
        $message_type = "error";

    } else {

        $check = $conn->prepare(
            "SELECT id FROM users WHERE email = ? OR username = ?"
        );

        $check->bind_param(
            "ss",
            $email,
            $username
        );

        $check->execute();

        $result = $check->get_result();


        if ($result->num_rows > 0) {

            $message = "Email or username already exists.";
            $message_type = "error";

        } else {

            $hashed_password =
                password_hash(
                    $password,
                    PASSWORD_DEFAULT
                );


            $sql = $conn->prepare(
                "INSERT INTO users
                (name, email, username, password)
                VALUES (?, ?, ?, ?)"
            );

            $sql->bind_param(
                "ssss",
                $name,
                $email,
                $username,
                $hashed_password
            );


            if ($sql->execute()) {

                $message =
                    "Registration successful! You can login now.";

                $message_type = "success";

            } else {

                $message =
                    "Registration failed.";

                $message_type = "error";
            }

        }

    }
}

?>

<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>DeptHub | Register</title>

    <link
        rel="stylesheet"
        href="style.css"
    >

</head>


<body>


<div class="form-page">

    <div class="form-container">

        <h2>Create Account</h2>

        <p class="form-subtitle">
            Join our department community
        </p>


        <?php if (!empty($message)): ?>

            <div class="<?php echo $message_type; ?>">

                <?php echo $message; ?>

            </div>

        <?php endif; ?>


        <form
            method="POST"
            action=""
            onsubmit="return validateRegistration()"
        >


            <div class="form-group">

                <label>Name</label>

                <input
                    type="text"
                    name="name"
                    id="name"
                    placeholder="Enter your name"
                >

            </div>


            <div class="form-group">

                <label>Email</label>

                <input
                    type="email"
                    name="email"
                    id="email"
                    placeholder="Enter your email"
                >

            </div>


            <div class="form-group">

                <label>Username</label>

                <input
                    type="text"
                    name="username"
                    id="username"
                    placeholder="Create username"
                >

            </div>


            <div class="form-group">

                <label>Password</label>

                <input
                    type="password"
                    name="password"
                    id="password"
                    placeholder="Create password"
                >

            </div>


            <div class="form-group">

                <label>Confirm Password</label>

                <input
                    type="password"
                    name="confirm_password"
                    id="confirm_password"
                    placeholder="Confirm password"
                >

            </div>


            <button
                type="submit"
                class="form-button"
            >
                Register
            </button>


        </form>


        <div class="form-link">

            Already have an account?

            <a href="login.php">
                Login
            </a>

        </div>


        <div class="form-link">

            <a href="index.php">
                ← Back to Home
            </a>

        </div>


    </div>

</div>


<script src="js/script.js"></script>

</body>

</html>