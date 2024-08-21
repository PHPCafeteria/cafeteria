<?php
// login session shall be added at a login page
// session_start();

error_reporting(E_ALL); // shall be removed
ini_set('display_errors', '1');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (
        isset($_POST['userId']) && isset($_POST['price'])
        && isset($_POST['date']) && isset($_POST['totalPrice'])
    ) {

        $date = $_POST['date'];
        $notes = $_POST['notes'];
        $totalPrice = $_POST['totalPrice'];

        require('DB.php');

        $conn = new ConnectionDB;
        $conn->Connection();

        $sql = 'insert into orders (price, date, notes, totalPrice) values (?, ?, ?, ?, ?)';
        $statement = $conn->db->prepare($sql);
        if ($statement->execute([$price, $date, $notes, $totalPrice])) {
            $orderId = $conn->db->lastInsertId(); 
            $response['orderId'] = $orderId;
            $response['message'] = 'Order added successfully';
        } else {
            $response = ['Failed to add order'];
        }
        // var_dump($response);
        print_r(json_encode($response));

    } else {
        return 'Error';
    }
}

?>