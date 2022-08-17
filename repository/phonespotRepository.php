<?php
include "db/dbConnection.php";

function getAllBrands(){
    $query = "SELECT * FROM brand";
    return dbConnection($query)->fetch_all(MYSQLI_ASSOC);
}

function getAllSeries(){
    $query = "SELECT * FROM serie";
    return dbConnection($query)->fetch_all(MYSQLI_ASSOC);
}
function getAllPhones(){
    $query = "SELECT * FROM device WHERE device_type = 'phone' ORDER BY brand_id ASC, name DESC";
    return dbConnection($query)->fetch_all(MYSQLI_ASSOC);
}

function getAllTablets(){
    $query = "SELECT * FROM device WHERE device_type = 'tablet' ORDER BY brand_id ASC, name DESC";
    return dbConnection($query)->fetch_all(MYSQLI_ASSOC);
}
function getDevice($deviceId){
    $query = "SELECT * FROM device WHERE id_device = ".$deviceId."";
    return dbConnection($query)->fetch_array();
}

function insertDevice($name,$brand_id,$serie_id,$device_img,$inspection,
                        $front_camera,$back_camera,$power_button,$battery,
                        $home_button, $vibration, $speaker, $ear_speaker,
                        $headphone_jack, $no_wifi, $no_connection, $frame,
                        $volume_button, $charge_port, $microphone, $software,
                        $backlight_chip, $water_damage, $device_type, $screenArray){

    $query = "INSERT INTO device
            VALUES (($name,$brand_id,$serie_id,$device_img,$inspection,
                        $front_camera,$back_camera,$power_button,$battery,
                        $home_button, $vibration, $speaker, $ear_speaker,
                        $headphone_jack, $no_wifi, $no_connection, $frame,
                        $volume_button, $charge_port, $microphone, $software,
                        $backlight_chip, $water_damage, $device_type);";

}

function updateDevice(){

}