<?php
require 'vendor/autoload.php';
$client = new MongoDB/Client("mongodb://localhost:27017");
$users = $client->usersapp->users;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], password_default);

    $exists = $users->findOne(['email'=>$email]);
    if ($exists) {
        echo "{$email} already exists";
    } else {
        $users->insertOne(['email'=>$email, 'password'=>$password]);
        echo "Sign up {$email}"
    }
}
?>

<form mothod="POST">
    Email: <input name="email" type="email" required><br>
    Password: <input name="password" type="password" required><br>
    <button type="submit">Sign Up</button>
</form>
