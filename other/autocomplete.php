<?php
include "../includes/connect.php";

// Fetch data based on the user input
$q = $_GET['q']; // User input from the dropdown search
$query = "SELECT phone FROM customer WHERE phone LIKE '%$q%'";
$result = mysqli_query($conn, $query);

// Prepare the results in a format suitable for Select2
$items = array();
while ($row = mysqli_fetch_assoc($result)) {
    $items[] = array(
        'id' => $row['phone'],
        'text' => $row['phone']
    );
}

// If the input is not in the suggestions, add it to the results
if (!in_array($q, array_column($items, 'id'))) {
    $items[] = array(
        'id' => $q,
        'text' => $q
    );
}

// Return the results as JSON
echo json_encode($items);