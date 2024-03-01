<?php
include "../includes/connect.php";
global $conn;
function addCarr($username,  $Model, $number, $Cylinder, $Season, $Brand, $Hit, $Time, $Price, $frontPhotoPaths, $backPhotoPaths, $rightPhotoPaths, $leftPhotoPaths, $intPhotoPaths)
{
    global $conn;


    $query = "INSERT INTO `car` (`Model`,`number`, `Cylinder`, `Season`, `Brand`, `Hit`, `Time`, `Price`,`Delete_`) 
        VALUES ('$Model','$number', '$Cylinder', '$Season', '$Brand', '$Hit', '$Time', '$Price','0')";

    $result = mysqli_query($conn, $query);


    if ($result) {
        $carId = mysqli_insert_id($conn); // Get the ID of the last inserted car

        // Insert photo paths into the 'photos' table
        insertPhotoPaths($carId, $frontPhotoPaths, 'front');
        insertPhotoPaths($carId, $backPhotoPaths, 'back');
        insertPhotoPaths($carId, $rightPhotoPaths, 'right');
        insertPhotoPaths($carId, $leftPhotoPaths, 'left');
        insertPhotoPaths($carId, $intPhotoPaths, 'inside');

        // Insert log entry
        $logQuery = "INSERT INTO `log_entry`(`id_car`,`username`, `action`, `Time`) VALUES ('$carId','$username','add a car Model:$Model','$Time')";
        $logResult = mysqli_query($conn, $logQuery);

        if ($logResult) {
            echo true; // Success
        } else {
            echo mysqli_error($conn); // Log entry insertion failed
        }
    } else {
        echo mysqli_error($conn); // Car insertion failed
    }
};


function insertPhotoPaths($carId, $photoPaths, $type)
{
    global $conn;


    $insertQuery = "INSERT INTO `image` (`id_car`, `photo`, `type`) VALUES ('$carId', '$photoPaths', '$type')";
    mysqli_query($conn, $insertQuery);
};


function addcustom($fname,  $phone, $email, $address1, $city, $username)
{
    global $conn;


    $query = " INSERT INTO `customer`( `fname`,  `email`, `phone`, `address1`, `city`,`Delete_`) 
        VALUES ('$fname','$email','$phone','$address1','$city','0')";
    $result = mysqli_query($conn, $query);
    if ($result) {
        $carId = mysqli_insert_id($conn);
        $Time = date("Y-m-d");
        $logQuery = "INSERT INTO `log_entry`(`id_car`,`username`, `action`, `Time`)
             VALUES ('$carId','$username','add customer $fname','$Time')";
        $logResult = mysqli_query($conn, $logQuery);

        if ($logResult) {
            echo true; // Success
        } else {
            echo mysqli_error($conn); // Log entry insertion failed
        }
    }
};

