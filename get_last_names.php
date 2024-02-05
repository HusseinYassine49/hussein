<?php


include "connect.php"; // Include the database connection file

if (isset($_GET['fname'])) {
    $selectedFirstName = $_GET['fname'];

    // Fetch last names from the user table based on the selected first name from the customer table
    $query = "SELECT lname FROM customer WHERE fname = '$selectedFirstName'";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<option value='" . $row['lname'] . "'>" . $row['lname'] . "</option>";
        }
    } else {
        echo "<option value=''>No last names found</option>";
    }
} else {
    echo "<option value=''>Invalid request</option>";
}
