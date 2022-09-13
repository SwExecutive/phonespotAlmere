<?php
include "../../../repository/phonespotRepository.php";

$target_dir = "../../../src/devices/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";

//        updateDevice(
//            $_POST['id_device'],
//            $_POST['deviceName'],
//            $_POST['brand_id'],
//            $_POST['id_serie'],
//            $_FILES["fileToUpload"]["name"],
//            $_POST['inspection'],
//            $_POST['front_camera'],
//            $_POST['back_camera'],
//            $_POST['power_button'],
//            $_POST['battery'],
//            $_POST['home_button'],
//            $_POST['vibration'],
//            $_POST['speaker'],
//            $_POST['ear_speaker'],
//            $_POST['headphone_jack'],
//            $_POST['no_wifi'],
//            $_POST['no_connection'],
//            $_POST['frame'],
//            $_POST['volume_button'],
//            $_POST['charge_port'],
//            $_POST['microphone'],
//            $_POST['software'],
//            $_POST['backlight_chip'],
//            $_POST['water_damage'],
//            $_POST['device_type'],
//            $_POST['backlight_chip'],
//        );










//        header("Location: ../../../beheer.php?/telefoons");

    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}