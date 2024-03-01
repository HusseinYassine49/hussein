<?php
include "../includes/connect.php";
session_start();
?>
<!doctype html>
<html lang="en">

<head>



    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js"></script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <title>Dashboard Template · Bootstrap v5.0</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/dashboard/">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.1.4/Chart.bundle.min.js'></script>

    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js"></script>

    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }

        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }

        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa;
        }

        /* Header Styles */
        .navbar {
            background-color: #343a40;
        }

        .navbar-brand {
            color: #ffffff;
        }

        .navbar-brand:hover {
            color: #ffffff;
        }

        .nav-link {
            color: #ffffff;
        }

        /* Form Styles */
        .container-fluid {
            margin-top: 20px;
        }

        .form-row {
            margin-bottom: 15px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        /* Button Styles */
        .btn-primary {
            background-color: #007bff;
            color: #ffffff;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            color: #ffffff;
        }

        /* Input Styles */
        .form-control {
            border: 1px solid #ced4da;
            border-radius: 4px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        /* File Input Styles */
        .input-file {
            display: block;
            margin-top: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .flex-column {
            /* background-color: #B2F0E8; */
            height: 100%;
        }

        .position-sticky {
            height: 100%;
        }
    </style>


    <!-- Custom styles for this template -->
    <link href="../style2.css" rel="stylesheet">
</head>

<body>

    <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
        <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#">Company name</a>
        <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="navbar-nav">
            <div class="nav-item text-nowrap">
                <a class="nav-link px-3" href="../index.php">Sign out</a>
            </div>
        </div>
    </header>

    <div class="container-fluid">
        <div class="row">
            <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
                <div class="position-sticky pt-3">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="../carr/dashboard.php">
                                <span data-feather="home"></span> Dashboard
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../hit/addhit.php">
                                <span data-feather="file"></span> new maintenance
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../carr/prodect.php">
                                <span data-feather="shopping-cart"></span> AddCar
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="customer.php">
                                <span data-feather="users"></span> Customers
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../order/pay.php">
                                <span data-feather="bar-chart-2"></span> payment
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../hit/paymaintenance.php">
                                <span data-feather="layers"></span> paymaintenance
                            </a>
                        </li>
                        <?php

                        // Check user role for permission control
                        $isAdmin = ($_SESSION['role'] === 'admin');

                        // Check if the role is passed as a GET parameter
                        $roleFromURL = isset($_GET['role']) ? $_GET['role'] : '';
                        if ($isAdmin) {
                            echo ' <li class="nav-item">
                        <a class="nav-link" href="../action/actionuser.php">
                            <span data-feather="users"></span> action user 
                        </a>
                    </li>';
                        } ?>
                    </ul>


                </div>
            </nav>

            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <form id="myForm" method="post" enctype="multipart/form-data">

                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="inputEmail4">customer full name</label>
                            <div class="form-group">
                                <input type="text" class="form-control" name="fname" id="inputname" placeholder="fname" required>
                            </div>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="inputEmail4">phone number</label>
                            <div class="form-group">
                                <input type="tel" id="phone" name="phone" class="form-control" id="inputAddress" placeholder="1234" required>

                            </div>
                        </div>
                    </div>
                    <div class="form-row">

                        <div class="form-group col-md-4">
                            <label for="inputPassword4">email</label>
                            <input type="email" class="form-control" name="email" id="email" placeholder="email@gmail.com" required>
                        </div>


                        <div class="form-group col-md-4">

                            <label for="inputCity">City</label>
                            <input type="text" class="form-control" id="inputCity" name="city" required>

                        </div>
                        <?php $username = $_SESSION['username']; ?>
                        <input type="hidden" name="username" value="<?php echo $username; ?>">

                        <div class="form-group col-md-4">
                            <label for="inputAddress">Address</label>
                            <input type="text" class="form-control" id="inputAddress" name="address1" placeholder="1234 Main St" required>
                        </div>

                    </div>


                    <button type="submit" class="btn btn-primary">add
                        Customer</button>

                </form>
            </main>





        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous">
    </script>

    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</body>

</html>
<script>
    function validatePhone(input) {
        // Remove non-numeric characters
        input.value = input.value.replace(/\D/g, '');
    }

    /* globals Chart:false, feather:false */

    (function() {
        'use strict'

        feather.replace({
            'aria-hidden': 'false'
        })

        // Graphs
        var ctx = document.getElementById('myChart')
        // eslint-disable-next-line no-unused-vars

    })()


    $('#addbrandbutton').click(function() {

        $.ajax({
            url: 'addbrand.php',
            type: 'get',
            data: {
                ajaxtype: 'topup'
            },
            success: function(response) {
                $('#addBrandModal').modal('hide');
                $('.modal-body').html(response);
            }
        });
    });

    $('#myForm').on('submit', function(e) {
        e.preventDefault();
        console.log($(this).serializeArray());

        $.ajax({
            url: 'addcust.php', // Corrected URL to match form action
            type: 'POST',
            data: $(this).serializeArray(),

            success: function(data) {
                console.log(data); // Log the response for debugging
                if (data) {
                    $('#myForm')[0].reset();
                    popup("success");
                } else {
                    popup("error", "Error: " + data, "Error while updating, double check the fields!");
                }
            },
            error: function(jXHR, textStatus, errorThrown) {
                alert(errorThrown);
            }
        });
    });

    function popup($type, $title, $message) {
        Swal.fire({
            type: $type,
            title: $title,
            html: $message

        })
        return true;
    };
</script>