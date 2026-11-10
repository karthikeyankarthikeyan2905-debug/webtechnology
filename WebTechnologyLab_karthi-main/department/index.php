<?php
include "db.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>DeptHub | Home</title>

    <link rel="stylesheet" href="style.css">
</head>

<body>

<header class="navbar">

    <div class="logo">
        ✦ DeptHub
    </div>

    <nav>
        <a href="index.php" class="active">Home</a>
        <a href="about.php">About Us</a>
        <a href="login.php">Login</a>
        <a href="register.php" class="nav-register">Register</a>
    </nav>

</header>


<section class="hero">

    <div class="hero-content">

        <p class="small-title">WELCOME TO DEPT HUB</p>

        <h1>
            Learn.
            <span>Connect.</span>
            Grow.
        </h1>

        <p>
            Explore our departments, discover new opportunities
            and become part of our learning community.
        </p>

        <div class="hero-buttons">

            <a href="register.php" class="btn primary-btn">
                Get Started
            </a>

            <a href="about.php" class="btn secondary-btn">
                Learn More
            </a>

        </div>

    </div>

</section>


<section class="department-section">

    <div class="section-title">

        <p>EXPLORE</p>

        <h2>Our Departments</h2>

        <span>
            Discover knowledge across different fields.
        </span>

    </div>


    <div class="department-container">


        <div class="department-card">

            <div class="department-icon">
                💻
            </div>

            <h3>Computer Science</h3>

            <p>
                Learn programming, software development,
                databases, artificial intelligence and modern technology.
            </p>

        </div>


        <div class="department-card">

            <div class="department-icon">
                📊
            </div>

            <h3>Commerce</h3>

            <p>
                Explore accounting, finance, business management
                and entrepreneurship.
            </p>

        </div>


        <div class="department-card">

            <div class="department-icon">
                📐
            </div>

            <h3>Mathematics</h3>

            <p>
                Develop mathematical thinking, analytical skills
                and problem-solving abilities.
            </p>

        </div>


        <div class="department-card">

            <div class="department-icon">
                📚
            </div>

            <h3>English</h3>

            <p>
                Improve communication, literature, writing
                and professional language skills.
            </p>

        </div>

    </div>

</section>


<section class="features">

    <div class="feature">

        <h3>🎓 Quality Learning</h3>

        <p>
            Build your knowledge with structured learning.
        </p>

    </div>


    <div class="feature">

        <h3>🚀 Future Ready</h3>

        <p>
            Develop skills for your future career.
        </p>

    </div>


    <div class="feature">

        <h3>🤝 Community</h3>

        <p>
            Connect with students and educators.
        </p>

    </div>

</section>


<footer>

    <p>
        © 2026 DeptHub. All Rights Reserved.
    </p>

</footer>


<script src="js/script.js"></script>

</body>
</html>