<?php
include "../includes/connect.php";

if (isset($_GET['fname'])) {
    $selectedFirstName = $_GET['fname'];

    // Fetch last names from the user table based on the selected first name from the customer table
    $query = "SELECT fname, SUM( price) AS total_price FROM rental WHERE fname = '$selectedFirstName'";
    $result = mysqli_query($conn, $query);


    if ($result) {
        $row = mysqli_fetch_assoc($result);
        echo '   <div class="form-group col-md-4" id="price">
        <label for="price">price</label>
        <input type="number" class="form-control" value="' . $row['total_price'] . '" required>

    </div> ';
    } else {
        echo "No data found for $fname.";
    }
}
