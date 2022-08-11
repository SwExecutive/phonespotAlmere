<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/admin/beheer.css" type="text/css"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <title>PhonespotAlmere</title>
</head>
<body>
<?php
require "vm/beheerViewModel.php";
$url = "";

include "ui/navigation/admin/sideMenu.php";
include getAdminPage($url);

?>
</body>
</html>
