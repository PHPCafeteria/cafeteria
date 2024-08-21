<?php
include('/var/www/html/cafeteria/asmaa/header/headerForUser.php')
?>

<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Orders</title>
   
</head>
<body> -->
    <header></header>
    <main>
        <h1>My Orders</h1>
        <section id="date-pickers">
            <label for="from-date">From: </label>
            <input type="datetime-local" id="from-date" name="from-date">
            <label for="to-date">To: </label>
            <input type="datetime-local" id="to-date" name="to-date">
            <input type="button" value="Get My Orders" name="Get My Orders" onclick="getDataFromDB();">
        </section>
        <section id="table-container">
            <table id="table">
                <tr>
                    <th>Order Date</th>
                    <th>Status</th>
                    <th>Amount</th>
                    <th>Action</th>
                </tr>
            </table>
        </section>
        <section id="display-section"></section>
    </main>
    <footer></footer>
    <script src="JS/myOrder.js"></script>
</body>
</html>