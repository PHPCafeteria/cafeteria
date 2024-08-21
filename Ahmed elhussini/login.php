<?php
session_start();
require 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $Email = $_POST['Email'];
    $password = $_POST['password'];

    $stmt = $pdo->prepare('SELECT * FROM user WHERE email = ?');
    $stmt->execute([$Email]);
    $user = $stmt->fetch();

    if ($user && $user['password'] === $password) {  
        $_SESSION['Email'] = $Email;
        header("Location: welcome.html");  
        exit();
    } else {
        echo("<h1 style='color:red;'>: errro the password!</h1>");
        exit();
    }
}
?>


