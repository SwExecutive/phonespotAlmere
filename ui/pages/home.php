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
            <div class="questionDiv">


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
    <?php
    print($phone->phoneName)
    ?>

</div>
<style>
    .heroDiv{
        background-image: url("src/logo/PhonespotalmereMascotteTransparent.png");
    }
</style>