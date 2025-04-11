<?php
require 'vendor/autoload.php';

$client = new MongoDB\Client("mongodb://localhost:27017");

$collection = $client->testdb->users;

$insertResults = $collection->insertOne(['name' => 'Lul Brabo', 'email'=>'lul@mail.com']);
echo "Inserted with ObjectID '{$insertResults->getInsertedId()}'<br>";

$result = $collection->findOne(['name'=>'Lul Brabo']);
echo "Found: " . json_encode($result) . "<br>";
?>
