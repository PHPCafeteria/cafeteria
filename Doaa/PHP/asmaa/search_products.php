<?php
// login session shall be added at a login page
// session_start();

error_reporting(E_ALL); // shall be removed
ini_set('display_errors', '1');

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (isset($_GET['item'])) {
        $name = $_GET['item'];
        $pattern = '%'.$name.'%';
        // $pattern= '\b\w*\s?'.$name.'\b';
        require('DB.php');

        $conn = new ConnectionDB;
        $conn->Connection();
        $sql = 'select * from product where name like ?';
        $statement = $conn->db->prepare($sql);
        $statement->execute([$pattern]);
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        print_r(json_encode($result));

    } else {
        return 'Error';
    }
}

?>