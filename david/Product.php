<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type');

require_once('../productClass.php');

if (isset($_GET['type'])) {
    $type = $_GET['type'];
    
    if ($type === 'products') {
        $product = new Product();
        echo $product->fetchProducts();
    } elseif ($type === 'delete' && $_SERVER['REQUEST_METHOD'] === 'POST') {
        $data = json_decode(file_get_contents("php://input"), true);
        if (isset($data['id'])) {
            $product = new Product();
            $product->delete($data['id']);
            echo json_encode(['status' => 'success']);
        } else {
            http_response_code(400);
            echo json_encode(['error' => 'Product ID is required']);
        }
    } else {
        http_response_code(400);
        echo json_encode(['error' => 'Invalid type parameter']);
    }
} else {
    http_response_code(400);
    echo json_encode(['error' => 'Type parameter is required']);
}
?>
