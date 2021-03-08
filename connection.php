<?php

$connParameters = array(
    'host' => 'localhost',
    'username' => 'root',
    'password' => 'root',
    'db' => 'corso_php'
);

$conn = new mysqli($connParameters['host'], $connParameters['username'], $connParameters['password'], $connParameters['db']);
if($conn->connect_errno) {
    echo "<pre>"; print_r($connParameters);
    die("Error on connect: {$conn->connect_errno}");
} else {
    return $conn;
}