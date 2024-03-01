<?php
include "../includes/connect.php";
include "../includes/function.php";
$username = $_POST['username'];

$Model = $_POST['Model'];
$Cylinder = $_POST['Cylinder'];
$Season = $_POST['Season'];
$Brand = $_POST['Brand'];
$Hit = $_POST['Hit'];
$Time = $_POST['Time'];
$Price = $_POST['Price'];
$number = $_POST['num'];
// Assuming 'frontPhotos', 'backPhotos', 'rightPhotos', 'leftPhotos', 'intPhotos' are the input names for your file inputs
$frontPhotos = $_FILES['frontPhotos'];
$backPhotos = $_FILES['backPhotos'];
$rightPhotos = $_FILES['rightPhotos'];
$leftPhotos = $_FILES['leftPhotos'];
$intPhotos = $_FILES['intPhotos'];



// Handle file uploads for each photo type
$frontPhotoPaths = uploadPhotos($frontPhotos);
$backPhotoPaths = uploadPhotos($backPhotos);
$rightPhotoPaths = uploadPhotos($rightPhotos);
$leftPhotoPaths = uploadPhotos($leftPhotos);
$intPhotoPaths = uploadPhotos($intPhotos);


addCarr($username,  $Model, $number, $Cylinder, $Season, $Brand, $Hit, $Time, $Price, $frontPhotoPaths, $backPhotoPaths, $rightPhotoPaths, $leftPhotoPaths, $intPhotoPaths);
//add($username, $password, $Model, $Cylinder, $Season, $Brand, $Hit, $Time, $Price,);
function uploadPhotos($fileToUpload)
{
    $target_dir = "../image/";
    $imageFileType = strtolower(pathinfo($fileToUpload["name"], PATHINFO_EXTENSION));

    // Generate a filename based on current time in milliseconds
    $currentTimeInMilliseconds = round(microtime(true) * 1000);
    $newFileName = $currentTimeInMilliseconds . "." . $imageFileType;

    $target_file = $target_dir . $newFileName;
    $uploadOk = 1;

    // Check if image file is an actual image
    if (isset($_POST["submit"])) {
        $check = getimagesize($fileToUpload["tmp_name"]);
        if ($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
    }

    // Check if file already exists
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }

    // Check file size
    if ($fileToUpload["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Allow certain file formats
    $allowedFileTypes = ["jpg", "jpeg", "png", "gif"];
    if (!in_array($imageFileType, $allowedFileTypes)) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
        return [];
    } else {
        if (move_uploaded_file($fileToUpload["tmp_name"], $target_file)) {
            echo "The file " . htmlspecialchars(basename($fileToUpload["name"])) . " has been uploaded.";

            // Return the new filename instead of the target file path
            return $newFileName;
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}
