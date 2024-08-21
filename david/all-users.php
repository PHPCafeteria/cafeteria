<?php include '../asmaa/header/headerForAdmin.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>User List</title>
  <link rel="stylesheet" href="styles.css">
  <style>
    .user-image {
      width: 50px; /* Adjust the size as needed */
      height: auto;
    }
  </style>
</head>
<body>
  <main>
    <div class="header-container">
      <h1>All Users</h1>
      <a href="../Ahmed elhussini/adduser.php"><button class="add-button">Add User</button></a>
    </div>

    <table id="userTable">
      <thead>
        <tr>
          <th>Name</th>
          <th>Room</th>
          <th>Image</th>
          <th>Ext.</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <!-- User rows will be dynamically inserted here -->
      </tbody>
    </table>
  </main>

  <script>
    document.addEventListener("DOMContentLoaded", function() {
      fetch('http://localhost/cafeteria/david/User.php?type=users')
        .then(response => response.json())
        .then(data => {
          const tableBody = document.querySelector('#userTable tbody');
          tableBody.innerHTML = '';
          data.forEach(user => {
            const row = document.createElement('tr');
            row.innerHTML = `
              <td>${user.name}</td>
              <td>${user.roomNo}</td>
              <td><img src="../image/user/${user.picture}" alt="${user.name}" class="user-image"></td>
              <td>${user.ext}</td>
              <td>
                <button class="edit-button">Edit</button>
                <button class="delete-button" data-id="${user.id}">Delete</button>
              </td>
            `;
            tableBody.appendChild(row);
          });

          document.querySelectorAll('.delete-button').forEach(button => {
            button.addEventListener('click', function() {
              const userId = this.getAttribute('data-id');
              fetch('http://localhost/cafeteria/david/User.php?type=delete', {
                method: 'POST',
                headers: {
                  'Content-Type': 'application/json'
                },
                body: JSON.stringify({ id: userId })
              })
              .then(response => response.json())
              .then(result => {
                if (result.status === 'success') {
                  this.closest('tr').remove();
                } else {
                  console.error('Failed to delete user:', result.error);
                }
              })
              .catch(error => console.error('Error:', error));
            });
          });
        })
        .catch(error => console.error('Error:', error));
    });
  </script>
</body>
</html>
