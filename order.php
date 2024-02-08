<?php
include  "connect.php";

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
        <button><a class="nav-link px-3" href="addcustomer.php">addCustomer</a></button>
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
                    </ul>

                </div>
            </nav>
            <form id="myForm" class="needs-validation" novalidate>

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
                                Please choose a unique and valid password.
                            </div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="selc">Customer name</label>
                            <div class="form-group">
                                <select class="form-control" id="customer" name="fname" method="get">
                                    <?php
                                    // Fetch usernames from the database and populate the dropdown
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
                        <div class="form-group col-md-6">
                            <label for="sell">Last name</label>
                            <div class="form-group">
                                <select class="form-control" id="lname" name="lname">
                                    <!-- Last names will be dynamically populated based on the selected first name -->
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="inputStartDate">Date Start</label>
                            <input type="date" name="dateS" class="form-control" id="inputStartDate" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputEndDate">Date End</label>
                            <input type="date" name="dateE" class="form-control" id="inputEndDate" required>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="car">Car ID</label>
                            <input type="number" name="carid" class="form-control" id="car" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="price">Price</label>
                            <input type="number" name="price" class="form-control" id="price" required>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="pay">Pay</label>
                            <input type="number" name="pay" class="form-control" id="pay" required>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">Submit order</button>

                </main>
            </form>




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
    <script>
    // Custom function to validate phone number (you can modify this function according to your validation logic)
    function isValidPhoneNumber(phoneNumber) {
        // Add your phone number validation logic here
        // For example, you can use a regular expression to check the format
        var phoneRegex = /^\d{10}$/;
        return phoneRegex.test(phoneNumber);
    }
    </script>
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
        'aria-hidden': 'true'
    })

    // Graphs
    var ctx = document.getElementById('myChart')
    // eslint-disable-next-line no-unused-vars

})()
document.addEventListener('DOMContentLoaded', function() {
    var form = document.getElementById('myForm');

    form.addEventListener('submit', function(event) {
        if (!form.checkValidity()) {
            event.preventDefault();
            event.stopPropagation();
        }

        form.classList.add('was-validated');
    });
});


$(document).ready(function() {
    // Event handler for when the customer's first name dropdown changes
    $('#customer').change(function() {
        // Get the selected first name
        var selectedFirstName = $(this).val();

        // Make an AJAX request to get_last_names.php
        $.ajax({
            type: 'GET',
            url: 'get_last_names.php',
            data: {
                fname: selectedFirstName
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

$('#myForm').on('submit', function(e) {


    e.preventDefault();
    var postData = $(this).serializeArray();

    console.log($(this).serializeArray());

    $.ajax({
        url: 'addorder.php', // Corrected URL to match form action
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