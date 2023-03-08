<?php

/**
 * phonespot_repository - Contains all queries performed by application.
 *
 * @author    SwExecutive
 */

//Makes sure the correct path is laid out for different files that access phonespotRepository.
$ds = DIRECTORY_SEPARATOR;
$base_dir = realpath(dirname(__FILE__) . $ds . '..') . $ds;
include "{$base_dir}db/db_connection.php";


/**
 * Retrieves all brands that consist in the database.
 *
 * @return array
 */
function getAllBrands()
{
    $conn = db_connection();

    $query = "SELECT * FROM brand";
    $result = $conn->query($query)->fetch_all(MYSQLI_ASSOC);
    $conn->close();

    return $result;
}

/**
 * Retrieves a single brand through given $brandId parameter.
 *
 * @param $brandId
 * @return array|false|null
 */
function getBrand($brandId)
{
    $conn = db_connection();
    $query = "SELECT * FROM brand WHERE id_brand = " . $brandId . "";
    $result = $conn->query($query)->fetch_array();
    $conn->close();

    return $result;
}

/**
 * Retrieves all device series that consist in the database.
 *
 * @return array
 */
function getAllSeries()
{
    $conn = db_connection();

    $query = "SELECT * FROM serie";
    $result = $conn->query($query)->fetch_all(MYSQLI_ASSOC);
    $conn->close();

    return $result;
}

/**
 * Retrieves all phones that consist in the database.
 *
 * @return array
 */
function getAllPhones()
{
    $conn = db_connection();

    $query = "SELECT * FROM device WHERE device_type = 'phone' ORDER BY brand_id ASC,buildyear DESC, name DESC";
    $result = $conn->query($query)->fetch_all(MYSQLI_ASSOC);
    $conn->close();

    return $result;
}

/**
 * Retrieves all tablets that consist in the database.
 *
 * @return array
 */
function getAllTablets()
{
    $conn = db_connection();

    $query = "SELECT * FROM device WHERE device_type = 'tablet' ORDER BY brand_id ASC, name DESC";
    $result = $conn->query($query)->fetch_all(MYSQLI_ASSOC);
    $conn->close();

    return $result;
}

/**
 * Retrieves a single device through given $deviceId parameter.
 *
 * @param $deviceId
 * @return array|false|null
 */
function getDevice($deviceId)
{
    $conn = db_connection();

    $query = "SELECT * FROM device WHERE id_device = " . $deviceId . "";
    $result = $conn->query($query)->fetch_array();
    $conn->close();

    return $result;
}

/**
 * Retrieves the latest added device from the database.
 *
 * @return array|false|null
 */
function getLastDevice()
{
    $conn = db_connection();

    $query = "SELECT id_device FROM device ORDER BY id_device DESC LIMIT 1;";
    $result = $conn->query($query)->fetch_array();
    $conn->close();

    return $result;
}

/**
 * Retrieves all screens connected to a device with given $deviceId parameter.
 *
 * @param $deviceId
 * @return array
 */
function getScreens($deviceId)
{
    $conn = db_connection();

    $query = "SELECT * FROM screen WHERE id_device = " . $deviceId . " ORDER BY screen_price ASC";
    $result = $conn->query($query)->fetch_all(MYSQLI_ASSOC);
    $conn->close();

    return $result;
}

/**
 * Retrieves all screens from the database.
 *
 * @return array
 */
function getAllScreens()
{
    $conn = db_connection();

    $query = "SELECT * FROM screen ORDER BY id_device ASC, screen_price ASC";
    $result = $conn->query($query)->fetch_all(MYSQLI_ASSOC);
    $conn->close();

    return $result;
}

/**
 * Inserts a new screen into the database. Requires $id_device to link screen
 * to an existing device.
 *
 * @param $id_device
 * @param $screen_name
 * @param $screen_price
 * @param $active
 * @return void
 */
function insertScreen($id_device, $screen_name, $screen_price, $active)
{
    $conn = db_connection();
    if (isset($id_device, $screen_name, $screen_price, $active)) {
        $query = "INSERT INTO screen (id_device, screen_name, screen_price, active) VALUES (?,?,?,?)";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("isii", $id_device, $screen_name, $screen_price, $active);

    } elseif (isset($id_device, $screen_name, $screen_price) && empty($active)) {
        $query = "INSERT INTO screen (id_device, screen_name, screen_price) VALUES (?,?,?)";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("isi", $id_device, $screen_name, $screen_price);

    } else {
        $query = "INSERT INTO screen (id_device) VALUES (?)";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("i", $id_device);
    }
    $stmt->execute();

    $stmt->close();
    $conn->close();
}

/**
 * Updates an existing screen in the database.
 *
 * @param $id_screen
 * @param $id_device
 * @param $screen_name
 * @param $screen_price
 * @param $active
 * @return void
 */
function updateScreen($id_screen, $id_device, $screen_name, $screen_price, $active)
{
    $conn = db_connection();
    $query = "UPDATE screen SET id_device=?, screen_name=?, screen_price=?, active=? WHERE id_screen=?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("isiii", $id_device, $screen_name, $screen_price, $active, $id_screen);
    $stmt->execute();

    $stmt->close();
    $conn->close();
}

/**
 * Deletes a screen from the database.
 *
 * @param $deviceId
 * @return void
 */
function deleteScreens($deviceId)
{
    $conn = db_connection();
    $query = "DELETE FROM screen WHERE id_device=?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $deviceId);
    $stmt->execute();

    $stmt->close();
    $conn->close();
}

