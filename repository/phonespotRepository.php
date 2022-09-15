<?php

//Makes sure the correct path is laid out for different files that access phonespotRepository.
$ds = DIRECTORY_SEPARATOR;
$base_dir = realpath(dirname(__FILE__) . $ds . '..') . $ds;
include "{$base_dir}db/dbConnection.php";


function getAllBrands()
{
    $conn = dbConnection();

    $query = "SELECT * FROM brand";
    $result = $conn->query($query)->fetch_all(MYSQLI_ASSOC);
    $conn->close();

    return $result;
}

function getBrand($brandId)
{
    $conn = dbConnection();
    $query = "SELECT * FROM brand WHERE id_brand = " . $brandId . "";
    $result = $conn->query($query)->fetch_array();
    $conn->close();

    return $result;
}

function getAllSeries()
{
    $conn = dbConnection();

    $query = "SELECT * FROM serie";
    $result = $conn->query($query)->fetch_all(MYSQLI_ASSOC);
    $conn->close();

    return $result;
}

function getAllPhones()
{
    $conn = dbConnection();

    $query = "SELECT * FROM device WHERE device_type = 'phone' ORDER BY brand_id ASC, name DESC";
    $result = $conn->query($query)->fetch_all(MYSQLI_ASSOC);
    $conn->close();

    return $result;
}

function getAllTablets()
{
    $conn = dbConnection();

    $query = "SELECT * FROM device WHERE device_type = 'tablet' ORDER BY brand_id ASC, name DESC";
    $result = $conn->query($query)->fetch_all(MYSQLI_ASSOC);
    $conn->close();

    return $result;
}

function getDevice($deviceId)
{
    $conn = dbConnection();

    $query = "SELECT * FROM device WHERE id_device = " . $deviceId . "";
    $result = $conn->query($query)->fetch_array();
    $conn->close();

    return $result;
}

function insertDevice($name, $brand_id, $serie_id, $device_img, $inspection,
                      $front_camera, $back_camera, $power_button, $battery,
                      $home_button, $vibration, $speaker, $ear_speaker,
                      $headphone_jack, $no_wifi, $no_connection, $frame,
                      $volume_button, $charge_port, $microphone, $software,
                      $backlight_chip, $water_damage, $device_type, $screenArray){
    $conn = dbConnection();
    $query = "INSERT INTO device (name, brand_id, serie_id, device_img, inspection, front_camera, back_camera, power_button, battery, home_button, vibration, speaker, ear_speaker, headphone_jack, no_wifi, no_connection, frame, volume_button, charge_port, microphone, software, backlight_chip, water_damage, device_type) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ssisiiiiiiiiiiiiiiiiiiis", $name, $brand_id, $serie_id, $device_img, $inspection,
        $front_camera, $back_camera, $power_button, $battery,
        $home_button, $vibration, $speaker, $ear_speaker,
        $headphone_jack, $no_wifi, $no_connection, $frame,
        $volume_button, $charge_port, $microphone, $software,
        $backlight_chip, $water_damage, $device_type);
    $stmt->execute();

    $stmt->close();
    $conn->close();
}

function updateDevice($deviceId, $name, $brand_id, $serie_id, $device_img, $inspection,
                      $front_camera, $back_camera, $power_button, $battery,
                      $home_button, $vibration, $speaker, $ear_speaker,
                      $headphone_jack, $no_wifi, $no_connection, $frame,
                      $volume_button, $charge_port, $microphone, $software,
                      $backlight_chip, $water_damage, $device_type, $screenArray){

    $conn = dbConnection();

    $query = "UPDATE device SET name=?, brand_id=?, serie_id=?, device_img=?, inspection=?, front_camera=?, back_camera=?, power_button=?, battery=?, home_button=?, vibration=?, speaker=?, ear_speaker=?, headphone_jack=?, no_wifi=?, no_connection=?, frame=?, volume_button=?, charge_port=?, microphone=?, software=?, backlight_chip=?, water_damage=?, device_type=? WHERE id_device=?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ssisiiiiiiiiiiiiiiiiiiisi", $name, $brand_id, $serie_id, $device_img, $inspection,
        $front_camera, $back_camera, $power_button, $battery,
        $home_button, $vibration, $speaker, $ear_speaker,
        $headphone_jack, $no_wifi, $no_connection, $frame,
        $volume_button, $charge_port, $microphone, $software,
        $backlight_chip, $water_damage, $device_type, $deviceId);
    $stmt->execute();
    printf($deviceId);
    print($stmt->affected_rows);

    $stmt->close();
    $conn->close();

}

function deleteDevice($deviceId)
{
    $conn = dbConnection();
    $query = "DELETE FROM device WHERE id_device=?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i",$deviceId);
    $stmt->execute();

    $stmt->close();
    $conn->close();
}
function insertBrand($brandName,$brandImg){

    $conn = dbConnection();

    $query = "INSERT INTO brand (brand_name,brand_img) VALUES (?,?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ss", $brandName,$brandImg);
    $stmt->execute();
    print($stmt->affected_rows);

    $stmt->close();
    $conn->close();

}
function updateBrand($brandId,$brandName,$brandImg){

    $conn = dbConnection();

    $query = "UPDATE brand SET brand_name=?,  brand_img=? WHERE id_brand=?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ssi", $brandName,$brandImg,$brandId);
    $stmt->execute();
    print($stmt->affected_rows);

    $stmt->close();
    $conn->close();

}
function deleteBrand($brandId)
{
    $conn = dbConnection();
    $query = "DELETE FROM brand WHERE id_brand=?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i",$brandId);
    $stmt->execute();

    $stmt->close();
    $conn->close();
}