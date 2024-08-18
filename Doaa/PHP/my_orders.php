<?php
// login session shall be added at user login page
// session_start();

error_reporting(E_ALL); // shall be removed
ini_set('display_errors', '1');

if ($_SERVER['REQUEST_METHOD'] == 'GET') {

    // Validate user autorization
    if (isset($_GET['userId']) && is_numeric($_GET['userId'])) {

        // Validate input dates
        if ($_GET['startDate'] && $_GET['endDate']) {
            $userId = intval($_GET['userId']);  // ask ahmed, gad about id of user

            require('DB.php');

            $conn = new ConnectionDB;
            $conn->Connection(); // echo shall be removed
            $sql = 'select orders.* from orders, user where user.id = ? and orders.date between ? and ?';
            $statement = $conn->db->prepare($sql);
            $statement->execute([$userId, $_GET['startDate'], $_GET['endDate']]);
            $result = $statement->fetchAll(PDO::FETCH_ASSOC);
            $arr = array();
            foreach($result as $y){
                array_push($arr, $y);
            }
            // echo '<br>'; // shall be removed
            // var_dump($result);
            echo json_encode($arr);

        } else {
            return 'Pick valid dates, please.';
        }
    } else {
        return 'You must login first.';
    }
}

?>