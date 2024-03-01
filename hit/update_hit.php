<?php
include "../includes/connect.php";
include "../includes/function.php";
$id = $_POST['id'];
$price = $_POST['newprice'];
$username = $_POST['username'];
paymaintenance($id, $price, $username);
