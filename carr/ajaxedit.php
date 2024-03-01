<?php
include "../includes/connect.php";
include "../includes/function.php";
$username = $_POST['username'];
$id = $_POST['id'];
$Model = $_POST['Model'];
$Cylinder = $_POST['Cylinder'];
$Season = $_POST['Season'];
$Brand = $_POST['Brand'];
$Hit = $_POST['Hit'];
$Time = $_POST['Time'];
$Price = $_POST['Price'];
$number = $_POST['number'];
editcarr($username, $id, $Model, $Cylinder, $Season, $Brand, $Hit, $Time, $Price, $number);
