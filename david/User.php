<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');

// header('Content-Type: application/json');
// header('Access-Control-Allow-Origin: *'); // Allows requests from any origin
// header('Access-Control-Allow-Methods: GET, POST, OPTIONS'); // Allows specific HTTP methods
// header('Access-Control-Allow-Headers: Content-Type'); // Allows specific headers

require_once('../userClass.php');

// Check if 'type' parameter is set in the URL
if (isset($_GET['type'])) {
    $type = $_GET['type'];

    if ($type == 'users') {
        // Fetch users
        $obj = new User;
        echo $obj->fetchUsers();

    }else {

        // Handle invalid 'type' parameter
        http_response_code(400);
        echo json_encode(['error' => 'Invalid type parameter']);
    }
} else {
    // Handle missing 'type' parameter
    http_response_code(400);
    echo json_encode(['error' => 'Type parameter is required']);
}
?>
