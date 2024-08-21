<?php

$host = 'localhost';
$db = 'cafeteria';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";

try {
    $pdo = new PDO($dsn, $user, $pass);
    echo "you are connect it database ";
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}
?>

