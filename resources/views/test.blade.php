{{-- @extends('layouts.master') --}}
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        footer {
            margin-top: 15px;
            text-align: center;
            padding: 3px;
            background-color: rgb(29, 92, 175);
            color: white;
        }
    </style>
    <title>Document</title>
</head>

<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <header>
        <nav class="navbar navbar-expand-lg" style="background-color: rgb(56, 56, 244);">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">GROCERY MONK</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-between" id="navbarNavDropdown">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">HOME</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink"
                                role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                category
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <li><a class="dropdown-item" href="#">Home</a></li>
                                <li><a class="dropdown-item" href="#">Clothing</a></li>
                                <li><a class="dropdown-item" href="#">Sports</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink"
                                role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                REPORTS
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <li><a class="dropdown-item" href="#">Action</a></li>
                                <li><a class="dropdown-item" href="#">Another action</a></li>
                                <li><a class="dropdown-item" href="#">Something else here</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink"
                                role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                ADMIN
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <li><a class="dropdown-item" href="#">Admin</a></li>
                                <li><a class="dropdown-item" href="#">profile</a></li>
                                <li><a class="dropdown-item" href="#">Something else here</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink"
                                role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                ORDERS
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <li><a class="dropdown-item" href="#">orders</a></li>
                                <li><a class="dropdown-item" href="#">orders list</a></li>
                                <li><a class="dropdown-item" href="#">Something else here</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink"
                                role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                USERS
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <li><a class="dropdown-item" href="#">users</a></li>
                                <li><a class="dropdown-item" href="#">history</a></li>
                                <li><a class="dropdown-item" href="#">Something else here</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">MY ORDERS</a>
                        </li>
                    </ul>
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                            @auth
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink"
                                    role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    {{ Auth::user()->Name }}
                                </a>
                            @else
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink"
                                    role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Login
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                    <li><a class="dropdown-item login-button" href="{{ route('login') }}">Login</a></li>
                                    <li><a class="dropdown-item" href="{{ route('register') }}">Register</a></li>
                                </ul>
                            @endauth
                        </li>
                        <li><a class="material-symbols-outlined" href="#">
                                <span class="material-icons-outlined">shopping_cart</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="material-symbols-outlined" href="#">
                                <span class="material-icons-outlined search" style="color: white;">search</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <form method="POST" action="/test" class="mx-5" id="updateForm">
        @csrf
        <div class="row">
            <div class="col-md-6">
                <label for="Name">Name:</label>
                <input type="text" Name="Name" required class="form-control" placeholder="samosa">
            </div>
            <div class="col-md-6">
                <label for="active">Active:</label>
                <select Name="active" required class="form-control">
                    <option value="1">YES</option>
                    <option value="0">NO</option>
                </select>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <label for="Description">Description:</label>
                <textarea Name="Description" required class="form-control" placeholder="samosa"></textarea>
            </div>

            <div class="col-md-6">
                <label for="brand">Brand:</label>
                <select Name="brand" required class="form-control">
                    <option value="">Select a brand</option>
                    <option value="Electronics">NIKE</option>
                    <option value="Clothing">desi Rasoi</option>
                    <option value="Home">Maharaja</option>
                    <option value="Sports">Raymond</option>
                    <option value="Books">Logitech</option>
                </select>
            </div>

        </div>
        <div class="row">
            <div class="col-md-6">
                <label for="SKU">SKU:</label>
                <input type="string" Name="SKU" required class="form-control" placeholder="samosa">
            </div>

            <div class="col-md-6">
                <label for="category">category:</label>
                <select Name="category" required class="form-control">
                    <option value="">Select a category</option>
                    <option value="Electronics">Electronics</option>
                    <option value="Clothing">Clothing</option>
                    <option value="Home">Home</option>
                    <option value="Sports">Sports</option>
                    <option value="Books">Books</option>
                </select>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <label for="instock_Quantity">instock_Quantity:</label>
                <input type="number" Name="instock_Quantity" class="form-control" placeholder="44.00">
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <label for="regular_price">Regular Price:</label>
                <input type="number" Name="regular_price" required class="form-control" placeholder="50.00">
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <label for="sale_price">Sale Price:</label>
                <input type="number" Name="sale_price" required class="form-control" placeholder="80.00">
            </div>

            <div class="col-md-6">
                <div class="form-group mt-2">
                    <label for="">Update Feature Image</label>
                    <input type="file" Name="image" id="" class="form-control" placeholder=""
                        aria-describedby="helpId">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <label for="Tax96">Tax96:</label>
                <input type="number" Name="Tax96" required class="form-control" placeholder="0.00">
            </div>

            <div class="col-md-6">
                <div class="form-group mt-2">
                    <label for="">Add More Images</label>
                    <input type="file" Name="image" id="" class="form-control" placeholder=""
                        aria-describedby="helpId">
                </div>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-6">
                <button id="cancelButton" type="button" class="btn btn-secondary">Cancel</button>
            </div>
            <div class="col-md-6 text-end">
                <input id="updateButton" type="submit" class="btn btn-primary" value="Update">
            </div>
        </div>
        <script>
            $(document).ready(function() {
                // Handle cancel button click event
                $('#cancelButton').click(function() {
                    // Redirect the user to a specific page
                    window.location.href = '/test';

                    // Or clear the form fields
                    $('#formId')[0].reset();
                });
            });
        </script>
    </form>
    <footer>
        <p>
            <a href="contact">Contact</a>
            <a href="FAQ">Help/FAQ</a>
            <a href="howdoesitwork">How Does it Work?</a>
        <p>All right reserved.<br>
        </p>
    </footer>
</body>

</html>
