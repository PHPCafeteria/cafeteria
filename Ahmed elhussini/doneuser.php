<?php

require '../DB.php'; // Include the DB connection class

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

// Initialize the database connection
$connection = new ConnectionDB();
$connection->Connection();
$pdo = $connection->db; // Access the database connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $Room_No = $_POST['Room_No'];
    $Ext = $_POST['Ext'];
    $Confirm_Password = $_POST['Confirm_Password'];

    if ($password !== $Confirm_Password) {
        echo "<h1 style='color: red;'>Password does not match, please try again!</h1>";
        exit();
    }

    // Handle image upload
    if (isset($_FILES['image']) && $_FILES['image']['error'] == UPLOAD_ERR_OK) {
        $upload_dir = __DIR__ . '/../image/user/'; // Correct path to the 'user' directory
        if (!is_dir($upload_dir)) {
            mkdir($upload_dir, 0755, true); // Create directory if it doesn't exist
        }
        $uploaded_file = $upload_dir . basename($_FILES['image']['name']);

        if (move_uploaded_file($_FILES['image']['tmp_name'], $uploaded_file)) {
            $imageName = basename($_FILES['image']['name']);
        } else {
            echo "<h1 style='color: red;'>Failed to upload the profile picture. Path: $uploaded_file</h1>";
            exit();
        }
    } else {
        $imageName = '';
    }

    // Ensure that $pdo is correctly initialized
    if ($pdo) {
        $stmt = $pdo->prepare('INSERT INTO user (name, email, password, roomNo, picture) VALUES (?, ?, ?, ?, ?)');
        if ($stmt->execute([$fullname, $email, $password, $Room_No, $imageName])) {
            echo "<h1>Welcome: Registration successful.</h1>";
        } else {
            echo "<h1 style='color: red;'>Error: Unable to register the user.</h1>";
        }
    } else {
        echo "<h1 style='color: red;'>Database connection failed.</h1>";
    }
}
?>
