<?php include '../asmaa/header/headerForAdmin.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Product List</title>
  <link rel="stylesheet" href="./styles.css"> <!-- Link to external CSS file -->
  <style>
    .product-image {
      width: 100px; /* Adjust the size as needed */
      height: auto;
    }
  </style>
</head>
<body>
  <main>
    <div class="header-container">
      <h1>All Products</h1>
      <a href="../Ahmed elhussini/addproduct.php"><button class="add-button">Add Product</button></a>
    </div>

    <table id="productTable">
      <thead>
        <tr>
          <th>Product</th>
          <th>Price</th>
          <th>Image</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <!-- Product rows will be dynamically inserted here -->
      </tbody>
    </table>
  </main>

  <script>
    document.addEventListener("DOMContentLoaded", function() {
      function fetchProducts() {
        fetch('http://localhost/cafeteria/david/Product.php?type=products')
          .then(response => response.json())
          .then(data => {
            const tableBody = document.querySelector('#productTable tbody');
            tableBody.innerHTML = '';
            data.forEach(product => {
              const row = document.createElement('tr');
              row.innerHTML = `
                <td>${product.name}</td>
                <td>${product.price} EGP</td>
                <td><img src="../image/product/${product.picture}" alt="${product.name} image" class="product-image"></td>
                <td>
                  <button class="edit-button">Edit</button>
                  <button class="delete-button" data-id="${product.idProduct}">Delete</button>
                </td>
              `;
              tableBody.appendChild(row);
            });

            document.querySelectorAll('.delete-button').forEach(button => {
              button.addEventListener('click', function() {
                const productId = this.getAttribute('data-id');
                fetch('http://localhost/cafeteria/david/Product.php?type=delete', {
                  method: 'POST',
                  headers: {
                    'Content-Type': 'application/json'
                  },
                  body: JSON.stringify({ id: productId })
                })
                .then(response => response.json())
                .then(result => {
                  if (result.status === 'success') {
                    this.closest('tr').remove();
                  } else {
                    console.error('Failed to delete product:', result.error);
                  }
                })
                .catch(error => console.error('Error:', error));
              });
            });
          })
          .catch(error => console.error('Error:', error));
      }

      fetchProducts();
    });
  </script>
</body>
</html>
