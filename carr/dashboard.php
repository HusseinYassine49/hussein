<?php
include "../includes/header.php";
?>

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <form action="">
        <div class="album py-5 bg-light">
            <div class="container">
                <div class="table-responsive">
                    <table id="example" class="table table-striped" class="table table-striped table-sm">

                        <thead>
                            <tr>
                                <th scope="col">id</th>
                                <th scope="col">photo</th>
                                <th></th>
                                <th scope="col">model</th>
                                <th scope="col">number</th>
                                <th scope="col">Cylinder</th>
                                <th scope="col">season</th>
                                <th scope="col">brand</th>
                                <th scope="col">Hit</th>
                                <th scope="col">Price</th>
                                <th scope="col">action</th>


                            </tr>
                        </thead>
                        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                            <?php




                            $query = 'SELECT * FROM `car`where Delete_="0" ';
                            $result = mysqli_query($conn, $query);


                            if ($result) {

                                while ($row = mysqli_fetch_assoc($result)) {

                                    // Fetching photo for the current car
                                    $queryphoto = "SELECT `photo` FROM `image` WHERE `type`='front' AND `id_car`={$row['id']}";
                                    $resultphoto = mysqli_query($conn, $queryphoto);
                                    $photo_row = mysqli_fetch_assoc($resultphoto);


                                    echo '<tr>';
                                    echo '<td>' . $row['id'] . ' </td>';
                                    echo '<td><img src="../image/' . $photo_row['photo'] . '" alt="Car Photo" class="bd-placeholder-img card-img-top" width="100%" height="225"><td>';

                                    echo '<td>' . $row['Model'] . ' </td>';
                                    echo '<td>' . $row['number'] . ' </td>';
                                    echo '<td>' . $row['Cylinder'] . ' </td>';
                                    echo '<td>' . $row['Season'] . ' </td>';
                                    echo '<td>' . $row['Brand'] . ' </td>';
                                    echo '<td>' . $row['Hit'] . ' </td>';
                                    echo '<td>' . $row['Price'] . ' </td>';


                                    echo '<td><button type="button" class="btn btn-sm btn-outline-secondary"><a href="../carr/view.php?id=' . $row['id'] . '" class="btn btn-sm btn-outline">View</a></button>';
                                    echo '<button type="button" class="btn btn-sm btn-outline-success"><a href="../order/order.php?id=' . $row['id'] . '" class="btn btn-sm btn-outline">Order</a></button>';

                                    if ($isAdmin) {
                                        echo '<button type="button" class="btn btn-sm btn-outline-danger" onclick="deletecarr(' . $row['id'] . ') " class="btn btn-sm btn-outline-secondary"">Delete</button>';
                                        echo '<button type="button" class="btn btn-sm btn-outline-secondary"><a href="../carr/editcarr.php?id=' . $row['id'] . '" class="btn btn-sm btn-outline">edit</a></button></td>';
                                    }

                                    echo '</tr>';

                                    echo '</div>';
                                    echo '</div>';
                                }
                            }



                            ?>


                        </div>
                </div>

</main>


</form>

</main>
</div>
</div>


<script>
    new DataTable('#example');
    /* globals Chart:false, feather:false */
    function deletecarr(customerId) {
        Swal.fire({
            title: "Are you sure?",
            text: "You won't be able to delete this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, delete it!"
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire({
                    title: "Deleted!",
                    text: "Your file has been deleted.",
                    icon: "success"
                });
                $.ajax({
                    url: '../carr/deletcarr.php',
                    type: 'POST',
                    data: {
                        id: customerId
                    },
                    success: function(response) {
                        // Handle the response if needed
                        console.log(response);
                        // Reload the page or update the customer list
                        location.reload();
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        alert(errorThrown);
                    }
                });
            }
        });
        // You can use AJAX to send the customer ID to a deletion script

    };
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