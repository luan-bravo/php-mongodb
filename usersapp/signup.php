<?php
require 'vendor/autoload.php';
try {
    $client = new MongoDB\Client("mongodb://localhost:27017");
    $users = $client->usersapp->users;
} catch (Exception $e) {
    die("MongoDB connection failed: " . $e->getMessage());
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $user = $users->findOne(['email'=>$email]);
    if ($user) {
        echo "User with email {$email} already exists";
    } else {
        $users->insertOne(['email'=>$email, 'password'=>$password]);
        echo "Sign up {$email}";
    }
}
?>
<form method="POST">
    Email: <input name="email" type="email" required><br>
    Password: <input name="password" type="password" required><br>
    <button type="submit">Sign Up</button>
</form>
