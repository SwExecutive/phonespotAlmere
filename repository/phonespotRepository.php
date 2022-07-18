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
    $query = "SELECT * FROM phone";
    return dbConnection($query)->fetch_all(MYSQLI_ASSOC);
}

function getAllTablets(){
    $query = "SELECT * FROM tablet";
    return dbConnection($query)->fetch_all(MYSQLI_ASSOC);
}