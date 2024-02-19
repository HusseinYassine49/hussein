<?php
include "connect.php";
include "function.php";
$username = $_POST['username'];
$password = $_POST['password'];
$customer_id = $_POST['customer_id'];
$rest = $_POST['rest'];
$pay = $_POST['pay'];
editpay($username, $password, $customer_id, $rest, $pay);