<?php
include "connect.php";
include "function.php";
$username = $_POST["username"];
$password = $_POST["password"];
$fname = $_POST["fname"];
$id = $_POST["id"];
$dateS = $_POST["dateS"];
$dateE = $_POST["dateE"];
$carid = $_POST["carid"];
$price = $_POST["price"];
$pay = $_POST["pay"];
addorder($username, $password, $fname, $id, $dateS, $dateE, $carid, $price, $pay);
