<?php
include "connect.php";
global $conn;
function addCarr($username, $password, $Model, $Cylinder, $Season, $Brand, $Hit, $Time, $Price, $frontPhotoPaths, $backPhotoPaths, $rightPhotoPaths, $leftPhotoPaths, $intPhotoPaths)
{
    global $conn;
    if (password($username, $password) == true) {

        $query = "INSERT INTO `car` (`Model`, `Cylinder`, `Season`, `Brand`, `Hit`, `Time`, `Price`) 
        VALUES ('$Model', '$Cylinder', '$Season', '$Brand', '$Hit', '$Time', '$Price')";

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
            $logQuery = "INSERT INTO `log_entry`(`carId`,`username`, `action`, `Time`) VALUES ('$carId','$username','add a car','$Time')";
            $logResult = mysqli_query($conn, $logQuery);

            if ($logResult) {
                echo true; // Success
            } else {
                echo mysqli_error($conn); // Log entry insertion failed
            }
        } else {
            echo mysqli_error($conn); // Car insertion failed
        }
    } else {
        $_SESSION['message'] = 'Username or password is incorrect.';
        $newLocation = "index.php";
        header("Location: $newLocation");
    }
};
function password($username, $password)
{
    global $conn;
    $query = "SELECT * FROM user WHERE username = '$username' AND password = '$password'"; // Modified query
    $stmt = $conn->prepare($query);
    // $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        return true;
    } else {
        $_SESSION['message'] = 'Username or password is incorrect.';
        header("Location: index.php");
    }
};

function insertPhotoPaths($carId, $photoPaths, $type)
{
    global $conn;


    $insertQuery = "INSERT INTO `image` (`id_car`, `photo`, `type`) VALUES ('$carId', '$photoPaths', '$type')";
    mysqli_query($conn, $insertQuery);
};


function addcustom($fname, $lname, $phone, $email, $address1, $city, $username, $password, $Time)
{
    global $conn;
    if (password($username, $password) == true) {

        $query = " INSERT INTO `customer`( `fname`, `lname`, `email`, `phone`, `address1`, `city`) 
        VALUES ('$fname','$lname','$email','$phone','$address1','$city')";
        $result = mysqli_query($conn, $query);
        if ($result) {
            $carId = mysqli_insert_id($conn);
            $logQuery = "INSERT INTO `log_entry`(`carId`,`username`, `action`, `Time`)
             VALUES ('$carId','$username','add customer','$Time')";
            $logResult = mysqli_query($conn, $logQuery);

            if ($logResult) {
                echo true; // Success
            } else {
                echo mysqli_error($conn); // Log entry insertion failed
            }
        }
    }
};

function editcustom($fname, $lname, $phone, $email, $address1, $city, $username, $password, $Time, $customerid)
{
    global $conn;
    if (password($username, $password) == true) {
        $query = "UPDATE `customer` SET `fname`='$fname',`lname`='$lname',`email`='$email',`phone`='$phone',`address1`='$address1',`city`='$city' WHERE `id`='$customerid'";

        $result = mysqli_query($conn, $query);
        if ($result) {
            $carId = mysqli_insert_id($conn);
            $logQuery = "INSERT INTO `log_entry`(`carId`,`username`, `action`, `Time`)
             VALUES ('$carId','$username','edit customer','$Time')";
            $logResult = mysqli_query($conn, $logQuery);

            if ($logResult) {
                echo true; // Success
            } else {
                echo mysqli_error($conn); // Log entry insertion failed
            }
        }
    }
};
function deletcustomer($fname, $lname, $phone, $email, $address1, $city, $username, $password, $Time, $customerid)
{
    global $conn;
    if (password($username, $password) == true) {
        $query = "DELETE FROM `customer` WHERE `id`='$customerid'";

        $result = mysqli_query($conn, $query);
        if ($result) {
            $carId = mysqli_insert_id($conn);
            $logQuery = "INSERT INTO `log_entry`(`carId`,`username`, `action`, `Time`)
             VALUES ('$carId','$username','delet customer','$Time')";
            $logResult = mysqli_query($conn, $logQuery);

            if ($logResult) {
                echo true; // Success
            } else {
                echo mysqli_error($conn); // Log entry insertion failed
            }
        }
    }
};
function addorder($username, $password, $fname, $lname, $dateS, $dateE, $carid, $price, $pay)
{
    global $conn;
    if (password($username, $password) == true) {

        $query = " INSERT INTO `rental`(  `username`, `fname`, `lname`, `idcar`, `start`, `end`, `price`, `pay`) 
        VALUES ('$username','$fname','$lname','$carid','$dateS','$dateE','$price','$pay')";
        $result = mysqli_query($conn, $query);
        if ($result) {
            $carId = mysqli_insert_id($conn);
            $Time = date("Y-m-d H:i:s");
            $logQuery = "INSERT INTO `log_entry`(`carId`,`username`, `action`, `Time`)
             VALUES ('$carId','$username','add order for $fname $lname ','$Time')";
            $logResult = mysqli_query($conn, $logQuery);

            if ($logResult) {
                echo true; // Success
            } else {
                echo mysqli_error($conn); // Log entry insertion failed
            }
        }
    }
};
function addmaintenance($username, $password, $carid, $Model, $maintenance)
{
    global $conn;
    if (password($username, $password) == true) {
        $squery = "SELECT * FROM maintenance WHERE id_car='$carid'";
        $sresult = mysqli_query($conn, $squery);
        $row = mysqli_fetch_assoc($sresult);

        if ($row['id_car'] == $carid && $row['type'] == 'notpaid') {
        } else {
            $query = "INSERT INTO `maintenance`(`id_car`, `pay`,`type`,`maintenance`) VALUES ('$carid',0,'notpaid','$maintenance')";
            $result = mysqli_query($conn, $query);
            if ($result) {
                $editQuery = "UPDATE `car` SET `Hit`='$maintenance' WHERE id='$carid'";
                $editresult = mysqli_query($conn, $editQuery);

                $Time = date("Y-m-d H:i:s");
                $logQuery = "INSERT INTO `log_entry`(`carId`,`username`, `action`, `Time`)
            VALUES ('$carid','$username','add hit for $Model id:$carid','$Time')";
                $logResult = mysqli_query($conn, $logQuery);
            }
        }
    }
};
function paymaintenance($id, $price)
{
    global $conn;

    // Fetch information for the specified $id
    $query = "SELECT * FROM maintenance WHERE id='$id'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        $row = mysqli_fetch_assoc($result);

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
}