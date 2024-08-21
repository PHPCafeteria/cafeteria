<?php

error_reporting(E_ALL);
ini_set('display_errors', '1');

require('../DB.php');

class User {
    private $name, $email, $password, $roomNo, $picture;

    function __construct($name="", $email="", $password="", $roomNo=0, $picture="") {
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
        $this->roomNo = $roomNo;
        $this->picture = $picture;
    }


    public function insert() {
        $n = new ConnectionDB;
        echo $n->Connection();
        $sql = 'INSERT INTO user (name, email, password, roomNo, picture) VALUES (?, ?, ?, ?, ?)';
        $status = $n->db->prepare($sql);
        $status->execute([$this->name, $this->email, $this->password, $this->roomNo, $this->picture]);
        echo '<br>';
        print_r($status->fetchAll(PDO::FETCH_ASSOC));
    }

 

    public function delete($id) {
        $n = new ConnectionDB;
        echo $n->Connection();
        $sql = 'DELETE FROM user WHERE id=?';
        $status = $n->db->prepare($sql);
        $result = $status->execute([$id]);

        if ($result) {
            echo json_encode(['status' => 'success']);
        } else {
            http_response_code(500);
            echo json_encode(['error' => 'Failed to delete user']);
        }
    }
       

    public function fetchUsers() {
        $t = new ConnectionDB;
        $t->Connection();
        $sql = 'SELECT id, name, roomNo, picture FROM user';
        $stmt = $t->db->prepare($sql);
        $stmt->execute();
        return json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
    }
}
?>
