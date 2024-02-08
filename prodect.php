<?php
include "connect.php";

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
                    </ul>

                </div>
            </nav>
            <form id="myForm" method="post" enctype="multipart/form-data" novalidate  >

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
                    <br>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="inputEmail4">color car</label>
                            <div class="form-group">
                                <input type="text" name="Model" class="form-control" id="inputcar" placeholder="model"
                                    required>
                            </div>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputEmail4">Brand</label>
                            <div class="form-group">
                                <select class="form-control" id="exampleFormControlSelect1" name="Brand">
                                    <?php
                                    // Fetch brand names from the database and populate the dropdown
                                    $query = "SELECT brandName FROM brand";
                                    $result = mysqli_query($conn, $query);

                                    if ($result && mysqli_num_rows($result) > 0) {
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            echo "<option value='" . $row['brandName'] . "'>" . $row['brandName'] . "</option>";
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                            <button type="button" class="btn btn-primary" data-toggle="modal" id="addbrandbutton"
                                data-target="#addBrandModal">
                                Add Brand
                            </button>
                        </div>

                        <div class="modal fade" id="addBrandModal" tabindex="-1" role="dialog"
                            aria-labelledby="addBrandModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="addBrandModalLabel">Add New </h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body" aria_hidden="true">
                                        <!-- Your modal body content goes here -->
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="inputEmail4">years</label>
                            <div class="form-group">
                                <input type="number" id="season" name="Season" class="form-control" id="inputAddress"
                                    placeholder="2000" required>

                            </div>
                        </div>
                    </div>
                    <div class="form-row">

                        <div class="form-group col-md-4">
                            <label for="inputPassword4">Cylinder</label>
                            <input type="number" name="Cylinder" class="form-control" id="cylinder" placeholder="4"
                                required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputAddress">maintenance</label>
                        <input type="text" name="Hit" class="form-control" id="inputAddress" placeholder="1234 Main St"
                            required>
                    </div>

                    <div class="form-row">

                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="inputStartDate">Date </label>
                            <input type="date" name="Time" class="form-control" id="inputStartDate" required>
                        </div>




                        <div class="form-group col-md-4">
                            <label for="inputPassword4">Price</label>
                            <input type="number" name="Price" class="form-control" id="price" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="frontPhotos">Front Photos</label>
                            <input type="file" class="form-control" id="frontPhotos" name="frontPhotos" multiple>
                            <small class="form-text text-muted">Choose front photo(s) from your
                                device.</small>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="backPhotos">Back Photos</label>
                            <input type="file" class="form-control" id="backPhotos" name="backPhotos" multiple>
                            <small class="form-text text-muted">Choose back photo(s) from your
                                device.</small>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="rightPhotos">Right Photos</label>
                            <input type="file" class="form-control" id="rightPhotos" name="rightPhotos" multiple>
                            <small class="form-text text-muted">Choose right photo(s) from your
                                device.</small>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="leftPhotos">Left Photos</label>
                            <input type="file" class="form-control" id="leftPhotos" name="leftPhotos" multiple>
                            <small class="form-text text-muted">Choose left photo(s) from your
                                device.</small>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="intPhotos">inside Photos</label>
                            <input type="file" class="form-control" id="intPhotos" name="intPhotos" multiple>
                            <small class="form-text text-muted">Choose inside photo(s) from your
                                device.</small>
                        </div>
                    </div>



                    <button type="submit" class="btn btn-primary">Submit Car</button>

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


</body>

</html>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

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
    var file = $('input[type="file"]').val().trim();
    var formData = new FormData($(this)[0]);
    e.preventDefault();
    console.log($(this).serializeArray());
    if (file) {
        $.ajax({
            url: 'addcarr.php',
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function(data) {
                if (data > 0) {
                    var table = $('#mytable').DataTable();
                    table.ajax.reload();
                    $(this).trigger('reset');
                    document.getElementById('theForm');
                    popup("success", "Success", "Doctor successfully inserted!");
                } else {
                    popup("error", data,
                        "Error while updating, double check the fields!");
                }
            },
            error: function(jXHR, textStatus, errorThrown) {
                alert(errorThrown);
            }
        });
    }
});


function popup($type, $title, $message) {
    Swal.fire({
        icon: $type,
        title: $title,
        html: $message

    })
    return true;
};
</script>