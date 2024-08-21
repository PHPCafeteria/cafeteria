<?php
// session_start();

error_reporting(E_ALL); // Remove this line in production
ini_set('display_errors', '1'); // Remove this line in production
header('Content-Type: application/json');
// echo 'gad';

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (isset($_GET['userId'])) {
        if (isset($_GET['startDate']) && isset($_GET['endDate'])) {
            $userId = intval($_GET['userId']);
            require('../../DB.php');
            $conn = new ConnectionDB;
            $conn->Connection(); 
            
            $sql = 'SELECT orders.* FROM orders 
                    JOIN user ON user.id = ? 
                    WHERE orders.date BETWEEN ? AND ? AND orders.action = 1';
            $statement = $conn->db->prepare($sql);
            $statement->execute([$userId, $_GET['startDate'], $_GET['endDate']]);
            $result = $statement->fetchAll(PDO::FETCH_ASSOC);
            
            echo json_encode($result);
        } else {
            echo json_encode(['error' => 'Pick valid dates, please.']);
        }
    } else {
        echo json_encode(['error' => 'You must login first.']);
    }
} else {
    echo json_encode(['error' => 'Invalid request method.']);
}
?>
