<?php
include "model/Phone.php";
include_once "model/PhonespotAlmere.php";

$phone = new Phone();
$phoneSpotAlmere = new PhoneSpotAlmere();

$openingTimes = $phoneSpotAlmere->openingTimes;

$phone->setPhoneName("Samsung");
?>
<link rel="stylesheet" href="../../css/prijzenlijst.css" type="text/css"/>

<div class="contentDiv">

</div>
</div>
<style>

</style>