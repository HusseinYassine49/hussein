<?php
include "../includes/connect.php";
include "../includes/function.php";
$username = $_POST['username'];

$carid = $_POST['id'];
$Model = $_POST['fname'];
$maintenance = $_POST['maintenance'];
addmaintenance($username,  $carid, $Model, $maintenance);
