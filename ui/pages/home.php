<?php
include "model/Phone.php";
include "functions/navigator.php";
include "repository/phonespotRepository.php";
include_once "model/PhonespotAlmere.php";

$phoneSpotAlmere = new PhoneSpotAlmere();

$openingTimes = $phoneSpotAlmere->openingTimes;

//echo phpinfo();
$brands = getAllBrands();
$phones = getAllPhones();
$tablets = getAllTablets();
?>
<script src="js/prijzenlijstSurvey.js"></script>
<link rel="stylesheet" href="../../css/home.css" type="text/css"/>

<div class="contentDiv">
    <div class="phoneHeroDiv">

        <div class="phoneHeroDivBackground">

            <div class="phoneHeroDivTop">
                <div>
                    <div class="questionDiv">
                        Welkom! Waarmee kan ik u helpen?
                    </div>
                    <div class="questionDivPointer"></div>
                </div>
            </div>

            <div class="phoneHeroDivBottom">
                <div class="heroDiv">

                </div>
                <div class="answersDiv">
                    <div id="repair" class="answerButton">
                        Ik wil mijn apparaat laten repareren
                    </div>
                    <div id="accessory" class="answerButton">
                        Ik zoek een accessoire voor mijn telefoon
                    </div>
                    <div id="buy" class="answerButton">
                        Ik wil een telefoon kopen
                    </div>
                    <div id="else" class="answerButton">
                        Overig
                    </div>
                </div>
            </div>

        </div>


    </div>

    <div class="menuDiv">
        <a href="index.php?/prijzenlijst" class="menuItemDivLink">
            <div class="menuItemDiv" id="prijzenlijstMenuItemDiv">
                <div class="meuItemDivBanner">
                    Prijzenlijst
                </div>
            </div>
        </a>
        <a href="" class="menuItemDivLink">
            <div class="menuItemDiv" id="accessoiresMenuItemDiv">
                <div class="meuItemDivBanner">
                    Accessoires
                </div>
            </div>
        </a>
        <a href="" class="menuItemDivLink">
            <div class="menuItemDiv" id="telefoonsMenuItemDiv">
                <div class="meuItemDivBanner">
                    Telefoons
                </div>
            </div>
        </a>
        <a href="" class="menuItemDivLink">
            <div class="menuItemDiv" id="contactMenuItemDiv">
                <div class="meuItemDivBanner">
                    Contact
                </div>
            </div>
        </a>
    </div>

    <div class="splitterDiv">
        <div class="splitterDivText">
            Hoe gaan wij te werk?
        </div>
        <div class="timerDiv">
            <div class="timerDivIcon bounce"></div>
            30s
        </div>
        <div class="splitterDivHero">

        </div>
    </div>

    <div class="tutorialDivBackground">
        <div class="tutorialDiv">
            <div class="tutorialDivLeft">

                <div class="tutorialDivStepWrapper">
                    <div class="tutorialDivStep" id="tutorialDivStep1">
                        <div class="tutorialDivStepBanner">
                            Kom langs op locatie
                        </div>
                    </div>
                    <div class="stepCounter">
                        1
                    </div>
                </div>
                <div class="tutorialDivStepWrapper">
                    <div class="tutorialDivStep" id="tutorialDivStep2">
                        <div class="tutorialDivStepBanner">
                            Laat je toestel diagnotiseren & achter bij de expert
                        </div>
                    </div>
                    <div class="stepCounter">
                        2
                    </div>
                </div>

                <div class="tutorialDivStepWrapper">
                    <div class="tutorialDivStep" id="tutorialDivStep3">
                        <div class="tutorialDivStepBanner">
                            Haal je toestel op en geniet!
                        </div>
                    </div>
                    <div class="stepCounter">
                        3
                    </div>
                </div>

            </div>
            <div class="tutorialDivRight">
                <div class="openingTimeDiv">
                    <div class="openingTimeDivInfo">
                        <div class="openingTimeDivInfoText">
                            Openingstijden
                        </div>
                        <div class="openingTimeDivInfoIcon">

                        </div>
                    </div>
                    <div class="openingTimeTable">
                        <?php
                        foreach (array_keys($openingTimes) as $openingTimeKey) {
                            ?>
                            <div class="openingTimeTableDays"><?php echo $openingTimeKey ?></div>
                            <div class="openingTimeTableHours"><?php echo $openingTimes[$openingTimeKey] ?></div>
                            <?php
                        }
                        ?>
                    </div>
                </div>
                <div class="locationDiv">
                    <div class="locationDivInfo">
                        <div class="locationDivInfoText">
                            Locatie
                        </div>
                        <div class="locationDivInfoIcon">

                        </div>
                    </div>
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2436.0043967874717!2d5.213116615670313!3d52.37034027978624!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47c617f257d4a099%3A0xff5f573605d8ec3c!2sPhonespot%20Almere!5e0!3m2!1snl!2snl!4v1656594571991!5m2!1snl!2snl"
                            width="400" height="600" style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<style>
    .heroDiv {
        background-image: url("src/logo/PhonespotalmereMascotteTransparent.png");
    }

    #prijzenlijstMenuItemDiv {
        background-image: url("src/background/prijzenlijst_background.jpg");
    }

    #accessoiresMenuItemDiv {
        background-image: url("src/background/accessoires_background.jpg");
    }

    #telefoonsMenuItemDiv {
        background-image: url("src/background/tefeloons_background.jpg");
    }

    #contactMenuItemDiv {
        background-image: url("src/background/contact_background.jpg");
    }

    .timerDivIcon {
        background-image: url("src/icon/timer_icon.svg");

    }

    .splitterDivHero {
        background-image: url("src/logo/PhonespotalmereMascotteHeadTransparent.png");
    }

    .tutorialDivBackground {
        background-image: url("src/background/dark_stripes.png");
    }

    #tutorialDivStep1 {
        background-image: url("src/background/step1_background.png");
    }

    #tutorialDivStep2 {
        background-image: url("src/background/step2_background.jpg");

    }

    #tutorialDivStep3 {
        background-image: url("src/background/step3_background.jpg");

    }

    .openingTimeDivInfoIcon {
        background-image: url("src/icon/clock_icon.svg");
    }

    .locationDivInfoIcon {
        background-image: url("src/icon/location_icon.svg");
    }
