<?php
include "model/Phone.php";

$phone = new Phone();

$phone->setPhoneName("Samsung");
?>
<link rel="stylesheet" href="../../css/home.css" type="text/css"/>

<div class="contentDiv">
    <div class="phoneHeroDiv">

    <div class="phoneHeroDivBackground">

        <div class="phoneHeroDivTop">
            <div>
                <div class="questionDiv">
                    Waarmee kan ik u helpen?
                </div>
                <div class="questionDivPointer"></div>
            </div>
        </div>

        <div class="phoneHeroDivBottom">
            <div class="heroDiv">

            </div>
            <div class="answersDiv">
            <button class="answerButton">

            </button>
                <button class="answerButton">

                </button>
                <button class="answerButton">

                </button>
                <button class="answerButton">

                </button>
            </div>
        </div>
    </div>


    </div>

    <div class="menuDiv">
        <div class="menuItemDiv" id="prijzenlijstMenuItemDiv">
            Prijzenlijst
        </div>
        <div class="menuItemDiv" id="accessoiresMenuItemDiv">
            Accessoires
        </div>
        <div class="menuItemDiv" id="telefoonsMenuItemDiv">
            Telefoons
        </div>
        <div class="menuItemDiv" id="contactMenuItemDiv">
            Contact
        </div>
    </div>
    <?php
//    print($phone->phoneName)
    ?>

</div>
<style>
    .heroDiv{
        background-image: url("src/logo/PhonespotalmereMascotteTransparent.png");
    }
    #prijzenlijstMenuItemDiv{
        background-image: url("src/background/prijzenlijst_background.jpg");
    }
    #accessoiresMenuItemDiv{
        background-image: url("src/background/accessoires_background.jpg");
    }
    #telefoonsMenuItemDiv{
        background-image: url("src/background/tefeloons_background.jpg");
    }
    #contactMenuItemDiv{
        background-image: url("src/background/contact_background.jpg");
    }
</style>