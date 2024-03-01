<?php
include "../includes/connect.php";
session_start();

$rest = isset($_GET['rest']) ? $_GET['rest'] : 0;
$id = isset($_GET['id']) ? $_GET['id'] : 0;
$queryid = "SELECT id_customer FROM rental where id ='$id'";
$resultid = mysqli_query($conn, $queryid);

if ($resultid && mysqli_num_rows($resultid) > 0) {
    while ($row = mysqli_fetch_assoc($resultid)) {
        $querycustomer = "SELECT * FROM customer where id ='" . $row['id_customer'] . "'";
        $resultcustomer = mysqli_query($conn, $querycustomer);
        $rowcustomer = mysqli_fetch_assoc($resultcustomer);
    }
}
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.0/css/dataTables.bootstrap5.css">

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
    <link href="../css/style2.css" rel="stylesheet">
</head>

<body>
    <?php $username = $_SESSION['username']; ?>
    <input type="text" name="username" hidden value="<?php echo $username; ?>">



    <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
        <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#">Company name</a>
        <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse"
            data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false"
            aria-label="Toggle navigation">
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
                                <span data-feather="shopping-cart"></span> add carr
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../customer/customer.php">
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
                        <a class="nav-link" href="../actionuser.php">
                            <span data-feather="users"></span> action user 
                        </a>
                    </li>';
                        } ?>
                    </ul>


                </div>
            </nav>
            <form id="myForm" class="needs-validation" novalidate>
                <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">


                    <div class="form-row">

                        <div class="form-group col-md-6">
                            <label for="sell">customer name</label>

                            <div class="form-group">
                                <select class="form-control" id="fname" name="fname">
                                    <option></option>
                                    <?php

                                    $query = "SELECT fname FROM customer";
                                    $result = mysqli_query($conn, $query);

                                    if ($result && mysqli_num_rows($result) > 0) {
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            echo "<option value='" . $row['fname'] . "'>" . $row['fname'] . "</option>";
                                        }
                                    }
                                    ?>

                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="pay">pay</label>
                            <input type="number" class="form-control" id="pay" required>
                        </div>
                        <div class="form-group col-md-4" id="price">
                            <label for="price">price</label>
                            <input type="number" class="form-control" required>

                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">Submit pay</button>
            </form>
            <br>
            <h2>Customer rentel</h2>

            <div class="table-responsive">
                <table id="example" class="table table-striped" class="table table-striped table-sm">

                    <thead>
                        <tr>
                            <th scope="col">id</th>

                            <th scope="col">name</th>
                            <th scope="col">start_date</th>
                            <th scope="col">end_date</th>
                            <th scope="col">price</th>
                            <th scope="col">pay</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include "../includes/connect.php";


                        $query = "SELECT * FROM rental"; // Replace 'your_table_name' with your actual table name

                        $result = mysqli_query($conn, $query);

                        if ($result && mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {

                                echo "<tr>";
                                echo "<td>" . $row['id'] . "</td>";
                                echo "<td>" . $row['fname'] . "</td>";
                                echo "<td>" . $row['start_date'] . "</td>";
                                echo "<td>" . $row['end_date'] . "</td>";
                                echo "<td>" . $row['price'] . "</td>";
                                echo '<td> <button id="insert" type="button" ><a href="../order/pay.php?id_customer=' . $row['id_customer'] . '&id=' . $row['id'] . '" class="btn btn-sm btn-outline">pay</a></button></td>';

                                echo "</tr>";
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
<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script src="https://cdn.datatables.net/2.0.0/js/dataTables.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.datatables.net/2.0.0/js/dataTables.bootstrap5.js"></script>
<script>
new DataTable('#example');
/* globals Chart:false, feather:false */

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
        // Get the selected first name
        var selected = $(this).val();

        // Make an AJAX request to get_first_names.php
        $.ajax({
            type: 'GET',
            url: '../order/price.php',
            data: {
                fname: selected,
            },
            success: function(data) {
                console.log(data);
                // Update the last name dropdown with the fetched options
                $('#price').html(data);
                console.log();
            },
            error: function() {
                console.error('Error fetching last names.');
            }
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