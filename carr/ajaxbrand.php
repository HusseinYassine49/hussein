<?php
include "../includes/connect.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the brand name from the POST data
    $newBrandName = $_POST["newBrandName"];
    $newBrandName = str_replace(' ', '', $newBrandName);
    // Perform necessary validation and sanitization here

    // Check if the brand already exists in the database
    $checkQuery = "SELECT * FROM brand WHERE brandName='$newBrandName'";
    $checkResult = mysqli_query($conn, $checkQuery);

    if (mysqli_num_rows($checkResult) == 0) {
        // Brand does not exist, proceed to insert it
        $insertQuery = "INSERT INTO brand (brandName) VALUES ('$newBrandName')";
        $insertResult = mysqli_query($conn, $insertQuery);

        if ($insertResult) {
            // Return the inserted brand name as JSON response
            echo json_encode(["brandName" => $newBrandName]);
        } else {
            // Handle the case where insertion failed
            echo json_encode(["error" => "Failed to insert brand into the database"]);
        }
    } else {
        // Brand already exists, return an error message
        echo json_encode(["error" => "Brand already exists in the database"]);
    }
} else {
    // If the request method is not POST, handle accordingly
    echo json_encode(["error" => "Invalid request method"]);
}
