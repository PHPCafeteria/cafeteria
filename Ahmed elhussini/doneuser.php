<?php

require 'db.php';

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirm-password'];
    $Room_No = $_POST['Room_No'];
    $Ext = $_POST['Ext'];

    // Check if passwords match
    if ($password !== $confirmPassword) {
        echo "<h1 style='color :red;'>Passwords do not match. Please try again!</h1>";
        exit();
    } else {
        // Passwords match, process the registration
        if (isset($_FILES['image']) && $_FILES['image']['error'] == UPLOAD_ERR_OK) {
            $upload_dir = 'uploads/';
            $uploaded_file = $upload_dir . basename($_FILES['image']['name']);
            move_uploaded_file($_FILES['image']['tmp_name'], $uploaded_file);
        } else {
            $uploaded_file = '';
        }

        $stmt = $pdo->prepare('INSERT INTO user (name, email, password, roomNo, picture) VALUES (?, ?, ?, ?, ?)');
        if ($stmt->execute([$fullname, $email, $password, $Room_No, $uploaded_file])) {
            echo "<h1 style='color :blue;'>Registration successful!</h1>";
            // Redirect or further actions
        } else {
            echo "<h1 style='color :red;'>Error: Unable to register the user.</h1>";
        }
    }
}
?>
