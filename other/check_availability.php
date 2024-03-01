<?php
include "includes/connect.php";

if ($_GET['startDate'] && $_GET['carId']) {
    $startDate = $_GET['startDate'];
    $carId = $_GET['carId'];

    // Query to retrieve all dates for the selected car after the chosen start date
    $query = "SELECT start_date , end_date FROM rental WHERE idcar = '$carId' AND start_date >= '$startDate'";

    $result = mysqli_query($conn, $query);

    if ($result) {
        // Initialize an array to store the dates
        $dates = array();

        // Fetch dates and store them in the array
        while ($row = mysqli_fetch_assoc($result)) {
            $dates[] = array(
                'start_date' => $row['start_date'],
                'end_date' => $row['end_date']
            );
        }

        // Output the JSON-encoded array
        echo json_encode($dates);
    } else {
        echo 'false';
    }
} else {
    echo 'false';
}