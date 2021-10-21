<?php

$hostname = 'localhost';
$database = 'php_crud_structured';
$user = 'root';
$pass = '';

$connection;

try {
    $connection = new PDO("mysql:host=$hostname;dbname=$database", $user, $pass);
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {

    echo "Deu tiuti";
}
