<?php
include "../includes/connect.php";
include "../includes/function.php";

$id = $_POST["id"];
$username = $_POST['username'];
$fname = $_POST['fname'];
$query = "UPDATE `customer` SET `Delete_`='1' WHERE id='$id'";

$result = mysqli_query($conn, $query);

if ($result) {
    $Time = date("Y-m-d");
    $logQuery = "INSERT INTO `log_entry`(`carId`,`username`, `action`, `Time`)
    VALUES ('customer $id','$username','delete customer $fname','$Time')";
    $logResult = mysqli_query($conn, $logQuery);
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . mysqli_error($conn);
}

mysqli_close($conn);
