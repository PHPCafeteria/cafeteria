<?php

error_reporting(E_ALL);
ini_set('display_errors', '1');

class ConnectionDB {
    private $DB_HOST = 'localhost';
    private $DB_USER = 'root';
    private $DB_PASSWORD = 'D@vid11233455';
    private $DB_DATABASE = 'cafeteria';
    private $typeSQL = 'mysql';
    public $db;

    public function Connection() {
        try {
            $dsn = $this->typeSQL . ':dbname=' . $this->DB_DATABASE . ';host=' . $this->DB_HOST . ';port=3308;';
            $this->db = new PDO($dsn, $this->DB_USER, $this->DB_PASSWORD);
        } catch (PDOException $e) {
            http_response_code(500);
            echo json_encode(['error' => 'Error connecting to the database: ' . $e->getMessage()]);
            exit;
            // echo 'connect done';
        }
        // catch(PDOException $e){
        //     echo 'connect failed '.$e->getMessage();
        // }
    }

    public function fetchProducts() {
        $stmt = $this->db->prepare('SELECT name, price, picture FROM product');
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function fetchUsers() {
        $stmt = $this->db->prepare('SELECT name, roomNo, picture FROM user');
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}

$n = new ConnectionDB;
$n->Connection();

if (isset($_GET['type'])) {
    switch ($_GET['type']) {
        case 'products':
            $products = $n->fetchProducts();
            http_response_code(200);
            header('Content-Type: application/json');
            echo json_encode($products);
            break;
        case 'users':
            $users = $n->fetchUsers();
            http_response_code(200);
            header('Content-Type: application/json');
            echo json_encode($users);
            break;
        default:
            http_response_code(400);
            echo json_encode(['error' => 'Invalid type parameter']);
            break;
    }
} else {
    http_response_code(400);
    echo json_encode(['error' => 'Missing type parameter']);
}
?>