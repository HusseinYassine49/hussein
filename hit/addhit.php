<?php
include "../includes/header.php";
?>
<form id="myForm" method="post" enctype="multipart/form-data">
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">


        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="sell">Car name</label>
                <div class="form-group">
                    <select class="form-control js-example-basic-single" id="fname" name="fname">
                        <option value="select"></option>
                        <?php
                        // Fetch usernames from the database and populate the dropdown
                        $query = "SELECT `id`, `Model` , `number` FROM car"; // Include 'id' in the query
                        $result = mysqli_query($conn, $query);

                        if ($result && mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "<option value='" . $row['Model'] . "' data-id='" . $row['id'] . "'>" . $row['Model'] . "-" . $row['number'] . "</option>";
                            }
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="form-group col-md-6">

                <div class="form-group">
                    <input type="hidden" id="carId" name="id" value="">

                    </select>
                </div>
            </div>


        </div>
        <div class="form-row">
            <div class="form-group col-lg-4">
                <label for="sell">details for maintenance </label>
                <div class="form-group">
                    <input class="form-control" name="maintenance" type="text">
                </div>
            </div>
        </div>
        <?php $username = $_SESSION['username']; ?>
        <input type="hidden" name="username" value="<?php echo $username; ?>">
        <button type="submit" class="btn btn-primary">Submit order</button>


    </main>
</form>




</div>
</div>




</body>

</html>
<script>
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
</script>
<script>
    $(document).ready(function() {
        $(".js-example-basic-single").select2();

        $('#fname').on('change', function() {
            // Get the selected option's data-id attribute
            var selectedId = $(this).find(':selected').data('id');

            // Set the value of the hidden input field
            $('#carId').val(selectedId);
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

    $('#myForm').on('submit', function(e) {
        e.preventDefault();

        $.ajax({
            url: 'addmaintenance.php',
            type: 'POST',
            data: $(this).serialize(), // Use serialize to serialize the form data

            success: function(data) {
                console.log(data); // Log the response for debugging
                // You can add additional logic here based on the server response
                popup('success', 'Success', 'Maintenance added successfully');
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.error(textStatus, errorThrown); // Log the error for debugging
                popup('error', 'Error', 'Failed to add maintenance');
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