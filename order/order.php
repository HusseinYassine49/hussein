<?php
include  "../includes/header.php";


$car_id = isset($_GET['id']) ? $_GET['id'] : 0;
$Pro_id = $car_id;
$disableddates = array(); // Initialize as an empty array
$queryres = mysqli_query($conn, "SELECT start_date,end_date FROM rental WHERE id_car='" . $Pro_id . "' AND YEAR(start_date) = YEAR(CURDATE()) OR YEAR(start_date) = YEAR(CURDATE()) + 1") or die(mysqli_error($conn));

while ($row = mysqli_fetch_array($queryres)) {
    $start = $row['start_date'];
    $end = $row['end_date'];
    $disableddates[] = array("from" => $start, "to" => $end);
}
?>
<script>
    var disableddates = <?php echo json_encode($disableddates); ?>;
</script>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> -->


<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
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


<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"> -->
<!-- <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> -->
<script src='https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.1.4/Chart.bundle.min.js'></script>

<!-- <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css"> -->

<!-- Chart.js CSS (if you have a separate CSS file for Chart.js styles) -->
<!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css"> -->

<!-- Font Awesome CSS -->
<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.css"> -->

<!-- Optional: Include your own stylesheets if needed -->

<!-- Bootstrap JS Bundle (includes Popper.js) -->

<!-- Chart.js JS -->
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js"></script> -->







<form id="myForm">
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">

        <?php $username = $_SESSION['username']; ?>
        <input type=text name=username hidden value="<?php echo "$username" ?>"> </input>


        <div class="form-row">


            <div class="form-group col-md-6">
                <label for="sell">customer name</label>
                <div class="form-group">
                    <select class="form-control js-example-basic-single" id="fname" name="fname">
                        <option></option>
                        <?php
                        // Fetch usernames from the database and populate the dropdown
                        $query = "SELECT * FROM customer where `delete_`='0'";
                        $result = mysqli_query($conn, $query);

                        if ($result && mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "<option value='" . $row['id'] . "'>" . $row['fname'] . "-" . $row['phone'] . "</option>";
                            }
                        }
                        ?>

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
            <div class="form-group col-md-4">
                <label for="car">price Car par day:</label>

                <?php
                $iquery = "SELECT * FROM `car` WHERE `id`='$car_id'";
                $iresult = mysqli_query($conn, $iquery);
                $irow = mysqli_fetch_assoc($iresult);
                ?>

                <input type="text" id="car" class="form-control" name="car" value="<?php echo '' . $irow['Price'] . ''; ?>" readonly>
            </div>

        </div>

        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="car">Car ID</label>
                <input type="number" name="carid" class="form-control" id="id" value="<?php echo '' . $car_id . '' ?>" required>
            </div>
            <div class="form-group col-md-4">
                <label for="price">Total Price</label>
                <input type="number" name="price" class="form-control" id="price" required>
            </div>


        </div>


        <button type="submit" class="btn btn-primary" id="submitOrderBtn">Submit order</button>

    </main>
</form>




</div>
</div>


<!-- <script src="../assets/dist/js/bootstrap.bundle.min.js"></script> -->

<script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous">
</script>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>

<script>

</script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
</body>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">


</html>
<script>
    $(".js-example-basic-single").select2();
    var flatpickrInstance;



    $(document).ready(function() {
        function initializeFlatpickr(elementId) {
            flatpickrInstance = flatpickr("#" + elementId, {
                dateFormat: "Y-m-d",
                disable: disableddates,
                onClose: function(selectedDates) {
                    if (selectedDates[0] > flatpickrInstance.selectedDates[1]) {
                        flatpickrInstance.clear();
                    }
                }
            });
        };

        // Initialize Flatpickr on mouseover for the start date input
        $('#inputStartDate').focus(function() {
            initializeFlatpickr("inputStartDate");
        });

        // Initialize Flatpickr on mouseover for the end date input
        $('#inputEndDate').focus(function() {
            initializeFlatpickr("inputEndDate");
        });
        $('#inputStartDate, #inputEndDate, #car').on('input', function() {
            // Get the selected start and end dates
            var startDate = new Date($('#inputStartDate').val());
            var endDate = new Date($('#inputEndDate').val());

            // Check if both start and end dates are valid
            if (!isNaN(startDate) && !isNaN(endDate)) {
                // Calculate the number of days between start and end dates
                var timeDiff = Math.abs(endDate.getTime() - startDate.getTime());
                var daysDiff = Math.ceil(timeDiff / (1000 * 3600 * 24));

                // Get the car price from the PHP variable
                var carPrice = $('#car').val();

                // Calculate the total price
                var totalPrice = carPrice * daysDiff;

                // Update the "Price" input field with the calculated total price
                $('#price').val(totalPrice);
            }
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







    $('#myForm').on('submit', function(e) {


        e.preventDefault();
        var postData = $(this).serializeArray();

        console.log($(this).serializeArray());

        $.ajax({
            url: '../order/addorder.php', // Corrected URL to match form action
            type: 'POST',
            data: $(this).serializeArray(),

            success: function(data) {
                console.log(data); // Log the response for debugging
                if (data == '1') {
                    popup("success", "Succes: " + "order success!");
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