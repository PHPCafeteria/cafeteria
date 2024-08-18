<?php
    class Database{
        private $serverName= "localhost";
        private $userName= "root";
        private $password= "";
        private $dbName= "cafeteria";

        protected $conn;

    public function __construct(){
       try{
        $this->conn = new PDO("mysql:host=$this->serverName; dbName=$this->dbName", $this->userName, $this->password);
        $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "connected" ;
       
        } catch (PDOException $e){
            $this->conn = null;
            echo "". $e->getMessage() ."Connection Failed";
            
        }
        }
    }
?>