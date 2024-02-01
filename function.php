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
// function add($username, $password, $Model, $Cylinder, $Season, $Brand, $Hit, $Time, $Price,)
// {
//     global $conn;
//     if (password($username, $password) == true) {

//         $query = "INSERT INTO `car` (`Model`, `Cylinder`, `Season`, `Brand`, `Hit`, `Time`, `Price`) 
//         VALUES ('$Model', '$Cylinder', '$Season', '$Brand', '$Hit', '$Time', '$Price')";

//         $result = mysqli_query($conn, $query);



//         $logQuery = "INSERT INTO `log_entry`(`username`, `action`, `Time`) VALUES ('$username','add a car','$Time')";
//         $logResult = mysqli_query($conn, $logQuery);

//         if ($logResult) {
//             echo true; // Success
//         } else {
//             echo mysqli_error($conn); // Log entry insertion failed
//         }
//     } else {
//         echo mysqli_error($conn); // Car insertion failed
//     }
// }