<?php
class ConnectionDB{
    private $DB_HOST='localhost';
    private $DB_USER='root';
    private $DB_PASSWORD='2b0rn0t2B$';
    private $DB_DATABASE='cafeteria';
    private $typeSQL='mysql';
    public $db;
    public function Connection(){
        try{
            $dsn = $this->typeSQL.':dbname='.$this->DB_DATABASE.';host='.$this->DB_HOST.';port=3306;';
            $this->db = new PDO($dsn, $this->DB_USER, $this->DB_PASSWORD);
            // return 'connect done';
        }
        catch(PDOException $e){
            return 'connect failed '.$e->getMessage();
        }
    }
}
?>
