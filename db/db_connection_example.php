<?php

function db_connection(){
    $servername = "";
    $database = "";
    $username = "";
    $password = "";

// Create connection

    $conn = new mysqli($servername, $username, $password, $database, 3306);
    // Check connection

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    return $conn;
}
