<?php
/**
 * Brand - Contains brand information.(for later usage)
 *
 */
class Brand
{
    public string $name;
    public string $imagePath;
    public string $email;
    public string $address;
    public string $websiteUrl;
    public array $openingTimes;

    public function __construct(String $name, String $imagePath)
    {
        $this->name = $name;
        $this->imagePath = $imagePath;
    }


}