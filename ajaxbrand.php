<?php
include "connect.php";
$newBrandName = $_POST["newBrandName"];

// Perform necessary validation and sanitization here

// Insert the brand into the database
$insertQuery = "INSERT INTO brand (brandName) VALUES ('$newBrandName')";
$result = mysqli_query($conn, $insertQuery);

if ($result) {
    // Return the inserted brand name as JSON response
    echo json_encode(["brandName" => $newBrandName]);
} else {
    // Handle the case where insertion failed
    echo json_encode(["error" => "Failed to insert brand into the database"]);
}
