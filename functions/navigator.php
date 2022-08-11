<?php

class navigator{
    public String $HTTP_HOST;
    public String $URI;
    public String $defaultURL;
    public $pages= array();
    public function __construct(){
        $this->HTTP_HOST= parse_str($_SERVER['HTTP_HOST']);
        $this->URI= parse_str($_SERVER['REQUEST_URI']);
        $this->defaultURL=$this->HTTP_HOST+$this->URI;


        $this->pages["home"]="ui/pages/home.php";
        $this->pages["prijzenlijst"]="ui/pages/prijzenlijst.php";
        $this->pages["beheer"]="beheer.php";

    }

    public function givePageUrl(String $pageName){
        return "index.php?/" . $pageName;
    }
}
