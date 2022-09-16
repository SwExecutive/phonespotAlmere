<?php
include "model/Phone.php";
include "repository/phonespotRepository.php";
include_once "model/PhonespotAlmere.php";

$phoneSpotAlmere = new PhoneSpotAlmere();

$brands = getAllBrands();


?>
<link rel="stylesheet" href="css/admin/merken.css" type="text/css"/>

<div class="merkenDiv">

    <div class="merkenDisplayDiv">
        <div class="pageNameDisplayDiv">Merken</div>
        <?php

        $brandlessDevices = [];

        //    Brand loop
        foreach ($brands as $brand){
            echo '<a href="beheer.php?id='.$brand["id_brand"].'&&/brand" class="brandDiv" style="background-image: url(src/devicebrands/'.$brand["brand_img"].')"></a>';
            ?>

            <?php
        }

        ?>

    </div>



    <div class="CRUDMenuDiv">
        <!--<div class="CRUDButton deleteButton">Verwijder</div>-->
        <a href="beheer.php?&&/brand/" class="CRUDButton addButton">Nieuw toevoegen</a>

    </div>

</div>

