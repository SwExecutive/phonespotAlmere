<?php
session_start();
?>
<link rel="stylesheet" href="../../../css/admin/adminHome.css" type="text/css"/>
<div class="homeDiv">
    <div class="homeTitle">
        Welkom Achraf
    </div>
    <div class="lastLogin">
        Laatste login:  <?php echo $_SESSION["loginTime"]?>
    </div>
</div>

