<?php
/**
 * index_view_model - Contains all logic for index.php related navigation.
 *
 * @author    SwExecutive
 */

/**
 * Navigates user to the correct index.php page when the correct url is given.
 *
 * @param $url
 * @return string
 */
function getPage($url){
    $currentPage = 'ui/pages/public/home.php';
    if ($url==""){
        $currentPage = 'ui/pages/public/home.php';
    }

    if(strpos($_SERVER['REQUEST_URI'], "prijzenlijst")) {
        $currentPage = 'ui/pages/public/prijzenlijst.php';
    }

    return $currentPage;
}
