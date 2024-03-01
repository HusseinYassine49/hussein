<?php
include "../includes/connect.php";
include "../includes/function.php";
$username = $_POST['username'];
$password = $_POST['password'];
$phone = $_POST['phone'];
$rest = $_POST['rest'];
$pay = $_POST['pay'];
editpay($username, $phone, $rest, $pay);
