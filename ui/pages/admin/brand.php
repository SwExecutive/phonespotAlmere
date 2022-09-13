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

    <form class="deviceForm" id="editDeviceForm" action="ui/pages/admin/deviceHandler.php?" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id_device" value="'<?php echo $brand['id_brand']?>'" />
        <div class="currentImage"></div>

        <div class="inputcontainer">
            <div class="deviceInputName">Afbeelding</div>
            <div class="deviceInput"><input value="<?php echo $brand['brand_img'] ?>" type="file" name="fileToUpload" id="fileToUpload"></div>
        </div>

        <div class="inputcontainer">
            <div class="deviceInputName">Naam</div>
            <input type="text" name="deviceName" placeholder="Apparaat naam" id="deviceName" class="deviceInput" value="<?php echo $brand['brand_name']?>">
        </div>
    </form>


    <div class="CRUDMenuDiv">
        <div class="CRUDButton deleteButton">Verwijder</div>
        <!--<div class="CRUDButton editButton">Aanpassen</div>-->
        <button type="submit" form="editDeviceForm" class="CRUDButton addButton">Opslaan</button>
    </div>
</div>
<style>
    .currentImage{
        background-image: url("<?php echo "src/devicebrands/".$brand['brand_img']?>");
    }
</style>
