<?php
include "../includes/connect.php";
include "../includes/function.php";

// Check if any required field is null
if (
    isset($_POST["username"]) && $_POST["username"] !== "" &&
    isset($_POST["fname"]) && $_POST["fname"] !== "" &&
    isset($_POST["dateS"]) && $_POST["dateS"] !== "" &&
    isset($_POST["dateE"]) && $_POST["dateE"] !== "" &&
    isset($_POST["carid"]) && $_POST["carid"] !== "" &&
    isset($_POST["price"]) && $_POST["price"] !== ""
) {
    $username = $_POST["username"];
    $id = $_POST["fname"];
    $dateS = $_POST["dateS"];
    $dateE = $_POST["dateE"];
    $carid = $_POST["carid"];
    $price = $_POST["price"];

    // Call the addorder function
    addorder($username, $id, $dateS, $dateE, $carid, $price);

    // Optionally, you can return a success message if needed

} else {
    // Return an error message if any required field is null
    echo "Error: Please fill in all required fields.";
}
