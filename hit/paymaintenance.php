<?php
include "../includes/connect.php";
global $conn;

session_start();

// Check if the user is logged in


// Check user role for permission control
$isAdmin = ($_SESSION['role'] === 'admin');
$username = $_SESSION['username'];

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
    <title>Customers</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/dashboard/">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
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
    <!-- Bootstrap 5 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.0/css/dataTables.bootstrap5.css">

    <!-- Your existing stylesheets and scripts remain unchanged -->
    <style>
    .btn-green {
        margin-block: 10px;
        background-color: #28a745;
        /* Green color */
        border-color: #28a745;
        /* Green color for border */
        color: #fff;
        /* White text color */
        box-shadow: 0 4px 6px rgba(40, 167, 69, 0.1);
        /* Add shadow */
        padding: 8px 12px;
        /* Adjust padding for smaller size */
        font-size: 14px;
        /* Adjust font size if needed */
    }

    /* Rest of your existing styles */
    .btn-green:hover {
        margin-block: 10px;
        background-color: #218838;
        /* Darker green on hover */
        border-color: #218838;
        /* Darker green for border on hover */
    }

    .card-header {
        background-color: #343A40;
        /* Use the background color of your navbar */
        color: black;
        /* Change the text color if needed */
    }

    .card {
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        transition: box-shadow 0.3s ease-in-out;
        margin-bottom: 10px;
        /* Adjust the bottom margin as needed */
        margin-right: 10px;
        /* Add margin between cards */
    }

    .card:hover {
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
    }

    /* Rest of your existing styles */
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

    .main-content-card {
        margin-right: 30px;
        /* Add margin between cards in the main content area */
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<body>
    <?php $username = $_SESSION['username']; ?>
    <h1 name=username hidden><?php echo "$username" ?> </h1>


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
                            <a class="nav-link" href="addhit.php">
                                <span data-feather="file"></span> new maintenance
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../carr/prodect.php">
                                <span data-feather="shopping-cart"></span> AddCar
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
                        <a class="nav-link" href="../action/actionuser.php">
                            <span data-feather="users"></span> action user 
                        </a>
                    </li>';
                        } ?>
                    </ul>

                </div>
            </nav>

            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div class="row">
                    <div class="table-responsive">
                        <input type="hidden" id="username" name="username" value="<?php echo $username; ?>">
                        <table id="example" class="table table-striped" class="table table-striped table-sm">

                            <thead>
                                <tr>
                                    <th scope="col">id</th>

                                    <th scope="col">name</th>

                                    <th scope="col">how much do you pay</th>
                                    <th scope="col">maintenance</th>
                                    <?php
                                    if ($isAdmin) {
                                        echo '<th scope="col">action </th>';
                                    }
                                    ?>

                                </tr>
                            </thead>
                            <tbody>
                                <?php

                                $query = "SELECT `id`, `id_car`, `pay`, `type`,`maintenance` FROM `maintenance`ORDER BY `type` ASC ";



                                $result = mysqli_query($conn, $query);

                                if ($result) {
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $id = $row['id_car'];
                                        $iquery = "SELECT `Hit` , `number` FROM `car` WHERE id like '$id'  ";
                                        $iresult = mysqli_query($conn, $iquery);
                                        $irow = mysqli_fetch_assoc($iresult);

                                        echo "<tr>";
                                        echo "<td>" . $row['id'] . "</td>";
                                        echo "<td>" . $row['id_car'] . "-" . $irow['number'] . "</td>";
                                        echo "<td>" . $row['pay'] . "</td>";
                                        echo "<td>" . $row['maintenance'] . "</td>";
                                        if ($row['type'] == 'notpaid' || $row['type'] == 'notpayd' && $isAdmin) {


                                            echo '<td><button type="button" id="payybutton" class="btn btn-green " data-toggle="modal" data-maintenance-id="' . $row['id'] . '" data-target="#payy">pay</button></td>


<div class="modal fade" id="payy" tabindex="-1" role="dialog"
    aria-labelledby="payyLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="payyLabel">pay maintenance </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" aria_hidden="true">
            <div id="test"></div>
                <!-- Your modal body content goes here -->
            </div>
        </div>
    </div>
</div>
';

                                            echo '</div>';
                                        } else {
                                            echo '<td></td>';
                                        }

                                        echo '<script>';
                                        echo 'var maintenanceId = ' . json_encode($row['id']) . ';';
                                        echo '</script>';
                                    };


                                    // Free result set
                                    mysqli_free_result($result);
                                } else {
                                    echo "Error: " . mysqli_error($conn);
                                }
                                ?>
                            </tbody>
            </main>




        </div>
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

    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdn.datatables.net/2.0.0/js/dataTables.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/2.0.0/js/dataTables.bootstrap5.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdn.datatables.net/2.0.0/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.0.0/js/dataTables.bootstrap5.js"></script>
    <script>
    $(document).ready(function() {
        // Use class instead of ID for the button
        $('.btn-green').click(function() {
            var maintenanceId = $(this).data('maintenance-id');
            var username = '<?php echo $username; ?>';

            $.ajax({
                url: '../hit/payhit.php',
                type: 'get',
                data: {
                    ajaxtype: 'topup',
                    maintenanceId: maintenanceId,
                    username: username
                },
                success: function(response) {
                    console.log(username);
                    $('#payy').modal('hide');
                    $('#test').html(response);
                }
            });
        });

        // DataTable initialization
        $('#example').DataTable();

        // Your remaining scripts remain unchanged


        function popup($type, $title, $message) {
            Swal.fire({
                icon: $type,
                title: $title,
                html: $message
            });

            return true;
        }

        /* globals Chart:false, feather:false */
        (function() {
            'use strict';

            feather.replace({
                'aria-hidden': 'true'
            });

            // Graphs
            var ctx = document.getElementById('myChart');
            // eslint-disable-next-line no-unused-vars
        })();
    });
    </script>

    <!-- Your remaining HTML code -->
</body>

</html>