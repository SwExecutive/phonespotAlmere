<?php

class phonespotAlmere
{
    public string $name;
    public string $phoneNumber;
    public string $email;
    public string $address;
    public string $websiteUrl;
    public array $openingTimes;

    public function __construct()
    {
        $this->name = "Phonespotalmere";
        $this->phoneNumber = "0640822454";
        $this->email = "info@phonespotalmere.nl";
        $this->address = "Bottelaarspassage 57, 1215EP";
        $this->websiteUrl = "https://phonespotalmere.nl";
        $this->openingTimes['Maandag'] = "12:00 - 17:00";
        $this->openingTimes['Dinsdag'] = "10:00 - 17:00";
        $this->openingTimes['Woensdag'] = "10:00 - 17:00";
        $this->openingTimes['Donderdag'] = "10:00 - 18:00";
        $this->openingTimes['Vrijdag'] = "10:00 - 17:00";
        $this->openingTimes['Zaterdag'] = "10:00 - 17:00";
        $this->openingTimes['Zondag'] = "Gesloten";
    }


}