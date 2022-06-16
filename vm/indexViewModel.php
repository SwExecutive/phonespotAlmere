<?php

function useLocalhost(bool $status){
    if ($status){
        return "http://localhost:63342/phonespotAlmere/";
    }
    return "";
}