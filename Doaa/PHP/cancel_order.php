<?php
// login session shall be added at user login page
// session_start();

error_reporting(E_ALL); // shall be removed
ini_set('display_errors', '1');

if ($_SERVER['REQUEST_METHOD'] == 'GET') {

    // Validate user autorization
    if (isset($_GET['userId'])) {
        $userId = intval($_GET['userId']);  // ask ahmed, gad about id of user

        if (isset($_GET['orderId'])) {
            $orderId = intval($_GET['orderId']);

            require('DB.php');

            $conn = new ConnectionDB;
            $conn->Connection();
            $sql = "update orders set action = 1 where orders.idOrder = ?";
            $statement = $conn->db->prepare($sql);
            if ($statement->execute([$orderId])) {
                $response = ['Cancelled successfully'];
            } else {
                $response = ['Failed to cancel'];
            }
            // var_dump($response);
            echo json_encode($response);
        } else {
            return 'Order id is not found.';
        }
    } else {
        return 'You must login first.';
    }
}

?>