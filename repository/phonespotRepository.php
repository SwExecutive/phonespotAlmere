<?php

//Makes sure the correct path is laid out for different files that access phonespotRepository.
$ds = DIRECTORY_SEPARATOR;
$base_dir = realpath(dirname(__FILE__) . $ds . '..') . $ds;
include "{$base_dir}db/db_connection.php";


function getAllBrands()
{
    $conn = db_connection();

    $query = "SELECT * FROM brand";
    $result = $conn->query($query)->fetch_all(MYSQLI_ASSOC);
    $conn->close();

    return $result;
}

function getBrand($brandId)
{
    $conn = db_connection();
    $query = "SELECT * FROM brand WHERE id_brand = " . $brandId . "";
    $result = $conn->query($query)->fetch_array();
    $conn->close();

    return $result;
}

function getAllSeries()
{
    $conn = db_connection();

    $query = "SELECT * FROM serie";
    $result = $conn->query($query)->fetch_all(MYSQLI_ASSOC);
    $conn->close();

    return $result;
}

function getAllPhones()
{
    $conn = db_connection();

    $query = "SELECT * FROM device WHERE device_type = 'phone' ORDER BY brand_id ASC, name DESC";
    $result = $conn->query($query)->fetch_all(MYSQLI_ASSOC);
    $conn->close();

    return $result;
}

function getAllTablets()
{
    $conn = db_connection();

    $query = "SELECT * FROM device WHERE device_type = 'tablet' ORDER BY brand_id ASC, name DESC";
    $result = $conn->query($query)->fetch_all(MYSQLI_ASSOC);
    $conn->close();

    return $result;
}

function getDevice($deviceId)
{
    $conn = db_connection();

    $query = "SELECT * FROM device WHERE id_device = " . $deviceId . "";
    $result = $conn->query($query)->fetch_array();
    $conn->close();

    return $result;
}
function getLastDevice(){
    $conn = db_connection();

    $query = "SELECT id_device FROM device ORDER BY id_device DESC LIMIT 1;";
    $result = $conn->query($query)->fetch_array();
    $conn->close();

    return $result;
}
function getScreens($deviceId){
    $conn = db_connection();

    $query = "SELECT * FROM screen WHERE id_device = " . $deviceId . " ORDER BY screen_price ASC";
    $result = $conn->query($query)->fetch_all(MYSQLI_ASSOC);
    $conn->close();

    return $result;
}

function getAllScreens(){
    $conn = db_connection();

    $query = "SELECT * FROM screen ORDER BY id_device ASC, screen_price ASC";
    $result = $conn->query($query)->fetch_all(MYSQLI_ASSOC);
    $conn->close();

    return $result;
}
function insertScreen($id_device,$screen_name,$screen_price,$active){
    $conn = db_connection();
    if (isset($id_device,$screen_name,$screen_price,$active)){
        $query = "INSERT INTO screen (id_device, screen_name, screen_price, active) VALUES (?,?,?,?)";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("isii", $id_device,$screen_name,$screen_price,$active);

    }elseif(isset($id_device,$screen_name,$screen_price)&&empty($active)){
        $query = "INSERT INTO screen (id_device, screen_name, screen_price) VALUES (?,?,?)";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("isi", $id_device,$screen_name,$screen_price);

    }else{
        $query = "INSERT INTO screen (id_device) VALUES (?)";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("i", $id_device);
    }
    $stmt->execute();

    $stmt->close();
    $conn->close();
}
function updateScreen($id_screen,$id_device,$screen_name,$screen_price,$active){
    $conn = db_connection();
    $query = "UPDATE screen SET id_device=?, screen_name=?, screen_price=?, active=? WHERE id_screen=?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("isiii", $id_device,$screen_name,$screen_price,$active,$id_screen);
    $stmt->execute();

    $stmt->close();
    $conn->close();
}
function deleteScreens($deviceId)
{
    $conn = db_connection();
    $query = "DELETE FROM screen WHERE id_device=?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i",$deviceId);
    $stmt->execute();

    $stmt->close();
    $conn->close();
}
function insertDevice($name, $brand_id, $serie_id, $device_img, $inspection,
                      $front_camera, $back_camera, $power_button, $battery,
                      $home_button, $vibration, $speaker, $ear_speaker,
                      $headphone_jack, $no_wifi, $no_connection, $frame,
                      $volume_button, $charge_port, $microphone, $software,
                      $backlight_chip, $water_damage, $device_type, $screenArray){
    $conn = db_connection();
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

    $conn = db_connection();

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
    $conn = db_connection();
    $query = "DELETE FROM device WHERE id_device=?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i",$deviceId);
    $stmt->execute();

    $stmt->close();
    $conn->close();
}
function insertBrand($brandName,$brandImg){

    $conn = db_connection();

    $query = "INSERT INTO brand (brand_name,brand_img) VALUES (?,?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ss", $brandName,$brandImg);
    $stmt->execute();
    print($stmt->affected_rows);

    $stmt->close();
    $conn->close();

}
function updateBrand($brandId,$brandName,$brandImg){

    $conn = db_connection();

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
    $conn = db_connection();
    $query = "DELETE FROM brand WHERE id_brand=?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i",$brandId);
    $stmt->execute();

    $stmt->close();
    $conn->close();
}