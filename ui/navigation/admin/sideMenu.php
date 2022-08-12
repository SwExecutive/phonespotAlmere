<?php
?>
<link rel="stylesheet" href="../../../css/admin/sideMenu.css" type="text/css"/>

<div class="sideMenuDiv">
    <a href="beheer.php?/" class="companyName">PhonespotAlmere</a>
    <div class="menuItems">
    <a href="beheer.php?/telefoons" class="menuItem">Telefoons</a>
    <a href="beheer.php?/tablets" class="menuItem">Tablets</a>
    <a href="beheer.php?/laptops" class="menuItem">Laptops</a>
    <a href="beheer.php?/merken" class="menuItem">Merken</a>
    </div>
    <div class="divider">
        <div class="dividerline"></div>
    </div>
    <div class="menuNecessities">
    <a href="beheer.php?/companyinfo" class="menuNecessityItem menuCompanyItem">Bedrijfsinformatie</a>
    <a href="beheer.php?/devcontact" class="menuNecessityItem menuContactItem">Contact</a>
    <a href="beheer.php?/settings" class="menuNecessityItem menuSettingsItem">Instellingen</a>
    </div>
    <div class="menuLogoutContainer">
        <a href="ui/pages/admin/uitloggen.php" class="menuLogout">Uitloggen</a>
    </div>

</div>
<style>
    .menuCompanyItem{
        background-image: url("src/icon/company_icon.svg");
    }
    .menuContactItem{
        background-image: url("src/icon/contact_icon.svg");
    }
    .menuSettingsItem{
        background-image: url("src/icon/settings_icon.svg");
    }
    .menuLogout{
        background-image: url("src/icon/logout_icon.svg");
    }
</style>