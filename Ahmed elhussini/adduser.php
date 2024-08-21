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
    <h2>Add User</h2>
    <form action="./doneuser.php" method="post" enctype="multipart/form-data">
        <label for="fullname">Name</label>
        <input type="text" id="first-name" name="fullname" required>
        
        <label for="email">Email</label>
        <input type="email" id="email" name="email" required>
        <br>
        <label for="password">Password</label>
        <input type="password" id="password" name="password" required>
        <br>
        <label for="Confirm Password">Confirm Password</label>
        <input type="password" id="Confirm_Password" name="Confirm Password" required>
        <br>
        <label for="Room No">Room No</label>
        <input type="number" id="Room_No" name="Room_No" required>
        <br>
        <label for="Ext">Ext.</label>
        <input type="number" id="Ext" name="Ext" required>
        <br>
        <div>
            <label for="profile_pic">Profile Pic</label>
            <input type="file" id="profile_pic" name="image" required>
        </div>
        <br>
        <button type="submit">Save</button>
        <br><br>
        <button type="reset">Reset</button>
    </form>
</div>

</body>
</html>
