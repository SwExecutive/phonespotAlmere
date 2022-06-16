<?php
include "vm/indexViewModel.php";
include "model/PhonespotAlmere.php";

$phonespotAlmere = new phonespotAlmere()
?>
<link rel="stylesheet" href="../../css/topNavbar.css" type="text/css"/>

<div class="navbarDiv">
    <div class="topNavbarDiv">
<div class="logoDiv"></div>
<div class="informationDiv">
    <div class="phoneDiv">
        <div><?php print($phonespotAlmere->phoneNumber); ?></div>
        <div>text</div>
    </div>
    <div class="phoneDiv">
        <div><?php print($phonespotAlmere->email); ?></div>
        <div>text</div>
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
</style>