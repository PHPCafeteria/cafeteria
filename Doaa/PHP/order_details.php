<?php
// login session shall be added at user login page
// session_start();

error_reporting(E_ALL); // shall be removed
ini_set('display_errors', '1');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Validate input
    if (isset($_GET['id']) && is_numeric($_GET['id'])) {
        $userId = intval($_GET['id']);  // ask ahmed, gad about id of user

        require('DB.php');

        $conn = new ConnectionDB;
        $conn->Connection(); 

        $sql = 'select orders.* from orders, user where user.id = ? and orders.date between ? and ?';
        $statement = $conn->db->prepare($sql);
        $statement->execute([$userId, $_GET['startDate'], $_GET['endDate']]);
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);

        // echo '<br>'; // shall be removed
        // print_r($result);

    }
}

?>