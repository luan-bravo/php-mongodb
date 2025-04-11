<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>UsersApp Home</title>
    <style>
        body {
            font-family: sans-serif;
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 8px;
            background-color: #f9f9f9;
        }
        a {
            margin-right: 15px;
            text-decoration: none;
            color: #0077cc;
        }
        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <h1>Welcome to UsersApp</h1>

    <?php if (isset($_SESSION['user'])): ?>
        <p>Hello, <strong><?= htmlspecialchars($_SESSION['user']) ?></strong>! You're logged in.</p>
        <p>
            <a href="dashboard.php">Go to Dashboard</a>
            <a href="logout.php">Logout</a>
        </p>
    <?php else: ?>
        <p>You are not logged in.</p>
        <p>
            <a href="login.php">Login</a>
            <a href="signup.php">Sign Up</a>
        </p>
    <?php endif; ?>
</body>
</html>

