<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
    error_reporting(E_ALL);
    ini_set('display_errors', '1');
        require('../DB.php');
        $n = new ConnectionDB;
        echo $n->Connection();
        $sql = 'select * from user';
        $stataus = $n->db->prepare($sql);
        $stataus->execute();
        $result = $stataus->fetchAll(PDO::FETCH_ASSOC);
        echo '<br>';
        print_r($result);
    ?>
    <h1 style="margin-left: 10%; font-size: 50px;">Orders</h1>
    <div class="container">
        <table cellspacing="0" cellpadding="1">
            <tr>
                <th style="width:22%">Order Date</th>
                <th style="width:22%">Name</th>
                <th style="width:12%">Room</th>
                <th style="width:12%">Ext.</th>
                <th style="width:12%">Action</th>
            </tr>
            <tr>
                <td>2024-5-12 11:30 AM</td>
                <td>Mohamed Gad</td>
                <td>2002</td>
                <td>5656</td>
                <td>deliver</td>
            </tr>
        </table>
        <div class="orders">
            <div>
                <img src="1.jpeg" alt="">
                <img src="1.jpeg" alt="">
                <img src="1.jpeg" alt="">
                <img src="1.jpeg" alt="">
                <img src="1.jpeg" alt="">
            </div>
            <span style="float:right; margin-right: 5%; font-size: 30px;">Total: EGP 500000</span>
        </div>
    </div>
</body>
</html>