<?php

function dbConnection(){
    $servername = "91.184.19.144";
    $database = "p513495_phonespotalmere";
    $username = "p513495_SwExecut";
    $password = "AchPhone355spot?";

// Create connection

    $conn = new mysqli($servername, $username, $password, $database, 3306);
    // Check connection

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    return $conn;
}
