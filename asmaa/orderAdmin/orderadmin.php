<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>order admin</title>
  <link rel="stylesheet" href="bootstrap.min.css">
  <link rel="stylesheet" href="all.min.css">
  <link rel="stylesheet" href="style.css">
  <script src="jquery-3.7.1.js"></script>
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
                  include("../header/headerForAdmin.php")
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

  <!---->
  <div class="container mt-5 d-flex justify-content-between">
    <div>
      <span class="px-3 text-white">Add to user</span>
      <select name="selet" id="selet" style="width: 15vw; background-color: white; border-radius: 5%;">
        <option value="islam">Islam Askar</option>
      </select>
    </div>
    <div>
      <div class="input-group mb-3">
        <input type="text" class="form-control" placeholder="search" aria-label="search" aria-describedby="button-addon2">
        <button class="btn btn-outline-warning bg-warning" type="button" id="button-addon2">
          <img src="php project/search-369.png" alt="" style="width:20px; height:20px">
        </button>
      </div>
    </div>
  </div>
  </div>

  <!--bill and products-->
  <div class="container-fluid mt-5 mb-5">
    <div class="row" id="billProduct">
      <div class="col-md-12 col-lg-4 ps-3">
        <div class="card">
          <div class="card-body mx-4">
            <div class="container">
              <p class="my-5" style="font-size: 30px;">Thank for your purchase</p>
              <div class="row">
                            <ul class="list-unstyled">
                                    <li class="text-black userName">Dived</li>
                                    <li class="text-muted mt-1"><span class="text-black">Invoice</span> #12345</li>
                                    <li class="text-black mt-1 date_"></li>
                                </ul>
                                <div class="requests">
                                </div>
                                <hr style="border: 2px solid black;">
                            </div>
                            <div class="row text-black">
                                <label for="notes">
                                    Notes
                                </label>
                                <textarea name="notes" id="notes" class="note"></textarea>
                                <hr style="border: 2px solid black;">
                            </div>
                            <div class="row text-black">
                                <label for="room">Room</label><br>
                                <select name="room" id="roomNum" style="background-color: white;">
                                    <option value="1001">1001</option>
                                    <option value="1002">1002</option>
                                    <option value="2001">2001</option>
                                    <option value="2002">2002</option>
                                </select>
                            </div>
                            <br>
                            <div class="row text-black">
                                <div class="col-xl-12">
                                    <p class="float-end fw-bold totalPrice"> Total: $0
                                    </p>
                                </div>
                            </div>
                            <button type="button" style="border-radius: 10%;" class="confirm">Confirm</button>

            </div>
          </div>
        </div>
      </div>
      <div class="col-md-12 col-lg-8">
        <div class="row row-cols-1 row-cols-md-3 g-4 addProduct">
        </div>
      </div>
    </div>
  </div>
  <footer>
    <div style="background-color: #543310;">
      copyright
    </div>
  </footer>
  <script src="bootstrap.bundle.min.js"></script>
  <script src="adminOrder.js"></script>
</body>

</html>