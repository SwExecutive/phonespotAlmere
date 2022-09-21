<?php
/**
 * beheer_view_model - Contains all logic for beheer.php related navigation.
 *
 * @author    SwExecutive
 */

//ini_set('display_errors', 1);


/**
 * Checks if user is logged in or not. Redirects to login if false.
 *
 * @return boolean
 */
function loginCheck(){
    session_start();
if ($_SESSION["login"]=="true"){
    return true;
} elseif (!isset($_SESSION['login'])||!$_SESSION["login"]=="true"){
    header("Location: ./ui/pages/admin/login.php");
    echo '<meta http-equiv="refresh" content="0;url=./ui/pages/admin/login.php">';
    return false;
}
return false;
}

/**
 * Performs a login for user through the usage of a session variable.
 *
 * @return void
 */
function login(){
    session_start();
    $_SESSION["login"]="true";
    $_SESSION["loginTime"]= date("d-m-Y H:i:s");
}

/**
 * Logs user out of login session.
 *
 * @return void
 */
function logout(){
    session_start();
    unset($_SESSION["login"]);
    unset($_SESSION["loginTime"]);
}

/**
 * Navigates user to the correct beheer.php page when the correct url is given.
 *
 * @param $url
 * @return string
 */
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
    if(strpos($_SERVER['REQUEST_URI'], "device")) {
        $currentPage = 'ui/pages/admin/device.php';
    }
    if(strpos($_SERVER['REQUEST_URI'], "merken")) {
        $currentPage = 'ui/pages/admin/merken.php';
    }
    if(strpos($_SERVER['REQUEST_URI'], "brand")) {
        $currentPage = 'ui/pages/admin/brand.php';
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
