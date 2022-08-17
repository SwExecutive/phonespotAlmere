<?php
include "repository/phonespotRepository.php";

$id = $_GET['id'];

$device = getDevice($id);

?>
<link rel="stylesheet" href="css/admin/device.css" type="text/css"/>

<div class="deviceContainer">
    <div class="deviceDiv">

        <form>
            <label for=""></label>
            <input type="text" id="deviceName">

            <label for=""></label>
            <input type="text" id="brand_id">

            <label for=""></label>
            <input type="text" id="serdie_id">

            <label for=""></label>
            <input type="text" id="device_img">

            <label for=""></label>
            <input type="text" id="inspection">

            <label for=""></label>
            <input type="text" id="front_camera">

            <label for=""></label>
            <input type="text" id="back_camera">

            <label for=""></label>
            <input type="text" id="power_button">

            <label for=""></label>
            <input type="text" id="battery">

            <label for=""></label>
            <input type="text" id="home_button">

            <label for=""></label>
            <input type="text" id="vibration">

            <label for=""></label>
            <input type="text" id="speaker">

            <label for=""></label>
            <input type="text" id="ear_speaker">

            <label for=""></label>
            <input type="text" id="headphone_jack">

            <label for=""></label>
            <input type="text" id="no_wifi">

            <label for=""></label>
            <input type="text" id="no_connection">

            <label for=""></label>
            <input type="text" id="frame">

            <label for=""></label>
            <input type="text" id="volume_button">

            <label for=""></label>
            <input type="text" id="charge_port">

            <label for=""></label>
            <input type="text" id="microphone">

            <label for=""></label>
            <input type="text" id="software">

            <label for=""></label>
            <input type="text" id="backlight_chip">

            <label for=""></label>
            <input type="text" id="water_damage">

            <label for=""></label>
            <input type="text" id="device_type">
            
        </form>
        <?php
        echo $device["name"];
        ?>
    </div>

    <?php
    include "./ui/navigation/admin/CRUDMenuDevice.php";
    ?>
</div>

