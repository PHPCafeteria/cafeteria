<?php
// login session shall be added at a login page
// session_start();

error_reporting(E_ALL); // shall be removed
ini_set('display_errors', '1');

if ($_SERVER['REQUEST_METHOD'] == 'GET') {

    require('DB.php');

    $conn = new ConnectionDB;
    $conn->Connection();
    $sql = "select user.*, sum(orders.totalPrice) as 'check' from user join orders join userOrder
    where userOrder.idUser = user.id and userOrder.idOrder = orders.idOrder and orders.action = 0 group by (user.id)";
    $statement = $conn->db->prepare($sql);
    $statement->execute();
    $result = $statement->fetchAll(PDO::FETCH_ASSOC);
    $arr = array();
    foreach ($result as $r) {
        array_push($arr, $r);
    }
    echo json_encode($arr);

} else {
    return 'Pick valid dates, please.';
}

?>