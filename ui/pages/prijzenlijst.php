<?php
include "model/Phone.php";
include "repository/phonespotRepository.php";
include_once "model/PhonespotAlmere.php";

$phoneSpotAlmere = new PhoneSpotAlmere();

$brands = getAllBrands();
$phones = getAllPhones();
$tablets = getAllTablets();


?>
<script src="js/prijzenlijstSurvey.js"></script>
<link rel="stylesheet" href="../../css/prijzenlijst.css" type="text/css"/>

<div class="contentDiv">
    <div class="prijzenlijstTitleDiv">
        <div class="prijzenlijstTitleLogo"></div>
        <a href="index.php?/prijzenlijst" class="prijzenlijstTitle">
            Prijzenlijst
        </a>
    </div>

    <div class="prijzenlijstInstructionDiv">
        <div id="prijzenlijstinstruction" class="prijzenlijstInstructionDivQuestion">
            Selecteer uw apparaattype
        </div>
    </div>

    <div class="prijzenlijstSelectionDiv">
        <div id="prijzenlijstSelectionGroup1" class="prijzenlijstSelectionOptionGroup">
            <div id="phone" class="prijzenlijstSelectionOptionDeviceType">
                Smartphone
            </div>

            <div id="tablet" class="prijzenlijstSelectionOptionDeviceType">
                Tablet
            </div>

            <div id="laptop" class="prijzenlijstSelectionOptionDeviceType">
                Laptop
            </div>
        </div>

        <div id="prijzenlijstSelectionGroup2" class="prijzenlijstSelectionOptionGroup">

        </div>

        <div id="prijzenlijstSelectionGroup3" class="prijzenlijstSelectionOptionGroup">

        </div>
        <div id="prijzenlijstSelectionGroup4" class="prijzenlijstSelectionOptionGroup">
            <div id="deviceDetailImg"></div>
        </div>
    </div>
</div>
</div>
</div>

