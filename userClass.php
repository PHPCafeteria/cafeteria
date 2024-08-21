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

<<<<<<< HEAD
        public function update($id){
            $n = new ConnectionDB;
            echo $n->Connection();
            $sql = 'update user set name=?, email=?, password=?,roomNo=? where id = ?';
            $stataus = $n->db->prepare($sql);
            $stataus->execute();
            // $result = $stataus->fetchAll(PDO::FETCH_ASSOC);
            echo '<br>';
            //print_r($result);
        }

        public function delete($id){
            $n = new ConnectionDB;
            echo $n->Connection();
            $sql = 'delete from user where id = ?';
            $stataus = $n->db->prepare($sql);
            $stataus->execute([$id]);
            // $result = $stataus->fetchAll(PDO::FETCH_ASSOC);
            echo '<br>';
            //print_r($result);
        }
=======
    public function insert() {
        $n = new ConnectionDB;
        echo $n->Connection();
        $sql = 'INSERT INTO user (name, email, password, roomNo, picture) VALUES (?, ?, ?, ?, ?)';
        $status = $n->db->prepare($sql);
        $status->execute([$this->name, $this->email, $this->password, $this->roomNo, $this->picture]);
        echo '<br>';
        print_r($status->fetchAll(PDO::FETCH_ASSOC));
    }

    public function update($id) {
        $n = new ConnectionDB;
        echo $n->Connection();
        $sql = 'UPDATE user SET name=?, email=?, password=?, roomNo=? WHERE id=?';
        $status = $n->db->prepare($sql);
        $status->execute([$this->name, $this->email, $this->password, $this->roomNo, $id]);
        echo '<br>';
        print_r($status->fetchAll(PDO::FETCH_ASSOC));
    }
>>>>>>> b61e7b9b7c980b4dd670c421ba42e7236b8e8efa

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

        public function fetchUserById($id) {
            $t = new ConnectionDB;
            $t->Connection();
            $sql = 'SELECT name, picture FROM user WHERE id = ?';
            $stmt = $t->db->prepare($sql);
            $stmt->execute([$id]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
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
