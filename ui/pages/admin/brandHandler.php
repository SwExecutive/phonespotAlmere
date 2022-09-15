<?php
include "../../../repository/phonespotRepository.php";
if (isset($_POST['deleteButton'])){

    deleteDevice(trimAndCast($_POST['id_device']));

    header("Location: ../../../beheer.php?/".(deviceHeaderRoute($_POST['device_type'])));

} else {

    if (isset($_POST['existingImg'])&&!is_uploaded_file($_FILES["fileToUpload"]["tmp_name"])&&isset($_POST['updateButton'])){
        updateBrand(trimAndCast($_POST['id_brand']), $_POST['brandName'], trim($_POST['existingImg'],"'"));
            header("Location: ../../../beheer.php?/merken");
    }
    else{
    $target_dir = "../../../src/devicebrands/";
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
                updateBrand(trimAndCast($_POST['id_brand']), $_POST['brandName'], $_FILES["fileToUpload"]["name"]);
            }

            elseif(isset($_POST['addButton'])){
                insertBrand($_POST['brandName'],$_FILES["fileToUpload"]["name"]);
            }

            header("Location: ../../../beheer.php?/merken");

        } else {
            echo "Sorry, het bestand die je probeerde te uploaden veroorzaakt een error. Ga terug naar de vorige pagina om je gegevens te behouden.";
        }
    }
}}
function trimAndCast($stringToInt): int
{
    return ((int)(trim($stringToInt,"'")));
}

?>