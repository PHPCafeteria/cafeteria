<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>order user</title>
    <link rel="stylesheet" href="all.min.css">
    <link rel="stylesheet" href="bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="php project/cafeteria-logo.png" alt="cafeteria" width="50" height="40">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item   ">
                        <a class="nav-link active text-white fs-6 " aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white fs-6" href="#">My Orders</a>
                    </li>
                </ul>
            </div>
            <!--add pic php-->
            <div class="text-align-end d-flex">
                <div class="px-3">
                    <img class="rounded-circle border-2 border-black" src="php project/cofee.png"
                        alt="Profile Picture" style="width: 50px; height: 50px;">
                </div>
                <div>
                    <a class="nav-link text-white fs-6 pt-3" href="#">username</a>
                </div>
            </div>

        </div>
    </nav>
    <!---->
    <div class="container mt-5">

    <div>
      <div class="input-group mb-3">
        <input type="text" class="form-control" placeholder="search" aria-label="search" aria-describedby="button-addon2">
        <button class="btn btn-outline-warning bg-warning" type="button" id="button-addon2">
          <img src="php project/search-369.png" alt="" style="width:20px; height:20px">
        </button>
      </div>
    </div>
        <br>
    </div>
    <div class="container mt-5">
        <p class="text-white"> Latest Order</p>
        <div class="row row-cols-1 row-cols-md-4 g-4">
            <div class="col">
                <div class="card h-100 d-flex justify-content-center align-items-center">
                    <div class="card-body">
                        <img src="php project/cofee.png" class="card-img-top" style="height: 20vh; width: 10vw;"
                            alt="...">
                        <h5 class="card-title text-center">coffee</h5>
                        <p class="card-text text-center">$6</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card h-100 d-flex justify-content-center align-items-center">
                    <div class="card-body">
                        <img src="php project/0131-nescafe.png" class="card-img-top"
                            style="height: 20vh; width: 10vw;" alt="...">
                        <h5 class="card-title text-center">Nescafe</h5>
                        <p class="card-text text-center"> $8 </p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card h-100 d-flex justify-content-center align-items-center">
                    <div class="card-body">
                        <img src="php project/ice tea.png" class="card-img-top"
                            style="height: 20vh; width: 10vw;" alt="...">
                        <h5 class="card-title text-center">Ice Tea</h5>
                        <p class="card-text text-center">$10</p>
                    </div>
                </div>
            </div>
        </div>

        <br>
        <hr>
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
                                    <li class="text-black">Username</li>
                                    <li class="text-muted mt-1"><span class="text-black">Invoice</span> #12345</li>
                                    <li class="text-black mt-1">April 17 2021</li>
                                </ul>
                                <hr>
                                <div class="col-xl-10">
                                    <p class="product">Product1</p>
                                </div>
                                <div class="col-xl-2">
                                    <p class="float-end price">$price
                                    </p>
                                </div>
                                <hr>
                            </div>
                            <div class="row">
                                <div class="col-xl-10">
                                    <p>Product 2</p>
                                </div>
                                <div class="col-xl-2">
                                    <p class="float-end">$price
                                    </p>
                                </div>
                                <hr>
                            </div>
                            <div class="row">
                                <div class="col-xl-10">
                                    <p>Product 3</p>
                                </div>
                                <div class="col-xl-2">
                                    <p class="float-end">$price
                                    </p>
                                </div>
                                <hr style="border: 2px solid black;">
                            </div>
                            <div class="row text-black">
                                <label for="notes">
                                    Notes
                                </label>
                                <textarea name="notes" id="notes"></textarea>
                                <hr style="border: 2px solid black;">
                            </div>
                            <div class="row text-black">
                                <label for="room">Room</label><br>
                                <select name="room" id="roomNum" style="background-color: white;">
                                    <option value="option1">option1</option>
                                    <option value="option2">option2</option>
                                </select>
                            </div>
                            <br>
                            <div class="row text-black">
                                <div class="col-xl-12">
                                    <p class="float-end fw-bold">Total: $10.00
                                    </p>
                                </div>
                            </div>
                            <button type="button" style="border-radius: 10%;">Confirm</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12 col-lg-8">
                <div class="row row-cols-1 row-cols-md-3 g-4">
                    <div class="col">
                        <div class="card h-100 d-flex justify-content-center align-items-center">
                            <div class="card-body">
                                <div style="text-align: center;">
                                    <img src="php project/tea.png" class="card-img-top" style=" width: 90px; height: 90px;object-fit: contain;" alt="...">
                                </div>
                                <h5 class="card-title text-center">Tea</h5>
                                <p class="card-text text-center">$5</p>
                                <div class="d-flex justify-content-evenly">
                                    <button type="button" class="addBtn btn" style="background-color: #74512D; color:white;font-weight: bolder;">+</button>
                                    <button type="button" class="removeBtn btn" style="background-color: #74512D; color:white; font-weight: bolder;"><span class="px-1">-</span></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card h-100 d-flex justify-content-center align-items-center">
                            <div class="card-body">
                                <div style="text-align: center;">
                                    <img src="php project/gree_tea.png" class="card-img-top" style=" width: 90px; height: 90px;object-fit: contain;" alt="...">
                                </div>
                                <h5 class="card-title text-center">Green Tea</h5>
                                <p class="card-text text-center">$7</p>
                                <div class="d-flex justify-content-evenly">
                                    <button type="button" class="addBtn btn" style="background-color: #74512D; color:white;font-weight: bolder;">+</button>
                                    <button type="button" class="removeBtn btn" style="background-color: #74512D; color:white; font-weight: bolder;"><span class="px-1">-</span></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card h-100 d-flex justify-content-center align-items-center">
                            <div class="card-body">
                                <div style="text-align: center;">
                                    <img src="php project/cofee.png" class="card-img-top" style=" width: 90px; height: 90px;object-fit: contain;" alt="...">
                                </div>
                                <h5 class="card-title text-center">coffee</h5>
                                <p class="card-text text-center">$6</p>
                                <div class="d-flex justify-content-evenly">
                                    <button type="button" class="addBtn btn" style="background-color: #74512D; color:white;font-weight: bolder;">+</button>
                                    <button type="button" class="removeBtn btn" style="background-color: #74512D; color:white; font-weight: bolder;"><span class="px-1">-</span></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card h-100 d-flex justify-content-center align-items-center">
                            <div class="card-body">
                                <div style="text-align: center;">
                                    <img src="php project/0131-nescafe.png" class="card-img-top" style=" width: 90px; height: 90px;object-fit: contain;" alt="...">
                                </div>
                                <h5 class="card-title text-center">Nescafe</h5>
                                <p class="card-text text-center"> $8 </p>
                                <div class="d-flex justify-content-evenly">
                                    <button type="button" class="addBtn btn" style="background-color: #74512D; color:white;font-weight: bolder;">+</button>
                                    <button type="button" class="removeBtn btn" style="background-color: #74512D; color:white; font-weight: bolder;"><span class="px-1">-</span></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card h-100 d-flex justify-content-center align-items-center">
                            <div class="card-body">
                                <div style="text-align: center;">
                                    <img src="php project/ice tea.png" class="card-img-top" style=" width: 90px; height: 90px;object-fit: contain;" alt="...">
                                </div>
                                <h5 class="card-title text-center">Ice Tea</h5>
                                <p class="card-text text-center">$10</p>
                                <div class="d-flex justify-content-evenly">
                                    <button type="button" class="addBtn btn" style="background-color: #74512D; color:white;font-weight: bolder;">+</button>
                                    <button type="button" class="removeBtn btn" style="background-color: #74512D; color:white; font-weight: bolder;"><span class="px-1">-</span></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card h-100 d-flex justify-content-center align-items-center">
                            <div class="card-body">
                                <div style="text-align: center;">
                                    <img src="php project/iced-coffee.png" class="card-img-top" style=" width: 90px; height: 90px;object-fit: contain;" alt="...">
                                </div>
                                <h5 class="card-title text-center">Ice Coffee</h5>
                                <p class="card-text text-center">$10</p>
                                <div class="d-flex justify-content-evenly">
                                    <button type="button" class="addBtn btn" style="background-color: #74512D; color:white;font-weight: bolder;">+</button>
                                    <button type="button" class="removeBtn btn" style="background-color: #74512D; color:white; font-weight: bolder;"><span class="px-1">-</span></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card h-100 d-flex justify-content-center align-items-center">
                            <div class="card-body">
                                <div style="text-align: center;">
                                    <img src="php project/mangooo.png" class="card-img-top" style=" width: 90px; height: 90px;object-fit: contain;" alt="...">
                                </div>
                                <h5 class="card-title text-center">Mango juice</h5>
                                <p class="card-text text-center">$6</p>
                                <div class="d-flex justify-content-evenly">
                                    <button type="button" class="addBtn btn" style="background-color: #74512D; color:white;font-weight: bolder;">+</button>
                                    <button type="button" class="removeBtn btn" style="background-color: #74512D; color:white; font-weight: bolder;"><span class="px-1">-</span></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card h-100 d-flex justify-content-center align-items-center">
                            <div class="card-body">
                                <div style="text-align: center;">
                                    <img src="php project/strowberryy.png" class="card-img-top ms-3" style=" width: 90px; height: 90px;object-fit: contain;" alt="...">
                                </div>
                                <h5 class="card-title">strawberry Juice</h5>
                                <p class="card-text text-center">$8</p>
                                <div class="d-flex justify-content-evenly">
                                    <button type="button" class="addBtn btn" style="background-color: #74512D; color:white;font-weight: bolder;">+</button>
                                    <button type="button" class="removeBtn btn" style="background-color: #74512D; color:white; font-weight: bolder;"><span class="px-1">-</span></button>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card h-100 d-flex justify-content-center align-items-center">
                            <div class="card-body">
                                <div style="text-align: center;">
                                    <img src="php project/soda.png" class="card-img-top" style=" width: 90px; height: 90px;object-fit: contain;" alt="...">
                                </div>
                                <h5 class="card-title text-center">Soda can</h5>
                                <p class="card-text text-center">$5</p>
                                <div class="d-flex justify-content-evenly">
                                    <button type="button" class="addBtn btn" style="background-color: #74512D; color:white;font-weight: bolder;">+</button>
                                    <button type="button" class="removeBtn btn" style="background-color: #74512D; color:white; font-weight: bolder;"><span class="px-1">-</span></button>
                                </div>
                            </div>
                        </div>
                    </div>
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
</body>

</html>