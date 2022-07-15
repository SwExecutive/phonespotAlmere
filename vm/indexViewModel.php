<?php

function useLocalhost(bool $status){
    if ($status){
        return "http://localhost:63342/phonespotAlmere/";
    }
    return "";
}

function getPage($url){
    $currentPage = 'ui/pages/home.php';
    if ($url==""){
        $currentPage = 'ui/pages/home.php';
    }

    if(strpos($_SERVER['REQUEST_URI'], "prijzenlijst")) {
        $currentPage = 'ui/pages/prijzenlijst.php';
    }

    return $currentPage;
}
