<?php
include "connect.php";
include "function.php";
$username = $_POST['username'];
$password = $_POST['password'];
$customerId = $_POST['customerId'];
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$address1 = $_POST['address1'];
$city = $_POST['city'];

editcustom($fname, $lname, $phone, $email, $address1,  $city, $username, $password, $Time, $customerId);
