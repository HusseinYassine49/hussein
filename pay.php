<?php
include "connect.php";
session_start();
$customer_id = isset($_GET['id_customer']) ? $_GET['id_customer'] : 0;
$rest = isset($_GET['rest']) ? $_GET['rest'] : 0;
$id = isset($_GET['id']) ? $_GET['id'] : 0;

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
                                <span data-feather="shopping-cart"></span> add carr
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
                        // Check user role for permission control
                        $isAdmin = ($_SESSION['role'] === 'admin');

                        // Check if the role is passed as a GET parameter
                        $roleFromURL = isset($_GET['role']) ? $_GET['role'] : '';
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

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputEmail4">Username</label>
                        <div class="form-group">

                            <select class="form-control" id="user" name="username">
                                <?php
                                // Fetch usernames from the database and populate the dropdown
                                $query = "SELECT username FROM user";
                                $result = mysqli_query($conn, $query);

                                if ($result && mysqli_num_rows($result) > 0) {
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        echo "<option value='" . $row['username'] . "'>" . $row['username'] . "</option>";
                                    }
                                }
                                ?>

                            </select>
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputPassword4">Password</label>
                        <input type="password" class="form-control" id="inputPassword4" name="password" required>
                        <div class="invalid-tooltip">
                            Please choose a unique and valid username.
                        </div>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="selc">Customer id</label>
                        <div class="form-group">
                            <select class="form-control" id="id" name="customer_id" method="get">
                                <?php
                                if ($customer_id != 0) {
                                    echo '<option value=' . $customer_id . '>' . $customer_id . ' </option>';
                                };

                                // Fetch usernames from the database and populate the dropdown
                                $query = "SELECT id FROM customer";
                                $result = mysqli_query($conn, $query);

                                if ($result && mysqli_num_rows($result) > 0) {

                                    while ($row = mysqli_fetch_assoc($result)) {

                                        echo "<option value='" . $row['id'] . "'>" . $row['id'] . "</option>";
                                    }
                                }
                                ?>

                            </select>
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="sell">customer name</label>
                        <div class="form-group">
                            <select class="form-control" id="fname" name="fname">
                                <!-- Last names will be dynamically populated based on the selected first name -->
                            </select>
                        </div>
                    </div>

                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="pay">pay</label>
                        <input type="number" class="form-control" id="pay" required>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="price">rest</label>
                        <?php
                        if ($rest != 0) {
                            echo '<input type="number" class="form-control" id="rest" required value=' . $rest . '>';
                        } else {
                            echo '<input type="number" class="form-control" id="rest" required>';
                        }

                        ?>

                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Submit pay</button>
                <br>
                <h2>Customer rentel</h2>
                <form class="d-flex" method="GET" action="pay.php">
                    <input class="form-control me-2" type="search" placeholder="name or date" aria-label="Search"
                        name="search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
                <div class="table-responsive">
                    <table class="table table-striped table-sm">

                        <thead>
                            <tr>
                                <th scope="col">id</th>
                                <th scope="col">id customer</th>
                                <th scope="col">name</th>
                                <th scope="col">idcar </th>
                                <th scope="col">end_date</th>
                                <th scope="col">rest</th>
                                <th scope="col">insert</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            include "connect.php";
                            if (isset($_GET['search']) && $_GET['search'] != '') {
                                $searchQuery = $_GET['search'];
                                $query = "SELECT * FROM rental WHERE fname LIKE  '$searchQuery' OR end_date LIKE '$searchQuery'  ORDER BY `rest` ASC";
                            } else {

                                $query = "SELECT * FROM rental ORDER BY `rest` ASC"; // Replace 'your_table_name' with your actual table name
                            }
                            $result = mysqli_query($conn, $query);

                            if ($result && mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    if ($row['rest'] > 0) {
                                        echo "<tr>";
                                        echo "<td>" . $row['id'] . "</td>";
                                        echo "<td>" . $row['id_customer'] . "</td>";
                                        echo "<td>" . $row['fname'] . "</td>";
                                        echo "<td>" . $row['idcar'] . "</td>";
                                        echo "<td>" . $row['end_date'] . "</td>";
                                        echo "<td>" . $row['rest'] . "</td>";
                                        echo '<td> <button id="insert" type="button" ><a href="pay.php?id_customer=' . $row['id_customer'] . '&rest=' . $row['rest'] . '&id=' . $row['id'] . '" class="btn btn-sm btn-outline">insert</a></button></td>';

                                        echo "</tr>";
                                    } else {
                                    }
                                }
                            } else {
                                echo "<tr><td colspan='5'>No data found</td></tr>"; // Adjust colspan based on the number of columns
                            }
                            ?>

                        </tbody>
                    </table>
                </div>
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
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>

</html>
<script>
/* globals Chart:false, feather:false */

$(document).ready(function() {

    $('select[name="customer_id"]').change(function() {

        // Get the selected first name 
        var selectedId = $(this).val();

        // Make an AJAX request to get_first_names.php
        $.ajax({
            type: 'GET',
            url: 'get_firs_names.php',
            data: {
                id: selectedId,
            },
            success: function(data) {
                // Update the last name dropdown with the fetched options
                $('#fname').html(data);
            },
            error: function() {
                console.error('Error fetching last names.');
            }
        });
    });


    $('#insert').click(function() {
        // Get the selected first name 
        var selectedId = $(this).val();

        // Make an AJAX request to get_first_names.php
        $.ajax({
            type: 'GET',
            url: 'get_firs_names.php',
            data: {
                id: selectedId,
            },
            success: function(data) {
                // Update the last name dropdown with the fetched options
                $('#fname').html(data);
            },
            error: function() {
                console.error('Error fetching last names.');
            }
        });
    });
});

(function() {
    'use strict'

    feather.replace({
        'aria-hidden': 'true'
    })

    // Graphs
    var ctx = document.getElementById('myChart')
    // eslint-disable-next-line no-unused-vars

})();

$(document).ready(function() {
    // Event handler for when the customer's first name dropdown changes
    $('#fname').change(function() {
        $('select[name="fname"]').change(function() {
            // Get the selected first name
            var selectedfname = $(this).val();

            // Make an AJAX request to get_first_names.php
            $.ajax({
                type: 'GET',
                url: 'get_last_names.php',
                data: {
                    id: selectedname,
                },
                success: function(data) {
                    // Update the last name dropdown with the fetched options
                    $('#lname').html(data);
                },
                error: function() {
                    console.error('Error fetching last names.');
                }
            });
        });
    });
});

$('#myForm').on('submit', function(e) {
    e.preventDefault();
    console.log($(this).serializeArray());

    $.ajax({
        url: 'editpay.php', // Corrected URL to match form action
        type: 'POST',
        data: $(this).serializeArray(),

        success: function(data) {
            console.log(data); // Log the response for debugging
            if (data) {
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