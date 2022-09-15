<?php
include "repository/phonespotRepository.php";

if (isset($_GET["id"])){
    $id= $_GET["id"];
    $brand = getBrand($id);
}
$brands = getAllBrands();
?>
<link rel="stylesheet" href="css/admin/device.css" type="text/css"/>
<link rel="stylesheet" href="../../../css/admin/CRUDMenuDevice.css" type="text/css"/>

<div class="deviceContainer">

    <form class="deviceForm" id="editBrandForm" action="ui/pages/admin/brandHandler.php?" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id_brand" value="'<?php echo $brand['id_brand']?>'" />
        <input type="hidden" name="existingImg" value="'<?php echo $brand['brand_img']?>'" />
        <div class="currentImage"></div>

        <div class="inputcontainer">
            <div class="deviceInputName">Afbeelding</div>
            <div class="deviceInput"><input value="<?php echo $brand['brand_img'] ?>" type="file" name="fileToUpload" id="fileToUpload"></div>
        </div>

        <div class="inputcontainer">
            <div class="deviceInputName">Naam</div>
            <input type="text" name="brandName" placeholder="Apparaat naam" id="deviceName" class="deviceInput" value="<?php echo $brand['brand_name']?>">
        </div>
    </form>

    <?php
    if (isset($_GET["id"])){
        ?>
        <div class="CRUDMenuDiv">
            <button type="submit" form="editBrandForm" class="CRUDButton deleteButton" name="deleteButton" value="delete">Verwijder</button>
            <button type="submit" form="editBrandForm" class="CRUDButton updateButton" name="updateButton" value="edit">Opslaan</button>
        </div>
        <?php
    }else{
        ?>
        <div class="CRUDMenuDiv">
            <button type="submit" form="editBrandForm" class="CRUDButton deleteButton" name="cancelButton" value="cancel">Annuleer</button>
            <button type="submit" form="editBrandForm" class="CRUDButton updateButton" name="addButton" value="add">Voeg toe</button>
        </div>
        <?php
    }
    ?>
</div>
<style>
    .currentImage{
        background-image: url("<?php echo "src/devicebrands/".$brand['brand_img']?>");
    }
</style>
