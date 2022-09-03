<?php
include "repository/phonespotRepository.php";

$id = $_GET['id'];

$device = getDevice($id);
$brands = getAllBrands();
?>
<link rel="stylesheet" href="css/admin/device.css" type="text/css"/>
<link rel="stylesheet" href="../../../css/admin/CRUDMenuDevice.css" type="text/css"/>

<div class="deviceContainer">

    <form class="deviceForm" id="editDeviceForm" action="ui/pages/admin/deviceHandler.php" method="post"
          enctype="multipart/form-data">

        <div class="currentImage"></div>


        <div class="inputcontainer">
            <div class="deviceInputName">Afbeelding</div>
            <div class="deviceInput"><input value="<?php echo $device['device_img'] ?>" type="file" name="fileToUpload" id="fileToUpload"></div>
        </div>

        <div class="inputcontainer">
            <div class="deviceInputName">Naam</div>
            <input type="text" name="deviceName" placeholder="Apparaat naam" id="deviceName" class="deviceInput" value="<?php echo $device['name']?>">
        </div>
        <div class="inputcontainer">
            <div class="deviceInputName">Merk</div>
            <select name="brand_id" id="brand_id" class="deviceInput">
                <?php
                foreach ($brands as $brand) {
                    ?>
                    <option value="<?php echo $brand['brand_name'] ?>"><?php echo $brand['brand_name'] ?></option>
                    <?php
                }
                ?>
            </select>
        </div>
            <div class="inputcontainer">
                <div class="deviceInputName">Inspectie</div>
                <input type="text" name="inspection" placeholder="Inspection" id="inspection" class="deviceInput" value="<?php echo $device['inspection']?>">

            </div>
            <div class="inputcontainer">
                <div class="deviceInputName">Voorcamera</div>
                <input type="text" name="front_camera" placeholder="Voorcamera" id="front_camera" class="deviceInput" value="<?php echo $device['front_camera']?>">

            </div>
            <div class="inputcontainer">
                <div class="deviceInputName">Achtercamera</div>
                <input type="text" name="back_camera" placeholder="Achtercamera" id="back_camera" class="deviceInput" value="<?php echo $device['back_camera']?>">

            </div>
            <div class="inputcontainer">
                <div class="deviceInputName">Aanknop</div>
                <input type="text" name="power_button" placeholder="Aanknop" id="power_button" class="deviceInput" value="<?php echo $device['power_button']?>">

            </div>
            <div class="inputcontainer">
                <div class="deviceInputName">Batterij</div>
                <input type="text" name="battery" placeholder="Batterij" id="battery" class="deviceInput" value="<?php echo $device['battery']?>">

            </div>
            <div class="inputcontainer">
                <div class="deviceInputName">Homeknop</div>
                <input type="text" name="home_button" placeholder="Homeknop" id="home_button" class="deviceInput" value="<?php echo $device['home_button']?>">

            </div>
            <div class="inputcontainer">
                <div class="deviceInputName">Vibratie</div>
                <input type="text" name="vibration" placeholder="Vibratie" id="vibration" class="deviceInput" value="<?php echo $device['vibration']?>">

            </div>
            <div class="inputcontainer">
                <div class="deviceInputName">Speaker</div>
                <input type="text" name="speaker" placeholder="Speaker" id="speaker" class="deviceInput" value="<?php echo $device['speaker']?>">

            </div>
            <div class="inputcontainer">
                <div class="deviceInputName">Oorspeaker</div>
                <input type="text" name="ear_speaker" placeholder="Oorspeaker" id="ear_speaker" class="deviceInput" value="<?php echo $device['ear_speaker']?>">

            </div>
            <div class="inputcontainer">
                <div class="deviceInputName">Headphone jack</div>
                <input type="text" name="headphone_jack" placeholder="Headphone jack" id="headphone_jack" class="deviceInput" value="<?php echo $device['headphone_jack']?>">

            </div>
            <div class="inputcontainer">
                <div class="deviceInputName">Geen wifi</div>
                <input type="text" name="no_wifi" placeholder="Geen wifi" id="no_wifi" class="deviceInput" value="<?php echo $device['no_wifi']?>">

            </div>
            <div class="inputcontainer">
                <div class="deviceInputName">Geen connectie</div>
                <input type="text" name="no_connection" placeholder="Geen connectie" id="no_connection" class="deviceInput" value="<?php echo $device['no_connection']?>">

            </div>
            <div class="inputcontainer">
                <div class="deviceInputName">Frame</div>
                <input type="text" name="frame" placeholder="Frame" id="frame" class="deviceInput" value="<?php echo $device['frame']?>">

            </div>
            <div class="inputcontainer">
                <div class="deviceInputName">Volumeknop</div>
                <input type="text" name="volume_button" placeholder="Volumeknop" id="volume_button" class="deviceInput" value="<?php echo $device['volume_button']?>">

            </div>
            <div class="inputcontainer">
                <div class="deviceInputName">Charge port</div>
                <input type="text" name="charge_port" placeholder="Charge port" id="charge_port" class="deviceInput" value="<?php echo $device['charge_port']?>">

            </div>

           <div class="inputcontainer">
               <div class="deviceInputName">Microfoon</div>
               <input type="text" name="microphone" placeholder="Microfoon" id="microphone" class="deviceInput" value="<?php echo $device['microphone']?>">

           </div>
            <div class="inputcontainer">
                <div class="deviceInputName">Software</div>
                <input type="text" name="software" placeholder="Software" id="software" class="deviceInput" value="<?php echo $device['software']?>">

            </div>
            <div class="inputcontainer">
                <div class="deviceInputName">Backlight chip</div>
                <input type="text" name="backlight_chip" placeholder="Backlight chip" id="backlight_chip" class="deviceInput" value="<?php echo $device['backlight_chip']?>">

            </div>
            <div class="inputcontainer">
                <div class="deviceInputName">Waterschade</div>
                <input type="text" name="water_damage" placeholder="Waterschade" id="water_damage" class="deviceInput" value="<?php echo $device['water_damage']?>">

            </div>
             <div class="inputcontainer">
                 <div class="deviceInputName">Apparaattype</div>
                 <select name="device_type" id="device_type" class="deviceInput">
                     <option value="phone" <?php if ($device["device_type"] == "phone") echo "selected='selected'";?>>Telefoon</option>
                     <option value="tablet" <?php if ($device["device_type"] == "tablet") echo "selected='selected'";?>>Tablet</option>
                     <option value="laptop" <?php if ($device["device_type"] == "laptop") echo "selected='selected'";?>>Laptop</option>
                 </select>
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
        background-image: url("<?php echo $device['device_img']?>");
    }
</style>
