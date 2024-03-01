<?php
include "includes/connect.php";

if (isset($_GET['id'])) {
    $selectedFirstName = $_GET['id'];

    // Fetch last names from the user table based on the selected first name from the customer table
    $query = "SELECT fname FROM customer WHERE id = $selectedFirstName";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<option value='" . $row['fname'] . "'>" . $row['fname'] . "</option>";
        }
    } else {
        echo "<option value=''>No last names found</option>";
    }
} else {
    echo "<option value=''>Invalid request</option>";
}