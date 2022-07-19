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