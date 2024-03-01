<?php
include "../includes/connect.php";
include "../includes/function.php";
$id = $_POST["id"];
$query = "UPDATE `car` SET `Delete_`='1' WHERE `id`='$id'";
$result = mysqli_query($conn, $query);
