<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/index.css" type="text/css"/>
    <title>Document</title>
</head>
<body>
<?php
$currentPage = 'ui/pages/home.php';

function getPage($url){
    if ($url)
    $currentPage = include 'ui/pages/home.php';

    return $currentPage;
}

include "ui/navigation/topNavbar.php";
include $currentPage;
include "ui/navigation/bottomNavbar.php";
?>
</body>
</html>