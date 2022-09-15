<?php
include "model/Phone.php";
include "repository/phonespotRepository.php";
include_once "model/PhonespotAlmere.php";

$phoneSpotAlmere = new PhoneSpotAlmere();

$brands = getAllBrands();
$series = getAllSeries();
$tablets = getAllTablets();

?>
<link rel="stylesheet" href="css/admin/telefoons.css" type="text/css"/>

<div class="telefoonsDiv">


    <div class="telefoonsDisplayDiv">
        <div class="pageNameDisplayDiv">Tablets</div>
        <?php

        $brandlessDevices = [];

        //    Brand loop
        foreach ($brands as $brand){
            ?>
            <div class="brandDeviceDiv">
                <?php  echo $brand["brand_name"];

                foreach ($tablets as $tablet){
                    if ($tablet["brand_id"]==$brand["id_brand"]&& $tablet["serie_id"]=="0"){
                        $brandlessDevices[]= $tablet;
                    }
                }
                foreach ($series as $serie){
                    if ($serie["brand_id"]==$brand["id_brand"]){
                        ?>
                        <div class="serieDeviceDiv">
                            <?php echo $serie["serie_name"];

                            foreach ($tablets as $tablet){
                                if ($tablet["brand_id"]==$brand["id_brand"]&&$tablet["serie_id"]==$serie["id_serie"]){
                                    echo '<a href="beheer.php?id='.$tablet["id_device"].'&&/device/'.$tablet["device_type"].'" class="deviceDiv">'.$tablet["name"].'</a>';
                                }
                            }
                            ?>
                        </div>
                        <?php
                    }
                }
                ?>
                <div class="serieDeviceDiv">
                    Apparaten zonder series
                    <?php
                    if (isset($brandlessDevices)){
                        foreach ($brandlessDevices as $brandlessDevice){
                            echo '<a href="beheer.php?id='.$brandlessDevice["id_device"].'&&/device/'.$brandlessDevice["device_type"].'" class="deviceDiv">'.$brandlessDevice["name"].'</a>';
                        }
                        unset($brandlessDevices);
                    }else{ ?>
                        <div class="deviceDiv">
                            Empty
                        </div>
                    <?php  }
                    ?>
                </div>
            </div>
            <?php
        }

        ?>

    </div>



    <?php
    include "./ui/navigation/admin/CRUDMenuDevices.php";

    ?>
</div>

