<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="../asmaa/header/bootstrap.min.css">
<link rel="stylesheet" href="../asmaa/header/all.min.css">
<link rel="stylesheet" href="../asmaa/header/style.css">
<link rel="stylesheet" href="./styleAddUser.css">
</head>
<body>

<?php include('../asmaa/header/headerForAdmin.php'); ?>

<div class="form-container">
    <h2>Add Products</h2>
    <form action="./doneProducts.php" method="post" enctype="multipart/form-data">
        <label for="Product">Product</label>
        <input type="text" id="Product" name="Product" required>
        
        <label for="prices">Price</label>
        <input type="number" id="prices" name="Prices" required>
        <br>
        <span style="float: left;">Category:
            <select name="category" id="category">
                <option value="" selected="selected">Hot Drinks</option>
            </select>
            <a href="#">Add Category</a>
        </span>
        <br><br>
        <div>
            <label for="products">Product Pic</label>
            <input type="file" id="products" name="image" required>
        </div>
        <br>
        <button type="submit">Save</button>
        <br><br>
        <button type="reset">Reset</button>
    </form>
</div>

</body>
</html>
