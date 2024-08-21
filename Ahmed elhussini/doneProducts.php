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
    // Retrieve product details from the form
    $Product = $_POST['Product'];
    $Prices = $_POST['Prices'];
    // $iamges=$_POST['image'];
   




    if (isset($_FILES['image'])) {
        $upload_dir = 'upload/';
        $uploaded_file = $upload_dir . basename($_FILES['image']['name']);
        
        // Attempt to move the uploaded file
        if (move_uploaded_file($_FILES['image']['tmp_name'], $uploaded_file)) {
            $imageName = basename($_FILES['image']['name']);
        } else {
            die("<h1 style='color: red;'>Failed to upload the product picture. Path: $uploaded_file</h1>");
        }
    } else {
        $imageName = ''; // Default to an empty string if no image is uploaded
    }

    // Ensure that $pdo is correctly initialized
    if ($pdo) {
        // Prepare the SQL statement to insert product data
        $stmt = $pdo->prepare('INSERT INTO product (name, price, picture) VALUES (?, ?, ?)');
        if ($stmt->execute([$Product, $Prices, $imageName])) {
            echo "<h1>Product added successfully.</h1>";
        } else {
            echo "<h1 style='color: red;'>Error: Unable to add the product.</h1>";
        }
    } else {
        echo "<h1 style='color: red;'>Database connection failed.</h1>";
    }
}
?>
