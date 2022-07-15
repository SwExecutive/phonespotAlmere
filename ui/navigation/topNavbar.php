<?php
include "vm/indexViewModel.php";
include "model/PhonespotAlmere.php";

$phonespotAlmere = new phonespotAlmere()
?>
<link rel="stylesheet" href="../../css/topNavbar.css" type="text/css"/>

<div class="navbarDiv">
    <div class="topNavbarDiv">
<a href="index.php" class="logoDiv"></a>
<div class="informationDiv">
    <div class="infoDiv">
        <div><?php print($phonespotAlmere->phoneNumber); ?></div>
        <div class="phoneIconDiv"></div>
    </div>
    <div class="infoDiv">
        <div><?php print($phonespotAlmere->email); ?></div>
        <div class="emailIconDiv"></div>
    </div>
</div>
    </div>

    <div class="underNavbarDiv">
        <div class="underNavbarDivItem">Prijzenlijst</div>
        <div class="underNavbarDivItem">Accessoires</div>
        <div class="underNavbarDivItem">Te koop</div>
    </div>
</div>
<style>
    .logoDiv{
        background-image: url("src/logo/cropped-transparentphonespotlogo.png");
    }
    .phoneIconDiv{
        background-image: url("../../src/icon/phone_icon_white.png");
    }
    .emailIconDiv{
        background-image: url("../../src/icon/mail_icon_white.png");
    }
</style>