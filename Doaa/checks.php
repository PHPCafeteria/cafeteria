
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Checks</title>
    <link rel="stylesheet" href="all.min.css">
    <link rel="stylesheet" href="bootstrap.min.css">
    <link rel="stylesheet" href="style.css">

</head>

<body>
    <!-- <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="php project/cafeteria-logo.png" alt="cafeteria" width="50" height="40">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse " id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link active text-white fs-6" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white fs-6 " href="#">Products</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white fs-6" href="#">Users</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white fs-6 " href="#">Manual Order</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white fs-6 " href="#">Users</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white fs-6" href="#">Checks</a>
                    </li>
                </ul> -->
                <?php
                  include("../asmaa/header/headerForAdmin.php")
                ?>
                <!-- Profile section moved inside the collapsible area -->
                <div class="d-flex align-items-center mt-3 mt-lg-0">
                    <div class="px-3">
                        <img class="rounded-circle border-2 border-black" src="php project/cofee.png"
                            alt="Profile Picture" style="width: 50px; height: 50px;">
                    </div>
                    <div>
                        <a class="nav-link text-white fs-6" href="#">username</a>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    
    <h1 class="mt-5">Checks</h1>

    <div class="container" id="pickers">
        <div class="row d-flex justify-content-center">
            <div class="col-12 col-md-6">
                <label for="from-date fs-5">From: </label><br>
                <input class="" type="datetime-local" id="from-date" name="from-date" >
            </div>
            <div class="col-12 col-md-6">
                <label for="to-date fs-5">To: </label><br>
                <input type="datetime-local" id="to-date" name="to-date">
            </div>
        </div>
    </div>

    <div class="container mt-5 text-center d-flex">
        <div>
             <label for="user-picker" class="pe-4">Select user: </label>
        </div>
        <div>
            <select name="user-picker" id="user-picker" style="width: 300px;">
                <option value="admin"  selected>Admin</option>
                <option value="user">user</option>
            </select>
        </div>
    </div>

    <div class="container mt-5">
        <table class="table my-5" id="users-table">
            <thead class="text-white" >
                <tr style="background-color: brown;">
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Role</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>John Doe</td>
                    <td>johndoe@example.com</td>
                    <td>Admin</td>
                </tr>
                <tr>
                    <th scope="row">2</th>
                    <td>Jane Smith</td>
                    <td>janesmith@example.com</td>
                    <td>User</td>
                </tr>
                <!-- More rows as needed -->
            </tbody>
        </table>
    
        <table class="table my-5" id="users-table">
            <thead class="text-white" style="background-color: brown;">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Role</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>John Doe</td>
                    <td>johndoe@example.com</td>
                    <td>Admin</td>
                </tr>
                <tr>
                    <th scope="row">2</th>
                    <td>Jane Smith</td>
                    <td>janesmith@example.com</td>
                    <td>User</td>
                </tr>
                <!-- More rows as needed -->
            </tbody>
        </table>
    </div>
    
    
    

    <footer>
        <div style="background-color: #543310;">
            copyright
        </div>
    </footer>
    <script src="/Doaa/JS/checks.js"></script>
    <script src="bootstrap.bundle.min.js"></script>

</body>

</html>