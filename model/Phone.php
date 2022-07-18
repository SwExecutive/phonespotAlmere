<?php

class Phone{
    public String $phoneName;
    public String $brandName;
    public String $serie;
    public String $image;
    public String $inspectionOffer;
    public array $displayReplacements;
    public String $frontCamera;
    public String $backCamera;
    public String $powerButton;
    public String $battery;
    public String $homeButton;
    public String $vibration;
    public String $speaker;
    public String $earSpeaker;
    public String $headphoneJack;
    public String $noWifi;
    public String $noConnection;
    public String $frame;
    public String $volumeButton;
    public String $chargePort;
    public String $microphone;
    public String $software;
    public String $backlightChip;
    public String $waterDamage;


    public function __construct(){
        $this->phoneName= "nvt";
        $this->brandName= "nvt";
        $this->image= "nvt";
        $this->inspectionOffer= "nvt";
        $this->displayReplacements= array(
            "Origineel" => "nvt",
            "Oled" => "nvt",
            "Huismerk" => "nvt",
        );
        $this->frontCamera= "nvt";
        $this->backCamera= "nvt";
        $this->powerButton= "nvt";
        $this->battery= "nvt";
        $this->homeButton= "nvt";
        $this->vibration= "nvt";
        $this->speaker= "nvt";
        $this->earSpeaker= "nvt";
        $this->headphoneJack= "nvt";
        $this->noWifi= "nvt";
        $this->noConnection= "nvt";
        $this->frame= "nvt";
        $this->volumeButton= "nvt";
        $this->chargePort= "nvt";
        $this->microphone= "nvt";
        $this->software= "nvt";
        $this->backlightChip= "nvt";
        $this->waterDamage= "nvt";

    }

    /**
     * @param string $phoneName
     */
    public function setPhoneName(string $phoneName): void
    {
        $this->phoneName = $phoneName;
    }

    /**
     * @param string $brandName
     */
    public function setBrandName(string $brandName): void
    {
        $this->brandName = $brandName;
    }

    /**
     * @param string $image
     */
    public function setImage(string $image): void
    {
        $this->image = $image;
    }

    /**
     * @param string $inspectionOffer
     */
    public function setInspectionOffer(string $inspectionOffer): void
    {
        $this->inspectionOffer = $inspectionOffer;
    }

    /**
     * @param array|string[] $displayReplacements
     */
    public function setDisplayReplacements(array $displayReplacements): void
    {
        $this->displayReplacements = $displayReplacements;
    }

    /**
     * @param string $frontCamera
     */
    public function setFrontCamera(string $frontCamera): void
    {
        $this->frontCamera = $frontCamera;
    }

    /**
     * @param string $backCamera
     */
    public function setBackCamera(string $backCamera): void
    {
        $this->backCamera = $backCamera;
    }

    /**
     * @param string $powerButton
     */
    public function setPowerButton(string $powerButton): void
    {
        $this->powerButton = $powerButton;
    }

    /**
     * @param string $battery
     */
    public function setBattery(string $battery): void
    {
        $this->battery = $battery;
    }

    /**
     * @param string $homeButton
     */
    public function setHomeButton(string $homeButton): void
    {
        $this->homeButton = $homeButton;
    }

    /**
     * @param string $vibration
     */
    public function setVibration(string $vibration): void
    {
        $this->vibration = $vibration;
    }

    /**
     * @param string $speaker
     */
    public function setSpeaker(string $speaker): void
    {
        $this->speaker = $speaker;
    }

    /**
     * @param string $earSpeaker
     */
    public function setEarSpeaker(string $earSpeaker): void
    {
        $this->earSpeaker = $earSpeaker;
    }

    /**
     * @param string $headphoneJack
     */
    public function setHeadphoneJack(string $headphoneJack): void
    {
        $this->headphoneJack = $headphoneJack;
    }

    /**
     * @param string $noWifi
     */
    public function setNoWifi(string $noWifi): void
    {
        $this->noWifi = $noWifi;
    }

    /**
     * @param string $noConnection
     */
    public function setNoConnection(string $noConnection): void
    {
        $this->noConnection = $noConnection;
    }

    /**
     * @param string $frame
     */
    public function setFrame(string $frame): void
    {
        $this->frame = $frame;
    }

    /**
     * @param string $volumeButton
     */
    public function setVolumeButton(string $volumeButton): void
    {
        $this->volumeButton = $volumeButton;
    }

    /**
     * @param string $chargePort
     */
    public function setChargePort(string $chargePort): void
    {
        $this->chargePort = $chargePort;
    }

    /**
     * @param string $microphone
     */
    public function setMicrophone(string $microphone): void
    {
        $this->microphone = $microphone;
    }

    /**
     * @param string $software
     */
    public function setSoftware(string $software): void
    {
        $this->software = $software;
    }

    /**
     * @param string $backlightChip
     */
    public function setBacklightChip(string $backlightChip): void
    {
        $this->backlightChip = $backlightChip;
    }

    /**
     * @param string $waterDamage
     */
    public function setWaterDamage(string $waterDamage): void
    {
        $this->waterDamage = $waterDamage;
    }


}