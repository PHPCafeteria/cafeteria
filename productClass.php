<?php

    error_reporting(E_ALL);
    ini_set('display_errors', '1');

    require('../DB.php');

    class Product{
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
            $n->Connection();
            $sql = 'DELETE FROM product WHERE idProduct =?';
            $stmt = $n->db->prepare($sql);
            $result = $stmt->execute([$id]);
            
            if ($result) {
                echo json_encode(['status' => 'success']);
            } else {
                http_response_code(500);
                echo json_encode(['error' => 'Failed to delete product']);
            }
        }
        

        public function fetchProducts() {
            $t = new ConnectionDB;
            $t->Connection();
            $sql = 'SELECT idProduct, name , price, picture FROM product';
            $stmt = $t->db->prepare($sql);
            $stmt->execute();
            return json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
        }
        

    }
?>



