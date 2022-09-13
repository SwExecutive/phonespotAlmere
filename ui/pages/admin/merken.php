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



    <?php
    include "./ui/navigation/admin/CRUDMenuDevices.php";

    ?>
</div>

