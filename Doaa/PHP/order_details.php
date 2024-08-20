<?php
// login session shall be added at user login page
// session_start();

error_reporting(E_ALL); // shall be removed
ini_set('display_errors', '1');

if ($_SERVER['REQUEST_METHOD'] == 'GET') {

    // Validate input
    if (isset($_GET['orderId'])) {
        $orderId = intval($_GET['orderId']);  // ask ahmed, gad about id of user

        require('DB.php');

        $conn = new ConnectionDB;
        $conn->Connection();

        $sql = 'select product.name, product.price, product.picture, orderProduct.numOfProduct 
        from orders join product join orderProduct 
        where orders.idOrder = ? and orders.idOrder = orderProduct.idOrder 
        and product.idProduct = orderProduct.idProduct and orders.action = 0';
        $statement = $conn->db->prepare($sql);
        $statement->execute([$orderId]);
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        $arr = array();
        foreach ($result as $r) {
            array_push($arr, $r);
        }
        // echo '<br>'; // shall be removed
        // var_dump($result);
        echo json_encode($arr);
    } else {
        return 'Order does not exist.';
    }

}

?>