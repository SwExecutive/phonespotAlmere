<?php

function loginCheck(){

}

function login(){

}

function logout(){

}

function getAdminPage($url){
    $currentPage = 'ui/pages/admin/adminHome.php';
    if ($url==""){
        $currentPage = 'ui/pages/admin/adminHome.php';
    }

    if(strpos($_SERVER['REQUEST_URI'], "telefoons")) {
        $currentPage = 'ui/pages/admin/telefoons.php';
    }
    if(strpos($_SERVER['REQUEST_URI'], "tablets")) {
        $currentPage = 'ui/pages/admin/tablets.php';
    }
    if(strpos($_SERVER['REQUEST_URI'], "laptops")) {
        $currentPage = 'ui/pages/admin/laptops.php';
    }
    if(strpos($_SERVER['REQUEST_URI'], "merken")) {
        $currentPage = 'ui/pages/admin/merken.php';
    }

    if(strpos($_SERVER['REQUEST_URI'], "companyinfo")) {
        $currentPage = 'ui/pages/admin/companyinfo.php';
    }
    if(strpos($_SERVER['REQUEST_URI'], "devcontact")) {
        $currentPage = 'ui/pages/admin/devcontact.php';
    }
    if(strpos($_SERVER['REQUEST_URI'], "settings")) {
        $currentPage = 'ui/pages/admin/settings.php';
    }

    return $currentPage;
}
?>