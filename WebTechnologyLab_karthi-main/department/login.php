<?php

session_start();

include "db.php";

$message = "";
$message_type = "";


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = trim($_POST["username"]);
    $password = $_POST["password"];


    if (empty($username) || empty($password)) {

        $message = "Please enter username and password.";
        $message_type = "error";

    } else {

        $sql = $conn->prepare(
            "SELECT id, name, username, password
             FROM users
             WHERE username = ?"
        );

        $sql->bind_param(
            "s",
            $username
        );

        $sql->execute();

        $result = $sql->get_result();


        if ($result->num_rows == 1) {

            $user = $result->fetch_assoc();


            if (
                password_verify(
                    $password,
                    $user["password"]
                )
            ) {

                $_SESSION["user_id"] =
                    $user["id"];

                $_SESSION["name"] =
                    $user["name"];

                $_SESSION["username"] =
                    $user["username"];


                header(
                    "Location: dashboard.php"
                );

                exit();

            } else {

                $message =
                    "Invalid username or password.";

                $message_type = "error";
            }

        } else {

            $message =
                "Invalid username or password.";

            $message_type = "error";
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

    <title>DeptHub | Login</title>

    <link
        rel="stylesheet"
        href="style.css"
    >

</head>


<body>


<div class="form-page">

    <div class="form-container">

        <h2>Welcome Back</h2>

        <p class="form-subtitle">
            Login to your DeptHub account
        </p>


        <?php if (!empty($message)): ?>

            <div class="<?php echo $message_type; ?>">

                <?php echo $message; ?>

            </div>

        <?php endif; ?>


        <form
            method="POST"
            action=""
        >


            <div class="form-group">

                <label>Username</label>

                <input
                    type="text"
                    name="username"
                    placeholder="Enter username"
                >

            </div>


            <div class="form-group">

                <label>Password</label>

                <input
                    type="password"
                    name="password"
                    placeholder="Enter password"
                >

            </div>


            <button
                type="submit"
                class="form-button"
            >
                Login
            </button>


        </form>


        <div class="form-link">

            Don't have an account?

            <a href="register.php">
                Register
            </a>

        </div>


        <div class="form-link">

            <a href="index.php">
                ← Back to Home
            </a>

        </div>


    </div>

</div>


</body>

</html>