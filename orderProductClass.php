<?php

    error_reporting(E_ALL);
    ini_set('display_errors', '1');

    require('../DB.php');

    class User{
        private $idOrder, $idProduct, $numOfProduct;
        // id is auto-increament
        function __construct($idOrder, $idProduct, $numOfProduct){
            $this->idOrder=$idOrder;
            $this->idProduct=$idProduct;
            $this->numOfProduct=$numOfProduct;

        }

        public function insert(){
            $n = new ConnectionDB;
            echo $n->Connection();
            $sql = 'insert into orderProduct (idOrder, idProduct, numOfProduct) values(?,?,?)';
            $stataus = $n->db->prepare($sql);
            $stataus->execute();
            $result = $stataus->fetchAll(PDO::FETCH_ASSOC);
            // echo '<br>';
            // print_r($result);
        }

        public function delete($id){
            $n = new ConnectionDB;
            echo $n->Connection();
            $sql = 'delete from orderProduct where idOrder = ?';
            $stataus = $n->db->prepare($sql);
            $stataus->execute([$id]);
            // $result = $stataus->fetchAll(PDO::FETCH_ASSOC);
            echo '<br>';
            print_r($result);
        }

    }
?>