
<?php

header('Content-Type: application/json');
error_reporting(E_ALL);
ini_set('display_errors', '1');
require('../DB.php');
$n = new ConnectionDB;
$n->Connection();
$sql = 'select * from  orderProduct where idOrder = 1;';
$stataus = $n->db->prepare($sql);
$stataus->execute();
$result = $stataus->fetchAll(PDO::FETCH_ASSOC);
print_r(json_encode($result));
?>
