<?php
include  "connect.php";
session_start();

$car_id = isset($_GET['id']) ? $_GET['id'] : 0;
$Pro_id = $car_id;
$disableddates = array(); // Initialize as an empty array
$queryres = mysqli_query($conn, "SELECT start_date,end_date FROM rental WHERE idcar='" . $Pro_id . "' AND YEAR(start_date) = YEAR(CURDATE()) OR YEAR(start_date) = YEAR(CURDATE()) + 1") or die(mysqli_error($conn));

while ($row = mysqli_fetch_array($queryres)) {
    $start = $row['start_date'];
    $end = $row['end_date'];
    $disableddates[] = array("from" => $start, "to" => $end);
}
?>
<script>
var disableddates = <?php echo json_encode($disableddates); ?>;
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Bootstrap JS bundle (includes Popper) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>

<!-- Feather Icons -->
<script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js"></script>

<!-- Chart.js -->


<!-- SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- jQuery UI -->
<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>



<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>



<link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/dashboard/">


<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.1.4/Chart.bundle.min.js'></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!-- Chart.js CSS (if you have a separate CSS file for Chart.js styles) -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">

<!-- Font Awesome CSS -->
<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.css"> -->

<!-- Optional: Include your own stylesheets if needed -->

<!-- Bootstrap JS Bundle (includes Popper.js) -->

<!-- Chart.js JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js"></script>


<!-- Include jQuery UI -->



<!-- Your other head elements go here -->

<!-- Your other head elements go here -->
<!-- Bootstrap core CSS -->
<!-- <link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet"> -->


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <title>Dashboard Template · Bootstrap v5.0</title>

    <link href="dropdowns.css" rel="stylesheet">
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
    <script>

    </script>

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
            <form id="myForm" class="needs-validation" novalidate>

                <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputEmail4">Username</label>
                            <div class="form-group">
                                <select class="form-control" id="user" name="username">
                                    <option></option>
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
                            <label for="selc">Customer id</label>
                            <div class="form-group">
                                <select class="form-control" id="id" name="id" method="get">
                                    <option></option>
                                    <?php
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
                            <label for="inputStartDate">Date Start</label>
                            <input type="date" name="dateS" class="form-control" id="inputStartDate"
                                value="<?php echo $start; ?>" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputEndDate">Date End</label>
                            <input type="date" name="dateE" class="form-control" id="inputEndDate"
                                value="<?php echo $end; ?>" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="car">Car:</label>

                            <?php
                            $iquery = "SELECT * FROM `car` WHERE `id`='$car_id'";
                            $iresult = mysqli_query($conn, $iquery);
                            $irow = mysqli_fetch_assoc($iresult);
                            ?>

                            <input type="text" id="car" name="car" value="<?php echo '' . $irow['Price'] . ''; ?>"
                                readonly>
                        </div>

                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="car">Car ID</label>
                            <input type="number" name="carid" class="form-control" id="id"
                                value="<?php echo '' . $car_id . '' ?>" required>
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


                    <button type="submit" class="btn btn-primary" id="submitOrderBtn">Submit order</button>

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


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>

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
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
</body>

</html>
<script>
jQuery.noConflict();
jQuery(document).ready(function($) {
    flatpickr("#inputStartDate", {
        dateFormat: "Y-m-d",
        disable: disableddates,
        onClose: function(selectedDates) {
            if (selectedDates[0] > $("#inputEndDate").value) {
                $("#inputEndDate").value = "";
            }
        }
    });

    flatpickr("#inputEndDate", {
        dateFormat: "Y-m-d",
        disable: disableddates,
        onClose: function(selectedDates) {
            if (selectedDates[0] < $("#inputStartDate").value) {
                $("#inputStartDate").value = "";
            }
        }
    });
});
</script>

<script>
var start = '<?php echo "$start" ?>';
var end = <?php echo "$end" ?>;
</script>
<script>
// document.addEventListener('DOMContentLoaded', function() {
//     var startt = '<?php echo $start; ?>';
//     var end = '<?php echo $end; ?>';

//     flatpickr("#inputStartDate, #inputEndDate", {
//         dateFormat: 'd-m-Y',
//         disable: disableddates,
//         onClose: function(selectedDates, dateStr, instance) {
//             var selectedStartDate = $("#inputStartDate").val();
//             var selectedEndDate = $("#inputEndDate").val();

//             if (selectedEndDate < end || selectedEndDate > start) {
//                 $("#inputEndDate").val("");
//                 // Optionally, you can show a message or perform other actions here
//             }

//             if (selectedStartDate < end || selectedStartDate > start) {
//                 $("#inputStartDate").val("");
//                 // Optionally, you can show a message or perform other actions here
//             }
//         }
//     });
// });
</script>

<script>
$('#inputStartDate, #inputEndDate, #car').change(function() {
    // Get the selected start and end dates
    var startDate = new Date($('#inputStartDate').val());
    var endDate = new Date($('#inputEndDate').val());

    // Calculate the number of days between start and end dates
    var timeDiff = Math.abs(endDate.getTime() - startDate.getTime());
    var daysDiff = Math.ceil(timeDiff / (1000 * 3600 * 24));

    // Get the car price from the PHP variable
    var carPrice = $('#car').val();

    // Calculate the total price
    var totalPrice = carPrice * daysDiff;

    // Update the "Price" input field with the calculated total price
    $('#price').val(totalPrice);
});

$("#inputStartDate").change(function() {
    selectedStartDate = $(this).val();
    $("#inputEndDate").prop("min", $(this).val());
    if ($("#inputEndDate").val() < selectedStartDate) {
        $("#inputEndDate").val("");
    }

});

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
    $('select[name="id"]').change(function() {
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