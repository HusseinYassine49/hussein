<?php
include "../includes/header.php";
?>
<form id="form">
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <br>
        <div class="card" style="width: auto;">
            <div class="card-body">
                <h5 class="card-title navbar navbar-expand navbar-dark flex-column flex-md-row bd-navbar" style="background-color: #563d7c;
    box-shadow: 0 0.5rem 1rem rgba(0,0,0,.05), inset 0 -1px 0 rgba(0,0,0,.1);">
                    <p style="color: white; margin: 10px;"> User action list to date :
                        <?php
                        $Time = date("Y-m-d"); ?>

                        <input type="date" id="date" placeholder="Search" aria-label="Search" name="search" value="<?php echo $Time ?>">

                    </p>

                </h5>
                <h6 class="card-subtitle mb-2 text-muted">select user </h6>
                <p class="card-text">
                    <select class="form-control form-group col-md-4  js-example-basic-single" id="username" name="username">
                        <option></option>
                        <?php
                        // Fetch usernames from the database and populate the dropdown
                        $queryuser = "SELECT * FROM user";
                        $resultuser = mysqli_query($conn, $queryuser);

                        if ($resultuser && mysqli_num_rows($resultuser) > 0) {
                            while ($rowuser = mysqli_fetch_assoc($resultuser)) {
                                echo "<option value='" . $rowuser['username'] . "'>" . $rowuser['username'] . "</option>";
                            }
                        }
                        ?>

                    </select>
                    <button type="button" class="btn btn-outline-secondary" id="checkall">show all</button>
                </p>

            </div>
        </div>

        <br>
        <div class="card" id="user" style="width: auto;">
            <?php
            $query = "SELECT `id`, `id_car`, `username`, `action`, `Time` FROM `log_entry` where `Time` like '$Time' ORDER BY `Time` ASC ";
            $result = mysqli_query($conn, $query);

            if ($result) {

                echo ' <div class="card-body">';
                echo '   <h5 class="card-title">USER ACTIONS LIST ON : ' . $Time . ' FOR ALL USER </h5>
                        <hr>';
                while ($row = mysqli_fetch_assoc($result)) {
                    echo '  <h6 class="card-subtitle mb-2 text-muted">' . $row['username'] . '</h6>';
                    echo '  <p class="card-text">' . $row['action'] . ' on ' . $row['Time'] . '
                                    </p>
                                    <hr>';
                };
                echo '   </div>';
            } else {
                echo "Error: " . mysqli_error($conn);
            }
            ?>
        </div>
</form>



</div>
</div>
</div>




</html>



<script>
    $(document).ready(function() {
        $(".js-example-basic-single").select2();
        // Event handler for when the customer's first name dropdown changes
        $('#checkall').click(function() {
            // Make an AJAX request to get_first_names.php
            $.ajax({
                type: 'GET',
                url: '../action/formchange.php',
                data: {
                    Time: '',
                    username: ''
                },
                success: function(data) {
                    //console.log(data);
                    // Update the last name dropdown with the fetched options
                    $('#user').html(data);
                    //  console.log();
                },
                error: function() {
                    console.error('Error fetching last names.');
                }
            });
        });
        $('#date').change(function() {
            // Get the selected first name
            var selected = $(this).val();
            var username = $("#username").val();

            // Make an AJAX request to get_first_names.php
            $.ajax({
                type: 'GET',
                url: '../action/formchange.php',
                data: {
                    Time: selected,
                    username: username
                },
                success: function(data) {
                    //console.log(data);
                    // Update the last name dropdown with the fetched options
                    $('#user').html(data);
                    //  console.log();
                },
                error: function() {
                    console.error('Error fetching last names.');
                }
            });
        });

        $('#username').change(function() {
            // Get the selected first name
            var selected = $(this).val();
            var Time = $('#date').val();

            // Make an AJAX request to get_first_names.php
            $.ajax({
                type: 'GET',
                url: '../action/formchange.php',
                data: {
                    Time: Time,
                    username: selected
                },
                success: function(data) {
                    // console.log(data);
                    // Update the last name dropdown with the fetched options
                    $('#user').html(data);
                    //console.log();
                },
                error: function() {
                    console.error('Error fetching last names.');
                }
            });
        });
    });


    (function() {
        'use strict';

        feather.replace({
            'aria-hidden': 'true'
        });

        // Graphs
        var ctx = document.getElementById('myChart');
        // eslint-disable-next-line no-unused-vars
    })();



    function popup($type, $title, $message) {
        Swal.fire({
            icon: $type,
            title: $title,
            html: $message

        })
        return true;
    };
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
</script>

<!-- Your remaining HTML code -->