<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit;
}
echo "Welcome! user: {$_SESSION['user']}";
?>

<a href='logout.php'>Log out</a>