function editcustom($fname,  $phone, $email, $address1, $city, $username,  $customerid)
{
    global $conn;

    $query = "UPDATE `customer` SET `fname`='$fname',`email`='$email',`phone`='$phone',`address1`='$address1',`city`='$city' WHERE `id`='$customerid'";

    $result = mysqli_query($conn, $query);
    if ($result) {
        $Time = date("Y-m-d");
        $logQuery = "INSERT INTO `log_entry`(`id_car`,`username`, `action`, `Time`)
             VALUES ('custimer id:$customerid','$username','edit customer $fname','$Time')";
        $logResult = mysqli_query($conn, $logQuery);

        if ($logResult) {
            echo true; // Success
        } else {
            echo mysqli_error($conn); // Log entry insertion failed
        }
    }
};
function deletcustomer($fname,  $phone, $email, $address1, $city, $username, $password,  $customerid)
{
    global $conn;

    $query = "DELETE FROM `customer` WHERE `id`='$customerid'";
    $Time = date("Y-m-d");
    $result = mysqli_query($conn, $query);
    if ($result) {
        $carId = mysqli_insert_id($conn);
        $logQuery = "INSERT INTO `log_entry`(`id_car`,`username`, `action`, `Time`)
             VALUES ('$carId','$username','delet customer','$Time')";
        $logResult = mysqli_query($conn, $logQuery);

        if ($logResult) {
            echo true; // Success
        } else {
            echo mysqli_error($conn); // Log entry insertion failed
        }
    }
};
function addorder($username,  $id, $dateS, $dateE, $carid, $price)
{
    global $conn;


    $query = " INSERT INTO `rental`(`username`, `id_customer`, `id_car`, `start_date`, `end_date`, `price` ) 
        VALUES ('$username','$id','$carid','$dateS','$dateE','$price')";
    $result = mysqli_query($conn, $query);
    if ($result) {

        $Time = date("Y-m-d");
        $logQuery = "INSERT INTO `log_entry`(`id_car`,`username`, `action`, `Time`)
             VALUES ('$carid','$username','add order for $id ','$Time')";
        $logResult = mysqli_query($conn, $logQuery);


        if ($logResult) {
            echo true; // Success
        } else {
            echo mysqli_error($conn); // Log entry insertion failed
        }
    }
};
function addmaintenance($username,  $carid, $Model, $maintenance)
{
    global $conn;

    $squery = "SELECT * FROM maintenance WHERE id_car='$carid'";
    $sresult = mysqli_query($conn, $squery);
    $row = mysqli_fetch_array($sresult);

    $query = "INSERT INTO `maintenance`(`id_car`, `pay`,`type`,`maintenance`) VALUES ('$carid',0,'notpaid','$maintenance')";
    $result = mysqli_query($conn, $query);
    if ($result) {
        $editQuery = "UPDATE `car` SET `Hit`='$maintenance' WHERE id='$carid'";
        $editresult = mysqli_query($conn, $editQuery);

        $Time = date("Y-m-d");
        $logQuery = "INSERT INTO `log_entry`(`id_car`,`username`, `action`, `Time`)
            VALUES ('$carid','$username','add hit for $Model id:$carid','$Time')";
        $logResult = mysqli_query($conn, $logQuery);
    }
};
function paymaintenance($id, $price, $username)
{
    global $conn;

    // Fetch information for the specified $id
    $query = "SELECT * FROM maintenance WHERE id='$id'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        $row = mysqli_fetch_assoc($result);
        $Time = date("Y-m-d");
        $logQuery = "INSERT INTO `log_entry`(`id_car`,`username`, `action`, `Time`)
             VALUES ('" . $row['id_car'] . "','$username','pay maintenance id: $id','$Time')";
        $logResult = mysqli_query($conn, $logQuery);
        // Update maintenance table
        $payquery = "UPDATE `maintenance` SET `pay`='$price', `type`='paid' WHERE `id`='$id'";
        $payresult = mysqli_query($conn, $payquery);

        // Check if the maintenance update was successful
        if ($payresult) {
            // Update car table
            $editQuery = "UPDATE `car` SET `Hit`='no maintenance' WHERE id='" . $row['id_car'] . "'";
            $editresult = mysqli_query($conn, $editQuery);

            if (!$editresult) {
                // Handle the case where the car table update fails
                echo "Error updating car table: " . mysqli_error($conn);
            }
        } else {
            // Handle the case where the maintenance table update fails
            echo "Error updating maintenance table: " . mysqli_error($conn);
        }
    } else {
        // Handle the case where fetching maintenance information fails
        echo "Error fetching maintenance information: " . mysqli_error($conn);
    }
};
function editpay($username, $id, $rest, $pay)
{
    global $conn;



    // Update rest in rental table
    $rest = $rest - $pay;
    $query = "UPDATE `rental` SET `rest`='$rest' WHERE `id`=$id";
    $result = mysqli_query($conn, $query);

    if (!$result) {
        // Handle query error
        die("Query Error: " . mysqli_error($conn));
    }

    // Step 2: Get car ID based on the customer ID
    $querycar = "SELECT * FROM rental WHERE `id`=$id";
    $resultcar = mysqli_query($conn, $querycar);

    if (!$resultcar) {
        // Handle query error
        die("Query Error: " . mysqli_error($conn));
    }

    $rowcar = mysqli_fetch_assoc($resultcar);

    // Insert a log entry
    $Time = date("Y-m-d");
    $logQuery = "INSERT INTO `log_entry`(`id_car`, `username`, `action`, `Time`)
                 VALUES ('" . $rowcar['id_car'] . "','$username','get $pay from rentel $id','$Time')";
    $logResult = mysqli_query($conn, $logQuery);

    if (!$logResult) {
        // Handle query error
        die("Query Error: " . mysqli_error($conn));
    }
};
function editcarr($username, $id, $Model, $Cylinder, $Season, $Brand, $Hit, $Time, $Price, $number)
{
    global $conn;
    $query = "UPDATE `car` SET `Model`='$Model',`number`='$number',`Cylinder`='$Cylinder',`Season`='$Season',`Brand`='$Brand',`Hit`='$Hit',`Time`='$Time',`Price`='$Price' WHERE id='$id'";
    $result = mysqli_query($conn, $query);
    if ($result) {

        $Time = date("Y-m-d");
        $logQuery = "INSERT INTO `log_entry`(`id_car`,`username`, `action`, `Time`)
             VALUES ('$id','$username','edit car id: $id','$Time')";
        $logResult = mysqli_query($conn, $logQuery);
    }
};
