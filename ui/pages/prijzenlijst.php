<?php
include "model/Phone.php";
include "repository/phonespotRepository.php";
include_once "model/PhonespotAlmere.php";

$phoneSpotAlmere = new PhoneSpotAlmere();

$brands = getAllBrands();
$phones = getAllPhones();
$tablets = getAllTablets();
$allScreens= getAllScreens();

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
        const allScreens = <?php echo json_encode($allScreens); ?>;

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
        $("#phone, #tablet").click(function () {

            //Save the clicked upon element
            var clickedBtnId = $(this).attr('id');

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

                    //Assign the selected devicetype array to one array.
                    var selectedTypeDevices;
                    switch (clickedBtnId){
                        case "phone":
                            selectedTypeDevices = phones;
                            break;

                        case "tablet":
                            selectedTypeDevices = tablets;
                            break;

                        case "laptop":
                            selectedTypeDevices = laptops;
                    }

                    $.each(selectedTypeDevices, function (deviceIndex, deviceItem) {
                        if (event.target.id === deviceItem["brand_id"]) {

                            var deviceDiv = $('<div></div>')
                            $("#prijzenlijstSelectionGroup3").append(deviceDiv);
                            deviceDiv.attr('id', "device" + deviceItem['id_device'])
                            deviceDiv.attr('class', 'prijzenlijstSelectionOptionDevice')
                            $("#" + "device" + deviceItem['id_device']).css("background-image", "url('src/devices/" + deviceItem['device_img'] + "')").text(deviceItem['name'])

                            deviceDiv.click(function (event){
                                $("#prijzenlijstinstruction").empty().text(deviceItem['name']);
                                $(".prijzenlijstSelectionDiv").css("height", "40%");
                                $("#prijzenlijstSelectionGroup3").css("display", "none")
                                $("#prijzenlijstSelectionGroup4").css("display", "flex")
                                $("#deviceDetailImg").css("background-image", "url('src/devices/" + deviceItem['device_img'] + "')")

                                //Make an array consisting of all screens that correspond with the selected device.
                                const deviceScreens = allScreens.filter(x=> deviceItem['id_device']===x['id_device']&&x['active']==='1');
                                //Loop through all screens corresponding with the selected device.
                                $.each(deviceScreens, function (deviceScreenIndex, deviceScreenItem){
                                    var deviceDetailInfoRowWrapper = $('<div></div>');
                                    var deviceDetailInfoRow =  $('<div></div>');
                                    var deviceDetailInfoRowName = $('<div>'+deviceScreenItem["screen_name"]+'</div>');
                                    var deviceDetailInfoRowValue = $('<div>'+handlePrice(deviceScreenItem["screen_price"])+'</div>');

                                    deviceDetailInfoRowWrapper.attr('class', 'deviceDetailInfoRowWrapper')
                                    deviceDetailInfoRow.attr('class', 'deviceDetailInfoRow');
                                    deviceDetailInfoRowName.attr('class', 'deviceDetailInfoRowName');
                                    deviceDetailInfoRowValue.attr('class', 'deviceDetailInfoRowValue');

                                    deviceDetailInfoRow.append(deviceDetailInfoRowName).append(deviceDetailInfoRowValue);
                                    deviceDetailInfoRowWrapper.append(deviceDetailInfoRow);
                                    $("#prijzenlijstSelectionGroup4").append(deviceDetailInfoRowWrapper);

                                });

                                $.each(deviceItem, function (deviceDetailIndex, deviceDetailItem){
                                    if (services[deviceDetailIndex]){
                                        var deviceDetailInfoRowWrapper = $('<div></div>');
                                        var deviceDetailInfoRow =  $('<div></div>');
                                        var deviceDetailInfoRowName = $('<div>'+services[deviceDetailIndex]+'</div>');
                                        var deviceDetailInfoRowValue = $('<div>'+handlePrice(deviceDetailItem)+'</div>');

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