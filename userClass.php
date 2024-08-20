<?php

    error_reporting(E_ALL);
    ini_set('display_errors', '1');

    require('../DB.php');

    class User{
        private $name, $email, $password, $roomNo, $picture;
        // id is auto-increament
        function __construct($name="", $email="",$password="", $roomNo=0,$picture=""){
            $this->name=$name;
            $this->email=$email;
            $this->password=$password;
            $this->roomNo=$roomNo;
            $this->picture=$picture;
        }

        public function insert(){
            $n = new ConnectionDB;
            echo $n->Connection();
            $sql = 'insert into user (name, email, password, roomNo, picture) values(?,?,?,?)';
            $stataus = $n->db->prepare($sql);
            $stataus->execute();
            $result = $stataus->fetchAll(PDO::FETCH_ASSOC);
            echo '<br>';
            print_r($result);
        }

        public function update($id){
            $n = new ConnectionDB;
            echo $n->Connection();
            $sql = 'update user set name=?, email=?, password=?,roomNo=? where id = ?';
            $stataus = $n->db->prepare($sql);
            $stataus->execute();
            // $result = $stataus->fetchAll(PDO::FETCH_ASSOC);
            echo '<br>';
            print_r($result);
        }

        public function delete($id){
            $n = new ConnectionDB;
            echo $n->Connection();
            $sql = 'delete from user where id = ?';
            $stataus = $n->db->prepare($sql);
            $stataus->execute([$id]);
            // $result = $stataus->fetchAll(PDO::FETCH_ASSOC);
            echo '<br>';
            print_r($result);
        }


        public function fetchUsers() {
            $t = new ConnectionDB;
            $t->Connection();
            $sql = 'SELECT name, roomNo, picture FROM user';
            $stmt = $t->db->prepare($sql);
            $stmt->execute();
            return json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
        }
    }
?>