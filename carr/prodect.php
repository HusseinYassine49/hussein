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

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <?php $username = $_SESSION['username']; ?>
        <input name=username hidden value="<?php echo "$username" ?>"> </input>

        <br>
        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="inputEmail4">type car</label>
                <div class="form-group">
                    <input type="text" name="Model" class="form-control" id="inputcar" placeholder="model" required>
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
                    <input type="number" id="season" name="Season" class="form-control" id="inputAddress" placeholder="2000" required>

                </div>
            </div>
        </div>
        <div class="form-row">

            <div class="form-group col-md-4">
                <label for="inputPassword4">Cylinder</label>
                <input type="number" name="Cylinder" class="form-control" id="cylinder" placeholder="4" required>
            </div>
            <div class="form-group col-md-4">
                <label for="inputPassword4">plate number</label>
                <input type="number" name="num" class="form-control" id="cylinder" placeholder="1212" required>
            </div>
        </div>

        <div class="form-group">
            <label for="inputAddress">maintenance</label>
            <input type="text" name="Hit" class="form-control" id="inputAddress" placeholder="1234 Main St" required>
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

<script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous">
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
                        popup("success", "Success", "car add succes");
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