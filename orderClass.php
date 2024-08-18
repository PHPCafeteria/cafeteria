<?php

    error_reporting(E_ALL);
    ini_set('display_errors', '1');
    class Order{
        private $notes, $status,$totalPrice, $action;

        function __construct($notes, $status,$totalPrice, $action){

            $this->notes=$notes;
            $this->status=$status;
            $this->totalPrice=$totalPrice;
            $this->action=$action;
        }

        public function insert(){
            $n = new ConnectionDB;
            echo $n->Connection();
            $sql = 'insert into orders (notes, status, totalPrice,action) values(?,?,?,?)';
            $stataus = $n->db->prepare($sql);
            $stataus->execute();
            $result = $stataus->fetchAll(PDO::FETCH_ASSOC);
            echo '<br>';
            print_r($result);
        }
        public function delete($id){
            $n = new ConnectionDB;
            echo $n->Connection();
            $sql = 'delete from orders where idOrder = ?';
            $stataus = $n->db->prepare($sql);
            $stataus->execute([$id]);
            // $result = $stataus->fetchAll(PDO::FETCH_ASSOC);
            echo '<br>';
            print_r($result);
        }


    }
?>