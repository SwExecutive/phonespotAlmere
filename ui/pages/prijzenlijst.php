<?php
include "model/Phone.php";
include "repository/phonespotRepository.php";
include_once "model/PhonespotAlmere.php";

$phoneSpotAlmere = new PhoneSpotAlmere();

//echo phpinfo();
$brands [] = getAllBrands();
$phones []= getAllPhones();
$tablets []= getAllTablets();
;


?>
<script src="js/prijzenlijstSurvey.js"></script>
<link rel="stylesheet" href="../../css/prijzenlijst.css" type="text/css"/>

<div class="contentDiv">
<div class="prijzenlijstTitleDiv">
    <div class="prijzenlijstTitleLogo"></div>
    <div class="prijzenlijstTitle">
        Prijzenlijst
        <?php
            foreach (getAllBrands() as $brands){
                echo $brands["brand_name"];
            }

        ?>
    </div>
</div>

    <div class="prijzenlijstInstructionDiv">
        <div id="prijzenlijstinstruction" class="prijzenlijstInstructionDivQuestion">
            Selecteer uw apparaattype
        </div>
        <div id="prijzenlijstinstructionMerk" class="prijzenlijstInstructionDivQuestion">
            Selecteer uw merk
        </div>
        <div id="prijzenlijstinstructionDevice" class="prijzenlijstInstructionDivQuestion">
            Selecteer uw apparaat
        </div>
    </div>

    <div class="prijzenlijstSelectionDiv">
        <div id="prijzenlijstSelectionGroup1" class="prijzenlijstSelectionOptionGroup">
            <div id="phone" class="prijzenlijstSelectionOptionDevice">
                Smartphone
            </div>

            <div id="tablet" class="prijzenlijstSelectionOptionDevice">
                Tablet
            </div>

            <div id="laptop" class="prijzenlijstSelectionOptionDevice">
                Laptop
            </div>
        </div>

        <div id="prijzenlijstSelectionGroup2" class="prijzenlijstSelectionOptionGroup">
            <div id="Samsung" class="prijzenlijstSelectionOptionBrand">

            </div>

            <div id="Apple" class="prijzenlijstSelectionOptionBrand">

            </div>

            <div id="Lenovo" class="prijzenlijstSelectionOptionBrand">

            </div>
        </div>

        <div id="prijzenlijstSelectionGroup4" class="prijzenlijstSelectionOptionGroup">
            <div id="Samsung Galaxy s21 Ultra" class="prijzenlijstSelectionOption">

            </div>

            <div id="Samsung Galaxy s22 Ultra" class="prijzenlijstSelectionOption">

            </div>

            <div id="Samsung Galaxy s20" class="prijzenlijstSelectionOption">

            </div>
        </div>

    </div>
</div>
</div>

<script>
    var brands = <?php echo json_encode($brands); ?>;
    var phones = <?php echo json_encode($phones); ?>;
    var tablets = <?php echo json_encode($tablets); ?>;

    const questionList = ["Selecteer uw apparaattype","Selecteer uw merk","Selecteer uw apparaat"]
    $(document).ready(function() {
        console.log(brands)
        $("#phone").click(function () {
            $("#prijzenlijstSelectionGroup1").css("display", "none")
            $("#prijzenlijstinstruction").empty().text(questionList[1]);

            $("#prijzenlijstSelectionGroup2").css("display", "flex")
            $.each( brands, function() {
                var counter = 0;
                var e = $('<div></div>')
                $("#prijzenlijstSelectionGroup2").append(e);
                e.attr('id',brands[counter]['id_brand'])
                e.attr('class','prijzenlijstSelectionOptionBrand')
                counter++;
            });
        })

        // $("#tablet").click(function () {
        //     $("#prijzenlijstSelectionGroup1").css("display", "none")
        //     $("#prijzenlijstinstruction").empty().text(questionList[1]);
        //
        //     $("#prijzenlijstSelectionGroup2").css("display", "flex")
        // })
        //
        // $("#laptop").click(function () {
        //     $("#prijzenlijstSelectionGroup1").css("display", "none")
        //     $("#prijzenlijstinstruction").empty().text(questionList[1]);
        //
        //     $("#prijzenlijstSelectionGroup2").css("display", "flex")
        // })


    });
    function givePrijzenlijstSurveyData(phones,tablets,laptops,brands){

    }
</script>

<style>
.prijzenlijstTitle{
    background-image: url("src/logo/PhonespotalmereMascotteTransparent.png");
    border-image: url("src/background/dark_stripes.png");
    border-image-repeat: repeat;
}
#phone{
    background-image: url("src/icon/iphone_smartphone_icon.svg");
}

#tablet{
    background-image: url("src/icon/ipad_tablet_icon.svg");
}

#laptop{
    background-image: url("src/icon/mac_laptop_icon.svg");
}
</style>