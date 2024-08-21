<?php

require 'db.php';

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // $Product = $_POST['Product'];
    // $Prices = $_POST['Prices'];
    $Catagory=$_POST["Catagory"];
    // $iamges=$_POST['image'];
   




    // if (isset($_FILES['image'])) {
    //     $upload_dir = 'upload/';
    //     $uploaded_file = $upload_dir . basename($_FILES['image']['name']);
    //     move_uploaded_file($_FILES['image']['tmp_name'], $uploaded_file);
    // } else {
    //     $uploaded_file = '';
    // }

    $stmt = $pdo->prepare('INSERT INTO catogary (name) VALUES (?)');
    if ($stmt->execute([$Catagory ])) {
        // header('Location: login.html');  
        echo "welcome: done for products ";
        exit();
    } else {
        echo "Error: Unable to register the user.";
    }

}
?>