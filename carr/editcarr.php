<?php
include "../includes/header.php";


?>


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

<form id="myForm" method="post" enctype="multipart/form-data" novalidate  >
    <?php

    global $conn;


    $car_id = isset($_GET['id']) ? $_GET['id'] : 0;
    $query = "SELECT * FROM `car`where id='$car_id' ";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    // Fetch photos for the selected car
    $queryphoto = "SELECT *FROM `image` WHERE  `id_car`={$car_id}";
    $resultphoto = mysqli_query($conn, $queryphoto);
    $rowphoto = mysqli_fetch_assoc($resultphoto);
    // $left=($rowphoto[''];
    // $right=($rowphoto[''];
    // $interface=($rowphoto[''];
    // $back=($rowphoto[''];
    ?>
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <input name=id hidden value="<?php echo "$car_id" ?>"> </input>
        <?php $username = $_SESSION['username']; ?>
        <input name=username hidden value="<?php echo "$username" ?>"> </input>

        <br>
        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="inputEmail4">type car</label>
                <div class="form-group">
                    <input type="text" value="<?php echo "" . $row['Model'] . "" ?>" name="Model" class="form-control" id="inputcar" placeholder="model" required>
                </div>
            </div>
            <div class="form-group col-md-4">
                <label for="inputEmail4">Brand</label>
                <div class="form-group">
                    <select class="form-control" id="exampleFormControlSelect1" name="Brand">
                        <option value="<?php echo "" . $row['Brand'] . "" ?>">
                            <?php echo "" . $row['Brand'] . ""; ?>
                        </option>
                        <?php
                        // Fetch brand names from the database and populate the dropdown
                        $query = "SELECT brandName FROM brand";
                        $result = mysqli_query($conn, $query);

                        if ($result && mysqli_num_rows($result) > 0) {
                            while ($roww = mysqli_fetch_assoc($result)) {
                                echo "<option value='" . $roww['brandName'] . "'>" . $roww['brandName'] . "</option>";
                            }
                        }
                        ?>
                    </select>
                </div>
                <button type="button" class="btn btn-primary" data-toggle="modal" id="addbrandbutton" data-target="#addBrandModal">
                    Add Brand
                </button>
            </div>

            <div class="modal fade" id="addBrandModal" tabindex="-1" role="dialog" aria-labelledby="addBrandModalLabel" aria-hidden="true">
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
                    <input type="number" id="season" name="Season" value="<?php echo "" . $row['Season'] . "" ?>" class="form-control" id="inputAddress" placeholder="2000" required>

                </div>
            </div>
        </div>
        <div class="form-row">

            <div class="form-group col-md-4">
                <label for="inputPassword4">Cylinder</label>
                <input type="number" name="Cylinder" value="<?php echo "" . $row['Cylinder'] . "" ?>" class="form-control" id="cylinder" placeholder="4" required>
            </div>
            <div class="form-group col-md-4">
                <label for="inputPassword4">number</label>
                <input type="text" name="number" value="<?php echo "" . $row['number'] . "" ?>" class="form-control" id="number" placeholder="4" required>
            </div>
        </div>

        <div class="form-group">
            <label for="inputAddress">maintenance</label>
            <input type="text" name="Hit" value="<?php echo "" . $row['Hit'] . "" ?>" class="form-control" id="inputAddress" placeholder="1234 Main St" required>
        </div>

        <div class="form-row">

        </div>
        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="inputStartDate">Date </label>
                <input type="date" name="Time" value="<?php echo "" . $row['Time'] . "" ?>" class="form-control" id="inputStartDate" required>
            </div>




            <div class="form-group col-md-4">
                <label for="inputPassword4">Price</label>
                <input type="number" name="Price" class="form-control" value="<?php echo "" . $row['Price'] . "" ?>" id="price" required>
            </div>
        </div>
        <!-- <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="frontPhotos">Front Photos</label>
                            <input type="file" class="form-control" id="frontPhotos" name="frontPhotos" multiple>
                            <small class="form-text text-muted">Choose front photo(s) from your
                                device.</small>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="backPhotos">Back Photos</label>
                            <input type="file" class="form-control" value
                                id="backPhotos" name="backPhotos" multiple>
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
 -->


        <button type="submit" class="btn btn-primary">Submit Car</button>

    </main>
</form>




</div>
</div>





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
            url: '../carr/addbrand.php',
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
            url: '../carr/ajaxedit.php',
            type: 'POST',
            data: $(this).serializeArray(),
            success: function(data) {
                console.log(data); // Log the response for debugging

                popup("success", "Success: " + data, "This car edit");


            },
            error: function(jXHR, textStatus, errorThrown) {
                alert(errorThrown);
            }
        });

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