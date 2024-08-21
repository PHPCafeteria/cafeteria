<?php
header('Content-Type: application/json');
error_reporting(E_ALL);
ini_set('display_errors', '1');
require('../../DB.php');

$n = new ConnectionDB;
$n->Connection();
// echo 'dived';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $input = json_decode(file_get_contents('php://input'), true);

    if (isset($input['userName'], $input['totalPrice'], $input['products'], $input['userId'])) {
        try {

            $n->db->beginTransaction();

            $sqlOrder = "INSERT INTO orders (date, notes, status, totalPrice, action) VALUES (CURRENT_TIMESTAMP, ?, 'Processing', ?, 1)";
            $stmtOrder = $n->db->prepare($sqlOrder);
            $stmtOrder->execute([$input['note'], $input['totalPrice']]);
            $orderId = $n->db->lastInsertId();

            $sqlOrderProduct = "INSERT INTO orderProduct (idOrder, idProduct, numOfProduct) VALUES (?, ?, ?)";
            $stmtOrderProduct = $n->db->prepare($sqlOrderProduct);
            foreach ($input['products'] as $product) {
                // print_r($product);
                $stmtOrderProduct->execute([$orderId, $product['name'], $product['num']]);
            }

            $sqlUserOrder = "INSERT INTO userOrder (idUser, idOrder) VALUES (?, ?)";
            $stmtUserOrder = $n->db->prepare($sqlUserOrder);
            $stmtUserOrder->execute([$input['userId'], $orderId]);

            $n->db->commit();
            echo json_encode(['success' => true, 'message' => 'Order placed successfully.']);
        } catch (Exception $e) {
            $n->db->rollBack();
            echo json_encode(['success' => false, 'message' => 'Failed to place order: ' . $e->getMessage()]);
        }
    } else {
        echo json_encode(['error' => 'Invalid input data']);
    }
} else {
    echo json_encode(['error' => 'Invalid request method']);
}
?>
