<?php
// login session shall be added at a login page
// session_start();

error_reporting(E_ALL); // shall be removed
ini_set('display_errors', '1');

if ($_SERVER['REQUEST_METHOD'] == 'GET') {

    require('DB.php');

    $conn = new ConnectionDB;
    $conn->Connection();
    $sql = 'select * from user';
    $statement = $conn->db->prepare($sql);
    $statement->execute();
    $result = $statement->fetchAll(PDO::FETCH_ASSOC);
    print_r(json_encode($result));

} else {
    return 'Error';
}

?>