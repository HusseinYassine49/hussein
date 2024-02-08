<?php
include "connect.php";
include "function.php";
$id = $_POST['id'];
$price = $_POST['newprice'];
paymaintenance($id, $price);