<script>
    $(document).ready(function () {
        const brands = <?php echo json_encode($brands); ?>;
        const phones = <?php echo json_encode($phones); ?>;
        const tablets = <?php echo json_encode($tablets); ?>;
        const questionList = ["Selecteer uw apparaattype", "Selecteer uw merk", "Selecteer uw apparaat"]
        const services = [];
        services['inspection'] = "Inspectie + offerte";
        services['front_camera'] = "Frontcamera reparatie";
        services['back_camera'] = "Backcamera reparatie";
        services['power_button'] = "Batterij vervangen";
        services['battery'] = "Batterij vervangen";
        services['home_button'] = "Homeknop vervangen";
        services['vibration'] = "Trilknop vervangen";
        services['speaker'] = "Speaker vervangen";
        services['ear_speaker'] = "Ear speaker vervangen";
        services['headphone_jack'] = "Jack ingang vervangen";
        services['no_wifi'] = "Slecht of geen wifi bereik";
        services['no_connection'] = "Slecht of geen netwerk";
        services['frame'] = "Behuizing vervangen";
        services['volume_button'] = "Volumenknop reparatie";
        services['charge_port'] = "Oplaadconnector reparatie";
        services['microphone'] = "Microfoon reparatie";
        services['software'] = "Software probleem";
        services['backlight_chip'] = "Backlight chip reparatie";
        services['water_damage'] = "Waterschade reparatie";

        //When user clicks on phone item
        $("#phone").click(function () {
            //Remove devicetype selection group. Bring out brand selectionscreen.
            $("#prijzenlijstSelectionGroup1").css("display", "none")
            $("#prijzenlijstSelectionGroup2").css("display", "flex")
            //Change question from select devicetype to select brand.
            $("#prijzenlijstinstruction").empty().text(questionList[1]);

            //For each displayed brand add styling, a general styling class and a unique id for identification.
            $.each(brands, function (index, item) {
                $(".prijzenlijstSelectionDiv").css("height", "30%");
                var e = $('<div></div>')
                $("#prijzenlijstSelectionGroup2").append(e);
                e.attr('id', brands[index]['id_brand'])
                e.attr('class', 'prijzenlijstSelectionOptionBrand')
                $("#" + brands[index]['id_brand']).css("background-image", "url('src/devicebrands/" + brands[index]['brand_img'] + "')")

                //For each brand that is retrieved add an onclick listener
                e.click(function (event) {
                    $("#prijzenlijstSelectionGroup2").css("display", "none")
                    $("#prijzenlijstSelectionGroup3").css("display", "flex")
                    $("#prijzenlijstinstruction").empty().text(questionList[2]);

                    $.each(phones, function (phoneIndex, phoneItem) {
                        if (event.target.id === phoneItem["brand_id"]) {

                            var deviceDiv = $('<div></div>')
                            $("#prijzenlijstSelectionGroup3").append(deviceDiv);
                            deviceDiv.attr('id', "device" + phoneItem['id_device'])
                            deviceDiv.attr('class', 'prijzenlijstSelectionOptionDevice')
                            $("#" + "device" + phoneItem['id_device']).css("background-image", "url('src/devices/" + phoneItem['device_img'] + "')").text(phoneItem['name'])

                            deviceDiv.click(function (event){
                                $("#prijzenlijstinstruction").empty().text(phoneItem['name']);
                                $(".prijzenlijstSelectionDiv").css("height", "40%");
                                $("#prijzenlijstSelectionGroup3").css("display", "none")
                                $("#prijzenlijstSelectionGroup4").css("display", "flex")
                                $("#deviceDetailImg").css("background-image", "url('src/devices/" + phoneItem['device_img'] + "')")

                                $.each(phoneItem, function (phoneDetailIndex, phoneDetailItem){
                                    if (services[phoneDetailIndex]){
                                        var deviceDetailInfoRowWrapper = $('<div></div>');
                                        var deviceDetailInfoRow =  $('<div></div>');
                                        var deviceDetailInfoRowName = $('<div>'+services[phoneDetailIndex]+'</div>');
                                        var deviceDetailInfoRowValue = $('<div>'+handlePrice(phoneDetailItem)+'</div>');

                                        deviceDetailInfoRowWrapper.attr('class', 'deviceDetailInfoRowWrapper')
                                        deviceDetailInfoRow.attr('class', 'deviceDetailInfoRow');
                                        deviceDetailInfoRowName.attr('class', 'deviceDetailInfoRowName');
                                        deviceDetailInfoRowValue.attr('class', 'deviceDetailInfoRowValue');

                                        deviceDetailInfoRow.append(deviceDetailInfoRowName).append(deviceDetailInfoRowValue);
                                        deviceDetailInfoRowWrapper.append(deviceDetailInfoRow);
                                        $("#prijzenlijstSelectionGroup4").append(deviceDetailInfoRowWrapper);

                                    }
                                })
                            });
                        }
                    })
                });
            });
        })

        //When user clicks on phone item
        $("#tablet").click(function () {
            //Remove devicetype selection group. Bring out brand selectionscreen.
            $("#prijzenlijstSelectionGroup1").css("display", "none")
            $("#prijzenlijstSelectionGroup2").css("display", "flex")
            //Change question from select devicetype to select brand.
            $("#prijzenlijstinstruction").empty().text(questionList[1]);

            //For each displayed brand add styling, a general styling class and a unique id for identification.
            $.each(brands, function (index, item) {
                $(".prijzenlijstSelectionDiv").css("height", "30%");
                var e = $('<div></div>')
                $("#prijzenlijstSelectionGroup2").append(e);
                e.attr('id', brands[index]['id_brand'])
                e.attr('class', 'prijzenlijstSelectionOptionBrand')
                $("#" + brands[index]['id_brand']).css("background-image", "url('src/devicebrands/" + brands[index]['brand_img'] + "')")

                //For each brand that is retrieved add an onclick listener
                e.click(function (event) {
                    $("#prijzenlijstSelectionGroup2").css("display", "none")
                    $("#prijzenlijstSelectionGroup3").css("display", "flex")
                    $("#prijzenlijstinstruction").empty().text(questionList[2]);

                    $.each(tablets, function (tabletIndex, tabletItem) {
                        if (event.target.id === tabletItem["brand_id"]) {

                            var deviceDiv = $('<div></div>')
                            $("#prijzenlijstSelectionGroup3").append(deviceDiv);
                            deviceDiv.attr('id', "device" + tabletItem['id_device'])
                            deviceDiv.attr('class', 'prijzenlijstSelectionOptionDevice')
                            $("#" + "device" + tabletItem['id_device']).css("background-image", "url('src/devices/" + tabletItem['device_img'] + "')").text(tabletItem['name'])

                            deviceDiv.click(function (event){
                                $("#prijzenlijstinstruction").empty().text(tabletItem['name']);
                                $(".prijzenlijstSelectionDiv").css("height", "40%");
                                $("#prijzenlijstSelectionGroup3").css("display", "none")
                                $("#prijzenlijstSelectionGroup4").css("display", "flex")
                                $("#deviceDetailImg").css("background-image", "url('src/devices/" + tabletItem['device_img'] + "')")

                                $.each(tabletItem, function (tabletDetailIndex, tabletDetailItem){
                                    if (services[tabletDetailIndex]){
                                        var deviceDetailInfoRowWrapper = $('<div></div>');
                                        var deviceDetailInfoRow =  $('<div></div>');
                                        var deviceDetailInfoRowName = $('<div>'+services[tabletDetailIndex]+'</div>');
                                        var deviceDetailInfoRowValue = $('<div>'+handlePrice(tabletDetailItem)+'</div>');

                                        deviceDetailInfoRowWrapper.attr('class', 'deviceDetailInfoRowWrapper')
                                        deviceDetailInfoRow.attr('class', 'deviceDetailInfoRow');
                                        deviceDetailInfoRowName.attr('class', 'deviceDetailInfoRowName');
                                        deviceDetailInfoRowValue.attr('class', 'deviceDetailInfoRowValue');

                                        deviceDetailInfoRow.append(deviceDetailInfoRowName).append(deviceDetailInfoRowValue);
                                        deviceDetailInfoRowWrapper.append(deviceDetailInfoRow);
                                        $("#prijzenlijstSelectionGroup4").append(deviceDetailInfoRowWrapper);

                                    }
                                })
                            });
                        }
                    })
                });
            // if (){
            //     return false
            // }
            });
        })


    });
</script>

<style>
    .prijzenlijstTitle {
        background-image: url("src/logo/PhonespotalmereMascotteTransparent.png");
        border-image: url("src/background/dark_stripes.png");
        border-image-repeat: repeat;
    }

    #phone {
        background-image: url("src/icon/iphone_smartphone_icon.svg");
    }

    #tablet {
        background-image: url("src/icon/ipad_tablet_icon.svg");
    }

    #laptop {
        background-image: url("src/icon/mac_laptop_icon.svg");
    }
</style>