/**
 * Inserts a new device into the database.
 *
 * @param $name
 * @param $brand_id
 * @param $serie_id
 * @param $device_img
 * @param $inspection
 * @param $front_camera
 * @param $back_camera
 * @param $power_button
 * @param $battery
 * @param $home_button
 * @param $vibration
 * @param $speaker
 * @param $ear_speaker
 * @param $headphone_jack
 * @param $no_wifi
 * @param $no_connection
 * @param $frame
 * @param $volume_button
 * @param $charge_port
 * @param $microphone
 * @param $software
 * @param $backlight_chip
 * @param $water_damage
 * @param $device_type
 * @param $screenArray
 * @return void
 */
function insertDevice($name, $brand_id, $serie_id, $device_img, $inspection,
                      $front_camera, $back_camera, $power_button, $battery,
                      $home_button, $vibration, $speaker, $ear_speaker,
                      $headphone_jack, $no_wifi, $no_connection, $frame,
                      $volume_button, $charge_port, $microphone, $software,
                      $backlight_chip, $water_damage, $device_type, $buildyear, $screenArray)
{
    $conn = db_connection();
    $query = "INSERT INTO device (name, brand_id, serie_id, device_img, inspection, front_camera, back_camera, power_button, battery, home_button, vibration, speaker, ear_speaker, headphone_jack, no_wifi, no_connection, frame, volume_button, charge_port, microphone, software, backlight_chip, water_damage, device_type, buildyear) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ssisiiiiiiiiiiiiiiiiiiisi", $name, $brand_id, $serie_id, $device_img, $inspection,
        $front_camera, $back_camera, $power_button, $battery,
        $home_button, $vibration, $speaker, $ear_speaker,
        $headphone_jack, $no_wifi, $no_connection, $frame,
        $volume_button, $charge_port, $microphone, $software,
        $backlight_chip, $water_damage, $device_type, $buildyear);
    $stmt->execute();

    $stmt->close();
    $conn->close();
}

/**
 * Updates an exisiting device in the database.
 *
 * @param $deviceId
 * @param $name
 * @param $brand_id
 * @param $serie_id
 * @param $device_img
 * @param $inspection
 * @param $front_camera
 * @param $back_camera
 * @param $power_button
 * @param $battery
 * @param $home_button
 * @param $vibration
 * @param $speaker
 * @param $ear_speaker
 * @param $headphone_jack
 * @param $no_wifi
 * @param $no_connection
 * @param $frame
 * @param $volume_button
 * @param $charge_port
 * @param $microphone
 * @param $software
 * @param $backlight_chip
 * @param $water_damage
 * @param $device_type
 * @param $screenArray
 * @return void
 */
function updateDevice($deviceId, $name, $brand_id, $serie_id, $device_img, $inspection,
                      $front_camera, $back_camera, $power_button, $battery,
                      $home_button, $vibration, $speaker, $ear_speaker,
                      $headphone_jack, $no_wifi, $no_connection, $frame,
                      $volume_button, $charge_port, $microphone, $software,
                      $backlight_chip, $water_damage, $device_type, $buildyear, $screenArray)
{

    $conn = db_connection();

    $query = "UPDATE device SET name=?, brand_id=?, serie_id=?, device_img=?, inspection=?, front_camera=?, back_camera=?, power_button=?, battery=?, home_button=?, vibration=?, speaker=?, ear_speaker=?, headphone_jack=?, no_wifi=?, no_connection=?, frame=?, volume_button=?, charge_port=?, microphone=?, software=?, backlight_chip=?, water_damage=?, device_type=?, buildyear=? WHERE id_device=?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ssisiiiiiiiiiiiiiiiiiiisii", $name, $brand_id, $serie_id, $device_img, $inspection,
        $front_camera, $back_camera, $power_button, $battery,
        $home_button, $vibration, $speaker, $ear_speaker,
        $headphone_jack, $no_wifi, $no_connection, $frame,
        $volume_button, $charge_port, $microphone, $software,
        $backlight_chip, $water_damage, $device_type, $buildyear, $deviceId);
    $stmt->execute();
    printf($deviceId);
    print($stmt->affected_rows);

    $stmt->close();
    $conn->close();

}

/**
 * Deletes an existing device from the database.
 *
 * @param $deviceId
 * @return void
 */
function deleteDevice($deviceId)
{
    $conn = db_connection();
    $query = "DELETE FROM device WHERE id_device=?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $deviceId);
    $stmt->execute();

    $stmt->close();
    $conn->close();
}

/**
 * Inserts a new brand into the database.
 *
 * @param $brandName
 * @param $brandImg
 * @return void
 */
function insertBrand($brandName, $brandImg)
{

    $conn = db_connection();

    $query = "INSERT INTO brand (brand_name,brand_img) VALUES (?,?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ss", $brandName, $brandImg);
    $stmt->execute();
    print($stmt->affected_rows);

    $stmt->close();
    $conn->close();

}

/**
 * Updates an existing brand in the database.
 *
 * @param $brandId
 * @param $brandName
 * @param $brandImg
 * @return void
 */
function updateBrand($brandId, $brandName, $brandImg)
{

    $conn = db_connection();

    $query = "UPDATE brand SET brand_name=?,  brand_img=? WHERE id_brand=?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ssi", $brandName, $brandImg, $brandId);
    $stmt->execute();
    print($stmt->affected_rows);

    $stmt->close();
    $conn->close();

}

/**
 * Deletes a brand from the database.
 *
 * @param $brandId
 * @return void
 */
function deleteBrand($brandId)
{
    $conn = db_connection();
    $query = "DELETE FROM brand WHERE id_brand=?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $brandId);
    $stmt->execute();

    $stmt->close();
    $conn->close();
}