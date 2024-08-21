<?php

header('Content-Type: application/json');
error_reporting(E_ALL);
ini_set('display_errors', '1');
require('../../DB.php');

$n = new ConnectionDB;
$n->Connection();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Decode the incoming JSON data
    $input = json_decode(file_get_contents('php://input'), true);

    // Check if 'id' exists in the decoded JSON
    if (isset($input['id'])) {
        $userId = $input['id'];
        
        $sql = 'SELECT 
                p.idProduct, 
                p.name, 
                p.price, 
                p.picture, 
                op.numOfProduct 
            FROM 
                orderProduct op 
            JOIN 
                product p ON op.idProduct = p.idProduct 
            WHERE 
                op.idOrder = (
                    SELECT idOrder 
                    FROM orders 
                    WHERE idOrder IN (
                        SELECT idOrder 
                        FROM userOrder 
                        WHERE idUser = ?
                    ) 
                    ORDER BY date DESC 
                    LIMIT 1
            );';
        $statement = $n->db->prepare($sql);
        $statement->execute([$userId]);
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);

        // Return the result as JSON
        echo json_encode($result);
    } else {
        echo json_encode(['error' => 'User ID not provided']);
    }
}
?>
