<?php
include "../includes/connect.php";
include "../includes/function.php";
$username = $_POST['username'];

$customerId = $_POST['customerId'];
$fname = $_POST['fname'];

$phone = $_POST['phone'];
$email = $_POST['email'];
$address1 = $_POST['address1'];
$city = $_POST['city'];

editcustom($fname,  $phone, $email, $address1,  $city, $username,  $customerId);