</style>
<script>
    $(document).ready(function () {
        const brands = <?php echo json_encode($brands); ?>;
        const phones = <?php echo json_encode($phones); ?>;
        const tablets = <?php echo json_encode($tablets); ?>;
        const questionListRepair = ["Super! Selecteer uw apparaattype", "Wat is het merk van uw apparaat?", "Selecteer uw apparaat"]
        const questionListBuy = ["Selecteer uw apparaattype", "Selecteer uw merk", "Selecteer uw apparaat"]
        const questionListAccessory = ["Selecteer uw apparaattype", "Selecteer uw merk", "Selecteer uw apparaat"]
        const questionListElse = ["Selecteer uw apparaattype", "Selecteer uw merk", "Selecteer uw apparaat"]
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
        $("#repair").click(function () {
            //Remove devicetype selection group. Bring out brand selectionscreen.
            $(".questionDiv").text(questionListRepair[0])

            var phone = $("<div></div>")
            phone.attr('id', 'phone').attr('class', 'deviceTypeSelectDiv').css("background-image", "url('src/icon/iphone_smartphone_icon.svg')").text("Telefoon")

            var tablet = $("<div></div>")
            tablet.attr('id', 'tablet').attr('class', 'deviceTypeSelectDiv').css("background-image", "url('src/icon/ipad_tablet_icon.svg')").text("Tablet")

            var laptop = $("<div></div>")
            laptop.attr('id', 'laptop').attr('class', 'deviceTypeSelectDiv').css("background-image", "url('src/icon/mac_laptop_icon.svg')").text("Laptop")
            $(".answersDiv").empty().append(phone).append(tablet).append(laptop)

            $("#phone").click(function (){
                $(".questionDiv").text(questionListRepair[1])
                $(".answersDiv").empty()
                $.each(brands, function (brandIndex, brandItem){
                    var brandDiv = $('<div></div>')
                    brandDiv.attr('id', brandItem["id_brand"])
                    brandDiv.attr('class', "brandSelectDiv")
                    brandDiv.css("background-image", "url('" + brandItem['brand_img'] + "')")
                    $(".answersDiv").append(brandDiv)

                    brandDiv.click(function (event){
                        $(".questionDiv").text(questionListRepair[2])
                        $(".answersDiv").empty()

                        $.each(phones, function (phoneIndex, phoneItem){
                            if (event.target.id === phoneItem["brand_id"]) {
                                var deviceDiv = $('<div></div>')
                                deviceDiv.attr('id', "device" + phoneItem['id_device'])
                                deviceDiv.attr('class', 'deviceSelectDiv')
                                deviceDiv.text(phoneItem['name'])
                                $(".answersDiv").append(deviceDiv).css("overflow-y","scroll").css("align-content","start")

                                deviceDiv.click(function (){
                                    var deviceDetailTitle = $('<div></div>')
                                    deviceDetailTitle.text(phoneItem["name"]).attr('id','deviceDetailTitle');


                                    var deviceDetailImg = $('<div></div>')
                                    deviceDetailImg.attr('id', 'deviceDetailImg')
                                    $(".phoneHeroDivBackground")
                                        .empty()
                                        .css("width", "800px")
                                        .css("align-content","baseline")
                                        .css("justify-content","center")
                                        .css("background-color", "white")
                                        .css("border","5px solid #C53535")
                                        .css("overflow-y", "scroll")
                                        .append(deviceDetailTitle)
                                        .append(deviceDetailImg);

                                    $('#deviceDetailImg')
                                        .css("background-image", "url('" + phoneItem['device_img'] + "')")
                                        .css("background-size","contain")
                                        .css("margin-bottom","30px");
                                    $.each(phoneItem, function (phoneDetailIndex, phoneDetailItem){
                                        if (services[phoneDetailIndex]){
                                            console.log(phoneDetailItem);
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
                                            $(".phoneHeroDivBackground").append(deviceDetailInfoRowWrapper);

                                        }
                                    })
                                })
                            }
                        })
                    })
                })
            })
            //For each displayed brand add styling, a general styling class and a unique id for identification.
            $.each(brands, function (index, item) {
                $(".prijzenlijstSelectionDiv").css("height", "30%");
                var e = $('<div></div>')
                $("#prijzenlijstSelectionGroup2").append(e);
                e.attr('id', brands[index]['id_brand'])
                e.attr('class', 'prijzenlijstSelectionOptionBrand')
                $("#" + brands[index]['id_brand']).css("background-image", "url('" + brands[index]['brand_img'] + "')")

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
                            $("#" + "device" + phoneItem['id_device']).css("background-image", "url('" + phoneItem['device_img'] + "')").text(phoneItem['name'])

                            deviceDiv.click(function (event){
                                $("#prijzenlijstinstruction").empty().text(phoneItem['name']);
                                $(".prijzenlijstSelectionDiv").css("height", "40%");
                                $("#prijzenlijstSelectionGroup3").css("display", "none")
                                $("#prijzenlijstSelectionGroup4").css("display", "flex")
                                $("#deviceDetailImg").css("background-image", "url('" + phoneItem['device_img'] + "')")

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
                $("#" + brands[index]['id_brand']).css("background-image", "url('" + brands[index]['brand_img'] + "')")

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
                            $("#" + "device" + tabletItem['id_device']).css("background-image", "url('" + tabletItem['device_img'] + "')").text(tabletItem['name'])

                            deviceDiv.click(function (event){
                                $("#prijzenlijstinstruction").empty().text(tabletItem['name']);
                                $(".prijzenlijstSelectionDiv").css("height", "40%");
                                $("#prijzenlijstSelectionGroup3").css("display", "none")
                                $("#prijzenlijstSelectionGroup4").css("display", "flex")
                                $("#deviceDetailImg").css("background-image", "url('" + tabletItem['device_img'] + "')")

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