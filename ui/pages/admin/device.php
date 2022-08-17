<?php
include "repository/phonespotRepository.php";

$id = $_GET['id'];

$device = getDevice($id);
$brands = getAllBrands();
?>
<link rel="stylesheet" href="css/admin/device.css" type="text/css"/>

<div class="deviceContainer">

        <form class="deviceForm">
            <?php
//            echo $device["name"];
            ?>
<!--            <div class="imagePickerDiv">-->
<!---->
<!--            </div-->
            <input type="text" name="deviceName" placeholder="Apparaat naam" id="deviceName" class="deviceInput">
            <select name="brand_id" id="brand_id" class="deviceInput">
            <?php
                foreach ($brands as $brand){
                    ?>
                    <option value="<?php echo $brand['brand_name']?>"><?php echo $brand['brand_name']?></option>
                    <?php
                }
            ?>
            </select>
            <input type="text" name="serie_id" placeholder="Serie" id="serie_id" class="deviceInput">
            <input type="text" name="device_img" placeholder="Afbeelding" id="device_img" class="deviceInput">
            <input type="text" name="inspection" placeholder="Inspection" id="inspection" class="deviceInput">
            <input type="text" name="front_camera" placeholder="Voorcamera" id="front_camera" class="deviceInput">
            <input type="text" name="back_camera" placeholder="Achtercamera" id="back_camera" class="deviceInput">
            <input type="text" name="power_button" placeholder="Aanknop" id="power_button" class="deviceInput">
            <input type="text" name="battery" placeholder="Batterij" id="battery" class="deviceInput">
            <input type="text" name="home_button" placeholder="Homeknop" id="home_button" class="deviceInput">
            <input type="text" name="vibration" placeholder="Vibratie" id="vibration" class="deviceInput">
            <input type="text" name="speaker" placeholder="Speaker" id="speaker" class="deviceInput">
            <input type="text" name="ear_speaker" placeholder="Oorspeaker" id="ear_speaker" class="deviceInput">
            <input type="text" name="headphone_jack" placeholder="Headphone jack" id="headphone_jack" class="deviceInput">
            <input type="text" name="no_wifi" placeholder="Geen wifi" id="no_wifi" class="deviceInput">
            <input type="text" name="no_connection" placeholder="Geen connectie" id="no_connection" class="deviceInput">
            <input type="text" name="frame" placeholder="Frame" id="frame" class="deviceInput">
            <input type="text" name="volume_button" placeholder="Volumeknop" id="volume_button" class="deviceInput">
            <input type="text" name="charge_port" placeholder="Charge port" id="charge_port" class="deviceInput">
            <input type="text" name="microphone" placeholder="Microfoon" id="microphone" class="deviceInput">
            <input type="text" name="software" placeholder="Software" id="software" class="deviceInput">
            <input type="text" name="backlight_chip" placeholder="Backlight chip" id="backlight_chip" class="deviceInput">
            <input type="text" name="water_damage" placeholder="Waterschade" id="water_damage" class="deviceInput">
            <select name="device_type" id="device_type" class="deviceInput">
                <option value="phone">Phone</option>
                <option value="tablet">Tablet</option>
                <option value="laptop">Laptop</option>
            </select>
        </form>


    <?php
    include "./ui/navigation/admin/CRUDMenuDevice.php";
    ?>
</div>

