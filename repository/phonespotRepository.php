<?php
include "db/dbConnection.php";

function getAllBrands(){
    $query = "SELECT * FROM brand";
    return dbConnection($query)->fetch_all(MYSQLI_ASSOC);
}
function getBrand($brandId){
    $query = "SELECT * FROM brand WHERE id_brand = ".$brandId."";
    return dbConnection($query)->fetch_array();
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

//function insertDevice($name,$brand_id,$serie_id,$device_img,$inspection,
//                        $front_camera,$back_camera,$power_button,$battery,
//                        $home_button, $vibration, $speaker, $ear_speaker,
//                        $headphone_jack, $no_wifi, $no_connection, $frame,
//                        $volume_button, $charge_port, $microphone, $software,
//                        $backlight_chip, $water_damage, $device_type, $screenArray){
//
//    $query = "INSERT INTO device
//            VALUES (($name,$brand_id,$serie_id,$device_img,$inspection,
//                        $front_camera,$back_camera,$power_button,$battery,
//                        $home_button, $vibration, $speaker, $ear_speaker,
//                        $headphone_jack, $no_wifi, $no_connection, $frame,
//                        $volume_button, $charge_port, $microphone, $software,
//                        $backlight_chip, $water_damage, $device_type);";
//
//}

function updateDevice($deviceId,$name,$brand_id,$serie_id,$device_img,$inspection,
                      $front_camera,$back_camera,$power_button,$battery,
                      $home_button, $vibration, $speaker, $ear_speaker,
                      $headphone_jack, $no_wifi, $no_connection, $frame,
                      $volume_button, $charge_port, $microphone, $software,
                      $backlight_chip, $water_damage, $device_type, $screenArray){

    $query = "UPDATE device SET 
              name=".$name."
              brand_id=".$brand_id."
              serie_id=".$serie_id."
              device_img=".$device_img."
              inspection=".$inspection."
              front_camera=".$front_camera."
              back_camera=".$back_camera."
              power_button=".$power_button."
              battery=".$battery."
              home_button=".$home_button."
              vibration=".$vibration."
              speaker=".$speaker."
              ear_speaker=".$ear_speaker."
              headphone_jack=".$headphone_jack."
              no_wifi=".$no_wifi."
              no_connection=".$no_connection."
              frame=".$frame."
              volume_button=".$volume_button."
              charge_port=".$charge_port."
              microphone=".$microphone."
              software=".$software."
              backlight_chip=".$backlight_chip."
              water_damage=".$water_damage."
              device_type=".$device_type."
              WHERE id_device=".$deviceId."";
    return dbConnection($query);

}