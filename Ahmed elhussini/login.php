<?php
session_start();
require '../DB.php'; // Include the DB connection class

// Initialize the database connection
$connection = new ConnectionDB();
$connection->Connection();
$pdo = $connection->db; // Access the database connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $Email = $_POST['Email'];
    $password = $_POST['password'];

    if ($pdo) { // Ensure that $pdo is correctly initialized
        $stmt = $pdo->prepare('SELECT * FROM user WHERE email = ?');
        $stmt->execute([$Email]);
        $user = $stmt->fetch();

        if ($user && $user['password'] === $password) {  
            $_SESSION['Email'] = $Email;
            header("Location: welcome.html");  
            exit();
        } else {
            echo("<h1 style='color:red;'>Error: Incorrect email or password!</h1>");
            exit();
        }
    } else {
        echo "<h1 style='color: red;'>Database connection failed.</h1>";
    }
}
?>
