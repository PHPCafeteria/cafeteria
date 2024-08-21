
<?php

error_reporting(E_ALL);
ini_set('display_errors', '1');



class ConnectionDB {
    private $DB_HOST = 'localhost';
    private $DB_USER = 'root';
    private $DB_PASSWORD = '405060';
    private $DB_DATABASE = 'cafeteria';
    private $typeSQL = 'mysql';

    public $db;

    public function Connection() {
        try {
            $dsn = $this->typeSQL . ':dbname=' . $this->DB_DATABASE . ';host=' . $this->DB_HOST . ';port=3308;';
            $this->db = new PDO($dsn, $this->DB_USER, $this->DB_PASSWORD);
            // return $this->db;
            // echo 'done';
        } catch (PDOException $e) {
            http_response_code(500);
            echo json_encode(['error' => 'Error connecting to the database: ' . $e->getMessage()]);
            exit;
        }
    }
}
?>
