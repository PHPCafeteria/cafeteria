<?php
class ConnectionDB{
    private $DB_HOST='localhost';
    private $DB_USER='root';
    private $DB_PASSWORD='405060';
    private $DB_DATABASE='cafeteria';
    private $typeSQL='mysql';
    public $db;
    public function Connection(){
        try{
            $dsn = $this->typeSQL.':dbname='.$this->DB_DATABASE.';host='.$this->DB_HOST.';port=3308;';
            $this->db = new PDO($dsn, $this->DB_USER, $this->DB_PASSWORD);
            echo 'connect done';
        }
        catch(PDOException $e){
            echo 'connect failed '.$e->getMessage();
        }
    }


}


?>
