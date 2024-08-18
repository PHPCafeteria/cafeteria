<?php

    error_reporting(E_ALL);
    ini_set('display_errors', '1');

    require('../DB.php');

    class UserOrder{
        private $idUser, $idOrder;
        // id is auto-increament
        function __construct($idUser, $idOrder){
            $this->idUser=$idUser;
            $this->idOrder=$idOrder;
        }

        public function insert(){
            $n = new ConnectionDB;
            echo $n->Connection();
            $sql = 'insert into userOrder (idUser, idOrder) values(?,?)';
            $stataus = $n->db->prepare($sql);
            $stataus->execute();
            $result = $stataus->fetchAll(PDO::FETCH_ASSOC);
            // echo '<br>';
            print_r($result);
        }

        public function delete($id){
            $n = new ConnectionDB;
            echo $n->Connection();
            $sql = 'delete from userOrder where idUser = ?';
            $stataus = $n->db->prepare($sql);
            $stataus->execute([$id]);
            // $result = $stataus->fetchAll(PDO::FETCH_ASSOC);
            // echo '<br>';
            print_r($result);
        }

    }
?>