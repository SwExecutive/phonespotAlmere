<?php
include "../../../repository/phonespotRepository.php";
if (isset($_POST['deleteButton'])){

    deleteDevice(trimAndCast($_POST['id_device']));
    deleteScreens(trimAndCast($_POST['id_device']));
    header("Location: ../../../beheer.php?/".(deviceHeaderRoute($_POST['device_type'])));

} else {
    if (isset($_POST['existingImg'])&&!is_uploaded_file($_FILES["fileToUpload"]["tmp_name"])&&isset($_POST['updateButton'])){
        updateDevice(
            trimAndCast($_POST['id_device']),
            $_POST['deviceName'],
            $_POST['brand_id'],
            trimAndCast($_POST['id_serie']),
            trim($_POST['existingImg'],"'"),
            trimAndCast($_POST['inspection']),
            trimAndCast($_POST['front_camera']),
            trimAndCast($_POST['back_camera']),
            trimAndCast($_POST['power_button']),
            trimAndCast($_POST['battery']),
            trimAndCast($_POST['home_button']),
            trimAndCast($_POST['vibration']),
            trimAndCast($_POST['speaker']),
            trimAndCast($_POST['ear_speaker']),
            trimAndCast($_POST['headphone_jack']),
            trimAndCast($_POST['no_wifi']),
            trimAndCast($_POST['no_connection']),
            trimAndCast($_POST['frame']),
            trimAndCast($_POST['volume_button']),
            trimAndCast($_POST['charge_port']),
            trimAndCast($_POST['microphone']),
            trimAndCast($_POST['software']),
            trimAndCast($_POST['backlight_chip']),
            trimAndCast($_POST['water_damage']),
            $_POST['device_type'],
            "Tijdelijk",
        );
        $screens=getScreens(trimAndCast($_POST['id_device']));
        for ($x = 0,$counter=0; $x <= 2; $x++) {
            $counter++;
            updateScreen($screens[$x]['id_screen'],trimAndCast($_POST['id_device']),$_POST['schermnaam'.$counter],trimAndCast($_POST['schermprijs'.$counter]),trimAndCast($_POST['screenActive'.$counter]));
        }
        header("Location: ../../../beheer.php?/".(deviceHeaderRoute($_POST['device_type'])));
    }
    else{
    $target_dir = "../../../src/devices/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
    if (isset($_POST["submit"])) {
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        if ($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "Het bestand dat is geupload is geen afbeelding.";
            $uploadOk = 0;
        }
    }

// Allow certain file formats
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif") {
        echo "Sorry, alleen JPG, JPEG, PNG & GIF bestanden zijn toegestaan.";
        $uploadOk = 0;
    }

// Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, je bestand was niet geupload door een storing. Ga terug naar de vorige pagina om je gegevens te behouden.";

// if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            echo "The file " . htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) . " has been uploaded.";

            if (isset($_POST['updateButton'])) {
            updateDevice(
                trimAndCast($_POST['id_device']),
                $_POST['deviceName'],
                $_POST['brand_id'],
                trimAndCast($_POST['id_serie']),
                $_FILES["fileToUpload"]["name"],
                trimAndCast($_POST['inspection']),
                trimAndCast($_POST['front_camera']),
                trimAndCast($_POST['back_camera']),
                trimAndCast($_POST['power_button']),
                trimAndCast($_POST['battery']),
                trimAndCast($_POST['home_button']),
                trimAndCast($_POST['vibration']),
                trimAndCast($_POST['speaker']),
                trimAndCast($_POST['ear_speaker']),
                trimAndCast($_POST['headphone_jack']),
                trimAndCast($_POST['no_wifi']),
                trimAndCast($_POST['no_connection']),
                trimAndCast($_POST['frame']),
                trimAndCast($_POST['volume_button']),
                trimAndCast($_POST['charge_port']),
                trimAndCast($_POST['microphone']),
                trimAndCast($_POST['software']),
                trimAndCast($_POST['backlight_chip']),
                trimAndCast($_POST['water_damage']),
                $_POST['device_type'],
                "Tijdelijk",
            );
                $screens=getScreens(trimAndCast($_POST['id_device']));
                for ($x = 0,$counter=0; $x <= 2; $x++) {
                    $counter++;
                    updateScreen($screens[$x]['id_screen'],trimAndCast($_POST['id_device']),$_POST['schermnaam'.$counter],trimAndCast($_POST['schermprijs'.$counter]),trimAndCast($_POST['screenActive'.$counter]));
                }
        } elseif(isset($_POST['addButton'])){
                insertDevice(
                    $_POST['deviceName'],
                    $_POST['brand_id'],
                    trimAndCast($_POST['id_serie']),
                    $_FILES["fileToUpload"]["name"],
                    trimAndCast($_POST['inspection']),
                    trimAndCast($_POST['front_camera']),
                    trimAndCast($_POST['back_camera']),
                    trimAndCast($_POST['power_button']),
                    trimAndCast($_POST['battery']),
                    trimAndCast($_POST['home_button']),
                    trimAndCast($_POST['vibration']),
                    trimAndCast($_POST['speaker']),
                    trimAndCast($_POST['ear_speaker']),
                    trimAndCast($_POST['headphone_jack']),
                    trimAndCast($_POST['no_wifi']),
                    trimAndCast($_POST['no_connection']),
                    trimAndCast($_POST['frame']),
                    trimAndCast($_POST['volume_button']),
                    trimAndCast($_POST['charge_port']),
                    trimAndCast($_POST['microphone']),
                    trimAndCast($_POST['software']),
                    trimAndCast($_POST['backlight_chip']),
                    trimAndCast($_POST['water_damage']),
                    $_POST['device_type'],
                    "Tijdelijk",
                );
                $lastDeviceId = getLastDevice()[0];
                for ($x = 0,$counter=0; $x <= 2; $x++) {
                    $counter++;
                    if (isset($_POST['screenActive'.$counter])){
                        insertScreen(trimAndCast($lastDeviceId),$_POST['schermnaam'.$counter]??null,trimAndCast($_POST['schermprijs'.$counter])??null,trimAndCast($_POST['screenActive'.$counter])??null);
                    }else{
                        insertScreen(trimAndCast($lastDeviceId),$_POST['schermnaam'.$counter]??null,trimAndCast($_POST['schermprijs'.$counter])??null,null);
                    }
                }
            }

            header("Location: ../../../beheer.php?/".(deviceHeaderRoute($_POST['device_type'])));

        } else {
            echo "Sorry, het bestand die je probeerde te uploaden veroorzaakt een error. Ga terug naar de vorige pagina om je gegevens te behouden.";
        }
    }
}}
function trimAndCast($stringToInt): int
{
    return ((int)(trim($stringToInt,"'")));
}

function deviceHeaderRoute($deviceType){
    $finalRouteFile="";
    switch ($deviceType){
        case "phone":
            $finalRouteFile="telefoons";
            break;

        case "tablet":
            $finalRouteFile="tablets";
            break;

        case "laptop":
            $finalRouteFile="laptops";
            break;
    }
    return $finalRouteFile;
}
?>