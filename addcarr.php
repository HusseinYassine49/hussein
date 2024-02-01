<?php
include "connect.php";
include "function.php";
$username = $_POST['username'];
$password = $_POST['password'];
$Model = $_POST['Model'];
$Cylinder = $_POST['Cylinder'];
$Season = $_POST['Season'];
$Brand = $_POST['Brand'];
$Hit = $_POST['Hit'];
$Time = $_POST['Time'];
$Price = $_POST['Price'];
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


addCarr($username, $password, $Model, $Cylinder, $Season, $Brand, $Hit, $Time, $Price, $frontPhotoPaths, $backPhotoPaths, $rightPhotoPaths, $leftPhotoPaths, $intPhotoPaths);
//add($username, $password, $Model, $Cylinder, $Season, $Brand, $Hit, $Time, $Price,);
function uploadPhotos($fileToUpload)
{
    $target_dir = "\image";
    $target_file = $target_dir . basename($_FILES[$fileToUpload]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check if image file is a actual image or fake image
    if (isset($_POST["submit"])) {
        $check = getimagesize($_FILES[$fileToUpload]["tmp_name"]);
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
    if ($_FILES[$fileToUpload]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Allow certain file formats
    if (
        $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif"
    ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES[$fileToUpload]["tmp_name"], $target_file)) {
            echo "The file " . htmlspecialchars(basename($_FILES[$fileToUpload]["name"])) . " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
};
