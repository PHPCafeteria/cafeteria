<?php

    error_reporting(E_ALL);
    ini_set('display_errors', '1');

    require('../DB.php');

    class Prudect{
        private $name, $price, $available, $picture, $idCatogry;
        // id is auto-increament
        function __construct($name="", $price=0, $available=1, $picture="", $idCatogry=0){
            $this->name=$name;
            $this->price=$price;
            $this->available=$available;
            $this->picture=$picture;
            $this->idCatogry=$idCatogry;
        }

        public function insert(){
            $n = new ConnectionDB;
            echo $n->Connection();
            $sql = 'insert into product (name, price, available, picture, idCatogry) values(?,?,?,?,?)';
            $stataus = $n->db->prepare($sql);
            $stataus->execute();
            $result = $stataus->fetchAll(PDO::FETCH_ASSOC);
            // echo '<br>';
            print_r($result);
        }

        public function update($id){
            $n = new ConnectionDB;
            echo $n->Connection();
            $sql = 'update product set name=?, price=?, available=?,idCatogry=? where idProduct = ?';
            $stataus = $n->db->prepare($sql);
            $stataus->execute();
            // $result = $stataus->fetchAll(PDO::FETCH_ASSOC);
            // echo '<br>';
            print_r($result);
        }

        public function delete($id){
            $n = new ConnectionDB;
            echo $n->Connection();
            $sql = 'delete from product where idProduct = ?';
            $stataus = $n->db->prepare($sql);
            $stataus->execute([$id]);
            // $result = $stataus->fetchAll(PDO::FETCH_ASSOC);
            // echo '<br>';
            print_r($result);
        }

        public function fetchProducts() {
            $t = new ConnectionDB;
            $t->Connection();
            $sql = 'SELECT name, price, picture FROM product';
            $stmt = $t->db->prepare($sql);
            $stmt->execute();
            return json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
        }
        

    }
?>