<?php
include "connect.php";
include "function.php";
$username = $_POST['username'];
$password = $_POST['password'];
$carid = $_POST['id'];
$Model = $_POST['fname'];
$maintenance = $_POST['maintenance'];
addmaintenance($username, $password, $carid, $Model, $maintenance);