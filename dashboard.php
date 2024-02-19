<?php
include "connect.php";
global $conn;

session_start();

// Check if the user is logged in


// Check user role for permission control
$isAdmin = ($_SESSION['role'] === 'admin');

// Check if the role is passed as a GET parameter
$roleFromURL = isset($_GET['role']) ? $_GET['role'] : '';

?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <title>Dashboard Template · Bootstrap v5.0</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/dashboard/">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="sytlesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.1.4/Chart.bundle.min.js'></script>

    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <!-- Chart.js CSS (if you have a separate CSS file for Chart.js styles) -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">

    <!-- Font Awesome CSS -->
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.css"> -->

    <!-- Optional: Include your own stylesheets if needed -->

    <!-- Bootstrap JS Bundle (includes Popper.js) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Chart.js JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js"></script>
    <!-- Bootstrap core CSS -->
    <!-- <link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet"> -->

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

    .flex-column {
        /* background-color: #B2F0E8; */
        height: 100%;
    }

    .position-sticky {
        height: 100%;
    }
    </style>


    <!-- Custom styles for this template -->
    <link href="style2.css" rel="stylesheet">
</head>

<body>

    <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
        <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#">Company name</a>
        <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse"
            data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="navbar-nav">
            <div class="nav-item text-nowrap">
                <a class="nav-link px-3" href="index.php">Sign out</a>
            </div>
        </div>
    </header>

    <div class="container-fluid">
        <div class="row">
            <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
                <div class="position-sticky pt-3">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="dashboard.php">
                                <span data-feather="home"></span> Dashboard
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="addhit.php">
                                <span data-feather="file"></span> new maintenance
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="prodect.php">
                                <span data-feather="shopping-cart"></span> AddCar
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="customer.php">
                                <span data-feather="users"></span> Customers
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="pay.php">
                                <span data-feather="bar-chart-2"></span> payment
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="paymaintenance.php">
                                <span data-feather="layers"></span> paymaintenance
                            </a>
                        </li>
                        <?php
                        if ($isAdmin) {
                            echo ' <li class="nav-item">
                        <a class="nav-link" href="actionuser.php">
                            <span data-feather="users"></span> action user 
                        </a>
                    </li>';
                        } ?>
                    </ul>

                </div>
            </nav>

            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div class="album py-5 bg-light">
                    <div class="container">

                        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                            <?php




                            $query = 'SELECT `id`, `Model`, `Cylinder`, `Season`, `Brand`, `Hit`, `Time`, `Price` FROM `car` ';
                            $result = mysqli_query($conn, $query);
                            if ($result) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    // Fetching photo for the current car
                                    $queryphoto = "SELECT `photo` FROM `image` WHERE `type`='front' AND `id_car`={$row['id']}";
                                    $resultphoto = mysqli_query($conn, $queryphoto);
                                    $photo_row = mysqli_fetch_assoc($resultphoto);
                                    $queryadmin = "SELECT ";

                                    echo '<div class="col">';
                                    echo '<div class="card shadow-sm">';
                                    echo '<img src="' . $photo_row['photo'] . '" alt="Car Photo" class="bd-placeholder-img card-img-top" width="100%" height="225">';
                                    echo '<h5 class="card-text">' . $row['id'] . ' </h5>';
                                    echo '<div class="card-body">';
                                    echo '<p class="card-text">Model: ' . $row['Model'] . '<br>Cylinder: ' . $row['Cylinder'] . '<br>Season: ' . $row['Season'] . '<br>Brand: ' . $row['Brand'] . '<br>Hit: ' . $row['Hit'] . '</p>';
                                    echo '<div class="d-flex justify-content-between align-items-center">';
                                    echo '<div class="btn-group">';
                                    echo '<button type="button" class="btn btn-sm btn-outline-secondary"><a href="view.php?id=' . $row['id'] . '" class="btn btn-sm btn-outline">View</a></button>';
                                    echo '<button type="button" class="btn btn-sm btn-outline-success"><a href="order.php?id=' . $row['id'] . '" class="btn btn-sm btn-outline">Order</a></button>';

                                    if ($isAdmin) {
                                        echo '<button type="button" class="btn btn-sm btn-outline-danger" onclick="deletecarr(' . $row['id'] . ') " class="btn btn-sm btn-outline-secondary"">Delete</button>';
                                    }

                                    echo '</div>';
                                    echo '<small class="text-muted">' . $row['Price'] . '$</small>';
                                    echo '</div>';
                                    echo '</div>';
                                    echo '</div>';
                                    echo '</div>';
                                }
                            }

                            ?>


                        </div>
                    </div>

            </main>




            </main>
        </div>
    </div>


    <!-- <script src="../assets/dist/js/bootstrap.bundle.min.js"></script> -->

    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js"
        integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous">


    </script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"
        integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous">
    </script>

    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>

</html>
<script>
/* globals Chart:false, feather:false */
function deletecarr(customerId) {
    Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to delete this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!"
    }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire({
                title: "Deleted!",
                text: "Your file has been deleted.",
                icon: "success"
            });
            $.ajax({
                url: 'deletcarr.php',
                type: 'POST',
                data: {
                    id: customerId
                },
                success: function(response) {
                    // Handle the response if needed
                    console.log(response);
                    // Reload the page or update the customer list
                    location.reload();
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    alert(errorThrown);
                }
            });
        }
    });
    // You can use AJAX to send the customer ID to a deletion script

};
(function() {
    'use strict'

    feather.replace({
        'aria-hidden': 'true'
    })

    // Graphs
    var ctx = document.getElementById('myChart')
    // eslint-disable-next-line no-unused-vars

})();
</script>