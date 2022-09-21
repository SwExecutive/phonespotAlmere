<?php

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
