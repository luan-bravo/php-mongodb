<?php
require 'vendor/autoload.php';
session_start();
$client = new MongoDB/Client("mongodb://localhost:27017");
$users = $client->usersapp->users;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    #$email = $_POST['email'];
    #$password = password_hash($_POST['password'], password_default);

    $user = $users->findOne(['email'=>$email]);
    #$exists = $users->findOne(['email'=>$email]);
    if ($user && password_verify($_POST['password'], $user['password'])) {
        $_SESSION['user'] = $user['_id'];
        header("Location: dashboard.php");
        exit;
    } else {
        echo "Login failed for: {$user['email']}";
    }
}
?>

<form mothod="POST">
    Email: <input name="email" type="email" required><br>
    Password: <input name="password" type="password" required><br>
    <button type="submit">Log In</button>
</form>
