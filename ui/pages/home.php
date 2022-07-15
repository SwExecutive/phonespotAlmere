<?php
include "model/Phone.php";
include "functions/navigator.php";
include_once "model/PhonespotAlmere.php";

$phone = new Phone();
$phoneSpotAlmere = new PhoneSpotAlmere();

$openingTimes = $phoneSpotAlmere->openingTimes;

$phone->setPhoneName("Samsung");
?>
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
                    <button class="answerButton">
<?php
echo $_SERVER["REQUEST_URI"];
?>
<!--                        Ik wil mijn apparaat laten repareren-->
                    </button>
                    <button class="answerButton">
                    Ik zoek een accessoire voor mijn telefoon
                    </button>
                    <button class="answerButton">
                    Ik wil een telefoon kopen
                    </button>
                    <button class="answerButton">
                    Overig
                    </button>
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
.splitterDivHero{
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