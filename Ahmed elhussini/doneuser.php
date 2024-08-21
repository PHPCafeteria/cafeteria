<?php

require '../DB.php'; // Include the DB connection class

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);




if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $password=$_POST['password'];
    $Room_No=$_POST['Room_No'];
    $Ext=$_POST['Ext'];
    $Confirm_Password=$_POST['Confirm_Password'];
   


    if ($password!==  $Confirm_Password) {
       ECHO" <h1 style='color :red;'>password is not matching  pls aging regsisterion !</h1>";
       exit();
     }
     else {
        echo "<h1 style='color :blue;'>password is success : </h1>";
        // echo"location :adduser.html";
      
   


    if (isset($_FILES['image'])) {
        $upload_dir = 'uploads/';
        $uploaded_file = $upload_dir . basename($_FILES['image']['name']);
        move_uploaded_file($_FILES['image']['tmp_name'], $uploaded_file);
    } else {
        $uploaded_file = '';
    }

    $stmt = $pdo->prepare('INSERT INTO user (name, email, password, roomNo, picture) VALUES ( ?, ?, ?, ?, ?)');
    if ($stmt->execute([$fullname, $email, $password, $Room_No, $uploaded_file ])) {
        // header('Location: login.html');  
        echo "welcome: done for register the user.";
        exit();
    } else {
        echo "Error: Unable to register the user.";
    }

}
}
?>
