<?php
include "connect.php";
include "function.php";
$id = $_POST["id"];
$query = "DELETE FROM `customer` WHERE `id`='$id'";
$result = mysqli_query($conn, $query);
